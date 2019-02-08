<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkHome(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('MatchPlanner');
        $I->seeLink('Login');
        $I->click('Login');
        $I->see('Username');

    }
}