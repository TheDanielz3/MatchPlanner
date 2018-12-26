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

    public function actionGet()
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

    public function actionUpdate()
    {}

    public function actionDelete()
    {}
}