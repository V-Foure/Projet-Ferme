<?php session_start();
include ("pdo.php");
include ("user.php");
include ("poulet.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Index</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <?php

            $User = new User(null,null,null);
            $Poulet = new Poulet(null,null,null,null,null);
            $tabPoulets = $Poulet->getAllPoulet();
            
            if(isset($_POST['connexion'])){
                $User->seConnecter($_POST['login'],$_POST['password']);
            }
                
            if(isset($_POST['deconnexion'])){
                $User->seDeconnecter();
            }

            if(!isset($_SESSION['connexion'])){
                $_SESSION['connexion'] = false;
            } 

            if(isset($_SESSION['connexion']) && $_SESSION['connexion']==true){
        ?>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu<i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#create">Créer un poulet</a></li>
                        <li class="nav-item"><a class="nav-link" href="#read">Voir les poulets</a></li>
                        <li class="nav-item"><a class="nav-link" href="#update">Modifier un poulet</a></li>
                        <li class="nav-item"><a class="nav-link" href="#delete">Supprimer un poulet</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Capteurs</a></li>
                        <form action="" method="post">
                            <input class="btn btn-primary" type ="submit" name ="deconnexion" value="Deconnexion"/>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead -->
        <header class="masthead">
            <div class="container">  
                <div class="masthead-heading text-uppercase">Projet Ferme Industrielle du Moulin</div>
                <div class="masthead-subheading">Dechir - Bordrez - Foure</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#create">Passer "A propos"</a>
            </div>
        </header>
        <!-- About -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">A propos</h2>
                </div>
                <!-- Timeline -->
                <ul class="timeline">
                    <!-- About 1 -->
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Contexte</h4>
                            </div>
                            <div>
                                <p>Un poulailler industriel en plein air de 40 000 poulets pourrait bientôt être construit à Hailles</p>
                                <p>Au sud-est d'Amiens. La mairie va consulter les 500 habitants. Les communes voisines vont également donner leur avis. Mais c'est la préfecture de la Somme qui tranchera dans quelques mois.</p>
                                <p>Des tas de craie et de gravats surplombent le village de Hailles. C'est ici, un peu en retrait des habitations, que doit être construit un poulailler. Un projet, comme il en existe des milliers. Sauf qu'il doit accueillir 39 999 poulets exactement. A partir de 40 000 poulets, l'agriculteur à l'origine du projet de poulailler aurait dû lancer une enquête publique. Avec 39 999 poulets, une consultation publique suffit. Procédure plus courte et moins lourde.</p>
                                <p>La société du Moulin propose au BTS SN de la Providence d’étudier une solution technique pour aider à la gestion de l’élevage. Avec identification et suivi du poids des poulets, alimentation automatique et gestion de l’environnement du poulailler.</p>
                            </div>
                        </div>
                    </li>
                    <!-- About 2 -->
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Présentation du système</h4>
                            </div>
                            <div>
                                <p>Chaque mangeoire (xN) est équipée d’un nano PC pour récupérer l’info sur le poids d’un poulet et son identifiant. La mangeoire peut être auto alimentée. Elle est équipée d’un distributeur automatique de graine.</p>
                                <p>Grâce au système de pesée le poulet identifié sur la balance peut avoir accès au réservoir ou non selon sa consommation de la journée en cours.</p>
                                <p>Un détecteur de présence au niveau du réservoir de grain permet de voir si le poulet vient pour manger (sinon le lecteur RFID peut détecter sa présence aux alentours de la mangeoire). Une fois le poulet à maturité il est marqué par un spray de peinture.</p>
                            </div>
                        </div>
                    </li>
                    <!-- About 3 -->
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Analyse de l’existant</h4>
                            </div>
                            <div>
                                <p>Le producteur se doit de produire des animaux homogènes dans le temps afin de fidéliser le consommateur. La détermination d’un cahier des charges de production précis permet cette homogénéité, la répétitivité des produits étant déterminée par :</p>
                                <p>- Le choix de la souche : en poulet fermier, utilisation de souches à croissance lente</p>
                                <p>- Le choix de l’alimentation</p>
                                <p>- Le choix de l’âge d’abattage : variable en fonction des espèces, pour le poulet entre 100 et 120 jours. Au sein d'une bande, il faut éviter de dépasser le délai d'un mois entre le premier et le dernier animal abattu</p>
                                <p>- Le choix des techniques de production et du plan de prophylaxie</p>
                                <p>- Le choix de présentation du produit</p>
                                <p>L’élevage de volailles est soumis à la réglementation environnementale comme toutes les autres productions animales.</p>
                                <p>En lien avec la commercialisation des volailles, la réglementation impose de mettre en place un système de traçabilité irréprochable sur l’élevage des volailles de l’achat à la commercialisation. La tenue du registre d’élevage et le remplissage de la fiche ICA à chaque lot abattu sont indispensables. Par ailleurs, à partir de 250 volailles (poulets ou dindes), le  dépistage des salmonelles est obligatoire (prélèvements en élevage et après abattage).</p>
                                <p>Aujourd’hui un poulet peut manger autant de grain qu’il souhaite en prenant la part de son voisin. Les poulets restent élevés en extérieurs.</p>
                            </div>
                        </div>
                    </li>
                    <!-- About 4 -->
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Expression du besoin :</h4>
                            </div>
                            <div>
                                <p>L’SCEA du Moulin demande au BTS SN de la Providence Amiens de proposer une maquette afin de faciliter la traçabilité sur l’élevage et contrôler l’alimentation de manière automatique. Ainsi que de fournir en temps réel des informations importantes sur la qualité de vie de la volaille</p>
                                <p>Un poulet doit être référencé en base via une bague RFID, l’information de sa pesée doit être enregistré en base quotidiennement. Il ne peut avoir accès qu’à sa quantité de grain journalière pour produire des animaux homogènes.</p>
                                <p>Lorsqu’un poulet atteint un certain âge, et un certain poids déterminé par le cahier des charges du consommateur. Il doit être physiquement marqué (spray peinture sur le dos).</p>
                                <p>Des capteurs doivent permettre d’activer les systèmes de chauffe et de ventilation pour garantir des conditions optimales pour la volaille au sein du poulailler. </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Create -->
        <section class="page-section" id="create">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Créer un poulet</h2>
                    <h3 class="section-subheading text-muted">Veuillez entrer les différentes informations</h3>
                </div>
                <?php 
                    if(isset($_POST["CreatePoulet"])){
                        $newpoulet = new Poulet(null,$_POST["poids"],$_POST["age"],$_POST["etat"],$_POST["marquage"]);
                        $newpoulet->saveInBDD();
                    }
                ?>
                <form action="" method="post">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <h4 class="my-3">Poids</h4>
                            <input type="text" id="poids" name="poids">
                        </div>
                        <div class="col-md-6">
                            <h4 class="my-3">Age</h4>
                            <input type="text" id="age" name="age">
                        </div>
                        <div class="col-md-6">
                            <h4 class="my-3">Etat</h4>
                            <input type="text" id="etat" name="etat">
                        </div>
                        <div class="col-md-6">
                            <h4 class="my-3">Marquage</h4>
                            <input type="text" id="marquage" name="marquage">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary btn-xl rounded-pill mt-5" name="CreatePoulet" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Read -->
        <section class="page-section" id="read">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Voir les poulets</h2>
                    <h3 class="section-subheading text-muted">Voici les différentes informations concernant les poulets</h3>
                </div>
            </div>
            <?php
                $Poulet->renderHTML();
            ?>
        </section>
        <!-- Update -->
        <section class="page-section" id="update">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Modifier un poulet</h2>
                    <h3 class="section-subheading text-muted">Veuillez entrer les modifications à effectuer</h3>
                </div>
                <?php
                    if(isset($_POST["idPoulet"])){
                        $Poulet->setPouletById($_POST["idPoulet"]);
                    }
                    
                    if(isset($_POST["UpdatePoulet"])){
                        $Poulet->setPouletById($_POST["id"]);
                        $Poulet->setPoids($_POST["poids"]);
                        $Poulet->setAge($_POST["age"]);
                        $Poulet->setEtat($_POST["etat"]);
                        $Poulet->setMarquage($_POST["marquage"]);
                        $Poulet->saveInBDD();
                    }
                ?>
                <form action="" method="post" onchange="this.submit()">
                    <div class="row text-center">
                        <div class="text-center">
                            <select name="idPoulet" id="idPoulet">
                                <option value="null"> - Choisir un poulet a modifier - </option>
                                    <?php
                                        foreach($tabPoulets as $ThePoulet){
                                            if($Poulet->getId() == $ThePoulet->getId()){
                                                $selected = "selected";
                                            }else{
                                                $selected = "";
                                            }
                                            
                                            echo '<option '.$selected.' value="'.$ThePoulet->getId().'">'.$ThePoulet->getId().'</option>';
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <h4 class="my-3">Poids</h4>
                            <input type="text" name="poids" value="<?= $Poulet->getPoids() ?>">
                        </div>
                        <div class="col-md-6">
                            <h4 class="my-3">Age</h4>
                            <input type="text" name="age" value="<?= $Poulet->getAge() ?>">
                        </div>
                        <div class="col-md-6">
                            <h4 class="my-3">Etat</h4>
                            <input type="text" name="etat" value="<?= $Poulet->getEtat() ?>">
                        </div>
                        <div class="col-md-6">
                            <h4 class="my-3">Marquage</h4>
                            <input type="text" name="marquage" value="<?= $Poulet->getMarquage() ?>">
                        </div>
                        <div>
                            <input type="hidden" name="id" value="<?= $Poulet->getId() ?>">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary btn-xl rounded-pill mt-5" name="UpdatePoulet" value="Modifier"> 
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Delete -->
        <section class="page-section" id="delete">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Supprimer un poulet</h2>
                    <h3 class="section-subheading text-muted">Veuillez entrer l'id du poulet a supprimer</h3>
                </div>
                <?php
                    if(isset($_POST["DeletePoulet"])){
                        $Poulet->setPouletById($_POST["id"]);
                        $Poulet->deleteInBDD();
                    }
                ?>    
                <form action="" method="post">
                    <div class="row text-center">
                        <div class="text-center">
                            <select name="idPoulet" id="idPoulet">
                                <option value="null"> - Choisir un poulet a supprimer - </option>
                                <?php
                                    foreach($tabPoulets as $ThePoulet){
                                        if($Poulet->getId() == $ThePoulet->getId()){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                        
                                        echo '<option '.$selected.' value="'.$ThePoulet->getId().'">'.$ThePoulet->getId().'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="row text-center">
                        <div class="text-center">
                            <input type="hidden" name="id" value="<?= $Poulet->getId() ?>">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary btn-xl rounded-pill mt-5" name="DeletePoulet" value="Supprimer">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Capteurs -->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Capteurs</h2>
                    <h3 class="section-subheading text-muted">Données des différents capteurs</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Capteur humidité-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Humidité</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Capteur luminosité -->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Luminosité</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Capteur température -->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Température</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Capteur présence -->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Présence</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Equipe du Projet</h2>
                    <h3 class="section-subheading text-muted">Étudiants chargés du projet</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Mathys Dechir</h4>
                            <p class="text-muted">Etudiant 1</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="..." />
                            <h4>Elliot Bordrez</h4>
                            <p class="text-muted">Etudiant 2</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>Valentin Foure</h4>
                            <p class="text-muted">Etudiant 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Humidité</h2>
                                    <p class="item-intro text-muted"><!-- Mesure Capteur Humidité -->%</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                    <p><!-- Mesure Capteur Humidité -->%</p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i> Fermer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Luminosité</h2>
                                    <p class="item-intro text-muted"><!-- Mesure Capteur Luminosité -->%</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p><!-- Mesure Capteur Luminosité -->%</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Explore
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Graphic Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Température</h2>
                                    <p class="item-intro text-muted"><!-- Mesure Capteur Température -->°C</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p><!-- Mesure Capteur Température -->°C</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Finish
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Identity
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Présence</h2>
                                    <p class="item-intro text-muted"><!-- Présence -->!</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p><!-- Présence --></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Lines
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Branding
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <?php
            }else{
                ?>
                    <header class="masthead">
                        <div class="container">
                            <div class="masthead-heading text-uppercase">Se connecter</div>
                                <form action="" method="post">
                                    <div>
                                        <label class="btn btn-primary btn-xl rounded-pill mt-5" href="" for="login">Identifiant : <input type="text" id="login" name="login"></label>
                                    </div>
                                    <div>
                                        <label class="btn btn-primary btn-xl rounded-pill mt-5" href="" for="password">Mot de passe : <input type="password" id="password" name="password"></label>
                                    </div>
                                    <div>
                                        <input type="submit" name="connexion" class="btn btn-primary btn-xl rounded-pill mt-5" value="Valider">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </header>
                <?php
            }
        ?>
    </body>
</html>