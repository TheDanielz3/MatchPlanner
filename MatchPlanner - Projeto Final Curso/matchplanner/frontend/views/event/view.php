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

    <h1 style="color: #ffffff"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Event', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete Event', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this event?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="detail">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'event_name',
                'begin_date',
                'end_date',
                'description'
                //'user_id',
                //'team_id',
            ],
        ]) ?>
    </div>


  <?php

      $createPost = Url::to(['post/create', 'event_id' => $model->id]);

      echo "" . Html::a('Create Post', $createPost, ['class' => 'btn btn-primary']);

        //ID do evento respetivo aos posts
        $id = $model->id;

        //Encontra todos os posts do evento
        $posts = Post::findAll([
            'event_id' => $id
        ]);

        //Mostra os posts do evento
          //Mostra os posts do evento
      foreach($posts as $post)
      {
          $urlPost = Url::toRoute(['event/view', 'id' => $post->id]);
          echo "<br/><br/><br/>" . "<h1 style='color: #ffffff'>" . $post->title . "</h1>";
          //echo "<br/><h4>" . $post->content . "</h4>";

          ?>

          <textarea disabled readonly="readonly" rows="5" cols="50" style="resize: none"><?= $post->content . "\n\n" ?></textarea>

          <?php

          echo "<br/><h5 style='background-color: #a4d1ff; float:left; display:inline-block; background-size: 900px 100px;'  '>#" . $post->tag . "</h5>";
          echo "<br/><br/>" . Html::a('Update Post', ['post/update', 'id' => $post->id, 'event_id' => $model->id], ['class' => 'btn btn-primary']);
          //echo " " . Html::a('Delete Post', ['post/delete', 'id' => $post->id, 'event_id' => $model->id], ['class' => 'btn btn-danger']);
          echo " " . Html::a('Delete Post', ['post/delete', 'id' => $post->id, 'event_id' => $model->id], [
              'class' => 'btn btn-danger',
              'data' => [
                  'confirm' => 'Are you sure you want to delete this post?',
                  'method' => 'post',
              ],
          ]);
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
              ?>

            <?php

              echo "<h5 style='background-color: #a4d1ff; float:left; display:inline-block; background-size: 900px 100px;'  '>#" . $comment->tag . "</h5><br/>";
              echo Html::a('Delete Comment', ['comment/delete', 'event_id' => $model->id, 'post_id' => $post->id, 'id' => $comment->id], [
                  'class' => 'btn btn-danger pull-right',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this comment?',
                      'method' => 'post',
                  ],
              ]);
              echo Html::a('Update Comment', ['comment/update', 'event_id'  => $model->id, 'post_id' => $post->id, 'id' => $comment->id], ['class' => 'btn btn-primary pull-right']) . "<br/><br/>";
          }
      }

        echo "<br/><br/><br/>";
  ?>

</div>