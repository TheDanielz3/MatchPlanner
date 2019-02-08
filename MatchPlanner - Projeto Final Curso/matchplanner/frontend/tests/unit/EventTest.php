<?php namespace frontend\tests;

use frontend\models\Event;

class EventTest extends \Codeception\Test\Unit
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
    public function testSomeFeature()
    {

        $event = new Event();

        $event->event_name = 'Hora do chá';
        $this->assertTrue($event->validate(['event_name']));

        $event->event_name = null;
        $this->assertFalse($event->validate(['event_name']));

        $event->event_name = 0;
        $this->assertFalse($event->validate(['event_name']));

        $event->description = 'asdasdsadasdasdasdadadadaasasdsdasdsaasdsdasasdassdadasdsddasaadsasaddsasdasdadsasaddsdsasadsaddsadasdsadsadsaddsadsadasdasasdasdsadasdasdasdadadadaasasdsdasdsaasdsdasasdassdadasdsddasaadsasaddsasdasdadsasaddsdsasadsaddsadasdsadsadsaddsadsadasdasasdasdsadasdasdasdadadadaasasdsdasdsaasdsdasasdassdadasdsddasaadsasaddsasdasdadsasaddsdsasadsaddsadasdsadsadsaddsadsadaasdasdsadasdasdasdadadadaasasdsdasdsaasdsdasasdassdadasdsddasaadsasaddsasdasdadsasaddsdsasadsaddsadasdsadsadsaddsadsadasdasasdasdsadasdasdasdadadadaasasdsdasdsaasdsdasasdassdadasdsddasaadsasaddsasdasdadsasaddsdsasadsaddsadasdsadsadsaddsadsadasdas';
        $this->assertFalse($event->validate(['description']));

        $event->description = 'Eu sou uma descricao de evento';
        $this->assertTrue($event->validate(['description']));

        $event->user_id = null;
        $this->assertTrue($event->validate(['user_id']));

        $event->user_id = 22;
        $this->assertTrue($event->validate(['user_id']));

        $event->user_id = 'askjhsakjhaskjdh';
        $this->assertFalse($event->validate(['user_id']));


        $event->team_id = null;
        $this->assertTrue($event->validate(['team_id']));

        $event->team_id = 30;
        $this->assertTrue($event->validate(['team_id']));

        $event->team_id = 'askjhsakjhaskjdh';
        $this->assertFalse($event->validate(['team_id']));

        $event->begin_date = '';
        $this->assertFalse($event->validate(['begin_date']));

        $event->begin_date = '2018-12-03 01:12:00';
        $this->assertTrue($event->validate(['begin_date']));

        $event->end_date = '';
        $this->assertFalse($event->validate(['end_date']));

        $event->end_date = '2018-12-04 01:12:00';
        $this->assertTrue($event->validate(['end_date']));


        $eventValida = new Event();

        $eventValida->id = 120;

        $eventValida->event_name = 'Sou um evento';

        $eventValida->user_id = 22;

        $eventValida->description = 'Sou uma descricao';

        $eventValida->begin_date = '2018-12-04 01:12:00';

        $eventValida->end_date = '2018-12-04 01:12:00';

        $eventValida->save();

        $this->tester->seeRecord('frontend\models\Event', array('event_name' => 'Sou um evento'));
        $this->tester->seeRecord('frontend\models\Event', array('user_id' => 22));
        $this->tester->seeRecord('frontend\models\Event', array('description' => 'Sou uma descricao'));
        $this->tester->seeRecord('frontend\models\Event', array('begin_date' => '2018-12-04 01:12:00'));
        $this->tester->seeRecord('frontend\models\Event', array('end_date' => '2018-12-04 01:12:00'));

        $eventUpdate = Event::find()->where(['id' => 120])->one();

        $eventUpdate->event_name = 'delilah';

        //Salvar
        $eventUpdate->save();

        $this->tester->seeRecord('frontend\models\Event',array('event_name' => 'delilah'));



        $eventDelete = Event::find()->where(['id' => 120])->one();

        $eventDelete->delete();

        $this->tester->dontSeeRecord('frontend\models\Event', array('event_name' => 'Sou um evento'));
        $this->tester->dontSeeRecord('frontend\models\Event', array('user_id' => 22));
        $this->tester->dontSeeRecord('frontend\models\Event', array('description' => 'Sou uma descricao'));
        $this->tester->dontSeeRecord('frontend\models\Event', array('begin_date' => '2018-12-04 01:12:00'));
        $this->tester->dontSeeRecord('frontend\models\Event', array('end_date' => '2018-12-04 01:12:00'));












    }
}