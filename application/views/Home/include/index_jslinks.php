<!-- External JavaScripts -->
<script src="<?= base_url('public') ?>/assets/js/jquery.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/counter/waypoints-min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/counter/counterup.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/masonry/masonry.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/masonry/filter.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="<?= base_url('public') ?>/assets/js/functions.js"></script>
<script src="<?= base_url('public') ?>/assets/js/contact.js"></script>
<script src="<?= base_url('public') ?>/assets/js/form.js"></script>
<!-- Revoluti~/on Jav/Scripts Files -->
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider r~/evolut/on 5.0 /xtensions /(L/ad Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- @*sweet alert libraries*@ -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js" integrity="sha512-Fq/wHuMI7AraoOK+juE5oYILKvSPe6GC5ZWZnvpOO/ZPdtyA29n+a5kVLP4XaLyDy9D1IBPYzdFycO33Ijd0Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    $(document).ready(function(){
        
        //navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        
        $(".placement_carousel").owlCarousel({
            loop: true,
            autoplay: true,
            dots: true,
            autoplayTimeout: 2500,
            nav: !1,
            dots: !0,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 3
                },
                1024: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        })
        
    })

	//Emquiry Modal open
	function Enquiry()
	{
	  $("#enquiryModal").modal('show');
	}
	function openSocial()
	{
	// alert(1);
		$("#socialModal").modal('show');
	}
	
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-D5BK65EXQ3');
</script>

<script>
    $().ready(function() {
        $("#quick").validate({});
    })
</script>
<script>
    $().ready(function() {
        $("#news").validate({});
    })
</script>
<script>
    jQuery(document).ready(function() {
        'use strict';
        var ttrevapi;
        var tpj = jQuery;
        if (tpj("#rev_slider_14_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_14_1");
        } else {
            ttrevapi = tpj("#rev_slider_14_1").show().revolution({
                sliderType: "hero",
                jsFileLocation: "revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                particles: {
                    startSlide: "first",
                    endSlide: "last",
                    zIndex: "6",
                    particles: {
                        number: {
                            value: 100
                        },
                        color: {
                            value: "#ffffff"
                        },
                        shape: {
                            type: "circle",
                            stroke: {
                                width: 0,
                                color: "#ffffff",
                                opacity: 1
                            },
                            image: {
                                src: ""
                            }
                        },
                        opacity: {
                            value: 1,
                            random: true,
                            min: 0.25,
                            anim: {
                                enable: false,
                                speed: 3,
                                opacity_min: 0,
                                sync: false
                            }
                        },
                        size: {
                            value: 3,
                            random: true,
                            min: 0.5,
                            anim: {
                                enable: false,
                                speed: 40,
                                size_min: 1,
                                sync: false
                            }
                        },
                        line_linked: {
                            enable: false,
                            distance: 150,
                            color: "#ffffff",
                            opacity: 0.4,
                            width: 1
                        },
                        move: {
                            enable: true,
                            speed: 1,
                            direction: "top",
                            random: true,
                            min_speed: 1,
                            straight: false,
                            out_mode: "out"
                        }
                    },
                    interactivity: {
                        events: {
                            onhover: {
                                enable: true,
                                mode: "bubble"
                            },
                            onclick: {
                                enable: false,
                                mode: "repulse"
                            }
                        },
                        modes: {
                            grab: {
                                distance: 400,
                                line_linked: {
                                    opacity: 0.5
                                }
                            },
                            bubble: {
                                distance: 400,
                                size: 0,
                                opacity: 0.01
                            },
                            repulse: {
                                distance: 200
                            }
                        }
                    }
                },
                navigation: {},
                responsiveLevels: [1440, 1240, 1024, 778, 480],
                visibilityLevels: [1440, 1240, 1024, 778, 480],
                gridwidth: [1440, 1240, 1024, 778, 480],
                gridheight: [768, 768, 960, 720],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 400,
                    levels: [1, 2, 3, 4, 5, 10, 15, 20, 25, 46, 47, 48, 49, 50, 51, 55],
                },
                shadow: 0,
                spinner: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    disableFocusListener: false,
                }
            });
        }
    }); /*ready*/
</script>

<script>
    $("input[name='yourinput']").keypress(function(event) {
        if (event.keyCode == 17) {
            event.preventDefault();
        }
    });
</script>
<script>
    document.onkeydown = function(e) {
        return false;
    }
</script>
<script type="text/javascript">
    function disable() {
        document.onkeydown = function(e) {
            return false;
        }
    }

    function enable() {
        document.onkeydown = function(e) {
            return true;
        }
    }
</script>






<!-- Lazy Loader  -->
<script>
    ! function(window) {
        var $q = function(q, res) {
                if (document.querySelectorAll) {
                    res = document.querySelectorAll(q);
                } else {
                    var d = document,
                        a = d.styleSheets[0] || d.createStyleSheet();
                    a.addRule(q, 'f:b');
                    for (var l = d.all, b = 0, c = [], f = l.length; b < f; b++)
                        l[b].currentStyle.f && c.push(l[b]);

                    a.removeRule(0);
                    res = c;
                }
                return res;
            },
            addEventListener = function(evt, fn) {
                window.addEventListener ?
                    this.addEventListener(evt, fn, false) :
                    (window.attachEvent) ?
                    this.attachEvent('on' + evt, fn) :
                    this['on' + evt] = fn;
            },
            _has = function(obj, key) {
                return Object.prototype.hasOwnProperty.call(obj, key);
            };

        function loadImage(el, fn) {
            var img = new Image(),
                src = el.getAttribute('data-src');
            img.onload = function() {
                if (!!el.parent)
                    el.parent.replaceChild(img, el)
                else
                    el.src = src;

                fn ? fn() : null;
            }
            img.src = src;
        }

        function elementInViewport(el) {
            var rect = el.getBoundingClientRect()

            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.top <= (window.innerHeight || document.documentElement.clientHeight)
            )
        }

        var images = new Array(),
            query = $q('img.lazy'),
            processScroll = function() {
                for (var i = 0; i < images.length; i++) {
                    if (elementInViewport(images[i])) {
                        loadImage(images[i], function() {
                            images.splice(i, i);
                        });
                    }
                };
            };
        // Array.prototype.slice.call is not callable under our lovely IE8 
        for (var i = 0; i < query.length; i++) {
            images.push(query[i]);
        };

        processScroll();
        addEventListener('scroll', processScroll);

    }(this);
    
</script>
<script>
    // ==================== SWIPER SLIDER ====================
document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".elementor-image-carousel-wrapper.swiper", {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: true,
    autoplay: { delay: 3000, disableOnInteraction: false },
    speed: 500,
    pauseOnMouseEnter: true,
    grabCursor: true,
    breakpoints: {
      320: { slidesPerView: 1 },
      576: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      1024: { slidesPerView: 4 }
    }
  });
});
</script>