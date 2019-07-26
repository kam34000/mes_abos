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


        if ($this->verifUser($_POST)) {
            $_POST['password'] = \password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 10]);
            $userModel = new UserModel();
            $userModel->create($_POST);
            $loginController = new LoginController();
            return $loginController->index(['success' => 'Votre compte a été crée, vous pouvez maintenant vous connecter.']);
        }
    }

    private function verifUser(array $post)
    {
        return true;
    }
}
