var desk;

(new (function Desk(){
    var _this = desk = this;

    this.init = function() {

        var id = '2021-02-01';

        var iv = localStorage.getItem("fcDefaultView") || 'resourceTimelineWeek';
        id = (id) ? id : (localStorage.getItem('fcDefaultDate') || new Date);

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            // делаем так, чтобы при перезагрузке страницы мы оставались в том же виде, с той же датой
            // ------------------------------ //
            initialView: iv,
            initialDate: id,
            weekends: false,

            datesSet: function (dateInfo) {
                localStorage.setItem("fcDefaultView", dateInfo.view.type);
                localStorage.setItem("fcDefaultDate", dateInfo.startStr);
            },
            // ------------------------------ //

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

            navLinks: true, // can click day/week names to navigate views
            nowIndicator: true,

            weekNumbers: true,
            weekNumberCalculation: 'ISO',

            editable: false,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: "../calendar/load",

            eventClick: function (info) {
                var eventObj = info.event;
                var schedule_id = eventObj.extendedProps['schedule_id'];
                var patient_id = eventObj.extendedProps['patient_id'];

                $.ajax({
                    url: "../calendar/create",
                    data: 'schedule_id=' + schedule_id + '&patient_id=' + patient_id,
                    type: "POST",
                    success: function (data) {
                        calendar.refetchEvents();
                        $("#messagesID").html(data);

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

        // // remove messages in top page by click for one
        // $("#messagesID").click(function () {
        //     $("#messagesID").find('div:first').remove();
        // });
        // // remove messages in top page by click for one
        // $("#messagesMainID").click(function () {
        //     $("#messagesMainID").find('div:first').remove();
        // });

    }
}) ());
