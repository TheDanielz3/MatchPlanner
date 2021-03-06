<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Comment */

//Link para voltar aos comments
$events = Url::toRoute('comment/index', true);
echo "<br/>";
echo "" . Html::a('Go back to comments', $events, ['class' => 'btn btn-primary']);

$this->title = $model->content;
//$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'content',
            'tag',
            'create_time',
            //'user_id',
            //'team_id',
            //'post_id',
            //'event_id',
        ],
    ]) ?>

</div>
