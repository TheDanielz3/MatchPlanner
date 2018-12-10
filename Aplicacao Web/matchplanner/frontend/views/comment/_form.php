<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->getId();
$idEvent = Yii::$app->request->get('event_id');
$idPost = Yii::$app->request->get('post_id');
$dataCreated = date('Y-m-d H:i:s');
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => '2']) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput(['value' => $dataCreated, 'readonly' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['value'=> $id, 'readonly' => true]) ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <?= $form->field($model, 'post_id')->hiddenInput(['value' => $idPost, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'event_id')->hiddenInput(['value' => $idEvent, 'readonly' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
