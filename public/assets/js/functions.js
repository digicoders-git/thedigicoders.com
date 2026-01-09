! function($) {
    "use strict";
    var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B = (jQuery, a = function(a) {
            return jQuery(a).length > 0
        }, b = function() {
            a(".courses-carousel") && jQuery(".courses-carousel").owlCarousel({
                loop: !0,
                autoplay: !0,
                margin: 0,
                nav: !0,
                dots: !1,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
            })
        }, c = function() {
            a(".courses-carousel-2") && jQuery(".courses-carousel-2").owlCarousel({
                loop: !0,
                autoplay: !0,
                margin: 0,
                center: !0,
                stagePadding: 50,
                nav: !0,
                dots: !0,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 30
                    },
                    480: {
                        items: 1.5
                    },
                    1024: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    },
                    1400: {
                        items: 6
                    }
                }
            })
        }, d = function() {
            a(".upcoming-event-carousel") && jQuery(".upcoming-event-carousel").owlCarousel({
                center: !0,
                autoplay: !0,
                items: 3,
                loop: !0,
                margin: 0,
                nav: !1,
                dots: !0,
                autoplaySpeed: 1e3,
                navSpeed: 1e3,
                paginationSpeed: 1e3,
                slideSpeed: 1e3,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    650: {
                        items: 1.5
                    },
                    1024: {
                        items: 2
                    },
                    1200: {
                        items: 2
                    }
                }
            })
        }, e = function() {
            a(".recent-news-carousel") && jQuery(".recent-news-carousel").owlCarousel({
                loop: !0,
                autoplay: !0,
                margin: 30,
                nav: !1,
                dots: !0,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            })
        }, f = function() {
            a(".testimonial-carousel") && jQuery(".testimonial-carousel").owlCarousel({
                loop: !0,
                autoplay: !0,
                margin: 30,
                nav: !0,
                dots: !0,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    1024: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            })
        }, g = function() {
            a(".testimonial-carousel-2") && jQuery(".testimonial-carousel-2").owlCarousel({
                loop: !0,
                autoplay: !0,
                center: !0,
                margin: 30,
                nav: !1,
                dots: !0,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    1024: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            })
        }, {
            initialHelper: function() {
                b(), c(), d(), e(), f(), g()
            }
        }),
        C = (jQuery, h = $(window).width(), i = function() {
            h = $(window).width()
        }, j = function(a) {
            return jQuery(a).length > 0
        }, k = function() {
            jQuery("#quik-search-btn").on("click", function() {
                jQuery(".nav-search-bar").fadeIn(500).addClass("On")
            }), jQuery("#search-remove").on("click", function() {
                jQuery(".nav-search-bar").fadeOut(500).removeClass("On")
            })
        }, l = function() {
            j(".scroll-page") && $(".scroll-page").scroller()
        }, m = function() {
            if (j(".header")) {
                var a = $(".header").height(),
                    b = $(".header").css({
                        "max-height": "auto",
                        height: "auto"
                    }).height();
                $(".header").css({
                    height: a
                }).animate({
                    height: b
                }, 200)
            }
        }, n = function() {
            j(".magnific-image") && jQuery(".magnific-image").magnificPopup({
                delegate: ".magnific-anchor",
                type: "image",
                tLoading: "Loading image #%curr%...",
                mainClass: "magnific-img-mobile",
                gallery: {
                    enabled: !0,
                    navigateByImgClick: !0,
                    preload: [0, 1]
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    titleSrc: function(a) {
                        return a.el.attr("title") + "<small></small>"
                    }
                }
            }), j(".video") && jQuery(".video").magnificPopup({
                type: "iframe",
                iframe: {
                    markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe><div class="mfp-title">Some caption</div></div>'
                },
                callbacks: {
                    markupParse: function(c, a, b) {
                        a.title = b.el.attr("title")
                    }
                }
            }), j(".popup-youtube, .popup-vimeo, .popup-gmaps") && $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
                disableOn: 700,
                type: "iframe",
                mainClass: "mfp-fade",
                removalDelay: 160,
                preloader: !1,
                fixedContentPos: !1
            })
        }, o = function() {
            jQuery("button.back-to-top").on("click", function() {
                return jQuery("html").animate({
                    scrollTop: 0
                }, 500), !1
            }), jQuery(window).on("scroll", function() {
                jQuery(window).scrollTop() > 900 ? jQuery("button.back-to-top").slideDown(1e3).fadeIn(1e3) : jQuery("button.back-to-top").slideUp(1e3).fadeOut(1e3)
            })
        }, p = function() {
            if (j(".site-footer")) {
                jQuery(".site-footer").css(["display:block", "height:auto"]);
                var a = jQuery(".site-footer").outerHeight();
                h > 1280 && jQuery(".footer-fixed > .page-wraper").css("padding-bottom", a), jQuery(".site-footer").css("height", a)
            }
        }, q = function() {
            jQuery(window).on("scroll", function() {
                if (j(".sticky-header")) {
                    var a = jQuery(".sticky-header");
                    $(window).scrollTop() > a.offset().top ? a.addClass("is-fixed") : a.removeClass("is-fixed")
                }
            })
        }, r = function() {
            if (j("#masonry")) {
                var a = $("#masonry");
                jQuery(".action-card").length && a.imagesLoaded(function() {
                    a.masonry({
                        gutterWidth: 15,
                        isAnimated: !0,
                        itemSelector: ".action-card"
                    })
                }), j(".filters") && jQuery(".filters").on("click", "li", function(b) {
                    b.preventDefault();
                    var c = $(this).attr("data-filter");
                    a.masonryFilter({
                        filter: function() {
                            return !c || $(this).hasClass(c)
                        }
                    })
                })
            }
        }, s = function() {
            j(".counter") && jQuery(".counter").counterUp({
                delay: 10,
                time: 3e3
            })
        }, t = function() {
            j("select") && jQuery("select").selectpicker()
        }, u = function() {
            if (j(".countdown")) {
                var a = new Date;
                a.setDate(a.getDate() + 10), a = a.getDate() + " " + ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][a.getMonth()] + " " + a.getFullYear(), $(".countdown").countdown({
                    date: a + " 23:5"
                })
            }
        }, v = function() {
            j(".content-scroll") && $(".content-scroll").mCustomScrollbar({
                setWidth: !1,
                setHeight: !1,
                axis: "y"
            })
        }, w = function() {
            j(".wow") && new WOW({
                boxClass: "wow",
                animateClass: "animated",
                offset: 10,
                mobile: !1,
                live: !0
            }).init()
        }, x = function() {
            jQuery(".menuicon").unbind().on("click", function() {
                $(this).toggleClass("open")
            }), h <= 991 && jQuery(".navbar-nav > li > a, .sub-menu > li > a").unbind().on("click", function(a) {
                jQuery(this).parent().hasClass("open") ? jQuery(this).parent().removeClass("open") : (jQuery(this).parent().parent().find("li").removeClass("open"), jQuery(this).parent().addClass("open"))
            })
        }, y = function() {
            j(".placeani") && ($(".placeani input, .placeani textarea").focus(function() {
                $(this).parents(".form-group").addClass("focused")
            }), $(".placeani input, .placeani textarea").blur(function() {
                "" == $(this).val() ? ($(this).removeClass("filled"), $(this).parents(".form-group").removeClass("focused")) : $(this).addClass("filled")
            }))
        }, z = function() {
            setTimeout(function() {
                jQuery("#loading-icon-bx").remove()
            }, 0)
        }, A = function() {
            document.onkeydown = function(a) {
                return 123 !== a.keyCode && (!a.ctrlKey || 67 !== a.keyCode && 115 !== a.keyCode && 99 !== a.keyCode && 85 !== a.keyCode && 117 !== a.keyCode)
            }, document.addEventListener("contextmenu", function(a) {
                a.preventDefault()
            }, !1), $(document).keypress("u", function(a) {
                return !a.ctrlKey
            })
        }, {
            initialHelper: function() {
                w(), l(), m(), k(), n(), o(), y(), p(), q(), u(), v(), x(), A()
            },
            afterLoadThePage: function() {
                t(), s(), r(), z()
            },
            changeTheScreen: function() {
                i(), x(), m()
            }
        });
    jQuery(document).ready(function() {
        B.initialHelper(), C.initialHelper()
    }), jQuery(window).on("load", function(a) {
        C.afterLoadThePage()
    }), jQuery(window).on("resize", function() {
        C.changeTheScreen()
    })
}(jQuery)