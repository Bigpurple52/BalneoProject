<?php
try{
    $monfichier = fopen('planning.js', 'r+');
    
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
        /*Faudra récupérer les données de la bd et les parser pour les écrire dans $planningEvent*/
    $planningEvent ="
            {
                title:'Aquagym',
                start:'2016-08-02T11:30:00',
                end: '2016-08-02T012:30:00',
                allDay: false
            }";
    $planningFin = "
        ]
    });";

    fwrite($monfichier, $planningDebut);
    fwrite($monfichier, $planningEvent);
    fwrite($monfichier, $planningFin);

    fclose($monfichier);

    header('Location: ../src/views/planning2.php');
}catch (Exception $e){
    printf("Une erreur est survenue pendant le chargement du planning");
}
?>