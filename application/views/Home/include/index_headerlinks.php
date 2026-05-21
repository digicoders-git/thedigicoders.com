<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- DNS Preconnect for CDNs -->
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://www.googletagmanager.com">
<link rel="preconnect" href="https://connect.facebook.net" crossorigin>
<link rel="canonical" href="<?php 
    $ci =& get_instance();
    $uri = strtolower(trim($ci->uri->uri_string(), '/'));
    if ($uri == 'home' || $uri == 'home/index' || $uri == '') {
        echo 'https://thedigicoders.com/';
    } else {
        if (strpos($uri, 'home/') === 0) {
            $uri = substr($uri, 5);
        }
        $legacy_mappings = [
            'register' => 'registration',
            'ourexpert' => 'our-expert',
            'achievement' => 'achievements',
            'vocationaltraining' => 'vocational-training',
            'summertraining' => 'summer-training',
            'wintertraining' => 'winter-training',
            'industrialtraining' => 'industrial-training',
            'apprenticeshiptraining' => 'apprenticeship-training',
            'internshiptraining' => 'internship-training',
            'projecttraining' => 'project-training',
            'quicklinks' => 'quick-links',
            'verifycertificate' => 'verify-certificate',
            'finalyearproject' => 'final-year-project',
            'privacypolicy' => 'privacy-policy',
            'refund_policy' => 'refund-policy',
            'interviewqns' => 'interview-questions',
            'downloadfeereciept' => 'download-fee-receipt',
            'payfee' => 'pay-fee'
        ];
        if (isset($legacy_mappings[$uri])) {
            $uri = $legacy_mappings[$uri];
        }
        echo 'https://thedigicoders.com/' . $uri;
    }
?>" />

<meta name="title"
  content="Best Summer Training & Internship Company in Lucknow, India | DigiCoders Technologies Pvt. Ltd.">
<meta name="description"
  content="DigiCoders Technologies Pvt. Ltd. is one of the best Summer Training and Internship companies in Lucknow, India. We provide Summer Training, Internship Training, Apprenticeship Training, AI & ML Training, Python Training, Cloud Computing Training, Data Analytics Training, Winter Training, Industrial Training, Vocational Training, Faculty Development Programs, Robotics Training, and Live Project Training for students and professionals.">
<meta name="keywords"
  content="Summer Training in Lucknow, Internship Training in Lucknow, Best Summer Training Company in India, Summer Internship Program, 6 Weeks Summer Training, 45 Days Summer Training, Industrial Training Institute, Vocational Training, Winter Training in Lucknow, Apprenticeship Training, AI Training, Machine Learning Training, Artificial Intelligence Course, AI & ML Training, Python Python Course, Django Training, Flask Training, Java Training, Full Stack Development Training, Web Development Training, MERN Stack Training, React JS Training, Node JS Training, PHP Training, Laravel Training, Android App Development Training, Mobile App Development Course, Cloud Computing Training, AWS Training, DevOps Training, Data Analytics Training, Data Science Training, Power BI Training, Cyber Security Training, Ethical Hacking Course, Digital Marketing Training, SEO Training, Robotics Training, Faculty Development Program, FDP Training, Engineering Training Institute, Polytechnic Training, B.Tech Internship, MCA Internship, BCA Internship, IT Training Institute in Lucknow, Best Internship Company, Internship with Certificate, Live Project Training, Industrial Internship, Software Training Institute, Coding Training Institute, Computer Courses in Lucknow, DigiCoders Technologies Pvt. Ltd., DigiCoders Lucknow, Internship in India, Summer Internship in India">
<meta name="author" content="DigiCoders Technologies Pvt. Ltd.">
<meta name="MobileOptimized" content="320">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="DigiCoders Technologies" />
<meta property="og:url" content="https://thedigicoders.com/" />
<meta property="og:title" content="Best Summer Training &amp; Internship Company in Lucknow | DigiCoders Technologies" />
<meta property="og:description" content="DigiCoders Technologies Pvt. Ltd. is one of the best Summer Training and Internship companies in Lucknow, India. We provide Summer Training, Python, PHP, Java, Android, AI/ML, Data Analytics, and more." />
<meta property="og:image" content="https://thedigicoders.com/public/assets/images/logo.jpg" />
<meta property="og:image:secure_url" content="https://thedigicoders.com/public/assets/images/logo.jpg" />
<meta property="og:image:width" content="640" />
<meta property="og:image:height" content="640" />
<meta property="og:image:alt" content="DigiCoders Technologies - Best IT Training Institute in Lucknow" />

<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@DigiCodersTech">
<meta name="twitter:title" content="Best Summer Training &amp; Internship Company in Lucknow | DigiCoders Technologies">
<meta name="twitter:description" content="DigiCoders Technologies offers best Summer Training, Internship, Industrial Training, PHP, Python, Java, Android &amp; more in Lucknow.">
<meta name="twitter:image" content="https://thedigicoders.com/public/assets/images/logo.jpg">

<meta name="google-site-verification" content="K5LyX9f8PiO9iz_zXQzjmbNUAgWTMazR9RrmjJbJNGs" />

<!-- FAVICONS ICON ============================================= -->
<link rel="icon" href="<?= base_url('public') ?>/assets/images/favicon.png" type="image/x-icon">
<link rel="apple-touch-icon" href="<?= base_url('public') ?>/assets/images/favicon.png" type="image/png">

<!-- All PLUGINS CSS ============================================= -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="all">
<!-- Deferred FontAwesome 4.7 for legacy support -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  media="print" onload="this.media='all'">

<link rel="stylesheet" href="<?= base_url('public') ?>/assets/vendors/flaticon/flaticon.css" media="print"
  onload="this.media='all'">
<link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/assets.css" media="all">

<!-- TYPOGRAPHY ============================================= -->
<link href="<?= base_url('public') ?>/assets/css/typography.css" rel="stylesheet" media="all" />
<!-- SHORTCODES ============================================= -->
<link href="<?= base_url('public') ?>/assets/css/shortcodes/shortcodes.css" rel="stylesheet" media="all" />
<!-- STYLESHEETS ============================================= -->
<link href="<?= base_url('public') ?>/assets/css/style.css" rel="stylesheet" media="all" />
<link href="<?= base_url('public') ?>/assets/css/color/color-3.css" rel="stylesheet" media="all" />
<!-- REVOLUTION SLIDER CSS ============================================= -->
<link href="<?= base_url('public') ?>/assets/vendors/revolution/css/layers.css" rel="stylesheet" media="print"
  onload="this.media='all'" />
<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/settings.css"
  media="print" onload="this.media='all'">
<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/navigation.css"
  media="print" onload="this.media='all'">
<!-- REVOLUTION SLIDER END -->
<!--Chat bot-->
<link href="<?= base_url('public') ?>/assets/MyStyle.css" rel="stylesheet" media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" media="print"
  onload="this.media='all'" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" media="print"
  onload="this.media='all'" />



<style>
  .parsley-required {
    color: red;
  }

  .parsley-length {
    color: red;
  }

  /* Squeeze header container by extra 5px */
  .top-bar .container,
  .sticky-header .container {
    padding-left: 20px !important;
    padding-right: 20px !important;
  }
</style>

<!-- For PWA Setup -->
<link rel="manifest" href="<?= base_url('manifest.json') ?>">
<meta name="theme-color" content="#004dfd">
<script src="<?= base_url('pwa.js') ?>" defer></script>



<!-- Meta Pixel Code -->
<script>
  !function (f, b, e, v, n, t, s) {
    if (f.fbq) return; n = f.fbq = function () {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
    n.queue = []; t = b.createElement(e); t.async = !0;
    t.src = v; s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '772467344612291');
  fbq('track', 'PageView');
</script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y7WPYKLX10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'G-Y7WPYKLX10');
</script>

<!-- Schemas are defined cleanly and centrally in Index.php to avoid duplicates and syntax errors -->




<!-- Google Tag Manager -->
<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P8F3JN92');</script>-->
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8F3JN92" height="0" width="0"
    style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=772467344612291&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->