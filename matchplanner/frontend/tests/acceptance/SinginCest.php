<?php namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;

class SinginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('MatchPlanner');
      //  $I->fillField('username', 'Sevilha2018');
      //  $I->fillField('password', 'testes2018');
      //  $I->click('login');
        // $I->see('MatchPlanner');


    }

}
