<?php

namespace app\controllers;

use app\models\Event;

class EventController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    //Adiciona um comentário na BD
    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Event();

        $model->scenario = Event::SCENARIO_CREATE;
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
}