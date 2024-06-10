// Input mask js
(function () {
  // Card number
  var cleave = new Cleave("#cleave-card-number", {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {},
  });

  // Date
  var cleave = new Cleave("#cleave-date1", {
    date: true,
    delimiter: "-",
    datePattern: ["d", "m", "Y"],
  });

  // Date2
  var cleave = new Cleave("#cleave-date2", {
    date: true,
    datePattern: ["m", "y"],
  });

  // Time
  var cleave = new Cleave("#cleave-time1", {
    time: true,
    timePattern: ["h", "m", "s"],
  });

  // Time2
  var cleave = new Cleave("#cleave-time2", {
    time: true,
    timePattern: ["h", "m"],
  });

  // Number format
  var cleave = new Cleave("#cleave-number-format", {
    numeral: true,
  });

  // Prefix
  var cleave = new Cleave("#cleave-type-prefix", {
    prefix: "PREFIX",
    delimiter: "-",
    blocks: [6, 4, 4, 4],
    uppercase: true,
  });

  // Delimiter
  var cleave = new Cleave("#cleave-type-delimiter", {
    delimiter: "·",
    blocks: [3, 3, 3],
    uppercase: true,
  });

  //Phone number
  var cleave = new Cleave("#cleave-phone-number", {
    delimiters: ["(", ")", "-"],
    blocks: [0, 3, 3, 4],
    numericOnly: true,
    uppercase: true,
  });

  // Tailprefix
  new Cleave("#tailprefix", {
    numeral: true,
    blocks: [4, 2],
    prefix: "€",
    tailPrefix: true,
  });
})();
