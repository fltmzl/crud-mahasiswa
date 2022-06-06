document.addEventListener("DOMContentLoaded", () => {
  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    events: [
      {
        // this object will be "parsed" into an Event Object
        title: "The Title", // a property!
        start: "2022-06-01", // a property!
        end: "2022-06-02", // a property! ** see important note below about 'end' **
      },
    ],
  });

  calendar.render();

  calendar.on("dateClick", function (info) {
    console.log("clicked on ");
    console.log(info);
  });

  calendar.setOption("locale", "en");
});
