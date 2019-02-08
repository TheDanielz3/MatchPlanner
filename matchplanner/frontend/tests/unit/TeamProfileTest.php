<?php namespace frontend\tests;

use frontend\models\Teamprofile;


class TeamProfileTest extends \Codeception\Test\Unit
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
    public function testDBCRUD()
    {
        $teamprofile = new Teamprofile();


        $this->tester->comment('verificar validação do modelo TeamProfiles');




        $teamprofile->id = 2;
        $this->assertTrue($teamprofile->validate(['id']));

        $teamprofile->id = "asdsda";
        $this->assertFalse($teamprofile->validate(['id']));




        $teamprofile->team_name = "asdasdsadasdasdasdadadadaasasdsdasdsaasdsdasasdassdadasdsddasaadsasaddsasdasdadsasaddsdsasadsaddsadasdsadsadsaddsadsadasdas";
        $this->assertFalse($teamprofile->validate(['team_name']));

        $teamprofile->team_name = null;
        $this->assertFalse($teamprofile->validate(['team_name']));

        $teamprofile->team_name = "The Monty Python";
        $this->assertTrue($teamprofile->validate(['team_name']));




        $teamprofile->user_id = -1;
        $this->assertFalse($teamprofile->validate(['user_id']));

        $teamprofile->user_id = null;
        $this->assertFalse($teamprofile->validate(['user_id']));



        //Validaçoes assim so podem ser efetuadas com users....
        $teamprofile->user_id = 22;
        $this->assertTrue($teamprofile->validate(['user_id']));

       $teamprofile->member1 = null;
       $this->assertFalse($teamprofile->validate(['member1']));

       $teamprofile->member1 = "diogo";
       $this->assertTrue($teamprofile->validate(['member1']));

       $teamprofile->member2 = null;
       $this->assertFalse($teamprofile->validate(['member2']));

       $teamprofile->member3 = null;
       $this->assertFalse($teamprofile->validate(['member3']));

        $teamprofile->member4 = null;
        $this->assertFalse($teamprofile->validate(['member4']));

        $teamprofile->member5 = null;
        $this->assertFalse($teamprofile->validate(['member5']));

        $teamprofile->member6 = null;
        $this->assertFalse($teamprofile->validate(['member6']));

        $validaTeamprofile = new Teamprofile();


        $validaTeamprofile->id = 2;
        $validaTeamprofile->team_name = 'The Monty Python';
        $validaTeamprofile->member1 = 'Diogo Alpendre';
        $validaTeamprofile->member2 = 'Diogo Alpendre';
        $validaTeamprofile->member3 = 'Diogo Alpendre';
        $validaTeamprofile->member4 = 'Diogo Alpendre';
        $validaTeamprofile->member5 = 'Diogo Alpendre';
        $validaTeamprofile->member6 = 'Diogo Alpendre';
        $validaTeamprofile->user_id = 22;

        $validaTeamprofile->save();


        $this->tester->seeRecord('frontend\models\Teamprofile', array('team_name' => 'The Monty Python'));
        $this->tester->seeRecord('frontend\models\Teamprofile', array('member1' => 'Diogo Alpendre'));
        $this->tester->seeRecord('frontend\models\Teamprofile', array('member2' => 'Diogo Alpendre'));
        $this->tester->seeRecord('frontend\models\Teamprofile', array('member3' => 'Diogo Alpendre'));
        $this->tester->seeRecord('frontend\models\Teamprofile', array('member4' => 'Diogo Alpendre'));
        $this->tester->seeRecord('frontend\models\Teamprofile', array('member5' => 'Diogo Alpendre'));
        $this->tester->seeRecord('frontend\models\Teamprofile', array('member6' => 'Diogo Alpendre'));



        $teamprofileupdate = Teamprofile::find()->where(['id' => 2])->one();

        $teamprofileupdate->member1 = "sadada asdsad";

        $teamprofileupdate->save();

        $this->tester->seeRecord('frontend\models\Teamprofile', array('member1' => 'sadada asdsad'));

        $deleteTeamprofile = Teamprofile::find()->where(['id' => 2])->one();

        $deleteTeamprofile->delete();

        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('id' => 2));
        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('team_name'=>'The Monty Python'));
        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('member1'=>'sadada asdsad'));
        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('member2'=>'Diogo Alpendre'));
        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('member3'=>'Diogo Alpendre'));
        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('member4'=>'Diogo Alpendre'));
        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('member5'=>'Diogo Alpendre'));
        $this->tester->dontSeeRecord('frontend\models\Teamprofile',array('member6'=>'Diogo Alpendre'));


    }
}