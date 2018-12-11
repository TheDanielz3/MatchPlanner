<?php

    use yii\helpers\Html;
    use yii\helpers\Url;

//Esta vista server para selecionar o tipo de perfil desejado

    $solo = Url::toRoute('userprofile/create');
    $team = Url::toRoute('teamprofile/create');
    echo "<br/>";
    echo "" . Html::a('Solo', $solo, ['class' => 'btn btn-primary'])
        . " " . Html::a('Team', $team, ['class' => 'btn btn-primary']);
?>