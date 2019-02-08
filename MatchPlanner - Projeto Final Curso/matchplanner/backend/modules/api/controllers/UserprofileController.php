<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Userprofile;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class UserprofileController extends ActiveController
{
    public $modelClass = 'backend\modules\api\models\Userprofile';

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
        $model = new Userprofile();

        $model->attributes = Yii::$app->request->post();

        $model->firstname = Yii::$app->request->post('firstname');
        $model->surnames = Yii::$app->request->post('surnames');
        $model->birthdate = Yii::$app->request->post('birthdate');
        $model->sex = Yii::$app->request->post('sex');
        $model->user_id = Yii::$app->request->post('user_id');
        $model->team_id = Yii::$app->request->post('team_id');

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

    public function actionView($id)
    {
        $model = $this->findModel($id);

        return array('status' => true, 'data' => $model);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->attributes = \Yii::$app->request->post();

        $model->firstname = Yii::$app->request->post('firstname');
        $model->surnames = Yii::$app->request->post('surnames');
        $model->birthdate = Yii::$app->request->post('birthdate');
        $model->sex = Yii::$app->request->post('sex');
        $model->user_id = Yii::$app->request->post('user_id');
        $model->team_id = Yii::$app->request->post('team_id');

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

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->delete();
    }

    protected function findModel($id)
    {
        if(($model = Userprofile::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}