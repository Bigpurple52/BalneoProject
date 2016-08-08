<?php
session_start();
if (!isset($_SESSION['user'])) {
    try {
        session_unset();
        session_destroy();
    } catch (Exception $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}

require('./src/controllers/GoogleMapAPI.class.php');

$map = new GoogleMapAPI('map');
$map->setAPIKey('AIzaSyB4Zequ5SM5gKyxCPE4jRRxhsq2ycT4LC4');
$map->setWidth("260px");
$map->setHeight("220px");
$map->setCenterCoords('3.9285471 ', '43.6917806');
$map->setZoomLevel(6);
?>
<!DOCTYPE html>
<html lang="fr-FR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Page d'accueil du site : aqua-balneo.fr">
        <meta name="keywords" content="Activités aquatiques;Aquagym;Aquaphobie;Aquadynamic;Aquadouce;AquaBike;Aqua training;Jardin Aquatique;Stage de natation enfant;Aquababy">
        <title>aqua-balneo.fr : Activités aquatiques pour petits et grands</title>
        <link rel="icon" href="favicon.ico" />
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/balneo.css">
        <?php $map->printHeaderJS(); ?>
        <?php $map->printMapJS(); ?>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- top nav -->
                <header>
                    <nav class="collapse navbar-collapse">
                        <br/>
                        <div class="col-sm-2">
                            <img src="./assets/logoK-HYLE.png" class="imgLogo" alt="Logo K-Hyle"/>
                        </div>
                        <div class="col-sm-8">
                            <img src="./assets/banniere.jpg" class="imgBanniere" alt="Banniere"/>
                        </div>
                        <div class="col-sm-2 blockConnection">
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo'<div class="user-info alert-info">Connecté en tant que : <br>' . $_SESSION['user'] . '<br><a href="./src/controllers/logout.php" rel="nofollow"><button type="button" class="btn btn-danger">Se déconnecter</button></a></div>';
                            } else {
                                echo '<form class="well" name="connexion" method="POST" action="./src/controllers/connexion.php">';
                                echo '<div class = "form-group" id = "login-form">';
                                echo '<div>';
                                echo '<label class = "control-label" for = "emailId".php>Mon adresse email</label>';
                                echo '<input id = "emailId" class = "form-control" type = "text" name = "email" placeholder = "Mon email" />';
                                echo '</div>';
                                echo '<div>';
                                echo '<label for = "passwordId" class = "control-label">Mot de passe</label>';
                                echo '<input id = "passwordId" class = "form-control" type = "password" name = "password" placeholder = "Mon mot de passe" />';
                                echo '</div>';
                                echo '<br>';
                                echo '<div>';
                                echo '<button type = "submit" class = "btn btn-primary" data-dismiss = "modal">Se connecter</button>';
                                echo '</div>';
                                echo '</div>';
                                echo '</form>';
                            }
                            ?>
                        </div>
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
                                <a href="./src/views/aquadouce.php" rel="section">AquaDouce</a>
                            </li>
                            <li>
                                <a href="./src/views/aquadynamic.php" rel="section">AquaDynamic</a>
                            </li>
                            <li>
                                <a href="./src/views/aquabike.php" rel="section">AquaBike</a>
                            </li>
                            <li>
                                <a href="./src/views/aquaphobie.php" rel="section">AquaPhobie</a>
                            </li>
                            <li>
                                <a href="./src/views/aquatraining.php" rel="section">Mix Aqua-training</a>
                            </li>
                            <li>
                                <a href="./src/views/jardin.php" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="./src/views/stage.php" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="./src/views/balneotherapie.php" rel="section">Balnéothérapie</a>
                            </li>
                            <li>
                                <a href="./src/views/professionel.php" rel="section">Professionels santé</a>
                            </li>
                        </ul>
                    </nav>
                    <!--/sidebar -->
                    <!--content -->
                    <section class="col-sm-8" id="main">
                        <div class="accueilContent">
                            <h3>Description</h3>
                            <p>Notre centre est situé 100 impasse des fabricants à Teyran, à 12km de la Comédie de Montpellier
                                Un parking privatif, avec places handicapées, vous permet de stationner juste devant l’entrée.
                            </p>
                            <br/>
                            <h3>Equipement</h3>
                            <p>Les séances se déroulent dans une <em>piscine</em> de 6m par 3m, profonde de 1,2m, chauffée entre
                                31°c et 33°c.</p>
                            <p> Elle est équipée de 6 buses de massage, de <em>nage</em> à contre-courant, de matériel d’
                                <strong>hydrothérapie</strong> spécifique.</p>
                            <p> Les douches situées après les cabines/vestiaires individuels, sont OBLIGATOIRES avant l’entrée
                                dans la piscine. </p>
                            <p>Autour du bassin, vous devez juste vous munir d’un maillot de bain et d’une serviette, vos affaires
                                personnelles pouvant rester dans des casiers individuels mis à votre disposition.
                            </p>
                            </p>
                            <br/>
                            <h3>Professionel</h3>
                            <p>Cours assurés par Damien et Noémie. </p>
                            <br/>
                            <div class="col-sm-12 col-sm-offset-3">
                                <img src="./assets/acceuil.JPG" id="imgJardin" class="img-thumbnail" alt="Acceuil" style="width:50%;height: 50%" />
                            </div>
                        </div>
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2" role="navigation">
                        <ul class="sidebar-nav">
                            <li>
                                <a href="./src/controllers/inscription.php" rel="nofollow">Inscription</a>
                            </li>
                            <li>
                                <a href="./js/remplirPlanning.php" rel="section">Planning</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo'<li> <a href = "./src/views/profil.php" rel = "section">Mon Profil</a></li>';
                            }
                            ?>
                        </ul>
                        <hr/>
                        <div class="row sidebar-right info-supp2">
                            <h4>Informations complémentaires</h4>
                            <p>Les séances d’une durée de 45 min sont dispensées en petits groupes (5 à 10 personnes maximum)
                            </p>

                            <p>5 séances valable 6 semaines, 10 séances valables 3 mois, 20 séances valables 6 mois et 30
                                séances valable 1 an à compter de la première séance effectuée</p>

                            <p>La totalité du règlement s’effectue en début de première séance par chèque ou espèces : CB
                                non acceptée</p>

                            <p>Suivez l’actualité et les offres du moment</p>
                            <a target='_blank' href='https://www.facebook.com/Aquagym.Natation.Teyran/'><img src="./assets/lienFB.png" alt='lien facebook'></a>
                            <address>
                                <h4>Contact</h4>
                                <p>+33 783 552 013 et +33 624 338 137 </p>
                                <a href="mailto:Balneo.K-Hyle@hotmail.com">Balneo.K-Hyle@hotmail.com</a>
                                </p>
                                <h4>Où nous trouver ?</h4>
                                <p>100 impasse des fabricants à Teyran
                                </p>
                            </address>
                            <div class="mapStyle">
                                <?php $map->printMap(); ?>
                            </div>
                        </div>
                    </nav>
                    <!--sidebar droite -->
                    <footer>
                        <div class="col-sm-6 footerContent">
                            <a href="#" rel="nofollow">Mix Aqua-training</a>
                            <span class="separator"></span>
                            <a href="#" rel="nofollow">Mix Aqua-training</a>
                            <span class="separator"></span>
                            <a href="#" rel="nofollow">Mix Aqua-training</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <script src="./js/jquery-3.1.0.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>

</html>