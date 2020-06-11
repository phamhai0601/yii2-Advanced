<?php

namespace backend\controllers;

use app\models\AdminPackage;
use app\models\Bouquet;
use Yii;
use app\models\Line;
use backend\models\search\LineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use common\helpers\ExpdateHelper;
use common\helpers\StringHelper;

/**
 * LineController implements the CRUD actions for Line model.
 */
class LineController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Line models.
     * @return mixed
     * @param int $pagesize
     */
    public function actionIndex($pagesize = 20)
    {
        $searchModel = new LineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');
            $attribute = Yii::$app->request->post('editableAttribute');
            //$model = Line::findOne($id);
            $posted = current(Yii::$app->request->post('Line'));
            if ($attribute == "password") {
                    $serverLine = Line::findOne($id);
                    $serverLine->updateAttributes([$attribute => $posted[$attribute]]);
                    $out = [
                        'output' => $posted[$attribute],
                        'message' => '',
                    ];
            }else if($attribute == "reseller_notes"){
                $serverLine = Line::findOne($id);
                $serverLine->updateAttributes([$attribute => $posted[$attribute]]);
                $out = [
                    'output' => $posted[$attribute],
                    'message' => '',
                ];
            }
            Yii::$app->response->format = 'json';
            return $out;
        }
        $modelLine = new Line;
        $dataProvider->pagination->pageSize = $pagesize;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelLine'     =>$modelLine,
            'pagesize'     => $pagesize,

        ]);
    }

    /**
     * Displays a single Line model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionChart()
    {
        $mail =Yii::$app->request->post();
        $dataModels=array('date'=>'','data'=>'','color'=>'');
        if($mail!=null){
            $orderby = "FROM_UNIXTIME(created_at,'%D %M %Y')";
            $rows = (new \yii\db\Query())
                ->select(['count(id) as count', 'FROM_UNIXTIME(created_at,\'%D %M %Y\') as time'])
                ->from('line')
                ->where('created_at > :date1 and created_at < :date2 and enabled = :status',[':status' =>$mail["status"],':date1' => strtotime($mail['date1']),':date2' => strtotime($mail['date2'])])
                ->groupBy([$orderby])
                ->all();
            foreach ($rows as $item){
                $data[] = $item["count"];
                $dataColor[] = 'rgba(255, 99, '.$item["count"].', 0.2)';
                $dateDate[] = $item["time"];
            }
            $ardataDate = json_encode($dateDate);
            $ardata = json_encode($data);
            $ardataColor = json_encode($dataColor);
            $dataModels = array('date'=>$ardataDate,'data'=>$ardata,'color'=>$ardataColor);
        }

        return $this->render('chart',['dataModels'=>$dataModels]);
    }

    /**
     * Creates a new Line model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Line();
        $model->username = StringHelper::radom(10);
        $model->password = StringHelper::radom(10);
        $adminPackages = AdminPackage::find()->all();
        $bouquet = Bouquet::find()->all();
        $request         = Yii::$app->request->post('Line');

        if ($model->load(Yii::$app->request->post())) {
            echo '<pre>';
            print_r($request);
            echo 'model<br>';
            $model->package = $request['package'];
            $package = AdminPackage::findOne(['id'=>$model->package]);
            $model->exp_date = ExpdateHelper::setExpdate($package->type,time());
            $model->bouquet = json_encode($model->bouquet);
            $model->allowed_ips = json_encode($model->allowed_ips);
            $model->admin_enabled =1;
            $model->enabled = 1;
            $model->created_at = time();
            $model->member_id = Yii::$app->user->identity->id;
            if($model->package == "205" or $model->package == "206"){
                $model->is_trial = 1;
            }
            if($model->save()){
                Yii::$app->session->setFlash('success','Create line <b>'.$model->username.'</b> success');
                return $this->redirect(['line/index']);
            }


        }

        return $this->render('create', [
            'adminPackages'  => $adminPackages,
            'bouquet'       => $bouquet,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Line model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['', 'id' => $model->id]);
        }
/*        echo '<pre>';
        print_r($model); die;*/
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Line model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    public function actionBan($id)
    {
        $line = Line::findOne(['id'=>$id]);
        if($line->enabled == Line::DISABLE)
        {
            $line->updateAttributes(['enabled'=>Line::ENABLE]);
            Yii::$app->session->setFlash('success','Un Ban <b>'.$line->username.'</b> success');
            return $this->redirect(['line/index']);
        }else if($line->enabled == Line::ENABLE)
        {
            $line->updateAttributes(['enabled'=>Line::DISABLE]);
            Yii::$app->session->setFlash('danger','Ban <b>'.$line->username.'</b> success');
            return $this->redirect(['line/index']);
        }
    }

    public function actionRemove($id)
    {
        $line = Line::findOne($id);
        Yii::$app->session->setFlash('success','Remove <b>'.$line->username .'</b> success.');
        $line->delete();
        $this->redirect(['line/index']);
    }
    public function actionRemove1($id)
    {
        $line = Line::findOne($id);
        Yii::$app->session->setFlash('success','Remove <b>'.$line->username .'</b> success.');
        $line->delete();
        $this->redirect(['line/index']);
    }

    public function actionExtendLine(){
        $request      = Yii::$app->request->post('Line');
        $rline        = Line::findOne(['username'=>$request['username']]);
        if($request['package']){
            $package = AdminPackage::findOne(['id'=>$request['package']]);
            if($rline->exp_date>time())
            {
                $new_exp_date = ExpdateHelper::setExpdate($package->type,$rline->exp_date);
                $rline->updateAttributes(['exp_date'=>$new_exp_date]);
                $rline->updateAttributes(['package'=>$package->id]);
                Yii::$app->session->setFlash('success','Extend <b>'.$package->name.'</b> for <b>'.$rline->username.'</b>.');
                return $this->redirect(['line/index']);
            }else{
                $new_exp_date = ExpdateHelper::setExpdate($package->type,time());
                $rline->updateAttributes(['exp_date'=>$new_exp_date]);
                $rline->updateAttributes(['package'=>$package->id]);
                Yii::$app->session->setFlash('success','Extend <b>'.$package->name.'</b> for <b>'.$rline->username.'</b>.');
                return $this->redirect(['line/index']);
            }
        }else{
            Yii::$app->session->setFlash('danger','Package not empty!');
            return $this->redirect(['line/index']);
        }
    }

    /**
     * Finds the Line model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Line the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Line::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
