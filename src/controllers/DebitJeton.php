<?php

session_start();
try {
    $sql = new PDO('mysql:host=localhost;dbname=balneodb', 'root', 'MySQL');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
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
if (!empty($filteredPost['start'])) {
    $start = new DateTime($filteredPost['start']);
}
if (!empty($filteredPost['end'])) {
    $end = new DateTime($filteredPost['end']);
}
if (!empty($filteredPost['event'])) {
    $title = mb_strtolower($filteredPost['event']);
    if ($title === 'mixaquatraining') {
        $title = 'aquatraining';
    }
}
$email = $_SESSION['user'];
$stmt = $sql->prepare("SELECT * FROM usertable WHERE email = :email");
$stmt->bindParam(':email', $email);
try {
    $stmt->execute();
    $userToken = $stmt->fetch();
    (int) $newToken = (int) $userToken[$title] - 1;
    (int) $userId = (int) $userToken['id'];
    $success = true;

    $bdd = $sql->prepare("SELECT id, maxUser FROM planning WHERE start = :start AND title = :title");
    $start = $start->format('Y-m-d H:i:s');
    $bdd->bindParam(':start', $start);
    $bdd->bindParam(':title', $filteredPost['event']);
    $bdd->execute();
    $result = $bdd->fetch();
    (int) $idAct = (int) $result['id'];
    $maxUser = $result['maxUser'];
} catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
}
if (!empty($idAct) && !empty($maxUser) && !empty($userId)) {
    $bdd2 = $sql->prepare("SELECT COUNT(*) FROM activite WHERE idactivite = :idAct");
    $bdd2->bindParam(':idAct', $idAct);
    try {
        $bdd2->execute();
        $counter = $bdd2->fetch();
        $maxTest = (int) $counter['COUNT(*)'];
        if ($maxTest >= $maxUser) {
            $response = false;
        } elseif ($maxTest < $maxUser) {
            $response = true;
        }
    } catch (PDOException $ex) {
        echo "Erreur !: " . $e->getMessage() . "<br/>";
    }

    $bdd4 = $sql->prepare("SELECT iduser FROM activite WHERE idactivite = :idAct");
    $bdd4->bindParam(':idAct', $idAct);
    $bdd4->execute();
    $alreadyRegistered = true;
    while ($result = $bdd4->fetch(PDO::FETCH_ASSOC)) {
        if ((int) $result['iduser'] === $userId) {
            $alreadyRegistered = false;
        }
    }
}

if ($alreadyRegistered) {
    $bdd3 = $sql->prepare('INSERT INTO activite (idactivite, iduser) VALUES (:idAct, :idUser)');
    $bdd3->bindParam(':idAct', $idAct);
    $bdd3->bindParam(':idUser', $userId);
    try {
        if ($bdd3->execute()) {
            $response = true;
        } else {
            $response = 0;
        }
    } catch (Exception $ex) {
        echo "Erreur !: " . $e->getMessage() . "<br/>";
    }
} else {
    $response = 0;
}
if ($response) {
    $bdb = $sql->prepare("UPDATE usertable SET `" . $title . "` = :newToken WHERE email = :email");
    $bdb->bindParam(':email', $email);
    $bdb->bindParam(':newToken', $newToken);
    try {
        if ($bdb->execute()) {
            $response = true;
        } else {
            $response = 0;
        }
    } catch (PDOException $ex) {
        echo "Erreur!: " . $e->getMessage() . "<br/>";
    }
    if ($response) {
        $passage_ligne = "\n";
        $prenom = $_SESSION['prenom'];
        $nom = $_SESSION['nom'];
        $newStart = new DateTime($filteredPost['start']);
        $newEnd = new DateTime($filteredPost['end']);
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = "Bonjour " . $prenom . " " . $nom . ", "
                . $passage_ligne . "Vous venez de vous inscrire à la séance : " . $filteredPost['event']
                . $passage_ligne . "Ce mail est un récapitulatif de vos informations."
                . $passage_ligne . $passage_ligne
                . $passage_ligne . "Cette séance aura lieu du " . $newStart->format('d-m-Y H:i:s') . " au " . $newEnd->format('d-m-Y H:i:s')
                . $passage_ligne . "A bientot dans notre centre K-Hyle!";
        $message_html = "<html><head></head><body>"
                . "<p>Bonjour " . $prenom . " " . $nom . ",</p>"
                . "<p>vous venez de vous inscrire à la séance : " . $filteredPost['event']
                . "<p>Ce mail est un récapitulatif de vos informations.</p>"
                . "<br>"
                . "Cette séance aura lieu du " . $newStart->format('d-m-Y H:i:s') . " au " . $newEnd->format('d-m-Y H:i:s')
                . "<p>A bientot dans notre centre K-Hylé!"
                . "</body></html>";
        //==========
        //=====Création de la boundary
        $boundary = " -----=" . md5(rand());
        //==========
        //=====Définition du sujet.
        $sujet = "Inscription à la séance : " . $filteredPost['event'];
        //=========
        //=====Création du header de l'e-mail.
        $header = "From: \"K-Hyle\"<k-hyle@aqua-balneo.fr>" . $passage_ligne;
        $header.= "Reply-to: \"K-Hyle\" <k-hyle@aqua-balneo.fr>" . $passage_ligne;
        $header.= "MIME-Version: 1.0" . $passage_ligne;
        $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
        //==========
        //=====Création du message.
        $message = $passage_ligne . "--" . $boundary . $passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"utf-8\"" . $passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message.= $passage_ligne . $message_txt . $passage_ligne;
        //==========
        $message.= $passage_ligne . "--" . $boundary . $passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"utf-8\"" . $passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message.= $passage_ligne . $message_html . $passage_ligne;
        //==========
        $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
        $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
        //==========
        //=====Envoi de l'e-mail.
        mail($email, $sujet, $message, $header);
        //==========
    }
}


echo $response;
