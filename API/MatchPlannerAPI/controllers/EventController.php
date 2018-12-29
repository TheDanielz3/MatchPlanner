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

    //Retorna todos os posts
    public function actionGet()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $events = Event::find()->all();

        if(count($events) > 0)
        {
            return array('status' => true, 'data' => $events);
        }
        else
        {
            return array('status' => false, 'data' => 'No events found');
        }
    }

    public function actionDelete($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = Event::findOne($id);

        if($model != null)
        {
            foreach($model->comments as $comment)
            {
                $comment->delete();
            }

            foreach($model->posts as $post)
            {
                $post->delete();
            }

            $model->delete();
        }
        else
        {
            return array('status' => false, 'data' => 'Delete failed, event not found');
        }
    }
}