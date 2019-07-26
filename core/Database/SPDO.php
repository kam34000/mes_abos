<?php

namespace Core\Database;
use \PDO;

class SPDO {

    protected static $_instance;

    private $_db;

    protected function __construct($host, $dbname, $login, $pass, $set_names, $collate){
        $this->_db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $login, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES ' . $set_names . ' COLLATE ' . $collate, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    public static function getInstance( $host = null, $dbname = null, $login = null, $pass = null, $set_names = 'utf8', $collate = 'utf8_general_ci' ) {
        if( !isset( self::$_instance ) ) self::$_instance = new SPDO( $host, $dbname, $login, $pass, $set_names, $collate );
 
        return self::$_instance;
    }

    public function getPDO() {
        return $this->_db;
    }
}