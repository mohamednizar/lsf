$(document).ready(function() {
    
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar = $('#calendar').fullCalendar({
        buttonText: {
            prev: '<i class="fa fa-chevron-left"></i>',
            next: '<i class="fa fa-chevron-right"></i>'
        },
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true // make the event "stick"
                        );
            }
            calendar.fullCalendar('unselect');
        },
        editable: true,
        events: [
            {
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: '#7cc513',
                borderColor:'#7cc513'
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: '#00bfdd',
                borderColor:'#00bfdd'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d - 3, 16, 0),
                allDay: false
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d + 4, 16, 0),
                allDay: false,
                backgroundColor: '#cfcfcf',
                borderColor:'#cfcfcf'
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: '#1cbbb4',
                borderColor:'#1cbbb4'
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                 backgroundColor: '#ffab00',
                borderColor:'#ffab00'
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/'
            }
        ]
    });

    
    $(".fc-button-prev").removeClass('fc-button fc-state-default fc-corner-left');
    $(".fc-button-prev").addClass('btn-cal-rounded');
    
    $(".fc-button-next").removeClass('fc-button fc-state-default fc-corner-left');
    $(".fc-button-next").addClass('btn-cal-rounded');

    
});