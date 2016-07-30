<?php
	/**
	* Projet : Djungl
	*
	* @author : Arthur DESSEZ et Ugo BORREY
	*/
	
	define('BD_URL', 'localhost');
	define('BD_NOM', '');
	define('BD_USER', '');
	define('BD_PASS', '');

//_______________________________________________________________
/**
 * Connexion � la base de donn�es.
 *
 * @return resource	connecteur � la base de donn�es
 */
function bd_connexion() {
	$bd = mysqli_connect(BD_URL, BD_USER, BD_PASS, BD_NOM);

	if ($bd !== FALSE) {
		return $bd;		// Sortie connexion OK
	}

	// Erreur de connexion
	// Collecte des informations facilitant le debugage
	$msg = '<h4>Erreur de connexion base MySQL</h4>'
			.'<div style="margin: 20px auto; width: 350px;">'
			.'BD_SERVEUR : '.AA_BD_URL
			.'<br>BD_USER : '.AA_BD_USER
			.'<br>BD_PASS : '.AA_BD_PASS
			.'<br>BD_NOM : '.AA_BD_NOM
			.'<p>Erreur MySQL num&eacute;ro : '.mysqli_connect_errno($bd)
			.'<br>'.mysqli_connect_error($bd)
			.'</div>';

	bd_erreurExit($msg);
}

//___________________________________________________________________
/**
 * Arr�t du script si erreur base de donn�es.
 * Affichage d'un message d'erreur si on est en phase de
 * d�veloppement, sinon stockage dans un fichier log.
 *
 * @param string	$msg	Message affich� ou stock�.
 */
function bd_erreurExit($msg) {
	ob_end_clean();		// Supression de tout ce qui
	// a pu �tre d�ja g�n�r�

	echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>',
			'Erreur base de donn�es</title></head><body>',
			$msg,
			'</body></html>';
	exit();
}

//___________________________________________________________________
/**
 * Gestion d'une erreur de requ�te � la base de donn�es.
 *
 * @param resource	$bd	Connecteur sur la bd ouverte
 * @param string	$sql	requ�te SQL provoquant l'erreur
 */
function bd_erreur($bd, $sql) {
	$errNum = mysqli_errno($bd);
	$errTxt = mysqli_error($bd);

	// Collecte des informations facilitant le debugage
	$msg = '<h4>Erreur de requ&ecirc;te</h4>'
			."<pre><b>Erreur mysql :</b> $errNum"
			."<br> $errTxt"
			."<br><br><b>Requ&ecirc;te :</b><br> $sql"
			.'<br><br><b>Pile des appels de fonction</b>';

	// R�cup�ration de la pile des appels de fonction
	$msg .= '<table border="1" cellspacing="0" cellpadding="2">'
			.'<tr><td>Fonction</td><td>Appel&eacute;e ligne</td>'
			.'<td>Fichier</td></tr>';

	$appels = debug_backtrace();
	for ($i = 0, $iMax = count($appels); $i < $iMax; $i++) {
		$msg .= '<tr align="center"><td>'
				.$appels[$i]['function'].'</td><td>'
				.$appels[$i]['line'].'</td><td>'
				.$appels[$i]['file'].'</td></tr>';
	}

	$msg .= '</table></pre>';

	bd_erreurExit($msg);
}

//_______________________________________________________________
/**
 * V�rification d'une session. Redirection sur la page
 * d'index si la session n'est pas ouverte.
 *
 */
function verifie_session() {
   session_start();
	if (! isset($_SESSION['usId'])) {
		session_destroy();
		header('Location: ../index.php');
		exit();
	}
}

//_______________________________________________________________
/**
 *	Suppression d'une session
 *
 */
function exit_session() {
	session_unset();
	session_destroy();
	header('Location: ../index.php');
	exit();
}

//_______________________________________________________________
/**
* 	Verification de la validit� de l'adresse d'un site internet
* 
* 	@param 	string		$url	Adresse du site � tester
* 
* 	@return boolean				True si l'adresse est bonne, false sinon.
*/	
function verifierSite($url){
	$Syntaxe="#^http://[_a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$#";
	if(preg_match($Syntaxe,$url)) 
		return true; 
	else 
		return false; 
}

//_______________________________________________________________
/**
* 	G�n�re le code html du d�but
*
*/	
function htmlDebut(){
	?><!DOCTYPE html>
			<html>
				<head>
					<meta charset="iso-8859-1">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<title>Djungl</title>
					<link rel="stylesheet" href="../style/Djungl.css">
					<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
					<link rel="shortcut icon" href="../image/logo-icon.png" type="image/x-icon">
				</head>
				<body>
					<script src="../js/jquery.js"></script>
					<script src="../bootstrap/js/bootstrap.min.js"></script>
					<div class="container">
					<div id="bcPage">
			<div class="row">
			<div class="col-lg-1 pull-left top">
				<img src="../image/logo-icon.png" alt="Logo">
			</div>
			<div class="col-lg-3 col-lg-offset-8 top">
				<!-- if sur une variable de session
				<button type="button" class="btn btn-primary" id="logout">D�connexion</button> -->
				<a href="./Inscription.php" class="btn btn-primary">Inscription</a>
				<a href="./Djungl.php" class="btn btn-primary">Accueil</a>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalco">Connexion</button>
				<div class="modal fade" id="modalco" tabindex="-1" role="dialog" aria-labelledby="modal-connexion" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="modal-label">Connexion</h4>
				</div>
				<div class="modal-body">
					<div class="form-group" id="login-form">             
						<div>
						    <label></label>
							<input type="text" placeholder="Mon email"/>
						</div>
						<div>
							<label></label>
							<input type="password" placeholder="Mon mot de passe"/>
						</div>
						<div>
							<a href="#">
								Mot de passe oubli� ?
							</a>
						</div>
						<div>
							<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Se connecter</button>
						</div>
						<hr/>
						<div>
							<strong>Pas encore membre ?</strong>
							<br/>
							<a href="./Inscription.php">
								Inscrivez-vous gratuitement
							</a>
						</div>
					</div>
				</div>
				</div>
				</div>
				</div>
			</div>
		</div>
	<?php
}

//_______________________________________________________________
/**
* 	G�n�re le code html du d�but pour la page inscription
*
*/	
function htmlDebutInscription(){
	echo '<!DOCTYPE html>',
			'<html>',
				'<head>',
					'<meta charset="iso-8859-1">',
					'<meta name="viewport" content="width=device-width, initial-scale=1">',
					'<title>Djungl</title>',
					'<link rel="stylesheet" href="../style/Djungl.css">', 
					'<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">',
					'<link rel="shortcut icon" href="../image/logo-icon.png" type="image/x-icon">',
				'</head>',
				'<body>',
					'<div class="container">',
					'<div id="bcPage">',
					'<div class="row">',
					//'<header>',
					'<div class="col-lg-1 col-lg-offset-1 pull-left top">',
						'<img src="../image/logo-icon.png" alt="Logo">',
					'</div>',
					/*'</header>*/'</div>';
}


//_______________________________________________________________
/**
* 	G�n�re le code du 1er formulaire de la page inscription
*
*/	
function inscription1(){
?><div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<h1>Inscription partie 1</h1><hr class="hrtrait"/>
		<h2>Vos informations personnelles</h2><hr />
		<form role="form" name="inscription1" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			<div class="form-group" id="login-form">             
				<div class="form-group">
				    <label class="control-label" for="nom">Nom</label>
					<input id="nom" class="form-control required nom" type="text" placeholder="Mon nom" name="nom" autofocus required value="<?php if(isset($_POST['nom'])) { echo htmlentities($_POST['nom']);}?>" data-placement="right" data-trigger="manual" data-content="Doit contenir entre 2 et 20 caract�res, uniquement de lettres"/>
				</div>
				<div class="form-group">
					<label class="control-label" for="prenom">Pr�nom</label>
					<input id="prenom" class="form-control required prenom" type="text" placeholder="Mon pr�nom" name="prenom" required value="<?php if(isset($_POST['prenom'])) { echo htmlentities($_POST['prenom']);}?>" data-placement="right" data-trigger="manual" data-content="Doit contenir entre 2 et 20 caract�res, uniquement de lettres"/>
				</div>
				<div class="form-group">
					<label class="control-label" for="pseudo">Pseudo</label>
					<input id="pseudo" class="form-control required pseudo" type="text" placeholder="Mon pseudo" name="pseudo" required value="<?php if(isset($_POST['pseudo'])) { echo htmlentities($_POST['pseudo']);}?>" data-placement="right" data-trigger="manual" data-content="Doit contenir au moins 2, uniquement de lettres"/>
				</div>
				<div class="form-group">
					<label class="control-label" for="pass">Mot de passe</label>
					<input id="pass" class="form-control required pass" type="password" placeholder="Mon mot de passe" name="pass" data-placement="right" data-trigger="manual" data-content="Doit contenir au moins 6 caract�res, dont au moins un chiffre, une lettre majuscule et minuscule."/>
				</div>
				<div class="form-group">
					<label class="control-label" for="pass2">Confirmation du mot de passe</label>
					<input id="pass2" class="form-control required pass2" type="password" placeholder="Mon mot de passe" name="pass2" data-placement="right" data-trigger="manual" data-content="Doit �tre identique au pr�c�dent mot de passe"/>
				</div>
				<div class="form-group">
					<label class="control-label" for="mail">Email</label>
					<input id="mail" class="form-control required email" type="text" placeholder="Mon email" name="mail" data-placement="right" data-trigger="manual" value="<?php if(isset($_POST['mail'])) { echo htmlentities($_POST['mail']);}?>" data-content="Doit �tre une adresse mail valide (user@gmail.com)"/>
				</div>
				<div class="form-group">
				    <img id="captcha" src="library/vender/securimage/securimage_show.php" alt="CAPTCHA Image" />
      				<a href="#" onclick="document.getElementById('captcha').src = 'library/vender/securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm">Changer d'image</a><br/>
			        <div class="form-group" style="margin-top: 10px;">
				        <input id="captcha_code"  type="text" class="form-control" name="captcha_code" placeholder="Entrer le code inscrit dans l'image" />
				        <span class="help-block" style="display: none;">Please enter the code displayed within the image.</span>
			      	</div>
      			</div>
				<hr /><div class="form-group">
					<label class="control-label" for="cgu">
						<input id="cgu" class="form-control required cgu" type="checkbox" name="cgu" data-placement="top" data-trigger="manual" data-content="Doit �tre coch�" value="<?php if(isset($_POST['cgu'])) { echo htmlentities($_POST['cgu']);}?>"/>
						<a href="#">J'accepte les conditions d'utilisation</a>
					</label>
				</div>
				<input type="submit" class="btn btn-primary" name="next" value="Suivant"/>
			</div>
		</form>
	</div>
</div>
<script src="../js/validation_inscription1.js"></script>
<?php
}

//_______________________________________________________________
/**
* 	G�n�re le code du 2eme formulaire de la page inscription
*
*/	
function inscription2(){
?><div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<h1>Inscription partie 2</h1><hr class="hrtrait"/>
		<h2>Votre photo</h2><hr />
		<form role="form" method="POST">
			<input type="file" class="file" accept="image/*">
			<input type="submit" class="btn btn-primary" name="prev" value="Pr�c�dent"/>
			<input type="submit" class="btn btn-primary" name="next1" value="Suivant"/>
		</form>
	</div>
</div>
<?php
}

//_______________________________________________________________
/**
* 	G�n�re le code du 3eme formulaire de la page inscription
*
*/	
function inscription3(){
?><div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<h1>Inscription partie 3</h1><hr class="hrtrait"/>
		<h2>Vos r�seaux sociaux</h2><hr />
		<form role="form" method="POST">
			<input type="submit" class="btn btn-primary" name="prev1" value="Pr�c�dent"/>
			<input type="submit" class="btn btn-primary" name="finish" value="Terminer"/>
		</form>
	</div>
</div>
<?php
}

//_______________________________________________________________
/**
* 	G�n�re le formulaire de la 1er page d'inscription
*
*/
function verifPage1(){

	$res = array();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $mail = $_POST['mail'];


    if(isset($_POST['cgu'])){
    	$cgu = $_POST['cgu'];
	    if(validationNom($nom)){
	       if(validationPrenom($prenom)){
	    		if(validationPseudo($pseudo)){
		    		if(validationPass($pass, $pass2)){
		    			if(validationMail($mail)){
		    				return validationCgu($cgu);
		    			}else{return false;}
		    		}else{return false;}
		    	}else{return false;}
		    }else{return false;}
		}else{return false;}
	}else{return false;}
}

//_______________________________________________________________
/**
* 	V�rifie si le nom est valide
*
*/
function validationNom($nom){

	$errors = array();

	$nom = testInput($nom);

    if(empty($nom)){
        $errors[] = 'Veuillez remplir la case nom';
    }else if(strlen($nom) < 2){
        $errors[] = 'Nom trop court';
    }else if(strlen($nom) > 20){
        $errors[] = 'Nom trop long';
    }else if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
        $errors[] = "Nom: uniquement des lettres";
    }

    return empty($errors);
}

//_______________________________________________________________
/**
* 	V�rifie si le prenom est valide
*
*/
function validationPrenom($prenom){

	$errors = array();

	$prenom = testInput($prenom);

    if(empty($prenom)) {
        $errors[] = 'Veuillez remplir la case pr�nom'; 
    }else if(strlen($prenom) < 3){
        $errors[] = 'Pr�nom trop court';
    }else if(strlen($prenom) > 20){
        $errors[] = 'Pr�nom trop long';
    }else if(!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
        $errors[] = "Pr�nom: uniquement des lettres";
    }

    return empty($errors);
}

//_______________________________________________________________
/**
* 	V�rifie si le pseudo est valide
*
*/
function validationPseudo($pseudo){

	$errors = array();

	$pseudo = testInput($pseudo);

    if(empty($pseudo)) {
        $errors[] = 'Veuillez remplir la case pseudo';
    }else if(strlen($pseudo) < 3){
        $errors[] = 'Pseudo trop court';
    }else if(strlen($pseudo) > 32){
        $errors[] = 'Pseudo trop long';
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$pseudo)) {
        $errors[] = "Pseudo: uniquement des lettres et des chiffres";
    }
    /*if (isValidpseudo($pseudo)){
        $errors[] = 'Pseudo non disponible';
    }*/

    return empty($errors);
}

//_______________________________________________________________
/**
* 	V�rifie si le pass est valide
*
*/
function validationPass($pass, $pass2){

	$errors = array();

	$pass = testInput($pass);
	$pass2 = testInput($pass2);

    if(empty($pass) || empty($pass2)){
        $errors[] = 'Veuillez remplir la case mot de passe';
    }else if($pass != $pass2){
        $errors[] = 'Mot de passe invalide';
    }

    return empty($errors);
}

//_______________________________________________________________
/**
* 	V�rifie si le mail est valide
*
*/
function validationMail($mail){

	$errors = array();

	$mail = testInput($mail);

	if(empty($mail)) {
        $errors[] = 'Veuillez remplir la case email';
    }else if(!valideMail($mail)){
        $errors[] = 'Email invalide';
    }

    return empty($errors);
}

//_______________________________________________________________
/**
* 	V�rifie si les cgu est coch�
*
*/
function validationCgu($cgu){

	$errors = array();

	$cgu = testInput($cgu);

    if(empty($cgu)) {
        $errors[] = 'Veuillez lire et coch� les conditions g�n�rales d\'utilisation';
    }

    return empty($errors);
}

//_______________________________________________________________
/**
* 	V�rifie si le mail est valide
*
*/
function valideMail($mail){
	return filter_var($mail, FILTER_VALIDATE_EMAIL);
}

//_______________________________________________________________
/**
* 	Test sur un input
*
*/
function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//_______________________________________________________________
/**
* 	G�n�re le code html de la fin
*
*/	
function htmlFin(){
	?>
	<hr class="hrtrait"/></div></div></body></html>
	<?php
}

?>