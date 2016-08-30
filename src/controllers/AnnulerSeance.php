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
$today = new DateTime('now');
$realToday = $today->format('Y-m-d H:i:s');
$start = new DateTIme($filteredPost['start']);
$startForRequest = $start->format('Y-m-d H:i:s');
$start->modify('-2 days');
$activite = mb_strtolower($filteredPost['event']);
$realStart = $start->format('Y-m-d H:i:s');
if ($realStart >= $realToday) {
    if ($activite === 'mixaquatraining') {
        $activite = 'aquatraining';
    }
    $email = $_SESSION['email'];
    $bdd = $sql->prepare('SELECT id FROM planning WHERE `title` = :activite AND `start` = :start');
    $bdd->bindParam(':activite', $activite);
    $bdd->bindParam(':start', $startForRequest);
    $bdd->execute();
    $result = $bdd->fetch();
    $idActivite = $result['id'];
    $stmt = $sql->prepare('SELECT id FROM usertable WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $tmpId = $stmt->fetch();
    $idUser = $tmpId['id'];
    $bdd2 = $sql->prepare('DELETE FROM activite WHERE `idactivite` = :activite AND `iduser` = :user');
    $bdd2->bindParam(':activite', $idActivite);
    $bdd2->bindParam(':user', $idUser);
    if ($bdd2->execute()) {
        $bdd3 = $sql->prepare('SELECT ' . $activite . ' FROM usertable WHERE email = :email');
        $bdd3->bindParam(':email', $email);
        $bdd3->execute();
        $result = $bdd3->fetch();
        $token = $result[$activite];
        (int) $newToken = (int) $token + 1;
        $bdd4 = $sql->prepare("UPDATE usertable SET `" . $activite . "` = :newToken WHERE `email` = :email");
        $bdd4->bindParam('newToken', $newToken);
        $bdd4->bindParam('email', $email);
        if ($bdd4->execute()) {
            $response = true;
        } else {
            $response = 0;
        }
    } else {
        $response = 2;
    }
} else {
    $response = 0;
}
echo $response;
