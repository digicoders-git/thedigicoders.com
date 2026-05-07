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
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!-- <script src="<?= base_url('public') ?>/Scripts/MyScript.js"></script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Lazy loader script -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript"
    src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<!-- light gallery script -->
<!-- sweet alert libraries -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script type="text/javascript"
    src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
    integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"
    type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"
    integrity="sha512-Fq/wHuMI7AraoOK+juE5oYILKvSPe6GC5ZWZnvpOO/ZPdtyA29n+a5kVLP4XaLyDy9D1IBPYzdFycO33Ijd0Pg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-beta.2/lazyload.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<button class="back-to-top fa fa-chevron-up" aria-label="top-up"></button>




<style>
    :root {
        /* Using user specified brand colors */
        --brand-orange: #E76028;
        --brand-blue: #006DAB;
        --brand-green: #00964C;
        --primary-gradient: linear-gradient(135deg, var(--brand-blue) 0%, var(--brand-orange) 100%);
        --premium-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .premium-modal {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--premium-shadow);
    }

    .gradient-header {
        background: var(--primary-gradient);
        color: white;
        border-bottom: none;
        padding: 15px 25px;
        position: relative;
    }

    .gradient-header .modal-title {
        font-weight: 800;
        letter-spacing: -0.5px;
        font-size: 1.25rem;
        color: white;
        margin-bottom: 2px;
    }

    .modal-subtitle {
        margin-bottom: 0;
        font-size: 0.85rem;
        opacity: 0.9;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 400;
    }

    .premium-input-group label {
        font-weight: 700;
        font-size: 0.85rem;
        color: #444;
        margin-bottom: 10px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .premium-input-group label i {
        color: var(--brand-blue);
        margin-right: 8px;
        width: 18px;
        text-align: center;
    }

    .premium-input-group .form-control {
        border-radius: 15px;
        border: 2px solid #edf2f7;
        padding: 14px 18px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #fdfdfd;
        height: auto;
        font-size: 0.95rem;
    }

    .premium-input-group .form-control:focus {
        border-color: var(--brand-blue);
        box-shadow: 0 0 0 4px rgba(0, 109, 171, 0.1);
        background: #fff;
    }

    .premium-btn {
        background: var(--brand-orange);
        color: white !important;
        border: none;
        padding: 10px 30px;
        border-radius: 0px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        transition: all 0.3s ease;

        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }



    .premium-btn:active {
        transform: translateY(-1px);
    }

    /* Social Modal Styles */
    .social-card {
        display: flex;
        align-items: center;
        padding: 25px;
        border-radius: 20px;
        text-decoration: none !important;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: #fff;
        border: 1px solid #f0f0f0;
        height: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
    }

    .social-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        background: white;
    }

    .social-card.facebook {
        border-bottom: 4px solid #166FE5;
    }

    .social-card.instagram {
        border-bottom: 4px solid #FB5441;
    }

    .social-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-right: 20px;
        color: white;
        flex-shrink: 0;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .facebook .social-icon {
        background: #166FE5;
    }

    .instagram .social-icon {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }

    .social-info h6 {
        margin: 0;
        font-weight: 800;
        color: #2d3748;
        font-size: 1.1rem;
    }

    .social-info span {
        font-size: 0.85rem;
        color: #718096;
        font-weight: 500;
    }

    .brand-section {
        margin-top: 40px;
        padding-top: 40px;
        border-top: 2px dashed #edf2f7;
    }

    .brand-logo-wrapper {
        width: 90px;
        height: 90px;
        background: white;
        padding: 12px;
        border-radius: 25px;
        margin: 0 auto 25px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #f7fafc;
    }

    .brand-logo {
        max-height: 60px;
        object-fit: contain;
    }

    .brand-quote {
        position: relative;
        padding: 0 50px;
    }

    .brand-quote h4 {
        font-style: italic;
        font-weight: 600;
        color: #4a5568;
        line-height: 1.7;
        font-size: 1.2rem;
        margin: 0;
    }

    .brand-quote i {
        color: var(--brand-green);
        font-size: 1.8rem;
        position: absolute;
        opacity: 0.2;
    }

    .brand-quote i.fa-quote-left {
        top: -15px;
        left: 15px;
    }

    .brand-quote i.fa-quote-right {
        bottom: -15px;
        right: 15px;
    }

    .close.text-white {
        background: rgba(255, 255, 255, 0.2);
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .close.text-white:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    @media (max-width: 576px) {
        .gradient-header {
            padding: 25px 20px;
        }

        .gradient-header .modal-title {
            font-size: 1.3rem;
        }

        .brand-quote h4 {
            font-size: 1rem;
        }

        .social-card {
            padding: 18px;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
            margin-right: 15px;
        }
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content premium-modal">
            <div class="modal-header gradient-header">
                <div class="header-content">
                    <h5 class="modal-title" id="exampleModalLabel">Enquiry Now</h5>
                    <p class="modal-subtitle">Get in touch with our experts today!</p>
                </div>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form class="contact-bx form" id="quick" action="<?= base_url() ?>Home/submitForm/Enquiry"
                    method="POST">
                    <div class="ajax-message"></div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="premium-input-group">
                                <label><i class="fa fa-user"></i> Your Name</label>
                                <input name="name" type="text" required="" class="form-control valid-character"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="premium-input-group">
                                <label><i class="fa fa-envelope"></i> Your Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="premium-input-group">
                                <label><i class="fa fa-phone"></i> Your Phone</label>
                                <input name="phone" type="text" maxlength="10" minlength="10" required=""
                                    class="form-control int-value" placeholder="Enter 10 digit number">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="premium-input-group">
                                <label><i class="fa fa-comment"></i> Type Message</label>
                                <textarea name="message" rows="3" class="form-control"
                                    placeholder="How can we help you?"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="premium-btn">Submit Your Query <i
                                class="fa fa-paper-plane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Social Links Modal -->
<div class="modal fade" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="socialModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content premium-modal">
            <div class="modal-header gradient-header">
                <h5 class="modal-title" id="socialModalLabel">Follow Us On Social Media</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="https://www.facebook.com/DigiCodersTech/" target="_blank" class="social-card facebook">
                            <div class="social-icon"><i class="fa fa-facebook-official"></i></div>
                            <div class="social-info">
                                <h6>Facebook</h6>
                                <span>Join our community</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="https://instagram.com/digicoderstechnologies/" target="_blank"
                            class="social-card instagram">
                            <div class="social-icon"><i class="fa fa-instagram"></i></div>
                            <div class="social-info">
                                <h6>Instagram</h6>
                                <span>Follow our journey</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="brand-section text-center">
                    <div class="brand-logo-wrapper">
                        <img src="<?= base_url('public/assets/images/favicon.png') ?>" alt="Logo"
                            class="img-fluid brand-logo">
                    </div>
                    <div class="brand-quote">
                        <i class="fa fa-quote-left"></i>
                        <h4 class="px-2 px-md-0">A Company working with Young Engineer's, Entrepreneur's and Innovative
                            Team.</h4>
                        <i class="fa fa-quote-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    //Open Socialmedia Modal After Download Broucher 
    function OpenSocialModal() {
        $("#socialModal").modal('show');
    }

    function Insert(contactId) {
        swal({
            title: "Are you sure?",
            text: "Once modified, you will not be able to recover your profile!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: {
                            id: contactId
                        },
                        url: "/Home/Contact",
                        dataType: "json",
                        success: function (response) {
                            swal("Poof! Your profile has been modified!", {
                                icon: "success",
                            }).then(function () {
                                window.location.href = "/"
                            });

                        },
                        failure: function (response) {
                            alert(response.responseText);
                        },
                        error: function (response) {
                            alert(response.responseText);
                        }
                    });

                } else {
                    swal("Your profil is safe!");
                }
            });
    }

    function getPrice() {
        var techName = ["Vocational Training", "Summer Training", "Winter Training", "Industrial Training", "Apprenticeship Training", "Internship Training", "Project Training", "Syllabus Training", "Faculty Training"];
        var techPrice = ["500", "500", "500", "1000", "2000", "2000", "1000", "1000", "1000"];
        var remainPrice = ["4000", "4000", "4000", "7000", "10000", "10000", "3000", "3000", "3000"];
        var i = 0;
        var count = 0;
        var tn = $("#techname").val();
        for (i = 0; i < techName.length; i++) {
            if (tn == techName[i]) {
                break;
            } else {
                count++;
            }
        }
        $("#Amount").val(techPrice[count]);
        $("#RAmount").text(remainPrice[count]);
    }
</script>


<script>
    $().ready(function () {
        $("#reg").validate({});
    })
</script>
<script>
    $().ready(function () {
        $("#mn").validate({});
    })
</script>
<script>
    $().ready(function () {
        $("#rf").validate({});
    })
</script>
<script>
    $().ready(function () {
        $("#projectenquiry").validate({});
    });
</script>

<!-- Lazy Loader  -->
<script>
    ! function (window) {
        var $q = function (q, res) {
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
            addEventListener = function (evt, fn) {
                window.addEventListener ?
                    this.addEventListener(evt, fn, false) :
                    (window.attachEvent) ?
                        this.attachEvent('on' + evt, fn) :
                        this['on' + evt] = fn;
            },
            _has = function (obj, key) {
                return Object.prototype.hasOwnProperty.call(obj, key);
            };

        function loadImage(el, fn) {
            var img = new Image(),
                src = el.getAttribute('data-src');
            img.onload = function () {
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
            processScroll = function () {
                for (var i = 0; i < images.length; i++) {
                    if (elementInViewport(images[i])) {
                        loadImage(images[i], function () {
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


<script>
    // Premium Loader Global Functions
    function showPremiumLoader(message) {
        var textElem = document.getElementById('premium-loader-text');
        if (textElem) textElem.innerText = message || "Processing...";
        var overlay = document.getElementById('premium-loader-overlay');
        if (overlay) overlay.classList.add('active');
    }

    function hidePremiumLoader() {
        var overlay = document.getElementById('premium-loader-overlay');
        if (overlay) overlay.classList.remove('active');
    }

    if (document.readyState === 'complete') {
        hidePremiumLoader();
    } else {
        window.addEventListener('load', hidePremiumLoader);
    }
</script>
<script>
    $(document).ready(function() {
        // Universal AJAX Handler for Enquiry and Contact Forms
        $(document).on("submit", "form[action*=\"submitForm/Enquiry\"], form[action*=\"WebinarReg\"]", function (e) {
            e.preventDefault();
            var form = $(this);
            var btn = form.find("button[type=\"submit\"]");
            var spin = form.find(".fa-spin"); // Target any spin icon
            
            btn.prop("disabled", true);
            spin.removeClass("d-none");
            
            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: form.serialize(),
                dataType: "json",
                success: function (data) {
                    btn.prop("disabled", false);
                    spin.addClass("d-none");
                    
                    if (data.status == "success") {
                        swal({
                            title: "Success!",
                            text: data.title || "Your enquiry has been submitted successfully.",
                            icon: "success",
                            button: "OK",
                        }).then(() => {
                            // Close any open modals
                            $(".modal").modal("hide");
                            form[0].reset();
                            
                            if(data.reload == "true") {
                                location.reload();
                            }
                        });
                    } else {
                        swal("Error", data.msg || data.title || "Something went wrong!", "error");
                    }
                },
                error: function () {
                    btn.prop("disabled", false);
                    spin.addClass("d-none");
                    swal("Error", "Network error or server issue. Please try again.", "error");
                }
            });
        });
    });
</script>
