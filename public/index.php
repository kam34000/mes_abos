<?php

require_once('ini.php');
require_once(ROOT.'/App/App.php');
App::load();

$page = isset($_GET['p']) ? $_GET['p'] : 'home';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';

$controller = '\App\Controller\\'.ucfirst($page) . 'Controller';
$controller = (new $controller)->$action();
