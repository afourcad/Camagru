<?php

//librairie de mes fonctions front
use \Adrien\Blog\Model\UserManager;

require('model/userManager.php');

function connectUser($name, $pass)
{
    $userManager = new UserManager();
    $user = $userManager->connectUser($name, $pass);

    if ($user === false){
        die('Combinaison login / mot de passe invalide');
    }
    else{
        $_SESSION['name'] = $user['name'];
        $_SESSION['userId'] = $user['id'];
        header('Location: index.php?action=main');
    }
}

function disconnect(){
    session_destroy();
    header('Location: index.php');
}

function createUser($name, $mail, $pass){
    $userManager = new UserManager();
    $user = $userManager->searchUser($name, $mail);
    if($user === false){
        $user = $userManager->createUser($name, $mail, $pass);
        if($user){
            header('Location: index.php');
        }
        else{
            throw new Exception('Impossible d\'enregistrer un nouvel utilisateur !');
        }
    }
    else{
        throw new Exception('Un utilisateur avec ce login ou ce mail existe déjà !');
    }
}

?>
