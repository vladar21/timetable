
<div id='calendar' class="w-auto"></div>

<script src='../fullcalendar/main.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {

        var iv = localStorage.getItem("fcDefaultView") || 'timeGridWeek'
        var id = localStorage.getItem('fcDefaultDate') || new Date

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            // делаем так, чтобы при перезагрузке страницы мы оставались в том же виде, с той же датой
            // ------------------------------ //
            initialView: iv,
            initialDate: id,
            datesSet: function (dateInfo) {
                localStorage.setItem("fcDefaultView", dateInfo.view.type);
                localStorage.setItem("fcDefaultDate", dateInfo.startStr);
            },
            // ------------------------------ //
            //initialDate: '2021-01-18',
            //defaultDate: '2021-01-18',

            expandRows: true,
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

            eventClick: function(info) {
                var eventObj = info.event;
                var schedule_id = eventObj.extendedProps['schedule_id'];
                var patient_id = eventObj.extendedProps['patient_id'];

                $.ajax({
                    url: "../calendar/create",
                    data: 'schedule_id=' + schedule_id + '&patient_id=' + patient_id,
                    type: "POST",
                    success: function() {
                        //calendar.refetchEvents();

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