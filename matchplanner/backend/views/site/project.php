<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 23/01/2019
 * Time: 11:34
 */

use frontend\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;

$comments = Comment::find()->all();

foreach($comments as $comment)
{
    $urlApagarComment = Url::to(['comment/delete', 'id' => $comment->id]);

    echo $comment->content . " " . Html::a('Delete', ['comment/delete', 'id' => $comment->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this comment?',
                'method' => 'post',
            ],
        ]);
    echo "<br/><br/>";
}

?>