<?php

function editUser()
{
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
        $sql = new PDO('mysql:host=localhost;port=3306;dbname=balneodb', 'root', 'MySQL');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    $stmt = $sql->prepare('UPDATE usertable SET'
            . '`nom` =N :nom,'
            . '`prenom` =N :prenom,'
            . '`password` =N :password,'
            . '`email` =N :email,'
            . '`adresse`=N :adresse,'
            . '`ville`=N :ville,'
            . '`villenaissance` =N :villenaissance,'
            . '`datenaissance` =N :datenaissance,'
            . '`tel` =N :tel,'
            . '`codepostal` =N :codepostal'
            . ' WHERE email =N  :user');
    $stmt->bindParam(':nom', $nom);
    $nom = !empty($filteredPost['nom']) ? $filteredPost['nom'] : ' ';
    $stmt->bindParam(':prenom', $prenom);
    $prenom = !empty($filteredPost['prenom']) ? $filteredPost['prenom'] : ' ';
    $stmt->bindParam(':password', $myHash);
    $myHash = password_hash($filteredPost['password'], PASSWORD_DEFAULT);
    $stmt->bindParam(':email', $email);
    $email = !empty($filteredPost['email']) ? $filteredPost['email'] : ' ';
    $stmt->bindParam(':adresse', $adresse);
    $adresse = !empty($filteredPost['adresse']) ? $filteredPost['adresse'] : ' ';
    $stmt->bindParam(':ville', $ville);
    $ville = !empty($filteredPost['ville']) ? $filteredPost['ville'] : ' ';
    $stmt->bindParam(':villenaissance', $villenaissance);
    $villenaissance = !empty($filteredPost['villenaissance']) ? $filteredPost['villenaissance'] : ' ';
    $stmt->bindParam(':datenaissance', $datenaissance);
    $datenaissance = !empty($filteredPost['datenaissance']) ? $filteredPost['datenaissance'] : ' ';
    $stmt->bindParam(':tel', $tel);
    $tel = !empty($filteredPost['tel']) ? $filteredPost['tel'] : ' ';
    $stmt->bindParam(':codepostal', $codepostal);
    $codepostal = !empty($filteredPost['codepostal']) ? $filteredPost['codepostal'] : ' ';
    $stmt->bindParam(':user', $_SESSION['user']);
    try {
        if ($stmt->execute()) {
            $etatInscription = true;
        } else {
            $etatInscription = false;
        }
    } catch (PDOException $e) {
        print "Erreur!: " . $e->getMessage() . "<br/>";
        die();
    }
}
