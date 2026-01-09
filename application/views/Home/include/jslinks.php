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

<!-----------floating button------------->

<div id="feedback2">
    <a href="Registration" aria-label="left-align">Register For Training</a>
</div>

<div id="feedback3">
    <a href="https://assessment.thedigicoders.com/" aria-label="left-align">Assessment Portal</a>
</div>


<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enquiry Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="contact-bx form" id="quick" action="<?= base_url() ?>Home/submitForm/Enquiry"
                    method="POST">
                    <div class="ajax-message"></div>
                    <div class="row placeani">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span>Your Name</span>
                                    <input name="name" type="text" required="" class="form-control valid-character">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span>Your Email</span>
                                    <input name="email" type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span>Your Phone</span>
                                    <input name="phone" type="text" maxlength="10" minlength="10" required=""
                                        class="form-control int-value">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span>Type Message</span>
                                    <textarea name="message" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn radius-xl button-md">Submit Your Query</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Social Links Modal -->
<div class="modal fade mt-5" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Follow Us On Social Media </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-6 col-sm-6">

                        <a href="https://www.facebook.com/DigiCodersTech/"
                            class="btn btn-primary float-right text-white" style="background: #166FE5; color: white"><i
                                class="fa fa-facebook-official" aria-hidden="true"></i>&ensp;<span
                                class="Followtest">Follow Us On Facebook</span></a>

                    </div>
                    <div class="col-6 col-sm-6 ">
                        <a href="https://instagram.com/digicoderstechnologies/"
                            style="background: #FB5441; color: white" class="btn btn-danger text-white"><i
                                class="fa fa-instagram" aria-hidden="true"></i>&ensp;<span class="Followtest">Follow Us
                                On Instagram</span></a>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-4 mx-auto">
                        <img src="<?= base_url('public/assets/images/favicon.png') ?>" class="img-fluid"
                            style="border-radius: 50% height: 30px;" ;>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="p-3 text-center">&ldquo;A Company working with Young Engineer's, Entrepreneur's and
                            Innovative Team.&rdquo;<h4>
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
                                window.location.href = "/Home/Index"
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