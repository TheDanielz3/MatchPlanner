<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Userprofiles */

$this->title = 'Insert solo user information';
$this->params['breadcrumbs'][] = ['label' => 'Userprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userprofiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
