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

class HtmlController extends Controller
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

    public function actionContent( $route )
    {
        $filename = $route.'.html';
        $filepath = realpath('.').DIRECTORY_SEPARATOR.'development'.DIRECTORY_SEPARATOR.'tmp_html'.DIRECTORY_SEPARATOR.$filename;
        if( !is_readable($filepath) ){
            throw new \yii\web\NotFoundHttpException;
        }

        $this->layout = 'empty';
        return $this->render('content', ['data' => file_get_contents($filepath)]);
    }
}
