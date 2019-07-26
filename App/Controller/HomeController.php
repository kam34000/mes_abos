<?php

namespace App\Controller;

class HomeController extends AppController{

    public function index(){
        $title = 'Home';
        $this->render('home/index', \compact('title'));
    }

}