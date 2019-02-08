<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\controllers\PostController;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */

echo "<br/>";
$idEvent = Yii::$app->request->getQueryParam('event_id');
echo "" . Html::a('Go back to event', Url::toRoute(['event/view', 'id' => $idEvent]), ['class' => 'btn btn-primary']);

$this->title = 'Create Post';
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create" style="color: #ffffff">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
