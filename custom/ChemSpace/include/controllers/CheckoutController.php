<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\OrdersIn;
use yii\filters\AccessControl;
use app\models\OrderPosition;
use app\models\SavedAddresses;
use app\models\ChemspaceOrder;
use app\models\OrderShipmentJunk;
use app\models\OrderInItem;
use app\models\Shipment;
use yii\web\NotFoundHttpException;
use yii\db\Expression;
use RomMcR\Utils\U;

class CheckoutController extends Controller
{

    public function behaviors()
    {
        if (empty(Yii::$app->params['cart_redirect_to_checkout'])) {
            throw new \yii\web\NotFoundHttpException;
        }
        return [
            'access' => [
                'class'        => AccessControl::className(),
                'rules'        => [
                    [
                        'actions' => ['index', 'addresses', 'shipment', 'confirm', 'success'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
                'denyCallback' => function() {
            $c = Yii::$app->createController('user/default/login');
            echo $c[0]->actionLogin(Url::to(''));
        }
            ]
        ];
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $this->view->params['breadcrumbs'][] = $action->id == 'index' ? 'Checkout' : ['label' => 'Checkout', 'url' => ['checkout/index']];
            if (!Yii::$app->cart->checkoutStage && !Yii::$app->getSession()->hasFlash('checkoutStored')) {
                $this->redirect(['cart/index']);
            }
            return true;
        }
        return false;
    }

    public function actionIndex()
    {
        $model = Yii::$app->cart->checkout;
        $model->setScenario('step1');
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post(), null, true)) {
            if ($model->validate()) {
                Yii::$app->cart->setCheckoutStage(2)->setCheckout($model)->save(true);
                return $this->redirect(['checkout/addresses']);
            }
        }
        return $this->render('index', ['model' => $model]);
    }

    public function actionAddresses()
    {
        $this->view->params['breadcrumbs'][] = 'Delivery and billing addresses';
        if (Yii::$app->cart->checkoutStage == 1) {
            return $this->redirect(['index']);
        }
        $model = Yii::$app->cart->checkout;
        $model->setScenario('step2');
        if (!$model->delivery_full_name) {
            $model->importAddress(SavedAddresses::getDefaultAddress(Yii::$app->user->id, 'd'), 'delivery');
            $model->importAddress(SavedAddresses::getDefaultAddress(Yii::$app->user->id, 'p'), 'payment|invoice');
        }
        if (!Yii::$app->request->isPost) {
            $this->setDefaultContact($model);
        }
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post(), null, true)) {
            if ($model->validate()) {
                Yii::$app->cart->setCheckoutStage(3)->setCheckout($model)->save(true);
                return $this->redirect(['checkout/shipment']);
            }
        }
        return $this->render('addresses', ['model' => $model]);
    }

    public function actionShipment()
    {
        $this->view->params['breadcrumbs'][] = 'Shipment breakdowns';

        switch (Yii::$app->cart->checkoutStage) {
            case 1:
                return $this->redirect(['index']);
                break;
            case 2:
                return $this->redirect(['addresses']);
                break;
        }

        Yii::$app->cart->fillShipmentData();
        if (Yii::$app->request->isPost) {
            $models = Yii::$app->cart->getOrders();
            if ($this->checkStage3($models)) {
                Yii::$app->cart->setCheckoutStage(4);
                return $this->redirect(['confirm']);
            }
        }
        return $this->render('shipment', ['model' => Yii::$app->cart->checkout, 'orders' => Yii::$app->cart->orders]);
    }

    public function actionConfirm()
    {
        $this->view->params['breadcrumbs'][] = 'Confirmation';

        switch (Yii::$app->cart->checkoutStage) {
            case 1:
                return $this->redirect(['index']);
                break;
            case 2:
                return $this->redirect(['addresses']);
                break;
            case 3:
                Yii::$app->getSession()->setFlash('error', 'Cart was changed. Please check it again.');
                return $this->redirect(['shipment']);
                break;
        }

        $cart = Yii::$app->cart;
        $model = $cart->checkout;
        $model->setScenario('step4');
        Yii::$app->cart->fillShipmentData();


        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (
                    Yii::$app->request->post('hash') != $cart->hash ||
                    Yii::$app->request->post('shipment_hash') != $cart->shipment_hash
            ) {
                $cart->setCheckoutStage(3);
                return $this->redirect(['checkout/shipment']);
            }
            if ($model->validate()) {
                // Checking stage 1-2-3 (PO numbers)
                $model->setScenario('step1');
                if (!$model->validate()) {
                    $cart->setCheckoutStage(1);
                    return $this->redirect(['checkout/index']);
                }
                $model->setScenario('step2');
                if (!$model->validate()) {
                    $cart->setCheckoutStage(2);
                    return $this->redirect(['checkout/addresses']);
                }

                $models = $cart->getOrders();
                if (!$this->checkStage3($models, false)) {
                    Yii::$app->cart->setCheckoutStage(3);
                    return $this->redirect(['shipment']);
                }

                return $this->saveOrders();
            }
        }

        return $this->render('confirm', ['model' => $model, 'orders' => Yii::$app->cart->orders]);
    }

    private function checkStage3($models, $load = true)
    {
        if ($load)
            if (!OrderPosition::loadMultiple($models, Yii::$app->request->post(), 'op')) {
                return false;
            }
        $po = [];
        $success = true;
        foreach ($models as $order) {
            if (!$order->isEmpty()) {

                if ($order->isPoPredefined()) {
                    $order->po_number = Yii::$app->cart->checkout->po_number . '/' . $order->id;
                    $order->setScenario('auto_po');
                }
                $res = $order->validate();
                if ($res && $order->po_number && in_array($order->po_number, $po)) {
                    $order->addError('po_number', 'PO number must be unique');
                    $res = false;
                }
                $po[] = $order->po_number;
                $success = $success && $res;
            }
        }
        return $success;
    }

    private function saveOrders()
    {
        $cart = Yii::$app->cart;
        $orders = $cart->getOrders();

        $chemspaceOrder = null;
        $errors = [];
        $ok = 0;

        foreach ($orders as $orderIndex => $order) {
            if ($order->isEmpty()) {
                continue;
            }
            $savedShipments = [];
            $savedItems = [];
            try {
                $oi = clone $cart->checkout;

                if ($oi->through_chemspace) {
                    if (is_null($chemspaceOrder)) {
                        $chemspaceOrder = new ChemspaceOrder([
                            'chemspace_order_id' => ChemspaceOrder::bookID(),
                            'user_id'            => $order->user_id,
                            'po_number'          => $cart->checkout->po_number
                        ]);
                    }
                    $oi->chemspace_order_id = $chemspaceOrder->chemspace_order_id;
                    $chemspaceOrder->orders ++;
                }

                $oi->fillDefaults();
                $oi->currency = Yii::$app->cart->checkoutCurrency;
                $oi->setAttributes($order->getAttributes(['po_number', 'ref_number', 'order_id', 'user_id', 'supplier_id', 'cost', 'transportation', 'handling',
                            'items_count']), false);
                $oi->setScenario('default');

                if (!$oi->save())
                    throw new \Exception('Error saving order: ' . implode(";", $oi->firstErrors), 1);


                foreach ($order->shipments as $shipmentPosition) {
                    if ($shipmentPosition->isEmpty)
                        continue;

                    // Сохранение посылки
                    if (!($shipment = Shipment::importData($shipmentPosition))) {
                        throw new \Exception('Error saving shipment: ' . implode(";", $obj->firstErrors), 2);
                    }
                    $savedShipments[] = $shipment;

                    $junk = new OrderShipmentJunk(['order_id' => $order->order_id, 'shipment_id' => $shipment->shipment_id]);
                    if (!$junk->save()) {
                        throw new \Exception('Error saving junction data: ' . implode(';', $junk->firstErrors), 2);
                    }

                    foreach ($shipmentPosition->items as $itemPosition) {
                        $item = OrderInItem::importData($itemPosition);
                        $item->order_id = $order->order_id;
                        $item->shipment_id = $shipment->shipment_id;
                        if (!$item->save()) {
                            throw new \Exception("Error saving item data: " . implode(';', $item->firstErrors) . "<br/>" . print_r($item->getAttributes(), true),
                            3);
                        }
                        $savedItems[] = $item;
                    }
                }
                // Remove order from cart
                Yii::$app->cart->removeOrderById($orderIndex);
                $oi->sendMail();
                $ok++;

                $model = $oi;
                $response = Yii::$app->crmconnect->push('create_new_order',$data=[
                    'order_id' => $model->order_id,//integer
                    'user_id' => $model->user_id,//integer
                    'user_profile_change_date' => Yii::$app->user->identity->last_update,//date
                    //delivery preferences
                    'courier' => $model->courier,//string(name like DHL, FedEx, TNT)
                    'courier_account' => $model->courier_account,//string
                    'ours_third' => $model->ours_third,//integer[0|1]
                    //payment preferences
                    'through_chemspace' => $model->through_chemspace,//integer[0|1]
                    'po_number' => $model->po_number,//string
                    //delivery address
                    'delivery_full_name' => $model->delivery_full_name,//string
                    'delivery_company' => $model->delivery_company,//string
                    'delivery_vat_exempt' => $model->delivery_vat_exempt,//integer[0|1]
                    'delivery_vat' => $model->delivery_vat,//string
                    'delivery_region_id' => $model->delivery_region_id,//integer
                    'delivery_country_id' => $model->delivery_country_id,//integer
                    'delivery_state_id' => $model->delivery_state_id,//integer
                    'delivery_city' => $model->delivery_city,//string
                    'delivery_address' => $model->delivery_address,//string
                    'delivery_zip' => $model->delivery_zip,//string
                    'delivery_phone' => $model->delivery_phone,//string
                    'delivery_email' => $model->delivery_email,//string
                    //payment address
                    'payment_full_name' => $model->payment_full_name,//string
                    'payment_company' => $model->payment_company,//string
                    'payment_vat_exempt' => $model->payment_vat_exempt,//integer[0|1]
                    'payment_vat' => $model->payment_vat,//string
                    'payment_country_id' => $model->payment_country_id,//integer
                    'payment_state_id' => $model->payment_state_id,//integer
                    'payment_city' => $model->payment_city,//string
                    'payment_address' => $model->payment_address,//string
                    'payment_zip' => $model->payment_zip,//string
                    'payment_phone' => $model->payment_phone,//string
                    'invoice_email' => $model->invoice_email,//email
                    'invoice_fax' => $model->invoice_fax,//string
                    'invoice_post' => $model->invoice_post,//integer[0|1]
                    //contact person
                    'contact_full_name' => $model->contact_full_name,//string
                    'contact_company' => $model->contact_company,//string
                    'contact_position' => $model->contact_position,//string
                    'contact_email' => $model->contact_email,//email
                    'contact_phone' => $model->contact_phone,//string
                ],true);
                if( !$response ){
                    //print_r( Yii::$app->crmconnect->getErrors() );die;
                }

            } catch (\Exception $exc) {
                $errors[] = $exc->getMessage();
                /* @var $exc \Exception */
                if ($exc->getCode() > 1) {
                    // В случае хотя бы одного неудачного сохранения - удаляется из  базы и остается в корзине весь заказ
                    OrderShipmentJunk::deleteAll(['order_id' => $oi->order_id]);
                    $oi->delete();

                    foreach ($savedShipments as $toDel) {
                        $toDel->delete();
                    }
                    foreach ($savedItems as $toDel) {
                        $toDel->delete();
                    }
                }
                if (!is_null($chemspaceOrder)) {
                    $chemspaceOrder->orders--;
                }
            }
        }
        if ($chemspaceOrder && $chemspaceOrder->orders)
            $chemspaceOrder->save();
        if ($errors) {
            $msg = $ok ? U::pluralFormEn($ok, "order") . " successfully stored<br/>" : "";
            Yii::$app->getSession()->setFlash('error', $msg . "Some errors while storing your orders: " . implode("<br/>", $errors));
            Yii::$app->cart->setCheckoutStage(3);
            return $this->redirect('shipment');
        } else {
            Yii::$app->cart->clear();
            Yii::$app->cart->setCheckout(null);
            Yii::$app->getSession()->setFlash('checkoutStored', $ok);
            return $this->redirect('success');
        }
    }

    public function actionSuccess()
    {
        return $this->render('/site/message',
                        [
                    'h1'   => U::pluralFormEn(Yii::$app->getSession()->getFlash('checkoutStored'), 'order') . ' has been processed.',
                    'text' => Yii::t('checkout', 'checkout.success'),
                    'a'    => ['href' => '/', 'text' => 'Go to main']
        ]);
    }

    private function setDefaultContact($model)
    {
        $user = Yii::$app->user->identity;
        if (empty($model->contact_full_name))
            $model->contact_full_name = $user->fullName;
        if (empty($model->contact_email))
            $model->contact_email = $user->email;
        if (empty($model->contact_phone))
            $model->contact_phone = $user->phone;
        if (is_null($model->contact_position))
            $model->contact_position = $user->position;
        if (is_null($model->contact_company))
            $model->contact_company= $user->company_name;
    }

}
