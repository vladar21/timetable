
<div id='calendar' class="w-auto"></div>

<script src='../fullcalendar/main.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            expandRows: true,
            allDay: false,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            locale: 'uk',
            slotDuration: '00:15:00',
            slotMinTime: '08:00:00',
            slotMaxTime: '18:00:00',


            //selectAllow: true,

            initialDate: '2021-01-18',
            navLinks: true, // can click day/week names to navigate views
            nowIndicator: true,

            weekNumbers: true,
            weekNumberCalculation: 'ISO',

            editable: true,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: "../calendar/load",

            select: function (info) {
                alert('selected ' + info.startStr + ' to ' + info.endStr);
                // var title = prompt('Event Title:');
                //
                // if (title) {
                //
                //
                //     $.ajax({
                //         url: "calendar/create",
                //         data: 'title=' + title ,
                //         type: "POST",
                //         success: function(msg) {
                //             var events = msg.events;
                //             callback(events);
                //         }
                //     });
                //     calendar.addEvent({
                //         title: title
                //     });
                // }
                // calendar.unselect()
            },
            eventClick: function(info) {
                var eventObj = info.event;
                var schedule_id = eventObj.extendedProps['schedule_id'];
                var patient_id = eventObj.extendedProps['patient_id'];

                $.ajax({
                    url: "../calendar/create",
                    data: 'schedule_id=' + schedule_id + '&patient_id=' + patient_id,
                    type: "POST",
                    success: function() {
                        calendar.refetchEvents();

                        location.reload();
                        return false;

                    }
                });



            },
            //dateClick: function(info) {
            //     alert('clicked ' + info.dateStr);
            // },
        });



        calendar.render();
    });

</script>