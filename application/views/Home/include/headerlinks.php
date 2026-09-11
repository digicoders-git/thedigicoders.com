<?php
$ci =& get_instance();
$uri = strtolower(trim($ci->uri->uri_string(), '/'));
if ($uri == 'home' || $uri == 'home/index' || $uri == '') {
	$canonical_url = 'https://thedigicoders.com/';
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
	$canonical_url = 'https://thedigicoders.com/' . $uri;
}

// Set dynamic SEO defaults if not set in views
// Reverted dynamic settings back to original layout
?>
<!-- DNS Preconnect for CDNs -->
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link rel="preconnect" href="https://www.googletagmanager.com">
<link rel="preconnect" href="https://connect.facebook.net" crossorigin>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="<?php echo $canonical_url; ?>" />

<?php if (!isset($is_blog_details) || !$is_blog_details): ?>
	<meta name="description"
		content="<?php echo isset($meta_desc) && !empty($meta_desc) ? htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8') : 'DigiCoders Technologies Pvt. Ltd. is the best IT training company in Lucknow offering Summer Training, Internship, Python, Java, PHP, Android, Web Development and Live Project Training.'; ?>">
	<!-- Twitter Card Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@DigiCodersTech">
	<meta name="twitter:title" content="DigiCoders Technologies - Best IT Training Institute in Lucknow">
	<meta name="twitter:description"
		content="DigiCoders Technologies offers best Summer Training, Internship, Industrial Training, PHP, Python, Java, Android & more in Lucknow.">
	<meta name="twitter:image" content="https://thedigicoders.com/public/assets/images/logo.jpg">
<?php endif; ?>

<!-- FAVICONS ICON ============================================= -->
<link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
<link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
<link rel="icon" type="image/png" sizes="48x48" href="<?= base_url('public/assets/images/favicon-48.png') ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('public/assets/images/favicon-96.png') ?>">
<link rel="icon" type="image/png" sizes="144x144" href="<?= base_url('public/assets/images/favicon-144.png') ?>">
<link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('public/assets/images/favicon-192.png') ?>">
<link rel="apple-touch-icon" sizes="192x192" href="<?= base_url('public/assets/images/favicon-192.png') ?>">

<meta name="author" content="DigiCoders Technologies Pvt. Ltd.">
<meta name="MobileOptimized" content="320">
<meta name="application-name" content="Digicoders Technologies" />
<meta name="apple-mobile-web-app-title" content="Digicoders Technologies" />
<meta property="og:locale" content="en_US" />
<?php if (!isset($is_blog_details) || !$is_blog_details): ?>
	<meta property="og:type" content="website" />
<?php endif; ?>
<meta property="og:site_name" content="Digicoders Technologies" />
<meta property="og:url" content="<?php echo $canonical_url; ?>" />
<?php if (!isset($is_blog_details) || !$is_blog_details): ?>
	<meta property="og:image" content="https://thedigicoders.com/public/assets/images/logo.jpg" />
	<meta property="og:image:secure_url" content="https://thedigicoders.com/public/assets/images/logo.jpg" />
	<meta property="og:image:width" content="640" />
	<meta property="og:image:height" content="640" />
	<meta property="og:image:alt" content="DigiCoders Technologies - Best IT Training Institute in Lucknow" />
	<meta name="keywords"
		content="project training, PHP, Python, Android, .Net, Best training institute in Lucknow India UP, mobile app development training, mobile application development course, apprenticeship training institute, winter training program in Lucknow, Software Development Training Program in Lucknow, Apprenticeship Training for Engineering Students, Summer Training For B.Tech Students Lucknow, Live Projects Training in Lucknow, vocational training program lucknow, best apprenticeship training in lucknow, winter training for diploma students, winter training for b.tech students, apprenticeship training for diploma students, Summer Training in Lucknow, Project Training in Lucknow, Training Company in Lucknow, Best Training Company in Lucknow, 45 Days Training in Lucknow, Apprenticeship Training in Lucknow, Job Oriented Training in LucknowLucknow Training Company, Internship Training in Lucknow, internship training program, internship training program in lucknow, summer training program, web and mobile app development training program, app development training" />
<?php endif; ?>

<meta name="google-site-verification" content="K5LyX9f8PiO9iz_zXQzjmbNUAgWTMazR9RrmjJbJNGs" />

<!-- All PLUGINS CSS ============================================= -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
	media="print" onload="this.media='all'">
<link rel="stylesheet" href="<?= base_url('public') ?>/assets/vendors/flaticon/flaticon.css" media="print"
	onload="this.media='all'">
<link href="<?= base_url('public') ?>/assets/css/assets.css" rel="stylesheet" />
<!-- TYPOGRAPHY ============================================= -->
<link href="<?= base_url('public') ?>/assets/css/typography.css" rel="stylesheet" />

<!-- SHORTCODES ============================================= -->
<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/shortcodes/shortcodes.css">
<!-- STYLESHEETS ============================================= -->
<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/style.css">
<link class="skin" rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/color/color-1.css">
<!-- Revolution Slider CSS removed (slider not in use) -->
<!--Manual css-->
<link href="<?= base_url('public') ?>/assets/MyStyle.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" media="print"
	onload="this.media='all'" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
	integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
	.parsley-required {
		color: red;
	}

	.parsley-length {
		color: red;
	}

	@media only screen and (max-width: 600px) {
		.Followtest {
			font-size: 10px !important;
		}

		.page-banner h1 {
			font-size: 1.8rem !important;
			line-height: 1.2 !important;
			margin-bottom: 15px !important;
		}

		.page-banner p {
			font-size: 1rem !important;
			line-height: 1.4 !important;
			margin: 0 !important;
		}

		.table {
			margin-left: 15px !important;
			margin-right: 15px !important;
			width: calc(100% - 30px) !important;
		}

		/* Sidebar Visibility Fix */
		#flaxdiv {
			display: none !important;
		}

		#flaxdiv1 {
			display: block !important;
			padding: 20px !important;
		}
	}

	.opacity-8 {
		opacity: 0.8;
	}

	/* Squeeze header container by extra 5px */
	.top-bar .container,
	.sticky-header .container {
		padding-left: 20px !important;
		padding-right: 20px !important;
	}

	/* Global Link Hover Reset */
	/* a:hover,
	a:focus,
	a:active,
	.prem-nav li a:hover,
	.footer_widget ul li a:hover {
		text-decoration: none !important;
		outline: none !important;
		border: none !important;
		box-shadow: none !important;
		color: inherit !important;
	} */
</style>

<!-- Google Tag Manager -->
<script>(function (w, d, s, l, i) {
		w[l] = w[l] || []; w[l].push({
			'gtm.start':
				new Date().getTime(), event: 'gtm.js'
		}); var f = d.getElementsByTagName(s)[0],
			j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-P8F3JN92');</script>
<!-- End Google Tag Manager -->

<!-- Google Analytics tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5HGGTZ0NV7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'G-5HGGTZ0NV7');
</script>

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

<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=772467344612291&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->