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
        <meta name="description" content="activité aquatique à Montpellier : Mix aqua-training">
        <meta name="keywords" content="Activités aquatiques;Aqua training;">
        <title>aqua-balneo.fr : Mix aqua-training</title>
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
                    <nav class="collapse navbar-collapse">
                        <br/>
                        <div>
                            <img src="../../assets/logoK-HYLE.png" alt="logo site">
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
                                <a href="#" rel="section">Mix Aqua-training</a>
                            </li>
                            <li>
                                <a href="./jardin.php" rel="section">Jardin Aquatique enfant</a>
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
                            <h1 class="contentTitle">Mix Aqua-training</h1>
                            <!--Left part-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Description</h3>
                                    <p>Cours explosif comprenant ateliers d’<em>aquagym</em> et d’<em>aquabike</em>.</p>
                                    <p>Ces cours collectifs en musique, sont basés sur un travail complet des bras, abdominaux,
                                        fessiers, cuisses (…)</p>
                                    <br/>
                                </div>
                                <!--Left part-->

                                <!--Right part-->
                                <div class="col-sm-12 col-sm-offset-3">
                                    <img src="../../assets/test.jpg" id="imgJardin" class="img-thumbnail" alt="jardin aquatique enfant" style="width:50%;height: 50%"
                                         />
                                </div>
                            </div>
                        </div>
                        <!--Right part-->
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2">
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
                            echo '<hr/>';
                            echo '<div>';
                            echo '<strong>Pas encore membre ?</strong>';
                            echo '<br/>';
                            echo '<a href = "../controllers/inscription.php">';
                            echo 'Inscrivez-vous gratuitement';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</form>';
                        }
                        ?>
                        <ul class = "sidebar-nav">
                            <li>
                                <a href = "../controllers/inscription.php" rel = "nofollow">Inscription</a>
                            </li>
                            <li>
                                <a href = "./planning2.php" rel = "section">Planning</a>
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
                                        <td>Lundi</td>
                                        <td> 11H30 - 12H30</td>
                                    </tr>
                                    <tr>
                                        <td>Mardi</td>
                                        <td> 18H30 - 19H30</td>
                                    </tr>
                                    <tr>
                                        <td>Mercredi</td>
                                        <td> 17H00 - 18H00</td>
                                    </tr>
                                    <tr>
                                        <td>Jeudi</td>
                                        <td> 12H00 - 13H00</td>
                                    </tr>
                                    <tr>
                                        <td>Vendredi</td>
                                        <td> 11H30 - 12H30</td>
                                    </tr>
                                    <tr>
                                        <td>Vendredi</td>
                                        <td> 17H30 - 18H30</td>
                                    </tr>
                                    <tr>
                                        <td>Samedi</td>
                                        <td> 11H15 - 12H15</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row sidebar-right">
                            <div class="col-sm-12">
                                <h2>Tarification</h2>
                                <ul>
                                    <li> 150€ les 10 séances</li>
                                    <li> 280€ les 20 séances</li>
                                    <li> 375€ les 30 séances</li>
                                </ul>
                                <hr>
                                <p>L'activité est organisée par groupe de 5 ou 8 personnes.</p>
                            </div>
                        </div>
                        <hr/>
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
        <script src="../../js/jquery-3.1.0.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>

    </body>

</html>