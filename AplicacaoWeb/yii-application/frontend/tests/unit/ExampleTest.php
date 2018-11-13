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

        $soma = $calculadora->soma(2, 1);
        $subtracao = $calculadora->subtracao(2, 1);
        $multiplicacao = $calculadora->multiplicacao(2, 5);
        $divisao = $calculadora->divisao(10, 2);

        $this->assertEquals(3, $soma);
        $this->assertEquals(1, $subtracao);
        $this->assertEquals(10, $multiplicacao);
        $this->assertEquals(5, $divisao);
    }
}