<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Userprofile */
/* @var $form yii\widgets\ActiveForm */

$id = Yii::$app->user->identity->getId();
?>

<div class="userprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $id, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surnames')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthdate')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'sex')->dropDownList(
        ['0' => 'F', '1' => 'M']
    ); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $id, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'team_id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
