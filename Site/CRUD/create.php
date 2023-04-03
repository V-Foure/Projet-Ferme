<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Create</title>
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="../index.php">Site Projet</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    <a class="navbar-brand" href="crud.php">CRUD</a>
                        <li class="nav-item"><a class="nav-link" href="create.php">Create</a></li>
                        <li class="nav-item"><a class="nav-link" href="read.php">Read</a></li>
                        <li class="nav-item"><a class="nav-link" href="update.php">Update</a></li>
                        <li class="nav-item"><a class="nav-link" href="delete.php">Delete</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <a class="navbar-brand" href="../capteurs/capteur.php">Capteurs</a>
                        <li class="nav-item"><a class="nav-link" href="../capteurs/humidite.php">Humidité</a></li>
                        <li class="nav-item"><a class="nav-link" href="../capteurs/temperature.php">Température</a></li>
                        <li class="nav-item"><a class="nav-link" href="../capteurs/luminosite.php">Luminosité</a></li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <form action = "" method = "POST">
                            <input class="btn btn-primary" type ="submit" name ="deconnexion" value="Deconnexion"/>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Create</h1>
                    <form action="" method="post">
                        <div>
                            <label class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll" for="id">Id : <input type="text" id="id" name="id"></label>
                        </div>
                        <div>
                            <label class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll" for="poids">Poids : <input type="text" id="poids" name="poids"></label>
                        </div>
                        <div>
                            <label class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll" for="age">Âge : <input type="text" id="age" name="age"></label>
                        </div>
                        <div>
                            <label class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll" for="etat">Etat : <input type="text" id="etat" name="etat"></label>
                        </div>
                        <div>
                            <label class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll" for="marquage">Marquage : <input type="text" id="marquage" name="poids"></label>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary btn-xl rounded-pill mt-5" value="Ajouter">
                        </div>
                    </form>  
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
            <?php
                if(isset($_POST["Ajouter"])){
                    $Poulet = new Poulet(null,$_POST['poids'],$_POST['age'],$_POST['etat'],$_POST['marquage']);
                    $Poulet->saveInBDD();
                }
            ?>
        </header>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>