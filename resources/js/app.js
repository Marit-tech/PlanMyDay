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
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        weekends: false,
        locale: nlLocale,
        allDaySlot: false,
        height: 'calc(100vh - 135px)',
        slotMinTime: '09:00:00',
        slotMaxTime: '19:00:00',
        nowIndicator: true,
        dayHeaderFormat: {
            weekday: 'short',
            day: 'numeric'
        },
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