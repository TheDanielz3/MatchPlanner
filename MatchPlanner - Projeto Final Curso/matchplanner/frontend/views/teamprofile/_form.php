<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->getId();
?>

<div class="teamprofile-form" style="color: #ffffff">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $id, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'team_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $id, 'readonly' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
