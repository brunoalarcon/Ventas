<?php

namespace App\Controllers;

use Libs\Controller;

class HomeController extends Controller
{
    public function index()
    {
        //require_once '../app/Views/home/index.phtml';
        $this->renderView('home/index');
    }
}
