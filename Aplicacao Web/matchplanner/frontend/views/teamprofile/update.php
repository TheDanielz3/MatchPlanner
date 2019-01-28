<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */

$id = Yii::$app->user->identity->getId();

echo "" . Html::a('Go back to profile', Url::toRoute(['/teamprofile/view', 'id' => $id]), ['class' => 'btn btn-primary']);

$this->title = 'Update Teamprofile: ' . $model->team_name;
//$this->params['breadcrumbs'][] = ['label' => 'Teamprofiles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teamprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
