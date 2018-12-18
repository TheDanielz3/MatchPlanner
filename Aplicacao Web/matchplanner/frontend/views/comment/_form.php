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
$selecao = $this->params['selecao'];
$id_Respetivo_a_Passar = $this->params['id_Respetivo_a_Passar'];
//var_dump($selecao);
//var_dump($id_Respetivo_a_Passar);
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

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->hiddenInput(['value' => $dataCreated, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $userid, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'team_id')->hiddenInput(['value'=> $teamid, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'post_id')->hiddenInput(['value' => $idPost, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'event_id')->hiddenInput(['value' => $idEvent, 'readonly' => true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
