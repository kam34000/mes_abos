<?php

namespace App\Controller;

use App\Controller\AppController;

class LoginController extends AppController
{
    public function index(array $messages = [])
    {
        if (isset($messages['success'])) {
            $success = $messages['success'];
        }
        $this->render('login/index', \compact('success'));
    }
}
