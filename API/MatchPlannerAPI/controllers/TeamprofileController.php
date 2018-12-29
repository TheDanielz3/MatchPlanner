<?php

namespace app\controllers;

use app\models\Teamprofile;

class TeamprofileController extends \yii\web\Controller
{
    //Retorna todos os team profiles
    public function actionGet()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $profiles = Teamprofile::find()->all();

        if(count($profiles) > 0)
        {
            return array('status' => true, 'data' => $profiles);
        }
        else
        {
            return array('status' => false, 'data' => 'No team profiles found');
        }
    }

    public function actionDelete()
    {

    }
}