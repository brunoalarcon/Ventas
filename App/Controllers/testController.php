<?php

class TestController
{
    public function index()
    {
        require_once '../app/Views/test/index.phtml';

    }

    public function saludo($param=null)
    {
        if ($param == null){
            $data = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        }else{
            $data = isset($param[0]) ? $param[0] : '';
        }
        //echo isset($param) ? "Hola {$param[0]}" :"No ha especificado su nombre";
        require_once '../app/Views/test/saludo.phtml';

    }

    public function suma($param=null)
    {
        $num1= isset($param[0]) ? $param[0] : 0;
        $num2= isset($param[1]) ? $param[1] : 0;
        $rpta = $num1 + $num2;
        echo "la suma  de {$num1} + {$num2} es = {$rpta}";
    }

    public function multi($param=null)
    {
        $num1= isset($param[0]) ? $param[0] : 0;
        $num2= isset($param[1]) ? $param[1] : 0;
        $rpta = $num1 * $num2;
        echo "El producto de {$num1} x {$num2} es = {$rpta}";
    }
}

