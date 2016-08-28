<?php

session_start();
try {
    $sql = new PDO('mysql:host=aquabalncxaquadb.mysql.db;dbname=aquabalncxaquadb', 'aquabalncxaquadb', '3Kp6aSDbgkK7');
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
if (!empty($filteredPost['start'])) {
    $start = new DateTime($filteredPost['start']);
}
if (!empty($filteredPost['end'])) {
    $end = new DateTime($filteredPost['end']);
}
if (!empty($filteredPost['event'])) {
    $title = $filteredPost['event'];
}
$email = $_SESSION['user'];
$stmt = $sql->prepare("SELECT * FROM usertable WHERE email = :email");
$stmt->bindParam(':email', $email);
try {
    $stmt->execute();
    $title = mb_strtolower($title);
    if ($title === 'mixaquatraining') {
        $title = 'aquatraining';
    }
    while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ((int) $data[$title] > 0) {
            $response = true;
            $userId = $data['id'];
        } else {
            $response = 'jetons';
        }
    }
} catch (PDOException $e) {
    echo "Erreur !: " . $e->getMessage() . "<br/>";
}

$today = new DateTime('now');
if ($today->format('Y-m-d') > $start->format('Y-m-d')) {
    $response = 'anterieur';
}

echo $response;

