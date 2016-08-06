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
        <meta name="description" content="activité aquatique à Montpellier : Balneotherapie">
        <meta name="keywords" content="Activités aquatiques;Balneotherapie">
        <title>aqua-balneo.fr : Balneotherapie</title>
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
                                <a href="./aquatraining.php" rel="section">Mix Aqua-training</a>
                            </li>
                            <li>
                                <a href="./jardin.php" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="./stage.php" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="#" rel="section">Balnéothérapie</a>
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
                            <h1 class="contentTitle">Balnéothérapie</h1>
                            <p>La <strong>balnéothérapie</strong> permet de compléter les soins plus de masso-kinésithérapie classiques (salle de soins et gymnase) que nous exerçons au Crès au 1 avenue des chasseurs.</p>
                            <article>
                                <h4>Prise en charge</h4>
                                <p>Les soins de <strong>balnéothérapie</strong> en piscine sont conventionnés et donc pris en charge par l’assurance maladie et les mutuelles.</p>
                                <p>La mention « <strong>balnéothérapie</strong> » ou « en piscine » doit apparaître sur la prescription médicale.</p>
                            </article>
                            <article>
                                <h4>Encadrement</h4>
                                <p>Les séances de balnéothérapie sont encadrées par un kinésithérapeute diplômé et ont lieu tous les jours de la semaine, en matinée ou en après-midi.</p>
                            </article>
                            <article>
                                <h4>Equipement</h4>
                                <p>Les séances se déroulent dans une piscine de 6m par 3m, profonde de 1,2m, chauffée entre 31°c et 33°c, selon les pathologies. Elle est équipée  de 6 buses de massage, de nage à contre-courant, de matériel d’hydrothérapie spécifique afin de s’adapter au mieux aux spécifités de certaines pathologies. Le matériel classique d’aquagym (frites, haltères, lests, ballons, aquabike) est disponible pour les soins de balnéothérapie.</p>
                            </article>
                            <article>
                                <h4>Les bienfaits de l’eau</h4>
                                <p>La <strong>balnéothérapie</strong> est la rééducation en milieu aquatique.</p>
                                <p>Elle permet par l’utilisation du principe de la poussée d’archimède de porter plus facilement le corps et par la résistance de l’eau de tonifier les muscles du corps soumit à la pression hydrostatique.</p>
                                <p>La pratique d’exercices dans l’eau permet un relâchement ou une tonification musculaire, une diminution des contraintes mécaniques sur les articulations, une action drainante.</p>
                            </article>
                            <article>
                                <h4>Les pathologies intéressées</h4>
                                <p>Cette <em>rééducation</em> permet une récupération indolore des déficits neuro musculo articulaire. Nous pouvons donc aborder de nombreuses parties du corps.</p>
                                <p>Il est par exemple possible d’effectuer un reprise d’appui progressive, indolore, d’un membre inférieur (suite à un prothèse, un ligamentoplastie, une fracture), un mobilisation douce d’un membre supérieur (suite à une prothèse d’épaule, une intervention sur la coiffe des rotateurs, une capsulite rétractile, une épaule gelée)</p>
                                <p>Par ailleurs, il est plus aisé de tonifier la sangle abdomino-lombaire pour lutter contre les douleurs de dos chroniques, d’améliorer les insuffisances veineuses des membres inférieurs qu’elles soient sanguines ou lymphatiques.</p>
                                <p>Egalement, la stimulation de la musculature globale (perte de poids), tout comme la détente des zones de stress (cervicales, muscles inter-scapulaires) sont facilités.</p>
                                <p>Les femmes enceintes trouvent dès le troisième mois de grossesse, un bénéfice certain par cette apesanteur qui leur permet de se mouvoir sans douleur.</p>
                                <p>Bien d’autres pathologies peuvent tirer un bénéfice de la rééducation dans l’eau  (la fibromyalgie, l’algoneurodystrophie, certaines insuffisances respiratoires comme la BPCO,…), parlez en avec votre médecin.</p>
                            </article>
                            <article>
                                <h4>Le déroulement de la séance</h4>
                                <p>Le temps d’accès à la <strong>balnéothérapie</strong> est de trois quarts d’heure. Lors de la première séance, le kinésithérapeute en fonction de son bilan sur votre pathologie, adapte un programme spécifique qui évoluera suivant vos progrès.</p>
                            </article>
                            <br>
                            <p>La séance de <strong>balnéothérapie</strong> n’est pas un cours d’<strong>aquagym</strong>, ce qui explique que les patients dans la piscine n’aient pas tous les mêmes exercices. Le kinésithérapeute est présent durant toute la séance afin de vous suivre et de vous corriger si besoin. Les jets d’hydromassage placés à différentes hauteurs afin de s’adapter au mieux aux différents cas de figure, peuvent être utilisés en milieu de séance ou bien à la fin afin d’améliorer la relaxation.</p>
                            <p>Pour tous renseignements, vous pouvez nous contacter au 06 24 33 81 37.</p>
                        </div>
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