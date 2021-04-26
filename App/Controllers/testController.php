<?php

class TestController
{
    public function index()
    {
        echo "PAGINA DE PRUEBA";
    }

    public function saludo($param=null)
    {
        echo isset($param) ? "Hola {$param[0]}" :"No ha especificado su nombre";
    }

    public function suma($param=null)
    {
        $num1= isset($param[0]) ? $param[0] : 0;
        $num2= isset($param[1]) ? $param[1] : 0;
        $rpta = $num1 + $num2;
        echo "la suma  de {$num1} + {$num2} es = {$rpta}";
    }
}
