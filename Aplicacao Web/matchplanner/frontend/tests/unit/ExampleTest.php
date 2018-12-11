<?php namespace frontend\tests;

use frontend\models\Calculadora;

class ExampleTest extends \Codeception\Test\Unit
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
        $calculadora = new Calculadora();


        //Soma Test
        $soma = $calculadora->soma(1,2);
        $this->assertEquals(3,$soma);
    }
}