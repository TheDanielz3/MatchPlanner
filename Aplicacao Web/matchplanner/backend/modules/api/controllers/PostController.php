<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Post;

class PostController extends \yii\web\Controller
{
    public function actionCreatePost()
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

    //Mostra um único post
    public function actionGetPost($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //Modelo correspondente ao id
        $model = Post::findOne($id);

        if(count($model) > 0)
        {
            //Devolve modelo em JSON
            return array('status' => true, 'data' => $model);
        }
        else
        {
            return array('status' => false, 'data' => 'Post not found');
        }
    }

    //Mostra os eventos todos
    public function actionGetPosts()
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

    public function actionUpdatePost($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = Post::findOne($id);

        $model->scenario = Post::SCENARIO_UPDATE;
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
    public function actionDeletePost($id)
    {
        $model = Post::findOne($id);

        if($model != null)
        {
            foreach($model->comments as $comment)
            {
                $comment->delete();
            }
        }

        return $this->redirect(['get-posts']);
    }
}
