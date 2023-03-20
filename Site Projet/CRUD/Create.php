<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Tittle</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type='text/css' media='screen' href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <?php
            if(isset($_SESSION["connexion"])){
                if($TheUser->isAdmin()){
                    echo "vous êtes admin"; ?>

                    <form action="" method="post">
                    id : <input type="texte" name="id">
                    poids : <input type="texte" name="poids">
                    âge : <input type="texte" name="âge">
                    etat : <input type="texte" name="etat">
                    pmarquage : <input type="texte" name="marquage">
                }
                
            
            }
    </body>
</html>