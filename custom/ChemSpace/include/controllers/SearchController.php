<?php

namespace app\controllers;

use Yii;
use components\SearchHelper;
use yii\web\Controller;
use app\models\MainData;
use yii\data\ActiveDataProvider;
use app\models\SearchRequests;

class SearchController extends Controller
{

    public function beforeAction($action)
    {
        Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Chemical search', 'url' => ['search/index']];
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        if (in_array($action->id, ['import', 'mrv', 'text', 'nonchem']) && $result !== false && !$result instanceof \yii\web\Response) {
            Yii::$app->getSession()->set('lastSearch', $result);
        }
        \app\models\SearchFiltered::cleanUp();
        return parent::afterAction($action, $result);
    }

    // public $enableCsrfValidation = false;

    public function actionData($msgid)
    {
        Yii::$app->response->format = 'json';
        return SearchHelper::getResult($msgid);
    }

    public function actionResult($msgid)
    {
        $this->layout = 'markup';
        Yii::$app->view->params['breadcrumbs'][] = 'Search Results';
        Yii::$app->view->params['activeController'] = 'search/index';
        return $this->render('result',
                        [
                    'msgid'        => $msgid,
                    'userOptions'  => ['view', 'searchPerPage'],
                    'regionModels' => \app\models\Region::find()->orderBy('sort')->all()
        ]);
    }

    public function actionEditor()
    {
        $this->layout = false;
        return $this->render('editor');
    }

    public function actionItem($msgid, $cd_id, $type = 'html')
    {
        set_time_limit(0);
        $cd_id = intval(ltrim($cd_id, "0"));
        /* @var $ret MainData */
        $ret = SearchHelper::getResultItem($msgid, $cd_id, $type);

        if ($type == 'json') {
            Yii::$app->response->format = 'json';
            return $ret;
        }

        $this->layout = 'markup';
        Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Search Results', 'url' => "/search/$msgid/?" . $ret['model']->getRequestString('item-filters')]; // ['search/result', 'msgid' => $msgid]];
        Yii::$app->view->params['breadcrumbs'][] = $ret['structure']['idnumber'];
        Yii::$app->view->params['activeController'] = 'search/index';

        return $this->render('structure',
                        [
                    'userOptions'  => ['toCartMessage'],
                    'msgid'        => $msgid,
                    'regionModels' => \app\models\Region::find()->orderBy('sort')->all()
                        ] + $ret);
    }

    public function actionStructure($cd_id, $type = 'html')
    {
        $cd_id = intval(ltrim($cd_id, "0"));
        /* @var $ret MainData */
        $ret = SearchHelper::getStructure($cd_id, $type);

        if ($type == 'json') {
            Yii::$app->response->format = 'json';
            return $ret;
        }

        $this->layout = 'markup';
        Yii::$app->view->params['breadcrumbs'] = [$ret['structure']['idnumber']];


        return $this->render('structure',
                        [
                    'userOptions'  => ['toCartMessage'],
                    'msgid'        => null,
                    'regionModels' => \app\models\Region::find()->orderBy('sort')->all()
                        ] + $ret);
    }

    public function actionIndex()
    {
        Yii::$app->view->params['breadcrumbs'] = [ 'Chemical search'];
        Yii::$app->view->params['html'] = ['id' => 'page-search'];
        Yii::$app->view->params['h1'] = 'Find Chemicals';
        $this->layout = 'markup';
        $mrv = ($smiles = Yii::$app->request->get('smiles')) ? \jnode\Tools::convert($smiles, 'cxsmiles', 'mrv:-a') : null;
        return $this->render('index', ['mrv' => $mrv]);
    }

    public function actionPng($dimension, $dirname, $cd_id)
    {
        $a = \app\models\MainData::findOne(['cd_id' => $cd_id]);
        if (false === $imgName = $a->img($dimension, $dirname)) {
            throw new \yii\web\NotFoundHttpException("Image not found");
        } else {
            return Yii::$app->response->sendFile($imgName, null, ['inline' => true]);
        }
    }

    public function actionRequestPng($dimension, $msgid)
    {
        if (!$a = SearchRequests::find()->innerJoinWith('msg')->where([SearchRequests::tableName() . '.msgid' => $msgid, 'search_type' => 0, 'processed' => 0])->andWhere(['!=',
                    'status', 0])->one()) {
            return false;
        }
        if (false === $imgName = $a->img($dimension)) {
            throw new \yii\web\NotFoundHttpException("Image not found");
        } else {
            return Yii::$app->response->sendFile($imgName, null, ['inline' => true]);
        }
    }

    public function actionImport()
    {
        $model = new \app\models\SearchRequests;
        if (false !== $key = $model->doImport('file', Yii::$app->request->post('format'), Yii::$app->request->get('ref'))) {
            $this->redirect(['search/result', 'msgid' => $key]);
            return $key;
        } else {
            if ($model->errors) {
                $err = $model->errors;
                Yii::$app->getSession()->setFlash('error', implode('<br/>', array_shift($err)));
            }
            $this->redirect('/search/');
            return false;
        }
    }

    public function actionMrv()
    {
        $model = new \app\models\SearchRequests;
        if (false !== $key = $model->doSearch(Yii::$app->request->post('search'), Yii::$app->request->post('mode'), Yii::$app->request->post('param'),
                Yii::$app->request->get('ref'))) {
            $this->redirect(['search/result', 'msgid' => $key]);
            return $key;
        } else {
            if ($model->errors) {
                $err = $model->errors;
                Yii::$app->getSession()->setFlash('error', implode('<br/>', array_shift($err)));
            }
            $this->redirect('/search/');
            return false;
        }
    }

    public function actionText()
    {
        $model = new \app\models\SearchRequests;
        if (false !== $key = $model->doTextSearch(Yii::$app->request->post('search'), Yii::$app->request->get('ref'))) {
            $this->redirect(['search/result', 'msgid' => $key]);
            return $key;
        } else {
            if ($model->errors) {
                $err = $model->errors;
                Yii::$app->getSession()->setFlash('error', implode('<br/>', array_shift($err)));
            }
            $this->redirect('/search/');
            return false;
        }
    }

    public function actionNonchem()
    {
        $model = new \app\models\SearchRequests;
        if (false !== $key = $model->doNonChemSearch(Yii::$app->request->post('search'), Yii::$app->request->get('ref'))) {
            $this->redirect(['search/result', 'msgid' => $key]);
            return $key;
        } else {
            if ($model->errors) {
                $err = $model->errors;
                Yii::$app->getSession()->setFlash('error', implode('<br/>', array_shift($err)));
            }
            $this->redirect('/search/');
            return false;
        }
    }

    public function actionHistory()
    {
        Yii::$app->view->params['breadcrumbs'][] = ['label' => 'Search history'];
        $this->layout = 'markup';

        SearchRequests::markOldSearches();

        $query = SearchRequests::find()->innerJoinWith('msg');
        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'sort'       => [
                'attributes'   => [
                    'date'
                ],
                'defaultOrder' => ['date' => SORT_DESC]
            ],
            'pagination' => false
        ]);
        $query->where(['resulttable' => Yii::$app->workplace->getResultTable(), 'user_id' => intval(Yii::$app->user->id)]);
        $query->andWhere(['!=', 'status', 0]);
        $query->limit(Yii::$app->params['searchHistoryLimit']);

        return $this->render('history', [
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionSave( $type )
    {
        $request = Yii::$app->request;
        $get = $request->get();

        $isError = true;
        $content = '';
        if (!$request->isGet) {
            $content = 'Error 1: only GET method is allowed.';
        } else {
            $isError = false;
        }


        if (!$isError) {

            if( array_key_exists('msgid',$get) ){
                $msgid = array_key_exists('msgid',$get) ? $get['msgid'] : null;
                $data  = SearchHelper::getResult($msgid,null,true);
            }
            elseif( array_key_exists('list_id',$get) ){
                if( $get['list_id']=='favorites' ){
                    $list_id = 'favorites';
                }else{
                    $list_id = (int)(array_key_exists('list_id',$get) ? $get['list_id'] : 0);
                }
                $data = SearchHelper::getResult(null,$list_id,true);
            }
            elseif( array_key_exists('hash',$get) ){
                $hash  = array_key_exists('hash',$get) ? $get['hash'] : null;
                $mList = \app\models\Lists::findOne(['`md5`'=>strtolower($hash)]);
                if( $mList ){
                    $data = SearchHelper::getResult(null,$mList->id,true);
                }else{
                    $data['data'] = null;
                }
            }else{
                $data['data'] = null;
            }

            if (!empty($data['data'])) {

                $SERP_save_params = Yii::$app->params['searchResultsSave'];
                $tab = "\t";
                $eol = "\r\n";
                $flags = ENT_COMPAT | ENT_HTML401;

                $total = count($data['data']);
                $format = array_key_exists($type, $SERP_save_params['format']) ? $type : 'default';
                $formatParams = $SERP_save_params['format'][$format];
                $keys = array_keys($formatParams);

                $idnumberList = [];
                $antiIdnumberList = [];
                //params from GET:
                //i - [array]: of cd_id to save
                //a - [array]: of cd_id to skip from save
                //markall - [true]: save all
                if (!empty($get['markall']) && $get['markall'] == 'true') {
                    if (!empty($get['a'])) {
                        foreach ($get['a'] as $cd_id) {
                            $antiIdnumberList[] = 'CSC' . str_pad($cd_id, 9, '0', STR_PAD_LEFT);
                        }
                    }
                } else
                if (!empty($get['i'])) {
                    foreach ($get['i'] as $cd_id) {
                        $idnumberList[] = 'CSC' . str_pad($cd_id, 9, '0', STR_PAD_LEFT);
                    }
                }//idnumber[12],cd_id[11]

                $list = null;
                $anti = false;
                if( $idnumberList ){
                    $list = $idnumberList;
                }elseif( $antiIdnumberList ){
                    $list = $antiIdnumberList;
                    $anti = true;
                }

                switch ($type) {
                    case 'pdf':
                        $mime = 'application/pdf';
                        break;

                    case 'xls':
                    case 'xlsx':
                        $format = 'Excel5';
                        $mime   = 'application/vnd.ms-excel';

                        if( $type=='xlsx' ){
                            $format = 'Excel2007';
                            $mime   = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
                            //http://blogs.msdn.com/b/vsofficedeveloper/archive/2008/05/08/office-2007-open-xml-mime-types.aspx
                        }

                        ob_start();
                        $xlsWriter = new \app\components\export\Export([
                            'data'      => $data['data'],
                            'format'    => $format,
                            'setHeader' => true,
                            'columns'   => $keys,
                            'type'      => $type,
                            'idnumberList'     => $idnumberList,
                            'antiIdnumberList' => $antiIdnumberList,
                        ]);
                        $xlsWriter->run();
                        $content = ob_get_clean();

                        break;

                    case 'xml':
                        $mime = 'application/xml';

                        $xmlWriter = new \XMLWriter;
                        $xmlWriter->openMemory();
                        $xmlWriter->setIndent(true);
                        $xmlWriter->setIndentString($tab);

                        //$xmlWriter->startDocument('1.0', 'UTF-8');
                        $xmlWriter->startDocument('1.0', 'cp1252');
                        $xmlWriter->startElement('Workbook');
                        $xmlWriter->writeAttribute('xmlns', 'urn:schemas-microsoft-com:office:spreadsheet');
                        $xmlWriter->writeAttribute('xmlns:o', 'urn:schemas-microsoft-com:office:office');
                        $xmlWriter->writeAttribute('xmlns:x', 'urn:schemas-microsoft-com:office:excel');
                        $xmlWriter->writeAttribute('xmlns:ss', 'urn:schemas-microsoft-com:office:spreadsheet');
                        $xmlWriter->writeAttribute('xmlns:html', 'http://www.w3.org/TR/REC-html40');

                        $xmlWriter->startElement('Worksheet');
                        $xmlWriter->writeAttribute('ss:Name', 'Export');

                        $xmlWriter->startElement('Table');
                        $xmlWriter->writeAttribute('ss:ExpandedColumnCount', count($keys));
                        $xmlWriter->writeAttribute('ss:ExpandedRowCount', $total + 1);
                        $xmlWriter->writeAttribute('x:FullColumns', 1);
                        $xmlWriter->writeAttribute('x:FullRows', 1);
                        $xmlWriter->writeAttribute('ss:DefaultRowHeight', 15);

                        foreach ($formatParams as $aParam) {
                            $xmlWriter->startElement('Column');
                            foreach ($aParam['attributes'] as $attr_key => $attr_value) {
                                $xmlWriter->writeAttribute($attr_key, $attr_value);
                            }
                            $xmlWriter->endElement();
                        }

                        $xmlWriter->startElement('Row');
                        $xmlWriter->writeAttribute('ss:AutoFitHeight', '0');

                        foreach ($formatParams as $aParam) {
                            $xmlWriter->startElement('Cell');
                            $xmlWriter->startElement('Data');
                            $xmlWriter->writeAttribute('ss:Type', 'String');
                            $xmlWriter->text($aParam['title']);
                            $xmlWriter->endElement();
                            $xmlWriter->endElement();
                        }
                        $xmlWriter->endElement();


                        if( $list ){
                            for ($i = 0; $i < $total; $i++) {
                                if(
                                    !$anti && in_array($data['data'][$i]['idnumber'],$list)
                                    ||
                                    $anti && !in_array($data['data'][$i]['idnumber'],$list)
                                ){
                                    $xmlWriter->startElement('Row');
                                    $xmlWriter->writeAttribute('ss:AutoFitHeight', '0');

                                    foreach ($keys as $key) {
                                        $xmlWriter->startElement('Cell');
                                        $xmlWriter->startElement('Data');
                                        $xmlWriter->writeAttribute('ss:Type', $formatParams[$key]['type']);
                                        if ($key == 'smiles') {
                                            $smiles = explode(' ', $data['data'][$i][$key]);
                                            $xmlWriter->text(html_entity_decode($smiles[0], $flags, 'UTF-8'));
                                        } else {
                                            $xmlWriter->text(html_entity_decode($data['data'][$i][$key], $flags, 'UTF-8'));
                                        }
                                        $xmlWriter->endElement();
                                        $xmlWriter->endElement();
                                    }
                                    $xmlWriter->endElement();
                                }
                            }
                        }else{
                            for ($i = 0; $i < $total; $i++) {
                                $xmlWriter->startElement('Row');
                                $xmlWriter->writeAttribute('ss:AutoFitHeight', '0');

                                foreach ($keys as $key) {
                                    $xmlWriter->startElement('Cell');
                                    $xmlWriter->startElement('Data');
                                    $xmlWriter->writeAttribute('ss:Type', $formatParams[$key]['type']);
                                    if ($key == 'smiles') {
                                        $smiles = explode(' ', $data['data'][$i][$key]);
                                        $xmlWriter->text(html_entity_decode($smiles[0], $flags, 'UTF-8'));
                                    } else {
                                        $xmlWriter->text(html_entity_decode($data['data'][$i][$key], $flags, 'UTF-8'));
                                    }
                                    $xmlWriter->endElement();
                                    $xmlWriter->endElement();
                                }
                                $xmlWriter->endElement();
                            }
                        }


                        $xmlWriter->endElement();
                        $xmlWriter->endElement();
                        $xmlWriter->endElement();

                        $xmlWriter->endDocument();
                        $content = $xmlWriter->outputMemory();
                        break;

                    case 'sdf':
                        $mime = 'chemical/x-mdl-sdfile';
                        //https://en.wikipedia.org/wiki/Chemical_table_file

                        if( $list ){
                            for ($i = 0; $i < $total; $i++) {
                                if(
                                    !$anti && in_array($data['data'][$i]['idnumber'],$list)
                                    ||
                                    $anti && !in_array($data['data'][$i]['idnumber'],$list)
                                ){
                                    $string = str_replace("\n",$eol,$data['data'][$i]['structure']);
                                    $string = iconv('UTF-8', 'cp1252', $string);
                                    foreach ($keys as $key) {
                                        if ($key == 'smiles') {
                                            $smiles = explode(' ', $data['data'][$i][$key]);
                                            $string .= '>  <' . $formatParams[$key]['title'] . '>' . $eol
                                                . html_entity_decode($smiles[0], $flags, 'UTF-8') . $eol . $eol;
                                            $string = iconv('UTF-8', 'cp1252', $string);
                                        } else {
                                            $string .= '>  <' . $formatParams[$key]['title'] . '>' . $eol
                                                . html_entity_decode($data['data'][$i][$key], $flags, 'UTF-8') . $eol . $eol;
                                            $string = iconv('UTF-8', 'cp1252', $string);
                                        }
                                    }
                                    $content .= $string . iconv('UTF-8', 'cp1252', '$$$$') . $eol;
                                }
                            }
                        }else{
                            for ($i = 0; $i < $total; $i++) {
                                $string = str_replace("\n",$eol,$data['data'][$i]['structure']);
                                $string = iconv('UTF-8', 'cp1252', $string);
                                foreach ($keys as $key) {
                                    if ($key == 'smiles') {
                                        $smiles = explode(' ', $data['data'][$i][$key]);
                                        $string .= '>  <' . $formatParams[$key]['title'] . '>' . $eol
                                            . html_entity_decode($smiles[0], $flags, 'UTF-8') . $eol . $eol;
                                        $string = iconv('UTF-8', 'cp1252', $string);
                                    } else {
                                        $string .= '>  <' . $formatParams[$key]['title'] . '>' . $eol
                                            . html_entity_decode($data['data'][$i][$key], $flags, 'UTF-8') . $eol . $eol;
                                        $string = iconv('UTF-8', 'cp1252', $string);
                                    }
                                }
                                $content .= $string . iconv('UTF-8', 'cp1252', '$$$$') . $eol;
                            }
                        }
                        break;

                    case 'txt':
                    default:
                        $type = 'txt';
                        $mime = 'plain/text';

                        foreach ($keys as $key) {
                            $content .= $formatParams[$key]['title'] . $tab;
                        }
                        $content = rtrim($content, $tab) . $eol;
                        $content = iconv('UTF-8', 'cp1252', $content);

                        if( $list ){
                            for ($i = 0; $i < $total; $i++) {
                                if(
                                    !$anti && in_array($data['data'][$i]['idnumber'],$list)
                                    ||
                                    $anti && !in_array($data['data'][$i]['idnumber'],$list)
                                ){
                                    $string = '';
                                    foreach ($keys as $key) {
                                        if ($key == 'smiles') {
                                            $smiles = explode(' ', $data['data'][$i][$key]);
                                            $string .= html_entity_decode($smiles[0], $flags, 'UTF-8') . $tab;
                                            $string = iconv('UTF-8', 'cp1252', $string);
                                        } else {
                                            $string .= html_entity_decode($data['data'][$i][$key], $flags, 'UTF-8') . $tab;
                                            $string = iconv('UTF-8', 'cp1252', $string);
                                        }
                                    }
                                    $string = rtrim($string, $tab);
                                    $content .= $string . $eol;
                                }
                            }
                        }else{
                            for ($i = 0; $i < $total; $i++) {
                                $string = '';
                                foreach ($keys as $key) {
                                    if ($key == 'smiles') {
                                        $smiles = explode(' ', $data['data'][$i][$key]);

                                        $string .= html_entity_decode($smiles[0], $flags, 'UTF-8') . $tab;
                                        $string = iconv('UTF-8', 'cp1252', $string);
                                    } else {
                                        $string .= html_entity_decode($data['data'][$i][$key], $flags, 'UTF-8') . $tab;
                                        $string = iconv('UTF-8', 'cp1252', $string);
                                    }
                                }
                                $string = rtrim($string, $tab);
                                $content .= $string . $eol;
                            }
                        }
                }
            } else {
                $content = 'Error 0: no data to save.';
                $isError = true;
            }
        }



        if ($isError) {
            return $content;
        } else {
            $filename = 'chemspace_search_' . date('Y-m-d H:i:s') . '.' . $type;
            $options = [
                'mimeType' => $mime
            ];
            setcookie('fileDownload', 'true', time() + 3600, '/');
            \Yii::$app->response->sendContentAsFile($content, $filename, $options)->send();
        }
    }

}
