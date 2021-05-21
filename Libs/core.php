<?php

namespace Libs;

class Core
{
    public function __construct()
    {
         //Capturamos los elementos de la peticion
        $url = isset($_GET['url'])? $_GET['url']: null;
        //Quitamos el último /
        $url = rtrim($url, '/');
        //Convertimos en array los elementosde la URL (petición)
        $url = explode('/', $url);

        //echo "<pre>", print_r($url), "<pre>";
        myEcho($url);

        //si el usuario mo proporciona un controlador
        if (empty($url[0])) {
            //Llamamos al controlador predeterminado
            require_once '../App/Controllers/homeController.php';
            (new \App\Controllers\HomeController())->index();
            return false;
        }
        
        //Cuando el usuario especifique un controlador
        //Formamos la ruta de ese controllador
        $path_controller = '../App/Controllers/' . $url[0].'Controller.php';

        //verificamos si el controlador especificado existe
        if (file_exists($path_controller)) {
            //Creamos una instancia de dicho controlador
            require_once $path_controller;
            $controller_name = '\\App\\Controllers\\' .$url[0]. 'Controller';
            $controller = new $controller_name();
            //echo "El controlador {$url[0]} existe";
            
            $size= count($url);         
            
            //Si la cantidad de elementos del array es mayor o iguala  dos
            //entonces se ha especificado un controlador y una accion
            if ($size >=2) {
                //verificamos que la accion especificada por el usuario exista en el controlador
                if (method_exists($controller, $url[1])) {
                    //verificamos si existen parametros
                    if ($size >=3) {
                        //Al menos el usuario a especificado un parámetro

                        //capturamos los parametros ingresados en un array "parametros"
                        $param = [];
                        for ($i=2; $i < $size ; $i++) { 
                            array_push($param, $url[$i]);
                        }

                        //Llamammos al controlador, su acción y le especificamos los parámetros
                        $controller->{$url[1]}($param);
                    }else{
                        //En aso que el usuario no especifique parámetros entonces
                        //llamamos a la acción sin parámetros
                        $controller->{$url[1]}();
                    }
                }else{
                     echo "El método de acción {$url[1]} no existe";
                }
            }else{
                //Cuando el usuario no especifique ninguna accion llamamos de 
                //manera predeterminada a ala accion index
                $controller->index();
            }

        }else{
            //echo "El controlador {$url[0]} no existe";
        }
    }
}