<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Teamprofile;

class TeamprofileController extends \yii\web\Controller
{
    public function actionCreateProfile()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Teamprofile();

        $model->scenario = Teamprofile::SCENARIO_CREATE;
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
    public function actionGetProfile($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        //Modelo correspondente ao id
        $model = Teamprofile::findOne($id);

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
    public function actionGetProfiles()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $profiles = Teamprofile::find()->all();

        if(count($profiles) > 0)
        {
            return array('status' => true, 'data' => $profiles);
        }
        else
        {
            return array('status' => false, 'data' => 'No team profiles found');
        }
    }

    public function actionUpdatePost($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = Teamprofile::findOne($id);

        $model->scenario = Teamprofile::SCENARIO_UPDATE;
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
        $model = Teamprofile::findOne($id);

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

            foreach($model->events as $event)
            {
                $event->delete();
            }
        }

        return $this->redirect(['get-profiles']);
    }
}
