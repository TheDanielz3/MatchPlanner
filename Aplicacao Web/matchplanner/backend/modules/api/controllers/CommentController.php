<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Comment;

class CommentController extends \yii\web\Controller
{
    public function actionCreateComment()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Comment();

        $model->scenario = Comment::SCENARIO_CREATE;
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
    public function actionGetComment($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //Modelo correspondente ao id
        $model = Comment::findOne($id);

        if(count($model) > 0)
        {
            //Devolve modelo em JSON
            return array('status' => true, 'data' => $model);
        }
        else
        {
            return array('status' => false, 'data' => 'Comment not found');
        }
    }

    //Mostra os eventos todos
    public function actionGetComments()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $comments = Comment::find()->all();

        if(count($comments) > 0)
        {
            return array('status' => true, 'data' => $comments);
        }
        else
        {
            return array('status' => false, 'data' => 'No comments found');
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
