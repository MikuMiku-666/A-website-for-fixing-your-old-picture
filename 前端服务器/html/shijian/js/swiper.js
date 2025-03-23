if ($(".page-title-home-swiper").length > 0) {
  var swiper = new Swiper('.page-title-home-swiper', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    effect: "fade",
    speed: 900,
    fadeEffect: {
      crossFade: true,
    },
    grabCursor: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".slider-page-title-home-next",
      prevEl: ".slider-page-title-home-prev",
    },
    pagination: {
      el: ".pagination-page-title-home",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".testimonial-swiper").length > 0) {
  var swiper = new Swiper('.testimonial-swiper', {
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
      nextEl: ".slider-testimonial-next",
      prevEl: ".slider-testimonial-prev",
    },
    pagination: {
      el: ".pagination-testimonial",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
} 
if ($(".swiper-avatar").length > 0) {
  var thumbSwiper = new Swiper('.swiper-avatar', {
    slidesPerView: 5,
    spaceBetween: 12,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    allowTouchMove: false,
    breakpoints: {
      300: {
        slidesPerView: 3,
      },
      400: {
        slidesPerView: 4,
      },
      555: {
        slidesPerView: 5,
      },
    },
  });
}
if ($(".testimonial-swiper-2").length > 0) {
  var swiper = new Swiper('.testimonial-swiper-2', {
    slidesPerView: 1,
    spaceBetween: 0,
    initialSlide: 2,
    thumbs: {
      swiper: thumbSwiper,
    },
    navigation: {
      nextEl: ".slider-testimonial-next",
      prevEl: ".slider-testimonial-prev",
    },
  });
}
if ($(".testimonial-swiper-3").length > 0) {
  var swiper = new Swiper('.testimonial-swiper-3', {
    slidesPerView: 2,
    spaceBetween: 30,
    navigation: {
      nextEl: ".slider-testimonial-next",
      prevEl: ".slider-testimonial-prev",
    },
    pagination: {
      el: ".pagination-testimonial-3",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      767: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      991: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      1200: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    },
  });
}
if ($(".page-title-home-swiper-3").length > 0) {
  var swiper = new Swiper('.page-title-home-swiper-3', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    effect: "fade",
    speed: 900,
    fadeEffect: {
      crossFade: true, 
    },
    grabCursor: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".slider-page-title-home-3-next",
      prevEl: ".slider-page-title-home-3-prev",
    },
    pagination: {
      el: ".pagination-page-title-home",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".page-title-home-swiper-4").length > 0) {
  var swiper = new Swiper('.page-title-home-swiper-4', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    effect: "fade",
    speed: 900,
    fadeEffect: {
      crossFade: true, 
    },
    grabCursor: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
  });
}
if ($(".page-title-home-swiper-5").length > 0) {
  var swiper = new Swiper('.page-title-home-swiper-5', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    effect: "fade",
    speed: 900,
    fadeEffect: {
      crossFade: true, 
    },
    grabCursor: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".pagination-home-5",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".categories-swiper").length > 0) {
  var swiper = new Swiper('.categories-swiper', {
    slidesPerView: 5,
    navigation: {
      nextEl: ".slider-section-next",
      prevEl: ".slider-section-prev",
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
        spaceBetween: 15,
      },
      400: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      555: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      767: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      991: {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 15,
      },
      1400: {
        slidesPerView: 5,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".pagination-categories",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".recommended-swiper").length > 0) {
  var swiper = new Swiper('.recommended-swiper', {
    slidesPerView: 4,
    spaceBetween: 30,
    navigation: {
      nextEl: ".slider-section-next-2",
      prevEl: ".slider-section-prev-2",
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
        spaceBetween: 15,
      },
      550: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768:{
        slidesPerView: 3,
        spaceBetween: 30,
      },
      991: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".pagination-recommended",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".about-swiper").length > 0) {
  var swiper = new Swiper('.about-swiper', {
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
      nextEl: ".slider-section-next-3",
      prevEl: ".slider-section-prev-3",
    },
  });
}
if ($(".location-swiper").length > 0) {
  var swiper = new Swiper('.location-swiper', {
    spaceBetween: 20,
    navigation: {
      nextEl: ".slider-section-next-4",
      prevEl: ".slider-section-prev-4",
    },
    breakpoints: {
      300:{
        slidesPerView: 1,
      },
      445:{
        slidesPerView: "auto",
      },
    },
    pagination: {
      el: ".pagination-location",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".why-swiper").length > 0) {
  var swiper = new Swiper('.why-swiper', {
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
      nextEl: ".slider-section-next-5",
      prevEl: ".slider-section-prev-5",
    },
  });
}
if ($(".recommended-swiper-5").length > 0) {
  var swiper = new Swiper('.recommended-swiper-5', {
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
      nextEl: ".slider-section-next-6",
      prevEl: ".slider-section-prev-6",
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      555: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      991: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
}
if ($(".recommended-swiper-6").length > 0) {
  var swiper = new Swiper('.recommended-swiper-6', {
    slidesPerView: 4,
    navigation: {
      nextEl: ".slider-section-next-7",
      prevEl: ".slider-section-prev-7",
    },
    breakpoints: {
      300: {
        slidesPerView: 1,
      },
      400: {
        slidesPerView: 2,
      },
      767: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
      1400: {
        slidesPerView: 4,
      },
    },
    pagination: {
      el: ".pagination-recommended-swiper-6",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".section-new-swiper").length > 0) {
  var swiper = new Swiper('.section-new-swiper', {
    slidesPerView: 3,
    breakpoints: {
      300: {
        slidesPerView: 1,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      555: {
        slidesPerView: 2,
        allowTouchMove: true,
        spaceBetween: 15,
      },
      768: {
        allowTouchMove: false,
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".pagination-section-new",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".tour-grid-swiper").length > 0) {
  var swiper = new Swiper('.tour-grid-swiper', {
    breakpoints: {
      300: {
        allowTouchMove: true,
        slidesPerView: 1,
      },
      400: {
        allowTouchMove: true,
        slidesPerView: 2,
      },
      767: {
        slidesPerView: 3,
        allowTouchMove: true,
      },
      992: {
        allowTouchMove: false,
        slidesPerView: 4,
      },
    },
    pagination: {
      el: ".pagination-tour-grid",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".section-featured-swiper").length > 0) {
  var swiper = new Swiper('.section-featured-swiper', {
    slidesPerView: 'auto',
    breakpoints: {
      300: {
        slidesPerView: 1,
        allowTouchMove: true,
        spaceBetween: 15,
      },
      555: {
        slidesPerView: 2,
        allowTouchMove: true,
        spaceBetween: 15,
      },
      767: {
        slidesPerView: 3,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      930: {
        allowTouchMove: true,
        slidesPerView: 3,
        spaceBetween: 15,
      },
      992: {
        allowTouchMove: false,
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".pagination-section-featured",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".section-new-2-swiper").length > 0) {
  var swiper = new Swiper('.section-new-2-swiper', {
    slidesPerView: 3,

    breakpoints: {
      300: {
        slidesPerView: 1,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      550: {
        slidesPerView: 2,
        allowTouchMove: true,
        spaceBetween: 10,

      },
      991: {
        slidesPerView: 3,
        allowTouchMove: false,
        spaceBetween: 10,
      },
      1024: {
        allowTouchMove: false,
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".pagination-section-new-2",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".tour-grid-2-swiper").length > 0) {
  var swiper = new Swiper('.tour-grid-2-swiper', {
    slidesPerView: 4,
    spaceBetween: 30,
    breakpoints: {
      300: {
        slidesPerView: 1,
        allowTouchMove: true,
        spaceBetween: 10,

      },
      400: {
        slidesPerView: 2,
        allowTouchMove: true,
        spaceBetween: 10,

      },
      991: {
        slidesPerView: 3,
        allowTouchMove: true,
        spaceBetween: 10,

      },
      1024: {
        allowTouchMove: true,
        slidesPerView: 3,
        spaceBetween: 30,

      },
      1200: {
        allowTouchMove: false,
        slidesPerView: 4,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".pagination-tour-grid-2",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".categories-3-swiper").length > 0) {
  var swiper = new Swiper('.categories-3-swiper', {
    slidesPerView: 5,
    breakpoints: {
      300: {
        slidesPerView: 2,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      550: {
        slidesPerView: 3,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      991: {
        slidesPerView: 4,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      1024: {
        allowTouchMove: true,
        slidesPerView: 4,
        spaceBetween: 15,
      },
      1200: {
        allowTouchMove: false,
        slidesPerView: 5,
        spaceBetween: 15,
      },
      1400: {
        allowTouchMove: false,
        slidesPerView: 5,
        spaceBetween: 30,
      },
    },
    pagination: {
      el: ".pagination-categories-3",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + "</span>";
      }
    },
  });
}
if ($(".slide-blog-item").length > 0) {
  var swiper = new Swiper('.slide-blog-item', {
    slidesPerView: 3,
    breakpoints: {
      300: {
        slidesPerView: 1,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      767: {
        slidesPerView: 2,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      991: {
        slidesPerView: 3,
        allowTouchMove: true,
        spaceBetween: 10,
      },
      1024: {
        allowTouchMove: false,
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
}