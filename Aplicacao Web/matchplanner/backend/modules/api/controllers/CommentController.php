<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Comment;
use yii\db\ActiveRecord;
use yii\rest\ActiveController;
use yii\web\Cookie;
use yii\web\Response;
use Yii;

class CommentController extends ActiveController
{
    public $modelClass = 'backend\modules\api\models\Comment';

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
        $model = new Comment();
        $model->attributes = Yii::$app->request->post();

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

    //Apaga um evento (funciona)
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->delete();
    }

    protected function findModel($id)
    {
        if(($model = Comment::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
