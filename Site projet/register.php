<?php

    if(isset($_POST["connexion"])) {
        $_USER->register($_POST["login"], $_POST["password"]);
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inscription</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Projet Final</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="register.php">S'inscrire</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Se connecter</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <a class="navbar-brand" href="">CRUD</a>
                        <li class="nav-item"><a class="nav-link" href="CRUD/create.php">Créer un poulet</a></li>
                        <li class="nav-item"><a class="nav-link" href="CRUD/update.php">Mettre à jour un poulet</a></li>
                        <li class="nav-item"><a class="nav-link" href="CRUD/delete.php">Supprimer un poulet</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    <a class="navbar-brand" href="">Capteur</a>
                        <li class="nav-item"><a class="nav-link" href="capteurs/humidite.php">Humidité</a></li>
                        <li class="nav-item"><a class="nav-link" href="capteurs/luminosite.php">Luminosité</a></li>
                        <li class="nav-item"><a class="nav-link" href="capteurs/temperature.php">Température</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead text-center text-white">
            <div class="masthead-content">
            <div class="container">
            <div class="text-center mt-5">
            <h1>Inscription</h1>
                <form method="POST" action="">
                    <input type="text" name="login" placeholder="Identifiant" />
                    <input type="text" name="password" placeholder="Mot de passe" />
                    <input type="submit" name="form_register" value="Inscription" />
                </form>
            </div>
        </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        <!-- Responsive navbar-->
        <!-- Page content-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
