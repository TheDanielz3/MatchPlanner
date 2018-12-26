<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 26/09/2018
 * Time: 11:32
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>
<?php
    $url = Url::toRoute('team/index');
    echo "<br/>";
    echo "" . Html::a('Teams', $url);
?>