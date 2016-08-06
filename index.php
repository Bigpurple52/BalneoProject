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
                            <img src="./assets/logoK-HYLE.png" />
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
                    <section class = "col-sm-8" id = "main">
                        <div class = "accueilContent">
                            <h1 class = "contentTitle">Centre Balnéo K-Hylé à Teyran</h1>
                            <ul>
                                <li><strong>Jardin aquatique</strong> enfant de 3 à 5 ans: familiarisation avec l'eau dans un contexte
                                    ludique
                                </li>
                                <li>Apprentissage de la <em>natation</em> cours particulier de <em>natation enfant</em> à partir
                                    de 6 ans</li>
                                <li><strong>Aquaphobie</strong> cours pour adulte permettant de vaincre la peur de l'eau</li>
                                <li><strong>Aquagym</strong> Tonique cours d'<strong>aquagym dynamique</strong></li>
                                <li><strong>Mix Aqua-training</strong> cours comprenant différents ateliers: <strong>Aquabike</strong>,
                                    <em>Step</em>, <em>Aquajump</em>, ainsi que des exercices d'<strong>Aquagym</strong> avec
                                    matériel
                                </li>
                            </ul>
                            </nav>
                            <!--/sidebar -->
                            <!--content -->
                            <section class = "col-sm-8" id = "main">
                                <div class = "accueilContent">
                                    <ul>
                                        <li>Jardin aquatique enfant de 3 à 5 ans: familiarisation avec l'eau dans un contexte ludique</li>
                                        <li>Apprentissage de la natation cours particulier de natation enfant à partir de 6 ans</li>
                                        <li>Aquaphobie cours pour adulte permettant de vaincre la peur de l'eau</li>
                                        <li>Aquagym Tonique cours d'aquagym dynamique</li>
                                        <li>Mix Aqua-training cours comprenant différents ateliers: Aquabike, Step, Aquajump, ainsi que des
                                            exercices d'Aquagym avec matériel</li>
                                    </ul>
                                    <div>
                                        Les séances de qualités sont toutes dispensés en petits groupes, dans la détente et bonne humeur!L'eau de la piscine comprise
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
                                    <div>
                                        Attention: les cours apprentissage de la <em>natation</em> sont proposés uniquement pour les
                                        enfants, les dimensions du <em>bassin</em> (3m sur 6m) n'étant pas adapté à des entrainements
                                        adultes.
                                    </div>
                                    <div>
                                        Les <em>cours de natation</em> et d'<strong>aquagym</strong> à Montpellier (ou dans les environs)
                                        sont dispensés à votre domicile. Des séances sont également proposé au centre de <em>kinésithérapie</em> <em>NEOS SANTE</em> à Montpellier.
                                    </div>
                                    <div>
                                        ACCES : 1 avenue Emile Bertin Sans, 34090 Montpellier TRAM 1 Arrêt "Saint Eloi".
                                    </div>
                                    <div>
                                        « Le sport va chercher la peur pour la dominer, la fatigue pour en triompher, la difficulté pour la vaincre »
                                        <br/>Pierre de Coubertin
                                    </div>
                                </div>

                        </div>
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2" role="navigation">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo'<div class="user-info alert-info">Connecté en tant que : <br>' . $_SESSION['user'] . '</div>';
                        } else {
                            echo '<form class="well" name="connexion" method="POST" action="./src/controllers/connexion.php">';
                            echo '<div class = "form-group" id = "login-form">';
                            echo '<div>';
                            echo 'label class = "control-label" for = "emailId">Mon adresse email</label>';
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
                            echo '<a href = "./src/controllers/Inscription.php">';
                            echo 'Inscrivez-vous gratuitement';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</form>';
                        }
                        ?>
                        <ul class = "sidebar-nav">
                            <li>
                                <a href = "./src/controllers/inscription.php" rel = "nofollow">Inscription</a>
                            </li>
                            <li>
                                <a href = "./src/views/planning2.php" rel = "section">Planning</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo'<li> <a href = "./src/views/profil.php" rel = "section">Mon Profil</a></li>';
                            }
                            ?>
                        </ul>
                        <hr/>
                        <div class = "row sidebar-right info-supp2">
                            <h4>Informations complémentaires</h4>
                            <p>Les séances d’une durée de 45 min sont dispensées en petits groupes (5 à 10 personnes maximum)</p>

                            <p>5 séances valable 6 semaines, 10 séances valables 3 mois, 20 séances valables 6 mois et 30 séances
                                valable 1 an à compter de la première séance effectuée</p>

                            <p>La totalité du règlement s’effectue en début de première séance par chèque ou espèces : CB non acceptée</p>

                            <p>Suivez l’actualité et les offres du moment</p>
                            <a target = '_blank' href = 'https://www.facebook.com/Aquagym.Natation.Teyran/'><img src = "./assets/lienFB.png" alt = 'lien facebook'></a>
                        </div>
                    </nav>
                    <!--sidebar droite -->
                    <footer>
                        <div class = "col-sm-6 footerContent">
                            <a href = "#" rel = "section">Mix Aqua-training</a>
                            <span class = "separator"></span>
                            <a href = "#" rel = "section">Mix Aqua-training</a>
                            <span class = "separator"></span>
                            <a href = "#" rel = "section">Mix Aqua-training</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <script src = "./js/jquery-3.1.0.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>

</html>
