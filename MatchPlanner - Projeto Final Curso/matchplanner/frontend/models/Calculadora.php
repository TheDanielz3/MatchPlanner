<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 06/11/2018
 * Time: 13:21
 */

namespace frontend\models;

class Calculadora
{
    public function soma($num1, $num2)
    {
        $resultado = $num1 + $num2;
        return $resultado;
    }

    public function subtracao($num1, $num2)
    {
        $resultado = $num1 - $num2;
        return $resultado;
    }

    public function multiplicacao($num1, $num2)
    {
        $resultado = $num1 * $num2;
        return $resultado;
    }

    public function divisao($num1, $num2)
    {
        $resultado = $num1 / $num2;
        return $resultado;
    }
}