

<div id='calendar' class="w-auto"></div>

<script src='../fullcalendar/main.js'></script>

<script>
    var id = '2021-01-18';
    document.addEventListener('DOMContentLoaded', function() {

        var iv = localStorage.getItem("fcDefaultView") || 'dayGridMonth';
        id = (id) ? id : (localStorage.getItem('fcDefaultDate') || new Date);


        //var id = localStorage.getItem('fcDefaultDate') || new Date

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

            //displayEventTime: false,
            locale: 'uk',
            slotDuration: '00:15:00',
            slotMinTime: '08:00:00',
            slotMaxTime: '18:00:00',
            allDaySlot: false,
            expandRows: false,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,resourceTimelineWeek,resourceTimelineFourDays,listWeek'
            },
            views: {
                resourceTimelineFourDays: {
                    type: 'timeGridDay',
                    slotLabelInterval: '00:15:00',
                    displayEventTime: false,
                },
                resourceTimelineWeek: {
                    type: 'timeGridWeek',
                    slotLabelInterval: '00:15:00',
                    displayEventTime: false,
                }
            },


            //selectAllow: true,

            //initialDate: '2021-01-18',
            navLinks: true, // can click day/week names to navigate views
            nowIndicator: true,

            weekNumbers: true,
            weekNumberCalculation: 'ISO',

            editable: false,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: "../calendar/load",
            // eventContent: function(arg) {
            //     let italicEl = document.createElement('i')
            //
            //     if (arg.event.extendedProps.isUrgent) {
            //         italicEl.innerHTML = 'urgent event'
            //     } else {
            //         italicEl.innerHTML = 'normal event'
            //     }
            //
            //     let arrayOfDomNodes = [ italicEl ]
            //     return { domNodes: arrayOfDomNodes }
            // },

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

                        //location.reload();
                        //return false;

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