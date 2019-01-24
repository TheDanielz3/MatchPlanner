<?php

    use yii\helpers\Html;
    use yii\helpers\Url;

//Esta vista server para selecionar o tipo de perfil desejado

    echo "<h1 style='color: #ffffff; text-align: center;'>" . "Choose your profile type" . "</h1><br/><br/>";

    $solo = Url::toRoute('userprofile/create');
    $team = Url::toRoute('teamprofile/create');

    ?>

    <div id="container">
        <?php echo Html::a('Solo', $solo, ['class' => 'btn btn-primary']); ?>
        &nbsp;
        &nbsp;
        &nbsp;
        <?php echo Html::a('Team', $team, ['class' => 'btn btn-primary']); ?>
    </div>

    <?php

    echo "<br/>";
    //echo Html::a('Solo', $solo, ['class' => 'btn btn-primary']);
    echo "<br><br/>";
    //echo Html::a('Team', $team, ['class' => 'btn btn-primary']);
?>