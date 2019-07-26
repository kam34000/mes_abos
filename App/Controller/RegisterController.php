<?php

namespace App\Controller;

use App\models\UserModel;

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

        $userModel = new UserModel();
        $userModel->create($_POST);

        $this->index();

        // $this->render('register/index', \compact('title', 'name'));
    }
}
