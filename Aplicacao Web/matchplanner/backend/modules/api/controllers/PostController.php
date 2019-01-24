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

        $model->save();

        return array('status' => true, 'data' => $model);
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
