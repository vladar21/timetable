<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <link type="image/png" rel="icon" href="img/favicon.png" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Load Font Awesome Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

<!--    --><?php //echo $styles; ?>
<!--    <script type="text/javascript" src="js/app.js"></script>-->

    <!--        <script type="text/javascript" src="js/ga.js"></script>-->


<!--    --><?php //echo $scripts; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Clinic's schedule</title>

</head>
<body class="font-sans text-2xl bg-white items-center flex flex-col m-0">
    <div class="container">
        <?php echo $header;?>

        <?php echo $content;?>

        <?php echo $footer;?>
    </div>
</body>
</html>