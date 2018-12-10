<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */

$this->title = 'Update Teamprofile';
$this->params['breadcrumbs'][] = ['label' => 'Teamprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teamprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
