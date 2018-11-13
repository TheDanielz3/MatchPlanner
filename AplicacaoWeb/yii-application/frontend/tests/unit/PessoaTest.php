<?php namespace frontend\tests;

use frontend\models\Pessoa;

class PessoaTest extends \Codeception\Test\Unit
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
        $pessoa = new Pessoa();

        $pessoa->Nome;
    }
}