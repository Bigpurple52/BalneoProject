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
                                        if(response[0] === '1'){
                                            bootbox.confirm('Si vous validez votre inscription, votre compte sera débité de 1 crédit', function (response) {
                                                if (response) {
                                                    $.ajax({
                                                        url: '../../src/controllers/DebitJeton.php',
                                                        type: 'POST',
                                                        data: {
                                                            event: eventTitle,
                                                            start: startTime._i,
                                                            end: endTime._i,
                                                            response: response
                                                        },
                                                        success: function(response){
                                                            if(response === '1'){
                                                                bootbox.alert('Inscription réussie. Vous allez recevoir un mail de confirmation à cette adresse : " . htmlentities($_SESSION['user']) . " . Rendez-vous dans la page \'Mon Profil\' pour voir toutes les séances auxquelles vous êtes inscrit.');
                                                            } else if(response === '0'){
                                                                bootbox.alert('Vous êtes déjà inscrit à cette séance. Votre compte n\'a pas été débité.');
                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        }else if(response === 'jetons'){
                                            bootbox.alert('Vous devez posséder des crédits pour vous inscrire à cette séance!');
                                        }else if(response === 'anterieur'){
                                            bootbox.alert('Vous ne pouvez pas vous inscrire à une séance dont la date est déjà passée!');
                                        }
                                    }
                                }),
                            $(this).css('border', 'black 2px solid');
                            },";
    } else {
        $eventVar = "eventClick: function() { bootbox.alert('Vous devez être connecté et posséder des crédits pour pouvoir vous inscrire aux séances en ligne!')},";
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
        if ($data['available']) {
            $planningEvent .= 'className : \'' . $data['title'] . '\'},';
        } else {
            $planningEvent .= 'className : \'noClick\'},';
        }
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