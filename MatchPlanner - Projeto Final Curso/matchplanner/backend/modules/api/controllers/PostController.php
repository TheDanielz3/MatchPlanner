<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Post;
use backend\modules\api\models\Teamprofile;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\Response;
use Yii;

class PostController extends ActiveController
{
    public $modelClass = 'backend\modules\api\models\Post';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [

            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Yii::$app->response->format = Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    public function actionCreate()
    {
        $model = new Post();
        $model->attributes = Yii::$app->request->post();

        $model->title = Yii::$app->request->post('title');
        $model->content = Yii::$app->request->post('content');
        $model->tag = Yii::$app->request->post('tag');
        $model->create_time = Yii::$app->request->post('create_time');
        $model->image = Yii::$app->request->post('image');
        $model->user_id = Yii::$app->request->post('user_id');
        $model->team_id = Yii::$app->request->post('team_id');
        $model->event_id = Yii::$app->request->post('event_id');

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

    //Mostra um único post (funciona)
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

        $model->title = Yii::$app->request->post('title');
        $model->content = Yii::$app->request->post('content');
        $model->tag = Yii::$app->request->post('tag');
        $model->create_time = Yii::$app->request->post('create_time');
        $model->image = Yii::$app->request->post('image');
        $model->user_id = Yii::$app->request->post('user_id');
        $model->team_id = Yii::$app->request->post('team_id');
        $model->event_id = Yii::$app->request->post('event_id');

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

    //Apaga um post (funciona)
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        foreach($model->comments as $comment)
        {
            $comment->delete();
        }

        $model->delete();
    }

    protected function findModel($id)
    {
        if(($model = Post::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
