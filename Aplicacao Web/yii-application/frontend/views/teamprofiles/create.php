<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofiles */

$this->title = 'Insert team info';
$this->params['breadcrumbs'][] = ['label' => 'Teamprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teamprofiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
