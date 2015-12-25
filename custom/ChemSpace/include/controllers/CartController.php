<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Item;
use app\models\Order;
use app\models\ItemSearch;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\modules\user\models\User;
use RomMcR\Utils\U;

class CartController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->view->params['breadcrumbs'][] = $action->id == 'index' ? 'Shopping cart' : ['label' => 'Shopping cart', 'url' => '/cart/'];
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $session = Yii::$app->getSession();

        /* @var $dataProvider ActiveDataProvider */
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->cartItems(['item_id' => ['-1' => 0] + array_keys(Yii::$app->cart->getPositions())]);

        if (Yii::$app->getRequest()->referrer && strpos(Yii::$app->getRequest()->referrer, Yii::$app->getRequest()->getHostInfo() . '/cart') !== 0) {
            if (preg_match("/" . str_replace("/", "\/", Yii::$app->getRequest()->getHostInfo()) . "(\/search\/[a-f0-9\-]{32})?\/CSC[0-9]{9}\.html/i",
                            Yii::$app->getRequest()->referrer)) {
                $session->set('cartContinueUrl', Yii::$app->getRequest()->referrer);
            } else {
                $session->remove('cartContinueUrl');
            }
        }
        $continueUrl = Yii::$app->getSession()->get('cartContinueUrl', Yii::$app->getRequest()->getHostInfo() . '/search/');

        return $this->render('index',
                        [
                    'continueUrl'  => $continueUrl,
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionSuccess()
    {
        $session = Yii::$app->getSession();
        Yii::$app->view->title = 'Shopping cart';
        if ($session->hasFlash('order-enquired')) {
            $m = $session->getFlash('order-enquired');
            return $this->render('/site/message',
                            [
                        'h1'   => $m['suppliers'] . ' message' . ($m['suppliers'] == 1 ? ' has' : 's have' ) . ' been sent',
                        'text' => 'We have sent the enquiry for ' . U::pluralFormEn($m['items'], 'item') . ' on your behalf. You will be contacted by suppliers regarding your request.',
                        'a'    => ['href' => '/', 'text' => 'Go to main']
            ]);
        }
        else {
            $this->redirect('/cart/');
        }
    }

    public function actionShow()
    {
        var_dump(Yii::$app->cart);
    }

    public function actionFill()
    {
        /* @var $cart components\cart\Cart */
        $cart = Yii::$app->cart;
        $cart->clear();
/*
        $cart->put(Item::findOne(1)->getCartPosition());
        $cart->put(Item::findOne(289)->getCartPosition(), 7);
        $cart->put(Item::findOne(3163736)->getCartPosition(), 2);
        $cart->put(Item::findOne(3163737)->getCartPosition(), 5);
        $cart->put(Item::findOne(3163739)->getCartPosition(), 21);
        $cart->put(Item::findOne(3163738)->getCartPosition(), 4);
        $cart->put(Item::findOne(3289086)->getCartPosition(), 12);
        $cart->put(Item::findOne(3100042)->getCartPosition(), 5);
        $cart->put(Item::findOne(3100047)->getCartPosition(), 6);
        $cart->put(Item::findOne(3249110)->getCartPosition(), 3);
        $cart->put(Item::findOne(3249111)->getCartPosition(), 3);
        $cart->put(Item::findOne(13286709)->getCartPosition(), 3);
        $cart->put(Item::findOne(13286710)->getCartPosition(), 2);
 *
 */
        $cart->put(Item::findOne(997970)->getCartPosition(), 3);
        $cart->put(Item::findOne(3525053)->getCartPosition(), 2);
        $cart->put(Item::findOne(3734007)->getCartPosition(), 1);
        $this->redirect('/cart/');
    }

    public function actionCheckout()
    {
        $cart = Yii::$app->cart;
        if ($cart->getCheckoutStage()) {
            die('Checkout accepted in ' . strtoupper($cart->getCheckoutCurrency()));
        } else {
            die('Something went wrong. Please check your cart ' . \yii\helpers\Html::a('here', '/cart/'));
        }
    }

    public function actionEnquire()
    {
        $session = Yii::$app->getSession();

        $cart = Yii::$app->cart;
        if (!$cart->getCheckoutStage()) {
            return $this->render('/site/message', ['h1' => 'You must confirm cart positiions', 'a' => ['href' => '/cart/', 'text' => 'Go to cart']]);
        }

        $model = new Order();
        $model->setScenario('insert');
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if ($model->autoRegister && Yii::$app->user->isGuest) {
                $model->setScenario('register');
            }

            if ($model->validate()) {
                $flag = true;
                if ($model->scenario == 'register') {
                    $flag = false;
                    $user = new User();
                    $user->setScenario('register');
                    $user->useCaptcha = false;
                    $user->setAttributes($model->getAttributes());
                    $user->newPassword = $model->newPassword;
                    $user->newPasswordConfirm = $model->newPasswordConfirm;
                    $user->company_name = $model->company;
                    $user->currency = Yii::$app->cart->checkoutCurrency;
                    if ($user->save()) {
                        $user::afterRegister($user);
                        $flag = true;
                    }
                }
                if ($flag) {
                    $model->save(false);
                    $model->sendMail();
                    $cart = Yii::$app->cart;
                    $session->setFlash('RegisterNeedEmailConfirm');
                    $session->setFlash('order-enquired',
                            [
                        'items'        => $cart->count,
                        'suppliers'    => $cart->supplierCount,
                        'autoRegister' => $model->autoRegister
                    ]);
                    $cart->clear();
                    return $this->redirect($model->scenario == 'register' ? ['user/register/confirm'] : '/cart/success');
                }
            }
        } elseif (!Yii::$app->getUser()->isGuest) {
            $model->load(Yii::$app->getUser()->identity->getAttributes(), '');
            $model->company = Yii::$app->getUser()->identity->company_name;
        }

        return $this->render("enquire", ['model' => $model]);
    }

    public function actionGet()
    {
        var_dump(Yii::$app->cart);
    }

}
