<!DOCTYPE html>
<html>
    <head>
        <script
                src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>
    </head>
</html>

<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->getId();
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'begin_date')->widget(DateTimePicker::className(), [
        'language' => 'pt',
        'size' => 'ms',
        //'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => true,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd hh:mm', // if inline = true
             'format' => 'dd-mm-yyyy', // if inline = false
            'todayBtn' => true
        ]
    ]); ?>


    <?= $form->field($model, 'end_date')->widget(DateTimePicker::className(), [
        'language' => 'pt',
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => true,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd hh:mm', // if inline = true
            'format' => 'dd-mm-yyyy', // if inline = false
            'todayBtn' => true
        ]
    ]); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['value' => $id, 'readonly'=> true])->label() ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
