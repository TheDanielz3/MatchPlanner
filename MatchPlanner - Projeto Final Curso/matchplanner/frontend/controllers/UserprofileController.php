<?php

namespace frontend\controllers;

//use common\widgets\Alert;
use Faker\Provider\DateTime;
use kartik\alert\AlertBlock;
use kartik\dialog\Dialog;
use Yii;
use frontend\models\Userprofile;
use frontend\models\UserprofileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\dialog\DialogAsset;
use kartik\alert\Alert;

/**
 * UserprofileController implements the CRUD actions for Userprofile model.
 */
class UserprofileController extends Controller
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
     * Lists all Userprofile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserprofileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userprofile model.
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

    /**
     * Creates a new Userprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userprofile();

        //Data atual
        $nowDate = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if(strtotime($model->birthdate) <= strtotime($nowDate))
            {
                return $this->redirect(['site/operations', 'id' => $model->id]);
            }
        }

        $model->delete();

        return $this->render('create', [
            'model' => $model,
            'nowDate' => $nowDate
        ]);
    }

    /**
     * Updates an existing Userprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //Data atual
        $nowDate = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            if(strtotime($model->birthdate) <= strtotime($nowDate))
            {
                return $this->redirect(['userprofile/view', 'id' => $model->id]);
            }
            else
            {
                //echo "<script type='text/javascript'>confirm('Invalid birthdate');</script>";

                //$model->delete();

                return $this->render('update', [
                    'model' => $model,
                    'nowDate' => $nowDate
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    private function phpAlert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    /**
     * Deletes an existing Userprofile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['site/login']);
    }

    /**
     * Finds the Userprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userprofile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
