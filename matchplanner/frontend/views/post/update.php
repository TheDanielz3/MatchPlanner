<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */

$idEvent = Yii::$app->request->getQueryParam('event_id');
echo "" . Html::a('Go back to event', Url::toRoute(['event/view', 'id' => $idEvent]), ['class' => 'btn btn-primary']);

$this->title = 'Update Post';
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update" style="color:#ffffff;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
