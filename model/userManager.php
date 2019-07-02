<?php

namespace Adrien\Blog\Model;

require_once('model/manager.php');

class UserManager extends Manager{
    public function connectUser($userName, $pass){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, pass FROM users WHERE name = :username');
        $req->execute(array(
            'username' => $userName
        ));
        $user = $req->fetch();

        if (isset($user['name'])){
            if (password_verify($pass, $user['pass'])){
                return $user;
            }
        }

        return false;
    }

    public function getUsers(){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, pass FROM users');
        $req->execute();
        // $user = $req->fetch();

        return $req;
    }

    public function searchUser($username, $mail){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, mail FROM users WHERE name = :username OR mail = :email');
        $req->execute(array(
            'username' => $username,
            'email' => $mail
        ));
        $user = $req->fetch();

        return $user;
    }

    public function createUser($userName, $mail, $pass){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(name, mail, pass) VALUES (:username, :mail, :pass)');
        $affectedLines = $req->execute(array(
            'username' => $userName,
            'mail' => $mail,
            'pass' => password_hash($pass, PASSWORD_DEFAULT)
        ));
        return $affectedLines;
    }
}