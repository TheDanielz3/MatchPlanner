<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Posts */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-view">

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
            'user_id',
            'team_id',
            'event_id',
        ],
    ]) ?>

    <?php

    $comments = $model ->comments;

    //Mostra se comments foram diferentes de vazio
    if (!is_null($comments)) {

        //Mostra os posts do evento
        foreach ($comments as $comment) {
            echo "<br/>" . $comment->content . "<br/>";
        }

    }
    ?>

</div>
