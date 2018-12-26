<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?= Html::encode($message);
    echo "<br/>" . $url = Url::toRoute('site/say');
    echo Html::a('link me',$url);
?>