<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Index</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Site Projet</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="register.php">S'inscrire</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Se Connecter</a></li>
                    </ul>
                    <a class="navbar-brand" href="./CRUD/crud.php">CRUD</a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./CRUD/create.php">Create</a></li>
                        <li class="nav-item"><a class="nav-link" href="./CRUD/read.php">Read</a></li>
                        <li class="nav-item"><a class="nav-link" href="./CRUD/update.php">Update</a></li>
                        <li class="nav-item"><a class="nav-link" href="./CRUD/delete.php">Delete</a></li>
                    </ul>
                    <a class="navbar-brand" href="./capteurs/capteur.php">Capteurs</a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="./capteurs/humidite.php">Humidité</a></li>
                        <li class="nav-item"><a class="nav-link" href="./capteurs/temperature.php">Température</a></li>
                        <li class="nav-item"><a class="nav-link" href="./capteurs/luminosite.php">Luminosité</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Projet Ferme du moulin</h1>
                    <h2 class="masthead-subheading mb-0">Bordrez - Dechir - Foure</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">En savoir plus</a>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        <!-- Content section 1-->
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/01.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Contexte</h2>
                            <p>Un poulailler industriel en plein air de 40 000 poulets pourrait bientôt être construit à Hailles.</p>
                            <p>Au sud-est d'Amiens. La mairie va consulter les 500 habitants. Les communes voisines vont également donner leur avis. Mais c'est la préfecture de la Somme qui tranchera dans quelques mois.</p>
                            <p>Des tas de craie et de gravats surplombent le village de Hailles. C'est ici, un peu en retrait des habitations, que doit être construit un poulailler. Un projet, comme il en existe des milliers. Sauf qu'il doit accueillir 39 999 poulets exactement. A partir de 40 000 poulets, l'agriculteur à l'origine du projet de poulailler aurait dû lancer une enquête publique. Avec 39 999 poulets, une consultation publique suffit. Procédure plus courte et moins lourde.</p>
                            <p>La société du Moulin propose au BTS SN de la Providence d’étudier une solution technique pour aider à la gestion de l’élevage. Avec identification et suivi du poids des poulets, alimentation automatique et gestion de l’environnement du poulailler.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/02.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Présentation du système</h2>
                            <p>Chaque mangeoire (xN) est équipée d’un nano PC pour récupérer l’info sur le poids d’un poulet et son identifiant. La mangeoire peut être auto alimentée. Elle est équipée d’un distributeur automatique de graine. Grâce au système de pesée le poulet identifié sur la balance peut avoir accès au réservoir ou non selon sa consommation de la journée en cours. Un détecteur de présence au niveau du réservoir de grain permet de voir si le poulet vient pour manger (sinon le lecteur RFID peut détecter sa présence aux alentours du mangeoire). Une fois le poulet à maturité il est marqué par un spray de peinture.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/03.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Analyse de l’existant</h2>
                            <p>Le producteur se doit de produire des animaux homogènes dans le temps afin de fidéliser le consommateur. La détermination d’un cahier des charges de production précis permet cette homogénéité, la répétitivité des produits étant déterminée par :
                            <p>- Le choix de la souche : en poulet fermier, utilisation de souches à croissance lente</p>
                            <p>- Le choix de l’alimentation</p>
                            <p>- Le choix de l’âge d’abattage : variable en fonction des espèces, pour le poulet entre 100 et 120 jours. Au sein d'une bande, il faut éviter de dépasser le délai d'un mois entre le premier et le dernier animal abattu</p>
                            <p>- Le choix des techniques de production et du plan de prophylaxie</p>
                            <p>- Le choix de présentation du produit</p>
                            <p>L’élevage de volailles est soumis à la réglementation environnementale comme toutes les autres productions animales.</p>
                            <p>En lien avec la commercialisation des volailles, la réglementation impose de mettre en place un système de traçabilité irréprochable sur l’élevage des volailles de l’achat à la commercialisation. La tenue du registre d’élevage et le remplissage de la fiche ICA à chaque lot abattu sont indispensables. Par ailleurs, à partir de 250 volailles (poulets ou dindes), le dépistage des salmonelles est obligatoire (prélèvements en élevage et après abattage).</p>
                            <p>Aujourd’hui un poulet peut manger autant de grain qu’il souhaite en prenant la part de son voisin. Les poulets restent élevés en extérieurs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 4-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/04.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                        <h2 class="display-4">Expression du besoin</h2>
                            <p>L’SCEA du Moulin demande au BTS SN de la Providence Amiens de proposer une maquette afin de faciliter la traçabilité sur l’élevage et contrôler l’alimentation de manière automatique. Ainsi que de fournir en temps réel des informations importantes sur la qualité de vie de la volaille.</p>
                            <p>Un poulet doit être référencé en base via une bague RFID, l’information de sa pesée doit être enregistré en base quotidiennement. Il ne peut avoir accès qu’à sa quantité de grain journalière pour produire des animaux homogènes.</p>
                            <p>Lorsqu’un poulet atteint un certain âge, et un certain poids déterminé par le cahier des charges du consommateur. Il doit être physiquement marqué (spray peinture sur le dos).</p>
                            <p>Des capteurs doivent permettre d’activer les systèmes de chauffe et de ventilation pour garantir des conditions optimales pour la volaille au sein du poulailler.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
