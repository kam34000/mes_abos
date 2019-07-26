<?php

namespace App\Controller;

use App\Controller\AppController;
use core\Auth\DBAuth;
use \App;

class LoginController extends AppController
{
    public function index(array $messages = [])
    {
        $success = [];
        $errors = [];
        if (isset($messages['success'])) {
            $success[] = $messages['success'];
        }

        if (!empty($_POST)) {

            $auth = new DBAuth();
            if ($auth->login($_POST['email'], $_POST['password'])) {
                header('Location: index.php?p=home');
            } else {

                $errors = ['errors'];
            }
        }
        $this->render('login/index', \compact('success', 'errors'));
    }
}
