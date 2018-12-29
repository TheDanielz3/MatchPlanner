<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Post;
use backend\modules\api\models\User;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

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

    //Mostra todos os utilizadores
    public function actionView()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $users = User::find()->all();

        if(count($users) > 0)
        {
            return array('status' => true, 'data' => $users);
        }
        else
        {
            return array('status' => false, 'data' => 'No users found');
        }
    }
}
