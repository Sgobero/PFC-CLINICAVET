(function(win,doc){
    'use strict';

  function getCalendar(perfil, div)
  {
      let calendarEl = doc.querySelector(div);
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
          if (perfil == 'manager') {
            win.location.href = '../../view/user/add.php?date=' + info.dateStr;
          } else {
            if(info.view.type == 'dayGridMonth') {
              calendar.changeView('timeGrid', info.dateStr);
            } else {
              win.location.href = '../../view/user/add.php?date=' + info.dateStr;
            }
          }
        },

          events: 'http://localhost/php/calendario2022/controller/ControllerEvents.php',

          eventClick: function(info) {
            if (perfil == 'manager') {
              win.location.href=`../../view/manager/editar.php?id=${info.event.id}`
            }
          },
          extraParams: function() {
            return {
              cachebuster: new Date().valueOf()
            };
          }
    });
    calendar.render();
  }

    if (doc.querySelector('.calendarUser')) {
      getCalendar('user', '.calendarUser');
    } else if (doc.querySelector('.calendarManager')) {
      getCalendar('manager', '.calendarManager');
    }

    if(doc.querySelector('#delete')) {
      let btn=doc.querySelector('#delete');

      btn.addEventListener('click', (event) => {
        event.preventDefault();

        if(confirm("Deseja mesmo apagar este dado?")) {
          win.location.href = event.target.parentNode.href;
        }

      },false);
    }

})(window,document);