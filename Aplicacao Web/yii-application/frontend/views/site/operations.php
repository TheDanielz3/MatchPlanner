<?php

    use yii\helpers\Html;
    use yii\helpers\Url;

    //Esta vista server para selecionar o tipo de perfil desejado

    $perfil = Url::toRoute('userprofiles/view');
    $criarEvento = Url::toRoute('events/create');
    echo "<br/>";
    echo "" . Html::a('Ver perfil', $perfil);
    echo "<br/>";
    echo "" . Html::a('Criar evento', $criarEvento);

?>