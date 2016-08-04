//http://fullcalendar.io/docs/

$(document).ready(function () {
    // page is ready
    $('#calendar').fullCalendar({
        // enable theme
        theme: true,
        // emphasizes business hours
        businessHours: true,
        // header
        header: {
            left: 'prev,next today',
            center: 'title',
            right: '',
        },
        //Enlève le we
        weekends: false,
        //Vue semaine avec heures
        defaultView: 'agendaWeek',
        //heure début
        minTime: "08:00",
        maxTime: "20:00",
        //Journée slot
        allDaySlot: false,
        //Hauteur
        contentHeight: "auto",

        //Config des slots
        slotDuration: "00:15:00",
        slotLabelFormat: 'LT',
        slotLabelInterval: "01:00:00",

        events: [
            // http://fullcalendar.io/docs/event_data/Event_Object/
            {
                title: 'Aquagym',
                start: '2016-08-02T11:30:00',
                end: '2016-08-02T012:30:00',
                allDay: false // will make the time show
            }
        ]
    })
});