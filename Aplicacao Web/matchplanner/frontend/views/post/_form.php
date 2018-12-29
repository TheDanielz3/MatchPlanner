<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */
/* @var $form yii\widgets\ActiveForm */
$id = Yii::$app->user->identity->getId();   //ID User
$dataCreated = date('Y-m-d H:i:s');
$selecao = $this->params['selecao'];
$id_Respetivo_a_Passar = $this->params['id_Respetivo_a_Passar'];
//var_dump($selecao);
//var_dump($id_Respetivo_a_Passar);
$teamid = null;
$userid = null;

$idEvent = Yii::$app->request->get('event_id');

//echo "" . Html::a('Go back to event', Url::toRoute(['event/view', 'id' => $idEvent]));

if($selecao == 1)
{
    $userid = $id;
}
if($selecao == 2)
{
    $teamid = $id;
}
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->hiddenInput(['value' => $dataCreated])->label(false) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $userid, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'team_id')->hiddenInput(['value'=> $teamid, 'readonly' => true])->label(false) ?>

    <?= $form->field($model, 'event_id')->hiddenInput(['value' => $idEvent])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
