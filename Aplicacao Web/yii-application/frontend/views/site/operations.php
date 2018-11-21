<?php

    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\DetailView;
    use frontend\models\Event;

    //Esta vista serve para selecionar o tipo de perfil desejado


use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;


    $perfil = Url::toRoute('user/view' . '?id=' . Yii::$app->user->identity->getId(), true);
    $criarEvento = Url::toRoute('event/create', true);
    echo "<br/>";
    echo "" . Html::a('See profile', $perfil);
    echo "<br/>";
    echo "" . Html::a('Create event', $criarEvento);
?>