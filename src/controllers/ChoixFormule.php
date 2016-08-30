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

$actArray = ['aquadouce', 'aquadynamic', 'aquabike', 'aquaphobie', 'aquatraining', 'jardinaquatique', 'stagenatation', 'particulier'];
$valArray = [];
$choosenActArray = [];
$email = $_SESSION['user'];
$bdd = $sql->prepare('SELECT * FROM usertable WHERE email = :email');
$bdd->bindParam('email', $email);
$bdd->execute();
$oldToken = [];
$actResult = $bdd->fetch(PDO::FETCH_ASSOC);
foreach ($filteredPost as $key => $value) {
    if (in_array($key, $actArray)) {
        array_push($choosenActArray, $key);
        $valArray[$key] = $value;
        $oldToken[$key] = $actResult[$key];
    }
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

header('Location: ../../index.php?bootbox=' . $gg);
