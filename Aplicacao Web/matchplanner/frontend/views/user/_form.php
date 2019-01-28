<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true])->label(true) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true])->label(true) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(true) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput()->label(true) ?>

    <?= $form->field($model, 'created_at')->textInput()->label(true) ?>

    <?= $form->field($model, 'updated_at')->textInput()->label(true) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
