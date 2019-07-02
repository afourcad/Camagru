<?php

use \Adrien\Blog\Model\UserManager;
require_once("C:\wamp64\www\Camagru\model\userManager.php");

$userManager = new UserManager();
//$newUser = $userManager->createUser("Adrien", "fourcade@gmail.com", "ploplop");
$user = $userManager->searchUser('Pascal', 'fourcade@gmail.com');

//while ($user = $users->fetch()){
    echo $user['name'];
    if (isset($user['name'])){
        echo "rempli";
    }
    else{
        echo "non rempli";
    }
