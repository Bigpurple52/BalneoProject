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
                            <h2 class="inscription" id="toHide">Vos informations personnelles</h2>
                            <h2 class="inscription" style="display:none" id="toShow">Choix d'une formule</h2>
                            <hr />
                            <p id="toHide2" class="centered underbar" style="color:red; text-decoration:underline; text-align: center">Formulaire d'inscription au site - S'incrire au site est nécessaire pour s'inscrire aux séances en ligne.</p>
                            <p id="toShow2" class="centered underbar" style="color:red; text-decoration:underline; text-align: center;display:none">Formulaire de souscription à une formule</p>

                            <form role="form" id="myForm3" style="display:none" class="well" name="inscription1" method="POST" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING); ?>">
                             <div id="login-form">
                                    <div class="row">
                                         <div class="form-group col-sm-3 col-sm-offset-3">
                                            <p class="radioTitle">Aquadouce</p>
                                            </div>
                                            <div class="form-group col-sm-3">
                                            <div class="radio">
                                                <label class="control-label" for="aquadouce">
                                                    <input id="" type="radio" name="aquadouce"  value="" />
                                                5 séances 70€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquadouce">
                                                    <input id="" type="radio" name="aquadouce"  value="" />
                                                10 séances 130€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquadouce">
                                                    <input id="" type="radio" name="aquadouce"  value="" />
                                                20 séances 250€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquadouce">
                                                    <input id="" type="radio" name="aquadouce"  value="" />
                                                30 séances 360€</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                    <div class="form-group col-sm-3 col-sm-offset-3">
                                            <p class="radioTitle">
                                        Aquadynamic</p>
                                        </div>
                                            <div class="form-group col-sm-3">
                                            <div class="radio">
                                                <label class="control-label" for="aquadynamic">
                                                    <input id="" type="radio" name="aquadynamic"  value="" />
                                                5 séances 70€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquadynamic">
                                                    <input id="" type="radio" name="aquadynamic"  value="" />
                                                10 séances 130€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquadynamic">
                                                    <input id="" type="radio" name="aquadynamic"  value="" />
                                                20 séances 250€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquadynamic">
                                                    <input id="" type="radio" name="aquadynamic"  value="" />
                                                30 séances 360€</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                    <div class="form-group col-sm-3 col-sm-offset-3">
                                            <p class="radioTitle">Aquabike</p>
                                        </div>
                                            <div class="form-group col-sm-3">
                                            <div class="radio">
                                                <label class="control-label" for="aquabike">
                                                    <input id="" type="radio" name="aquabike"  value="" />
                                                5 séances 70€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquabike">
                                                    <input id="" type="radio" name="aquabike"  value="" />
                                                10 séances 130€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquabike">
                                                    <input id="" type="radio" name="aquabike"  value="" />
                                                20 séances 250€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquabike">
                                                    <input id="" type="radio" name="aquabike"  value="" />
                                                30 séances 360€</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                    <div class="form-group col-sm-3 col-sm-offset-3">
                                            <p class="radioTitle">Mix Aquatraining</p>
                                        </div>
                                            <div class="form-group col-sm-3">
                                            <div class="radio">
                                                <label class="control-label" for="aquatraining">
                                                    <input id="" type="radio" name="aquatraining"  value="" />
                                                5 séances 70€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquatraining">
                                                    <input id="" type="radio" name="aquatraining"  value="" />
                                                10 séances 130€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquatraining">
                                                    <input id="" type="radio" name="aquatraining"  value="" />
                                                20 séances 250€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquatraining">
                                                    <input id="" type="radio" name="aquatraining"  value="" />
                                                30 séances 360€</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                    <div class="form-group col-sm-3 col-sm-offset-3">
                                            <p class="radioTitle">Aquaphobie</p>
                                        </div>
                                            <div class="form-group col-sm-3">
                                            <div class="radio">
                                                <label class="control-label" for="aquaphobie">
                                                    <input id="" type="radio" name="aquaphobie"  value="" />
                                                5 séances 70€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquaphobie">
                                                    <input id="" type="radio" name="aquaphobie"  value="" />
                                                10 séances 130€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquadouce">
                                                    <input id="" type="radio" name="aquadouce"  value="" />
                                                20 séances 250€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquaphobie">
                                                    <input id="" type="radio" name="aquaphobie"  value="" />
                                                30 séances 360€</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                    <div class="form-group col-sm-3 col-sm-offset-3">
                                            <p class="radioTitle">Aquababy</p>
                                        </div>
                                            <div class="form-group col-sm-3">
                                            <div class="radio">
                                                <label class="control-label" for="aquababy">
                                                    <input id="" type="radio" name="aquababy"  value="" />
                                                5 séances 70€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquababy">
                                                    <input id="" type="radio" name="aquababy"  value="" />
                                                10 séances 130€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquababy">
                                                    <input id="" type="radio" name="aquababy"  value="" />
                                                20 séances 250€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="aquababy">
                                                    <input id="" type="radio" name="aquababy"  value="" />
                                                30 séances 360€</label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                    <div class="form-group col-sm-3 col-sm-offset-3">
                                        <p class="radioTitle">Jardin aquatique</p>
                                    </div>
                                        <div class="form-group col-sm-3">
                                            <div class="radio">
                                                <label class="control-label" for="jardinaquatique">
                                                    <input id="" type="radio" name="jardinaquatique"  value="" />
                                                5 séances 70€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="jardinaquatique">
                                                    <input id="" type="radio" name="jardinaquatique"  value="" />
                                                10 séances 130€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="jardinaquatique">
                                                    <input id="" type="radio" name="jardinaquatique"  value="" />
                                                20 séances 250€</label>
                                            </div>
                                            <div class="radio">
                                                <label class="control-label" for="jardinaquatique">
                                                    <input id="" type="radio" name="jardinaquatique"  value="" />
                                                30 séances 360€</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align:center">
                                        <input type="submit"  class="btn btn-primary" name="submit" value="Souscrire" />
                                    </div>       
                                </div>                    
                            </form>                       
                            <form id="myForm" role="form" class="well" name="inscription1" method="POST" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING); ?>">
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
                                        <input id="datenaissance" class="form-control" type="date" placeholder="jj/mm/aaaa - 10/07/1998" name="datenaissance" data-placement="right"
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
                                            echo '<script type="text/javascript">window.alert("Inscription réussie avec succès. Un mail récapitulatif contenant vos informations va vous être envoyé.");</script>';
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
                    <nav class="col-sm-2" style="color:white">
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
                        <h4>Informations complémentaires</h4>
                        <p>Les séances sont dispensées en petits groupes (10 personnes maximum)</p>

                        <p>Suite à votre inscription en ligne, vous recevrez un mail de confirmation</p>

                        <p>La totalité du règlement s’effectue en début de première séance par chèque ou espèces : CB
                            non acceptée</p>
                        <p>Vacances scolaires :<p>
                        <ul>
                            <li>- Les créneaux du midi sont maintenus et restent inchangés</li>
                            <li>- AquaDouce à 18H (du lundi au vendredi)</li>
                            <li>- MIX (AquaDynamic + Aquabike) à 19H (du lundi au vendredi)</li>
                            <li>- PAS DE JARDIN AQUATIQUE ET DE COURS AQUABABY PENDANT LES PETITES VACANCES SCOLAIRE</li>
                        </ul>
                        <p>Pour tous les cours :</p>
                        <ul>
                            <li>- 5 séances valable 6 semaines</li>
                            <li>- 10 séances valables 3 mois</li>
                            <li>- 20 séances valables 6 mois</li>
                            <li>- 30 séances valable 1 an à compter de la première séance effectuée</li>
                        </ul>
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
        <?php
        if (isset($_SESSION['user'])) {
            echo '<script type="text/javascript">$(\'#myForm\').hide();$(\'#toHide\').hide();$(\'#myForm3\').show();$(\'#toHide2\').hide();$(\'#toShow2\').show();$(\'#toShow\').show()</script>';
        }
        ?>
    </body>

</html>
