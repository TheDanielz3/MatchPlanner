<?php

namespace app\controllers;

use app\models\User;

class UserController extends \yii\web\Controller
{


    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new User();

        $model->scenario = User::SCENARIO_CREATE;
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

    //Mostra um unico utilizador
    public function actionGet($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = User::findOne($id);

        if($model != null)
        {
            return array('status' => true, 'data' => $model);
        }
        else
        {
            return array('status' => false, 'data' => 'User account not found');
        }
    }

    //Retorna todos as contas de utilizador
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $profiles = User::find()->all();

        if(count($profiles) > 0)
        {
            return array('status' => true, 'data' => $profiles);
        }
        else
        {
            return array('status' => false, 'data' => 'No user accounts found');
        }
    }

    public function actionDelete($id)
    {
        $model = User::findOne($id);

        if($model != null)
        {
            $model->status = 0;

            $model->save();
        }
    }
}