<?php

namespace App\Controller;

class RegisterController extends AppController
{

    public function index()
    {
        $title = 'Home';
        $name = 'Karim';
        $this->render('register/index', \compact('title', 'name'));
    }
    public function post()
    {
        $title = 'Home';
       var_dump($_POST);
       
        // $this->render('register/index', \compact('title', 'name'));
    }
}
