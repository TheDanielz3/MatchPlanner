<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */


//Link para voltar atrás
$profileView = Url::toRoute('site/match', true);
echo "<br/>";
echo "" . Html::a('Go back', $profileView, ['class' => 'btn btn-primary']);

$this->title = 'Create Team Profile';
//$this->params['breadcrumbs'][] = ['label' => 'Teamprofiles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teamprofile-create" style="color: #ffffff">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
