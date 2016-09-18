<?php

session_start();
try {
    $sql = new PDO('mysql:host=aquabalncxaquadb.mysql.db;dbname=aquabalncxaquadb', 'aquabalncxaquadb', '3Kp6aSDbgkK7');
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

$actArray = ['aquadouce', 'aquadynamic', 'aquabike', 'aquaphobie', 'aquatraining', 'jardinaquatique', 'stagenatation', 'particulier'];
$valArray = [];
$choosenActArray = [];
$email = $_SESSION['user'];
$bdd = $sql->prepare('SELECT * FROM usertable WHERE email = :email');
$bdd->bindParam('email', $email);
$bdd->execute();
$oldToken = [];
$actResult = $bdd->fetch(PDO::FETCH_ASSOC);
$tokenForMail = '';
foreach ($filteredPost as $key => $value) {
    if (in_array($key, $actArray)) {
        array_push($choosenActArray, $key);
        $valArray[$key] = $value;
        $oldToken[$key] = $actResult[$key];
        $tokenForMail .= $value . ', ';
    }
}
if (is_array($choosenActArray)) {
    $stringForMail = implode(', ', $choosenActArray);
} elseif (is_string($choosenActArray)) {
    $stringForMail = $choosenActArray;
}

$finalActArray = implode(', ', $choosenActArray);
$queryString = 'UPDATE usertable SET ';
$i = 0;
$sep = ', ';
while ($i < count($choosenActArray)) {
    if ($i === count($choosenActArray) - 1) {
        $sep = '';
    }
    $queryString .= '`' . $choosenActArray[$i] . '` = :' . $choosenActArray[$i] . $sep;
    $i++;
}
$queryString .= ' WHERE email = :email';
$bdd2 = $sql->prepare($queryString);
//HERE I AM
$j = 0;
$newValue = [];
while ($j < count($choosenActArray)) {
    $newValue[$j] = $oldToken[$choosenActArray[$j]] + $valArray[$choosenActArray[$j]];
    $bdd2->bindParam(':' . $choosenActArray[$j], $newValue[$j]);
    $j++;
}
$bdd2->bindParam('email', $email);
if ($bdd2->execute()) {
    $gg = true;
} else {
    $gg = false;
}
if ($gg) {
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Madame, Monsieur,"
            . $passage_ligne . "Nous avons bien reçut votre fiche d’inscription et avons le plaisir de vous informer sa validation* "
            . $passage_ligne . "Vos coachs Noémie ou Damien vous attendent donc pour votre première séance !"
            . $passage_ligne . "*sous réserve du nombre de personne minimum inscrit"
            . $passage_ligne . $passage_ligne
            . $passage_ligne . "RDV AU CENTRE BALNEO K-HYLE"
            . $passage_ligne . "100 impasse des Fabricants 34820 Teyran"
            . $passage_ligne . $passage_ligne
            . $passage_ligne . "Le règlement s'effectue lors de votre première séance"
            . $passage_ligne . "(Attention les cartes bancaires ne sont pas acceptées)"
            . $passage_ligne . $passage_ligne
            . $passage_ligne . "Toute inscription non décommandée moins de 48H à l’avance sera due."
            . $passage_ligne . "Toute activité commencée est due, il ne sera effectué aucun remboursement."
            . $passage_ligne . $passage_ligne
            . $passage_ligne . "Il est vivement recommandé de vous inscrire sur notre page Facebook pour vous tenir au courant de l’actualité et des offres du moment:"
            . $passage_ligne . "www.facebook.com/Aquagym.Natation.Teyran/"
            . $passage_ligne . $passage_ligne
            . $passage_ligne . $passage_ligne
            . $passage_ligne . "En vous remerciant de votre intérêt et à très bientôt"
            . $passage_ligne . "Cordialement,"
            . $passage_ligne . $passage_ligne
            . $passage_ligne . "Noémie Joulie,"
            . $passage_ligne . "+33 783 552 013,"
            . $passage_ligne . "www.aqua-balneo.fr,"
            . $passage_ligne . "www.facebook.com/Aquagym.Natation.Teyran";
    $message_html = "<html><head></head><body>"
            . "<p>Madame, Monsieur,</p>"
            . "<p>Nous avons bien reçut votre fiche d’inscription et avons le plaisir de vous informer sa validation* </p>"
            . "<p>Vos coachs Noémie ou Damien vous attendent donc pour votre première séance !</p>"
            . "<p>*sous réserve du nombre de personne minimum inscrit</p>"
            . "<br>"
            . "<p>RDV AU CENTRE BALNEO K-HYLE</p>"
            . "<p>100 impasse des Fabricants 34820 Teyran</p>"
            . "<br>"
            . "<p>Le règlement s'effectue lors de votre première séance</p>"
            . "<p>(Attention les cartes bancaires ne sont pas acceptées)</p>"
            . "<br>"
            . "<p>Toute inscription non décommandée moins de 48H à l’avance sera due.</p>"
            . "<p>Toute activité commencée est due, il ne sera effectué aucun remboursement.</p>"
            . "<br>"
            . "<p>Il est vivement recommandé de vous inscrire sur notre page Facebook pour vous tenir au courant de l’actualité et des offres du moment:</p>"
            . "<a href='www.facebook.com/Aquagym.Natation.Teyran/' rel='facebook'>www.facebook.com/Aquagym.Natation.Teyran/</a>"
            . "<br>"
            . "<br>"
            . "<p>En vous remerciant de votre intérêt et à très bientôt</p>"
            . "<p>Cordialement,</p>"
            . "<br>"
            . "<p>Noémie Joulie,</p>"
            . "<p>+33 783 552 013,</p>"
            . "<a href='www.aqua-balneo.fr' rel='aqua balneo'>www.aqua-balneo.fr</a>"
            . "<a href='www.facebook.com/Aquagym.Natation.Teyran' rel='facebook>www.facebook.com/Aquagym.Natation.Teyran</a>"
            . "</body></html>";
    //==========
    //=====Création de la boundary
    $boundary = " -----=" . md5(rand());
    //==========
    //=====Définition du sujet.
    $sujet = "Inscription au site www.aqua-balneo.fr";
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



    $dateNow = new DateTime('now');
    $dateToSend = $dateNow->format('d-m-Y');
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt2 = "Confirmation d'inscription à une formule."
            . $passage_ligne . "L'utilisateur " . $_SESSION['nom'] . "  " . $_SESSION['prenom']
            . $passage_ligne . "A choisi " . $stringForMail . " avec ce nombre de jeton respectivement " . $tokenForMail
            . $passage_ligne . "Au jour du:" . $dateToSend;
    $message_html2 = "<html><head></head><body>"
            . "<pConfirmation d'inscription à une formule.</p>"
            . "<p>L'utilisateur " . $_SESSION['nom'] . "  " . $_SESSION['prenom'] . "</p>"
            . "<p>A choisi " . $stringForMail . " avec ce nombre de jeton respectivement " . $tokenForMail . "</p>"
            . "<p>Au jour du:" . $dateToSend . "</p>"
            . "</body></html>";
    //==========
    //=====Création de la boundary
    $boundary = " -----=" . md5(rand());
    //==========
    //=====Définition du sujet.
    $subject = "Inscription aux formules";
    //=========
    //=====Création du header de l'e-mail.
    $header2 = "From: \"K-Hyle\"<k-hyle@aqua-balneo.fr>" . $passage_ligne;
    $header2.= "Reply-to: \"K-Hyle\" <k-hyle@aqua-balneo.fr>" . $passage_ligne;
    $header2.= "MIME-Version: 1.0" . $passage_ligne;
    $header2.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
    //==========
    //=====Création du message.
    $message2 = $passage_ligne . "--" . $boundary . $passage_ligne;
    //=====Ajout du message au format texte.
    $message2.= "Content-Type: text/plain; charset=\"utf-8\"" . $passage_ligne;
    $message2.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message2.= $passage_ligne . $message_txt2 . $passage_ligne;
    //==========
    $message2.= $passage_ligne . "--" . $boundary . $passage_ligne;
    //=====Ajout du message au format HTML
    $message2.= "Content-Type: text/html; charset=\"utf-8\"" . $passage_ligne;
    $message2.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message2.= $passage_ligne . $message_html2 . $passage_ligne;
    //==========
    $message2.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
    $message2.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
    //==========
    //=====Envoi de l'e-mail.
    mail('noem00@hotmail.fr', $subject, $message2, $header2);
    //==========
}

header('Location: ../../index.php?bootbox=' . $gg);
