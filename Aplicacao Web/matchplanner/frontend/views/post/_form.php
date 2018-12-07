<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->getId();   //ID USer
$dataCreated = date('Y-m-d H:i:s');


$idEvent = Yii::$app->request->getQueryParam('event_id');

echo "" . Html::a('Go back to event', Url::toRoute(['event/view', 'id' => $idEvent]));
?>

<div class="post-form">

    <br/>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->hiddenInput(['value' => $dataCreated])->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $id, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'team_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'event_id')->textInput(['value' => $idEvent]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
