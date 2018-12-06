<?php

    use yii\helpers\Html;
    USE yii\grid\GridView;
    use yii\helpers\Url;
    use yii\widgets\DetailView;
    use frontend\models\Userprofile;
    use frontend\models\Teamprofile;
    use frontend\models\Event;
    use frontend\controllers\SiteController;

    //Esta vista serve para selecionar o tipo de perfil desejado


use yii\bootstrap\ActiveForm;

    $this->title = 'Login';
    $this->params['breadcrumbs'][] = $this->title;
    $id = Yii::$app->user->identity->getId();

    $perfil = Url::to(['user/view', 'id' => $id]);
    $perfilSolo = Url::to(['userprofile/view', 'id' => $id]);
    $perfilTeam = Url::to(['teamprofile/view', 'id' => $id]);
    $criarEvento = Url::toRoute('event/create', true);

    echo "<br/>";
    echo "" . Html::a('See profile', $perfil);
    echo "<br/><br/>";

    $user = Userprofile::findOne($id);
    $team = Teamprofile::findOne($id);

    if($user != null)
    {
        echo "" . Html::a('See solo profile', $perfilSolo);
        echo "<br/><br/>";
    }

    if($team != null)
    {
        echo "" . Html::a('See team profile', $perfilTeam);
        echo "<br/><br/>";
    }

    echo "" . Html::a('Create event', $criarEvento);
    echo "<br/><br/><br/>";

    //Total de eventos
    $eventos = Event::findAll([
        'user_id' => $id
    ]);

    echo "Eventos" . "<br/>";

    foreach($eventos as $evento)
    {
        $urlEvento = Url::toRoute(['event/view', 'id' => $evento->id]);
        echo "<br/>" . "Evento " . $evento->event_name . Html::a(" : Clique para aceder", $urlEvento);
    }
?>