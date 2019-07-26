<?php

namespace App\Controller;

use App\models\UserModel;

class RegisterController extends AppController
{

    public function index(array $messages = [])
    {
        $success = [];
        $errors = [];
        if (isset($messages['errors'])) {
            $errors = $messages['errors'];
        }
        $title = 'Home';
        $name = 'Karim';
        $this->render('register/index', \compact('title', 'name', 'success', 'errors'));
    }
    public function post()
    {

        $errors = $this->verifUser($_POST);
        if (count($errors) === 0) {
            $_POST['password'] = \password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 10]);
            $userModel = new UserModel();
            $userModel->create($_POST);
            $loginController = new LoginController();
            return $loginController->index(['success' => 'Votre compte a été crée, vous pouvez maintenant vous connecter.']);
        } else {
            $this->index(['errors' => $errors]);
        }
    }

    private function verifUser(array $post): array
    {
        $errors = [];
        if (empty($_POST['email'])) {

            return $errors['email'] = 'Ne dois pas être vide';
        }
        return $errors;
    }
}
