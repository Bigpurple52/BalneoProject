<?php
date_default_timezone_set("Europe/Paris"); 

try{
    $monfichier = fopen('requete.txt', 'r+');
    
    fseek($monfichier, 0);

    $requete="";
    $date = time();
    $test = new DateTime();
    $test = $test->format('Y-m-d\TH:i:s');
    $requete += $test;
    /*do {

    }while ($date['year'] != $date['year']+1);

    /*$planningEvent ="
            {
                title:'Aquadouce',
                start:'2016-08-22T10:30:00',
                end: '2016-08-22T11:15:00',
                allDay: false
            },{
                title:'Aquadouce',
                start:'2016-08-22T16:30:00',
                end: '2016-08-22T17:15:00',
                allDay: false
            },{
                title:'Aquadouce',
                start:'2016-08-23T11:00:00',
                end: '2016-08-23T11:45:00',
                allDay: false,
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-23T16:30:00',
                end: '2016-08-23T17:15:00',
                allDay: false
            },{
                title:'Aquadouce',
                start:'2016-08-24T11:00:00',
                end: '2016-08-24T11:45:00',
                allDay: false,
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-25T11:00:00',
                end: '2016-08-25T11:45:00',
                allDay: false,
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-25T16:30:00',
                end: '2016-08-25T17:15:00',
                allDay: false,
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-26T10:30:00',
                end: '2016-08-26T11:15:00',
                allDay: false
            },{
                title:'Aquadouce',
                start:'2016-08-26T16:30:00',
                end: '2016-08-26T17:15:00',
                allDay: false,
                available: false
            },{
                title:'Aquadouce',
                start:'2016-08-27T09:15:00',
                end: '2016-08-27T10:00:00',
                allDay: false,
                available: false
            }";*/
   
    fwrite($monfichier, $requete);
    fclose($monfichier);

    //header('Location: ../index.php');
}catch (Exception $e){
    printf("Une erreur est survenue pendant le chargement du planning");
}
?>