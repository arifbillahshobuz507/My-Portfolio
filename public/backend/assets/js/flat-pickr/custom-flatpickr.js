// Custom-flatpickr JS
(function () {
  // 1. Default Date
  flatpickr("#datetime-local", {});

  // 2.Human Friendly
  flatpickr("#human-friendly", {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
  });

  //3. min-max value
  flatpickr("#min-max", {
    dateFormat: "d.m.Y",
    maxDate: "15.12.2017",
  });

  // 4. disabled-date
  flatpickr("#disabled-date", {
    disable: ["2025-01-30", "2025-02-21", "2025-03-08", new Date(2025, 4, 9)],
    dateFormat: "Y-m-d",
  });

  //5. multiple-date
  flatpickr("#multiple-date", {
    mode: "multiple",
    dateFormat: "Y-m-d",
  });

  // 6. Customizing the Conjunction
  flatpickr("#customize-date", {
    mode: "multiple",
    dateFormat: "Y-m-d",
    conjunction: " :: ",
  });

  // 7.Range-date
  flatpickr("#range-date", {
    mode: "range",
  });

  // 8. Disabled Range
  flatpickr("#preloading-date", {
    mode: "multiple",
    dateFormat: "Y-m-d",
    defaultDate: ["2016-10-20", "2016-11-04"],
  });

  // Time-picker

  //9.Time-picker
  flatpickr("#time-picker", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
  });

  // 10. 24-hour Time Picker
  flatpickr("#twenty-four-hour", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
  });

  // 11. Time Picker W/Limits
  flatpickr("#limit-time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    minTime: "16:00",
    maxTime: "22:30",
  });

  // 12. Preloading Time
  flatpickr("#preloading-time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "13:45",
  });

  // 13. DateTimePicker with Limited Time Range[min-time]
  flatpickr("#limit-time-range", {
    enableTime: true,
    minTime: "09:00",
  });

  // 14. DateTimePicker with Limited Time Range[min/max-time]
  flatpickr("#limit-min-max-range", {
    enableTime: true,
    minTime: "16:00",
    maxTime: "22:00",
  });

  // 15. Date With Time
  flatpickr("#datetime-local1", {
    enableTime: true,
    dateFormat: "Y-m-d H:i",
  });

  // 16. monthSelectPlugin

  //By-default-  Inline Calender
  flatpickr("#inline-calender", {
    inline: true,
  });
})();
