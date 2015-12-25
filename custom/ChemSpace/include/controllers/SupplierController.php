<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\models\Item;
use app\models\Review;
use app\models\ReviewSearch;
use app\models\Supplier;
use app\models\SupplierSearch;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\modules\user\models\User;

class SupplierController extends Controller
{

    public function beforeAction($action)
    {
        Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['supplier/index']];
        return parent::beforeAction($action);
    }

    /**
     * Lists all Supplier models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'markup';
        $searchModel = new SupplierSearch();
        $dataProvider = $searchModel->search(array_merge(Yii::$app->request->queryParams,
                        ['active' => 1]));

        return $this->render('index',
                        [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($supplier_id)
    {
        $review = new Review();
        $review->show_name = 1;
        $review->supplier_id = $supplier_id;

        if (Yii::$app->request->isPost && $review->load(Yii::$app->request->post())) {
            $review->setScenario('insert');
            if (Yii::$app->request->isAjax && Yii::$app->request->post('ajax') == 'Review') {
                Yii::$app->response->format = Response::FORMAT_JSON;
                $ret = ActiveForm::validate($review);
                if (empty($ret)) {
                    $review->save(false);
                    $review->sendReviewNotification();
                }
                return $ret;
            } else {
                if ($review->save()) {
                    Yii::$app->getSession()->setFlash('review-sent',
                            Yii::t('supplier', 'review-sent'));
                    return $this->refresh('#Reviews');
                }
            }
        }
        $searchModel = new ReviewSearch();
        $dataProvider = $searchModel->search(['supplier_id' => $supplier_id, 'status' => 1]);

        if (Yii::$app->getRequest()->isAjax && Yii::$app->getRequest()->get('ajax') == 'review') {
            $this->layout = false;
            return $this->render('_reviews',
                            ['dataProvider' => $dataProvider, 'onlyReview' => true]);
        }

        $mSupplier = $this->findModel($supplier_id);

        return $this->render('view',[
            'userOptions'  => ['view', 'searchPerPage'],
            'model'        => $mSupplier,
            'review'       => $review,
            'dataProvider' => $dataProvider,
            'PaymentList'  => $mSupplier->getPaymentArrayList(),
        ]);
    }

    public function actionJoin()
    {
        $this->view->params['breadcrumbs'][] = 'Join in';

        // Already
        if (!Yii::$app->user->isGuest && ($already = Supplier::findOne(['user_id' => Yii::$app->user->id]))) {
            return $this->render('join/already',
                            ['companyName' => $already->supplier_name]);
        }

        if (Yii::$app->getUser()->isGuest) {
            return $this->joinUnregistered();
        } else {
            return $this->joinRegistered();
        }
    }

    private function joinRegistered()
    {
        $model = new Supplier();
        if (Yii::$app->request->isPost) {
            // Take only fields from 'add' scenario
            $model->setScenario('add');
            if ($model->load(Yii::$app->request->post())) {
                $model->enquire_email = $model->email;
                if( $model->save() ){
                    Yii::$app->getSession()->setFlash('joinComplete',
                        $model->supplier_name);
                    $model->sendJoinNotification();
                    $this->redirect(['supplier/join_success']);
                    // Yii::$app->response->refresh();
                }
            }
        }
        return $this->render('join', ['model' => $model]);
    }

    public function actionJoin_success()
    {
        if (($companyName = Yii::$app->getSession()->getFlash('joinComplete'))) {
            return $this->render('join/success', ['companyName' => $companyName]);
        }
        $this->redirect(['supplier/join']);
    }

    private function joinUnregistered()
    {
        $supplier = new Supplier();
        $user = new User();
        $user->setScenario('register');
        $supplier->setScenario('add');
        if (Yii::$app->request->isPost && $user->load(Yii::$app->request->post()) && $supplier->load(Yii::$app->request->post())) {
            $supplier->enquire_email = $supplier->email;
            $user->country_id = $supplier->country_id;
            $user->company_name = $supplier->supplier_name;

            // dummy for pre-validation
            $supplier->setAttribute('user_id', -1);

            $a = $supplier->validate();
            $b = $user->validate();

            if ($a && $b) {
                $user->save(false);
                $supplier->user_id = $user->user_id;
                $supplier->save(false);
                $response = Yii::$app->crmconnect->push('register_new_supplier',$data=[
                    'supplier_id' => $supplier->supplier_id,
                    'supplier_name' => $supplier->supplier_name,
                    'email' => $supplier->email,
                    'country_id' => $supplier->country_id,
                    'city' => $supplier->city,
                    'address' => $supplier->address,
                    'zip' => $supplier->zip,
                    'phone' => $supplier->phone,
                    'web' => $supplier->web,
                    'reg_date' => $supplier->reg_date,
                ],true);
                if( !$response ){
//                        print_r( Yii::$app->crmconnect->getErrors() );die;
                }

                $m = Yii::$app->getModule("user")->model("User");
                $m::afterRegister($user);
                Yii::$app->getSession()->setFlash('RegisterNeedEmailConfirm');
                Yii::$app->getSession()->setFlash('joinComplete');
                $this->redirect(['user/register/joined']);
            }
        }

        $user->newPassword = $user->newPasswordConfirm = $user->captcha = '';
        return $this->render('registerAndJoin',['supplier' => $supplier, 'user' => $user]);
    }

    public function actionData($supplier_id)
    {
        $model = $this->findModel($supplier_id);

        $h = new \app\models\ItemHelper();
        $h->filterData('supplier-id', ['supplier_id' => $model->supplier_id]);
        $h->filterData('supplier-group-items', Yii::$app->request->get());
        $h->exportGrouppedData();
        Yii::$app->response->format = 'json';
        $ret = \components\SearchHelper::getSupplierGrouppedResult();
        $ret['totalFound'] = $model->cd_count;
        $ret['limitValues'] = $h->getGrouppedLimitValues();
        $ret['status'] = 21;
        $ret['currency'] = Yii::$app->params['currencyList'][$h->getAttrByScenario('supplier-group-items','currency')];

        return $ret;
    }

    /**
     * Finds the Supplier model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Supplier::findOne(['supplier_id' => $id, 'active' => 1])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEnquire()
    {
        Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Enquire item'];
        if (Yii::$app->getSession()->getFlash('enquire')) {
            return $this->render('enquire-success');
        }
        $model = new \app\models\Enquire();

        if (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        } elseif (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->save() && empty($model->errors)) {
                    $model->sendmail();
                    Yii::$app->getSession()->setFlash('enquire');
                    Yii::$app->response->refresh();
                }
            }
        } else {
            $item_id = Yii::$app->request->get('item_id');
            if (!($item = Item::findOne($item_id))) {
                throw new \yii\web\BadRequestHttpException('Incorrect item ID');
            }
            $model->item_id = $item->item_id;
            $model->currency = Yii::$app->params['currency'];
        }

        return $this->render('enquire',
                        [
                    'enquire' => $model,
        ]);
    }

}
