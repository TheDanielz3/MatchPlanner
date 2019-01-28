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

        //$model->attributes = \Yii::$app->request->post();

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