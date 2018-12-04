<?php

use yii\helpers\Html;
use yii\bootstrap\Button;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\models\Post;

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

        //ID do evento respetivo aos posts
        $id = $model->id;

        //Encontra todos os posts do evento
        $posts = Post::findAll([
            'event_id' => $id
        ]);

        foreach($posts as $post)
        {
            $urlPost = Url::toRoute(['event/view', 'id' => $post->id]);
            echo "<br/>" . "Title " . $post->title;
            echo "<br/>" . "Tag" . $post->tag;
            echo "<br/>";
        }

        echo "<br/><br/><br/>";

        $createPost = Url::to(['post/create', 'event_id' => $model->id]);

        echo "" . Html::a('Create Post', $createPost, ['class' => 'btn btn-primary']);
  ?>

</div>