<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$id = Yii::$app->user->identity->getId();

echo "" . Html::a('Go back to profile', Url::toRoute(['/user/view', 'id' => $id]), ['class' => 'btn btn-primary']);

$this->title = 'Update ' . " " . $model->username;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update" style="color: #ffffff">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
