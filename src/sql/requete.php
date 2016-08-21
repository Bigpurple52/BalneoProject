<?php
date_default_timezone_set("Europe/Paris"); 

try {
    $sql = new PDO('mysql:host=aquabalncxaquadb.mysql.db;dbname=aquabalncxaquadb', 'aquabalncxaquadb', '3Kp6aSDbgkK7');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

try{
    $monfichier = fopen('requete.txt', 'w+');
    
    fseek($monfichier, 0);

    $requete="";
    $date = new DateTime();
    $nextYear = new DateTime();
    $nextYear->modify('+1 year');
    $currentYear = clone $date;
    require_once "../models/ArrayOfData.php";

    $i = 0;
    while ($currentYear->format('Y') != $nextYear->format('Y')) {  
        foreach ($tableau as $t){
            $separateur = "";
            $finalKey = "";
            $finalValue = "";
            foreach ($t as $key => $value) {
                if($key === 'start' || $key === 'end'){
                    $value = new DateTime($value);
                    $value->modify('+'.$i.' week');
                    $value = $value->format('Y-m-d\TH:i:s');
                }
                $finalKey .= $separateur . '`' . $key . '`';
                $finalValue .= $separateur . $sql->quote($value);
                $separateur = ', ';
            }
            $requete = 'INSERT INTO planning ('.$finalKey.') VALUES ('.$finalValue.');';
            $sql->query($requete);
            $requete .= "\n";
            fwrite($monfichier, $requete);
        }
        $i++;
       
        $date = $date->modify('+1 week');
        $currentYear = clone $date;
    };
   
    fwrite($monfichier, $requete);
    fclose($monfichier);

    header('Location: ../../index.php');
}catch (Exception $e){
    printf("Une erreur est survenue pendant le chargement du planning");
}