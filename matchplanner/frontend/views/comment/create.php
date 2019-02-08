<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */

$idEvent = Yii::$app->request->getQueryParam('event_id');
echo "" . Html::a('Go back to event', Url::toRoute(['event/view', 'id' => $idEvent]), ['class' => 'btn btn-primary']);

$this->title = 'Create a Comment';
//$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-create" style="color: #ffffff">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
