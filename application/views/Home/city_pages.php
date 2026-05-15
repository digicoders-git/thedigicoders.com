<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $city_name ?> | Best IT/CS Training Institute - DigiCoders Technologies Pvt. Ltd.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="description"
        content="<?= $description ?> <?= $city_name ?>. Learn Web Development, Software Engineering, Data Science, Cybersecurity, AI/ML and more with 100% placement assistance.">
    <meta name="keywords"
        content="<?= $keywords ?> <?= $city_name ?>. Learn Web Development, Software Engineering, Data Science, Cybersecurity, AI/ML and more with 100% placement assistance.">
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />
    <?php include('include/headerlinks.php') ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --green: #00964C;
            --primary: var(--blue);
            --secondary: var(--orange);
            --success: var(--green);
            --light: #f8f9fa;
            --dark: #1a1a2e;
            --gradient: linear-gradient(135deg, var(--blue), var(--orange));
        }

        /* ========== CITY BANNER ========== */
        .city-banner {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            border-radius: 0;
        }

        .city-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.92) 0%, rgba(231, 96, 40, 0.85) 100%);
            z-index: 1;
        }

        .city-banner-entry {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
            padding: 0 15px;
        }

        .city-banner h1 {
            font-size: 2.8rem;
            font-weight: 600;
            color: #fff !important;
            margin: 0;
            letter-spacing: -1.5px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            line-height: 1.1;
        }

        .city-banner p {
            color: #fff !important;
            font-size: 1.4rem;
            font-weight: 500;
            margin-top: 15px;
            letter-spacing: 0.5px;
            opacity: 0.95;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .city-tag {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            color: white;
            padding: 5px 20px;
            border-radius: 0px;
            display: inline-block;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .city-highlights {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .city-highlight {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-weight: 500;
        }

        .city-highlight i {
            color: var(--orange);
            font-size: 1.2rem;
        }

        /* ========== HERO SECTION ========== */
        .training-hero {
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.92), rgba(231, 96, 40, 0.92));
            color: white;
            padding: clamp(60px, 8vw, 100px) 20px;
            position: relative;
            overflow: hidden;
        }

        .training-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('<?= base_url('public/assets/images/Digicoders_banner1.jpg') ?>');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: 1;
        }

        .training-hero .container {
            position: relative;
            z-index: 2;
        }

        .training-hero h1 {
            font-size: clamp(1.8rem, 4vw, 3.2rem);
            font-weight: 600;
            margin-bottom: 25px;
            line-height: 1.1;
        }

        .training-hero .highlight {
            color: var(--orange);
            position: relative;
            display: inline-block;
        }

        .training-hero .highlight::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background: rgba(231, 96, 40, 0.2);
            z-index: -1;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
        }

        .stat-number {
            font-size: clamp(1.8rem, 3vw, 2.8rem);
            font-weight: 600;
            color: var(--orange);
            display: block;
            line-height: 1;
        }

        .stat-label {
            font-size: clamp(0.85rem, 1.5vw, 1rem);
            opacity: 0.9;
            margin-top: 8px;
            font-weight: 500;
        }

        /* ========== COURSE CATEGORIES ========== */
        .course-categories {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--orange);
            border-radius: 2px;
        }

        .section-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 20px auto 0;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .category-card {
            background: white;
            border-radius: 0px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;
            position: relative;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient);
        }

        .category-icon {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--primary);
            padding: 20px;
        }

        .category-content {
            padding: 30px;
        }

        .category-content h3 {
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .category-content h3 i {
            color: var(--primary);
        }

        .course-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .course-list li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .course-list li:hover {
            padding-left: 10px;
            background: #f8f9fa;
        }

        .course-list li:last-child {
            border-bottom: none;
        }

        .course-duration {
            background: var(--gradient);
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .view-all {
            display: block;
            text-align: center;
            margin-top: 50px;
        }

        .btn-call {

            padding: 10px 30px;
            border-radius: 0px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;

            background: #fff;
            color: var(--blue) !important;
            border: 1px solid var(--blue);
        }

        .btn-call:hover {
            background: var(--blue);
            color: #fff !important;
        }


        .btn-center {

            padding: 10px 30px;
            border-radius: 0px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;

            background: #fff;
            color: var(--orange) !important;
            border: 1px solid var(--orange);
        }

        .btn-center:hover {
            background: var(--orange);
            color: #fff !important;
        }


        .btn-whatsapp {

            padding: 10px 30px;
            border-radius: 0px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;

            background: #fff;
            color: var(--green) !important;
            border: 1px solid var(--green);
        }

        .btn-whatsapp:hover {
            background: var(--green);
            color: #fff !important;
        }

        /* ========== SERVICES IN CITY ========== */
        .city-services {
            padding: 100px 20px;
            background: white;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .service-card {
            background: white;
            padding: 40px 30px;
            border-radius: 0px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;

            position: relative;
            overflow: hidden;
            transition: none;
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: rgba(0, 109, 171, 0.05);
            color: var(--primary);
            border-radius: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 25px;
        }


        .service-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* ========== WHY CHOOSE US (Soft Light & Premium) ========== */
        .why-choose {
            padding: 120px 20px;
            background: #fdfdfd;
            color: var(--dark);
            position: relative;
            overflow: hidden;
        }

        .why-choose::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(0, 109, 171, 0.02) 0%, transparent 70%);
            z-index: 1;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 70px;
            position: relative;
            z-index: 2;
        }

        .feature-card {
            background: #ffffff;
            padding: 50px 40px;
            border-radius: 0px;
            text-align: center;
            border: 1px solid #f1f5f9;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 60px rgba(0, 109, 171, 0.1);
            border-color: var(--blue);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: #f8fafc;
            color: var(--blue);
            border-radius: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin: 0 auto 30px;
            transition: all 0.5s ease;
            border: 1px solid #f1f5f9;
        }

        .feature-card:hover .feature-icon {
            background: var(--blue);
            color: #fff;
            transform: rotateY(360deg);
            box-shadow: 0 10px 25px rgba(0, 109, 171, 0.3);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e293b;
            letter-spacing: -0.5px;
        }

        .feature-card p {
            color: #64748b;
            line-height: 1.7;
            font-size: 1rem;
            font-weight: 500;
        }



        /* ========== TESTIMONIALS ========== */
        .testimonial-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .testimonial-slider {
            max-width: 1200px;
            margin: 50px auto 0;
            padding: 20px;
        }

        .testimonial-card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            margin: 10px;
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 5rem;
            color: rgba(0, 109, 171, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .student-info {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .student-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            border: 3px solid var(--primary);
        }

        .student-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .student-details h4 {
            margin: 0;
            color: var(--dark);
            font-size: 1.3rem;
        }

        .student-details p {
            margin: 5px 0 0;
            color: #666;
        }

        .testimonial-text {
            color: #555;
            line-height: 1.7;
            font-size: 1.05rem;
        }

        .rating {
            color: var(--orange);
            margin-top: 15px;
            font-size: 1.2rem;
        }

        /* ========== BATCH SCHEDULE ========== */
        .batch-section {
            padding: 100px 20px;
            background: white;
        }

        .batch-tabs {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .batch-tab {
            padding: 12px 35px;
            background: white;
            border: 2px solid #eee;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #666;
        }

        .batch-tab:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .batch-tab.active {
            background: var(--gradient);
            color: white;
            border-color: transparent;
            box-shadow: 0 8px 20px rgba(0, 109, 171, 0.2);
        }

        .batch-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
        }

        .batch-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            border-left: 5px solid var(--primary);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .batch-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .batch-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .batch-card:hover::before {
            transform: scaleX(1);
        }

        .batch-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .batch-type {
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.1), rgba(231, 96, 40, 0.1));
            color: var(--primary);
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .batch-time {
            color: var(--danger);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* ========== ADMISSION PROCESS ========== */
        .admission-process {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            position: relative;
            overflow: hidden;
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
            margin-top: 60px;
            position: relative;
        }

        .process-steps::before {
            content: '';
            position: absolute;
            top: 60px;
            left: 50px;
            right: 50px;
            height: 3px;
            background: #e2e8f0;
            z-index: 1;
        }

        .step {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .step-number {
            width: 70px;
            height: 70px;
            background: white;
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0 auto 20px;
            border: 5px solid var(--primary);
            box-shadow: 0 10px 25px rgba(0, 109, 171, 0.1);
            transition: all 0.3s ease;
        }

        .step:hover .step-number {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        .step h4 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark);
        }

        /* ========== FACILITIES ========== */
        .facilities-section {
            padding: 100px 20px;
            background: white;
        }

        .facilities-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .facility-card {
            background: white;
            padding: 40px 30px;
            border-radius: 0px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;

            position: relative;
            overflow: hidden;
        }

        .facility-icon {
            width: 80px;
            height: 80px;
            background: rgba(0, 109, 171, 0.05);
            color: var(--primary);
            border-radius: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin: 0 auto 25px;
        }

        /* ========== CTA SECTION ========== */
        .cta-training {
            background: #fcfdfe;
            color: var(--dark);
            padding: 60px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-top: 1px solid #eef2f6;
            border-bottom: 1px solid #eef2f6;
        }

        .cta-training::before {
            display: none;
        }

        .cta-training .container {
            position: relative;
            z-index: 2;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn-outline-light {
            border: 2px solid white;
            color: white;
            background: transparent;
            padding: 18px 40px;
            border-radius: 0px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-outline-light:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
        }

        .btn-light {
            background: white;
            color: var(--primary);
            padding: 18px 40px;
            border-radius: 0px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-light:hover {
            background: var(--dark);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* ========== NEW SECTIONS ========== */
        /* Upcoming Workshops */
        .workshops-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .workshop-card {
            background: white;
            border-radius: 0px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .workshop-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.12);
        }

        .workshop-date {
            background: var(--gradient);
            color: white;
            padding: 15px;
            text-align: center;
        }

        .workshop-date .day {
            font-size: 2rem;
            font-weight: 600;
            line-height: 1;
        }

        .workshop-date .month {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .workshop-content {
            padding: 25px;
        }

        /* Success Stories */
        .success-stories {
            padding: 100px 20px;
            background: white;
        }

        .story-card {
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            border-radius: 0px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .story-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        }

        .student-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 5px solid var(--primary);
        }

        /* ========== RESPONSIVE DESIGN ========== */
        @media (max-width: 1200px) {
            .process-steps::before {
                left: 30px;
                right: 30px;
            }
        }

        @media (max-width: 992px) {

            .training-hero h1 {
                font-size: 2.5rem;
            }

            .section-header h2 {
                font-size: 2.3rem;
            }

            .process-steps::before {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .city-banner {
                min-height: 350px;
                padding: 120px 20px 60px;
            }

            .hero-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .btn-outline-light,
            .btn-light,
            .btn-gradient {
                width: 100%;
                max-width: 100%;
                justify-content: center;
            }

            .batch-tabs {
                flex-direction: column;
                align-items: center;
            }

            .batch-tab {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .city-banner {
                height: 280px;
            }

            .city-banner h1 {
                font-size: 2.2rem;
                letter-spacing: -0.5px;
            }

            .city-banner p {
                font-size: 1.1rem;
            }

            .city-highlights {
                gap: 15px;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .category-grid,
            .features-grid,
            .services-grid,
            .facilities-grid {
                grid-template-columns: 1fr;
            }

            .companies-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testimonial-card {
                padding: 20px;
            }
        }

        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Swiper Customization */
        .swiper-pagination-bullet {
            width: 12px !important;
            height: 12px !important;
            background: #ddd !important;
            opacity: 1 !important;
        }

        .swiper-pagination-bullet-active {
            background: var(--primary) !important;
            transform: scale(1.2);
        }

        .swiper-button-next,
        .swiper-button-prev {
            background: white;
            width: 50px !important;
            height: 50px !important;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 1.2rem !important;
            color: var(--primary);
        }

        /* ========== DG SERVICE SECTION ========== */
        .dg-service {
            padding: 20px 20px 80px 20px;
            background: #fcfcfc;
        }

        .dg-service-card {
            width: 100%;
            background: white;
            border-radius: 0px;
            padding: 50px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            border: 1px solid #f0f0f0;
        }

        .dg-service-left {
            flex: 1;
        }

        .dg-service-left h2 {
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: var(--dark);
            position: relative;
            padding-bottom: 15px;
        }

        .dg-service-left h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--orange);
            border-radius: 0px;
        }

        .dg-two-column {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px 30px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dg-two-column li {
            position: relative;
            padding-left: 25px;
        }

        .dg-two-column li::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 600;
            position: absolute;
            left: 0;
            color: var(--primary);
            font-size: 0.9rem;
        }

        .dg-two-column li a {
            color: #555;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .dg-two-column li a:hover {
            color: var(--primary);
            padding-left: 5px;
        }

        .dg-service-right {
            text-align: center;
            background: var(--gradient);
            padding: 40px;
            border-radius: 0px;
            color: white;
            min-width: 320px;
            position: relative;
            overflow: hidden;
        }

        .dg-service-right::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -20%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .dg-service-right span {
            display: block;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            opacity: 0.9;
        }

        .dg-btn-call {
            background: white;
            color: var(--primary);
            border: none;
            padding: 18px 30px;
            border-radius: 0px;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .dg-btn-call:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            background: #f8f9fa;
        }

        @media (max-width: 992px) {
            .dg-service-card {
                flex-direction: column;
                padding: 40px 30px;
            }

            .dg-service-right {
                width: 100%;
                min-width: unset;
            }
        }

        @media (max-width: 768px) {
            .dg-two-column {
                grid-template-columns: 1fr;
            }

            .dg-service-left h2 {
                font-size: 1.8rem;
            }
        }

        /* ===== Milestone Section ===== */
        /* ===== Milestone Section ===== */
        .dg-milestone {
            padding: 60px 15px;
            background: #f7f9fc;
            text-align: center;
        }

        .dg-container {
            max-width: 1200px;
            margin: auto;
        }

        .dg-section-title {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .dg-section-subtitle {
            color: #555;
            margin-bottom: 40px;
        }

        /* ===== Milestone Cards ===== */
        .dg-milestone-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .dg-milestone-card {
            background: #fff;
            padding: 35px 20px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .dg-milestone-card h3 {
            font-size: 36px;
            color: var(--blue);
            margin-bottom: 10px;
        }

        .dg-milestone-card p {
            font-size: 16px;
            font-weight: 500;
        }

        .dg-milestone-card:hover {
            transform: translateY(-6px);
        }

        /* ===== Office Gallery Section ===== */
        .dg-office {
            padding: 60px 15px;
            background: #fff;
        }

        /* ===== Thumbnail Grid ===== */
        .dg-office-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .dg-office-thumb {
            background: #ffffff;
            padding: 0px;
            border-radius: 0px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: none;
        }

        .dg-office-thumb img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 0px;
            display: block;
        }


        /* ===== Responsive ===== */
        @media (max-width: 992px) {
            .dg-milestone-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .dg-milestone-grid {
                grid-template-columns: 1fr;
            }

            .dg-section-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <?php include('include/header.php') ?>

    <!-- ========== CITY BANNER ========== -->
    <div class="city-banner" title="digicoders-services"
        style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
        <div class="container">
            <div class="city-banner-entry">
                <div class="city-tag">
                    <i class="fas fa-map-marker-alt me-2"></i> Our Services in <?= $city_name ?>
                </div>
                <h1 class="text-white">Best IT Training Institute in <?= $city_name ?> for Career Growth</h1>
                <p class="text-white">Join the leading IT training institute in <?= $city_name ?> with industry-aligned
                    courses, expert faculty, and guaranteed placements.</p>

                <div class="city-highlights">
                    <div class="city-highlight">
                        <i class="fas fa-check-circle"></i>
                        <span>100% Placement Support</span>
                    </div>
                    <div class="city-highlight">
                        <i class="fas fa-check-circle"></i>
                        <span>Live Project Training</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ========== SERVICES IN CITY ========== -->
    <section class="city-services">
        <div class="container">
            <div class="section-header">
                <h2>Our Services in <?= $city_name ?></h2>
                <p>Comprehensive IT training solutions tailored for <?= $city_name ?> students and professionals</p>
            </div>

            <div class="services-grid">
                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Corporate Training</h3>
                    <p>Customized IT training programs for corporate teams in <?= $city_name ?></p>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Campus Placement Training</h3>
                    <p>Special training for college students preparing for campus placements</p>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas fa-laptop-house"></i>
                    </div>
                    <h3>Online Training</h3>
                    <p>Live online classes with interactive sessions for remote learning</p>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <h3>Project Guidance</h3>
                    <p>One-on-one project guidance for final year students</p>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3>Certification Prep</h3>
                    <p>Preparation for global certifications (AWS, Microsoft, Oracle)</p>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Internship Programs</h3>
                    <p>Paid internship opportunities with IT companies in <?= $city_name ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="dg-milestone">
        <div class="container">

            <div class="section-header">
                <h2>Our Office & Work Culture</h2>
                <p>A glimpse of our workspace and creative environment</p>
            </div>

            <div class="dg-office-grid">

                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class1.jpg" alt="Office Image">
                </div>

                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-2.jpg" alt="Office Image">
                </div>

                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-3.jpg" alt="Office Image">
                </div>

                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-4.jpg" alt="Office Image">
                </div>

                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-5.jpg" alt="Office Image">
                </div>

                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-6.jpg" alt="Office Image">
                </div>
                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-7.jpg" alt="Office Image">
                </div>
                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-8.jpg" alt="Office Image">
                </div>
                <div class="dg-office-thumb">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-9.jpg" alt="Office Image">
                </div>
            </div>

        </div>
    </section>

    <!-- ========== WHY CHOOSE US ========== -->
    <section class="why-choose">
        <div class="container">
            <div class="section-header">
                <h2>Why Choose DigiCoders Technologies Pvt. Ltd. in <?= $city_name ?>?</h2>
                <p>Our unique approach to IT education makes us the best choice</p>
            </div>

            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3>Industry Expert Trainers</h3>
                    <p>Learn from professionals with 10+ years industry experience</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>100% Placement Assistance</h3>
                    <p>Dedicated placement cell with 200+ hiring partners</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Live Project Training</h3>
                    <p>Work on real-world projects from day one</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3>Global Certifications</h3>
                    <p>Get industry-recognized certifications</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Small Batch Size</h3>
                    <p>Limited students per batch for individual attention</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3>EMI Options Available</h3>
                    <p>Flexible payment plans with 0% EMI</p>
                </div>
            </div>
        </div>
    </section>




    <!-- ========== ADMISSION PROCESS ========== -->
    <section class="admission-process">
        <div class="container">
            <div class="section-header">
                <h2>Simple Admission Process</h2>
                <p>4 Easy Steps to Start Your IT Career in <?= $city_name ?></p>
            </div>

            <div class="process-steps">
                <div class="step fade-in">
                    <div class="step-number">1</div>
                    <h4>Free Counselling</h4>
                    <p>Call or visit for free career guidance</p>
                </div>

                <div class="step fade-in">
                    <div class="step-number">2</div>
                    <h4>Demo Class</h4>
                    <p>Attend free demo session</p>
                </div>

                <div class="step fade-in">
                    <div class="step-number">3</div>
                    <h4>Admission</h4>
                    <p>Complete enrollment formalities</p>
                </div>

                <div class="step fade-in">
                    <div class="step-number">4</div>
                    <h4>Start Learning</h4>
                    <p>Begin your training journey</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FACILITIES ========== -->
    <section class="facilities-section">
        <div class="container">
            <div class="section-header">
                <h2>World-Class Training Facilities in <?= $city_name ?></h2>
                <p>Experience premium learning environment</p>
            </div>

            <div class="facilities-grid">
                <div class="facility-card fade-in">
                    <div class="facility-icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h4>Modern Computer Labs</h4>
                    <p>Latest i7 systems with dual monitors & high-speed internet</p>
                </div>

                <div class="facility-card fade-in">
                    <div class="facility-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h4>High-Speed Internet</h4>
                    <p>1 Gbps dedicated internet for smooth learning</p>
                </div>

                <div class="facility-card fade-in">
                    <div class="facility-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4>Digital Library</h4>
                    <p>Access to 1000+ e-books & learning resources</p>
                </div>

                <div class="facility-card fade-in">
                    <div class="facility-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h4>Recorded Sessions</h4>
                    <p>Get recordings of all classes for revision</p>
                </div>

                <div class="facility-card fade-in">
                    <div class="facility-icon">
                        <i class="fas fa-chalkboard"></i>
                    </div>
                    <h4>Smart Classrooms</h4>
                    <p>Interactive smart boards & audio-visual aids</p>
                </div>

                <div class="facility-card fade-in">
                    <div class="facility-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Interview Preparation</h4>
                    <p>Mock interviews & GD sessions</p>
                </div>
            </div>
        </div>
    </section>
    <section class="dg-service">
        <div class="container">
            <div class="dg-service-card">

                <!-- LEFT -->
                <div class="dg-service-left">
                    <h2>Training Courses</h2>

                    <ul class="dg-two-column">
                        <?php if (!empty($webs)): ?>
                            <?php foreach ($webs as $web): ?>
                                <li>
                                    <a href="<?= base_url($web->url_slug) ?>">
                                        <?= $web->course_name ?> training in <?= $city_name ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>No services found</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- RIGHT -->
                <div class="dg-service-right">
                    <span>NEED HELP ?</span>
                    <button data-toggle="modal" data-target="#exampleModal" class="dg-btn-call">
                        Request a quote
                    </button>
                </div>

            </div>
        </div>
    </section>
    <!-- ========== CTA SECTION ========== -->
    <section id="contact" class="cta-training">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cta-content">
                        <h2 class="h1 fw-bold mb-3" style="color: var(--dark);">Ready to Launch Your IT Career in
                            <?= $city_name ?>?
                        </h2>
                        <p class="mb-4 mx-auto" style="max-width: 700px; font-size: 1.1rem; color: #555;">
                            Take the first step towards a successful career in technology. Join 21,000+ students who
                            transformed their lives with DigiCoders Technologies.
                        </p>

                        <div class="cta-buttons d-flex justify-content-center gap-3 flex-wrap">
                            <a href="tel:+919198483820" class="btn-call">
                                <i class="fas fa-phone-alt"></i> Call Now
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=919198483820&text=Hello%20DigiCoders%20Technologies Pvt. Ltd.%20<?= urlencode($city_name) ?>,%20I%20want%20to%20know%20more%20about%20IT%20training%20courses"
                                target="_blank" class="btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                            <a href="<?= base_url('Home/Contact') ?>" class="btn-center">
                                <i class="fas fa-map-marker-alt"></i> Visit Center
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>

    <script>


        // Batch Schedule Tabs
        document.querySelectorAll('.batch-tab').forEach(tab => {
            tab.addEventListener('click', function () {
                // Remove active class from all tabs
                document.querySelectorAll('.batch-tab').forEach(t => t.classList.remove('active'));

                // Add active class to clicked tab
                this.classList.add('active');

                // Filter batch cards based on type
                const batchType = this.dataset.batch;
                const batchCards = document.querySelectorAll('.batch-card');

                batchCards.forEach(card => {
                    const cardType = card.querySelector('.batch-type').textContent.toLowerCase();
                    if (batchType === 'all' || cardType.includes(batchType)) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Animate numbers counter
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current) + (element.dataset.count > 95 ? '+' : '%');
            }, 20);
        }

        // Fade in animation on scroll
        function checkFadeIn() {
            const fadeElements = document.querySelectorAll('.fade-in');

            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        }

        // Trigger counter animation when in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = document.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        const target = parseInt(counter.dataset.count);
                        animateCounter(counter, target);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        // Initial check for fade-in elements
        window.addEventListener('scroll', checkFadeIn);
        window.addEventListener('load', checkFadeIn);

        // Observe hero section for counter animation
        const heroSection = document.querySelector('.training-hero');
        if (heroSection) {
            observer.observe(heroSection);
        }

        // Add smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>