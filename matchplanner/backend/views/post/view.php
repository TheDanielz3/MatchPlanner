<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */


//Link para voltar aos comments
$events = Url::toRoute('post/index', true);
echo "<br/>";
echo "" . Html::a('Go back to posts', $events, ['class' => 'btn btn-primary']);

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
            'id',
            'title',
            'content',
            'tag',
            'create_time',
            /*[
                'attribute' => 'image',
                'value' => Yii::getAlias('@imageUrl') . '/' . $model->image,
                'format' => ['image', ['width' => '100', 'height' => '100']]
            ]*/
            'user_id',
            'team_id',
            'event_id',
        ],
    ]) ?>

</div>
