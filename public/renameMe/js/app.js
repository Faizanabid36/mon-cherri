AOS.init();

$("#preloader").hide();
$("html").css("overflow", "unset");

$(window).on("scroll", function (e) {
  $("#back-home").hide();
  let scroll = $(window).scrollTop();

  if (scroll > 600) {
    $("#back-home").show();
  }
});

$("#back-home").click(function () {
  $(window).scrollTop(0);
});
