<?php

use yii\helpers\Html;
use yii\bootstrap\Button;
use yii\helpers\Url;
use yii\widgets\DetailView;
use frontend\models\Post;
use frontend\models\Comment;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

//Link para voltar à main view
$mainView = Url::toRoute('site/operations', true);
echo "<br/>";
echo "" . Html::a('Go back to main view', $mainView, ['class' => 'btn btn-primary']);

$this->title = $model->event_name;
//$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Event', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete Event', ['delete', 'id' => $model->id], [
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

        //Mostra os posts do evento
        foreach($posts as $post)
        {
            $urlPost = Url::toRoute(['event/view', 'id' => $post->id]);
            echo "<br/><br/><br/>" . "Title --> " . $post->title;
            echo "<br/>" . "Content --> " . $post->content;
            echo "<br/>" . "Tag --> " . $post->tag . "<br/>";
            echo "<br/><br/>" . Html::a('Update Post', ['post/update', 'id' => $post->id, 'event_id' => $model->id], ['class' => 'btn btn-primary']);
            echo " " . Html::a('Delete Post', ['post/delete', 'id' => $post->id, 'event_id' => $model->id], ['class' => 'btn btn-danger']);
            echo "<br/><br/>";

            echo "<br/>" . Html::a('Create Comment', ['comment/create', 'event_id'  => $model->id, 'post_id' => $post->id], ['class' => 'btn btn-primary']) . "<br/>";

            //Comentários
            $comments = Comment::findAll([
                'post_id' => $post->id
            ]);

            foreach($comments as $comment)
            {
                $urlComment = Url::toRoute(['event/view', 'id' => $post->id]);
                echo "<br/><pre style='background-color: white'>" . $comment->content . "</pre>";
                echo "<pre style='background-color: #3399ff'>" . $comment->tag . "</pre>";
                echo Html::a('Delete Comment', ['comment/delete', 'event_id'  => $model->id, 'post_id' => $post->id, 'id' => $comment->id], ['class' => 'btn btn-danger pull-right'])
                . Html::a('Update Comment', ['comment/update', 'event_id'  => $model->id, 'post_id' => $post->id, 'id' => $comment->id], ['class' => 'btn btn-primary pull-right']) . "<br/><br/>";
            }
        }

        //echo "<br/><br/><br/><br/>";

        $createPost = Url::to(['post/create', 'event_id' => $model->id]);

        echo "<br/><br/><br><br>" . Html::a('Create New Post', $createPost, ['class' => 'btn btn-primary']);
  ?>

</div>