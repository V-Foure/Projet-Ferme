<?php session_start();
include ("./classes/user.php");

    $TheUser =new User(null,null,null,null);

    try{
        $ipServer = "192.168.65.34";
        $nomBase = "Ferme";
        $login = "root";
        $password = "root";

        $GLOBALS["pdo"] = new PDO('mysql:host='.$ipServer.';dbname='.$nomBase.'', $login, $password);
    }catch(Exception $error){
        $error->getMessage();
    }

    if(isset($_POST['connexion'])){
       $TheUser->seConnecter($_POST['login'],$_POST['password']);
    }

    if(isset($_POST['deconnexion'])){
        $TheUser->seDeconnecter();
    }

    if(isset($_SESSION["connexion"]) && $_SESSION['connexion']==true){
        $TheUser->setPouletById($_SESSION['id']);
    }
?>