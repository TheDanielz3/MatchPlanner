<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Userprofile */

$id = Yii::$app->user->identity->getId();

echo "" . Html::a('Go back to profile', Url::toRoute(['/userprofile/view', 'id' => $id]));

$this->title = 'Update Solo Profile: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Userprofiles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
