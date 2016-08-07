<?php

session_start();
if (!isset($_SESSION['user']) && $_SESSION['user'] !== 'k-hyle@aqua.balneo.fr') {
    try {
        session_unset();
        session_destroy();
        header('Content-Type: text/html; charset=utf-8');
        header('Location: ../../index.php');
    } catch (Exception $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
} elseif (isset($_SESSION['user']) && $_SESSION['user'] === 'k-hyle@aqua.balneo.fr') {
    displayContent();
}

function displayContent()
{
    echo '<!DOCTYPE html>';
    echo '<html lang = "fr-FR">';
    /* HEADER */
    echo '<head>';
    echo '<meta charset = "utf-8" />';
    echo '<meta name = "viewport" content = "width=device-width, height=device-height, initial-scale=1, maximum-scale=1">';
    echo '<meta name = "description" content = "Page d\'administration du site : aqua-balneo.fr">';
    echo '<meta name = "keywords" content = "Activités aquatiques;Aquagym;Aquaphobie;Aquadynamic;Aquadouce;AquaBike;Aqua training;Jardin Aquatique;Stage de natation enfant">';
    echo '<title>aqua-balneo.fr : Activités aquatiques pour petits et grands</title>';
    echo '<link rel = "icon" href = "favicon.ico" />';
    echo '<link rel = "stylesheet" href = "../../css/bootstrap-theme.min.css">';
    echo '<link rel = "stylesheet" href = "../../css/bootstrap.min.css">';
    echo '<link rel = "stylesheet" href = "../../css/balneo.css">';
    echo '</head>';
    /* FIN HEADER */

    /* BODY */
    echo '<body>';
    echo '<div class = "container-fluid">';
    echo '<div class = "row">';

    /* BANNIERE */
    echo '<header>';
    echo '<nav class = "collapse navbar-collapse">';
    echo '<br/>';
    echo '<div>';
    echo '<img src = "../../assets/logoK-HYLE.png" rel="logo site"/>';
    echo '</div>';
    echo '<br/>';
    echo '</nav>';
    echo '</header>';
    /* FIN BANNIERE */

    echo '</div>';
    echo '<div class = "wrapper">';
    echo '<div class = "row">';

    /* MENU GAUCHE */
    echo '<nav class = "col-sm-2" role = "navigation">';
    echo '<ul class = "sidebar-nav">';
    echo '<li class = "sidebar-brand">';
    echo '<a href = "#" rel = "contents">';
    echo '<h2>Page d\'administration</h2>';
    echo '<hr/>';
    echo '</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./aquadouce.php" rel = "section">AquaDouce</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./aquadynamic.php" rel = "section">AquaDynamic</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./aquabike.php" rel = "section">AquaBike</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./aquaphobie.php" rel = "section">AquaPhobie</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./aquatraining.php" rel = "section">Mix Aqua-training</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./jardin.php" rel = "section">Jardin Aquatique enfant</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./stage.php" rel = "section">Stage de natation enfant</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./balneotherapie.php" rel = "section">Balnéothérapie</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./professionel.php" rel = "section">Professionels santé</a>';
    echo '</li>';
    echo '</ul>';
    echo '</nav>';
    /* FIN MENU GAUCHE */

    /* CONTENT */
    echo '<section class = "col-sm-8" id = "main">';
    echo '<div class = "accueilContent">';
    echo '<form role="form" class="well" id="jetonform" name="jetons" method="POST" action="' . filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING) . '">';
    echo '<div class = "form-group">';
    echo '<label for = "user">Identifiant utilisateur (adresse mail):</label>';
    echo '<input type = "text" name ="user" class = "form-control" id = "user">';
    echo '</div>';
    echo '<div class = "form-group">';
    echo '<label for = "jeton">Select list (select one):</label>';
    echo '<select name="activite" class = "form-control" id = "jeton">';
    echo '<option>aquadouce</option>';
    echo '<option>aquadynamic</option>';
    echo '<option>aquabike</option>';
    echo '<option>aquaphobie</option>';
    echo '<option>aquatraining</option>';
    echo '<option>jardinaquatique</option>';
    echo '<option>stagenatation</option>';
    echo '</select>';
    echo '<div class = "form-group">';
    echo '<label for = "nombrejeton">Nombre de jeton à ajouter:</label>';
    echo '<input type = "number" name ="nombrejeton" class = "form-control" id = "nombrejeton">';
    echo '</div>';
    echo '<button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>';
    echo '</div>';
    /* FIN FORMULAIRE1 */

    /* FIN CONTENT */
    echo '</section>';

    /* MENU DROITE */
    echo '<nav class="col-sm-2">';
    echo '<div class="user-info alert-info" style="padding: 20px;"><a href="../controllers/logout.php" rel="nofollow"><button type="button" class="btn btn-danger">Se déconnecter</button></a></div>';
    echo '</nav>';
    /* FIN MENU DROITE */

    /* FOOTER */
    echo '<footer>';
    echo '<div class = "col-sm-6 footerContent">';
    echo '<a href = "#" rel = "section">Mix Aqua-training</a>';
    echo '<span class = "separator"></span>';
    echo '<a href = "#" rel = "section">Mix Aqua-training</a>';
    echo '<span class = "separator"></span>';
    echo '<a href = "#" rel = "section">Mix Aqua-training</a>';
    echo '</div>';
    echo '</footer>';
    /* FIN FOOTER */

    echo '</div>';
    echo '</div>';
    echo '<script src = "../../js/jquery-3.1.0.min.js"></script>';
    echo '<script src="../../js/bootstrap.min.js"></script>';
    echo '</body>';
    echo '</html>';
    /* FIN BODY */
}

$filteredPost = [];
$postedValues = filter_input_array(INPUT_POST);
if (is_array($postedValues)) {
    foreach ($postedValues as $key => $value) {
        if (is_array($value)) {
            $filteredPost[$key] = filter_input_array(INPUT_POST, $key);
        } else {
            $filteredPost[$key] = filter_input(INPUT_POST, $key);
        }
    }
} else {
    exit();
}
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING) === 'POST') {
//Add token
    echo 'test';
    if (!empty($filteredPost['activite']) && !empty($filteredPost['nombrejeton'] && !empty($filteredPost['user']))) {
        try {
            $sql = new PDO('mysql:host=localhost;port=3306;dbname=balneodb', 'root', 'MySQL');
            $coOk = true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

        if ($coOk) {
            $stmt = $sql->prepare("SELECT * FROM usertable WHERE email = :user");
            $stmt->bindParam(':user', $filteredPost['user']);
            if ($stmt->execute()) {
                $userInfo = $stmt->fetch();
                (int) $newToken = (int) $userInfo[$filteredPost['activite']] + (int) $filteredPost['nombrejeton'];
                $smtm = $sql->prepare("UPDATE usertable SET "
                        . "`" . $filteredPost['activite'] . "` = :token "
                        . "WHERE `email` = :email"
                );
                $smtm->bindParam(':token', $newToken);
                $smtm->bindParam(':email', $filteredPost['user']);
                $smtm->execute();
            }
        }
    }
}
