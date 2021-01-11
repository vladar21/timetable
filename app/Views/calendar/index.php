<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />

    <link href='../fullcalendar/main.css' rel='stylesheet' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src='../fullcalendar/main.js'></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                locale: 'uk',
                slotDuration: '00:15:00',
                slotMinTime: '08:00:00',
                slotMaxTime: '18:00:00',
                expandRows: true,

                initialDate: '2021-01-18',
                navLinks: true, // can click day/week names to navigate views
                nowIndicator: true,

                weekNumbers: true,
                weekNumberCalculation: 'ISO',

                editable: true,
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: "calendar/load",

                selectable: true,
                selectHelper: true,
                select: function () {
                    var title = prompt('Event Title:');

                    if (title) {


                        $.ajax({
                            url: "calendar/create",
                            data: 'title=' + title ,
                            type: "POST",
                            success: function(msg) {
                                var events = msg.events;
                                callback(events);
                            }
                        });
                        calendar.addEvent({
                            title: title
                        });
                    }
                    calendar.unselect()
                },

            });

            calendar.render();
        });

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

    </style>
</head>
<body>

<div id='calendar'></div>

</body>
</html>
