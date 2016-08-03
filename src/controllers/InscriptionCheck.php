<?php

//Here connect to bdd
$filteredPost = [];
$postedValues = filter_input_array(INPUT_POST);
foreach ($postedValues as $key => $value) {
    if (is_array($value)) {
        $filteredPost[$key] = filter_input_array(INPUT_POST, $key);
    } else {
        $filteredPost[$key] = filter_input(INPUT_POST, $key);
    }
}

$myQuery = "INSERT INTO usertable (`nom`, `prenom`, `password`,`email`,`adresse`,`ville`,`codepostal`, `villenaissance`, `datenaissance`, `tel`) VALUES('. $sql->quote() .')";
