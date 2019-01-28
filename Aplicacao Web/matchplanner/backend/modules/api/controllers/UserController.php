<?php

namespace backend\modules\api\controllers;

use common\models\LoginForm;
use common\models\User;
use frontend\models\SignupForm;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

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

    //Ver todas as auth_key e se a gerada for igual a alguma dá login
    public function actionLogin()
    {
        $model = new LoginForm();

        $model->username = Yii::$app->request->post('username');
        $model->password = Yii::$app->request->post('password');
        $user = User::findByUsername($model->username, $model->password);

        if($user && $user->validatePassword($model->password))
        {
            return array('status' => true, 'data' => $user);
        }
        else
        {
            return array('status' => true, 'data' => $user->getErrors());
        }
    }

    //Cria um novo utilizador da framework
    public function actionSignup()
    {
        $model = new SignupForm();
        $model->attributes = Yii::$app->request->post();

        $model->username = Yii::$app->request->post('username');
        $model->email = Yii::$app->request->post('email');
        $model->password = Yii::$app->request->post('password');

        if($model->validate())
        {
            $user = $model->signup();

            $user->save();

            return array('status' => true, 'data' => $user);
        }
        else
        {
            return array('status' => true, 'data' => $model->getErrors());
        }
    }

    //Mostra todos os utilizadores
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return array('status' => true, 'data' => $model);
    }

    //Não apaga utilizador, apenas muda o seu status para 0 desativando a conta
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->status = 0;

        $model->save();
    }

    protected function findModel($id)
    {
        if(($model = User::findOne($id)) !== null)
        {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}