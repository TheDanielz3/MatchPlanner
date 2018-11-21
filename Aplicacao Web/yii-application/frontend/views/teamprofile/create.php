<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */

$this->title = 'Create Teamprofile';
$this->params['breadcrumbs'][] = ['label' => 'Teamprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teamprofile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
