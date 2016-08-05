<?php

try {
    $sql = new PDO('mysql:host=localhost;port=3306;dbname=balneodb', 'root', 'MySQL');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$stmt = $sql->prepare('SELECT email, password FROM usertable WHERE email = :email');
$stmt->bindParam(':email', $email);
//$path = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING) . '/BalneoProject/index.php';
try {
    session_start();
    if ($stmt->execute()) {
        $result = $stmt->fetch();
        $test = password_verify($password, $result['password']);
        if ($test) {
            $_SESSION['user'] = $email;
            //header('Location: ' . $path);
            header('location: localhost:8080/BalneoProject/index.php');
//            die();
        }
    } else {

    }
} catch (PDOException $e) {
    print "La connexion a échoué!<br/>";
    die();
}