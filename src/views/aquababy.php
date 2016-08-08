<?php
session_start();
if (!isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
}
?>
    <!DOCTYPE html>
    <html lang="fr-FR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
        <meta name="description" content="activité aquatique à Montpellier : Aquababy'">
        <meta name="keywords" content="Activités aquatiques;AquaBaby">
        <title>aqua-balneo.fr : Aquababy</title>
        <link rel="icon" href="../../favicon.ico" />
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/balneo.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- top nav -->
                <header>
                    <nav class="collapse navbar-collapse noPadding">
                        <br/>
                        <div class="col-sm-2">
                            <img src="../../assets/logoK-HYLE.png" class="imgLogo" alt="Logo K-Hyle" />
                        </div>
                        <div class="col-sm-8 noPadding">
                            <img src="../../assets/banniere.jpg" class="imgBanniere" alt="Banniere" />
                        </div>
                        <div class="col-sm-2 blockConnection">
                            <?php
                        if (isset($_SESSION['user'])) {
                            echo'<div class="user-info alert-info">Connecté en tant que : <br>' . $_SESSION['user'] . '<br><a href="../controllers/logout.php" rel="nofollow"><button type="button" class="btn btn-danger">Se déconnecter</button></a></div>';
                        } else {
                            echo '<form class="well" name="connexion" method="POST" action="../controllers/connexion.php">';
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
                    <nav class="col-sm-2">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand">
                                <a href="../../index.php" rel="contents">
                                    <h2>Accueil</h2>
                                    <hr/>
                                </a>
                            </li>
                            <li>
                                <a href="./aquadouce.php" rel="section">AquaDouce</a>
                            </li>
                            <li>
                                <a href="./aquadynamic.php" rel="section">AquaDynamic</a>
                            </li>
                            <li>
                                <a href="./aquabike.php" rel="section">AquaBike</a>
                            </li>
                            <li>
                                <a href="./aquaphobie.php" rel="section">AquaPhobie</a>
                            </li>
                            <li>
                                <a href="./aquatraining.php" rel="section">Mix Aqua-training</a>
                            </li>
                            <li>
                                <a href="./jardin.php" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="#" rel="section">AquaBaby</a>
                            </li>
                            <li>
                                <a href="./stage.php" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="./balneotherapie.php" rel="section">Balnéothérapie</a>
                            </li>
                            <li>
                                <a href="./professionel.php" rel="section">Professionels santé</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /sidebar -->
                    <!-- content -->
                    <section class="col-sm-8" id="main">
                        <div class="accueilContent">
                            <h1 class="contentTitle">AquaBaby</h1>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Description</h3>
                                    <p>Séance de 40 min ou l'enfant (entre 4 mois et 3 ans) évolue en toute confiance dans un
                                        bassin ou l'eau est chauffé à 32 °, accompagné d'un parent.</p>
                                    <p>Des <em>jeux aquatiques</em> sont à disposition.</p>
                                    <p>C'est une activité réalisé dans une ambiance affective et sécurisante.</p>
                                    <p>Elle favorise <em>l'éveil sensorielle et moteur</em> d'un point de vue corporelle et
                                        émotionnel ainsi que l'<em>épanouissement psychologique</em> dans le cercle familiale
                                        d'abord puis sociale par la suite.</p>
                                    <br/>
                                </div>
                                <div class="col-sm-12 col-sm-offset-3">
                                    <img src="../../assets/aquababy.jpg" id="imgJardin" class="img-thumbnail" alt="aquababy" style="width:50%;height: 50%" />
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2">
                        <ul class="sidebar-nav">
                            <li>
                                <a href="../controllers/inscription.php" rel="nofollow">Inscription</a>
                            </li>
                            <li>
                                <a href="./planning2.php" rel="section">Planning</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo'<li> <a href = "./profil.php" rel = "section">Mon Profil</a></li>';
                            }
                            ?>
                        </ul>
                        <hr/>
                        <div class="row sidebar-right">
                            <div class="col-sm-12">
                                <h2>Horaires</h2>
                                <table class="table">
                                    <tr>
                                        <td>Mercredi</td>
                                        <td>15H00</td>
                                    </tr>
                                    <tr>
                                        <td>Samedi</td>
                                        <td>14H00</td>
                                    </tr>
                                    <tr>
                                        <td>Samedi</td>
                                        <td>15H00</td>
                                    </tr>
                                </table>
                                <p>Hors petites vacances scolaires</p>
                            </div>
                        </div>
                        <div class="row sidebar-right">
                            <div class="col-sm-12">
                                <h2>Tarification</h2>
                                <ul>
                                    <li> 170€ les 10 séances</li>
                                    <li> 265€ les 6 mois</li>
                                </ul>
                                <hr>
                                <p>L'activité est organisée par couple enfant/parent de 3 couples maximum.</p>
                            </div>
                        </div>
                        <hr/>
                    </nav>
                    <!--sidebar droite -->
                    <footer>
                        <div class="col-sm-6 footerContent">
                            <a href="mailto:k-hyle@aqua-balneo.fr" rel="nofollow">k-hyle@aqua-balneo.fr</a>
                            <span class="separator"></span>
                            <a href="#" rel="nofollow">07 83 55 20 13 & 06 24 33 81 37</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <script src="../../js/jquery-3.1.0.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>

    </body>

    </html>