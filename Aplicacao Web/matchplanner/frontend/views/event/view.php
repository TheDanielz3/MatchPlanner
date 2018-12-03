<?php

use yii\helpers\Html;
use yii\bootstrap\Button;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

//Link para voltar à main view
$mainView = Url::toRoute('site/operations', true);
echo "<br/>";
echo "" . Html::a('Go back to main view', $mainView);

$this->title = $model->event_name;
//$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'event_name',
            'begin_date',
            'end_date',
            'description',
            //'user_id',
            //'team_id',
        ],
    ]) ?>

  <?php
        $eventID = Url::to(['post/create', 'EventID' => $model->id]);


        echo "" . Html::a('Create Post', $eventID, ['class'=>'btn btn-primary']);



  ?>


</div>
