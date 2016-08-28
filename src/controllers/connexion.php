<?php

session_start();
try {
    $sql = new PDO('mysql:host=aquabalncxaquadb.mysql.db;dbname=aquabalncxaquadb', 'aquabalncxaquadb', '3Kp6aSDbgkK7');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$stmt = $sql->prepare('SELECT * FROM usertable WHERE email = :email');
$stmt->bindParam(':email', $email);
try {
    if ($stmt->execute()) {
        $result = $stmt->fetch();
        $test = password_verify($password, $result['password']);
        if ($test) {
            $_SESSION['user'] = $email;
            $_SESSION['nom'] = $result['nom'];
            $_SESSION['prenom'] = $result['prenom'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['adresse'] = $result['adresse'];
            $_SESSION['ville'] = $result['ville'];
            $_SESSION['codepostal'] = $result['codepostal'];
            $_SESSION['tel'] = $result['tel'];

            header('Content-Type: text/html; charset=utf-8');
            header('Location: ../../index.php');
            die();
        }
    }
} catch (Exception $e) {
    print "La connexion a échoué!<br/>";
    die();
}
header('Content-Type: text/html; charset=utf-8');
header('Location: ../../index.php');
die();
