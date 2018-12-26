<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>This is the About page. You may modify the following file to customize its content:</p>

    <p class="lead text-lowercase text-center">Hello world</p>

    <p class="text-center text-uppercase">Hello world</p>

    <p class="text-center text-uppercase">Hello world</p>

    <p class="text-center">Diminutive for Diogo Alpendre is <abbr title="attribute">DA</abbr></p>

    <address class="text-center">
        <strong>Twitter, Inc.</strong><br>
        1355 Market Street, Suite 900<br>
        San Francisco, CA 94103<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
    </address>
    <address class="text-center">
        <strong>Full Name</strong><br>
        <a href="mailto:#">first.last@example.com</a>
    </address>
    <p class="alert alert-danger text-center" role="alert">paragrafo 1</p>
    <p class="alert alert-warning text-center" role="alert">paragrafo 2</p>

    <code><?= __FILE__ ?></code>
</div>
