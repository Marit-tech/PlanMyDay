import { Calendar } from 'fullcalendar';
import dayGridPlugin from 'fullcalendar/daygrid';
import timeGridPlugin from 'fullcalendar/timegrid';
import nlLocale from 'fullcalendar/locales/nl';
import themePlugin from 'fullcalendar/themes/forma';

import 'fullcalendar/skeleton.css';
import 'fullcalendar/themes/forma/theme.css';
import 'fullcalendar/themes/forma/palettes/blue.css';

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    if (!calendarEl){
        return;
    }

    const events = JSON.parse(calendarEl.dataset.events);

    const calendar = new Calendar(calendarEl, {
        plugins: [
            themePlugin,
            dayGridPlugin,
            timeGridPlugin
        ],
        initialView: 'timeGridWeek',
        weekends: false,
        locale: nlLocale,
        slotHeaderFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        },
        events: events
    });

    calendar.render();
});