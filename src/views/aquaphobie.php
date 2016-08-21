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
        <meta name="description" content="activité aquatique à Montpelliere : Aquaphobie">
        <meta name="keywords" content="Activités aquatiques;Aquaphobie;Montpellier">
        <title>aqua-balneo.fr : Aquaphobie</title>
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
                            <img src="../../assets/logoK-HYLE.png" class="imgLogo" alt="Logo K-Hyle"/>
                        </div>
                        <div class="col-sm-8 noPadding">
                            <img src="../../assets/bandeau.png" class="imgBanniere" alt="Banniere"/>
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
                                <a href="./aquatraining.php" rel="section">Mix Aquatraining</a>
                            </li>
                            <li>
                                <a href="#" rel="section">AquaPhobie</a>
                            </li>
                            <li>
                                <a href="./jardin.php" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="./aquababy.php" rel="section">AquaBaby</a>
                            </li>
                            <li>
                                <a href="./stage.php" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="./balneotherapie.php" rel="section">Balnéothérapie</a>
                            </li>
                            <li>
                                <a href="./professionel.php" rel="section">Intervenants</a>
                            </li>
                            <li>
                                <a href="./partenaires.php" rel="section">Partenaires</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /sidebar -->

                    <!-- content -->
                    <section class="col-sm-8" id="main">
                        <div class="accueilContent">
                            <h1 class="contentTitle">AquaPhobie</h1>
                            <div class="row marginTop50">
                                <div class="col-sm-12">
                                    <article>
                                        <p>Cours adulte permettant de vaincre la <em>peur de l’eau</em>.</p>
                                        <p>L’objectif de ce cours est de vous permettre d’apprécier la baignade sans crainte et en toute sécurité !</p>
                                        <p>En groupe restreint, vous apprendrez les techniques de respirations, immersions et flottaison tout en apprivoisant le <em>milieu aquatique</em> à votre rythme.</p>
                                        <p>Adressé à un public n’étant pas à l’aise avec la perte d’appui plantaire, et ayant besoin d’aide à la flottaison.</p>
                                        <p class='centered underbar'>Attention, ceci n’est pas un cours de natation adulte débutant.</p>

                                    </article>
                                </div>
                                <div class="col-sm-12 col-sm-offset-3">
                                    <img src="../../assets/aquaphobie.jpg" id="imgJardin" class="img-thumbnail" alt="aquaphobie" style="width:50%;height: 50%"
                                         />
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2">
                        <ul class = "sidebar-nav">
                            <li>
                                <a href = "../controllers/inscription.php" rel = "nofollow">Inscription</a>
                            </li>
                            <li>
                                <a href="../../js/remplirPlanning.php" rel="section">Planning</a>
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
                                <p>Durée des cours 45 min</p>
                                <table class="table">
                                    <tr>
                                        <td>Samedi</td>
                                        <td>17H00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row sidebar-right">
                            <div class="col-sm-12">
                                <h2>Tarification</h2>
                                <ul>
                                    <li> 205€ le forfait de 10 séances</li>
                                </ul>
                                <hr>
                                <p>L'activité est organisée par groupe de 5 personnes maximum</p>
                            </div>
                        </div>
                        <hr/>
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
        <script src="../../js/jquery-3.1.0.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>

    </body>

</html>