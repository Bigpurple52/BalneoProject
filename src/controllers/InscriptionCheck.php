

<?php

//Here connect to bdd
function insertUser()
{
    global $etatInscription;
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
    $stmt = $sql->prepare("INSERT INTO usertable (nom, prenom, password, email, adresse, ville, villenaissance, datenaissance, tel, codepostal) VALUES (:nom, :prenom, :password, :email, :adresse, :ville, :villenaissance, :datenaissance, :tel, :codepostal)");
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
    $tmpdatenaissance = !empty($filteredPost['datenaissance']) ? $filteredPost['datenaissance'] : ' ';
    $tmp2datenaissance = new DateTime($tmpdatenaissance);
    $datenaissance = $tmp2datenaissance->format('Y-m-d');
    $stmt->bindParam(':tel', $tel);
    $tel = !empty($filteredPost['tel']) ? $filteredPost['tel'] : ' ';
    $stmt->bindParam(':codepostal', $codepostal);
    $codepostal = !empty($filteredPost['codepostal']) ? $filteredPost['codepostal'] : ' ';
    try {
        if ($stmt->execute()) {
            $etatInscription = true;
            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
                $passage_ligne = "\r\n";
            } else {
                $passage_ligne = "\n";
            }
            //=====Déclaration des messages au format texte et au format HTML.
            $message_txt = "Bonjour " . $prenom . $nom . ", "
                    . $passage_ligne . "Vous venez de vous inscrire sur le site aqua-balneo.fr."
                    . $passage_ligne . "Ce mail est un récapitulatif de vos informations."
                    . $passage_ligne . $passage_ligne
                    . $passage_ligne . "Mon identifiant de connexion : " . $email
                    . $passage_ligne . "Mon mot de passe : " . $filteredPost['password']
                    . $passage_ligne . "Vous pouvez désomrais vous inscrire en ligne aux séances!"
                    . $passage_ligne . ">A bientot dans notre centre K-Hylé!";
            $message_html = "<html><head></head><body>"
                    . "<p>Bonjour " . $prenom . $nom . ",</p>"
                    . "<p>vous venez de vous inscrire sur le site <b>aqua-baleno.fr</b>.</p>"
                    . "<p>Ce mail est un récapitulatif de vos informations.</p>"
                    . "<br>"
                    . "<p>Mon identifiant de connexion : " . $email . "</p>"
                    . "<p>Mon mot de passe : " . $filteredPost['password'] . "</p>"
                    . "<p>Vous pouvez désomrais vous inscrire en ligne aux séances!</p>"
                    . "<br>"
                    . "<p>A bientot dans notre centre K-Hylé!"
                    . "</body></html>";
            //==========
            //=====Création de la boundary
            $boundary = " -----=" . md5(rand());
            //==========
            //=====Définition du sujet.
            $sujet = "Inscription au site www.aqua-balneo.fr";
            //=========
            //=====Création du header de l'e-mail.
            $header = "From: \"WeaponsB\"<maxime.2ssez@laposte.net>" . $passage_ligne;
            $header.= "Reply-to: \"WeaponsB\" <maxime.2ssez@laposte.net>" . $passage_ligne;
            $header.= "MIME-Version: 1.0" . $passage_ligne;
            $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
            //==========
            //=====Création du message.
            $message = $passage_ligne . "--" . $boundary . $passage_ligne;
            //=====Ajout du message au format texte.
            $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"" . $passage_ligne;
            $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
            $message.= $passage_ligne . $message_txt . $passage_ligne;
            //==========
            $message.= $passage_ligne . "--" . $boundary . $passage_ligne;
            //=====Ajout du message au format HTML
            $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
            $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
            $message.= $passage_ligne . $message_html . $passage_ligne;
            //==========
            $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
            $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
            //==========
            //=====Envoi de l'e-mail.
            mail($email, $sujet, $message, $header);
            //==========
        } else {
            $etatInscription = false;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
