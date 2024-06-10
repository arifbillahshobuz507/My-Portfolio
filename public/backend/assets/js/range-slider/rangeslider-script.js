/**=====================
  Range-slider js Start
==========================**/
(function ($) {
  "use strict";

  var range_slider_custom = {
    init: function () {
      $("#u-range-01").ionRangeSlider({
        min: 100,
        max: 1000,
        from: 550,
      }),
        $("#u-range-02").ionRangeSlider({
          skin: "round",
          min: 100,
          max: 1000,
          from: 550,
        }),
        $("#u-range-03").ionRangeSlider({
          type: "double",
          skin: "square",
          grid: true,
          min: 0,
          max: 1000,
          from: 200,
          to: 800,
          prefix: "$",
        }),
        $("#u-range-04").ionRangeSlider({
          type: "double",
          skin: "sharp",
          grid: true,
          min: -1000,
          max: 1000,
          from: -500,
          to: 500,
        }),
        $("#u-range-05").ionRangeSlider({
          type: "double",
          skin: "big",
          grid: true,
          min: -1000,
          max: 1000,
          from: -500,
          to: 500,
          step: 250,
        }),
        $("#u-range-06").ionRangeSlider({
          grid: true,
          skin: "modern",
          from: 3,
          values: [
            "Jan",
            "Feb",
            "March",
            "April",
            "May",
            "June",
            "July",
            "Aug",
            "Sept",
            "Oct",
            "Nov",
            "Dec",
          ],
        }),
        $("#u-range-07").ionRangeSlider({
          grid: true,
          min: 1000,
          max: 10000,
          from: 2000,
          step: 100,
          prettify_enabled: true,
        }),
        $("#u-range-08").ionRangeSlider({
          skin: "round",
          min: 100,
          max: 1000,
          from: 550,
          disable: true,
        }),
        $("#u-range-09").ionRangeSlider({
          type: "double",
          skin: "square",
          min: -100000,
          max: 100000,
          from: -90000,
          to: 70000,
          step: 10000,
          grid: true, // show/hide grid
          force_edges: false, // force UI in the box
          hide_min_max: false, // show/hide MIN and MAX labels
          hide_from_to: false, // show/hide FROM and TO labels
          block: false, // block instance from changing
        }),
        $("#u-range-10").ionRangeSlider({
          type: "double",
          skin: "sharp",
          min: 100,
          max: 200,
          from: 120,
          to: 179,
          prefix: "Follower: ",
          postfix: "M",
          decorate_both: true,
        });
    },
  };

  range_slider_custom.init();
})(jQuery);

/**=====================
  Range-slider Ends
==========================**/
