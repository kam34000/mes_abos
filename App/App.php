<?php 


class App {

    public static function load(){
        session_start();
        require ROOT.'/App/Autoloader.php';
        App\Autoloader::register();
        require ROOT.'/core/Autoloader.php';
        Core\Autoloader::register();
    }
}