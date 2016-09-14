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
$boot = filter_input(INPUT_GET, 'bootbox');
?>
<!DOCTYPE html>
<html lang="fr-FR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Page d'accueil du site : aqua-balneo.fr, activités aquatiques à Montpellier">
        <meta name="keywords" content="Activités aquatiques;Aquagym;Aquaphobie;Aquadynamic;Aquadouce;AquaBike;Aqua training;Jardin Aquatique;Stage de natation enfant;Aquababy">
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
                    <nav class="collapse navbar-collapse noPadding">
                        <br/>
                        <div class="col-sm-2">
                            <img src="./assets/logoK-HYLE.png" class="imgLogo" alt="Logo K-Hyle"/>
                        </div>
                        <div class="col-sm-8 noPadding">
                            <img src="./assets/bandeau.png" class="imgBanniere" alt="Banniere"/>
                        </div>
                        <div class="col-sm-2 blockConnection">
                            <?php
                            if (isset($_SESSION['user'])) {
                                if (!empty($boot) && $boot == 1) {
                                    $bootMsg = '<p class="centered success msgSuccess">Votre choix a bien été pris en compte. <span class="underbar">Vous devrez régler la somme dûe lors de la première séance.<span></p>';
                                    echo '<script type=text/javascript>window.alert("Vous avez réservé une formule. Votre choix a bien été pris en compte.");</script>';
                                } else {
                                    $bootMsg = '';
                                }
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
                                <a href="./src/views/aquatraining.php" rel="section">Mix Aquatraining</a>
                            </li>
                            <li>
                                <a href="./src/views/aquaphobie.php" rel="section">AquaPhobie</a>
                            </li>
                            <li>
                                <a href="./src/views/jardin.php" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="./src/views/aquababy.php" rel="section">AquaBaby</a>
                            </li>
                            <li>
                                <a href="./src/views/stage.php" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="./src/views/balneotherapie.php" rel="section">Balnéothérapie</a>
                            </li>
                            <li>
                                <a href="./src/views/professionel.php" rel="section">Intervenants</a>
                            </li>
                            <li>
                                <a href="./src/views/partenaires.php" rel="section">Partenaires</a>
                            </li>
                        </ul>
                    </nav>
                    <!--/sidebar -->
                    <!--content -->
                    <section class="col-sm-8" id="main">
                        <div class="accueilContent">
                            <h1 class="contentTitle">ACTIVITES AQUATIQUES CENTRE BALNEO K-HYLE</h1>
                            <h1 class="contentTitle">SPA & FORME</h1>
                            <?php
                            echo $bootMsg
                            ?>
                            <div class="col-sm-12 col-sm-offset-3">
                                <img src="./assets/acceuil.JPG" id="indexPhoto" class="img-thumbnail img-accueil" alt="Acceuil" style="width:50%;height: 50%" />
                            </div>
                            <p class="marginTop50">Notre centre est situé 100 impasse des fabricants à <strong>Teyran</strong>, à 12km de la Comédie de <strong>Montpellier.</strong></p>
                            <p> Un parking privatif, avec places handicapées, vous permet de stationner juste devant l’entrée.</p>

                            <br/>
                            <p>Nous vous proposons des activités aquatiques pour petits et grands au centre Balnéo K-Hylé:</p>
                            <ul>
                                <li><strong>AquaDouce</strong></li>
                                <li><strong>AquaDynamic</strong></li>
                                <li><strong>AquaBike</strong></li>
                                <li><strong>Mix AquaTraining</strong></li>
                                <li><strong>Jardin Aquatique</strong></li>
                                <li><strong>Bébés nageurs</strong></li>
                                <li><strong>Aquaphobie</strong></li>
                                <li><strong>Stage de natation enfants</strong></li>
                            </ul>
                            <br>
                            <p class="underbar centered">Les inscriptions s'effectuent en ligne: des crédits seront attribués sur votre compte et vous aurez la possibilité de réserver, modifier et annuler vos séances directement via le planning</p>
                            <br>
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
                            <p>Suivez l’actualité et les offres du moment</p>
                            <a target='_blank' href='https://www.facebook.com/Aquagym.Natation.Teyran/'><img src="./assets/lienFB.png" alt='lien facebook'></a>
                            <address>
                                <h4>Contact</h4>
                                <p>07 83 55 20 13 - 06 24 33 81 37 </p>
                                <a href="mailto:k-hyle@aqua-balneo.fr">k-hyle@aqua-balneo.fr</a>
                                </p>
                                <h4>Où nous trouver ?</h4>
                                <p>100 impasse des fabricants à Teyran
                                </p>
                            </address>
                            <div id ="map">
                            </div>
                            <hr>
                            <h4>Informations complémentaires</h4>
                            <p>Les séances sont dispensées en petits groupes (10 personnes maximum)</p>

                            <p>Suite à votre inscription au site :</p>
                            <ul style="font-weight: bold; font-size: 14">
                                <li>1) Vous connecter</li>
                                <li>2) Choisir votre formule et activité dans l'onglet 'Inscription'</li>
                                <li>3) Réserver vos créneaux directement via le planning</li>
                            </ul>

                            <p>La totalité du règlement s’effectue en début de première séance par chèque ou espèces : CB non acceptée</p>
                            <br>
                            <p>Vacances scolaires :<p>
                            <ul>
                                <li>- Les créneaux du midi sont maintenus et restent inchangés</li>
                                <li>- AquaDouce à 18H (du lundi au vendredi)</li>
                                <li>- MIX (AquaDynamic + Aquabike) à 19H (du lundi au vendredi)</li>
                                <li>- PAS DE JARDIN AQUATIQUE ET DE COURS AQUABABY PENDANT LES PETITES VACANCES SCOLAIRE</li>
                            </ul>
                            <br>
                            <p>Pour tous les cours :</p>
                            <ul>
                                <li>- 5 séances valable 6 semaines</li>
                                <li>- 10 séances valables 3 mois</li>
                                <li>- 20 séances valables 6 mois</li>
                                <li>- 30 séances valable 1 an à compter de la première séance effectuée</li>
                            </ul>

                        </div>
                    </nav>
                    <!--sidebar droite -->
                    <footer>
                        <div class="col-sm-6 footerContent">
                            <a href="mailto:k-hyle@aqua-balneo.fr" rel="nofollow">k-hyle@aqua-balneo.fr</a>
                            <span class="separator"></span>
                            <a href="#" rel="nofollow">07 83 55 20 13 - 06 24 33 81 37</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <script src="./js/jquery-3.1.0.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/bootbox.min.js"></script>
        <script src="./js/map.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrSCEwPcWzYm6Z9ZVFCN_ZmeXGcB0E--0&callback=initMap"
        async defer></script>
    </body>
</html>
