<?php

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
    $criarEvento = Url::toRoute('event/create', true);

    echo "<br/>";
    echo "" . Html::a('See Profile', $perfil, ['class' => 'btn btn-primary']);
    echo "<br/><br/>";

    $user = Userprofile::findOne($id);
    $team = Teamprofile::findOne($id);

    if($user != null)
    {
        echo "" . Html::a('See Solo Profile', $perfilSolo, ['class' => 'btn btn-primary']);
        echo "<br/><br/>";
    }

    if($team != null)
    {
        echo "" . Html::a('See Team Profile', $perfilTeam, ['class' => 'btn btn-primary']);
        echo "<br/><br/>";
    }

    echo "" . Html::a('Create Event', $criarEvento,['class' => 'btn btn-primary']);
    echo "<br/><br/><br/>";

    //Total de eventos
    $eventos = Event::findAll([
        'user_id' => $id
    ]);

    echo "Eventos" . "<br/>";

    foreach($eventos as $evento)
    {
        //Link para cada evento
        $urlEvento = Url::toRoute(['event/view', 'id' => $evento->id]);

        //Imprime hyperlink para aceder
        echo "<br/>" . Html::a($evento->event_name, $urlEvento, ['class' => 'btn btn-primary']) . "<br/>";
    }
?>