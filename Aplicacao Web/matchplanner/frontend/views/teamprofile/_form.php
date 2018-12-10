<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */
/* @var $form yii\widgets\ActiveForm */

//TODO: Daniel Alterar este cheat para fazer como deve ser;
$id = Yii::$app->user->identity->getId();
?>

<div class="teamprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput(['value' => $id])->label(false) ?>

    <?= $form->field($model, 'team_name')->textInput(['maxlength' => true]) ?>

    <!--TODO: Alterar as cenas da equipa para a parecer os membros-->
    <?= $form->field($model, 'members')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['value' => $id])->label() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
