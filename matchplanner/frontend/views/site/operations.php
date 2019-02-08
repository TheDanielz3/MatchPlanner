<?php

use yii\bootstrap\ButtonDropdown;
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
    use yii\grid\GridView;
    use tecnocen\hoverdropdown\HoverDropdownAssetBundle;
    use yii\helpers\Url;
    use yii\widgets\DetailView;
    use frontend\models\Userprofile;
    use frontend\models\Teamprofile;
    use frontend\models\Event;
    use frontend\controllers\SiteController;
    use yii\bootstrap\ActiveForm;

    //Esta vista serve para selecionar o tipo de perfil desejado e criar e ver os eventos

    //$this->title = 'Login';
    //$this->params['breadcrumbs'][] = $this->title;
    $id = Yii::$app->user->identity->getId();

    $perfil = Url::to(['user/view', 'id' => $id]);
    $perfilSolo = Url::to(['userprofile/view', 'id' => $id]);
    $perfilTeam = Url::to(['teamprofile/view', 'id' => $id]);
    $criarPerfil = Url::toRoute('site/match', true);
    $criarEvento = Url::toRoute('event/create', true);

    echo "<br/>";
    echo "" . Html::a('See profile', $perfil, ['class' => 'btn btn-primary']);
    echo "<br/><br/>";

    $user = Userprofile::findOne($id);
    //var_dump($user);
    $team = Teamprofile::findOne($id);
    //var_dump($team);

    if($user != null)
    {
        echo "" . Html::a('See solo profile', $perfilSolo, ['class' => 'btn btn-primary']);
        echo "<br/><br/>";
    }

    if($team != null)
    {
        echo "" . Html::a('See team profile', $perfilTeam, ['class' => 'btn btn-primary']);
        echo "<br/><br/>";
    }

    //Se profile existir é permitido criar eventos
    if($user || $team != null)
    {
        echo "" . Html::a('Create event', $criarEvento, ['class' => 'btn btn-primary']);
        echo "<br/><br/><br/>";
    }

    //Total de eventos
    $eventos = Event::findAll([
        'user_id' => $id
    ]);

    //Total de eventos de team profiles
    $eventosT = Event::findAll([
        'team_id' => $id
    ]);

    ?>

    <?php

    echo "<h3 style='color: #ffffff'>Events</h3>" . "<br/>";

    //Eventos de perfis solo
    foreach($eventos as $evento)
    {
        //Link para cada evento
        $urlEvento = Url::toRoute(['event/view', 'id' => $evento->id]);

        //Imprime hyperlink para aceder
        echo "<br/>" . Html::a($evento->event_name, $urlEvento, ['class' => 'btn btn-primary']) . "<br/>";
    }

    ?>

    <?php

    //Eventos de perfis teams
    foreach($eventosT as $evento)
    {
        //Link para cada evento
        $urlEvento = Url::toRoute(['event/view', 'id' => $evento->id]);

        //Imprime hyperlink para aceder
        echo "<br/>" . Html::a($evento->event_name, $urlEvento, ['class' => 'btn btn-primary']) . "<br/>";

        //HoverDropdownAssetBundle::register();
    }
?>