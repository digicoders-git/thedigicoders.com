<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Software Training Center in Gorakhpur | GIDA Campus Training - DigiCoders</title>
    <meta name="description"
        content="DigiCoders Gorakhpur offers specialized IT training at BIT Campus, GIDA. Master Python, Java, and PHP with hands-on industrial projects and expert mentorship.">

    <meta property="og:title" content="Best Software Training Center in Gorakhpur | GIDA Campus Training - DigiCoders" />
    <meta property="og:description"
        content="DigiCoders Gorakhpur offers specialized IT training at BIT Campus, GIDA. Master Python, Java, and PHP with hands-on industrial projects and expert mentorship." />

    <?php include('include/headerlinks.php') ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/home-premium.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        :root {
            --primary-blue: #006DAB;
            --accent-orange: #E76028;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--text-dark);
            background-color: #fff;
        }

        /* --- Breadcrumb --- */
        .breadcrumb-section {
            padding: 20px 0;
            background: var(--bg-light);
            border-bottom: 1px solid #e2e8f0;
        }

        .breadcrumb-nav {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .breadcrumb-nav a {
            color: var(--primary-blue);
            text-decoration: none;
        }

        .breadcrumb-nav span {
            margin: 0 8px;
        }

        /* --- Authentic Hero --- */
        .branch-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            position: relative;
            overflow: hidden;
        }

        .branch-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: url('<?= base_url('public/assets/images/gorakhpur-branch-digicoders.jpeg') ?>') center/cover;
            opacity: 0.85;
            mask-image: linear-gradient(to left, rgba(0, 0, 0, 1) 30%, transparent 100%);
            -webkit-mask-image: linear-gradient(to left, rgba(0, 0, 0, 1) 30%, transparent 100%);
        }

        .hero-badge {
            display: inline-block;
            padding: 6px 16px;
            background: rgba(0, 109, 171, 0.1);
            color: var(--primary-blue);
            border-radius: 0px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-title {
            font-size: 2.8rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .hero-desc {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 600px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* --- Key Highlights --- */
        .highlight-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-top: -40px;
            position: relative;
            z-index: 10;
        }

        .highlight-card {
            background: #fff;
            padding: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .highlight-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
        }

        .highlight-card i {
            font-size: 2rem;
            color: var(--primary-blue);
            margin-bottom: 20px;
            display: block;
        }

        .highlight-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .highlight-card p {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* --- Authentic Section Title --- */
        .section-header {
            margin-bottom: 50px;
        }

        .section-header span {
            color: var(--accent-orange);
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 10px;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        /* --- Branch Profile --- */
        .profile-section {
            padding: 100px 0;
        }

        .profile-image-box {
            position: relative;
        }

        .profile-image-box img {
            width: 100%;
            height: auto;
            box-shadow: 20px 20px 0 var(--primary-blue);
        }

        .profile-content {
            padding-left: 40px;
        }

        .profile-content p {
            font-size: 1.05rem;
            line-height: 1.8;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        .infra-section {
            padding: 100px 0;
            background: var(--bg-light);
        }

        .infra-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .infra-item {
            background: #fff;
            border-radius: 0px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            aspect-ratio: 4 / 3;
        }

        .infra-item:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
            box-shadow: 0 15px 35px rgba(0, 109, 171, 0.15);
        }

        .infra-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            display: block;
        }

        .infra-item:hover img {
            transform: scale(1.05);
        }

        /* --- Contact & Map --- */
        .contact-map-section {
            padding: 60px 0;
        }

        .contact-details-box {
            background: #fff;
            color: var(--text-dark);
            padding: 40px;
            border: 1px solid #e2e8f0;
            height: 100%;
        }

        .contact-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-item i {
            font-size: 1.1rem;
            color: var(--accent-orange);
            margin-top: 3px;
        }

        .contact-item h4 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .contact-item p {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 0;
        }

        .map-box {
            height: 100%;
            min-height: 400px;
            border: 1px solid #e2e8f0;
            border-left: none;
        }

        .btn-primary-orange {
            background: var(--accent-orange);
            color: #fff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary-orange:hover {
            background: #d35400;
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 96, 40, 0.3);
        }

        .btn-primary-blue {
            background: var(--primary-blue);
            color: #fff !important;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary-blue:hover {
            background: #005a8e;
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 109, 171, 0.3);
        }

        @media (max-width: 991px) {
            .hero-title {
                font-size: 2rem;
            }

            .profile-content {
                padding-left: 0;
                margin-top: 50px;
            }

            .infra-grid {
                grid-template-columns: 1fr 1fr;
            }

            .contact-details-box {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Authentic Hero -->
    <section class="branch-hero">
        <div class="container">
            <div class="hero-badge">Academic Excellence Hub</div>
            <h1 class="hero-title">Our Gorakhpur Branch</h1>
            <p class="hero-desc">Located within the prestigious Buddha Institute of Technology (BIT) campus, providing a
                perfect blend of academic rigor and professional technical training.</p>
            <div class="hero-actions">
                <a href="<?= base_url('home/registration') ?>"
                    class="btn btn-primary-orange btn-lg rounded-0 px-4 py-3">Enquire Now</a>
                <a href="#location" class="btn btn-primary-blue btn-lg rounded-0 px-4 py-3 ms-3">View Location</a>
            </div>
        </div>
    </section>

    <!-- Key Highlights -->
    <div class="container">
        <div class="highlight-grid">
            <div class="highlight-card">
                <i class="fa-solid fa-university"></i>
                <h3>Campus Integrated</h3>
                <p>Enjoy the benefits of a professional training center located right within your college campus
                    environment.</p>
            </div>
            <div class="highlight-card">
                <i class="fa-solid fa-code-branch"></i>
                <h3>Project Expertise</h3>
                <p>Specialized guidance for final year engineering projects and academic technical requirements.</p>
            </div>
            <div class="highlight-card">
                <i class="fa-solid fa-chalkboard-user"></i>
                <h3>Blended Learning</h3>
                <p>Access to both on-campus mentorship and global webinars from our corporate headquarters.</p>
            </div>
        </div>
    </div>

    <!-- Branch Profile -->
    <section class="profile-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="profile-image-box">
                        <img src="<?= base_url('public/assets/images/gorakhpur-branch-digicoders.jpeg') ?>"
                            alt="Gorakhpur Campus">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile-content">
                        <div class="section-header">
                            <span>About the Branch</span>
                            <h2>Summer Training Hub of GIDA</h2>
                        </div>
                        <p>The Gorakhpur branch of DigiCoders Technologies operates as a unique collaborative center
                            situated within the Buddha Institute of Technology, GIDA. It serves as a vital resource for
                            students in eastern Uttar Pradesh.</p>
                        <p>This center is dedicated to bridging the gap between theoretical college education and
                            industry-standard skills by providing hands-on training in the latest technologies right at
                            the campus doorstep.</p>
                        <div class="row mt-4">
                            <div class="col-6">
                                <h4 class="fw-bold mb-1" style="color: var(--primary-blue);">Campus Lab</h4>
                                <p class="small text-muted">Direct BIT Integration</p>
                            </div>
                            <div class="col-6">
                                <h4 class="fw-bold mb-1" style="color: var(--primary-blue);">15+ Experts</h4>
                                <p class="small text-muted">Campus Mentors</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Infrastructure -->
    <section class="infra-section">
        <div class="container">
            <div class="section-header text-center">
                <span>Infrastructure</span>
                <h2>BIT Campus Facilities</h2>
            </div>
            <div class="infra-grid">
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/digicoders-gorakhpur-industrial-training-center.jpeg') ?>"
                        alt="DigiCoders Gorakhpur Industrial Training Center">
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/digicoders-gorakhpur-classroom-cs-it-training.jpeg') ?>"
                        alt="DigiCoders Gorakhpur Classroom CS IT Training">
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/digicoders-gorakhpur-office-front-view.jpeg') ?>"
                        alt="DigiCoders Gorakhpur Office Front View">
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/digicoders-gorakhpur-placement.jpeg') ?>"
                        alt="DigiCoders Gorakhpur Placement">
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/digicoders-gorakhpur-hr-department-office.jpeg') ?>"
                        alt="DigiCoders Gorakhpur HR Department Office">
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/best-it-training-institute-gorakhpur-digicoders.jpeg') ?>"
                        alt="Best IT Training Institute Gorakhpur DigiCoders">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Map -->
    <section class="contact-map-section" id="location">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <div class="contact-details-box">
                        <div class="section-header">
                            <span style="color: var(--accent-orange);">Connect</span>
                            <h2 style="color: var(--text-dark);">Visit Gorakhpur Branch</h2>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                <h4>Branch Address</h4>
                                <p>INSIDE MAIN BUILDING, BUDDHA INSTITUTE OF TECHNOLOGY, CL-1, SECTOR-7, GIDA,
                                    GORAKHPUR, UP, 273209</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <div>
                                <h4>Phone Numbers</h4>
                                <p>+91 63942 96293 +91 91984 83820</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <div>
                                <h4>Email Enquiries</h4>
                                <p>thedigicoders@gmail.com digicoderstech@gmail.com</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-clock"></i>
                            <div>
                                <h4>Office Hours</h4>
                                <p>Mon - Sat: 10:00 AM - 07:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="map-box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d890.7891541300389!2d83.2707843!3d26.7393778!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399147380139859b%3A0x708768ccb2c065c9!2sBuddha%20Institute%20of%20Technology%20%2C%20Gorakhpur!5e0!3m2!1sen!2sin!4v1778934690711!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>