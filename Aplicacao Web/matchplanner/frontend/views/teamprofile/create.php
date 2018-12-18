<?php

use yii\helpers\Html;
use yii\helpers\Url;

//Link para voltar atrás
$profileView = Url::toRoute('site/match', true);
echo "<br/>";
echo "" . Html::a('Go back', $profileView, ['class' => 'btn btn-primary']);

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */

$this->title = 'Create Team Profile';
//$this->params['breadcrumbs'][] = ['label' => 'Teamprofiles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teamprofile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
