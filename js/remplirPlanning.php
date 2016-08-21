<?php

try {
    $sql = new PDO('mysql:host=localhost;dbname=balneo', 'root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

try{
    $monfichier = fopen('planning.js', 'w+');
    
    fseek($monfichier, 0);

    $planningDebut ="$(document).ready(function(){
    $('#calendar').fullCalendar({
        theme:true,
        header:{left:'prev,next today',center:'title',right:''},
        defaultView:'agendaWeek',
        minTime: '08:00',
        maxTime:'20:00',
        allDaySlot:false,
        contentHeight:'auto',
        slotDuration:'00:15:00',
        slotLabelFormat:'LT',
        slotLabelInterval: '01:00:00',
        events:[";
        $planningEvent="";
        $query= $sql->prepare('SELECT * FROM planning;');
        $query->execute();
        while($data = $query->fetch(PDO::FETCH_ASSOC)){
            $startSep = "{";
            foreach ($data as $key => $value) {
                if($key == 'title' || $key == 'start' || $key == 'end'){
                    $planningEvent .= $startSep . $key . ': "' . $value . '"' . ',';
                    $startSep = "";
                }
            }
            $planningEvent .= 'className : \'' . $data['title'].'\'},';
        }
   /* $planningEvent ="
            {
                title:\"Aquagym\",
                start:\"2016-08-15T11:30:00\",
                end: \"2016-08-15T012:30:00\",
            },
            {
                title:\"Aquagym\",
                start:\"2016-08-16T11:30:00\",
                end: \"2016-08-16T012:30:00\",
            },";*/
            
    $planningFin = "
        ]
    });
});";

    fwrite($monfichier, $planningDebut);
    fwrite($monfichier, $planningEvent);
    fwrite($monfichier, $planningFin);

    fclose($monfichier);

    header('Location: ../src/views/planning2.php');
}catch (Exception $e){
    printf("Une erreur est survenue pendant le chargement du planning");
}