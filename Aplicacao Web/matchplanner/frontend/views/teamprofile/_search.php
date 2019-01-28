<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TeamprofileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teamprofile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'team_name') ?>

    <?= $form->field($model, 'member1') ?>

    <?= $form->field($model, 'member2') ?>

    <?= $form->field($model, 'member3') ?>

    <?php // echo $form->field($model, 'member4') ?>

    <?php // echo $form->field($model, 'member5') ?>

    <?php // echo $form->field($model, 'member6') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
