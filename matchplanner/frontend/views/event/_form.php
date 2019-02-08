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
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->getId();
$selecao = $this->params['selecao'];
$id_Respetivo_a_Passar = $this->params['id_Respetivo_a_Passar'];
$teamid = null;
$userid = null;

if($selecao == 1)
{
    $userid = $id;
}
if($selecao == 2)
{
    $teamid = $id;
}

?>

<div class="event-form" style="color: #ffffff">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'begin_date')->widget(DateTimePicker::className(), [
        'type' => DateTimePicker::TYPE_INPUT,
            'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'format' => 'yyyy-m-d hh:ii',
                'startDate' >= date('Y-m-d H:i:s'),
                'autoclose' => true,
                'readonly' => 'readonly',
            ]
    ]); ?>

    <?= $form->field($model, 'end_date')->widget(DateTimePicker::className(), [
        'type' => DateTimePicker::TYPE_INPUT,
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => 'yyyy-m-d hh:ii',
            'startDate' >= date('Y-m-d H:i:s'),
            'autoclose' => true,
            'readonly' => 'readonly',
        ]
    ]); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => $userid, 'readonly'=> true])->label(false) ?>

    <?= $form->field($model, 'team_id')->hiddenInput(['value' => $teamid ,'readonly'=> true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>