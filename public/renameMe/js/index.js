textFit(document.querySelectorAll(".fit"));
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    576: {
      slidesPerView: 4,
    },
    400: {
      slidesPerView: 2,
    },
  },
});

var swiper = new Swiper(".mySwiper2", {
  slidesPerView: 1,
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    992: {
      slidesPerView: 4,
    },
    576: {
      slidesPerView: 3,
    },
    451: {
      slidesPerView: 2,
    },
    0: {
      slidesPerView: 1,
    },
  },
});

new Swiper(".product-slider", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

function toggleCart() {
  $("#dark-overlay").toggleClass("active");
  $("#cart-wrapper").toggleClass("active");
  $("html").toggleClass("inactive");
}

$(".cart_icon, #close, #dark-overlay").click(toggleCart);

$(".quantity-wrapper > button").click(function () {
  $this = $(this);
  let text = $this.html();
  let input = $this.siblings("input");
  let newVal;
  if (text === "+") {
    newVal = +input.val() + 1;
  } else {
    newVal = +input.val() - 1;
    if (newVal < 0) {
      newVal = 0;
    }
  }
  input.val(newVal);
});
