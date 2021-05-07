<?php

namespace App\Controllers;

use Libs\Controller;

class TestController extends Controller
{
    public function __construct() {
        $this->loadDirectoryTemplate('test');
    }

    public function index()
    {
        //require_once '../app/Views/test/index.phtml';
        //$this->renderView('test/index');
        // $template = new \League\Plates\Engine(MAINPATH .'app/views/test');
        // $template->setFileExtension('phtml');
        echo $this->template->render('index');

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

        // $data= [
        //     'nombre' => $nombre,
        //     //'dato2' => 'Juaneco',
        //     //'dato3' => 56
        // ];
        
        //$this->renderView('test/saludo', $data);
        
        echo $this->template->render('saludo', ['nombre' => $nombre]);

    }

    public function suma($param=null)
    {
        // $num1= isset($param[0]) ? $param[0] : 0;
        // $num2= isset($param[1]) ? $param[1] : 0;
        // $rpta = $num1 + $num2;

        $num1 = isset($_POST['num1']) ? $_POST['num2'] : 0;
        $num2 = isset($_POST['num1']) ? $_POST['num2'] : 0;
        
        $rpta= $num1 +$num2;
        
        // $data= [
        //     'num1' => $num1,
        //     'num2' => $num2,
        //     'rpta' => $rpta
        // ];

        // $this->renderView('test/suma', $data);
        
        echo $this->template->render('suma', [
            'num1' => $num1,
            'num2' => $num2,
            'rpta' => $rpta
            ]);
    }

}

