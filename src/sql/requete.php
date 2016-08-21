<?php
date_default_timezone_set("Europe/Paris"); 

try {
    $sql = new PDO('mysql:host=localhost;dbname=balneo', 'root', '');
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
    $tableau = [
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-22T10:30:00',
        'end' => '2016-08-22T11:15:00',
        'available' => 1
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-22T16:30:00',
        'end' => '2016-08-22T17:15:00',
        'available' => 1
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-23T11:00:00',
        'end' => '2016-08-23T11:45:00',
        'available' => 0
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-23T16:30:00',
        'end' => '2016-08-23T17:15:00',
        'available' => 1
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-24T11:00:00',
        'end' => '2016-08-24T11:45:00',
        'available' => 0
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-25T11:00:00',
        'end' => '2016-08-25T11:45:00',
        'available' => 0
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-25T16:30:00',
        'end' => '2016-08-25T17:15:00',
        'available' => 0
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-26T10:30:00',
        'end' => '2016-08-26T11:15:00',
        'available' => 1
    ],
    [
        'title' => 'Aquadouce',
        'start' => '2016-08-26T16:30:00',
        'end' => '2016-08-26T17:15:00',
        'available' => 0
    ],
    [
        'title'=>'Aquadouce',
        'start'=>'2016-08-27T09:15:00',
        'end'=> '2016-08-27T10:00:00',
        'available'=> 0
    ]
];



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
                    echo ' '.$value.'<br>';
                }
                $finalKey .= $separateur . '`' . $key . '`';
                $finalValue .= $separateur . $sql->quote($value);
                $separateur = ', ';
            }
            $requete = 'INSERT INTO Planning ('.$finalKey.') VALUES ('.$finalValue.');';
            $sql->query($requete);
            $requete .= "\n";
            fwrite($monfichier, $requete);
        }
        $i++;
       
        $date = $date->modify('+1 week');
        $currentYear = clone $date;
    };

    /*$planningEvent ="
            {
                title:'Aquadouce',
                start:'2016-08-22T10:30:00',
                end: '2016-08-22T11:15:00'
            },{
                title:'Aquadouce',
                start:'2016-08-22T16:30:00',
                end: '2016-08-22T17:15:00'
            },{
                title:'Aquadouce',
                start:'2016-08-23T11:00:00',
                end: '2016-08-23T11:45:00'
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-23T16:30:00',
                end: '2016-08-23T17:15:00'
            },{
                title:'Aquadouce',
                start:'2016-08-24T11:00:00',
                end: '2016-08-24T11:45:00'
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-25T11:00:00',
                end: '2016-08-25T11:45:00'
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-25T16:30:00',
                end: '2016-08-25T17:15:00'
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-26T10:30:00',
                end: '2016-08-26T11:15:00'
            },{
                title:'Aquadouce',
                start:'2016-08-26T16:30:00',
                end: '2016-08-26T17:15:00'
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-27T09:15:00',
                end: '2016-08-27T10:00:00'
                available: false
            }";*/
   
    fwrite($monfichier, $requete);
    fclose($monfichier);

    header('Location: ../../index.php');
}catch (Exception $e){
    printf("Une erreur est survenue pendant le chargement du planning");
}