<?php  

namespace Libs;

class Controller
{
    protected $template;
    public function renderView(string $view, $data= null)
    {
        //require_once '../app/Views/test/saludo.phtml';
        
        require_once '../app/Views/' .$view . '.phtml';
    }

    public function loadDirectoryTemplate(string $directory)
    {
        $this->template = new \League\Plates\Engine(MAINPATH .'app/views/' . $directory);
        $this->template->setFileExtension('phtml');
    }
}
