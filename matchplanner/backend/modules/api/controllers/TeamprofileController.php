<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Teamprofile;
use yii\rest\ActiveController;
use Yii;
use yii\web\Response;

class TeamprofileController extends ActiveController
{
    public $modelClass = 'backend\modules\api\models\Teamprofile';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [

            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Yii::$app->response->format = Response::FORMAT_JSON,
            ]
        ];

        return $behaviors;
    }

    public function actionCreate()
    {
        $model = new Teamprofile();

        $model->attributes = \Yii::$app->request->post();

        $model->team_name = Yii::$app->request->post('team_name');
        $model->member1 = Yii::$app->request->post('member1');
        $model->member2 = Yii::$app->request->post('member2');
        $model->member3 = Yii::$app->request->post('member3');
        $model->member4 = Yii::$app->request->post('member4');
        $model->member5 = Yii::$app->request->post('member5');
        $model->member6 = Yii::$app->request->post('member6');
        $model->user_id = Yii::$app->request->post('user_id');

        if($model->validate())
        {
            $model->save();

            return array('status' => true, 'data' => $model);
        }
        else
        {
            return array('status' => false, 'data' => $model->getErrors());
        }
    }

    //Mostra um único post
    public function actionView($id)
    {
        //Modelo correspondente ao id
        $model = $this->findModel($id);

        return array('status' => true, 'data' => $model);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->attributes = \Yii::$app->request->post();

        if($model->validate())
        {
            $model->save();

            return array('status' => true, 'data' => $model);
        }
        else
        {
            return array('status' => false, 'data' => $model->getErrors());
        }
    }

    //Apaga um evento
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->delete();
    }

    protected function findModel($id)
    {
        if(($model = Teamprofile::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}