<?php

namespace app\controllers;

use app\models\Userprofile;

class UserprofileController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Userprofile();

        $model->scenario = Userprofile::SCENARIO_CREATE;
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

    //Retorna todos os team profiles
    public function actionGet()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $profiles = Userprofile::find()->all();

        if(count($profiles) > 0)
        {
            return array('status' => true, 'data' => $profiles);
        }
        else
        {
            return array('status' => false, 'data' => 'No solo profiles found');
        }
    }
}
