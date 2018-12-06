<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */

$idEvent = Yii::$app->request->getQueryParam('EventID');
var_dump($idEvent);
die();



//Link para voltar à main view
$eventView = Url::toRoute('event/view');
echo "<br/>";
echo "" . Html::a('Go back to event', $eventView);

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

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
            //'id',
            'title',
            'content',
            'tag',
            'create_time',
            //'user_id',
            //'team_id',
            //'event_id',
        ],
    ]) ?>

</div>
