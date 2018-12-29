<?php

namespace app\controllers;

use app\models\Post;

class PostController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    //Adiciona um comentário na BD
    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Post();

        $model->scenario = Post::SCENARIO_CREATE;
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

        $posts = Post::find()->all();

        if(count($posts) > 0)
        {
            return array('status' => true, 'data' => $posts);
        }
        else
        {
            return array('status' => false, 'data' => 'No posts found');
        }
    }

    public function actionDelete($id)
    {
        $model = Post::findOne($id);

        if($model != null)
        {
            foreach($model->comments as $comment)
            {
                $comment->delete();
            }
        }
    }
}