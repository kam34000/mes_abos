<?php

namespace Core\Auth;

use Core\Database\SPDO;

class DBAuth
{
    private $_db;
    public function __construct()
    {
        $this->_db = SPDO::getInstance(DB_HOST, DB_NAME, DB_LOGIN, DB_PWD)->getPDO();
    }
    public function getUserId()
    {
        if ($this->logged()) return $_SESSION['auth'];
        return false;
    }
    /**
     * Auth
     *
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function login(string $email, string $password): bool
    {
        if (($req = $this->_db->prepare('SELECT * FROM `user` WHERE user_email=?')) !== false) {
            if ($req->bindValue(1, $email)) {
                if ($req->execute()) {
                    $user =  $req->fetch(\PDO::FETCH_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user['user_password'])) {
                            $_SESSION['auth'] = $user['id'];
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}
