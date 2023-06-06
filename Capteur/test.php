<?php
        session_start();

        //include("./Classe/User.php");

     
        
 ?>
<html>
  <head>
    <title>Pilotage Robot à distance</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="https://img.freepik.com/vecteurs-premium/concept-design-logo-robot-logo-robotique-universel_45923-87.jpg?w=2000">
  </head>
  <body >


        
          
            
            <h1>Pilotage du robot à distance </h1>

            <?php
            //$adresse = "192.168.64.79";  //test hercules
            // Création du socket 

            $adresse = "192.168.64.5";
            $port = 80;
            $socket =socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            
            

            // Connection du socket à l'arduino

            $result = socket_connect($socket, $adresse, $port);
            

            // Envoyer un message au serveur en fonction du bouton cliqué
            if (isset($_POST['conf'])) {
              $command = $_POST['command'];
              socket_write($socket, $command, strlen($command));
            }
            

            // fermeture du socket

            socket_close($socket);
            
            

            ?>

            <div class="wrapper">
            <form action="" method="POST">
              
              
                <p id="para">Utilisez les boutons ci-dessous pour contrôler le robot :</p>
                <div id="avance">
                  <input type="submit" name="command" value="allumer" id="allumer" >
                </div>
                <div id="tourne">
                  <div id="tournegauche">
                    <input type="submit" name="command" value="eteindre" id="eteindre">
                  </div>              
            </form> 
            </div>
</body>
</html>