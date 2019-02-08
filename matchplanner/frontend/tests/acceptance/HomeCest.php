<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {

        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('My Application');
        $I->click('See Profile');
        $I->wait(2); // wait for page to be opened
        $I->see('This is the About page.');
    }
}
