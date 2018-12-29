<?php

namespace app\controllers;

use app\models\Comment;

class CommentController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    //Adiciona um comentário na BD
    public function actionCreate()
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

    public function actionGetComment($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //Procura um comment com o ID inserido no URL
        $comment = Comment::findOne($id);

        //Retorna um unico comment
        if(count($comment) > 0)
        {
            return array('status' => true, 'data' => $comment);
        }
        else
        {
            return array('status' => false, 'data' => 'No comment found');
        }
    }

    public function actionIndex()
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

    public function actionUpdate($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = Comment::findOne($id);

        $model->scenario = Comment::SCENARIO_UPDATE;
        $model->attributes = \Yii::$app->request->isPut;

        //Retorna um unico comment
        if($model != null)
        {
            if($model->validate())
            {
                $model->save();

                return array('status' => true, 'data' => $model);
            }
        }
        else
        {
            echo "Comment does not exist";
        }
    }

    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);

        if($comment != null)
        {
            $comment->delete();
        }
    }
}