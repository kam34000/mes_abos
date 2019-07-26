<?php
// crud

namespace App\models;

use Core\Models\Model;
use \SPDO;

class UserModel extends Model
{
    public function create(array $datas)
    {
        try {
            if (
                ($req = $this->_db->prepare(
                    'INSERT INTO `user`(`user_name`, `user_nickname`, `user_email`, `user_number`, `user_password`) VALUE (:name, :nickname, :email, :number, :password)'
                )) !== false
            ) {
                if (
                    $req->bindValue('name', $datas['name'])
                    && $req->bindValue('nickname', $datas['firstname'])
                    && $req->bindValue('email', $datas['email'])
                    && $req->bindValue('number', $datas['phone'])
                    && $req->bindValue('password', $datas['password'])
                ) {
                    if ($req->exectute()) { }
                }
            }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }
    }
}
