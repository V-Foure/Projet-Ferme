<?php session_start();
include("./classes/user.php");

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

    if(isset($_SESSION['déconnexion'])){
        $TheUser->seDeconnecter();
    }

    if(isset($_SESSION['connexion']) && $_SESSION['connexion']==true){
        ?>
        <form action="" method="post">
            <input type="submit" name="déconnexion" value="Se déconnecter">
        </form>
        <?php
    }else{
        echo "Veuillez vous identifiez";
        ?>
        <form action="" method="post">
            <div>
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div>
                <label for="password">Mot de passe :</label>
                <input type="text" id="password" name="password" required>
            </div>
            <input type="submit" name="connexion">
        </form>
        <?php
    }
?>