<?php

namespace Core\Models;

abstract class Model {
    
    protected $_db;

    public function __construct(){
        $this->_db = SPDO::getInstance( DB_HOST, DB_NAME, DB_LOGIN, DB_PWD )->getPDO();
    }
}