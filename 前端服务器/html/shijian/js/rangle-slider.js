(function ($) {
  "use strict";

  var rangeslider = function (ID1, ID2, ID3) {
      var slider = document.getElementById(ID1);
      var lowerValue = document.getElementById(ID2);
      var upperValue = document.getElementById(ID3);
      if (slider) {
          noUiSlider.create(slider, {
              start: [1000, 70987],
              connect: true,
              behaviour: "drag",
              step: 1,
              range: {
                  min: 20,
                  max: 99999
              }
          });
          slider.noUiSlider.on("update", function (values, handle) {
              lowerValue.innerHTML = "$" + Math.round(values[0]);
              upperValue.innerHTML = "$" + Math.round(values[1]);
          });

      
      }
  };

  $(function () {
    rangeslider("range-two-val", "skip-value-lower", "skip-value-upper");
    rangeslider("range-two-val-1", "skip-value-lower-1", "skip-value-upper-1");
    rangeslider("range-two-val-2", "skip-value-lower-2", "skip-value-upper-2");
  });
})(jQuery);