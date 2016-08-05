<!DOCTYPE html>
<html lang="fr-FR">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
        <meta name="description" content="activité aquatique à Montpellier : Aquadynamic">
        <meta name="keywords" content="Activités aquatiques;Aquadynamic;">
        <title>aqua-balneo.fr : Aquadynamic</title>
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
                    <nav class="collapse navbar-collapse">
                        <br/>
                        <div>
                            <img src="../../assets/logoK-HYLE.png">
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
                    <nav class="col-sm-2">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand">
                                <a href="../../index.php" rel="contents">
                                    <h2>Accueil</h2>
                                    <hr/>
                                </a>
                            </li>
                            <li>
                                <a href="../views/aquadouce.html" rel="section">AquaDouce</a>
                            </li>
                            <li>
                                <a href="../views/aquadynamic.html" rel="section">AquaDynamic</a>
                            </li>
                            <li>
                                <a href="../views/aquabike.html" rel="section">AquaBike</a>
                            </li>
                            <li>
                                <a href="../views/aquaphobie.html" rel="section">AquaPhobie</a>
                            </li>
                            <li>
                                <a href="../views/aquatraining.html" rel="section">Mix Aqua-training</a>
                            </li>
                            <li>
                                <a href="../views/jardin.html" rel="section">Jardin Aquatique enfant</a>
                            </li>
                            <li>
                                <a href="../views/stage.html" rel="section">Stage de natation enfant</a>
                            </li>
                            <li>
                                <a href="../views/balneotherapie.html" rel="section">Balnéothérapie</a>
                            </li>
                            <li>
                                <a href="../views/professionel.html" rel="section">Professionels santé</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /sidebar -->

                    <!-- content -->
                    <div class="col-sm-8 accueilContent">
                        <h2 class="inscription">Inscription</h2>
                        <hr class="hrtrait"/>
                        <h2 class="inscription">Vos informations personnelles</h2><hr />
                        <form role="form" class="well" name="inscription1" method="POST" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING); ?>">
                            <div class="form-group" id="login-form">
                                <div class="form-group">
                                    <label class="control-label" for="nom">Nom</label>
                                    <input id="nom" class="form-control" type="text" placeholder="Mon nom" name="nom" autofocus  value="" data-placement="right" data-trigger="manual" data-content="Doit contenir entre 2 et 20 caracteres, uniquement de lettres"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="prenom">Prénom</label>
                                    <input id="prenom" class="form-control" type="text" placeholder="Mon prenom" name="prenom"  value="" data-placement="right" data-trigger="manual" data-content="Doit contenir entre 2 et 20 caracteres, uniquement de lettres"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="pass">Mot de passe</label>
                                    <input id="pass" class="form-control" type="password" placeholder="Mon mot de passe" name="password" data-placement="right" data-trigger="manual" data-content="Doit contenir au moins 6 caracteres, dont au moins un chiffre, une lettre majuscule et minuscule."/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="mail">Email</label>
                                    <input id="mail" class="form-control" type="text" placeholder="Mon email" name="email" data-placement="right" data-trigger="manual" value="" data-content="Doit etre une adresse mail valide (user@gmail.com)"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="tel">Telephone</label>
                                    <input id="tel" class="form-control" type="text" placeholder="Mon numéro de téléphone" name="tel" data-placement="right" data-trigger="manual" value="" data-content="Doit être un numéro de téléphone valide(0611223344)"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="datenaissance">Date de naissance</label>
                                    <input id="datenaissance" class="form-control" type="date" placeholder="Date de naissance" name="datenaissance" data-placement="right" data-trigger="manual" value="" data-content="Date de naissance"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="lieunaissance">Lieu de naissance</label>
                                    <input id="lieunaissance" class="form-control" type="text" placeholder="Mon lieu de naissance" name="villenaissance" data-placement="right" data-trigger="manual" value="" data-content="Doit être un numéro de téléphone valide(0611223344)"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="adresse">Adresse</label>
                                    <input id="adresse" class="form-control" type="text" placeholder="Mon adresse" name="adresse" data-placement="right" data-trigger="manual" value="" data-content="Adresse"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="ville">Ville</label>
                                    <input id="ville" class="form-control" type="text" placeholder="Ma ville" name="ville" data-placement="right" data-trigger="manual" value="" data-content="ville actuelle"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="codepostal">Code Postal</label>
                                    <input id="codepostal" class="form-control" type="number" placeholder="Code Postale" name="codepostal" data-placement="right" data-trigger="manual" value="" data-content="Code Postal"/>
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
                                <input type="submit" class="btn btn-primary" name="submit" value="S'incrire"/>
                            </div>
                        </form>
                    </div>
                    <!-- sidebar droite-->
                    <nav class="col-sm-2">
                        <ul class="sidebar-nav">
                            <li>
                                <a href="#" rel="noindex, nofollow">Inscription</a>
                            </li>
                            <li>
                                <a href="../views/planning.html" rel="section">Planning</a>
                            </li>
                        </ul>
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
            <script src="../../js/jquery-3.1.0.min.js"></script>
            <script src="../../js/bootstrap.min.js"></script>

        </div><!--Content-->

        <footer id="footer">
        </footer>

    </body>
</html>

