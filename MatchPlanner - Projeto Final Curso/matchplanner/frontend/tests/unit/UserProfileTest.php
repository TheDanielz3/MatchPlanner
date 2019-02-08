<?php namespace frontend\tests;

use frontend\models\Userprofile;

class UserProfileTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testUserDBCRUD()
    {
            $userprofile = new Userprofile();

            $this->tester->comment('verificar validação do modelo Userprofiles');

            $userprofile->id = "saads";
            $this->assertFalse($userprofile->validate(['id']));

            $this->tester->comment('verificar validação firstname');

            $userprofile->firstname = "qweqweqwqeqweqeqweqwqeqweqwewqeqweqwweqwewewqeqweqweqweqweqweqwewqwwewwqqeqeqweqweqweqwewweqweqweqweqweqweqeqweqweqeqweqqweweqeqwwewqeeqeqeqeqeqweqeqqweqweqeqeqeqeqwewqeweqeq";
            $this->assertFalse($userprofile->validate(['firstname']));

            $this->tester->comment('verificar validação surnames');
            $userprofile->surnames = 'sdadasdasdaasdsads adlasjdadjaldakldjaldaljljajjkdkljdssadksjdalajsdkladjsksjdkljaksdjlkdasjkldaslkjdaskjlsdajkldsajkldsjldksjkaldsjlkadssadsaasdsad';
            $this->assertFalse($userprofile->validate(['surnames']));

            $this->tester->comment('verificar validação bithdate');
            $userprofile->birthdate = date("yy-m-d");
            $this->assertTrue($userprofile->validate(['birthdate']));

            $this->tester->comment('verificar validação team_id');
            $userprofile->team_id = -1;
            $this->assertFalse($userprofile->validate(['team_id']));

            $this->tester->comment('verificar validação comment');
            $userprofile->user_id = -1;
            $this->assertFalse($userprofile->validate(['user_id']));

            //inserir registo válido

            $validuserprofile = new Userprofile();

            $validuserprofile->firstname = "Daniel xpto";

            $validuserprofile->surnames = "diogo sdfsd";

            $validuserprofile->birthdate = date("yy-m-d");

            $validuserprofile->sex = "M";

            $validuserprofile->id = 2;

            $validuserprofile->user_id = null;

            $validuserprofile->team_id = null;

            $validuserprofile->save();

            $this->tester->seeRecord('frontend\models\Userprofile', array('firstname' => 'Daniel xpto'));
            $this->tester->seeRecord('frontend\models\Userprofile', array('surnames' => 'diogo sdfsd'));
            $this->tester->seeRecord('frontend\models\Userprofile', array('birthdate' => date("yy-m-d")));
            $this->tester->seeRecord('frontend\models\Userprofile', array('sex' => 'M'));
            $this->tester->seeRecord('frontend\models\Userprofile', array('id' => 2));
            $this->tester->seeRecord('frontend\models\Userprofile', array('user_id' => null));
            $this->tester->seeRecord('frontend\models\Userprofile', array('team_id' => null));


            //findone
            //Todo: mostrar o userprofile

            $validuserprofileupdate = Userprofile::find()->where(['id' => 2])->one();

            $validuserprofileupdate->surnames = "sadada asdsad";

            $validuserprofileupdate->save();

            $this->tester->seeRecord('frontend\models\Userprofile', array('surnames' => 'sadada asdsad'));

            //$this->tester->seeRecord('frontend\models\Userprofile',array('surnames'=> 'sadada asdsad'));

            //Todo: delete user_profile

            $deleteuserprofile = Userprofile::find()->where(['id' => 2])->one();

            $deleteuserprofile->delete();

            $this->tester->dontSeeRecord('frontend\models\Userprofile', array('firstname' => 'Daniel xpto'));
            $this->tester->dontSeeRecord('frontend\models\Userprofile', array('surnames' => 'sadada asdsad'));
            $this->tester->dontSeeRecord('frontend\models\Userprofile', array('birthdate' => date("yy-m-d")));
            $this->tester->dontSeeRecord('frontend\models\Userprofile', array('sex' => 'M'));
            $this->tester->dontSeeRecord('frontend\models\Userprofile', array('id' => 2));
            $this->tester->dontSeeRecord('frontend\models\Userprofile', array('user_id' => null));
            $this->tester->dontSeeRecord('frontend\models\Userprofile', array('team_id' => null));


    }
}