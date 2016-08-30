<?php

session_start();
if (!isset($_SESSION['user']) && $_SESSION['user'] !== 'k-hyle@aqua-balneo.fr') {
    try {
        session_unset();
        session_destroy();
        header('Content-Type: text/html; charset=utf-8');
        header('Location: ../../index.php');
    } catch (Exception $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
} elseif (isset($_SESSION['user']) && $_SESSION['user'] === 'k-hyle@aqua-balneo.fr') {
    try {
        $sql = new PDO('mysql:host=aquabalncxaquadb.mysql.db;dbname=aquabalncxaquadb', 'aquabalncxaquadb', '3Kp6aSDbgkK7');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $userList = getUserList($sql);
    displayContent($userList);
} else {
    header('Content-Type: text/html; charset=utf-8');
    header('Location: ../../index.php');
}

function displayContent($userList)
{
    echo '<!DOCTYPE html>';
    echo '<html lang = "fr-FR">';
    /* HEADER */
    echo '<head>';
    echo '<meta charset = "utf-8" />';
    echo '<meta name = "viewport" content = "width=device-width, height=device-height, initial-scale=1, maximum-scale=1">';
    echo '<meta name = "description" content = "Page d\'administration du site : aqua-balneo.fr">';
    echo '<meta name="robots" content="noindex,nofollow" />';
    echo '<title>aqua-balneo.fr : Activités aquatiques pour petits et grands</title>';
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
    echo '<a href = "../../index.php" rel = "contents">';
    echo '<h2>Accueil</h2>';
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
    echo '<a href = "./aquatraining.php" rel = "section">Mix Aquatraining</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./aquaphobie.php" rel = "section">AquaPhobie</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./jardin.php" rel = "section">Jardin Aquatique enfant</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./aquababy.php" rel = "section">AquaBaby</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./stage.php" rel = "section">Stage de natation enfant</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./balneotherapie.php" rel = "section">Balnéothérapie</a>';
    echo '</li>';
    echo '<li>';
    echo '<a href = "./professionel.php" rel = "section">Intervenants</a>';
    echo '</li>';
    echo '</ul>';
    echo '</nav>';
    /* FIN MENU GAUCHE */

    /* CONTENT */
    echo '<section class = "col-sm-8" id = "main">';
    echo '<div class = "accueilContent">';
    /* FORMULAIRE 1 */
    echo '<form role="form" class="well" id="jetonform" name="jetons" method="POST" action="' . filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING) . '">';
    echo '<div class = "form-group">';
    echo '<label for = "user">Identifiant utilisateur (adresse mail):</label>';
    echo '<select name ="user" class = "form-control" id = "user" required>';
    foreach ($userList as $uL) {
//        foreach ($uL as $u) {
        echo '<option>' . $uL['email'] . '</option>';
//        }
    }

    echo '</select>';
    echo '</div>';
    echo '<div class = "form-group">';
    echo '<label for = "jeton">Activité:</label>';
    echo '<select name="activite" class = "form-control" id = "jeton" required>';
    echo '<option>aquadouce</option>';
    echo '<option>aquadynamic</option>';
    echo '<option>aquabike</option>';
    echo '<option>aquaphobie</option>';
    echo '<option>aquatraining</option>';
    echo '<option>jardinaquatique</option>';
    echo '<option>stagenatation</option>';
    echo '<option>aquababy</option>';
    echo '</select>';
    echo '<div class = "form-group">';
    echo '<label for = "nombrejeton">Nombre de jeton à ajouter:</label>';
    echo '<input type = "number" name ="nombrejeton" class = "form-control" id = "nombrejeton" required/>';
    echo '</div>';
    echo '<button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>';
    echo '</div>';
    echo '</form>';
    /* FIN FORMULAIRE 1 */
    /* FORMULAIRE 2 */
    echo '<form role="form" class="well" id="planning" name="planning" method="POST" action="' . filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING) . '">';
    echo '<div class = "form-group">';
    echo '</select>';
    echo '</div>';
    echo '<div class = "form-group">';
    echo '<label for = "activitePlanning">Activité : </label>';
    echo '<select name="activitePlanning" class = "form-control" id = "activitePlanning" required>';
    echo '<option>AquaDouce</option>';
    echo '<option>AquaDynamic</option>';
    echo '<option>AquaBike</option>';
    echo '<option>AquaPhobie</option>';
    echo '<option>AquaTraining</option>';
    echo '<option>JardinAquatique</option>';
    echo '<option>StageNatation</option>';
    echo '<option>AquaBaby</option>';
    echo '</select>';
    echo '<div class = "form-group">';
    echo '<label for = "start">Heure Debut :</label>';
    echo '<input type = "datetime" name ="start" class = "form-control" id = "start" required/>';
    echo '</div>';
    echo '<div class = "form-group">';
    echo '<label for = "newStart">Nouvelle Heure Debut :</label>';
    echo '<input type = "datetime" name ="newStart" class = "form-control" id = "newStart"/>';
    echo '</div>';
    echo '<div class = "form-group">';
    echo '<label for = "end">Heure Fin :</label>';
    echo '<input type = "datetime" name ="end" class = "form-control" id = "end" required/>';
    echo '</div>';
    echo '<div class = "form-group">';
    echo '<label for = "newEnd">Nouvelle Heure Fin :</label>';
    echo '<input type = "datetime" name ="newEnd" class = "form-control" id = "newEnd"/>';
    echo '</div>';
    echo '<div class="radio">';
    echo '<label><input type="radio" value="0" name="dispo">Pas Disponible</label>';
    echo '</div>';
    echo '<div class = "radio">';
    echo '<label><input type = "radio" value = "1" name="dispo">Disponible</label>';
    echo '</div>';
    echo '<div class = "form-group">';
    echo '<label for = "maxUser">Nombre d\'utilisateur max :</label>';
    echo '<input type = "number" name ="maxUser" class = "form-control" id = "maxUser"/>';
    echo '</div>';
    echo '<p class="underbar">POUR SUPPRIMER UNE SEANCE: REMPLIR UNIQUEMENT HEURE DEBUT, FIN ET ACTIVITE!!</p>';
    echo '<p class="underbar">POUR MODIFIER UNE SEANCE: REMPLIR UNIQUEMENT HEURE DEBUT - FIN,  NOUVELLE HEURE DEBUT - FIN ET DISPO!!</p>';
    echo '<p class="underbar">POUR AJOUTER UNE SEANCE: REMPLIR UNIQUEMENT HEURE DEBUT - FIN, DISPO ET MAXUSER!!</p>';

    echo '<button type="submit" class="btn btn-primary" name="submit">Ajouter/Modifier/Supprimer</button>';
    echo '</div>';
    /* FIN FORMULAIRE 2/
      /* FIN CONTENT */
    echo '</section>';

    /* MENU DROITE */
    echo '<nav class="col-sm-2">';
    echo '<div class="user-info alert-info" style="padding: 20px;"><a href="../controllers/logout.php" rel="nofollow"><button type="button" class="btn btn-danger">Se déconnecter</button></a><button class="btn btn-info"><a href = "../sql/requete.php" rel = "section">Remplir planning</a> </button></div>';
    echo '</nav>';
    /* FIN MENU DROITE */

    /* FOOTER */
    echo '<footer>';
    echo '<div class = "col-sm-6 footerContent">';
    echo '<a href="mailto:k-hyle@aqua-balneo.fr" rel="nofollow">k-hyle@aqua-balneo.fr</a>';
    echo '<span class = "separator"></span>';
    echo '<a href="#" rel="nofollow">07 83 55 20 13 - 06 24 33 81 37</a>';
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
    if (!empty($filteredPost['activite']) && !empty($filteredPost['nombrejeton'] && !empty($filteredPost['user']))) {
        $stmt = $sql->prepare("SELECT * FROM usertable WHERE email = :user");
        $stmt->bindParam(':user', $filteredPost['user']);
        if ($stmt->execute()) {
            $userInfo = $stmt->fetch();
            (int) $newToken = (int) $userInfo[$filteredPost['activite']] + (int) $filteredPost['nombrejeton'];
            $stmt = $sql->prepare("UPDATE usertable SET "
                    . "`" . $filteredPost['activite'] . "` = :token "
                    . "WHERE `email` = :email"
            );
            $stmt->bindParam(':token', $newToken);
            $stmt->bindParam(':email', $filteredPost['user']);
            $stmt->execute();
        }
    } elseif (!empty($filteredPost['activitePlanning']) && !empty($filteredPost['start']) && !empty($filteredPost['end']) && !empty($filteredPost['newStart']) && !empty($filteredPost['newEnd']) && ($filteredPost['dispo'] === "1" || $filteredPost['dispo'] === "0")) {
        $stmt = $sql->prepare("UPDATE Planning SET `start` = :newStart, `end` = :newEnd, `available` = :dispo WHERE start = :starter AND `title` = :title");
        $tmpDate = new DateTime($filteredPost['start']);
        $startDate = $tmpDate->format('Y-m-d\TH:i:s');
        $stmt->bindParam(':starter', $startDate);
        $tmpStart = new DateTime($filteredPost['newStart']);
        $newStart = $tmpStart->format('Y-m-d\TH:i:s');
        $stmt->bindParam(':newStart', $newStart);
        $tmpEnd = new DateTime($filteredPost['newEnd']);
        $newEnd = $tmpEnd->format('Y-m-d\TH:i:s');
        $stmt->bindParam(':newEnd', $newEnd);
        $dispo = $filteredPost['dispo'];
        $stmt->bindParam(':dispo', $dispo);
        $title = $filteredPost['activitePlanning'];
        $stmt->bindParam(':title', $title);

        $stmt->execute();
    } elseif (!empty($filteredPost['activitePlanning']) && !empty($filteredPost['start']) && !empty($filteredPost['end']) && empty($filteredPost['newStart']) && empty($filteredPost['newEnd']) && empty($filteredPost['maxUser']) && ($filteredPost['dispo'] !== "1" || $filteredPost['dispo'] !== "0")) {
        $stmt = $sql->prepare("DELETE FROM Planning WHERE `start` = :starter AND `title` = :title");
        $tmpDate = new DateTime($filteredPost['start']);
        $startDate = $tmpDate->format('Y-m-d\TH:i:s');
        $stmt->bindParam(':starter', $startDate);
        $title = $filteredPost['activitePlanning'];
        $stmt->bindParam(':title', $title);

        $stmt->execute();
    } elseif (!empty($filteredPost['activitePlanning']) && !empty($filteredPost['start']) && !empty($filteredPost['end']) && empty($filteredPost['newStart']) && empty($filteredPost['newEnd']) && !empty($filteredPost['maxUser']) && ($filteredPost['dispo'] === "1" || $filteredPost['dispo'] === "0")) {
        $stmt = $sql->prepare("INSERT INTO Planning (`title`, `start`, `end`, `available`, `maxUser`) VALUES (:title, :starter, :ender, :dispo, :maxUser)");
        $stmt->bindParam(':title', $filteredPost['activitePlanning']);
        $tmpStart = new DateTime($filteredPost['start']);
        $startDate = $tmpStart->format('Y-m-d\TH:i:s');
        $stmt->bindParam(':starter', $startDate);
        $tmpEnd = new DateTime($filteredPost['end']);
        $endDate = $tmpEnd->format('Y-m-d\TH:i:s');
        $stmt->bindParam(':ender', $endDate);
        $stmt->bindParam(':dispo', $filteredPost['dispo']);
        $maxUser = $filteredPost['maxUser'];
        $stmt->bindParam(':maxUser', $maxUser);

        $stmt->execute();
    }
}

function getUserList($sql)
{
    $myQuery = 'SELECT email FROM usertable';
    $tempDB = $sql->query($myQuery);
    $userList = [];
    while ($result = $tempDB->fetch()) {
        $userList[] = $result;
    }

    return $userList;
}
