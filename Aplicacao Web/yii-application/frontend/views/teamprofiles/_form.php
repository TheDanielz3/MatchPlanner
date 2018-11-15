<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teamprofiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'members')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
