<?php
if(!isset($_SESSION))
{
	session_start();
}

require('controller/front.php');

try{
    //Si l'utilisateur est connecté
    if(isset($_SESSION['name'])){
        //Si l'action demandé est 'Principale'
        if(isset($_GET['action']) && $_GET['action'] == 'main'){
            require('view/front/main.php');
        }
        //Sinon si l'action est 'Galerie'
            //aller a galerie
        //Sinon si 'Espace membre'
            //aller espace membre
        //Sinon si 'deconnection'
        elseif(isset($_GET['action']) && $_GET['action'] == 'deconnection'){
            //aller a deconection
            disconnect();
        }
        //Sinon
        else{
            //aller a principale
            require('view/front/main.php');
        }
    }
    //Sinon
    else{
        //Si l action est 'Connection'
        if(isset($_GET['action']) && $_GET['action'] == 'connection'){
            //aller a connection
            require('./view/front/connection.php');
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'connectUser'){
            if(!empty($_POST['name']) && !empty($_POST['pass'])){
                connectUser($_POST['name'], $_POST['pass']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        //Sinon si l'action est 'Inscription'
        elseif(isset($_GET['action']) && $_GET['action'] == 'inscription'){
            //aller a inscription
            require('./view/front/inscription.php');
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 'createUser'){
            if(!empty($_POST['name']) && !empty($_POST['mail'])
            && !empty($_POST['pass'])
            && !empty($_POST['pass2'])){
                if (!checkEqualString($_POST['pass'], $_POST['pass2'])){
                    throw new Exception('Les mots de passe ne correspondent pas !');
                }
                createUser($_POST['name'], $_POST['mail'], $_POST['pass']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        //Sinon si l'action est 'Galerie'
            //aller a galerie
        //Sinon si l'action est 'mdp oublié'
            //aller a mdp oublié
        //Sinon
        else{
            //aller a connection
            require('./view/front/connection.php');
        }
    }
}
catch(Exception $e){
    echo 'Error : ' . $e->getMessage();
    //require('view/frontend/errorView.php');
}
