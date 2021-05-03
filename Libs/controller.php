<?php  

class Controller
{
    public function renderView(string $view, $data= null)
    {
        //require_once '../app/Views/test/saludo.phtml';
        
        require_once '../app/Views/' .$view . '.phtml';
    }
}
