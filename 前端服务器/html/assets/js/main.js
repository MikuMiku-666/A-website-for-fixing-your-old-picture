(function ($) {
    "use strict";
////////////////////////////////////////////////////////////////////////
// 01. Screen Width
var device_width = window.screen.width;


////////////////////////////////////////////////////////////////////////
// 02. Meanmenu
$('#mobile-menu').meanmenu({
	meanMenuContainer: '.mobile-menu',
	meanScreenWidth: "991"
});

////////////////////////////////////////////////////////////////////////
// 03. Mobile Side Menu
$('.side-toggle').on('click', function () {
	$('.side-info').addClass('info-open');
	$('.offcanvas-overlay').addClass('overlay-open');
})

$('.side-info-close,.offcanvas-overlay').on('click', function () {
	$('.side-info').removeClass('info-open');
	$('.offcanvas-overlay').removeClass('overlay-open');
});


////////////////////////////////////////////////////////////////////////
// 04. Banner Active 3
const h3_bannerActive = new Swiper(".h3_banner-active", {
	slidesPerView: 3,
	spaceBetween: 15,
	loop: true,
	speed: 5000,
	allowTouchMove: false,
	direction: "vertical",
	autoplay: {
		delay: 1,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 1,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 3
		}
	}
});


////////////////////////////////////////////////////////////////////////
// 05. Banner Active 2
const h3_bannerActive2 = new Swiper(".h3_banner-active-2", {
	slidesPerView: 3,
	spaceBetween: 15,
	loop: true,
	speed: 5000,
	direction: "vertical",
	allowTouchMove: false,
	autoplay: {
		delay: 1,
		reverseDirection: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 1,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 3
		}
	}
});



////////////////////////////////////////////////////////////////////////
// 06. Testimonial Active
const testimonialActive = new Swiper(".testimonial-active", {
	slidesPerView: 4,
	spaceBetween: 30,
	loop: true,
  	speed: 8000,
	allowTouchMove: false,
  	autoplay: {
		delay: 1,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 4
		},
		1400: {
			slidesPerView: 4
		},
		1600: {
			slidesPerView: 5
		}
	}
});

////////////////////////////////////////////////////////////////////////
// 07. Testimonial Active 2
const testimonialActiveTwo = new Swiper(".testimonial-active-2", {
	slidesPerView: 4,
	spaceBetween: 30,
	loop: true,
	speed: 8000,
	allowTouchMove: false,
	autoplay: {
		delay: 1,
    reverseDirection: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 4
		},
		1400: {
			slidesPerView: 4
		},
		1600: {
			slidesPerView: 5
		}
	}
});


////////////////////////////////////////////////////////////////////////
// 08. Testimonial Active 3
const h2_testimonialActive = new Swiper(".h2_testimonial-active", {
	slidesPerView: 4,
	spaceBetween: 30,
	loop: true,
	speed: 4000,
  	autoplay: {
		delay: 1000,
	},
 	pagination: {
		el: ".h2_testimonial-pagination",
		clickable: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 2,
		},
		1200: {
			slidesPerView: 3
		},
		1400: {
			slidesPerView: 3
		}
	}
});

////////////////////////////////////////////////////////////////////////
// 09. Testimonial Active 4
const h3_testimonialActive = new Swiper(".h3_testimonial-active", {
	slidesPerView: 4,
	spaceBetween: 30,
	centeredSlides: true,
	loop: true,
	speed: 6000,
  	autoplay: {
		delay: 1,
	},
  	pagination: {
		el: ".h3_testimonial-pagination",
		clickable: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 3
		},
		1400: {
			slidesPerView: 4
		},
		1600: {
			slidesPerView: 5
		}
	}
});

////////////////////////////////////////////////////////////////////////
// 10. Testimonial Active 5
const h4_testimonialActive = new Swiper(".h4_testimonial-active", {
	slidesPerView: 4,
	spaceBetween: 30,
	loop: true,
	speed: 2000,
  	autoplay: {
		delay: 1,
	},
  	pagination: {
		el: ".h4_testimonial-pagination",
		clickable: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 4
		},
		1400: {
			slidesPerView: 4
		},
		1600: {
			slidesPerView: 5
		}
	}
});

////////////////////////////////////////////////////////////////////////
// 11. Shop Active
const h5_shopActive = new Swiper(".h5_shop-active", {
	slidesPerView: 4,
	spaceBetween: 30,
	centeredSlides: true,
	loop: true,
	speed: 2000,
	pagination: {
		el: ".h5_shop-pagination",
		clickable: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 1,
		},
		992: {
			slidesPerView: 1,
		},
		1200: {
			slidesPerView: 1
		},
		1400: {
			slidesPerView: 1
		}
	}
});


////////////////////////////////////////////////////////////////////////
// 12. Service Active
const h4_serviceActive = new Swiper(".h4_service-active", {
	slidesPerView: 4,
	spaceBetween: 30,
	loop: true,
	speed: 2000,
	navigation: {
		nextEl: ".h4_service-prev",
		prevEl: ".h4_service-next",
		},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 4
		},
		1400: {
			slidesPerView: 4
		}
	}
});


////////////////////////////////////////////////////////////////////////
// 13. Project Active
const h5_workActive = new Swiper(".h5_work-active", {
	slidesPerView: 4,
	spaceBetween: 30,
	loop: true,
	speed: 2000,
	navigation: {
		nextEl: ".h5_work-prev",
		prevEl: ".h5_work-next",
		},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		},
		1200: {
			slidesPerView: 4
		},
		1400: {
			slidesPerView: 4
		}
	}
});


////////////////////////////////////////////////////////////////////////
// 14. Blog Active
const h2_blogActive = new Swiper(".h2_blog-active", {
	slidesPerView: 3,
	spaceBetween: 30,
	loop: true,
	speed: 2000,
  pagination: {
		el: ".h2_blog-pagination",
		clickable: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 2,
		},
		1200: {
			slidesPerView: 3
		},
		1400: {
			slidesPerView: 3
		}
	}
});


////////////////////////////////////////////////////////////////////////
// 15. Banner Active 2
const h3_blogActive = new Swiper(".h3_blog-active", {
	slidesPerView: 3,
	spaceBetween: 30,
	loop: true,
	speed: 2000,
  pagination: {
		el: ".h3_blog-pagination",
		clickable: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			},
		576: {
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 2,
		},
		1200: {
			slidesPerView: 3
		},
		1400: {
			slidesPerView: 3
		},
		1800: {
			slidesPerView: 3
		}
	}
});


////////////////////////////////////////////////////////////////////////
// 16. Pricing Table Active
function tabtable_active() {

	var e = document.getElementById("filt-monthly"),
		d = document.getElementById("filt-yearly"),
		t = document.getElementById("switcher"),
		m = document.getElementById("monthly"),
		y = document.getElementById("hourly");

	e.addEventListener("click", function () {
		t.checked = false;
		e.classList.add("toggler--is-active");
		d.classList.remove("toggler--is-active");
		m.classList.remove("hide");
		y.classList.add("hide");
	});

	d.addEventListener("click", function () {
		t.checked = true;
		d.classList.add("toggler--is-active");
		e.classList.remove("toggler--is-active");
		m.classList.add("hide");
		y.classList.remove("hide");
	});

	t.addEventListener("click", function () {
		d.classList.toggle("toggler--is-active");
		e.classList.toggle("toggler--is-active");
		m.classList.toggle("hide");
		y.classList.toggle("hide");
	})
}
if ($('#filt-monthly').length > 0) { 
	tabtable_active();
}

////////////////////////////////////////////////////////////////////////
// 17. Background Active
$("[data-background]").each(function(){
	$(this).css("background-image","url("+$(this).attr("data-background") + ") ")
})

////////////////////////////////////////////////////////////////////////
// 18. Popup Active
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
	  enabled: true
	}
});

////////////////////////////////////////////////////////////////////////
// 19. Nice Select Active
$('.has-nice-select, select').niceSelect();

////////////////////////////////////////////////////////////////////////
// 20. Cursor Active
var myCursor = $('.rts-cursor');
if (myCursor.length) {
	if ($("body").length) {
	const e = document.querySelector(".cursor-inner"),
		t = document.querySelector(".cursor-outer");
	var n, i = 0,
		W = 0,
		intro = 0,
		o = !1;
	// if($('.xoxo_fn_intro').length){intro=1;}
	var buttons = "a, button, .active-progress, .search-click, .action-menu, .swiper-button-next, .swiper-button-prev";
	var remove_cursor = ".learn-more-btn, .swiper-slider-main-main-wrapper-portfolio .thumbnail, .single-portfolio-style-five a, .mySwiper_portfolio-5-scale-none a";
	// link mouse enter + move
	window.onmousemove = function (s) {
		o || (t.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)"), e.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)", n = s.clientY, i = s.clientX
	}, $("body").on("mouseenter", buttons, function () {
		e.classList.add("cursor-hover"), t.classList.add("cursor-hover")
	}), $("body").on("mouseleave", buttons, function () {
		$(this).is("a") && $(this).closest(".cursor-link").length || (e.classList.remove("cursor-hover"), t.classList.remove("cursor-hover"))
	}), e.style.visibility = "visible", t.style.visibility = "visible";
	// slider mouse enter
	var mightyBody = jQuery('body');
	mightyBody.on('mouseenter', remove_cursor, function () {
		e.classList.add('cursor-remove');
		t.classList.add('cursor-remove');
	}).on('mouseleave', remove_cursor, function () {
		e.classList.remove('cursor-remove');
		t.classList.remove('cursor-remove');
	});
	}
}

////////////////////////////////////////////////////////////////////////
// 21. Gsap Active
  if (document.querySelector("#has_smooth").classList.contains("has-smooth")) {
    const smoother = ScrollSmoother.create({
      smooth: 1.35,
      effects: device_width < 1025 ? false : true,
      smoothTouch: 0.1,
      normalizeScroll: false,
      ignoreMobileResize: true,
    });
}

////////////////////////////////////////////////////////////////////////
// 22. Title Animation
let splitTitleLines = gsap.utils.toArray(".tp_title_slideup");

splitTitleLines.forEach(splitTextLine => {
    const titleLine = gsap.timeline({
    scrollTrigger: {
        trigger: splitTextLine,
        start: 'top 100%',
        end: 'bottom 50%',
        scrub: false,
        markers: false,
        toggleActions: 'play none none none'
    }
    });

    const itemSplitted = new SplitText(splitTextLine, { type: "words, lines" });
    gsap.set(splitTextLine, { perspective: 400 });
    itemSplitted.split({ type: "lines" })
    titleLine.from(itemSplitted.lines, { duration: 1, delay: 0.1, opacity: 0, rotationX: -50, force3D: true, transformOrigin: "top center -50", stagger: 0.1 });
});

////////////////////////////////////////////////////////////////////////////////
// 23. Section Heading Animation

let headingTimeline = gsap.timeline()

let subTitleContainer = new SplitText(".tp_subtitle_anim", { type: "chars" });
let subTitleChar = subTitleContainer.chars 
headingTimeline.from(subTitleChar, {
  x: 20,
  ease: "back.out",
  opacity: 0,
  duration: 1,
  stagger: 0.1
});

let TitleContainer = new SplitText(".tp_title_anim", { type: "chars, words" });
let TitleChar = TitleContainer.words 
headingTimeline.from(TitleChar, {
    x: 100,
    y: 0,
    z: -200,
    autoAlpha: 0,
    duration: 2,
    stagger: 0.2
},"-=2");

let descriptionContainer = new SplitText(".tp_desc_anim", { type: "chars, words" });
let descriptionChar = descriptionContainer.words 
headingTimeline.from(descriptionChar, {
    x: 50,
    autoAlpha: 0,
    duration: 1,
    stagger: 0.05
},"-=2"); 


/////////////////////////////////////////////////////
// 24. SlideUp Slider Animation | tp_fade_bottom

gsap.set(".tp_fade_bottom", { y: 50, opacity: 0 });

const fadeArray = gsap.utils.toArray(".tp_fade_bottom")
    fadeArray.forEach((item, i) => {
    let fadeTl = gsap.timeline({
        scrollTrigger: {
        trigger: item,
        start: "top center+=300",
        }
    })
    fadeTl.to(item, {
        y: 0,
        opacity: 1,
        ease: "power2.out",
        duration: 1.5,
    })
})

/////////////////////////////////////////////////////
// 25. SlideUp Slider Animation footer | tp_fade_bottom_footer

gsap.set(".tp_fade_bottom_footer", { y: 50, opacity: 0 });

const footerFadeArray = gsap.utils.toArray(".tp_fade_bottom_footer")
footerFadeArray.forEach((item, i) => {
    let fadeTl = gsap.timeline({
        scrollTrigger: {
        trigger: item,
        start: "top 105%",
        }
    })
    fadeTl.to(item, {
        y: 0,
        opacity: 1,
        ease: "power2.out",
        duration: 1.5,
    })
})


/////////////////////////////////////////////////////
// 26. SlideLeft Slider Animation | tp_fade_left
gsap.set(".tp_fade_left", { x: 30, opacity: 0 });

const fadeleftArray = gsap.utils.toArray(".tp_fade_left")
fadeleftArray.forEach((item, i) => {
    let fadeTl = gsap.timeline({
        scrollTrigger: {
        trigger: item,
        start: "top center+=300",
        }
    })
    fadeTl.to(item, {
        x: 0,
        opacity: 1,
        ease: "power2.out",
        duration: 1,
    })
})


/////////////////////////////////////////////////////
// 27. SlideLeft Slider Animation | tp_fade_right
gsap.set(".tp_fade_right", { x: -30, opacity: 0 });

const fadeRightArray = gsap.utils.toArray(".tp_fade_right")
fadeRightArray.forEach((item, i) => {
    let fadeTl = gsap.timeline({
        scrollTrigger: {
        trigger: item,
        start: "top center+=300",
        }
    })
    fadeTl.to(item, {
        x: 0,
        opacity: 1,
        ease: "power2.out",
        duration: 1,
    })
})



/////////////////////////////////////////////////////
// 28. Product Counting
var productQuantity = 1;

// quantity form 
$('.quantity-box .plus').on('click', function () {
	var selectedInput = $(this).closest('.quantity-box').find('input');
	productQuantity += 1;
	selectedInput.attr('value', productQuantity);
});
$('.quantity-box .minus').on('click', function () {
	var selectedInput = $(this).closest('.quantity-box').find('input');
	productQuantity-=1;
	if(productQuantity < 1) {
		productQuantity = 1;
	}
	selectedInput.attr('value', productQuantity);
});



/////////////////////////////////////////////////////
// 29. heading Text Reveal Animation 

const anim_reveal = document.querySelectorAll(".tp_has_text_reveal_anim");

anim_reveal.forEach(areveal => {

    var duration_value = 1
    var onscroll_value = 1
    var stagger_value = 0.02
    var data_delay = 0.05

    if (areveal.getAttribute("data-duration")) {
        duration_value = areveal.getAttribute("data-duration");
    }
    if (areveal.getAttribute("data-on-scroll")) {
        onscroll_value = areveal.getAttribute("data-on-scroll");
    }
    if (areveal.getAttribute("data-stagger")) {
        stagger_value = areveal.getAttribute("data-stagger");
    }
    if (areveal.getAttribute("data-delay")) {
        data_delay = areveal.getAttribute("data-delay");
    }



    areveal.split = new SplitText(areveal, {
        type: "lines,words,chars",
        linesClass: "anim-reveal-line"
    });

    if (onscroll_value == 1) {
        areveal.anim = gsap.from(areveal.split.chars, {
            scrollTrigger: {
                trigger: areveal,
                start: 'top 85%',
            },
            duration: duration_value,
            delay: data_delay,
            ease: "circ.out",
            y: 50,
            stagger: stagger_value,
            opacity: 0,
        });
    } else {
        areveal.anim = gsap.from(areveal.split.chars, {
            duration: duration_value,
            delay: data_delay,
            ease: "circ.out",
            y: 50,
            stagger: stagger_value,
            opacity: 0,
        });
    }

});


/////////////////////////////////////////////////////
// 30. common Fade Animation 

const dfadeArray = gsap.utils.toArray(".tp_has_fade_anim")
// gsap.set(dfadeArray, {opacity:0})
dfadeArray.forEach((item, i) => {

    var fade_direction = "bottom"
    var onscroll_value = 1
    var duration_value = 1
    var fade_offset = 30
    var delay_value = 0.02
    var ease_value = "power2.out"

    if (item.getAttribute("data-fade-offset")) {
        fade_offset = item.getAttribute("data-fade-offset");
    }
    if (item.getAttribute("data-duration")) {
        duration_value = item.getAttribute("data-duration");
    }

    if (item.getAttribute("data-fade-from")) {
        fade_direction = item.getAttribute("data-fade-from");
    }
    if (item.getAttribute("data-on-scroll")) {
        onscroll_value = item.getAttribute("data-on-scroll");
    }
    if (item.getAttribute("data-delay")) {
        delay_value = item.getAttribute("data-delay");
    }
    if (item.getAttribute("data-ease")) {
        ease_value = item.getAttribute("data-ease");
    }

    if (onscroll_value == 1) {
        if (fade_direction == "top") {
            gsap.from(item, {
                y: -fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 85%',
                }
            })
        }
        if (fade_direction == "left") {
            gsap.from(item, {
                x: -fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 85%',
                }
            })
        }
        if (fade_direction == "bottom") {
            gsap.from(item, {
                y: fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 85%',
                }
            })
        }
        if (fade_direction == "right") {
            gsap.from(item, {
                x: fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 85%',
                }
            })
        }
        if (fade_direction == "in") {
            gsap.from(item, {
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
                scrollTrigger: {
                    trigger: item,
                    start: 'top 85%',
                }
            })
        }
    }
    else {
        if (fade_direction == "top") {
            gsap.from(item, {
                y: -fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
            })
        }
        if (fade_direction == "left") {
            gsap.from(item, {
                x: -fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
            })
        }
        if (fade_direction == "bottom") {
            gsap.from(item, {
                y: fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
            })
        }
        if (fade_direction == "right") {
            gsap.from(item, {
                x: fade_offset,
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
            })
        }
        if (fade_direction == "in") {
            gsap.from(item, {
                opacity: 0,
                ease: ease_value,
                duration: duration_value,
                delay: delay_value,
            })
        }
    }
})


/////////////////////////////////////////////////////
// 31. Portfolio Animation
if (device_width > 1199) {
	gsap.set(".banner_img_anim img", { width: '70%' });
	let imageTl_8 = gsap.timeline({
		scrollTrigger: {
		trigger: ".banner_img_anim",
		start: "top 80%",
		scrub: 1,
		end: "bottom 70%",
		}
	});
	imageTl_8.to(".banner_img_anim img", {
		width: "100%",
	});
}

const tl = gsap.timeline({
	scrollTrigger: {
	  scrub: 2,
	  trigger: ".inner_work-area",
	  start: 'top 80%',
	  end: "bottom 40%",
	//   markers: true,
	},
  });
  
  tl.to(".tp_fade_rightt", {
	rotateZ: 360,
  });
  

})(jQuery);