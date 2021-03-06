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
        <meta name="description" content="activité aquatique à Montpellier : Partenaires'">
        <meta name="keywords" content="Activités aquatiques;Partenaires;Montpellier">
        <title>aqua-balneo.fr : Partenaires</title>
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
                                <a href="#" rel="section">Partenaires</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /sidebar -->
                    <!-- content -->
                    <section class="col-sm-8" id="main">
                        <div class="accueilContent">
                            <h1 class="contentTitle">Nos Partenaires</h1>
                            <div class="row marginTop50">
                                <div class="col-sm-12">
                                    <article>
                                        <address>
                                            <h2>Spa K-Hylé à Teyran</h2>
                                            <a href="#" rel="site partenaire" style="color: #204d74;">Site web en construction</a>
                                        </address>
                                        <img alt="Spa K-Hyle" class="thumbnail" src="../../assets/partenaireK-HYLE.png" />
                                        <br>
                                        <address>
                                            <h2>WellnessClub</h2>
                                            <p>1600 bis avenue de <strong>Montpellier</strong> 34820 Teyran</p>
                                            <p>Contact: 04 67 61 90 37</p>
                                            <a href="http://www.wellness-club.fr/" rel="site partenaire" style="color: #204d74;">http://www.wellness-club.fr/</a>
                                        </address>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img alt="wellness club logo" class="thumbnail" src="../../assets/wellnesslogo.jpg" />
                                            </div>
                                        </div>
                                        <br>
                                        <address>
                                            <h2>Lydie Ricard et Sandra Redon</h2>
                                            <p>Cabinet de sages-femmes</p>
                                            <p>4 av monteroni d'arbitre</p>
                                            <p>34920 Le cres</p>
                                            <p>Contact : 04 67 40 21 19</p>
                                        </address>
                                        <br>
                                        <address>
                                            <h2>Julie Anna Leandri</h2>
                                            <p>Cabinet de Sage-femme</p>
                                            <p>Castries</p>
                                            <p>Contact : 06 30 20 24 44</p>
                                        </address>
                                        <br>
                                        <address>
                                            <h2>Pharmanex : compléments nutritionnels</h2>
                                            <p>Bien-être</p>
                                            <p>Contact : 06 24 33 81 37</p>
                                        </address>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img alt="pharmanex logo" class="thumbnail" src="../../assets/pharmanex.jpg" style="width:50%; height:50%"/>
                                            </div>
                                        </div>
                                        <br>
                                        <address>
                                            <h2>Somethy</h2>
                                            <p>Spa, piscine et hydrothérapie</p>
                                            <p>Contact: 04 67 22 36 62</p>
                                            <a href="http://www.somethy.com/" rel="site partenaire" style="color: #204d74;">http://www.somethy.com/</a>
                                        </address>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img alt="somethy : fabricant français logo" class="thumbnail" src="../../assets/somethy.png"/>
                                            </div>
                                        </div>
                                        <br>
                                        <address>
                                            <h2>L'eau de Noé 34</h2>
                                            <p><strong>Activités aquatiques</strong> à <strong>Montpellier</strong></p>
                                            <a href="http://www.leaudenoe34.aquagym-natation.com" rel="site partenaire" style="color: #204d74;">http://www.leaudenoe34.aquagym-natation.com</a>
                                        </address>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img alt="L'eau de Noé 34 logo" class="thumbnail" src="../../assets/eaudenoe.png"/>
                                            </div>
                                        </div>
                                        <br>
                                        <address>
                                            <h2>KANGOO FUN</h2>
                                            <p>Une nouvelle activité ludique et sportive à <strong>Montpellier</strong></p>
                                            <a href="http://www.kangoofun.fr/" rel="site partenaire" style="color: #204d74;">http://www.kangoofun.fr/</a>
                                        </address>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img alt="kangoo fun logo" class="thumbnail" src="../../assets/kangoofun.jpg"/>
                                            </div>
                                        </div>
                                        <br>
                                         <address>
                                            <h2>Ecole de kite surf à Narbonne</h2>
                                            <a href="http://www.narbonnekitepassion.com/fr/" rel="site partenaire" style="color: #204d74;">http://www.narbonnekitepassion.com/fr/</a>
                                        </address>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img alt="kite surf logo" class="thumbnail" src="../../assets/kitesurf-narbonne.jpg"/>
                                            </div>
                                        </div>
                                        <br>
                                        <address>
                                            <h2>Activités nautiques au lac du Salagou (34)</h2>
                                            <a href="http://base-nautique-salagou.com" rel="site partenaire" style="color: #204d74;">http://base-nautique-salagou.com/</a>
                                        </address>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <img alt="Activite nautique Salagou" class="thumbnail" src="../../assets/logo-jaune.jpg"/>
                                            </div>
                                        </div>
                                    </article>
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