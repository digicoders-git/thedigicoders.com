<!DOCTYPE html>
<html lang="en">

<head>
    <title>Best Summer Training & Internship in Lucknow, Kanpur & Gorakhpur | DigiCoders Technologies</title>
    <meta name="description"
        content="DigiCoders Technologies is the best IT training company in Lucknow, Kanpur & Gorakhpur. Offering Summer Training, Industrial Training, and Internships in AI, Python, MERN, and more.">
    <meta name="keywords"
        content="summer training in lucknow, summer training in kanpur, summer training in gorakhpur, industrial training lucknow, internship in lucknow, best it training institute in lucknow, software training lucknow">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <meta property="og:title" content="Best Summer Training & Internship in Lucknow, Kanpur & Gorakhpur | DigiCoders" />
    <meta property="og:description"
        content="Join the premier IT training institute in Uttar Pradesh. Offering high-quality industrial training and placement support in Lucknow, Kanpur, and Gorakhpur." />
    <meta property="og:url" content="<?= strtolower(base_url($this->uri->uri_string())) ?>" />
    <link rel="canonical" href="<?= strtolower(base_url($this->uri->uri_string())) ?>" />

    <!-- SEO Schemas -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "DigiCoders Technologies Pvt. Ltd.",
        "url": "<?= base_url() ?>",
        "logo": "<?= base_url('public/assets/images/logo.png') ?>",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91-9140930450",
            "contactType": "customer service"
        },
        "sameAs": [
            "https://www.facebook.com/digicoders.lucknow",
            "https://www.instagram.com/digicoders_technologies",
            "https://www.linkedin.com/company/digicoders-technologies"
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "DigiCoders Technologies",
        "image": "<?= base_url('public/assets/images/background/team-2025.jpg') ?>",
        "@id": "<?= base_url() ?>",
        "url": "<?= base_url() ?>",
        "telephone": "+91-9140930450",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Gomti Nagar",
            "addressLocality": "Lucknow",
            "postalCode": "226010",
            "addressRegion": "UP",
            "addressCountry": "IN"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 26.8467,
            "longitude": 80.9462
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ],
            "opens": "10:00",
            "closes": "18:00"
        }
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [{
            "@type": "Question",
            "name": "What is Summer Training?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Summer Training is a practical industrial training program designed for engineering students to learn latest technologies on live projects during their summer vacations."
            }
        }, {
            "@type": "Question",
            "name": "Do you provide Internship Certificate?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, we provide industry-recognized Internship Certification and Live Project Completion Certificate after successful completion of the training."
            }
        }, {
            "@type": "Question",
            "name": "Is live project included?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, every training program at DigiCoders includes hands-on experience on live industry projects."
            }
        }]
    }
    </script>

    <?php include('include/index_headerlinks.php') ?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function enablesubmitbtn() {
            document.getElementById("submitBtn").disabled = false
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/home-premium.css">

    <!-- Preload LCP Image -->
    <?php if (!empty($sliderdata)): ?>
        <link rel="preload" as="image" href="<?= base_url('public') ?>/uploads/sliders/<?= $sliderdata[0]->image ?>"
            fetchpriority="high">
    <?php endif; ?>


</head>

<body id="bg">
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">

        <!-- ===== Slider Section Start ===== -->
        <section class="dg-slider">
            <div class="dg-slider-wrapper">
                <?php
                $i = 0;
                foreach ($sliderdata as $slider) {
                    $active = ($i == 0) ? 'active' : '';
                    $priority = ($i == 0) ? 'fetchpriority="high" loading="eager"' : 'loading="lazy"';
                    ?>
                    <div class="dg-slide <?= $active ?>">
                        <img <?= $priority ?> src="<?= base_url('public') ?>/uploads/sliders/<?= $slider->image ?>"
                            alt="<?= $slider->title ?>" width="1920" height="600">

                    </div>
                    <?php
                    $i++;
                }
                ?>



            </div>
        </section>


        <!-- ===== Slider Section End ===== -->

        <!-- <div class="rev-slider bg-dark">
            <div id="rev_slider_14_1_wrapper" class="rev_slider_wrapper fullscreen-container"
                data-alias="gravitydesign1" data-source="gallery" style="background:#1d2931;padding:0px;">
                START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
        <!-- < div id="rev_slider_14_1" class="rev_slider fullscreenbanner" style="display:none;"
                    data-version="5.4.1"> -->
        <!-- <ul> -->
        <!-- SLIDE  -->
        <!-- <li data-index="rs-100" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide"
                            data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                            data-param7="" data-param8="" data-param9="" data-param10="" data-description=""> -->
        <!-- MAIN IMAGE -->
        <!-- <img height="500px" width="100%"
                                src="<?= base_url('public') ?>/assets/images/slider/transparent.png"
                                data-bgcolor='#1d2931' style='background:#1d2931' title="banner-1" alt="banner-1"
                                data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                data-bgparallax="off" class="rev-slidebg" data-no-retina=""> -->
        <!-- LAYERS -->
        <!-- LAYER NR. 1 -->
        <!-- <div class="tp-caption tp-resizeme" id="slide-100-layer-1"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']"
                                data-width="full-proportional" data-height="full-proportional" data-whitespace="nowrap"
                                data-type="image" data-basealign="slide" data-responsive_offset="on"
                                data-frames='[{"delay":500,"speed":2000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 5;">
                                <img src="<?= base_url('public') ?>/assets/images/slider/slide3.jpg" title="banner-2"
                                    alt="banner-2"
                                    data-ww="['full-proportional','full-proportional','full-proportional','full-proportional']"
                                    data-hh="['full-proportional','full-proportional','full-proportional','full-proportional']"
                                    width="1920" height="1080" data-no-retina="">
                            </div> -->
        <!-- LAYER NR. 2 -->
        <!-- <div class="tp-caption tp-resizeme rs-parallaxlevel-1" id="slide-100-layer-2"
                                data-x="['left','left','left','left']" data-hoffset="['40','40','40','20']"
                                data-y="['top','top','top','top']" data-voffset="['220','100','350','200']"
                                data-fontsize="['26','18','18','18']" data-lineheight="['38','70','70','70']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":850,"speed":2000,"frame":"0","from":"sX:1.1;sY:1.1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="z-index: 6; white-space: nowrap; font-size: 22px; line-height: 28px; font-weight: 500; color:#6b687a;font-family: 'Poppins', sans-serif;">
                                <div class="rs-looped rs-wave" data-speed="3" data-angle="0" data-radius="2px"
                                    data-origin="50% 50%">Welcome To DigiCoders Technologies</div>
                            </div>
                            <div class="tp-caption tp-resizeme rs-parallaxlevel-1" id="slide-100-layer-3"
                                data-x="['left','left','left','left']" data-hoffset="['40','40','40','20']"
                                data-y="['top','top','top','top']" data-voffset="['265','155','405','905']"
                                data-fontsize="['58','38','45','35']" data-lineheight="['75','48','48','48']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":1300,"speed":2000,"frame":"0","from":"sX:2;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="z-index: 6; white-space: nowrap; font-size: 205px; color:#4b30ff; line-height: 240px; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                <div class="rs-looped rs-wave" data-speed="3" data-angle="0" data-radius="2px"
                                    data-origin="50% 50%">Own your future, <br>learn new skills in <br>Class Room;</div>
                            </div> -->

        <!-- LAYER NR. 7 -->
        <!-- <div class="tp-caption tp-resizeme rs-parallaxlevel-2" id="slide-100-layer-6"
                                data-x="['right','right','right','right']" data-hoffset="['-350','-50','-100','-50']"
                                data-y="['top','top','top','top']" data-voffset="['-180','-150','-150','-80']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                                data-responsive_offset="on"
                                data-frames='[{"delay":900,"speed":5000,"frame":"0","from":"y:100px;rZ:15deg;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 5;">
                                <div class="rs-looped rs-wave" data-speed="10" data-angle="0" data-radius="5px"
                                    data-origin="">
                                    <img src="<?= base_url('public') ?>/assets/images/slider/img6.png"
                                        class="slide-img-curve" title="banner-3" id="index_image" alt="banner-3">
                                </div>
                            </div> -->

        <!-- LAYER NR. 8 -->
        <!-- <div class="tp-caption rs-parallaxlevel-2 " id="btnR" target="_blank" id="slide-100-layer-7"
                                data-x="['left','left','left','left']" data-hoffset="['40','40','40','-40']"
                                data-y="['top','top','top','top']" data-voffset="['520','320','560','420']"
                                data-fontsize="['16','16','16','16']" data-lineheight="['20','20','20','20']"
                                data-width="['none','none','none','320']" data-height="none"
                                data-whitespace="['nowrap','nowrap','nowrap','normal']" data-type="text"
                                data-responsive_offset="on"
                                data-frames='[{"delay":900,"speed":5000,"frame":"0","from":"y:100px;rZ:15deg;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 12; font-size: 16px;">
                                <a href="<?= base_url() ?>Home/Registration"
                                    class="btn button-md bg-success radius-xl"><i class="fa fa-solid fa-pencil"></i>
                                    Register For Training</a>
                                <a href="<?= base_url('public') ?>/assets/images/DigiCoders_2090_Training_Brochure.pdf"
                                    onclick="openSocial()" style="background-color:#004dfd !important;"
                                    class="btn bg-dark button-md radius-xl" download><i class="fa fa-download"></i>
                                    Download Training Broucher</a><br><br>
                                <a href="<?= base_url('public') ?>/assets/images/DigiCoders_2090_Placement_Brochure.pdf"
                                    onclick="openSocial()" style="background-color:#004dfd !important;"
                                    class="btn bg-dark button-md radius-xl" download><i class="fa fa-download"></i>
                                    Download Placement Broucher</a>
                            </div> -->

        <!-- LAYER NR. 8 -->
        <!-- LAYER NR. 9 -->
        <!-- <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme" id="slide-100-layer-8"
                                data-x="['center','center','center','center']" data-hoffset="['-4','-4','-4','-4']"
                                data-y="['top','top','top','top']" data-voffset="['221','200','301','300']"
                                data-width="['390','390','390','180']" data-height="2" data-whitespace="nowrap"
                                data-type="shape" data-responsive_offset="on"
                                data-frames='[{"delay":"bytrigger","speed":500,"frame":"0","from":"sX:0;opacity:1;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"bytrigger","speed":300,"frame":"999","to":"sX:0;opacity:1;","ease":"Power3.easeInOut"}]' -->
        <!-- data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" data-lasttriggerstate="reset"
                                style="z-index: 13;background-color:rgba(905,905,905,1);"></div> -->


        <!-- LAYER NR. 12 -->
        <!-- <div class="tp-caption tp-resizeme rs-parallaxlevel-5" id="slide-100-layer-11"
                                data-x="['left','left','left','left']" data-hoffset="['-900','900','50','-80']"
                                data-y="['middle','middle','middle','top']" data-voffset="['-100','200','-300','100']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                                data-responsive_offset="on"
                                data-frames='[{"delay":450,"speed":3000,"frame":"0","from":"y:150px;rZ:45deg;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 16;">
                                <div class="rs-looped rs-wave" data-speed="3" data-angle="0" data-radius="2px"
                                    data-origin="50% 50%">
                                    <img src="<?= base_url('public') ?>/assets/images/slider/img3.png" title="banner-4"
                                        alt="banner-4" data-ww="['186px','186px','186px','186px']"
                                        data-hh="['69px','69px','69px','69px']" width="50" height="50"
                                        data-no-retina="">
                                </div>
                            </div>
                             LAYER NR. 12 -->
        <!-- <div class="tp-caption tp-resizeme rs-parallaxlevel-5" id="slide-200-layer-11"
                                data-x="['left','left','left','left']" data-hoffset="['-320','-120','-80','0']"
                                data-y="['bottom','bottom','bottom','bottom']"
                                data-voffset="['-180','-180','-80','-90']" data-width="none" data-height="none"
                                data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
                                data-frames='[{"delay":450,"speed":3000,"frame":"0","from":"y:150px;rZ:45deg;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 16;">
                                <div class="rs-looped rs-wave" data-speed="3" data-angle="0" data-radius="2px"
                                    data-origin="50% 50%">
                                    <img src="<?= base_url('public') ?>/assets/images/slider/img4.png" title="banner-5"
                                        alt="banner-5" data-ww="['783px','783px','783px','400px']"
                                        data-hh="['270px','270px','270px','138px']" width="50" height="50"
                                        data-no-retina="">
                                </div>
                            </div>
                            LAYER NR. 12 -->
        <!-- <div class="tp-caption tp-resizeme rs-parallaxlevel-5" id="slide-300-layer-11"
                                data-x="['left','left','left','left']" data-hoffset="['-90','145','180','120']"
                                data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-20','-20','80','10']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                                data-responsive_offset="on"
                                data-frames='[{"delay":450,"speed":3000,"frame":"0","from":"y:150px;rZ:45deg;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 16;">
                                <div class="rs-looped rs-wave" data-speed="3" data-angle="0" data-radius="2px"
                                    data-origin="50% 50%">
                                    <img src="<?= base_url('public') ?>/assets/images/slider/img5.png" title="banner-6"
                                        alt="banner-6" data-ww="['159px','159px','159px','100px']"
                                        data-hh="['129px','129px','129px','70px']" width="50" height="50"
                                        data-no-retina="">
                                </div>
                            </div> -->
        <!-- LAYER NR. 13 -->
        <!-- <div class="tp-caption   tp-resizeme rs-parallaxlevel-5" id="slide-100-layer-12"
                                data-x="['center','center','center','center']" data-hoffset="['-200','200','50','-100']"
                                data-y="['middle','bottom','bottom','bottom']" data-voffset="['100','100','900','150']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                                data-responsive_offset="on"
                                data-frames='[{"delay":550,"speed":3000,"frame":"0","from":"y:150px;rZ:-190deg;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 17;">
                                <div class="rs-looped rs-wave" data-speed="5" data-angle="0" data-radius="4px"
                                    data-origin="50% 50%">
                                    <img src="<?= base_url('public') ?>/assets/images/slider/img2.png" title="banner-7"
                                        alt="banner-7" data-ww="['79px','79px','79px','45px']"
                                        data-hh="['79px','79px','79px','45px']" width="45" height="45" data-no-retina=""
                                        id="img2">
                                </div>
                            </div> -->

        <!-- LAYER NR. 15 -->
        <!-- <div class="tp-caption   tp-resizeme rs-parallaxlevel-4" id="slide-100-layer-15"
                                data-x="['right','right','right','right']" data-hoffset="['-100','100','100','0']"
                                data-y="['bottom','bottom','bottom','bottom']" data-voffset="['50','50','200','100']"
                                data-width="none" data-height="none" data-whitespace="nowrap" data-type="image"
                                data-responsive_offset="on"
                                data-frames='[{"delay":750,"speed":3000,"frame":"0","from":"y:150px;rZ:-190deg;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                data-textalign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 19;">
                                <div class="rs-looped rs-wave" data-speed="7" data-angle="0" data-radius="6px"
                                    data-origin="50% 50%">
                                    <img src="<?= base_url('public') ?>/assets/images/slider/img1.png" title="banner-8"
                                        alt="banner-8" data-ww="['82px','82px','82px','82px']"
                                        data-hh="['115px','115px','115px','115px']" width="80" height="80"
                                        data-no-retina="">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div> -->
        <!-- </div>END REVOLUTION SLIDER -->
        <!-- </div> -->


        <!-- Premium News Ticker -->
        <div class="premium-ticker-section">
            <div class="ticker-inner">
                <div class="ticker-label">
                    <i class="fa-solid fa-circle-dot"></i> LATEST UPDATES
                </div>
                <div class="ticker-wrapper">
                    <div class="ticker-content">
                        <?php if (!empty($news_ticker)): ?>
                            <?php foreach ($news_ticker as $ticker): ?>
                                <span class="ticker-item">
                                    <i class="<?= $ticker->icon; ?>"></i>
                                    <?= $ticker->content; ?>
                                </span>
                            <?php endforeach; ?>

                            <!-- Duplicate for smooth loop (CSS Marquee technique) -->
                            <?php foreach ($news_ticker as $ticker): ?>
                                <span class="ticker-item">
                                    <i class="<?= $ticker->icon; ?>"></i>
                                    <?= $ticker->content; ?>
                                </span>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Fallback if no news in DB -->
                            <span class="ticker-item">
                                <i class="fa-solid fa-graduation-cap"></i>
                                Admissions Open for Summer Training 2026 in Lucknow – Join the best IT training institute in
                                Uttar Pradesh
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Premium About Section -->
        <div class="content-block">
            <section class="premium-about-section">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Content Side -->
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <div class="about-glass-card">

                                <h2 class="about-title">About The DigiCoders Technologies</h2>
                                <p class="about-desc">
                                    DigiCoders Technologies is recognized as the <strong>Best IT Training Institute in
                                        Lucknow</strong>, led by a dynamic team of young software engineers and
                                    entrepreneurs. We don't just teach code; we build careers through <strong>Industrial
                                        Training</strong>, <strong>Summer Internships</strong>, and <strong>Live Project
                                        Based Learning</strong>.
                                </p>
                                <p class="about-desc d-none d-md-block">
                                    As a leading <strong>Software Development Company in Lucknow</strong>, we provide
                                    high-end solutions in Web Development, Mobile Apps, and Digital Marketing, ensuring
                                    our students learn the latest industry standards like Python, Full Stack, Java, and
                                    PHP.
                                </p>


                            </div>
                        </div>

                        <!-- Image Side (Premium Single Image) -->
                        <div class="col-lg-5">
                            <div class="about-single-image-wrapper">
                                <img class="about-single-img"
                                    src="<?= base_url('public/assets/images/background/team-2025.jpg') ?>"
                                    title="DigiCoders Expert Team" alt="Expert IT Mentors Lucknow" width="500"
                                    height="350">


                                <!-- Floating Trust Badge -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        <div class="text-center">
            <h2 class="mb-0">Upcoming & Ongoing Training Batches</h2>
        </div>
        <div class="section-area section-sp2" style="padding-bottom: 0px; padding-top: 30px;">
            <div class="container-fluid container-premium-wide">
                <div class="swiper banner-swiper col-12 ">
                    <div class="swiper-wrapper">
                        <?php foreach ($banner as $bannerdata) {
                            ?>
                            <div class="swiper-slide">

                                <div class="premium-banner-bx">
                                    <img loading="lazy" class="lazy swiper-lazy" width="800" height="800"
                                        src="<?= base_url('public/assets/images/Loader1.jpg') ?>"
                                        data-src="<?= base_url('public/uploads/banner/') . $bannerdata->image ?>"
                                        title="digicoders" alt="digicoders-banner">
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <br><br>

        <div class="section-area section-sp2" style="padding-bottom: 0px;">
            <div class="text-center">
                <h3 style="padding:3px">Recent Placement</h3>
            </div>
            <div class="container-fluid container-premium-wide">
                <div class="swiper placement-swiper col-12 ">
                    <div class="swiper-wrapper">
                        <?php

                        foreach ($banner_place as $bannerdata) {
                            ?>
                            <div class="swiper-slide">

                                <div class="premium-banner-bx">
                                    <img loading="lazy" class="lazy swiper-lazy" width="800" height="800"
                                        src="<?= base_url('public/assets/images/Loader2.jpg') ?>"
                                        data-src="<?= base_url('public/uploads/placement/') . $bannerdata->photo ?>"
                                        title="digicoders" alt="digicoders">
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="text-center" style="margin-top: 25px;">
                <a href="<?= base_url() ?>Home/Placement" class="btn-primary"
                    style="background: rgba(0, 109, 171, 0.06); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); padding: 8px 20px; border-radius: 0px; color: var(--blue); font-weight: 800; display: inline-block; text-decoration: none; border: 1px solid rgba(0, 109, 171, 0.2); font-size: 14px; transition: all 0.3s ease;">View
                    More Placement →</a>
            </div>
        </div>
        <div style="height: 60px;"></div>

        <div class="section-area section-sp2 authentic-merge-section"
            style="background: linear-gradient(180deg, #f8faff 0%, #ffffff 100%);">
            <div class="container">
                <div class="row align-items-center" id="news_index">
                    <!-- Left Side: Professional Video Section -->
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <div class="video-container-premium"
                            style="position: relative; border-radius: 0px; overflow: hidden; box-shadow: 0 25px 60px rgba(0,0,0,0.15);">
                            <iframe id="tech_experts_video" width="100%" height="420"
                                src="https://www.youtube.com/embed/XwweJEK9RsQ?rel=0"
                                title="DigiCoders Technologies - IT Experts Talk" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share; compute-pressure"
                                allowfullscreen loading="lazy" style="display: block; border: none;"></iframe>
                        </div>
                    </div>

                    <!-- Right Side: Brand Essence & Feature Cards -->
                    <div class="col-lg-5">
                        <style>
                            .premium-feature-card-chhota {
                                background: #fff;
                                border-radius: 0px;
                                padding: 18px 15px;
                                display: flex;
                                align-items: center;
                                gap: 12px;
                                box-shadow: 0 2px 15px rgba(0, 56, 101, 0.04);
                                height: 100%;
                                border: 1px solid rgba(0, 0, 0, 0.04);
                            }

                            .feature-icon-box-xs {
                                width: 50px;
                                height: 50px;
                                border-radius: 10px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 18px;
                                color: #fff;
                                flex-shrink: 0;
                            }

                            .feature-info-xs h5 {
                                font-size: 14px;
                                font-weight: 800;
                                margin-bottom: 2px;
                                color: #001c34;
                                line-height: 1.2;
                            }

                            .feature-info-xs p {
                                font-size: 11px;
                                color: #718096;
                                margin-bottom: 0;
                                line-height: 1.2;
                                font-weight: 500;
                            }

                            .brand-essence-card {
                                background: #fff;
                                border-radius: 0px;
                                padding: 28px;
                                box-shadow: 0 4px 20px rgba(0, 56, 101, 0.04);
                                border: 1px solid rgba(0, 0, 0, 0.04);
                            }
                        </style>
                        <div class="d-flex flex-column">
                            <!-- Who We Are Card -->
                            <div class="mb-3">
                                <div class="brand-essence-card">
                                    <div class="d-flex align-items-center mb-3" style="gap: 15px;">
                                        <div class="icon-lg text-center"
                                            style="width: 45px; height: 45px; font-size: 20px; background: rgba(0,109,171,0.08); color: var(--blue); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                        <h5
                                            style="font-size: 20px; font-weight: 700; margin-bottom: 0; color: #001c34;">
                                            Who We Are</h5>
                                    </div>
                                    <p style="font-size: 14px; line-height: 1.6; color: #4a5568;"><strong>DigiCoders
                                            Technologies</strong> is recognized as the <strong>Best IT Training
                                            Institute in Lucknow</strong>, empowering students with industry-standard
                                        tech skills.</p>
                                </div>
                            </div>

                            <div class="row g-3 gy-5">
                                <!-- Feature 1 -->
                                <div class="col-6 mb-4">
                                    <div class="premium-feature-card-chhota">
                                        <div class="feature-icon-box-xs" style="background: var(--blue);">
                                            <i class="fa-solid fa-chalkboard-user"></i>
                                        </div>
                                        <div class="feature-info-xs">
                                            <h5>Mentors</h5>
                                            <p>Industry Pros</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Feature 2 -->
                                <div class="col-6 mb-4">
                                    <div class="premium-feature-card-chhota">
                                        <div class="feature-icon-box-xs" style="background: var(--orange);">
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="feature-info-xs">
                                            <h5>Placement</h5>
                                            <p>100% Support</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Feature 3 -->
                                <div class="col-6">
                                    <div class="premium-feature-card-chhota">
                                        <div class="feature-icon-box-xs" style="background: var(--green);">
                                            <i class="fa-solid fa-code"></i>
                                        </div>
                                        <div class="feature-info-xs">
                                            <h5>Projects</h5>
                                            <p>Live Practical</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Feature 4 -->
                                <div class="col-6">
                                    <div class="premium-feature-card-chhota">
                                        <div class="feature-icon-box-xs" style="background: var(--blue);">
                                            <i class="fa-solid fa-handshake"></i>
                                        </div>
                                        <div class="feature-info-xs">
                                            <h5>Partners</h5>
                                            <p>500+ Hiring</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const videoIframe = document.getElementById('tech_experts_video');
            if (!videoIframe) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        videoIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
                        videoIframe.contentWindow.postMessage('{"event":"command","func":"unMute","args":""}', '*');
                    } else {
                        videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
                    }
                });
            }, {
                threshold: 0.3
            });

            observer.observe(videoIframe);
        });
    </script>

    <br><br>
    <div class="text-center">
        <h2 class="mb-0">Expert Team of DigiCoders</h2>
    </div>

    <div class="section-area section-sp2" style="padding-bottom: 0px;">
        <div class="container-fluid container-premium-wide">
            <div class="swiper team-swiper col-12 ">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($usedata as $team) {

                        ?>
                        <div class="swiper-slide">

                            <div class="premium-banner-bx" style="margin-left: 0px;">
                                <img loading="lazy" class="lazy swiper-lazy"
                                    src="<?= base_url('public/assets/images/Loader2.jpg') ?>"
                                    data-src="<?= base_url('public/uploads/teamexpert/') . $team->Image ?>"
                                    title="DigiCoders" alt="digicoders-banner">
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center" style="margin-top: 25px;">
        <a href="<?= base_url() ?>Home/OurExpert" class="btn-primary"
            style="background: rgba(0, 109, 171, 0.06); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); padding: 8px 20px; border-radius: 0px; color: var(--blue); font-weight: 800; display: inline-block; text-decoration: none; border: 1px solid rgba(0, 109, 171, 0.2); font-size: 14px; transition: all 0.3s ease;">View
            More →</a>
    </div>

    <br>
    <!-- our branches section start -->

    <?php include('OurBranch.php') ?>


    <!-- Slider Section (MOUs with Colleges) -->
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-12 text-center">
                    <h2 class="mb-2">MOUs with Colleges</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="swiper mySwiper" style="padding: 20px;">
                <div class="swiper-wrapper">
                    <?php foreach ($mou_slider as $slider) { ?>
                        <div class="swiper-slide">
                            <div class="slider-container"
                                style="width:100%; display: flex; align-items: center; justify-content: center; overflow: hidden; background: transparent;">
                                <img class="lazy" src="<?= base_url('public/assets/images/Loader1.jpg') ?>"
                                    data-src="<?= base_url('public/') . $slider->media_url; ?>" alt="MOU Slider">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="text-center" style="margin-top: 25px;">
            <a href="<?= base_url('Home/Gallery/mou-with-college') ?>" class="btn-primary"
                style="background: rgba(0, 109, 171, 0.06); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); padding: 8px 20px; border-radius: 0px; color: var(--blue); font-weight: 800; display: inline-block; text-decoration: none; border: 1px solid rgba(0, 109, 171, 0.2); font-size: 14px; transition: all 0.3s ease;">View
                All MOUs →</a>
        </div>
    </div>
    <style>
        /* 4:3 Aspect Ratio for MOU Slider */
        .slider-container {
            width: 100%;
            aspect-ratio: 4 / 3;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;

            background: transparent;
            padding: 0px;
        }

        .slider-container img {
            width: 100% !important;
            height: 100% !important;
            object-fit: contain;

            transition: transform 0.5s ease;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 18px !important;
            font-weight: bold;
        }
    </style>
    </div>
    <!-- Slider Section End -->
    <!-- Impact Statistics Section -->
    <style>
        .premium-impact-section {
            background: #ffffff;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .premium-impact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0, 109, 171, 0.15), transparent);
        }

        .premium-impact-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0, 109, 171, 0.15), transparent);
        }

        .impact-section-title {
            font-size: 38px;
            font-weight: 600;
            color: #001c34;
            margin-top: 14px;
            margin-bottom: 0;
            line-height: 1.2;
        }

        .impact-divider {
            width: 50px;
            height: 3px;
            background: var(--orange);
            margin: 20px auto 0;
            border-radius: 10px;
        }

        .impact-stat-card {
            background: #ffffff;
            border: 1px solid #edf0f5;
            border-radius: 0px;
            padding: 35px 20px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;

        }

        .impact-icon-wrap {
            width: 60px;
            height: 60px;
            border-radius: 0;
            background: transparent !important;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 15px;
            transition: all 0.4s ease;
        }



        .impact-stat-num {
            font-size: 38px;
            font-weight: 500;
            color: #001c34;
            line-height: 1;
            letter-spacing: -2px;
            font-variant-numeric: tabular-nums;
            display: inline-flex;
            justify-content: center;
            align-items: baseline;
        }

        .impact-stat-num sup {
            font-size: 20px;
            color: var(--orange);
            font-weight: 600;
            vertical-align: super;
            letter-spacing: 0;
            margin-left: 8px;
        }

        .impact-stat-lbl {
            font-size: 10.5px;
            font-weight: 700;
            color: #9aa5b4;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 12px;
        }

        .impact-stat-card .card-glow {
            position: absolute;
            top: -40px;
            right: -40px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            opacity: 0.06;
            transition: opacity 0.4s ease;
        }

        .impact-stat-card:hover .card-glow {
            opacity: 0.12;
        }

        @media (max-width: 991px) {
            .impact-stat-card {
                padding: 36px 18px 30px;
                margin-bottom: 20px;
            }

            .impact-stat-num {
                font-size: 34px;
            }

            .impact-section-title {
                font-size: 28px;
            }
        }

        @media (max-width: 575px) {
            .impact-stat-num {
                font-size: 30px;
            }
        }
    </style>

    <div class="premium-impact-section">
        <div class="container" style="position: relative; z-index: 1;">
            <div class="row mb-5">
                <div class="col-12 text-center">

                    <h2 class="impact-section-title">Numbers That Show Our Growth</h2>
                    <div class="impact-divider"></div>
                </div>
            </div>

            <div class="row text-center justify-content-center g-4">
                <?php if (!empty($impact_stats)): ?>
                    <?php foreach ($impact_stats as $stat): ?>
                        <div class="col-lg col-md-4 col-6">
                            <div class="impact-stat-card" style="border-radius: 0px;">
                                <div class="card-glow" style="background: <?= $stat->color; ?>;"></div>
                                <div class="impact-icon-wrap" style="color: <?= $stat->color; ?>;">
                                    <i class="<?= $stat->icon; ?>"></i>
                                </div>
                                <div class="impact-stat-num"><span class="counter"><?= $stat->count; ?></span><sup>+</sup></div>
                                <div class="impact-stat-lbl"><?= $stat->label; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Fallback -->
                    <div class="col-lg col-md-4 col-6">
                        <div class="impact-stat-card" style="border-radius: 0px;">
                            <div class="card-glow" style="background: var(--blue);"></div>
                            <div class="impact-icon-wrap" style="color: var(--blue);">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <div class="impact-stat-num"><span class="counter">10000</span><sup>+</sup></div>
                            <div class="impact-stat-lbl">Students Trained</div>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="impact-stat-card" style="border-radius: 0px;">
                            <div class="card-glow" style="background: var(--orange);"></div>
                            <div class="impact-icon-wrap" style="color: var(--orange);">
                                <i class="fa-solid fa-university"></i>
                            </div>
                            <div class="impact-stat-num"><span class="counter">500</span><sup>+</sup></div>
                            <div class="impact-stat-lbl">College Collaborations</div>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="impact-stat-card" style="border-radius: 0px;">
                            <div class="card-glow" style="background: var(--green);"></div>
                            <div class="impact-icon-wrap" style="color: var(--green);">
                                <i class="fa-solid fa-laptop-code"></i>
                            </div>
                            <div class="impact-stat-num"><span class="counter">1000</span><sup>+</sup></div>
                            <div class="impact-stat-lbl">Live Projects</div>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="impact-stat-card" style="border-radius: 0px;">
                            <div class="card-glow" style="background: #9b59b6;"></div>
                            <div class="impact-icon-wrap" style="color: #9b59b6;">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="impact-stat-num"><span class="counter">50</span><sup>+</sup></div>
                            <div class="impact-stat-lbl">Expert Trainers</div>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-6">
                        <div class="impact-stat-card" style="border-radius: 0px;">
                            <div class="card-glow" style="background: #e74c3c;"></div>
                            <div class="impact-icon-wrap" style="color: #e74c3c;">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div class="impact-stat-num"><span class="counter">100</span><sup>%</sup></div>
                            <div class="impact-stat-lbl">Placement Assistance</div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <div class="recruiters-premium-section section-sp1" style="background: #fdfdfd; padding: 70px 0;">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left: Branding Content -->
                <div class="col-lg-4 col-md-12 mb-5 mb-lg-0">
                    <div class="recruiter-branding">
                        <span
                            style="color: var(--orange); font-weight: 700; text-transform: uppercase; font-size: 13px; letter-spacing: 2px;">Premium
                            Placements</span>
                        <h2 class="mt-2 mb-3" style="font-size: 34px; font-weight: 600; color: #001c34;">Our Top
                            Recruiters</h2>
                        <p style="color: #555; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
                            We bridge the gap between talented engineers and global IT giants. Our students are
                            consistently hired by industry leaders for their technical excellence and project
                            readiness.
                        </p>
                        <a href="<?= base_url('Home/Placement') ?>" class="btn-primary"
                            style="background: rgba(0, 109, 171, 0.08); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); padding: 14px 36px; border-radius: 0px; color: var(--blue); font-weight: 800; display: inline-block; text-decoration: none; border: none; font-size: 15px; transition: all 0.3s ease;">Explore
                            Placements <i class="fa fa-arrow-right ml-2"></i></a>
                    </div>
                </div>

                <!-- Right: Scrolling Marquee -->
                <div class="col-lg-8 col-md-12">
                    <div class="swiper recruiterSwiper" style="padding: 10px 0;">
                        <div class="swiper-wrapper align-items-center">
                            <?php
                            foreach ($recruiters as $recruiter) {
                                ?>
                                <div class="swiper-slide text-center"
                                    style="width: 220px; display: flex; align-items: center; justify-content: center; height: 120px;">
                                    <div class="recruiter-logo-box"
                                        style="width: 180px; background: transparent; padding: 10px;">
                                        <img loading="lazy"
                                            src="<?= base_url('public/uploads/recruiters/') . $recruiter->logo ?>"
                                            alt="<?= $recruiter->name ?>"
                                            style="max-width: 100%; max-height: 85px; object-fit: contain; transition: all 0.3s ease;">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .recruiterSwiper .swiper-wrapper {
            transition-timing-function: linear !important;
        }

        .recruiter-logo-box:hover img {
            transform: scale(1.1);
        }

        .recruiters-premium-section {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        @media (max-width: 991px) {
            .recruiter-branding {
                text-align: center;
                margin-bottom: 30px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var recruiterSwiper = new Swiper(".recruiterSwiper", {
                slidesPerView: 2,
                spaceBetween: 25,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                speed: 3000,
                allowTouchMove: false,
                breakpoints: {
                    640: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    1024: { slidesPerView: 4 },
                },
            });

            // Manual hover pause backup
            const recruiterEl = document.querySelector('.recruiterSwiper');
            if (recruiterEl) {
                recruiterEl.addEventListener('mouseenter', () => recruiterSwiper.autoplay.stop());
                recruiterEl.addEventListener('mouseleave', () => recruiterSwiper.autoplay.start());
            }
        });
    </script>
    <br />


    <!-- Testimonials END -->

    <style>
        .popular-courses-bx {
            background: #ffffff;
            padding: 80px 0;
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }

        .enterprise-tech-section {
            padding: 80px 0 40px;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .enterprise-tech-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(0, 109, 171, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 109, 171, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        .tech-matrix-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            position: relative;
            z-index: 1;
        }

        .tech-domain-group {
            margin-bottom: 60px;
        }

        .domain-label {
            display: inline-block;
            font-size: 13px;
            font-weight: 800;
            color: var(--blue);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 25px;
            padding-left: 15px;
            border-left: 4px solid var(--orange);
        }

        .tech-grid-modular {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 25px;
        }

        .tech-card-pro {
            background: #ffffff;
            border: 1px solid rgba(0, 56, 101, 0.08);
            border-radius: 0px;
            padding: 25px 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 4px 15px rgba(0, 28, 52, 0.02);
            position: relative;
            text-decoration: none !important;
        }

        .tech-card-pro::before {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: 0;
            padding: 1px;
            background: linear-gradient(135deg, var(--blue), var(--orange));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: 0.4s;
        }





        .tech-icon-box {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s;
            flex-shrink: 0;
        }



        .tech-icon-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .tech-info-pro h4 {
            font-size: 16px;
            font-weight: 400;
            color: #001c34;
            margin: 0;
            line-height: 1.2;
        }

        .tech-info-pro span {
            font-size: 12px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .bg-glow-blur {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 109, 171, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(50px);
            z-index: 0;
            pointer-events: none;
        }

        @media screen and (max-width: 767px) {
            .tech-grid-modular {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                padding: 0 5px;
            }

            .tech-card-pro {
                flex-direction: column;
                padding: 15px 10px;
                text-align: center;
                gap: 12px;
                height: 100%;
            }

            .tech-icon-box {
                width: 45px;
                height: 45px;
                margin: 0 auto;
            }

            .tech-info-pro h4 {
                font-size: 13px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .tech-info-pro span {
                font-size: 10px;
                margin-bottom: 4px;
                display: block;
            }

            .tech-matrix-container h1 {
                font-size: 28px !important;
            }

            .tech-matrix-container p {
                font-size: 14px !important;
            }
        }
    </style>

    <div class="enterprise-tech-section">
        <div class="bg-glow-blur" style="top: -100px; right: -100px;"></div>
        <div class="bg-glow-blur" style="bottom: -100px; left: -100px;"></div>

        <div class="tech-matrix-container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-12 text-center">
                    <span
                        style="color: var(--orange); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 13px; background: rgba(231,96,40,0.06); padding: 5px 20px; ">Best
                        IT Training in Lucknow</span>
                    <h1 class="mt-3" style="font-size: 40px; font-weight: 600; color: #001c34; line-height: 1.1;">
                        Industry-Ready Technology Stack</h1>
                    <p style="color: #64748b; font-size: 18px; max-width: 850px; margin: 20px auto;">DigiCoders
                        Technologies provides students with the advanced skills required for modern software
                        development, web engineering, and mobile app architecture.</p>
                </div>
            </div>

            <?php
            $tech_domains = [
                'Web & Modern Frameworks' => [
                    ['img' => 'html.jpg', 'name' => 'HTML5', 'tag' => 'Core Web', 'color' => '#E34F26'],
                    ['img' => 'css.jpg', 'name' => 'CSS3', 'tag' => 'UI/UX', 'color' => '#1572B6'],
                    ['img' => 'javascript.jpg', 'name' => 'JavaScript', 'tag' => 'Logic', 'color' => '#F7DF1E'],
                    ['img' => 'bootstrap.jpg', 'name' => 'Bootstrap', 'tag' => 'Styling', 'color' => '#7952B3'],
                    ['img' => 'react-js.jpg', 'name' => 'React JS', 'tag' => 'Frontend', 'color' => '#61DAFB'],
                    ['img' => 'angular.png', 'name' => 'Angular', 'tag' => 'Enterprise', 'color' => '#DD0031'],
                    ['img' => 'nest-js.jpg', 'name' => 'Nest JS', 'tag' => 'Backend', 'color' => '#68A063'],
                    ['img' => 'express-js.jpg', 'name' => 'Express JS', 'tag' => 'Backend', 'color' => '#68A063'],
                ],
                'Backend, Mobile & Data' => [
                    ['img' => 'Python-Logo.jpg', 'name' => 'Python', 'tag' => 'AI / ML', 'color' => '#3776AB'],
                    ['img' => 'java.jpg', 'name' => 'Java', 'tag' => 'Backend', 'color' => '#007396'],
                    ['img' => 'laravel.jpg', 'name' => 'Laravel', 'tag' => 'PHP Expert', 'color' => '#FF2D20'],
                    ['img' => 'ci.jpg', 'name' => 'CodeIgniter', 'tag' => 'Web App', 'color' => '#EE4323'],
                    ['img' => 'mysql.jpg', 'name' => 'MySQL', 'tag' => 'Database', 'color' => '#4479A1'],
                    ['img' => 'flutter.jpg', 'name' => 'Flutter', 'tag' => 'Mobile', 'color' => '#02569B'],
                    ['img' => 'dart.jpg', 'name' => 'Dart', 'tag' => 'Mobile', 'color' => '#02569B'],
                    ['img' => 'php.jpg', 'name' => 'PHP', 'tag' => 'Backend', 'color' => '#68A063'],
                ]
            ];

            foreach ($tech_domains as $domain => $techs) { ?>
                <div class="tech-domain-group">
                    <div class="d-flex align-items-center mb-4">
                        <h3 style="font-size: 20px; font-weight: 900; color: #001c34; margin: 0;"><?= $domain ?></h3>
                        <div style="flex: 1; height: 1px; background: rgba(0,0,0,0.06); margin-left: 20px;"></div>
                    </div>
                    <div class="tech-grid-modular">
                        <?php foreach ($techs as $tech) { ?>
                            <a href="javascript:void(0);" class="tech-card-pro">
                                <div class="tech-icon-box">
                                    <img src="<?= base_url('public/assets/images/courses/' . $tech['img']) ?>"
                                        alt="<?= $tech['name'] ?>">
                                </div>
                                <div class="tech-info-pro">
                                    <span style="color: <?= $tech['color'] ?>; font-weight: 800;"><?= $tech['tag'] ?></span>
                                    <h4><?= $tech['name'] ?></h4>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <!-- Popular Courses END -->

    <!-- Form -->
    <!-- <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box"
        style="background-image: url(<?= base_url('public') ?>/assets/images/about/digicoder.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx style1 text-white text-center">
                    <h2 class="title-head">Quick Enquiry</h2>
                </div>
            </div>
        </div>
    </div> 
        <form class="contact-bx" id="quick" action="<?= base_url() ?>Home/submitForm/Enquiry" method="POST">
            <?php
            $csrf = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash()
            );
            ?>
            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
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
                            <span>Your Email Address</span>
                            <input name="email" type="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span>Your Phone</span>
                            <input name="phone" type="text" required maxlength="10" minlength="10"
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
                Google reCAPTCHA
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LfHIQcrAAAAALPXPP-R1SamLeZxPHGPA_xfMNOh"
                            data-callback="enablesubmitbtn"></div>
                    </div>
                </div>

                <div class="col-lg-12">



                    <button name="submit" type="submit" value="Submit" disabled="disabled" class="btn button-md"
                        id="submitBtn"> <i class="fa fa-refresh fa-spin fa-fw d-none" id="submitSpin"></i> Send
                        Query</button>
                </div>
            </div>
        </form>
        <br />
        <br />
        <br />
    </div>
    <img src="<?= base_url('public') ?>/assets/images/background/appointment-bg.png" class="appoint-bg"
        title="appointment-bg" alt="appointment-bg">
    </div> -->
    <!-- Form END -->
    <!-- Training Programs Section (Premium Academy Style) -->
    <style>
        .training-programs-section {
            background: #fdfdfd;
            padding: 30px 0 80px;
            position: relative;
        }

        .training-card {
            background: #ffffff;
            border-radius: 0px;
            padding: 30px;
            text-align: left;
            height: 100%;
            transition: all 0.3s ease;
            border: 2px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .training-card:hover {
            border-color: var(--blue);
            box-shadow: 0 10px 25px rgba(0, 56, 101, 0.05);
        }

        .training-icon-box {
            width: 45px;
            height: 45px;
            background: rgba(0, 56, 101, 0.04);
            color: var(--blue);
            border-radius: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .training-card:hover .training-icon-box {
            background: var(--blue);
            color: #fff;
        }

        .training-card h3 {
            font-size: 17px;
            font-weight: 500;
            color: #001c34;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .training-card p {
            font-size: 13.5px;
            color: #555;
            line-height: 1.5;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .training-card .btn-link {
            font-weight: 700;
            font-size: 13px;
            color: var(--blue);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .training-card:hover .btn-link {
            color: var(--orange);
        }

        .training-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        @media (max-width: 991px) {
            .training-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .training-grid {
                grid-template-columns: 1fr;
            }
        }

        .training-duration-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(231, 96, 40, 0.08);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(231, 96, 40, 0.2);
            color: var(--orange);
            padding: 5px 15px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 40px;
            z-index: 2;
        }

        .training-card:hover .training-duration-badge {
            background: var(--orange);
            color: #fff;
            border-color: var(--orange);
        }
    </style>

    <div class="section-area training-programs-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <span
                        style="color: var(--orange); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 12px;">Career
                        Growth</span>
                    <h2 class="mt-2" style="font-size: 38px; font-weight: 700; color: #001c34;">Our Training
                        Programs</h2>
                    <div
                        style="width: 60px; height: 4px; background: var(--orange); margin: 20px auto; border-radius: 10px;">
                    </div>
                </div>
            </div>

            <div class="training-grid">
                <!-- Program 1 -->
                <div class="training-card">
                    <div class="training-duration-badge">45-60 Days</div>
                    <div class="training-icon-box">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>
                    <h3>Vocational Training</h3>
                    <p>Designed for Polytechnic/Diploma students to explore the IT industry and start an engineering
                        career.</p>
                    <a href="<?= base_url() ?>Home/VocationalTraining" class="stretched-link"></a>
                </div>

                <!-- Program 2 -->
                <div class="training-card">
                    <div class="training-duration-badge">45-60 Days</div>
                    <div class="training-icon-box" style="background: rgba(0, 109, 171, 0.05); color: var(--blue);">
                        <i class="fa-solid fa-sun"></i>
                    </div>
                    <h3>Summer Training</h3>
                    <p>Intensive summer sessions for engineering students to master full-stack and modern tech
                        stacks.</p>
                    <a href="<?= base_url() ?>Home/SummerTraining" class="stretched-link"></a>
                </div>

                <!-- Program 3 -->
                <div class="training-card">
                    <div class="training-duration-badge">45-60 Days</div>
                    <div class="training-icon-box" style="background: rgba(46, 204, 113, 0.05); color: #2ecc71;">
                        <i class="fa-solid fa-snowflake"></i>
                    </div>
                    <h3>Winter Training</h3>
                    <p>Short-term winter programs focusing on specialized skills and real-world project development.
                    </p>
                    <a href="<?= base_url() ?>Home/WinterTraining" class="stretched-link"></a>
                </div>

                <!-- Program 4 -->
                <div class="training-card">
                    <div class="training-duration-badge">45-60 Days</div>
                    <div class="training-icon-box" style="background: rgba(155, 89, 182, 0.05); color: #9b59b6;">
                        <i class="fa-solid fa-industry"></i>
                    </div>
                    <h3>Industrial Training</h3>
                    <p>Exclusively for B.Tech/MCA final year students to bridge the gap between academia and MNC
                        standards.</p>
                    <a href="<?= base_url() ?>Home/IndustrialTraining" class="stretched-link"></a>
                </div>

                <!-- Program 5 -->
                <div class="training-card">
                    <div class="training-duration-badge">6 Months</div>
                    <div class="training-icon-box" style="background: rgba(241, 196, 15, 0.05); color: #f1c40f;">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <h3>Apprenticeship Training</h3>
                    <p>Deep-dive professional training for final year students aiming for high-salary job roles in
                        IT.</p>
                    <a href="<?= base_url() ?>Home/ApprenticeshipTraining" class="stretched-link"></a>
                </div>

                <!-- Program 6 -->
                <div class="training-card">
                    <div class="training-duration-badge">6 Months</div>
                    <div class="training-icon-box" style="background: rgba(52, 152, 219, 0.05); color: #3498db;">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <h3>Internship Training</h3>
                    <p>Work on live commercial projects with our development team and gain professional experience.
                    </p>
                    <a href="<?= base_url() ?>Home/InternshipTraining" class="stretched-link"></a>
                </div>

                <!-- Program 7 -->
                <div class="training-card">
                    <div class="training-duration-badge">45-60 Days</div>
                    <div class="training-icon-box" style="background: rgba(231, 76, 60, 0.05); color: #e74c3c;">
                        <i class="fa-solid fa-project-diagram"></i>
                    </div>
                    <h3>Project Training</h3>
                    <p>Dedicated guidance for final year minor/major projects following SDLC and industrial
                        patterns.</p>
                    <a href="<?= base_url() ?>Home/ProjectTraining" class="stretched-link"></a>
                </div>

                <!-- Program 8 -->
                <div class="training-card">
                    <div class="training-duration-badge">45-60 Days</div>
                    <div class="training-icon-box" style="background: rgba(44, 62, 80, 0.05); color: #2c3e50;">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <h3>Syllabus Training</h3>
                    <p>Covers academic curriculum with practical implementation for B.Tech/Diploma 1st, 2nd & 3rd
                        year.</p>
                    <a href="<?= base_url() ?>Home/Contact" class="stretched-link"></a>
                </div>

                <!-- Program 9 -->
                <div class="training-card">
                    <div class="training-duration-badge">45-60 Days</div>
                    <div class="training-icon-box" style="background: rgba(0, 0, 0, 0.05); color: #333;">
                        <i class="fa-solid fa-chalkboard-teacher"></i>
                    </div>
                    <h3>Faculty Training</h3>
                    <p>Upgradation programs for teachers and faculty of engineering colleges on latest tech trends.
                    </p>
                    <a href="<?= base_url() ?>Home/Contact" class="stretched-link"></a>
                </div>
            </div>

        </div>
    </div>
    <!-- Premium Our Story Section -->
    <style>
        .our-story-premium {
            background: #ffffff;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .our-story-premium::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background: rgba(0, 56, 101, 0.02);
            clip-path: polygon(20% 0%, 100% 0%, 100% 100%, 0% 100%);
            z-index: 0;
        }

        .story-content-box {
            position: relative;
            z-index: 1;
        }

        .story-title {
            font-size: 36px;
            font-weight: 700;
            color: #001c34;
            margin-bottom: 20px;
        }

        .story-subtitle {
            color: var(--orange);
            font-weight: 800;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 10px;
        }

        .story-desc {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .story-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .story-feat-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .story-feat-item i {
            width: 35px;
            height: 35px;
            background: rgba(231, 96, 40, 0.1);
            color: var(--orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .story-feat-item span {
            font-weight: 700;
            color: #001c34;
            font-size: 14px;
        }

        .video-premium-box {
            position: relative;

            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 56, 101, 0.15);
            transition: all 0.4s ease;
        }



        .video-overlay-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--blue);
            font-size: 24px;
            box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.2);
            animation: pulse-border 2s infinite;
            z-index: 2;
        }

        @keyframes pulse-border {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
            }

            100% {
                box-shadow: 0 0 0 20px rgba(255, 255, 255, 0);
            }
        }

        @media (max-width: 991px) {
            .our-story-premium {
                padding: 60px 0;
            }

            .our-story-premium::before {
                display: none;
            }

            .video-premium-box {
                margin-top: 50px;
            }
        }
    </style>

    <div class="section-area our-story-premium">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 story-content-box">
                    <h2 class="story-title">Crafting Digital Excellence for the Future</h2>
                    <p class="story-desc">
                        DigiCoders Technologies is a dynamic powerhouse of young software engineers and
                        entrepreneurs. We don't just develop software; we build ecosystems that empower businesses
                        to thrive in the digital age. From high-end training to commercial-grade application
                        development, we are your umbrella solution for all IT needs.
                    </p>
                    <div class="story-features">
                        <div class="story-feat-item">
                            <i class="fa fa-check"></i>
                            <span>Expert Mentorship</span>
                        </div>
                        <div class="story-feat-item">
                            <i class="fa fa-check"></i>
                            <span>Live Project Training</span>
                        </div>
                        <div class="story-feat-item">
                            <i class="fa fa-check"></i>
                            <span>Industry Standards</span>
                        </div>
                        <div class="story-feat-item">
                            <i class="fa fa-check"></i>
                            <span>100% Success Rate</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video-premium-box">
                        <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                            data-src="<?= base_url('public') ?>/assets/images/about/thumbnail.png"
                            style="width: 100%; display: block;" title="about-thedigicoders" alt="about-thedigicoders">
                        <a href="https://www.youtube.com/watch?v=e50Q6XSxzwA" class="popup-youtube">
                            <div class="video-overlay-glow">
                                <i class="fa fa-play"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Story END -->
    <!-- Premium Testimonials Section -->
    <style>
        .premium-reviews-section {
            background: #ffffff;
            padding: 85px 0;
            position: relative;
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;

            .premium-reviews-section {
                background: #ffffff;
                padding: 100px 0;
                position: relative;
                overflow: hidden;
            }

            /* Decorative Background */
            .premium-reviews-section::before {
                content: '';
                position: absolute;
                top: 20%;
                left: -10%;
                width: 400px;
            }

            .premium-reviews-section::before {
                content: '';
                position: absolute;
                top: 20%;
                left: -10%;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle, rgba(0, 109, 171, 0.03) 0%, transparent 70%);
                z-index: 0;
            }

            .premium-reviews-section {
                padding: 40px 0;
                /* Reduced from 80px */
                background: #f1f4f9;
                position: relative;
                overflow: hidden;
            }

            .review-card-modern {
                background: #ffffff;
                border-radius: 0px;
                padding: 25px 30px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
                border: 1px solid rgba(0, 109, 171, 0.1);
                /* More visible border */
                transition: all 0.4s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
                position: relative;
                margin: 10px 0;
            }



            .review-card-modern .quote-icon {
                position: absolute;
                top: 20px;
                right: 25px;
                font-size: 50px;
                color: rgba(231, 96, 40, 0.15);
                /* Orange tint, more visible */
                line-height: 1;
                font-family: 'serif';
                z-index: 0;
                transition: all 0.4s ease;
            }



            .review-text-modern {
                position: relative;
                z-index: 1;
                font-size: 14.5px;
                color: #334155;
                line-height: 1.7;
                margin-bottom: 20px;
                font-weight: 500;
                font-style: italic;
                flex-grow: 1;
            }

            .review-text-modern::before {
                content: '“';
                font-family: serif;
                font-size: 30px;
                color: var(--blue);
                margin-right: 5px;
                vertical-align: middle;
                line-height: 0;
            }

            .review-user-footer {
                margin-top: auto;
                display: flex;
                align-items: center;
                gap: 12px;
                padding-top: 15px;
                border-top: 1px solid #e2e8f0;
            }

            .review-avatar-modern {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                overflow: hidden;
                border: 3px solid #fff;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            }

            .review-avatar-modern img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .review-user-meta h5 {
                font-size: 16px;
                font-weight: 800;
                color: #0f172a;
                margin: 0;
                margin-bottom: 2px;
            }

            .review-user-meta .verified-badge {
                font-size: 10px;
                color: #10b981;
                font-weight: 700;
                display: flex;
                align-items: center;
                gap: 4px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .reviews-swiper {
                padding: 20px 15px 50px !important;
                /* Reduced padding */
            }

            .reviews-swiper .swiper-slide {
                height: auto;
                display: flex;
            }

            .reviews-swiper .swiper-pagination-bullet {
                background: var(--blue);
                opacity: 0.2;
                width: 8px;
                height: 8px;
                transition: all 0.3s ease;
            }

            .reviews-swiper .swiper-pagination-bullet-active {
                opacity: 1;
                background: var(--orange);
                width: 25px;
                border-radius: 10px;
            }

            .google-review-section {
                padding: 80px 20px;
                background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
                text-align: center;
            }

            .review-heading {
                color: #fff;
                font-size: 36px;
                margin-bottom: 50px;
                font-weight: bold;
                letter-spacing: 1px;
                text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
                text-align: center;
                display: block;
                width: 100%;
            }

            @media(max-width:768px) {
                .google-review-section {
                    padding: 40px 15px;
                }

                .review-heading {
                    font-size: 26px;
                    margin-bottom: 30px;
                }
            }
    </style>

    <section class="google-review-section">
        <div class="container">
            <h2 class="review-heading">What Our Students Say</h2>

            <!-- Elfsight Google Reviews | Untitled Google Reviews -->
            <script src="https://elfsightcdn.com/platform.js" async></script>
            <div class="elfsight-app-9e3db682-e4a0-4239-b2a6-bf7437057270" data-elfsight-app-lazy></div>
        </div>
    </section>

    <!-- Premium FAQ Section START -->
    <section class="premium-faq-section" style="background: #ffffff; padding: 40px 0 80px;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12 text-center animate__animated animate__fadeInUp">
                    <span
                        style="color: var(--blue); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 13px; background: rgba(0,109,171,0.08); padding: 8px 15px;display: inline-block;">Knowledge
                        Base</span>
                    <h2 class="mt-2" style="font-size: 28px; font-weight: 700; color: #0f172a; letter-spacing: -1px;">
                        General FAQ's</h2>
                    <div
                        style="width: 80px; height: 5px; background: var(--orange); margin: 15px auto; border-radius: 10px;">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="premium-accordion" id="faqAccordion">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $fi = 1;
                                if (!empty($faqs)) {
                                    foreach ($faqs as $f) {
                                        if ($fi % 2 != 0) {
                                            ?>
                                            <div class="accordion-item-modern mb-3"
                                                style="border: 1px solid #e2e8f0;  overflow: hidden; transition: all 0.3s ease; background: #fff;">
                                                <div class="accordion-header" id="headingFaq<?= $fi ?>">
                                                    <div class="accordion-button-modern collapsed" data-toggle="collapse"
                                                        data-target="#collapseFaq<?= $fi ?>" aria-expanded="false"
                                                        style="width: 100%; padding: 18px 25px; text-align: left; display: flex; align-items: center; justify-content: space-between; font-weight: 700; color: #1e293b; font-size: 15px; cursor: pointer; transition: all 0.3s ease;">
                                                        <span style="display: flex; align-items: center; gap: 15px;">
                                                            <span
                                                                style="color: var(--blue); opacity: 0.5; font-size: 13px;">0<?= $fi ?>.</span>
                                                            <?= $f->question ?>
                                                        </span>
                                                        <i class="fas fa-plus-circle faq-toggle-icon"
                                                            style="color: var(--blue); transition: all 0.3s ease; font-size: 18px;"></i>
                                                    </div>
                                                </div>
                                                <div id="collapseFaq<?= $fi ?>" class="collapse">
                                                    <div class="accordion-body"
                                                        style="padding: 0 25px 25px 55px; color: #475569; line-height: 1.7; font-size: 14.5px;">
                                                        <div>
                                                            <?= $f->answer ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        if ($fi >= 8)
                                            break; // Show 8 on homepage in 2 columns
                                        $fi++;
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $fi = 1;
                                if (!empty($faqs)) {
                                    foreach ($faqs as $f) {
                                        if ($fi % 2 == 0) {
                                            ?>
                                            <div class="accordion-item-modern mb-3"
                                                style="border: 1px solid #e2e8f0;  overflow: hidden; transition: all 0.3s ease; background: #fff;">
                                                <div class="accordion-header" id="headingFaq<?= $fi ?>">
                                                    <div class="accordion-button-modern collapsed" data-toggle="collapse"
                                                        data-target="#collapseFaq<?= $fi ?>" aria-expanded="false"
                                                        style="width: 100%; padding: 18px 25px; text-align: left; display: flex; align-items: center; justify-content: space-between; font-weight: 700; color: #1e293b; font-size: 15px; cursor: pointer; transition: all 0.3s ease;">
                                                        <span style="display: flex; align-items: center; gap: 15px;">
                                                            <span
                                                                style="color: var(--blue); opacity: 0.5; font-size: 13px;">0<?= $fi ?>.</span>
                                                            <?= $f->question ?>
                                                        </span>
                                                        <i class="fas fa-plus-circle faq-toggle-icon"
                                                            style="color: var(--blue); transition: all 0.3s ease; font-size: 18px;"></i>
                                                    </div>
                                                </div>
                                                <div id="collapseFaq<?= $fi ?>" class="collapse">
                                                    <div class="accordion-body"
                                                        style="padding: 0 25px 25px 55px; color: #475569; line-height: 1.7; font-size: 14.5px;">
                                                        <div>
                                                            <?= $f->answer ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        if ($fi >= 8)
                                            break; // Show 8 on homepage in 2 columns
                                        $fi++;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <a href="<?= base_url('Home/Faqs') ?>" class="btn"
                            style="background: rgba(0, 109, 171, 0.08); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); padding: 14px 36px; border-radius: 0px; color: var(--blue); font-weight: 800; display: inline-block; text-decoration: none; border: none; font-size: 15px; transition: all 0.3s ease;">View
                            All FAQ's <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .accordion-button-modern:not(.collapsed) .faq-toggle-icon {
            transform: rotate(45deg);
            color: var(--orange) !important;
        }

        .accordion-button-modern:not(.collapsed) {
            color: var(--blue) !important;
            background: rgba(0, 109, 171, 0.02) !important;
        }

        .premium-faq-section {
            position: relative;
        }

        .premium-faq-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(231, 96, 40, 0.03) 0%, transparent 70%);
            z-index: 0;
            pointer-events: none;
        }
    </style>
    <!-- Premium Blog Section START -->
    <section class="premium-blog-section" style="background: #f8fbff; padding: 60px 0;">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-3 d-none d-md-block"></div>
                <div class="col-md-6 text-center animate__animated animate__fadeInLeft">
                    <h2 class="mt-2" style="font-size: 30px; font-weight: 700; color: #001c34; letter-spacing: -1px;">
                        Our Recent Blogs</h2>
                    <div style="width: 80px; height: 5px; background: var(--orange); margin: 12px auto;">
                    </div>
                </div>

            </div>

            <div class="swiper blog-swiper">
                <div class="swiper-wrapper">
                    <?php if (!empty($blogs)) {
                        foreach ($blogs as $b) {
                            ?>
                            <div class="swiper-slide" style="display: flex; height: auto;">
                                <div class="blog-card-modern"
                                    style="background: #fff; border-radius: 0px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.04); height: 100%; border: 1px solid rgba(0,109,171,0.08); display: flex; flex-direction: column; width: 100%;">
                                    <div class="blog-img-wrapper"
                                        style="position: relative; aspect-ratio: 4 / 3; height: auto; overflow: hidden; flex-shrink: 0;">
                                        <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                            data-src="<?= base_url('public/uploads/blog/' . $b->img) ?>" alt="<?= $b->title ?>"
                                            style="width: 100%; height: 100%; object-fit: cover;">

                                        <div class="blog-date-badge"
                                            style="position: absolute; top: 15px; left: 15px; background: rgba(255,255,255,0.95); padding: 6px 12px; border-radius: 0; font-weight: 800; color: var(--blue); font-size: 10px; backdrop-filter: blur(5px); box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                            <i class="far fa-calendar-alt mr-2"></i> <?= date('M d, Y', strtotime($b->date)) ?>
                                        </div>
                                    </div>
                                    <div class="blog-content-modern"
                                        style="padding: 15px 18px; flex-grow: 1; display: flex; flex-direction: column;">
                                        <h4 title="<?= $b->title ?>"
                                            style="font-size: 15px; font-weight: 800; color: #0f172a; margin-bottom: 10px; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 42px;">
                                            <?= $b->title ?>
                                        </h4>
                                        <p
                                            style="font-size: 13px; color: #64748b; line-height: 1.5; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; height: 58px;">
                                            <?= $b->subtitle ?>
                                        </p>
                                        <div style="margin-top: auto;">
                                            <a href="<?= base_url('Home/Blogdeatils/' . $b->id) ?>" class="read-more-link"
                                                style="color: var(--blue); font-weight: 800; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; display: flex; align-items: center; gap: 8px; transition: all 0.3s ease;">
                                                Read Article <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
                <div class="swiper-pagination blog-pagination" style="bottom: -10px;"></div>
            </div>
        </div>
    </section>

    <style>
        .blog-swiper {
            padding: 20px 0 50px !important;
        }

        .blog-swiper .swiper-slide {
            height: auto;
            display: flex;
        }


        .blog-pagination .swiper-pagination-bullet-active {
            background: var(--blue) !important;
            width: 25px;
            border-radius: 10px;
        }
    </style>
    <!-- Premium Blog Section END -->

    </div><!-- End content-block -->
    </div><!-- End page-content -->

    <?php include('include/footer.php') ?>

    <!-- Swiper JS Test -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper_my = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            allowTouchMove: false,
            speed: 3000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.2,
                    spaceBetween: 15,
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
            }
        });

        // Manual hover pause backup
        const mySwiperEl = document.querySelector('.mySwiper');
        if (mySwiperEl) {
            mySwiperEl.addEventListener('mouseenter', () => swiper_my.autoplay.stop());
            mySwiperEl.addEventListener('mouseleave', () => swiper_my.autoplay.start());
        }

        var blogSwiper = new Swiper(".blog-swiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".blog-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }
        });

        // Manual hover pause backup
        const blogEl = document.querySelector('.blog-swiper');
        if (blogEl) {
            blogEl.addEventListener('mouseenter', () => blogSwiper.autoplay.stop());
            blogEl.addEventListener('mouseleave', () => blogSwiper.autoplay.start());
        }
    </script>
    <style>
        .mySwiper .swiper-wrapper {
            transition-timing-function: linear !important;
        }
    </style>
    <!-- Swiper JS End -->

    <?php include('include/index_jslinks.php') ?>

    <div class="modal fade" id="offermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog offermodal">
            <div class="modal-content">
                <button type="button" class="compact-close-x" data-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="modal-body compact-modal-body">
                    <!-- Images Row -->
                    <div class="compact-image-row">
                        <?php
                        foreach ($modal as $m) {
                            ?>
                            <div class="compact-img-card">
                                <a target="_blank" href="<?= $m->url ?>">
                                    <img src="<?= base_url('public/uploads/modal_images/') . $m->image ?>"
                                        title="digicoders" alt="Special Offer" />
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Content Area -->
                    <div class="compact-content-area">
                        <p class="compact-desc"><?= $modal_content->description ?></p>

                        <div class="compact-btn-group">
                            <a href="<?= $modal_content->btn1_url ?>" target="_blank"
                                class="compact-btn btn-compact-dark"><?= $modal_content->btn1_text ?></a>
                            <a href="<?= $modal_content->btn2_url ?>" target="_blank"
                                class="compact-btn btn-compact-orange"><?= $modal_content->btn2_text ?></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <script>
        $(window).on('load', function () {
            $("#offermodal").modal("show");
        });



        $(document).ready(function () {

            var reviewsSwiper = new Swiper(".reviews-swiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                centeredSlides: false,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1.2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });

            // Manual hover pause backup
            const reviewsEl = document.querySelector('.reviews-swiper');
            if (reviewsEl) {
                reviewsEl.addEventListener('mouseenter', () => reviewsSwiper.autoplay.stop());
                reviewsEl.addEventListener('mouseleave', () => reviewsSwiper.autoplay.start());
            }

        });
    </script>

</body>

<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-app.js";
    import { getMessaging, getToken, onMessage as onFirebaseMessage } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-messaging.js";

    const firebaseConfig = {
        apiKey: "AIzaSyAdt6Ogu5s4rf0yV42r-FszfIiLB50IHOE",
        authDomain: "thedigicoders-website-8fcb0.firebaseapp.com",
        projectId: "thedigicoders-website-8fcb0",
        storageBucket: "thedigicoders-website-8fcb0.appspot.com",
        messagingSenderId: "207041730023",
        appId: "1:207041730023:web:ffe0c75170747693f55942",
        measurementId: "G-Y7WPYKLX10"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);

    // Initialize Firebase Cloud Messaging
    const messaging = getMessaging(app);

    onFirebaseMessage(messaging, (payload) => {
        console.log('Message received. ', payload);
    });

    // get Device registration token here
    if (Notification.permission === 'granted') {
        navigator.serviceWorker.register("<?= base_url('firebase-messaging-sw.js') ?>")
            .then((registration) => {
                getToken(
                    messaging,
                    {
                        vapidKey: 'BHDhu_2aoGaCKuMLTtrBu-WIIgf6CCyznjd-F5Apk1jkq0A6yaJrjItDwNsiVsU_-ReaSvzcj5XfpOUZn8IZ5zo',
                        serviceWorkerRegistration: registration
                    }).then((currentToken) => {
                        if (currentToken) {
                            sendTokenToServer(currentToken);
                        } else {
                            console.log('No registration token available. Request permission to generate one.');
                            requestPermission();
                        }
                    }
                    ).catch((err) => {
                        console.log('An error occurred while retrieving token. ', err);
                    });
            }).catch((err) => {
                console.log('Service worker registration failed. ', err);
            });
    } else if (Notification.permission !== 'denied') {
        requestPermission();
    } else {
        console.warn('Notification permission is denied. Token cannot be retrieved.');
    }


    function requestPermission() {
        console.log('Requesting permission...');
        Notification.requestPermission().then((permission) => {
            if (permission === 'granted') {
                console.log('Notification permission granted.');

            }
        });

    }

    function sendTokenToServer(token) {
        $.ajax({
            url: "<?= base_url("Home/SaveFireabseFCMToken"); ?>",
            type: 'POST',
            data: {
                push_token: token
            },
            success: function (response) {
                // console.log(response);
            },
            error: function (err) {

            },
        });
    }

</script>
<script>
    $(document).ready(function () {
        $('.image-link').magnificPopup({
            type: 'image'
        });
    });
</script>


<script type="text/javascript">
    // 	const audio = new Audio();
    // 	audio.src = "<?= base_url('public') ?>/assets/audio/training1.mpeg";
</script>
<script>
    let slides = document.querySelectorAll(".dg-slide");
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove("active"));
        slides[index].classList.add("active");
    }

    /* Auto slide */
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 4000);
</script>



</html>