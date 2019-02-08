<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Userprofile */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Userprofiles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

//Link para voltar à main view
$mainView = Url::toRoute('site/operations', true);
echo "<br/>";
echo "" . Html::a('Go back to main view', $mainView, ['class' => 'btn btn-primary']);
?>
<div class="userprofile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="detail">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'firstname',
                'surnames',
                'birthdate',
                'sex',
                //'user_id',
                //'team_id',
            ],
        ]) ?>
    </div>

</div>
