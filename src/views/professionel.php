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
        <meta name="description" content="activité aquatique à Montpellier : Intervenants">
        <meta name="keywords" content="Activités aquatiques;Intervenants;Montpellier">
        <title>aqua-balneo.fr : Intervenants</title>
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
                            <img src="../../assets/bandeau.png" class="imgBanniere" alt="Banniere" />
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
                                <a href="#" rel="section">Intervenants</a>
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
                            <h1 class="contentTitle">Intervenants</h1>
                            <p class="marginTop50">Les <strong>activités aquatiques</strong> sont assurées par des maîtres nageurs qualifiés et expérimentés.</p>
                            <p>Noémie et Damien exercent le métier de maître nageur depuis plus d'une dizaine d'années, en tant qu'entraîneurs, surveillants de baignade, animateurs, enseignants et secouristes.
                                Ils ont également une expérience reconnue dans l'accompagnement individualisé en <strong>aquagym</strong>, <strong>aquabike</strong>, <strong>aquafitness</strong> (...) ainsi qu'en apprentissage de la natation enfant.</p>
                            <div class="col-sm-6 centered noeSeparateur">
                                <img src="../../assets/noe.png" alt="Noémie" class="img-thumbnail"/>
                                <h2>Noémie JOULIE</h2>
                                <p>Educatrice sportive titulaire du <a href="http://www.natationpourtous.com/espace-pro/enseignement/beesan.php" class="contentLink">BEESAN</a> (Brevet d'Etat d'Educateur Sportif des Activités
                                    de la Natation) et issue de formation <a href="https://fr.wikipedia.org/wiki/Sciences_et_techniques_des_activit%C3%A9s_physiques_et_sportives" class="contentLink">STAPS</a> à l'UFRAPS de Grenoble (38)</p>
                            </div>
                            <div class="col-sm-6 centered">
                                <img src="../../assets/damien.png" alt="Damien" class="img-thumbnail" style="width:176px;height:167px;" />
                                <h2>Damien FILHOL</h2>
                                <p>Éducateur territorial des Activités physiques et sportives et titulaire du <a href="http://www.natationpourtous.com/espace-pro/enseignement/beesan.php" class="contentLink">BEESAN</a>, Damien
                                    est également licencié <a href="https://fr.wikipedia.org/wiki/Sciences_et_techniques_des_activit%C3%A9s_physiques_et_sportives" class="contentLink">STAPS</a> et formé au CREPS de <strong>Montpellier</strong> (34).</p>
                            </div>
                            <div class="col-sm-12 centered">
                                <img src="../../assets/nicolas.png" alt="Damien" class="img-thumbnail"/>
                                <h2>Nicolas VIDAMANT</h2>
                                <p>Cabinet de Kinésithérapie Ostéopathie et Posturologie</p>
                                <p>Contact: 06 24 33 81 37 - Email : <a style="color: black;" href="mailto:kineosteo35@gmail.com" rel="nofollow">kineosteo35@gmail.com</a></p>
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
                                <a href="../../js/remplirPlanning.php" rel="section">Planning</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo'<li> <a href = "./profil.php" rel = "section">Mon Profil</a></li>';
                            }
                            ?>
                        </ul>
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