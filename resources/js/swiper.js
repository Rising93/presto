//!Swiper CoverFlow
let swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  loop: true,
  autoplay: {
    delay: 2000,},
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },

});

//!SwiperCard
let swiperCard = new Swiper(".mySwiperCard", {
  effect: "cards",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true
  },
  pagination: {
    el: ".swiper-pagination"
  }
});

//! Swiper Cube effect
let mySwiper = new Swiper(".mySwiperCube", {
  effect: "cube",
  cubeEffect: {
    shadow: false,
    slideShadows: false,
  },
  loop: true,
  autoplay: {
    delay: 2000,},
});

//!Swiper Article-single
let swiperArticle = new Swiper(".mySwiperArticle", {
  spaceBetween: 20,
  slidesPerView: 4,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  centerInsufficientSlides: true,
  slideToClickedSlide: true,
  direction:"horizontal",
  breakpoints:  {
    992:{
      direction:"horizontal",

      slidesPerView: 4,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      centerInsufficientSlides: true,
      slideToClickedSlide: true,
    }
  }





  
});

let swiperArticles = new Swiper(".mySwiperArticles", {
  spaceBetween: 20,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiperArticle
  },
});




//! Swiper Category
let swipercategory = new Swiper(".mySwiperCategory", {
  slidesPerView: 'auto',
  freeMode: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

//! Swiper Previews

let mySwiperPreviews = new Swiper(".mySwiperPreviews", {
  spaceBetween: 20,
  slidesPerView: 4,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  centerInsufficientSlides: true,
  slideToClickedSlide: true
});

let mySwiperPreview = new Swiper(".mySwiperPreview", {
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiperArticle
  },
});