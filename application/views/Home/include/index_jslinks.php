<!-- External JavaScripts -->
<script src="<?= base_url('public') ?>/assets/js/jquery.min.js"></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap/js/popper.min.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap/js/bootstrap.min.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap-select/bootstrap-select.min.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/magnific-popup/magnific-popup.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/counter/waypoints-min.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/counter/counterup.min.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/imagesloaded/imagesloaded.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/masonry/masonry.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/masonry/filter.js" defer></script>
<script src="<?= base_url('public') ?>/assets/vendors/owl-carousel/owl.carousel.js" defer></script>
<script src="<?= base_url('public') ?>/assets/js/functions.js" defer></script>
<script src="<?= base_url('public') ?>/assets/js/contact.js" defer></script>
<script src="<?= base_url('public') ?>/assets/js/form.js" defer></script>
<!-- Revolution JS Files removed -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js" defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js" defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js" defer></script>

<!-- Firebase Push Notification Scripts -->
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js"></script>
<script src="<?= base_url('public/js/web-push-client.js?v=1.0.1') ?>" defer></script>



<script>

    $(document).ready(function () {

        //navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],

        $(".placement_carousel").owlCarousel({
            loop: true,
            autoplay: true,
            dots: true,
            autoplayTimeout: 2500,
            nav: !1,
            dots: !0,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            autoplayHoverPause: true,
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
    function Enquiry() {
        $("#enquiryModal").modal('show');
    }
    function openSocial() {
        // alert(1);
        $("#socialModal").modal('show');
    }


</script>

<script>
    $().ready(function () {
        $("#quick").validate({});
    })
</script>
<!-- <script>
    $().ready(function() {
        $("#news").validate({});
    })
</script> -->
<!-- Revolution Slider init removed -->

<script>
    $("input[name='yourinput']").keypress(function (event) {
        if (event.keyCode == 17) {
            event.preventDefault();
        }
    });
</script>
<script>
    document.onkeydown = function (e) {
        return false;
    }
</script>
<script type="text/javascript">
    function disable() {
        document.onkeydown = function (e) {
            return false;
        }
    }

    function enable() {
        document.onkeydown = function (e) {
            return true;
        }
    }
</script>

<!-- Lazy Loader (IntersectionObserver + MutationObserver for Swiper Clones & Dynamic Content) -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting || entry.intersectionRatio > 0) {
                        var image = entry.target;
                        var src = image.getAttribute('data-src');
                        if (src) {
                            image.src = src;
                            image.removeAttribute('data-src');
                            image.classList.remove('lazy');
                            imageObserver.unobserve(image);
                        }
                    }
                });
            }, {
                rootMargin: '200px 200px 200px 200px',
                threshold: 0.01
            });

            function observeLazyImages() {
                var lazyImages = document.querySelectorAll('img[data-src], img.lazy');
                lazyImages.forEach(function (img) {
                    if (img.getAttribute('data-src')) {
                        imageObserver.observe(img);
                    }
                });
            }
            observeLazyImages();

            // Observe dynamic added nodes (like Swiper cloned slides)
            var mutationObserver = new MutationObserver(function (mutations) {
                mutations.forEach(function (mutation) {
                    mutation.addedNodes.forEach(function (node) {
                        if (node.nodeType === 1) { // Element Node
                            if (node.tagName === 'IMG' && node.getAttribute('data-src')) {
                                imageObserver.observe(node);
                            } else if (node.querySelectorAll) {
                                var childImgs = node.querySelectorAll('img[data-src]');
                                childImgs.forEach(function (img) {
                                    imageObserver.observe(img);
                                });
                            }
                        }
                    });
                });
            });

            mutationObserver.observe(document.body, { childList: true, subtree: true });
        } else {
            // Fallback for very old browsers
            document.querySelectorAll('img[data-src]').forEach(function (img) {
                var src = img.getAttribute('data-src');
                if (src) img.src = src;
            });
        }
    });
</script>
<script>
    // ==================== SWIPER SLIDER ====================
    document.addEventListener("DOMContentLoaded", function () {
        // Banner Swiper
        var bannerSwiper = new Swiper(".banner-swiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            allowTouchMove: false,
            speed: 3000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            breakpoints: {
                320: { slidesPerView: 1.2, spaceBetween: 15 },
                480: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 25 }
            }
        });

        // Manual hover pause backup
        const bannerEl = document.querySelector('.banner-swiper');
        if (bannerEl) {
            bannerEl.addEventListener('mouseenter', () => bannerSwiper.autoplay.stop());
            bannerEl.addEventListener('mouseleave', () => bannerSwiper.autoplay.start());
        }

        // Placement Swiper (Left to Right)
        var placementSwiper = new Swiper(".placement-swiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            allowTouchMove: false,
            speed: 3000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                reverseDirection: true,
                pauseOnMouseEnter: true
            },
            breakpoints: {
                320: { slidesPerView: 1.2, spaceBetween: 15 },
                480: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 25 }
            }
        });

        // Manual hover pause backup
        const placementEl = document.querySelector('.placement-swiper');
        if (placementEl) {
            placementEl.addEventListener('mouseenter', () => placementSwiper.autoplay.stop());
            placementEl.addEventListener('mouseleave', () => placementSwiper.autoplay.start());
        }

        // Team Swiper
        var teamSwiper = new Swiper(".team-swiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            allowTouchMove: false,
            speed: 3000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            breakpoints: {
                320: { slidesPerView: 1.2, spaceBetween: 15 },
                480: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 25 }
            }
        });

        // Manual hover pause backup
        const teamEl = document.querySelector('.team-swiper');
        if (teamEl) {
            teamEl.addEventListener('mouseenter', () => teamSwiper.autoplay.stop());
            teamEl.addEventListener('mouseleave', () => teamSwiper.autoplay.start());
        }

        // Elementor Slider (Existing)
        new Swiper(".elementor-image-carousel-wrapper.swiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            speed: 800,
            pauseOnMouseEnter: true,
            grabCursor: true,
            breakpoints: {
                320: { slidesPerView: 1 },
                576: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    });
</script>
<script>
    // Premium Loader Global Functions
    function showPremiumLoader(message) {
        var textElem = document.getElementById('premium-loader-text');
        if (textElem) textElem.innerText = message || 'Processing...';
        var overlay = document.getElementById('premium-loader-overlay');
        if (overlay) overlay.classList.add('active');
    }

    function hidePremiumLoader() {
        var overlay = document.getElementById('premium-loader-overlay');
        if (overlay) overlay.classList.remove('active');
    }

    if (document.readyState === 'interactive' || document.readyState === 'complete') {
        hidePremiumLoader();
    } else {
        document.addEventListener('DOMContentLoaded', hidePremiumLoader);
    }
</script>