<?php
    try {
        $ipServer = "192.168.65.34";
        $nomBase = "Ferme";
        $login = "root";
        $password ="root";

        $GLOBALS["pdo"] = new PDO('mysql:host='.$ipServer.';dbname='.$nomBase.'', $login, $password);
    }catch (PDOException $e){
        die('Erreur : '.$e->getMessage());
    }
?>