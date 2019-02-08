<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Event;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class EventController extends ActiveController
{
    public $modelClass = 'backend\modules\api\models\Event';

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
        $model = new Event();

        $model->attributes = Yii::$app->request->post();

        $model->event_name = Yii::$app->request->post('event_name');
        $model->begin_date = Yii::$app->request->post('begin_date');
        $model->end_date = Yii::$app->request->post('end_date');
        $model->description = Yii::$app->request->post('description');
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

    //Mostra um único evento (funciona)
    public function actionView($id)
    {
        //Modelo correspondente ao id
        $model = $this->findModel($id);

        //Devolve modelo em JSON
        return array('status' => true, 'data' => $model);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->attributes = Yii::$app->request->post();

        $model->event_name = Yii::$app->request->post('event_name');
        $model->begin_date = Yii::$app->request->post('begin_date');
        $model->end_date = Yii::$app->request->post('end_date');
        $model->description = Yii::$app->request->post('description');
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

    //Apaga um evento (funciona)
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

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

    protected function findModel($id)
    {
        if(($model = Event::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}