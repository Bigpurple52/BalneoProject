<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

try {
    $sql = new PDO('mysql:host=localhost;port=3306;dbname=balneodb', 'root', 'MySQL');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$stmt->bindParam(':email', $email);
$stmt = $sql->prepare('SELECT email, password FROM usertable WHERE email = :email');
try {
    if ($stmt->execute()) {
        $result = $stmt->fetch();
        if (password_verify($password, $result['password'])) {
            session_start();
            $_SESSION['user'] = $email;
            $_SESSION['isConnected'] = true;
            header('Location: ' . filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_STRING));
            die;
        }
    } else {

    }
} catch (PDOException $e) {
    print "La connexion a échoué!<br/>";
    die();
}