<?php

    use yii\helpers\Html;
    use yii\helpers\Url;

    //Esta vista server para selecionar o tipo de perfil desejado

    $solo = Url::toRoute('userprofiles/create');
    $team = Url::toRoute('teamprofiles/create');
    echo "<br/>";
    echo "" . Html::a('Solo', $solo);
    echo "<br/>";
    echo "" . Html::a('Team', $team);
    
?>