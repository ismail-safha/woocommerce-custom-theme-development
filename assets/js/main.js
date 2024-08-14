$(".rooms_slider").slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  adaptiveHeight: true,
  arrows: true,
  centerMode: false, // Set to true if you want center mode
  variableWidth: true, // This allows the use of custom widths and margins
});

console.log("hi");

$(document).ready(function ($) {
  $("#cart-icon-trigger").on("click", function (e) {
    e.preventDefault();
    $("#mini-cart").toggleClass("hidden");
    $("#page-overlay").toggleClass("hidden");
    $("body").toggleClass("no-scroll");
  });

  // Close the mini cart if clicked outside
  $("#page-overlay").on("click", function () {
    $("#mini-cart").addClass("hidden");
    $("#page-overlay").addClass("hidden");
    $("body").removeClass("no-scroll");
  });
});
