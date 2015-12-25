<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
// use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Content;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{

    public $config;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [[
                'actions' => ['logout'],
                'allow'   => true,
                'roles'   => ['@'],],],],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => ['logout' => ['post'],],],];
    }

    public function actions()
    {
        return [
            'error'   => ['class' => 'yii\web\ErrorAction',],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,],];
    }

    public function actionIndex()
    {
        $this->layout = 'markup';
        Yii::$app->view->params['html'] = ['id' => 'page-index'];
        return $this->render('index');
    }

    public function actionTest()
    {
        $this->layout = 'chem';
        // $smiles ='CC(N1C(=O)NC(C)(C1=O)c2ccc(Cl)cc2)C(=O)Nc3ccc(Oc4ccccc4)cc3';

        $smiles = 'Br.BrCc1cccnc1';

        $data = [
            'smiles'    => $smiles,
            'name'      => \jnode\Tools::convert($smiles, 'cxsmiles', 'name'),
            'inchi'     => \jnode\Tools::convert($smiles, 'cxsmiles',
                    'inchi:AuxNone'),
            'inchi_key' => \jnode\Tools::convert($smiles, 'cxsmiles', 'inchikey'),
            'iname'     => \jnode\Tools::convert($smiles, 'cxsmiles', 'name:i'),
            'tname'     => \jnode\Tools::convert($smiles, 'cxsmiles', 'name:t'),
            'logp'      => \jnode\Tools::logp($smiles, 'cxsmiles'),
            'mrv'      => \jnode\Tools::convert($smiles,'cxsmiles', 'mrv'),
            'mrv_a'      => \jnode\Tools::convert($smiles,'cxsmiles', 'mrv:-a'),
            'cml'      => \jnode\Tools::convert($smiles,'cxsmiles', 'cml'),
            'cml_a'      => \jnode\Tools::convert($smiles,'cxsmiles', 'cml:-a'),
            'mol'      => \jnode\Tools::convert($smiles,'cxsmiles', 'mol'),
            'mol_v3'      => \jnode\Tools::convert($smiles,'cxsmiles', 'mol:V3'),
        ];


        return $this->render('test', $data);
    }

    public function _actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', ['model' => $model,]);
        }
    }

    public function _actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', ['model' => $model,]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about', [ 'params' => ['kuku']]);
    }

    public function actionContent($alias)
    {
        $data = Content::findOne(['alias' => $alias]);
        if (!$data) {
            throw new \yii\web\NotFoundHttpException;
        }
        $this->view->params['html'] = ['id' => empty($data->id) ? 'page-about' : $data->id];
        $this->layout = 'markup';
        return $this->render('content', ['data' => $data]);
    }
}
