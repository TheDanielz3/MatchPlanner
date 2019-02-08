<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */



$idEvent = Yii::$app->request->get('id');

echo "" . Html::a('Go back to event', Url::toRoute(['/event/view', 'id' => $idEvent]),['class' => 'btn btn-primary']);

$this->title = 'Update Event ' . $model->event_name;
//$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-update">

    <h1 style="color: #ffffff"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
