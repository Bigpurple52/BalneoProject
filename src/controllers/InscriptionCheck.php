

<?php
//Here connect to bdd
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
$stmt = $sql->prepare("INSERT INTO usertable (nom, prenom, password, email, adresse, ville, villenaissance, datenaissance, tel, codepostal) VALUES (:nom, :prenom, :password, :email, :adresse, :ville, :villenaissance, :datenaissance, :tel, :codepostal)");
//$stmt = $sql->prepare("INSERT INTO usertable (nom, prenom, password, email, adresse, ville, codepostal, villenaissance, datenaissance, tel) VALUES (:nom, :prenom, :password, :email, :adresse, :ville, :codepostal, :villenaissance, :datenaissance, :tel)");
$stmt->bindParam(':nom', $nom);
$nom = $filteredPost['nom'] ? $filteredPost['nom'] : ' ';
$stmt->bindParam(':prenom', $prenom);
$prenom = $filteredPost['prenom'] ? $filteredPost['prenom'] : ' ';
$stmt->bindParam(':password', $myHash);
$myHash = password_hash($filteredPost['password'], PASSWORD_DEFAULT);
$stmt->bindParam(':email', $email);
$email = $filteredPost['email'] ? $filteredPost['email'] : ' ';
$stmt->bindParam(':adresse', $adresse);
$adresse = $filteredPost['adresse'] ? $filteredPost['adresse'] : ' ';
$stmt->bindParam(':ville', $ville);
$ville = $filteredPost['ville'] ? $filteredPost['ville'] : ' ';
$stmt->bindParam(':villenaissance', $villenaissance);
$villenaissance = $filteredPost['villenaissance'] ? $filteredPost['villenaissance'] : ' ';
$stmt->bindParam(':datenaissance', $datenaissance);
$datenaissance = $filteredPost['datenaissance'] ? $filteredPost['datenaissance'] : ' ';
$stmt->bindParam(':tel', $tel);
$tel = $filteredPost['tel'] ? $filteredPost['tel'] : ' ';
$stmt->bindParam(':codepostal', $codepostal);
$codepostal = $filteredPost['codepostal'] ? $filteredPost['codepostal'] : ' ';
try {
    $stmt->execute();
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$var = 'test';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Page d'accueil du site : aqua-balneo.fr">
        <meta name="keywords" content="Activités aquatiques;Aquagym;Aquaphobie;Aquadynamic;Aquadouce;AquaBike;Aqua training;Jardin Aquatique;Stage de natation enfant">
        <title>aqua-balneo.fr : Activités aquatiques pour petits et grands</title>
        <link rel="icon" href="favicon.ico" />
    </head>
    <body>
        <?php
        ?>
    </body>
</html>

