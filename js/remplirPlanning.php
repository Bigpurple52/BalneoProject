<?php

session_start();
try {
    $sql = new PDO('mysql:host=localhost;dbname=balneodb', 'root', 'MySQL');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

try {
    $monfichier = fopen('planning.js', 'w+');

    fseek($monfichier, 0);
    if (!empty($_SESSION['user'])) {
        $eventVar = "eventClick: function(calEvent) {
                            var eventTitle = calEvent.title;
                            var startTime = calEvent.start;
                            var endTime = calEvent.end;
                                $.ajax({
                                    url: '../../src/controllers/PlanningController.php',
                                    type: 'POST',
                                    data: {
                                        event: eventTitle,
                                        start: startTime._i,
                                        end: endTime._i
                                    },
                                    success: function(response){
                                        if(response === true){
                                            alert(response);
                                        }else if(response === 'jetons'){
                                            alert('Vous devez posséder des jetons pour vous inscrire aux séances en ligne!');
                                        }
                                    }
                                }),
                            $(this).css('border', 'black 2px solid');
                            },";
    } else {
        $eventVar = "eventClick: function() { window.alert('Vous devez être connecté pour pouvoir vous inscrire aux séances en ligne!')},";
    }


    $planningDebut = "$(document).ready(function(){
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
        slotLabelInterval: '01:00:00', "
            . $eventVar .
            "events:[";
    $planningEvent = "";
    $query = $sql->prepare('SELECT * FROM planning;');
    $query->execute();
    while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
        $startSep = "{";
        foreach ($data as $key => $value) {
            if ($key == 'title' || $key == 'start' || $key == 'end') {
                $planningEvent .= $startSep . $key . ': "' . $value . '"' . ',';
                $startSep = "";
            }
        }
        $planningEvent .= 'className : \'' . $data['title'] . '\'},';
    }
    $planningFin = "
        ]
    });
});";


    fwrite($monfichier, $planningDebut);
    fwrite($monfichier, $planningEvent);
    fwrite($monfichier, $planningFin);

    fclose($monfichier);

    header('Location: ../src/views/planning2.php');
} catch (Exception $e) {
    printf("Une erreur est survenue pendant le chargement du planning");
}