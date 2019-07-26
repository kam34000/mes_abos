<?php

namespace Core\Database;

use \PDO;

class SPDO
{

    protected static $_instance;

    private $_db;

    protected function __construct($host, $dbname, $login, $pass, $set_names, $collate)
    {
        $this->_db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $login, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $set_names . ' COLLATE ' . $collate, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    public static function getInstance($host = null, $dbname = null, $login = null, $pass = null, $set_names = 'utf8', $collate = 'utf8_general_ci')
    {
        if (!isset(self::$_instance)) self::$_instance = new SPDO($host, $dbname, $login, $pass, $set_names, $collate);

        return self::$_instance;
    }

    public function getPDO()
    {
        return $this->_db;
    }

    public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);
        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }
    public function prepare($statement, $attributes, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }
        if ($class_name === null) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }
}
