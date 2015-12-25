<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\HtmlPurifier;
use yii\web\Controller;
use app\models\Rating;
use app\models\MainData;
use app\models\Supplier;
use app\models\Favorites;
use app\models\Preferred;
use app\models\Item;
use app\models\ItemSearch;
use app\models\Lists;
use app\models\ListsStructure;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use components\SearchHelper;
use components\cart\Cart;
use app\modules\user\models\User;
use app\models\SavedAddresses;
use yii\helpers\Html;
use yii\helpers\Url;

class AjaxController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'addtocart'      => ['post'],
                    'removefromcart' => ['post'],
//                    'removefromshipment' => ['post'],
                    'setquantity'    => ['post'],
                    'enquire'        => ['post'],
                    'switchitems'    => ['post'],
                    'checkout'       => ['post'],
                    'savetolist'     => ['post'],
                ]
            ]
        ];
    }

    public function actionSavetolist()
    {
        $post = Yii::$app->request->post();
        Yii::$app->response->format = 'json';
        $return = [
            'message' => 'Search results successfully added to your lists.',
            'success' => true,
        ];

        if (Yii::$app->user->isGuest) {
            $return['message'] = 'User must be logged in to manage lists.';
            $return['success'] = false;
        } else
        if (isset($post['title'])) {
            $msgid = isset($post['msgid']) ? $post['msgid'] : null;
            $list_id = isset($post['list_id']) ? (int) $post['list_id'] : null;
            $hash = isset($post['hash']) ? $post['hash'] : null;
            $list_id = isset($post['favorites']) ? 'favorites' : $list_id;
            if (!$msgid && !$list_id && $hash) {
                $mList = \app\models\Lists::findOne(['`md5`' => strtolower($hash)]);
                if ($mList) {
                    $list_id = $mList->id;
                }
            }

            $title = $post['title'];
            $time = date('Y-m-d H:i:s');
            $structures = 0;

            $list = new Lists;
            $list->name = HtmlPurifier::process($title);
            $list->date = $time;
            $list->structures = $structures;
            $list->md5 = md5(Yii::$app->user->id . '.' . $time);
            $list->user_id = Yii::$app->user->id;
            if (!($list->validate() && $list->save())) {
                $return['message'] = 'Database error.';
                $return['success'] = false;
            }

            $data = ['data' => []];
            if (isset($post['idList']) && is_array($post['idList'])) {
                //$data = ['data' => []];
            } else
            if ($msgid) {
                $data = SearchHelper::getResult($msgid, null, true);
            } else
            if ($list_id) {
                $data = SearchHelper::getResult(null, $list_id, true);
            }

            $ListsStructureBatch = [];
            if (isset($post['markedall']) && $post['markedall'] == 'true') {
                if (isset($post['antiIdList'])) {
                    foreach ($data['data'] as $aStructure) {
                        $cd_id = (int)ltrim($aStructure['idnumber'], 'CS0');
                        if (!in_array($cd_id, $post['antiIdList'])) {
                            $ListsStructureBatch[] = [
                                $list->id,
                                $cd_id
                            ];
                            $structures++;
                        }
                    }
                } else {
                    foreach ($data['data'] as $aStructure) {
                        $ListsStructureBatch[] = [
                            $list->id,
                            (int)ltrim($aStructure['idnumber'], 'CS0')
                        ];
                    }
                    $structures = count($data['data']);
                }
            } else
            if (isset($post['idList']) && is_array($post['idList'])) {
                foreach ($post['idList'] as $cd_id) {
                    $ListsStructureBatch[] = [
                        $list->id,
                        (int)$cd_id
                    ];
                }
                $structures = count($post['idList']);
            } else {
                foreach ($data['data'] as $aStructure) {
                    $ListsStructureBatch[] = [
                        $list->id,
                        (int)ltrim($aStructure['idnumber'], 'CS0')
                    ];
                }
                $structures = count($data['data']);
            }

            Yii::$app->db->createCommand()
                ->batchInsert(ListsStructure::tableName(),['list_id','cd_id'],$ListsStructureBatch)
                ->execute();

            $list->structures = $structures;
            $list->save(false);
        }

        return $return;
    }

    public function actionRemovelist($id)
    {
        Yii::$app->response->format = 'json';
        $return = ['status' => 'success', 'message' => ''];

        $list = Lists::find()->where(['id' => $id, 'user_id' => Yii::$app->user->id]);
        if (Yii::$app->user->isGuest || !($list->one())) {
            $return['status'] = 'denied';
            $return['message'] = 'Access denied.';
        } else {
            ListsStructure::deleteAll(['list_id' => $list->one()->id]);
            $list->one()->delete();
            $return['message'] = 'List is successfully deleted.';
        }
        return $return;
    }

    public function actionAddfavorite($id)
    {
        Yii::$app->response->format = 'json';
        $return = ['starred' => false, 'message' => ''];

        if (Yii::$app->user->isGuest) {
            return $this->populateData($return, 'message', 'User must be logged in to manage favorites');
        }

        if (!MainData::findOne($id)) {
            return $this->populateData($return, 'message', 'Incorrect structure id');
        }

        $arr = new Favorites();
        $arr->user_id = Yii::$app->user->id;
        $arr->cd_id = $id;
        $return['title'] = 'Remove from my favorites';
        if ($arr->save() !== false) {
            $return['starred'] = true;
            return $this->populateData($return, 'message', 'Structure added to favorites');
        } else {
            $return['starred'] = true;
            return $this->populateData($return, 'message', 'Structure already in favorites');
        }
    }

    public function actionRemovefavorite($id)
    {
        Yii::$app->response->format = 'json';
        $return = ['starred' => false, 'message' => ''];

        if (Yii::$app->user->isGuest) {
            return $this->populateData($return, 'message', 'User must be logged in to manage favorites');
        }

        if (!MainData::findOne($id)) {
            return $this->populateData($return, 'message', 'Incorrect structure id');
        }

        $return['title'] = 'Add to my favorites';
        if (Favorites::deleteAll("user_id = " . Yii::$app->user->id . " AND cd_id = {$id}")) {
            return $this->populateData($return, 'message', 'Structure removed from favorites');
        } else {
            return $this->populateData($return, 'message', 'Structure not in favorites list');
        }
    }

    public function actionAddpreferred($id)
    {
        Yii::$app->response->format = 'json';
        $return = ['starred' => false, 'message' => ''];

        if (Yii::$app->user->isGuest) {
            return $this->populateData($return, 'message', 'User must be logged in to use personal list of preferred suppliers');
        }

        if (!Supplier::findOne($id)) {
            return $this->populateData($return, 'message', 'Incorrect supplier id');
        }

        $arr = new Preferred();
        $arr->user_id = Yii::$app->user->id;
        $arr->supplier_id = $id;
        $return['title'] = 'Remove from my preferred suppliers';
        if ($arr->save() !== false) {
            $return['starred'] = true;
            return $this->populateData($return, 'message', 'Supplier added to preferred');
        } else {
            $return['starred'] = true;
            return $this->populateData($return, 'message', 'Supplier already in preferred list');
        }
    }

    public function actionRemovepreferred($id)
    {
        Yii::$app->response->format = 'json';
        $return = ['starred' => false, 'message' => ''];

        if (Yii::$app->user->isGuest) {
            return $this->populateData($return, 'message', 'User must be logged in to use personal list of preferred suppliers');
        }

        if (!Supplier::findOne($id)) {
            return $this->populateData($return, 'message', 'Incorrect supplier id');
        }

        $return['title'] = 'Add to my preferred suppliers';
        if (Preferred::deleteAll("user_id = " . Yii::$app->user->id . " AND supplier_id = {$id}")) {
            return $this->populateData($return, 'message', 'Supplier removed from preferred list');
        } else {
            return $this->populateData($return, 'message', 'Supplier not in preferred list');
        }
    }

    public function actionRate($id, $param)
    {
        Yii::$app->response->format = 'json';
        $return = ['message' => ''];

        if (Yii::$app->user->isGuest) {
            return $this->populateData($return, 'message', 'User must be logged in to rate suppliers');
        }

        if (!($supplier = Supplier::findOne($id))) {
            return $this->populateData($return, 'message', 'Incorrect supplier id');
        }

        $r = Rating::findOne(['supplier_id' => $id, 'user_id' => Yii::$app->user->id]);
        if (!$r)
            $r = new Rating;
        $r->supplier_id = $id;
        $r->user_id = Yii::$app->user->id;
        $r->mark = $param;
        $r->save();

        \components\summary::recalcRating($id);
        $supplier->refresh();
        $return['rating'] = $supplier->rating + 0;
        return $this->populateData($return, 'message', 'Your vote has been stored');
        return $return;
    }

    /*
     * Account user password
     */

    public function actionReturnuserpassword($id, $password = '')
    {
        $get = Yii::$app->request->get();
        $newPassword = $password;

        if (Yii::$app->request->validateCsrfToken($get['_csrf'])) {

            if ($newPassword && $id == Yii::$app->user->id) {
                $mUser = (new User())->findOne(['user_id' => Yii::$app->user->id]);

                $valid = Yii::$app->security->validatePassword($newPassword, $mUser->hash);
                /* now we apply the new password immediately */
                if (!$valid) {
                    $mUser->hash = Yii::$app->security->generatePasswordHash($newPassword);
                    $mUser->save(false);
                    return $id;
                }
            }
        }
        return false;
    }

    /*
     * Account delivery/payment addresses
     */

    public function actionRemovecustomeraddresscard($id)
    {
        return $id;
    }

    public function actionSetdefaultaddress($id, $status)
    {
        return $id;
    }

    /*
     * Account my group list - change user status
     */

    public function actionChangegroupuserstatus($id, $status)
    {
        return $id;
    }

    /**
     * Обрабатывает Enquire action
     * @return array
     */
    public function actionEnquire()
    {
        Yii::$app->response->format = 'json';
        $model = new \app\models\Enquire();
        $user = null;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->autoRegister && Yii::$app->user->isGuest) {
                $model->setScenario('register');
            }
            $ret = ActiveForm::validate($model);
            if (empty($ret)) {
                if ($model->scenario == 'register') {
                    $user = new User();
                    $user->setScenario('register');
                    $user->useCaptcha = false;
                    $user->setAttributes($model->getAttributes());
                    $user->newPassword = $model->newPassword;
                    $user->newPasswordConfirm = $model->newPasswordConfirm;
                    $user->company_name = $model->company;
                    $uRet = ActiveForm::validate($user);
                    $ret += $uRet;
                    if (empty($ret)) {
                        $user->save(false);
                        $user::afterRegister($user);
                        $ret['registered'] = "<h2>Registration completed successfully</h2>Thank you for registering on chem-space.com. To finalize the registration click on the link in the email "
                                . "you receive from us or enter confirmation code from the email " . Html::a("here", Url::to(['user/register/confirm']));
                    }
                }
                if (empty($ret)) {
                    $model->save(false);

                    if (!$user && !Yii::$app->user->isGuest) {
                        $user = User::findOne(Yii::$app->user->id);
                    }
                    $model = \app\models\Enquire::findOne($model->enquire_id);
                    $mItem = $model->item;
                    if ($mItem) {
                        $response = Yii::$app->crmconnect->push('create_new_enquire',
                                $data = [
                            'enquire_id'            => (int) $model->enquire_id,
                            'user_id'               => (int) $user->user_id,
                            'email'                 => $user->email,
                            'first_name'            => $user->first_name,
                            'last_name'             => $user->last_name,
                            'phone'                 => $user->phone,
                            'company_name'          => $model->company,
                            'country_id'            => (int) $model->country_id,
                            'state'                 => $model->state,
                            'city'                  => $model->city,
                            'address'               => $model->address,
                            'message'               => $model->message,
                            'item_id'               => (int) $model->item_id,
                            'cd_id'                 => (int) $mItem->cd_id,
                            'vendor_item'           => $mItem->vendor_item,
                            'vendor_str_code'       => $mItem->vendor_str_code,
                            'pack_size'             => (float) $mItem->pack_size,
                            'uom'                   => $mItem->uom,
                            'count'                 => 1,
                            'currency'              => $user->currency,
                            'supplier_id'           => (int) $mItem->supplier_id,
                            'lead_time'             => (int) $mItem->getLead_time(),
                            'name'                  => $mItem->name,
                            'description'           => $mItem->description,
                            'purity'                => (float) $mItem->purity,
                            'transport_temp'        => (int) $mItem->transport_temp, //id
                            'transport_temperature' => ($mItem->transport_temp ? $mItem->transportTempArr->temperature : ''),
                            'iata_id'               => (int) $mItem->iata_id,
                            'iata_unno'             => (int) ($mItem->iata_id ? $model->iata->unno : 0),
                            'iata_packgr'           => (int) ($mItem->iata_id ? $model->iata->packgr : 0),
                            'iata_noair'            => (int) ($mItem->iata_id ? $model->iata->noair : 0),
                            'iata_excqgr'           => ($mItem->iata_id ? $model->iata->excqgr : ''),
                            'enquire_date'          => $model->date,
                                ], true);
                        if (!$response) {
//                        print_r( Yii::$app->crmconnect->getErrors() );die;
                        }
                    }

                    $model->sendmail();
                }
            }
            return $ret;
        }
        return [];
    }

    public function actionState_list($id)
    {
        Yii::$app->response->format = 'json';
        return \app\models\State::find()->where(['country_id' => $id])->orderBy('state_name')->select('state_id, state_name')->asArray()->all();
    }

    private function populateData($arr, $key, $val)
    {
        $arr[$key] = $val;
        return $arr;
    }

    // Cart actions

    public function actionAddtocart($id, $param)
    {
        Yii::$app->response->format = 'json';
        return ['count' => Item::putInCart($id, $param)];
    }

    public function actionRemovefromcart($id)
    {
        $cart = Yii::$app->cart;
        $ret = [];
        if (Yii::$app->request->post('hash') != $cart->getHash())
            $ret['reload'] = true;
        $cart->removeById($id)->save(true);
        $ret['hash'] = $cart->getHash();

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return $ret;
        }
        $this->redirect('/cart/');
    }

    public function actionSetquantity($id, $param)
    {
        $cart = Yii::$app->cart;
        $ret = ['reload' => false];
        if (Yii::$app->request->post('hash') != $cart->getHash())
            $ret['reload'] = true;

        if ($position = $cart->getPositionById($id)) {
            $cart->update($position, $param);
        } else {
            if ($i = Item::findOne($id)) {
                $position = $i->getCartPosition();
                $cart->put($position, $param);
            } else {
                $ret['reload'] = true;
            }
        }
        $ret['quantity'] = $position->getQuantity();
        if (!Yii::$app->request->isAjax) {
            $this->redirect('/cart/');
        }
        if ($cart->error)
            $ret['message'] = $cart->error;

        $cart->save(TRUE);
        $ret['hash'] = $cart->getHash();
        if (!$ret['reload']) {
            $currency = in_array(Yii::$app->request->post('currency'), Yii::$app->params['currencyList']) ? Yii::$app->request->post('currency') : Yii::$app->params['currency'];
            $ret['sum'] = $position->getCost($currency, true);
        }
        Yii::$app->response->format = 'json';
        return $ret;
    }

    public function actionSwitchitems($id, $param)
    {
        $ret = [];
        $cart = Yii::$app->cart;
        if ($id != $param && $from = $cart->getPositionById($id)) {
            $sizes = $from->getItem()->toArray(['dummy'], ['sizes'])['sizes'];
            $quantity = $from->getQuantity();
            $to = null;
            if (isset($sizes[$param])) {
                $to = Item::findOne($param)->getCartPosition();
                $cart->put($to, $quantity);
                $to = clone $cart->getPositionById($param);
                // $cart->removeById($param);
            }
            $new = [];
            foreach ($cart->getPositions() as $k => $v) {
                if ($k == $id && $to)
                    $new[$param] = $to;
                elseif ($k == $param && $to)
                    continue;
                else
                    $new[$k] = $v;
            }
            $cart->removeById($id);
            $cart->setPositions($new);
        }
        $cart->save(TRUE);
        if ($cart->error)
            $ret['message'] = $cart->error;

        if (in_array(Yii::$app->request->post('cur', '-'), array_keys(Yii::$app->params['currencyList'])))
            Yii::$app->params['currency'] = Yii::$app->request->post('cur');

        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->cartItems(['item_id' => ['-1' => 0] + array_keys(Yii::$app->cart->getPositions())]);

        $this->layout = false;
        Yii::$app->response->format = 'json';
        return $ret + ['table' => $this->render('/cart/_sub/table',
                    [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider
        ])];
    }

    public function actionCheckout()
    {
        Yii::$app->response->format = 'json';
        $this->layout = false;

        $cart = Yii::$app->cart;
        $ret = [];
        $currency = Yii::$app->params['currency'] = Yii::$app->request->post('cur', '-');
        if (Yii::$app->request->post('hash') != $cart->hash) {
            $ret['message'] = Yii::t('cart', 'cart-changed-outside');
            $searchModel = new ItemSearch();
            $dataProvider = $searchModel->cartItems(['item_id' => ['-1' => 0] + array_keys(Yii::$app->cart->getPositions())]);
            $ret['table'] = $this->render('/cart/_sub/table',
                    [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider
            ]);
        } elseif (!isset(Yii::$app->params['currencyList'][$currency])) {
            $ret['message'] = 'Incorrect currency';
        } elseif ($cart->hasEmptyPrice($currency)) {
            $ret['message'] = Yii::t('cart', 'cart-has-empty-price', ['currency' => strtoupper($currency)]);
        } else {
            $cart->setCheckoutStage(1)->setCheckoutCurrency($currency);
            $cart->save(TRUE);
            $ret['redirect'] = ArrayHelper::getValue(Yii::$app->params, 'cart_redirect_to_checkout') ? '/checkout/' : '';
            $ret['result'] = true;
        }
        return $ret;
    }

    public function actionCart($currency)
    {
        if (!isset(Yii::$app->params['currencyList'][$currency]))
            throw new \yii\web\BadRequestHttpException('Incorrect currency');
        Yii::$app->response->format = 'json';
        return [
            'count'   => Yii::$app->cart->getCount(),
            'cost'    => Yii::$app->cart->getCost($currency, Cart::FORMAT_WITH_DECIMAL),
            'rounded' => Yii::$app->cart->getCost($currency, Cart::FORMAT_CART),
            'symbol'  => Yii::$app->params['currencyList'][$currency]['symbol']
        ];
    }

    public function actionAddaddress()
    {
        Yii::$app->response->format = 'json';
        $model = new SavedAddresses();
        $ret = [];
        if (Yii::$app->request->isPost && Yii::$app->request->isAjax && $model->load(Yii::$app->request->post(), '')) {
            $model->user_id = Yii::$app->user->id;
            if ($model->save()) {
                $ret['message'] = 'Address has been saved';
                $ret['html'] = SavedAddresses::getAddresses(Yii::$app->user->id, $model->address_type, SavedAddresses::ADDRESS_LIST_WIDGET);
            } else {
                $ret['error'] = 1;
                $ret['message'] = implode('<br>', array_unique($model->getFirstErrors()));
            }
        }
        return $ret;
    }

    public function actionRemovefromshipment($id)
    {
        $f = Yii::$app->getFormatter();

        $cart = Yii::$app->cart;
        $ret = [];

        if (!$cart->hasPosition($id) || $cart->checkoutStage < 3 || !($order = $cart->getOrderPositionById($cart->getPositionById($id)->supplier_id)))
            $ret['reload'] = true;
        else {
            if (Yii::$app->request->isAjax && Yii::$app->request->post('hash') != $cart->hash)
                $ret['reload'] = true;
            $shipment = $cart->shipments[$cart->getPositionById($id)->getShipment_id()];
            $cart->removeById($id)->save();
            $cart->fillShipmentData();
            if ($cart->isEmpty) {
                $ret['reload'] = true;
            } else {
                if ($order->isEmpty())
                    $ret['deleteOrder'] = true;
                if ($cart->shipmentWasMerged) {
                    $ret['html'] = $order->getShipmentsHtml();
                    if (!$ret['html'])
                        $ret['deleteOrder'] = true;
                } else {
                    $ret['delete'] = $id;
                    if (!$shipment->isEmpty) {
                        $ret['replace']['cost'] = $f->asDecimal($order->cost, 2);
                        $ret['replace']['totalShipment'] = $f->asDecimal($order->totalShipment, 2);
                        $ret['replace']['shipment-' . $shipment->shipment_id . '-total_count'] = $shipment->total_count . ' item' . ($shipment->total_count == 1 ? '' : 's');
                        $ret['replace']['shipment-' . $shipment->shipment_id . '-cost'] = $f->asDecimal($shipment->cost, 2);
                        $ret['replace']['shipment-' . $shipment->shipment_id . '-delivery_cost'] = $f->asDecimal($shipment->totalDeliveryCost, 2);
                        $ret['replace']['shipment-' . $shipment->shipment_id . '-delivery'] = $shipment->delivery . ' day' . ($shipment->delivery == 1 ? '' : 's');
                        $ret['splittable'] = $shipment->isSplittable ? 1 : 0;
                    }
                    $ret['shipmentWasDeleted'] = $cart->shipmentWasDeleted;
                }
            }
            $ret['hash'] = $cart->getHash();
            $ret['shipment_hash'] = $cart->shipment_hash;
        }

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return $ret;
        }
        $this->redirect(['checkout/shipment']);
    }

    public function actionMerge()
    {
        $ret = [];
        $cart = Yii::$app->cart;
        $maxDelivery = 0;
        $mergedId = 0;
        if (
                $cart->isEmpty ||
                !is_array($ids = Yii::$app->request->post('shipments')) ||
                !is_numeric($supplier = Yii::$app->request->post('supplier')) ||
                !($order = $cart->getOrderPositionById($supplier)) ||
                Yii::$app->request->post('hash') != $cart->hash ||
                $cart->checkoutStage < 3
        ) {
            $ret['reload'] = true;
        } else {
            $p = [];
            foreach ($cart->getPositions() as $id => $position) {
                if (!in_array($position->getShipment_id(), $ids) || $position->supplier_id != $supplier)
                    continue;
                $p[] = $id;
                if ($position->delivery > $maxDelivery) {
                    $maxDelivery = $position->delivery;
                    $mergedId = $position->getShipment_id();
                }
            }
            if ($mergedId) {
                foreach ($p as $id) {
                    $cart->getPositionById($id)->setShipment_id($mergedId);
                }
                $cart->getShipmentPositionById($mergedId)->delivery = $maxDelivery;
            }
            $cart->recalcShipments();
            $cart->fillShipmentData();
            $cart->checkoutStage = 3;
            $cart->recalcHash();

            $ret['html'] = $order->getShipmentsHtml();
            if (!$ret['html'])
                $ret['deleteOrder'] = true;

            $ret['hash'] = $cart->getHash();
            $ret['shipment_hash'] = $cart->shipment_hash;
        }
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return $ret;
        }
        $this->redirect(['checkout/shipment']);
    }

    public function actionSplit()
    {
        $ret = [];
        $cart = Yii::$app->cart;
        $maxDelivery = 0;
        $mergedId = 0;
        $cart->fillShipmentData();
        if (
                $cart->isEmpty ||
                !is_array($ids = Yii::$app->request->post('shipments')) ||
                !is_numeric($supplier = Yii::$app->request->post('supplier')) ||
                !($order = $cart->getOrderPositionById($supplier)) ||
                Yii::$app->request->post('hash') != $cart->hash ||
                $cart->checkoutStage < 3
        ) {
            $ret['reload'] = true;
        } else {
            $p = [];
            foreach ($cart->getPositions() as $id => $position) {
                if (!in_array($position->getShipment_id(), $ids) || $position->supplier_id != $supplier)
                    continue;
                $position->setShipment_id(null);
                $p[] = $id;
            }
            foreach ($p as $id) {
                $cart->assignShipment($cart->getPositionById($id));
            }
            $cart->recalcShipments();
            $cart->fillShipmentData();
            $cart->checkoutStage = 3;
            $cart->recalcHash();

            $ret['html'] = $order->getShipmentsHtml();
            if (!$ret['html'])
                $ret['deleteOrder'] = true;

            $ret['hash'] = $cart->getHash();
            $ret['shipment_hash'] = $cart->shipment_hash;
        }
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = 'json';
            return $ret;
        }
        $this->redirect(['checkout/shipment']);
    }

    public function actionGet_option($key)
    {
        Yii::$app->response->format = 'json';

        /* @var $model User */
        return ['key' => $key, 'value' => !Yii::$app->user->isGuest && ($model = Yii::$app->user->identity) && $model->options->canGetProperty($key) ? $model->options->$key : null];
    }

    public function actionSet_option($key, $value)
    {
        Yii::$app->response->format = 'json';
        $ret = ['key' => $key, 'success' => false];

        /* @var $model User */
        if (!Yii::$app->user->isGuest && ($model = Yii::$app->user->identity) && $model->options->canSetProperty($key)) {
            $model->options->$key = $value;
            $model->save();
            $ret['success'] = true;
            $ret['value'] = $model->options->$key;
        }
        return $ret;
    }

}
