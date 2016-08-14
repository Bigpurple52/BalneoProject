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
        <meta name="description" content="activité aquatique à Montpellier : Inscription">
        <meta name="keywords" content="Activités aquatiques;">
        <title>aqua-balneo.fr : Inscription</title>
        <link rel="icon" href="../../favicon.ico"/>
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/balneo.css">
        <meta name="robots" content="noindex,nofollow" />
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- top nav -->
                <header>
                    <nav class="collapse navbar-collapse noPadding">
                        <br/>
                        <div class="col-sm-2">
                            <img src="../../assets/logoK-HYLE.png" class="imgLogo"/>
                        </div>
                        <div class="col-sm-8 noPadding">
                            <img src="../../assets/bandeau.png" class="imgBanniere"/>
                        </div>
                        <div class="col-sm-2 blockConnection">
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo'<div class="user-info alert-info">Connecté en tant que : <br>' . $_SESSION['user'] . '<br><a href="./logout.php" rel="nofollow"><button type="button" class="btn btn-danger">Se déconnecter</button></a></div>';
                            } else {
                                echo '<form class="well" name="connexion" method="POST" action="./connexion.php">';
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
                                <a href="../views/aquadouce.php" rel="section">AquaDouce</a>
                            </li>
                            <li>
                                <a href="../views/aquadynamic.php" rel="section">AquaDynamic</a>
                            </li>
                            <li>
                                <a href="../views/aquabike.php" rel="section">AquaBike</a>
                            </li>
                            <li>
                                <a href="../views/aquatraining.php" rel="section">Mix Aquatraining</a>
                            </li>
                            <li>
                                <a href="../views/aquaphobie.php" rel="section">AquaPhobie</a>
                            </li>
                            <li>
                                <a href="../views/jardin.php" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="../views/aquababy.php" rel="section">AquaBaby</a>
                            </li>
                            <li>
                                <a href="../views/stage.php" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="../views/balneotherapie.php" rel="section">Balnéothérapie</a>
                            </li>
                            <li>
                                <a href="../views/professionel.php" rel="section">Intervenants</a>
                            </li>
                            <li>
                                <a href="../views/partenaires.php" rel="section">Partenaires</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /sidebar -->
                    <!-- content -->
                    <section class="col-sm-8">
                        <div class="accueilContent">
                            <h2 class="inscription">Inscription</h2>
                            <hr class="hrtrait" />
                            <h2 class="inscription">Vos informations personnelles</h2>
                            <hr />
                            <form action="fileDownload.php" method="post">
                                <button class="btn btn-primary" type="submit" type="button" name="submit">Télécharger le formulaire d'inscription</button>
                            </form>
                            <br>
                            <p style='color:white'>Pour vous inscrire aux séances, veuillez retournez ce document remplit à l'adresse suivante :<p>
                                <a href="mailto:k-hyle@aqua-balneo.fr">k-hyle@aqua-balneo.fr</a>
                            <hr />
                            <p class="centered underbar">Formulaire d'inscription au site - Pas nécessaire pour s'inscrire aux séances.</p>
                            <form role="form" class="well" name="inscription1" method="POST" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING); ?>">
                                <div class="form-group" id="login-form">
                                    <div class="form-group">
                                        <label class="control-label" for="nom">Nom</label>
                                        <input id="nom" class="form-control" type="text" placeholder="Mon nom" name="nom" autofocus value="" data-placement="right"
                                               data-trigger="manual" data-content="Doit contenir entre 2 et 20 caracteres, uniquement de lettres" required="required"
                                               />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="prenom">Prénom *</label>
                                        <input id="prenom" class="form-control" type="text" placeholder="Mon prenom" name="prenom" value="" data-placement="right"
                                               data-trigger="manual" data-content="Doit contenir entre 2 et 20 caracteres, uniquement de lettres" required="required"
                                               />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="pass">Mot de passe *</label>
                                        <input id="pass" class="form-control" type="password" placeholder="Mon mot de passe" name="password" data-placement="right"
                                               data-trigger="manual" data-content="Doit contenir au moins 6 caracteres, dont au moins un chiffre, une lettre majuscule et minuscule."
                                               required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="mail">Emai *</label>
                                        <input id="mail" class="form-control" type="text" placeholder="Mon email" name="email" data-placement="right" data-trigger="manual"
                                               value="" data-content="Doit etre une adresse mail valide (user@gmail.com)" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tel">Telephone *</label>
                                        <input id="tel" class="form-control" type="text" placeholder="Mon numéro de téléphone" name="tel" data-placement="right"
                                               data-trigger="manual" value="" data-content="Doit être un numéro de téléphone valide(0611223344)" required="required"
                                               />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="datenaissance">Date de naissance *</label>
                                        <input id="datenaissance" class="form-control" type="date" placeholder="Date de naissance" name="datenaissance" data-placement="right"
                                               data-trigger="manual" value="" data-content="Date de naissance" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="lieunaissance">Lieu de naissance *</label>
                                        <input id="lieunaissance" class="form-control" type="text" placeholder="Mon lieu de naissance" name="villenaissance" data-placement="right"
                                               data-trigger="manual" value="" data-content="Doit être un numéro de téléphone valide(0611223344)" required="required"
                                               />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="adresse">Adresse *</label>
                                        <input id="adresse" class="form-control" type="text" placeholder="Mon adresse" name="adresse" data-placement="right" data-trigger="manual"
                                               value="" data-content="Adresse" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="ville">Ville *</label>
                                        <input id="ville" class="form-control" type="text" placeholder="Ma ville" name="ville" data-placement="right" data-trigger="manual"
                                               value="" data-content="ville actuelle" required="required"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="codepostal">Code Postal *</label>
                                        <input id="codepostal" class="form-control" type="number" placeholder="Code Postale" name="codepostal" data-placement="right"
                                               data-trigger="manual" value="" data-content="Code Postal" required="required"/>
                                    </div>
                                    <hr/>
                                    <?php
                                    if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) === 'POST') {
                                        include_once('./InscriptionCheck.php');
                                        insertUser();
                                        if ($etatInscription) {
                                            echo '<p class = "alert-success">Inscription réussie avec succès. Un mail récapitulatif contenant vos informations va vous être envoyé.</p>';
                                        } elseif (!$etatInscription) {
                                            echo '<p class = "alert-danger">L\'inscription a échoué. Tous les champs sont obligatoires.</p>';
                                        }
                                    } else {
                                        echo '<p class = "alert-danger">* Tous les champs sont obligatoires.</p>';
                                    }
                                    unset($etatInscription);
                                    ?>
                                    <input type="submit" class="btn btn-primary" name="submit" value="S'incrire" />
                                </div>
                            </form>
                        </div>
                    </section>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2">
                        <ul class = "sidebar-nav">
                            <li>
                                <a href="./inscription.php" rel="nofollow">Inscription</a>
                            </li>
                            <li>
                                <a href="../views/planning2.php" rel="section">Planning</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo'<li> <a href="../views/profil.php" rel="section">Mon Profil</a></li>';
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
