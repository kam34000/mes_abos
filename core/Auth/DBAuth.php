<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{
    private $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
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
    public function login(string $username, string $password): bool
    {
        $user = $this->db->prepare('SELECT * FROM `users` WHERE `username` = ?', [$username], null, true);
        if ($user) {
            if ($user->password === $password) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }
    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}
