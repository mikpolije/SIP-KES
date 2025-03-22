$(function (e) {
    "use strict";
    $(".date-inputmask").inputmask({
      alias: "datetime",
      inputFormat: "mm/dd/yyyy",
      placeholder: "mm/dd/yyyy",
    }),
      $(".phone-inputmask").inputmask("(999) 999-9999"),
      $(".international-inputmask").inputmask("+9(999)999-9999"),
      $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
      $(".purchase-inputmask").inputmask("aaaa 9999-"),
      $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
      $(".ssn-inputmask").inputmask("999-99-9999"),
      $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
      $(".currency-inputmask").inputmask("$9999"),
      $(".percentage-inputmask").inputmask("99%"),

      // Tambahkan konfigurasi ini ke dalam function di mask.init.js
$(".mmhg-sistol-inputmask").inputmask({
    alias: "numeric",
    suffix: " mmHg",
    rightAlign: false,
    min: 0,
    max: 300
  }),
  $(".mmhg-diastol-inputmask").inputmask({
    alias: "numeric",
    suffix: " mmHg",
    rightAlign: false,
    min: 0,
    max: 200
  }),
  $(".kg-inputmask").inputmask({
    alias: "numeric",
    suffix: " kg",
    rightAlign: false,
    digits: 1,
    min: 0,
    max: 500
  }),
  $(".cm-inputmask").inputmask({
    alias: "numeric",
    suffix: " cm",
    rightAlign: false,
    min: 0,
    max: 300
  }),
  $(".celcius-inputmask").inputmask({
    alias: "numeric",
    suffix: " °C",
    rightAlign: false,
    digits: 1,
    min: 30,
    max: 45
  }),
  $(".spo2-inputmask").inputmask({
    alias: "numeric",
    suffix: " %",
    rightAlign: false,
    min: 0,
    max: 100
  }),
  $(".resp-rate-inputmask").inputmask({
    alias: "numeric",
    suffix: " /mnt",
    rightAlign: false,
    min: 0,
    max: 100
  }),

      $(".optional-inputmask").inputmask("(99) 9999[9]-9999"),
      $(".decimal-inputmask").inputmask({
        alias: "decimal",
        radixPoint: ".",
      }),
      $(".email-inputmask").inputmask({
        mask: "{1,20}[.{1,20}][.{1,20}][.{1,20}]@{1,20}[{2,6}][{1,2}].{1,}[.{2,6}][.{1,2}]",
        greedy: !1,
        onBeforePaste: function (n, a) {
          return (e = e.toLowerCase()).replace("mailto:", "");
        },
        definitions: {
          "*": {
            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
            cardinality: 1,
            casing: "lower",
          },
        },
      }),
      $("#num-letter").inputmask("999-AAA"),
      $("#date-time-once").inputmask();
  });
