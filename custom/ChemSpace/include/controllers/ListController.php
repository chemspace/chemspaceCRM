<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\models\Lists;
use app\models\Region;

class ListController extends Controller
{
    public function actionIndex( $id, $mList=null )
    {
        if( $id=='favorites' && Yii::$app->user->isGuest ){
            throw new NotFoundHttpException;
        }elseif( $id!='favorites' ){
            if( $mList===null ){
                $mList = Lists::findOne(['`user_id`'=>Yii::$app->user->id, '`id`'=>$id]);
            }
            if( !$mList ){
                throw new NotFoundHttpException;
            }
        }

        Yii::$app->view->params['html'] = ['id' => $id=='favorites' ? 'page-my-favourites' : 'page-my-list'];
        Yii::$app->view->params['crumbs'] = false;
        Yii::$app->view->params['h1'] = $id=='favorites' ? 'My favourites' : 'My list';
        $this->layout = 'markup';
        return $this->render('index',[
            'mList' => $id=='favorites' ? null : $mList,
            'regionModels' => Region::find()->orderBy('sort')->all()
        ]);
    }
    public function actionHash( $hash, $cd_id=0, $type='html' )
    {
        $mList = Lists::findOne(['`md5`'=>strtolower($hash)]);
        if( !$mList ){
            throw new NotFoundHttpException;
        }

        if( !$cd_id ){
            return $this->actionIndex($mList->id,$mList);
        }else{
            return $this->actionItem($mList->id,$cd_id,$type,$mList);
        }
    }
    public function actionData( $id )
    {
        //{"name":"Not Found","message":"","code":0,"status":404,"type":"yii\\web\\NotFoundHttpException"}
        Yii::$app->response->format = Response::FORMAT_JSON;

        if( Yii::$app->request->isAjax ){
            if( $id=='favorites' && Yii::$app->user->isGuest ){
                throw new NotFoundHttpException;
            }elseif( $id!='favorites' ){
                $mList = Lists::findOne(['`id`'=>$id]);
                if( !$mList ){
                    throw new NotFoundHttpException;
                }
            }

            return \components\SearchHelper::getResult(0,$id);
        }

        //$get = Yii::$app->request->get();
        /*&& Yii::$app->request->validateCsrfToken($get['_csrf'])*/
        throw new NotFoundHttpException;
    }
    public function actionItem( $id, $cd_id, $type='html', $mList=null )
    {
        if( $id=='favorites' && Yii::$app->user->isGuest ){
            throw new NotFoundHttpException;
        }elseif( $id!='favorites' ){
            if( $mList===null ){
                $mList = Lists::findOne(['`user_id`'=>Yii::$app->user->id, '`id`'=>$id]);
            }
            if( !$mList ){
                throw new NotFoundHttpException;
            }
        }

        $cd_id = intval(ltrim($cd_id,'0'));
        /* @var $return MainData */
        $return = \components\SearchHelper::getResultItem(null,$cd_id,$type,$id);

        if( $type=='json' ){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $return;
        }

        //Yii::$app->view->params['crumbs'] = false;
        if( $id=='favorites' ){
            Yii::$app->view->params['breadcrumbs'][] = [
                'label' => 'My favourites list',
                'url'   => "/favorites/?".$return['model']->getRequestString('item-filters')
            ];
        }else
        if( Yii::$app->user->isGuest ){
            Yii::$app->view->params['breadcrumbs'][] = [
                'label' => 'Shared list',
                'url'   => "/list/hash/{$mList->md5}/?".$return['model']->getRequestString('item-filters')
            ];
        }else{
            Yii::$app->view->params['breadcrumbs'][] = [
                'label' => 'My lists',
                'url'   => '/account/buy/lists'
            ];
            Yii::$app->view->params['breadcrumbs'][] = [
                'label' => $mList->name,
                'url'   => "/list/{$id}/?".$return['model']->getRequestString('item-filters')
            ];
        }
        Yii::$app->view->params['breadcrumbs'][] = $return['structure']['idnumber'];

        $this->layout = 'markup';
        return $this->render('/search/structure',[
            'userOptions'  => ['toCartMessage'],
            'list_id' => $id,
            'regionModels' => Region::find()->orderBy('sort')->all()
        ]+$return);
    }
}