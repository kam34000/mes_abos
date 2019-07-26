<?php

namespace App\Controller;

class HomeController extends AppController
{

    public function index()
    {
        $title = 'Home';
        $name = 'Karim';
        $this->render('home/index', \compact('title', 'name'));
    }
}
