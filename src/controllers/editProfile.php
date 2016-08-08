<?php

function editUser()
{
    global $etatUpdate;
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
    try {
        $sql = new PDO('mysql:host=aquabalncxaquadb.mysql.db;dbname=aquabalncxaquadb', 'aquabalncxaquadb', '3Kp6aSDbgkK7');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $stmt = $sql->prepare('UPDATE usertable SET'
            . '`nom` = :nom,'
            . '`prenom` = :prenom,'
            . '`password` = :password,'
            . '`email` = :email,'
            . '`adresse`= :adresse,'
            . '`ville`= :ville,'
            . '`tel` = :tel,'
            . '`codepostal` = :codepostal'
            . ' WHERE email =  :user');
    $stmt->bindParam(':nom', $nom);
    $nom = !empty($filteredPost['nom']) ? $filteredPost['nom'] : ' ';
    $stmt->bindParam(':prenom', $prenom);
    $prenom = !empty($filteredPost['prenom']) ? $filteredPost['prenom'] : ' ';
    $stmt->bindParam(':password', $myHash);
    if ($filteredPost['password'] !== $_SESSION['password']) {
        $myHash = password_hash($filteredPost['password'], PASSWORD_DEFAULT);
    } else {
        $myHash = $_SESSION['password'];
    }
    $stmt->bindParam(':email', $email);
    $email = !empty($filteredPost['email']) ? $filteredPost['email'] : ' ';
    $stmt->bindParam(':adresse', $adresse);
    $adresse = !empty($filteredPost['adresse']) ? $filteredPost['adresse'] : ' ';
    $stmt->bindParam(':ville', $ville);
    $ville = !empty($filteredPost['ville']) ? $filteredPost['ville'] : ' ';
    $stmt->bindParam(':tel', $tel);
    $tel = !empty($filteredPost['tel']) ? $filteredPost['tel'] : ' ';
    $stmt->bindParam(':codepostal', $codepostal);
    $codepostal = !empty($filteredPost['codepostal']) ? $filteredPost['codepostal'] : ' ';
    $stmt->bindParam(':user', $_SESSION['user']);
    try {
        if ($stmt->execute()) {
            $etatUpdate = true;
        } else {
            $etatUpdate = false;
        }
    } catch (PDOException $e) {
        print "Erreur!: " . $e->getMessage() . "<br/>";
        die();
    }
}
