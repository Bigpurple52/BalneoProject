<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inscription</title>
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/balneo.css">
    </head>
 
    <body>
    <script src="../../js/jquery-3.1.0.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    
    <header id="headerIndex">
       
    </header>
    
    
    <nav id="sideMenu">        
       
    </nav>
    
    <div id="inscriptionContent">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>Inscription</h1><hr class="hrtrait"/>
                <h2>Vos informations personnelles</h2><hr />
                <form role="form" name="inscription1" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                    <div class="form-group" id="login-form">             
                        <div class="form-group">
                            <label class="control-label" for="nom">Nom</label>
                            <input id="nom" class="form-control required nom" type="text" placeholder="Mon nom" name="nom" autofocus required value="<?php if(isset($_POST['nom'])) { echo htmlentities($_POST['nom']);}?>" data-placement="right" data-trigger="manual" data-content="Doit contenir entre 2 et 20 caracteres, uniquement de lettres"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="prenom">Prenom</label>
                            <input id="prenom" class="form-control required prenom" type="text" placeholder="Mon prenom" name="prenom" required value="<?php if(isset($_POST['prenom'])) { echo htmlentities($_POST['prenom']);}?>" data-placement="right" data-trigger="manual" data-content="Doit contenir entre 2 et 20 caracteres, uniquement de lettres"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pass">Mot de passe</label>
                            <input id="pass" class="form-control required pass" type="password" placeholder="Mon mot de passe" name="pass" data-placement="right" data-trigger="manual" data-content="Doit contenir au moins 6 caracteres, dont au moins un chiffre, une lettre majuscule et minuscule."/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pass2">Confirmation du mot de passe</label>
                            <input id="pass2" class="form-control required pass2" type="password" placeholder="Mon mot de passe" name="pass2" data-placement="right" data-trigger="manual" data-content="Doit etre identique au precedent mot de passe"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="mail">Email</label>
                            <input id="mail" class="form-control required email" type="text" placeholder="Mon email" name="mail" data-placement="right" data-trigger="manual" value="<?php if(isset($_POST['mail'])) { echo htmlentities($_POST['mail']);}?>" data-content="Doit etre une adresse mail valide (user@gmail.com)"/>
                        </div>
                        <hr/>
                        <input type="submit" class="btn btn-primary" name="submit" value="S'incrire"/>
                    </div>
                </form>
            </div>
        </div> 
    </div><!--Content-->
    
    <footer id="footer">
    </footer>
    
    </body>
</html>