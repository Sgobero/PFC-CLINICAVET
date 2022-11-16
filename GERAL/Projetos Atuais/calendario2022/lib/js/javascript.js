(function(win,doc){
    'use strict';

    let calendarEl = doc.querySelector('.calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        headerToolbar:{
            start: 'prev,next,today',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        buttonText:{
            today:    'Hoje',
            month:    'Mês',
            week:     'Semana',
            day:      'Dia'
        },

        locale: 'pt-br',

        dateClick: function(info) {
            alert('Clicked on: ' + info.dateStr);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('Current view: ' + info.view.type);

            info.dayEl.style.backgroundColor = 'grey';
          },

          events: "/calendario2022/controller/ControllerEvents.php",

          eventClick: function(info) {
            win.location.href=`https://www.sitequalquer.com.br/evento/${info.event.id}`
          }
    });
    calendar.render();

})(window,document);