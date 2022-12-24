// Swipper Init
var swiper = new Swiper(".blog-swiper", {
  slidesPerView: 4,
  loop: true,
  spaceBetween: 10,
  autoplay: {
    delay: 2500,
  },
  breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    576: {
      slidesPerView: 3,
    },
    767: {
      slidesPerView: 2,
    },
    1000: {
      slidesPerView: 4,
    },
  },
});
