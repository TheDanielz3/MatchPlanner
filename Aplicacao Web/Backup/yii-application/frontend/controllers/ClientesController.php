<?php

namespace frontend\controllers;

use yii\rest\ActiveController;

class ClientesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        public $modelClass = 'yii-application\frontend\models\Clientes';
    }
}
