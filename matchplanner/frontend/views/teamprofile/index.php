<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TeamprofileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teamprofiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teamprofile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Teamprofile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'team_name',
            'member1',
            'member2',
            'member3',
            //'member4',
            //'member5',
            //'member6',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
