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
        <meta name="description" content="activité aquatique à Montpellier : Aquabike'">
        <meta name="keywords" content="Activités aquatiques;AquaBike;Montpellier">
        <title>aqua-balneo.fr : Aquabike</title>
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
                                <a href="#" rel="section">AquaBike</a>
                            </li>
                            <li>
                                <a href="./aquatraining.php" rel="section">Mix Aquatraining</a>
                            </li>
                            <li>
                                <a href="./aquaphobie.php" rel="section">AquaPhobie</a>
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
                            <h1 class="contentTitle">AquaBike</h1>
                            <div class="row marginTop50">
                                <div class="col-sm-12">
                                    <article>
                                        <p>L'<strong>aquabike</strong> c'est faire du <em>vélo dans l’eau</em>, cela permet d’allier les vertus des sports d’endurance et la douceur des <em>sports aquatiques</em>.</p>
                                        <p>Renforcement musculaire, articulations, circulation, vitalité, silhouette (réduction de la cellulite, perte de poids ...) un succès !</p>

                                        <p>Pédaler en avant, en arrière, assis sur la selle ou en danseuse, ajouter à cela des exercices ciblant un travail  des bras et d’abdominaux : cela permet de dépenser plus de 600 calories par séance !</p>
                                        <p>L’eau propose une résistance 12 fois supérieure à celle de l’air, cela engendre des mouvements plus lents et difficiles mais également un massage drainant, permettant ni douleur ni courbatures à la sortie de la séance !</p>

                                        <p>La dynamique de groupe crée une motivation qui amène chacun à se dépasser encore plus !</p>
                                        <p>8 vélos maximum disponibles par cours, cours se déroulant en musique.</p>
                                    </article>
                                </div>
                                <div class="col-sm-12 col-sm-offset-3">
                                    <img src="../../assets/cours-MIX.JPG" id="imgJardin" class="img-thumbnail" alt="aquabike" style="width:50%;height: 50%"
                                         />
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2">
                        <ul class = "sidebar-nav">
                            <li>
                                <a href="../controllers/inscription.php" rel="nofollow">Inscription</a>
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
                                <p>Durée des cours 45 min.</p>
                                <table class="table">
                                    <tr>
                                        <td>Lundi</td>
                                        <td>12H30</td>
                                    </tr>
                                    <tr>
                                        <td>Lundi</td>
                                        <td>17H30</td>
                                    </tr>
                                    <tr>
                                        <td class="dispo">Mardi</td>
                                        <td class="dispo">13H00*</td>
                                    </tr>
                                    <tr>
                                        <td>Mardi</td>
                                        <td>17H30</td>
                                    </tr>
                                    <tr>
                                        <td class="dispo">Mercredi</td>
                                        <td class="dispo">13H00*</td>
                                    </tr>
                                    <tr>
                                        <td class="dispo">Jeudi</td>
                                        <td class="dispo">13H00*</td>
                                    </tr>
                                    <tr>
                                        <td class="dispo">Jeudi</td>
                                        <td class="dispo">18H30*</td>
                                    </tr>
                                    <tr>
                                        <td>Vendredi</td>
                                        <td>12H30</td>
                                    </tr>
                                    <tr>
                                        <td class="dispo">Vendredi</td>
                                        <td class="dispo">18H30*</td>
                                    </tr>
                                    <tr>
                                        <td class="dispo">Samedi</td>
                                        <td class="dispo">10H15*</td>
                                    </tr>
                                </table>
                                <p>* Activités non disponible actuellement</p>
                            </div>
                        </div>
                        <div class="row sidebar-right">
                            <div class="col-sm-12">
                                <h2>Tarification</h2>
                                <ul>
                                    <li> 165€ les 10 séances</li>
                                    <li> 300€ les 20 séances</li>
                                    <li> 390€ les 30 séances</li>
                                </ul>
                                <hr>
                                <p>L'activité est organisée par groupe de 8 personnes maximum</p>
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