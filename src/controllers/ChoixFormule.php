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
$actResult = $bdd->fetch();
foreach ($filteredPost as $key => $value) {
    if (in_array($actArray, $key)) {
        array_push($choosenActArray, $key);
        array_push($valArray, $value);
    }
}

$finalActArray = implode(', ', $choosenActArray);
$finalValueArray = implode(', ', $valArray);
$queryString = 'UPDATE usertable SET ';
$i = 0;
while ($i < count($choosenActArray)) {
    $queryString .= '`' . $choosenActArray[$i] . '` = :' . $choosenActArray[$i];
    $i++;
}
$bdd2 = $sql->prepare($queryString);
//HERE I AM
while ($i < count($choosenActArray)) {
    $bdd2->bindParam($bdd2, $i);
    $i++;
}


