/**
 ¸ü¶àÏÂÔØ£ºhttps://www.bootstrapmb.com 
 * headerFixed
 * btnmenu
 * topbar
 * totalNumberVariant
 * action_click
 * video
 * hover_BoxCard
 * btn_filter
 * tabs
 * progresslevel
 * infiniteScroll
 * autoPopup
 * ajaxContactForm
 * footer
 * datePicker
 * gotop
 * preloader
    
**/

(function ($) {
    ("use strict");

    var headerFixed = function () {
        if ($("header").hasClass("header-fixed")) {
            var nav = $("#header_main");

            if (nav.length) {
                var offsetTop = nav.offset().top,
                    headerHeight = nav.height(),
                    injectSpace = $("<div>", {
                        height: headerHeight,
                    });
                injectSpace.hide();

                if ($("header").hasClass("style-absolute")) {
                    injectSpace.hide();
                } else {
                    injectSpace.insertAfter(nav);
                }

                $(window).on("load scroll", function () {
                    if ($(window).scrollTop() > offsetTop + headerHeight) {
                        nav.addClass("is-fixed");
                        injectSpace.show();
                        $(".header .top").hide();
                    } else {
                        nav.removeClass("is-fixed");
                        injectSpace.hide();
                        $(".header .top").show();
                    }

                    if ($(window).scrollTop() > 500) {
                        nav.addClass("is-small");
                    } else {
                        nav.removeClass("is-small");
                    }
                });
            }
        }
    }
    var btnmenu = function () {
        if ($('header').hasClass('header')) {
            $('.mobile-button').on('click', function () {
                $(this).closest('#header_main').find('.mobile-nav-wrap').toggleClass('active');
            });
            $('.mobile-nav-close').on('click', function () {
                $(this).closest('#header_main').find('.mobile-nav-wrap').toggleClass('active');
            });
            $('.mobile-nav-wrap .overlay-mobile-nav').on('click', function () {
                $(this).closest('#header_main').find('.mobile-nav-wrap').toggleClass('active');
            });
        }
    }
    var topbar = function () {
        $(".btn-show-top").on("click", function () {
            $(this).closest(".top-bar").toggleClass("active");
        });
    };
    var totalNumberVariant = function () {
        if ($("body").hasClass("total-number-variant")) {
            var quantityInput = $(".number-adults");
            var quantityInput2 = $(".number-children");
            var quantityInput3 = $(".number-infants");
            var quantityInput4 = $(".number-pets");
            $(".plus-btn-1").on("click", function () {
                var currentQuantity = parseInt(quantityInput.val(),3);
                quantityInput.val(currentQuantity + 1);
                updateTotalPrice();
            });
            $(".minus-btn-1").on("click", function () {
                var currentQuantity = parseInt(quantityInput.val(),3);
                if (currentQuantity > 1) {
                    quantityInput.val(currentQuantity - 1);
                    updateTotalPrice();
                }
            });
            $(".plus-btn-2").on("click", function () {
                var currentQuantity = parseInt(quantityInput2.val(),3);
                quantityInput2.val(currentQuantity + 1);
                updateTotalPrice();
            });
            $(".minus-btn-2").on("click", function () {
                var currentQuantity = parseInt(quantityInput2.val(),3);
                if (currentQuantity > 1) {
                    quantityInput2.val(currentQuantity - 1);
                    updateTotalPrice();
                }
            });
            $(".plus-btn-3").on("click", function () {
                var currentQuantity = parseInt(quantityInput3.val(),3);
                quantityInput3.val(currentQuantity + 1);
                updateTotalPrice();
            });
            $(".minus-btn-3").on("click", function () {
                var currentQuantity = parseInt(quantityInput3.val(),3);
                if (currentQuantity > 1) {
                    quantityInput3.val(currentQuantity - 1);
                    updateTotalPrice();
                }
            });
            $(".plus-btn-4").on("click", function () {
                var currentQuantity = parseInt(quantityInput4.val(),3);
                quantityInput4.val(currentQuantity + 1);
                updateTotalPrice();
            });
            $(".minus-btn-4").on("click", function () {
                var currentQuantity = parseInt(quantityInput4.val(),3);
                if (currentQuantity > 1) {
                    quantityInput4.val(currentQuantity - 1);
                    updateTotalPrice();
                }
            });

            function updateTotalPrice() {
                var quantity = parseInt(quantityInput.val(),3);
                var quantity2 = parseInt(quantityInput2.val(),3);
                var quantity3 = parseInt(quantityInput3.val(),3);
                var totalNumberPeople = quantity;
                var totalNumberPeople2 = quantity2 + quantity3;
                $(".adults").text(totalNumberPeople);
                $(".children").text(totalNumberPeople2);
            }
        }
    };
    var action_click = function () {
        $(".tf-action-btns").on("click", function () {
            $(this).toggleClass("active");
        });
    };
    var video = function () {
        if ($("div").hasClass("wg-video")) {
            $(".popup-youtube").magnificPopup({
                type: "iframe",
            });
        }
    };
    var hover_BoxCard = function () {
        if ($("body").hasClass("hover-boxcard")) {
            var elements = document.querySelectorAll('.box-card.style-2');

            elements.forEach((element) => {
                element.addEventListener('mouseenter', function () {
                    elements.forEach((el) => el.classList.remove('active'));

                    element.classList.add('active');
                });
            });
        }
    };
    var btn_filter = function () {
        $('.btn-filter').on('click', function () {
            var box = $(this).closest('.wg-filter').find('.open-filter');
            var btn = $(this).closest('.wg-filter').find('.btn-filter');
            if (!box.hasClass("active")) {
                box.addClass('active');
            }
            else box.removeClass('active');
            if (!btn.hasClass("active"))
                btn.addClass('active');
            else
                btn.removeClass('active');
        })

        $(document).on(
            "click",
            function (a) {
                if ($(a.target).closest(".wg-filter").length === 0) {
                    $('.wg-filter').find('.open-filter').removeClass("active");
                    $('.wg-filter').find('.btn-filter').removeClass("active");
                }
            }
        );
    }
    var tabs = function () {
        $(".widget-tabs").each(function () {
            $(this).find(".widget-content-tab").children().hide();
            $(this).find(".widget-content-tab").children(".active").show();
            $(this)
                .find(".widget-menu-tab")
                .children(".item-title")
                .on("click", function () {
                    var liActive = $(this).index();
                    var contentActive = $(this)
                        .siblings()
                        .removeClass("active")
                        .parents(".widget-tabs")
                        .find(".widget-content-tab")
                        .children()
                        .eq(liActive);
                    contentActive.addClass("active").fadeIn("slow");
                    contentActive.siblings().removeClass("active");
                    $(this)
                        .addClass("active")
                        .parents(".widget-tabs")
                        .find(".widget-content-tab")
                        .children()
                        .eq(liActive)
                        .siblings()
                        .hide();
                });
        });
    };
    var progresslevel = function () {
        if ($('div').hasClass('progress-bars')) {
            var bars = document.querySelectorAll('.progress-bars-line > div');
            setInterval(function () {
                bars.forEach(function (bar) {
                    var t1 = parseFloat(bar.dataset.progress);
                    var t2 = parseFloat(bar.dataset.max);
                    var getWidth = (t1 / t2) * 100;
                    bar.style.width = getWidth + '%';
                });
            }, 500);
        }
    }
    var infiniteScroll = function () {
        if ($("body").hasClass("loadmore")) {
            $(".fl-item").slice(0, 8).show();
            $(".fl-item2").slice(0, 6).show();
            $(".fl-item3").slice(0, 3).show();

            if ($(".scroll-loadmore").length > 0) {
                $(window).scroll(function () {
                    if (
                        $(window).scrollTop() >=
                        $(document).height() - $(window).height()
                    ) {
                        setTimeout(() => {
                            $(".fl-item:hidden").slice(0, 4).show();
                            if ($(".fl-item:hidden").length == 0) {
                                $(".view-more-button").hide();
                            }
                        }, 0);
                    }
                });
            }
            if ($(".loadmore-item").length > 0) {
                $(".btn-loadmore").on("click", function () {
                    setTimeout(() => {
                        $(".fl-item:hidden").slice(0, 4).show();
                        if ($(".fl-item:hidden").length == 0) {
                            $(".view-more-button").hide();
                        }
                    }, 600);
                });
            }
            if ($(".loadmore-item2").length > 0) {
                $(".btn-loadmore2").on("click", function () {
                    setTimeout(() => {
                        $(".fl-item2:hidden").slice(0, 4).show();
                        if ($(".fl-item2:hidden").length == 0) {
                            $(".view-more-button2").hide();
                        }
                    }, 600);
                });
            }
            if ($(".loadmore-item3").length > 0) {
                $(".btn-loadmore3").on("click", function () {
                    setTimeout(() => {
                        $(".fl-item3:hidden").slice(0, 4).show();
                        if ($(".fl-item3:hidden").length == 0) {
                            $(".view-more-button3").hide();
                        }
                    }, 600);
                });
            }
        }

    };
    var autoPopup = function () {
        if ($("body").hasClass("popup-loader")) {
            if ($(".auto-popup").length > 0) {
                let showPopup = sessionStorage.getItem("showPopup");
                if (!JSON.parse(showPopup)) {
                    setTimeout(function () {
                        $(".auto-popup").modal("show");
                    }, 3000);
                }
            }
            $(".btn-hide-popup").on("click", function () {
                sessionStorage.setItem("showPopup", true);
            });
        }
    };
    var ajaxContactForm = function () {
        $('#contactform,#commentform').each(function () {
            $(this).validate({
                submitHandler: function (form) {
                    var $form = $(form),
                        str = $form.serialize(),
                        loading = $('<div />', { 'class': 'loading' });

                    $.ajax({
                        type: "POST",
                        url: $form.attr('action'),
                        data: str,
                        beforeSend: function () {
                            $form.find('.send-wrap').append(loading);
                        },
                        success: function (msg) {
                            var result, cls;
                            if (msg === 'Success') {
                                result = 'Message Sent Successfully To Email Administrator';
                                cls = 'msg-success';
                            } else {
                                result = 'Error sending email.';
                                cls = 'msg-error';
                            }

                            $form.prepend(
                                $('<div />', {
                                    'class': 'flat-alert mb-20 ' + cls,
                                    'text': result
                                }).append(
                                    $('<a class="close mt-0" href="#"><i class="fa fa-close"></i></a>')
                                )
                            );

                            $form.find(':input').not('.submit').val('');
                        },
                        complete: function (xhr, status, error_thrown) {
                            $form.find('.loading').remove();
                        }
                    });
                }
            });
        }); // each contactform
    };
    var footer = function () {
        function checkScreenSize() {
            if (window.matchMedia("(max-width: 586px)").matches) {
                $(".tf-collapse-content").css("display", "none");
            } else {
                $(".footer-menu-list").siblings().removeClass("open");
                $(".tf-collapse-content").css("display", "unset");
            }
        }
        checkScreenSize();
        window.addEventListener("resize", checkScreenSize);
        var args = { duration: 250 };
        $(".title-mobile").on("click", function () {
            $(this).parent(".footer-col-block").toggleClass("open");
            if (!$(this).parent(".footer-col-block").is(".open")) {
                $(this).next().slideUp(args);
            } else {
                $(this).next().slideDown(args);
            }
        });
    };
    var datePicker = function () {
        if ($("body").hasClass("date-picker")) {
            if ($("#datepicker1").length > 0) {
                $("#datepicker1").datepicker({
                    firstDay: 1,
                    dateFormat: "dd/mm/yy",
                });
            }
            if ($("#datepicker2").length > 0) {
                $("#datepicker2").datepicker({
                    firstDay: 1,
                    dateFormat: "dd/mm/yy",
                });
            }
            if ($("#datepicker3").length > 0) {
                $("#datepicker3").datepicker({
                    firstDay: 1,
                    dateFormat: "dd/mm/yy",
                });
            }
        }
    }
    var gotop = function () {
        if ($('div').hasClass('progress-wrap')) {
            var progressPath = document.querySelector('.progress-wrap path');
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
            var updateprogress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }
            updateprogress();
            $(window).scroll(updateprogress);
            var offset = 0;
            var duration = 0;
            jQuery(window).on('scroll', function () {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery('.progress-wrap').addClass('active-progress');
                } else {
                    jQuery('.progress-wrap').removeClass('active-progress');
                }
            });
            jQuery('.progress-wrap').on('click', function (event) {
                event.preventDefault();
                jQuery('html, body').animate({ scrollTop: 0 }, duration);
                return false;
            })
        }
    }
    var preloader = function () {
        setTimeout(function () {
            $(".preload-container").fadeOut("slow", function () {
                $(this).remove();
            });
        });
    };
    // Dom Ready
    $(function () {
        headerFixed();
        btnmenu();
        topbar();
        totalNumberVariant();
        action_click();
        video();
        hover_BoxCard();
        btn_filter();
        tabs();
        progresslevel();
        infiniteScroll();
        autoPopup();
        ajaxContactForm();
        footer();
        datePicker();
        gotop();
        preloader();
    });
})(jQuery);
