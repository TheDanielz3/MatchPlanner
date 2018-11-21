<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

$mainView = Url::toRoute('site/operations', true);
echo "<br/>";
echo "" . Html::a('Go back to main view', $mainView);

$this->title = 'Create Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
