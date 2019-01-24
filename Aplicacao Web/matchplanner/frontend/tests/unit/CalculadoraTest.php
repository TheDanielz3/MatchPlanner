<?php

use Codeception\Test\Unit;
use frontend\models\Calculadora;

class CalculadoraTest extends Unit
{
    /**
     * @var \UnitTester
     */
    //protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
    }

    public function testSumOperation()
    {
        $calculadora = new Calculadora();

        $soma = $calculadora->soma(2, 1);

        $this->assertEquals($soma, 3);
    }
}