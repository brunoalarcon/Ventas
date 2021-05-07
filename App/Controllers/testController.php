<?php

namespace App\Controllers;

use Libs\Controller;

class TestController extends Controller
{
    public function index()
    {
        //require_once '../app/Views/test/index.phtml';
        $this->renderView('test/index');

    }

    public function saludo($param=null)
    {
        if ($param == null){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        }else{
            $nombre = isset($param[0]) ? $param[0] : '';
        }
        //echo isset($param) ? "Hola {$param[0]}" :"No ha especificado su nombre";
        //require_once '../app/Views/test/saludo.phtml';

        $data= [
            'nombre' => $nombre,
            //'dato2' => 'Juaneco',
            //'dato3' => 56
        ];
        
        $this->renderView('test/saludo', $data);

    }

    public function suma($param=null)
    {
        // $num1= isset($param[0]) ? $param[0] : 0;
        // $num2= isset($param[1]) ? $param[1] : 0;
        // $rpta = $num1 + $num2;

        $num1 = isset($_POST['num1']) ? $_POST['num2'] : 0;
        $num2 = isset($_POST['num1']) ? $_POST['num2'] : 0;
        
        $rpta= $num1 +$num2;
        
        $data= [
            'num1' => $num1,
            'num2' => $num2,
            'rpta' => $rpta
        ];

        $this->renderView('test/suma', $data);
    }

    public function multi($param=null)
    {
        $num1= isset($param[0]) ? $param[0] : 0;
        $num2= isset($param[1]) ? $param[1] : 0;
        $rpta = $num1 * $num2;
        echo "El producto de {$num1} x {$num2} es = {$rpta}";
    }
}

