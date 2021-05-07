<?php

namespace App\Controllers;

use Libs\Controller;

class HomeController extends Controller
{
    public function __construct() {
        $this->loadDirectoryTemplate('home');
    }
    
    public function index()
    {
        //require_once '../app/Views/home/index.phtml';
        //echo ROOT, "<br>";
        //echo MAINPATH, "<br>";
        //$this->renderView('home/index');
        // $template = new \League\Plates\Engine(MAINPATH .'app/views/home');
        // $template->setFileExtension('phtml');
       
        echo $this->template->render('index');
    }
}
