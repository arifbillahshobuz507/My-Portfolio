(function () {
  //1. Academic Performance Chart
  var options_academic_performance = {
    series: [
      {
        name: "High - 2023",
        data: [20, 65, 147, 70, 100, 55],
      },
    ],
    fill: {
      type: "gradient",
      gradient: {
        type: "vertical",
        shadeIntensity: 0.4,
        gradientToColors: "#54BA4A",
        opacityFrom: 0.4,
        opacityTo: 0,
        stops: [0, 90, 100],
        colorStops: [],
      },
    },
    chart: {
      height: 230,
      type: "area",
      dropShadow: {
        enabled: true,
        color: "#54BA4A",
        top: 8,
        left: 0,
        blur: 2,
        opacity: 0.2,
      },
      toolbar: {
        show: false,
      },
    },
    colors: ["#54BA4A", "#54BA4A"],
    dataLabels: {
      enabled: true,
    },
    textAnchor: "middle",
    style: {
      fontSize: "12px",
      fontFamily: "Helvetica, Arial, sans-serif",
      fontWeight: "bold",
      borderRadius: 2,
      colors: undefined,
    },

    stroke: {
      curve: "smooth",
      width: 3,
    },
    tooltip: {
      x: {
        show: false,
      },
      z: {
        show: false,
      },
    },
    markers: {
      size: 1,
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    },
    yaxis: {
      min: 0,
      max: 160,
      tickAmount: 4,
    },
    legend: {
      position: "top",
      horizontalAlign: "right",
      floating: true,
      offsetY: -25,
      offsetX: -5,
    },
    responsive: [
      {
        breakpoint: 1131,
        options: {
          chart: {
            height: 210,
          },
        },
      },
      {
        breakpoint: 1007,
        options: {
          chart: {
            height: 225,
          },
        },
      },
    ],
  };

  var academic_performance_chart = new ApexCharts(
    document.querySelector("#academic_performance-chart"),
    options_academic_performance
  );
  academic_performance_chart.render();

  //2. School Performance Chart
  var options_school_performance = {
    series: [
      {
        name: "week",
        type: "area",
        data: [50, 90, 55, 65, 45, 60, 40, 78, 20, 20, 20],
      },
      {
        name: "performance",
        type: "line",
        data: [60, 95, 29, 44, 42, 95, 44, 30, 50, 25, 50],
      },
    ],
    chart: {
      height: 220,
      type: "line",
      stacked: false,
      toolbar: {
        show: false,
      },
      dropShadow: {
        enabled: true,
        top: 4,
        left: 0,
        blur: 2,
        color: "#7366FF",
        opacity: 0.02,
      },
    },
    stroke: {
      width: [3, 3],
      curve: "smooth",
    },
    grid: {
      show: true,
      borderColor: "var(--chart-border)",
      strokeDashArray: 0,
      position: "back",
      xaxis: {
        lines: {
          show: true,
        },
      },
    },
    colors: ["#7366FF", "#54BA4A"],
    fill: {
      type: ["gradient", "solid"],
      gradient: {
        shade: "light",
        type: "vertical",
        opacityFrom: 0.6,
        opacityTo: 0,
        stops: [0, 100],
      },
    },
    labels: [
      "Week 1",
      "Week 2",
      "Week 3",
      "Week 4",
      "Week 5",
      "Week 6",
      "Week 7",
      "Week 8",
      "Week 9 ",
      "Week 10",
      "Week 11",
      "Week 12 ",
    ],
    markers: {
      discrete: [
        {
          seriesIndex: 0,
          dataPointIndex: 5,
          fillColor: "#7064F5",
          strokeColor: "var(--white)",
          size: 6,
          sizeOffset: 3,
        },
        {
          seriesIndex: 1,
          dataPointIndex: 5,
          fillColor: "#54BA4A",
          strokeColor: "var(--white)",
          size: 6,
        },
        {
          seriesIndex: 2,
          dataPointIndex: 5,
          fillColor: "#FF3364",
          strokeColor: "var(--white)",
          size: 6,
        },
      ],
      hover: {
        size: 6,
        sizeOffset: 0,
      },
    },
    xaxis: {
      type: "category",
      tickAmount: 4,
      tickPlacement: "between",
      tooltip: {
        enabled: false,
      },
      axisBorder: {
        color: "var(--chart-border)",
      },
      axisTicks: {
        show: false,
      },
    },
    legend: {
      show: false,
    },
    yaxis: {
      min: 0,
      max: 100,
      tickAmount: 5,
      tickPlacement: "between",
    },
    tooltip: {
      shared: false,
      intersect: false,
    },
    responsive: [
      {
        breakpoint: 1200,
        options: {
          chart: {
            height: 250,
          },
        },
      },
      {
        breakpoint: 1201,
        options: {
          chart: {
            height: 260,
          },
        },
      },
    ],
  };
  var chart_school_performance = new ApexCharts(
    document.querySelector("#chart-school-performance"),
    options_school_performance
  );
  chart_school_performance.render();

  // 3.income-chart
  var options_income = {
    series: [
      {
        name: "Income",
        type: "line",
        data: [45, 47, 30, 45, 30, 60],
      },
      {
        name: "Earnings",
        type: "line",
        data: [55, 65, 55, 80, 40, 65],
      },
      {
        name: "Profit",
        type: "line",
        data: [50, 40, 70, 40, 100, 70],
      },
    ],
    chart: {
      height: 265,
      type: "line",
      toolbar: {
        show: false,
      },
      dropShadow: {
        enabled: true,
        top: 4,
        left: 0,
        blur: 2,
        colors: ["#7366FF", "#54BA4A", "#FFAA05"],
        opacity: 0.02,
      },
    },
    grid: {
      show: false,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },
    colors: ["#7366FF", "#54BA4A", "#FFAA05"],
    stroke: {
      width: 3,
      curve: "smooth",
      opacity: 1,
    },
    markers: {
      discrete: [
        {
          seriesIndex: 1,
          dataPointIndex: 3,
          fillColor: "#54BA4A",
          strokeColor: "var(--white)",
          size: 6,
        },
      ],
    },
    tooltip: {
      shared: false,
      intersect: false,
      marker: {
        width: 5,
        height: 5,
      },
    },
    xaxis: {
      type: "category",
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      tickAmount: 12,
      crosshairs: {
        show: false,
      },
      labels: {
        style: {
          colors: "var(--chart-text-color)",
          fontSize: "12px",
          fontFamily: "Rubik, sans-serif",
          fontWeight: 400,
        },
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
    fill: {
      opacity: 1,
      type: "gradient",
      gradient: {
        shade: "light",
        type: "horizontal",
        shadeIntensity: 1,
        opacityFrom: 0.95,
        opacityTo: 1,
        stops: [0, 90, 100],
      },
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        show: false,
      },
    },
    legend: {
      show: false,
    },
    responsive: [
      {
        breakpoint: 1736,
        options: {
          chart: {
            height: 230,
            offsetX: 0,
          },
        },
      },
      {
        breakpoint: 1401,
        options: {
          chart: {
            height: 250,
            offsetX: 0,
          },
        },
      },
      {
        breakpoint: 1200,
        options: {
          chart: {
            height: 250,
          },
        },
      },
      {
        breakpoint: 651,
        options: {
          chart: {
            height: 210,
          },
        },
      },
    ],
  };

  var chart_income = new ApexCharts(
    document.querySelector("#income_chart"),
    options_income
  );
  chart_income.render();
  //4. Performance pie chart
  var options_current_academic = {
    series: [55, 55, 58, 45],
    chart: {
      width: 270,
      type: "polarArea",
      height: 270,
    },
    labels: ["Maths", "Science", "Economics", "History"],
    fill: {
      opacity: 1,
      type: ["solid"],
      gradient: {
        shade: "light",
        type: "vertical",
        opacityFrom: 0.8,
        opacityTo: 0,
        stops: [0, 100],
      },
      colors: ["#FFAA05", "#7366FF", "#54BA4A", "#FF3364"],
    },

    stroke: {
      width: 0,
    },
    yaxis: {
      show: false,
    },
    legend: {
      position: "bottom",
      horizontalAlign: "center",
      labels: {
        colors: ["#FFAA05", "#7366FF", "#54BA4A", "#FF3364"],
        useSeriesColors: false,
      },
      markers: {
        fillColors: ["#FFAA05", "#7366FF", "#54BA4A", "#FF3364"],
        radius: 10,
        width: 8,
        height: 8,
      },
      itemMargin: {
        horizontal: 5,
        vertical: 0,
      },
      itemMargin: {
        horizontal: 10,
        vertical: 5,
      },
    },

    plotOptions: {
      polarArea: {
        rings: {
          strokeWidth: 0,
        },
        spokes: {
          strokeWidth: 0,
        },
      },
      pie: {
        offsetX: 0,
        offsetY: 0,
      },
    },
    theme: {
      monochrome: {
        enabled: true,
        shadeTo: "light",
        shadeIntensity: 0.6,
      },
    },

    responsive: [
      {
        breakpoint: 1870,
        options: {
          chart: {
            height: 260,
            offsetX: -15,
          },
        },
      },
      {
        breakpoint: 1626,
        options: {
          chart: {
            height: 240,
            offsetX: -15,
          },
        },
      },
      {
        breakpoint: 1500,
        options: {
          chart: {
            height: 230,
            offsetX: -15,
            offsetY: 40,
          },
        },
      },
      {
        breakpoint: 1199,
        options: {
          chart: {
            height: 230,
            offsetX: -10,
          },
        },
      },
      {
        breakpoint: 1093,
        options: {
          chart: {
            height: 220,
            offsetX: -20,
            offsetY: 50,
          },
        },
      },
      {
        breakpoint: 992,
        options: {
          chart: {
            height: 220,
            offsetX: -20,
            offsetY: 30,
          },
        },
      },
      {
        breakpoint: 885,
        options: {
          chart: {
            height: 220,
            offsetX: -10,
            offsetY: 20,
          },
        },
      },
      {
        breakpoint: 835,
        options: {
          chart: {
            height: 220,
            offsetX: -10,
            offsetY: 20,
          },
        },
      },
    ],
  };

  var chart_current_academic = new ApexCharts(
    document.querySelector("#chart_current_academic"),
    options_current_academic
  );
  chart_current_academic.render();
})();
