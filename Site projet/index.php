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
                        <li class="nav-item"><a class="nav-link" href="CRUD/create.php">Cr??er un poulet</a></li>
                        <li class="nav-item"><a class="nav-link" href="CRUD/update.php">Mettre ?? jour un poulet</a></li>
                        <li class="nav-item"><a class="nav-link" href="CRUD/delete.php">Supprimer un poulet</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    <a class="navbar-brand" href="">Capteur</a>
                        <li class="nav-item"><a class="nav-link" href="capteurs/humidite.php">Humidit??</a></li>
                        <li class="nav-item"><a class="nav-link" href="capteurs/luminosite.php">Luminosit??</a></li>
                        <li class="nav-item"><a class="nav-link" href="capteurs/temperature.php">Temp??rature</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Projet Ferme du Moulin</h1>
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
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/01.png" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Contexte</h2>
                            <p>Un poulailler industriel en plein air de 40 000 poulets pourrait bient??t ??tre construit ?? Hailles.</p>
                            <p>Au sud-est d'Amiens. La mairie va consulter les 500 habitants. Les communes voisines vont ??galementdonner leur avis. Mais c'est la pr??fecture de la Somme qui tranchera dans quelques mois.</p>
                            <p>Des tas de craie et de gravats surplombent le village de Hailles. C'est ici, un peu en retraitdes habitations, que doit ??tre construit un poulailler. Un projet, comme il en existe des milliers.Sauf qu'il doit accueillir 39 999 poulets exactement. A partir de 40 000 poulets, l'agriculteur ?? l'origine du projet de poulailler aurait d?? lancer une enqu??te publique. Avec 39 999 poulets, uneconsultation publique suffit. Proc??dure plus courte et moins lourde.</p>
                            <p>La soci??t?? du Moulin propose auBTS SN de la Providence d?????tudier une solution technique pour aider ?? la gestion de l?????levage. Avecidentification et suivi du poids des poulets, alimentation automatique et gestion de l???environnement du poulailler.</p>
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
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/02.png" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Pr??sentation du syst??me</h2>
                            <p> Chaque mangeoire (xN) est ??quip??e d???un nano PC pour r??cup??rer l???info sur le poids d???un poulet et son identifiant.La mangeoire peut ??tre auto aliment??e. Elle est ??quip??e d???un distributeur automatique de graine. Gr??ce au syst??me depes??e le poulet identifi?? sur la balance peut avoir acc??s au r??servoir ou non selon sa consommation de la journ??e encours. Un d??tecteur de pr??sence au niveau du r??servoir de grain permet de voir si le poulet vient pour manger (sinon lelecteur RFID peut d??tecter sa pr??sence aux alentours de la mangeoire). Une fois le poulet ?? maturit?? il est marqu?? par un spray de peinture.</p>
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
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/03.png" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Analyse de l???existant</h2>
                            <p> Le producteur se doit de produire des animaux homog??nes dans le temps afin de fid??liser le consommateur. La d??termination d???un cahier des charges de production pr??cis permet cette homog??n??it??, la r??p??titivit?? des produits ??tant d??termin??e par :</p>
                            <p>- Le choix de la souche : en poulet fermier, utilisation de souches ?? croissance lente</p>
                            <p>- Le choix de l???alimentation,</p>
                            <p>- Le choix de l?????ge d???abattage : variable en fonction des esp??ces, pour le poulet entre 100 et 120 jours. Au sein d'une bande, il faut ??viter de d??passer le d??lai
                            d'un mois entre le premier et le dernier animal abattu.</p>
                            <p>- Le choix des techniques de production et du plan de prophylaxie,</p>
                            <p>- Le choix de pr??sentation du produit.</p>
                            L?????levage de volailles est soumis ?? la r??glementation environnementale comme toutes les autres productions animales.</p>
                            <p>En lien avec la commercialisation des volailles, la r??glementation impose de mettre en place un syst??me de tra??abilit?? irr??prochable sur l?????levage des volailles de l???achat ?? la commercialisation. La tenue du registre d?????levage et le remplissage de la fiche ICA ?? chaque lot abattu sont indispensables. Par ailleurs, ?? partir de 250 volailles (poulets ou dindes), le d??pistage des salmonelles est obligatoire (pr??l??vements en ??levage et apr??s abattage). Aujourd???hui un poulet peut manger autant de grain qu???il souhaite en prenant la part de son voisin. Les poulets restent ??lev??s en ext??rieurs.</p>
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
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/04.png" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Expression du besoin</h2>
                            <p> L???SCEA du Moulin demande au BTS SN de la Providence Amiens de proposer une maquette afin de faciliter la tra??abilit?? sur l?????levage et contr??ler l???alimentation de mani??re automatique. Ainsi que de fournir en temps r??el des informations importantes sur la qualit?? de vie de la volaille.</p>
                            <p>Un poulet doit ??tre r??f??renc?? en base via une bague RFID, l???information de sa pes??e doit ??tre enregistr?? en base quotidiennement. Il ne peut avoir acc??s qu????? sa quantit?? de grain journali??re pour produire des animaux homog??nes.</p>
                            <p>Lorsqu???un poulet atteint un certain ??ge, et un certain poids d??termin?? par le cahier des charges du consommateur. Il doit ??tre physiquement marqu?? (spray peinture sur le dos).</p>
                            <p>Des capteurs doivent permettre d???activer les syst??mes de chauffe et de ventilation pour garantir des conditions optimales pour la volaille au sein du poulailler.</p>
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

        <?php
            
        ?>
    </body>
</html>
