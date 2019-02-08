<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 23/01/2019
 * Time: 12:13
 */

namespace Calculadora\backend\controllers;

use yii\web\Controller;

class ProjetoController extends Controller
{
    public function actionComments()
    {
        return $this->redirect(['defesa']);
    }
}