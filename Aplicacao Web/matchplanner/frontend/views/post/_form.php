<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->getId();
$dataCreated = date('Y-m-d H:i:s');

//Link para voltar à main view
$mainView = Url::toRoute('site/operations', true);
echo "<br/><br/>";
echo "" . Html::a('Go back to main view', $mainView);

$idEvent = Yii::$app->request->getQueryParam('EventID');
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->hiddenInput(['value' => $dataCreated])->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $id, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <?= $form->field($model, 'event_id')->textInput(['value' => $idEvent]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
