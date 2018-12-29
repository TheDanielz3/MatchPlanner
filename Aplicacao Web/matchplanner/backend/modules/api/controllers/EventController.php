<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Teamprofile;
use backend\modules\api\models\Event;

class EventController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    //Cria um novo evento na BD
    public function actionCreateEvent()
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

    //Mostra um único evento
    public function actionGetEvent($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //Modelo correspondente ao id
        $model = Event::findOne($id);

        if(count($model) > 0)
        {
            //Devolve modelo em JSON
            return array('status' => true, 'data' => $model);
        }
        else
        {
            return array('status' => false, 'data' => 'Event not found');
        }
    }

    //Mostra os eventos todos
    public function actionGetEvents()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $eventos = Event::find()->all();

        if(count($eventos) > 0)
        {
            return array('status' => true, 'data' => $eventos);
        }
        else
        {
            return array('status' => false, 'data' => 'No events found');
        }
    }

    public function actionUpdateEvent($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = Event::findOne($id);

        $model->scenario = Event::SCENARIO_UPDATE;
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
    public function actionDeleteEvent($id)
    {
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

        return $this->redirect(['get-events']);
    }
}