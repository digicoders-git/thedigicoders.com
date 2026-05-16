<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best IT Training Company in Lucknow | Industrial Training Center - DigiCoders</title>
    <meta name="description"
        content="Join the best IT training company in Lucknow. DigiCoders offers professional industrial training in Python, Java, PHP, MERN & Web Development with 100% placement support.">

    <meta property="og:title" content="Best IT Training Company in Lucknow | Industrial Training Center - DigiCoders" />
    <meta property="og:description"
        content="Join the best IT training company in Lucknow. DigiCoders offers professional industrial training in Python, Java, PHP, MERN & Web Development with 100% placement support." />
    <meta property="og:url" content="<?= strtolower(base_url($this->uri->uri_string())) ?>" />
    <link rel="canonical" href="<?= strtolower(base_url($this->uri->uri_string())) ?>" />

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
            background: url('<?= base_url('public/assets/images/campus/it-training-institute-project-development-lab-digicoders-lucknow.jpg') ?>') center/cover;
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
            font-size: 2.5rem;
            font-weight: 600;
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

        /* --- Infrastructure Grid --- */
        .infra-section {
            padding: 100px 0;
            background: var(--bg-light);
        }

        .infra-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .infra-item {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .infra-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .infra-item:hover img {
            transform: scale(1.1);
        }

        .infra-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: #fff;
            font-size: 0.9rem;
            font-weight: 500;
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

    <!-- HQ Hero -->
    <section class="branch-hero">
        <div class="container">
            <div class="hero-badge">Corporate Headquarters</div>
            <h1 class="hero-title">Lucknow Head Office</h1>
            <p class="hero-desc">The flagship center of DigiCoders Technologies, empowering thousands of students in the
                heart of Uttar Pradesh with industry-standard technical skills.</p>
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
                <i class="fa-solid fa-microchip"></i>
                <h3>Tech-First Approach</h3>
                <p>Advanced labs equipped with the latest software and high-speed infrastructure for seamless learning.
                </p>
            </div>
            <div class="highlight-card">
                <i class="fa-solid fa-user-tie"></i>
                <h3>Expert Mentorship</h3>
                <p>Learn directly from industry veterans who have shaped the careers of over 25,000+ students.</p>
            </div>
            <div class="highlight-card">
                <i class="fa-solid fa-award"></i>
                <h3>Placement Hub</h3>
                <p>Our Lucknow center acts as the primary recruitment node for our 350+ placement partners.</p>
            </div>
        </div>
    </div>

    <!-- Branch Profile -->
    <section class="profile-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="profile-image-box">
                        <img src="<?= base_url('public/assets/images/lucknow-head-office-digicoders.jpg') ?>"
                            alt="Lucknow Campus">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="profile-content">
                        <div class="section-header">
                          <span>About Our Head Office</span>
                            <h2>DigiCoders Lucknow – The Epicenter of Excellence in IT Training</h2>

                            <p>DigiCoders Technologies was founded with a vision to deliver industry-focused technical education, and our Lucknow Head Office proudly stands as the foundation of that mission. Located in the prime area of Aliganj, Lucknow, this branch has grown into one of the best IT training institutes in Lucknow, helping thousands of students build successful careers in technology.</p>
      
                            <p>Certified with ISO 9001:2015, DigiCoders Lucknow maintains global standards in education quality, practical learning, and career support—making it a trusted destination for students searching for the top computer institute in Lucknow.</p>
                            <div class="row mt-4">
                            <div class="col-6">
                                <h4 class="fw-bold mb-1" style="color: var(--primary-blue);">10,000+ Sq Ft</h4>
                                <p class="small text-muted">Premium Campus Space</p>
                            </div>
                            <div class="col-6">
                                <h4 class="fw-bold mb-1" style="color: var(--primary-blue);">50+ Experts</h4>
                                <p class="small text-muted">Dedicated Mentors</p>
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
                <h2>World-Class Facilities</h2>
            </div>
            <div class="infra-grid">
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/it-training-company-software-development-lab-digicoders-lucknow.jpeg') ?>"
                        alt="Software Development Lab at DigiCoders - Best IT Training Company in Lucknow">
                    <div class="infra-caption">Software Development Lab</div>
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/industrial-training-center-smart-classroom-digicoders-lucknow.jpeg') ?>"
                        alt="Modern Smart Classrooms for Industrial Training at DigiCoders Lucknow">
                    <div class="infra-caption">Smart Classrooms</div>
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/best-it-training-company-seminar-hall-digicoders-lucknow.jpg') ?>"
                        alt="Interactive Seminar Hall for Workshops and Technical Sessions at DigiCoders">
                    <div class="infra-caption">Interactive Seminar Hall</div>
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/it-training-institute-project-development-lab-digicoders-lucknow.jpg') ?>"
                        alt="R&D Project Center for Final Year Engineering and Diploma Projects">
                    <div class="infra-caption">R&D Project Center</div>
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/corporate-training-center-collaboration-zone-digicoders-lucknow.jpeg') ?>"
                        alt="Student Collaboration Zone for Group Projects and Technical Discussions">
                    <div class="infra-caption">Collaboration Zone</div>
                </div>
                <div class="infra-item">
                    <img src="<?= base_url('public/assets/images/campus/placement-oriented-it-training-counseling-desk-digicoders-lucknow.jpeg') ?>"
                        alt="Counseling and Placement Cell at DigiCoders IT Training Company">
                    <div class="infra-caption">Placement & Counseling Cell</div>
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
                            <h2 style="color: var(--text-dark);">Visit our HQ</h2>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                <h4>Branch Address</h4>
                                <p>2ND FLOOR, B-36, SECTOR O, NEAR RAM RAM BANK CHAURAHA, ALIGANJ, LUCKNOW, UP 226021
                                </p>
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
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d222.37302158600735!2d80.9493697!3d26.9044997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd90f852511b%3A0xea3004cdf494ecbb!2sDigiCoders%20Technologies%20Private%20Limited%2C%20Best%20Software%2FWebsite%2FMobile%20App%20Development%20Company%20in%20Lucknow!5e0!3m2!1sen!2sin!4v1778934638235!5m2!1sen!2sin"
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