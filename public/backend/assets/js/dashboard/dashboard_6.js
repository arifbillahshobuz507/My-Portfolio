(function () {
  // Income chart
  var incomeoptions = {
    series: [
      {
        name: "Income",
        data: [
          15, 14.5, 15, 14.5, 14.2, 14.5, 14.2, 15, 14.8, 14.5, 14.6, 14.4,
          14.5, 14.4, 14.6, 14.3, 14.4, 14.3, 14.35, 14.2, 14.4, 14.3, 14.2,
          14.3, 14, 15, 14.8, 14.9, 14.5, 14.6, 14.5, 14.7, 15, 14.5, 12.2,
        ],
      },
    ],
    chart: {
      height: 250,
      type: "area",
      toolbar: {
        show: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "smooth",
      width: 3,
    },
    xaxis: {
      type: "category",
      categories: ["10", "11", "12", "13", "14", "15"],
      tickAmount: 15,
      tickPlacement: "between",
      labels: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
      tooltip: {
        enabled: false,
      },
    },
    yaxis: {
      labels: {
        formatter: function (val) {
          return val + "k";
        },
      },
      tooltip: {
        show: false,
      },
    },
    grid: {
      borderColor: "var(--chart-dashed-border)",
      strokeDashArray: 5,
      padding: {
        right: -15,
      },
    },
    colors: ["#7366ff"],
    fill: {
      gradient: {
        type: "vertical",
        opacityFrom: 0.7,
        opacityTo: 0,
        stops: [0, 100],
        colorStops: [],
      },
    },
  };

  var incomechart = new ApexCharts(
    document.querySelector("#income-chart"),
    incomeoptions
  );
  incomechart.render();

  // slider
  const slider_swiper2 = new Swiper(".trending-slider", {
    slidesPerView: 3,
    spaceBetween: 24,
    loop: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1750: {
        spaceBetween: 24,
      },
    },
  });

  const category_swiper2 = new Swiper(".category-slider", {
    slidesPerView: 5,
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 12,
      },
      400: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1100: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 12,
      },
      1400: {
        slidesPerView: 4,
      },
      1530: {
        slidesPerView: 5,
      },
      1890: {
        slidesPerView: 5,
        spaceBetween: 24,
      },
    },
  });

  // widget icons
  function widgetCommonOption(data) {
    return {
      series: [
        {
          data: data.widgetYseries,
        },
      ],
      chart: {
        width: 180,
        height: 100,
        type: "line",
        toolbar: {
          show: false,
        },
        offsetY: 10,
        dropShadow: {
          enabled: true,
          enabledOnSeries: undefined,
          top: 3,
          left: 0,
          blur: 3,
          color: data.dropshadowColor,
          opacity: 0.4,
        },
      },
      grid: {
        show: false,
      },
      colors: data.color,
      stroke: {
        width: 2,
        curve: "smooth",
      },
      labels: data.label,
      markers: {
        size: 0,
      },
      xaxis: {
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
        labels: {
          show: false,
        },
        tooltip: {
          enabled: false,
        },
      },
      yaxis: {
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
        labels: {
          show: false,
        },
      },
      legend: {
        show: false,
      },
      tooltip: {
        marker: {
          show: false,
        },
        x: {
          show: false,
        },
        y: {
          show: false,
          labels: {
            show: false,
          },
        },
      },
      responsive: [
        {
          breakpoint: 1660,
          options: {
            chart: {
              width: 120,
            },
          },
        },
        {
          breakpoint: 768,
          options: {
            chart: {
              width: 300,
            },
          },
        },
        {
          breakpoint: 480,
          options: {
            chart: {
              width: 150,
            },
          },
        },
      ],
    };
  }
  const widget1 = {
    color: ["var(--theme-deafult)"],
    dropshadowColor: "var(--theme-deafult)",
    label: [
      "jan",
      "feb",
      "mar",
      "apr",
      "may",
      "jun",
      "jul",
      "aug",
      "sep",
      "oct",
    ],
    widgetYseries: [30, 25, 64, 30, 45, 35, 64, 15, 30, 20],
  };

  const widgetchart1 = document.querySelector("#artist-chart");
  if (widgetchart1) {
    var artistChart1 = new ApexCharts(
      widgetchart1,
      widgetCommonOption(widget1)
    );
    artistChart1.render();
  }

  const widget2 = {
    color: ["#FFAA05"],
    dropshadowColor: "#FFAA05",
    label: [
      "jan",
      "feb",
      "mar",
      "apr",
      "may",
      "jun",
      "jul",
      "aug",
      "sep",
      "oct",
      "nov",
    ],
    widgetYseries: [64, 10, 50, 20, 45, 35, 50, 5, 30, 20, 30],
  };

  const widgetchart2 = document.querySelector("#sale-chart");
  if (widgetchart2) {
    var saleChart1 = new ApexCharts(widgetchart2, widgetCommonOption(widget2));
    saleChart1.render();
  }

  const widget3 = {
    color: ["#54BA4A"],
    dropshadowColor: "#54BA4A",
    label: [
      "jan",
      "feb",
      "mar",
      "apr",
      "may",
      "jun",
      "jul",
      "aug",
      "sep",
      "oct",
      "nov",
      "dec",
    ],
    widgetYseries: [15, 10, 40, 20, 64, 10, 30, 0, 40, 10, 50, 20],
  };

  const widgetchart3 = document.querySelector("#release-chart");
  if (widgetchart3) {
    var releaseChart1 = new ApexCharts(
      widgetchart3,
      widgetCommonOption(widget3)
    );
    releaseChart1.render();
  }

  // statistic chart
  var statisticoptions = {
    series: [
      {
        name: "Earning",
        data: [80, 40, 100, 40, 70, 45, 120, 60, 0],
      },
    ],
    chart: {
      height: 170,
      type: "area",
      toolbar: {
        show: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "smooth",
      width: 3,
    },
    xaxis: {
      type: "category",
      categories: ["Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep"],
      tickAmount: 15,
      tickPlacement: "between",
      labels: {
        show: true,
      },
      axisTicks: {
        show: false,
      },
      axisBorder: {
        show: false,
      },
      tooltip: {
        enabled: false,
      },
    },
    yaxis: {
      labels: {
        show: false,
      },
      tooltip: {
        show: false,
      },
    },
    grid: {
      show: false,
      padding: {
        right: -40,
      },
    },
    colors: ["#7366ff"],
    fill: {
      gradient: {
        type: "vertical",
        opacityFrom: 0.7,
        opacityTo: 0,
        stops: [0, 100],
        colorStops: [],
      },
    },
    responsive: [
      {
        breakpoint: 1499,
        options: {
          chart: {
            height: 150,
          },
        },
      },
      {
        breakpoint: 1454,
        options: {
          chart: {
            height: 130,
          },
          grid: {
            padding: {
              right: -20,
            },
          },
        },
      },
      {
        breakpoint: 1400,
        options: {
          chart: {
            height: 170,
          },
        },
      },
      {
        breakpoint: 992,
        options: {
          chart: {
            height: 190,
          },
        },
      },
    ],
  };

  var statistic_chart = new ApexCharts(
    document.querySelector("#statistic-chart"),
    statisticoptions
  );
  statistic_chart.render();
})();
