<!DOCTYPE html>
<html lang="fr-FR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Page d'accueil du site : aqua-balneo.fr">
        <meta name="keywords" content="Activités aquatiques;Aquagym;Aquaphobie;Aquadynamic;Aquadouce;AquaBike;Aqua training;Jardin Aquatique;Stage de natation enfant">
        <title>aqua-balneo.fr : Activités aquatiques pour petits et grands</title>
        <link rel="icon" href="favicon.ico" />
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/balneo.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- top nav -->
                <header>
                    <nav class="collapse navbar-collapse">
                        <br/>
                        <div>
                            <img src="./assets/logoK-HYLE.png">
                            <h1 class="logoTitle">Centre Balnéo K-Hylé à Teyran</h1>
                        </div>
                        <br/>
                    </nav>
                </header>
                <!-- /top nav -->
            </div>
            <div class="wrapper">
                <div class="row">
                    <!-- sidebar gauche-->
                    <nav class="col-sm-2" role="navigation">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand">
                                <a href="#" rel="contents">
                                    <h2>Accueil</h2>
                                    <hr/>
                                </a>
                            </li>
                            <li>
                                <a href="./src/views/aquadouce.html" rel="section">AquaDouce</a>
                            </li>
                            <li>
                                <a href="./src/views/aquadynamic.html" rel="section">AquaDynamic</a>
                            </li>
                            <li>
                                <a href="./src/views/aquabike.html" rel="section">AquaBike</a>
                            </li>
                            <li>
                                <a href="./src/views/aquaphobie.html" rel="section">AquaPhobie</a>
                            </li>
                            <li>
                                <a href="./src/views/aquatraining.html" rel="section">Mix Aqua-training</a>
                            </li>
                            <li>
                                <a href="./src/views/jardin.html" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="./src/views/stage.html" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="./src/views/balneotherapie.html" rel="section">Balnéothérapie</a>
                            </li>
                            <li>
                                <a href="./src/views/professionel.html" rel="section">Professionels santé</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /sidebar -->
                    <!-- content -->
                    <section class="col-sm-8" id="main">
                        <div class="accueilContent">
                            <?php echo '<p>' . $_SESSION['user'] . 'SALUT</p>' ?>
                            <ul>
                                <li>Jardin aquatique enfant de 3 à 5 ans: familiarisation avec l'eau dans un contexte ludique</li>
                                <li>Apprentissage de la natation cours particulier de natation enfant à partir de 6 ans</li>
                                <li>Aquaphobie cours pour adulte permettant de vaincre la peur de l'eau</li>
                                <li>Aquagym Tonique cours d'aquagym dynamique</li>
                                <li>Mix Aqua-training cours comprenant différents ateliers: Aquabike, Step, Aquajump, ainsi que des
                                    exercices d'Aquagym avec matériel</li>
                            </ul>
                            <div>
                                Les séances de qualités sont toutes dispensés en petits groupes, dans la détente et bonne humeur! L'eau de la piscine comprise
                                entre 30 et 32° permettra des séances aquatiques agréable, ou le travail est de rigueur!
                            </div>
                            <div>
                                Attention: les cours apprentissage de la natation sont proposés uniquement pour les enfants, les dimensions du bassin (3m
                                sur 6m) n'étant pas adapté à des entrainements adultes.
                            </div>
                            <div>
                                *
                            </div>
                            <div>
                                Les cours de natation et d'aquagym à Montpellier (ou dans les environs) sont dispensés à votre domicile Des séances sont
                                également proposé au centre de kinésithérapie NEOS SANTE à Montpellier
                            </div>
                            <div>
                                ACCES : 1 avenue Emile Bertin Sans, 34090 Montpellier TRAM 1 Arrêt "Saint Eloi"
                            </div>
                            <div>
                                « Le sport va chercher la peur pour la dominer, la fatigue pour en triompher, la difficulté pour la vaincre »
                                <br/>Pierre de Coubertin
                            </div>
                        </div>
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2" role="navigation">
                        <ul class="sidebar-nav">
                            <li>
                                <a href="./src/controllers/inscription.php" rel="noindex, nofollow">Inscription</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalco">Connexion</button>
                            </li>
                            <li>
                                <a href="./src/views/planning.html" rel="section">Planning</a>
                            </li>
                        </ul>
                        <hr/>
                        <div class="row sidebar-right info-supp2">
                            <h4>Informations complémentaires</h4>
                            <p>Les séances d’une durée de 45 min sont dispensées en petits groupes (5 à 10 personnes maximum)</p>

                            <p>5 séances valable 6 semaines, 10 séances valables 3 mois, 20 séances valables 6 mois et 30 séances
                                valable 1 an à compter de la première séance effectuée</p>

                            <p>La totalité du règlement s’effectue en début de première séance par chèque ou espèces : CB non acceptée</p>

                            <p>Suivez l’actualité et les offres du moment</p>
                            <a target='_blank' href='https://www.facebook.com/Aquagym.Natation.Teyran/'><img src="./assets/lienFB.png" alt='lien facebook'></a>
                        </div>
                    </nav>
                    <!--sidebar droite -->
                    <footer>
                        <div class="col-sm-6 footerContent">
                            <a href="#" rel="section">Mix Aqua-training</a>
                            <span class="separator"></span>
                            <a href="#" rel="section">Mix Aqua-training</a>
                            <span class="separator"></span>
                            <a href="#" rel="section">Mix Aqua-training</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalco" tabindex="-1" role="dialog" aria-labelledby="modal-connexion" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modal-label">Connexion</h4>
                    </div>
                    <div class="modal-body">
                        <form class="well" name='connexion' method="POST" action='./src/controllers/connexion.php'>
                            <div class="form-group" id="login-form">
                                <div>
                                    <label></label>
                                    <input class="form-control" type="text" name="email" placeholder="Mon email" />
                                </div>
                                <div>
                                    <label></label>
                                    <input class="form-control" type="password" name="password" placeholder="Mon mot de passe" />
                                </div>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Se connecter</button>
                                </div>
                                <hr/>
                                <div>
                                    <strong>Pas encore membre ?</strong>
                                    <br/>
                                    <a href="./src/controllers/Inscription.php">
                                        Inscrivez-vous gratuitement
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->

        <script src="./js/jquery-3.1.0.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>

</html>
