<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\controllers\PostController;

/* @var $this yii\web\View */
/* @var $model frontend\models\Post */

//$idEvent = Yii::$app->request->getQueryParam('EventID');
//$idEvent = $model->event->id;
//$idFDS = Yii::$app->request->getQueryParam('EventID');

/*$idEvent = Yii::$app->request->getQueryParam('EventID');
var_dump($idEvent);
die();

//Link para voltar à main view
$eventView = Url::toRoute(['event/view', 'id' => $idEvent]);
echo "<br/>";
echo "" . Html::a('Go back to event', $eventView);*/

$this->title = 'Create Post';
//$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <br/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
