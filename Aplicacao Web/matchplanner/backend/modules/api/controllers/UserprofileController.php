<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Userprofile;

class UserprofileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Userprofile();

        $model->scenario = Userprofile::SCENARIO_CREATE;

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

    public function actionView()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $soloprofiles = Userprofile::find()->all();

        if(count($soloprofiles) > 0)
        {
            return array('status' => true, 'data' => $soloprofiles);
        }
        else
        {
            return array('status' => false, 'data' => 'No solo profiles found');
        }
    }
}
