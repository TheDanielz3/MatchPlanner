<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Teamprofile */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Teamprofiles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;


//Link para voltar à main view
$mainView = Url::toRoute('site/operations', true);
echo "<br/>";
echo "" . Html::a('Go back to main view', $mainView, ['class' => 'btn btn-primary']);

\yii\web\YiiAsset::register($this);
?>
<div class="teamprofile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="detail">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'team_name',
                'member1',
                'member2',
                'member3',
                'member4',
                'member5',
                'member6',
                //'user_id',
            ],
        ]) ?>
    </div>
</div>
