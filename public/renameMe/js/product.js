textFit(document.querySelectorAll(".fit"));

new Swiper(".mySwiper2", {
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

var swiper3 = new Swiper(".mySwiper3", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper4 = new Swiper(".mySwiper4", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper3,
  },
});

var splide = new Splide(".splide", {
  perPage: 3,
  rewind: true,
  padding: "3.5rem",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    575: {
      perPage: 2,
      padding: "-1rem",
      trimSpace: true,
    },
    450: {
      perPage: 1,
    },
  },
});

splide.mount();

$(".tab").click(function () {
  $(".tab").removeClass("active");
  $(this).addClass("active");
});
