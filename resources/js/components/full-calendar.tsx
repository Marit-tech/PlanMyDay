import FullCalendar from "@fullcalendar/react";
import themePlugin from "@fullcalendar/react/themes/monarch"; // YOUR THEME
import dayGridPlugin from "@fullcalendar/react/daygrid";
import timeGridPlugin from "@fullcalendar/react/timegrid";

// stylesheets
import '@fullcalendar/react/skeleton.css'; // ALWAYS NEED SKELETON
import '@fullcalendar/react/themes/monarch/theme.css'; // YOUR THEME
import '@fullcalendar/react/themes/monarch/palettes/purple.css'; // YOUR THEME'S PALETTE

export default function Calendar() {
    return (
        <FullCalendar
        plugins={[
            themePlugin, 
            dayGridPlugin, 
            timeGridPlugin
        ]}
        initialView="timeGridWeek"
        events={[
            { title: "event 1", date: "2026-10-01" },
            { title: "event 2", date: "2026-10-02" },
        ]}
        />
    );
}