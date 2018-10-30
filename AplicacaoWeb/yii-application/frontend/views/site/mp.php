<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\widgets\DetailView;

    $url = Url::toRoute('teams/index');
    echo "Click to acess your teams --> x" . Html::a('Teams', $url);

?>