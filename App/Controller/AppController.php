<?php

namespace App\Controller;

use Core\Controller\Controller;

class AppController extends Controller{
    
    protected $layout = 'default';

    public function __construct(){
        
        $this->viewPath = ROOT. '/App/Views/';
        
    }
}