$(document).ready(function () {
    $('#calendar').fullCalendar({
        theme: true,
        header: {left: 'prev,next today', center: 'title', right: ''},
        defaultView: 'agendaWeek',
        minTime: '08:00',
        maxTime: '20:00',
        allDaySlot: false,
        contentHeight: 'auto',
        slotDuration: '00:15:00',
        slotLabelFormat: 'LT',
        slotLabelInterval: '01:00:00',
        events: [
            {
                title: 'Aquagym',
                start: '2016-08-02T11:30:00',
                end: '2016-08-02T012:30:00',
                allDay: false
            }
        ]
    });
});