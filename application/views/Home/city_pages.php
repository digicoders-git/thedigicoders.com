<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $city_name ?> | Best IT/CS Training Institute - DigiCoders Technoloies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="description"
        content="<?= $description?> <?= $city_name ?>. Learn Web Development, Software Engineering, Data Science, Cybersecurity, AI/ML and more with 100% placement assistance.">
    <meta name="keywords"
        content="<?= $keywords?> <?= $city_name ?>. Learn Web Development, Software Engineering, Data Science, Cybersecurity, AI/ML and more with 100% placement assistance.">
    <?php include('include/headerlinks.php') ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #6610f2;
            --success: #198754;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #17a2b8;
            --light: #f8f9fa;
            --dark: #1a1a2e;
            --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        /* ========== CITY BANNER ========== */
        .city-banner {
            position: relative;
            min-height: 400px;
            padding: 100px 20px 60px;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?= base_url('public/assets/images/back.jpg') ?>');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        .city-banner-content {
            max-width: 800px;
            padding: 20px;
            z-index: 2;
        }

        .city-tag {
            background: var(--gradient);
            color: white;
            padding: 8px 25px;
            border-radius: 30px;
            font-size: 1.2rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
        }

        .city-banner h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 2px 4px 15px rgba(0, 0, 0, 0.6);
            color: white !important;
            line-height: 1.2;
        }

        .city-banner p {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            opacity: 0.95;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .city-highlights {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .city-highlight {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .city-highlight i {
            color: #ffd700;
            font-size: 1.2rem;
        }

        /* ========== HERO SECTION ========== */
        .training-hero {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.92), rgba(102, 16, 242, 0.92));
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
            background: url('<?= base_url('public/assets/images/back.jpg') ?>');
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
            font-weight: 800;
            margin-bottom: 25px;
            line-height: 1.1;
        }

        .training-hero .highlight {
            color: #ffd700;
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
            background: rgba(255, 215, 0, 0.2);
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
            font-weight: 800;
            color: #ffd700;
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
            font-size: 2.8rem;
            font-weight: 800;
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
            background: var(--gradient);
            border-radius: 2px;
        }

        .section-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 700px;
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
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            position: relative;
        }

        .category-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
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
            font-weight: 700;
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

        .btn-gradient {
            background: var(--gradient);
            color: white;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.3);
            color: white;
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
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #eee;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
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

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(102, 16, 242, 0.1));
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin: 0 auto 25px;
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            background: var(--gradient);
            color: white;
            transform: scale(1.1);
        }

        .service-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* ========== WHY CHOOSE US ========== */
        .why-choose {
            padding: 100px 20px;
            background: linear-gradient(135deg, var(--dark) 0%, #2a2a4e 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .why-choose::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.3;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 35px 25px;
            border-radius: 15px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-10px);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin: 0 auto 20px;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: rotateY(360deg);
        }

        /* ========== PLACEMENT SECTION ========== */
        .placement-section {
            padding: 100px 20px;
            background: white;
        }

        .companies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 25px;
            margin-top: 50px;
        }

        .company-logo {
            background: white;
            padding: 25px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
        }

        .company-logo:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
            border-color: var(--primary);
        }

        .company-logo img {
            max-width: 100%;
            max-height: 50px;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .company-logo:hover img {
            filter: grayscale(0);
            opacity: 1;
            transform: scale(1.1);
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
            color: rgba(13, 110, 253, 0.1);
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
            color: #ffd700;
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
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.2);
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
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(102, 16, 242, 0.1));
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
            background: linear-gradient(90deg, var(--primary), var(--secondary));
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
            font-weight: 800;
            margin: 0 auto 20px;
            border: 5px solid var(--primary);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.2);
            transition: all 0.3s ease;
        }

        .step:hover .step-number {
            background: var(--gradient);
            color: white;
            transform: scale(1.1);
        }

        .step h4 {
            font-size: 1.3rem;
            font-weight: 700;
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
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid #f0f0f0;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .facility-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
            border-color: var(--primary);
        }

        .facility-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(102, 16, 242, 0.1));
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin: 0 auto 25px;
            transition: all 0.3s ease;
        }

        .facility-card:hover .facility-icon {
            background: var(--gradient);
            color: white;
            transform: rotate(15deg);
        }

        /* ========== CTA SECTION ========== */
        .cta-training {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 100px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-training::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('<?= base_url('public/assets/images/back.jpg') ?>');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: 1;
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
            padding: 15px 35px;
            border-radius: 30px;
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
            padding: 15px 35px;
            border-radius: 30px;
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
            border-radius: 15px;
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
            font-weight: 800;
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
            border-radius: 15px;
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
            .city-banner h1 {
                font-size: 2.8rem;
            }

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
                min-height: 300px;
                padding: 100px 15px 40px;
            }

            .city-highlights {
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            .city-highlight {
                justify-content: center;
                width: 100%;
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
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
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
            font-weight: 800;
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
            background: var(--gradient);
            border-radius: 2px;
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
            font-weight: 900;
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
            border-radius: 20px;
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
            border-radius: 50px;
            font-weight: 700;
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
    font-weight: 700;
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
    color: #0d6efd;
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
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

/* ===== Thumbnail Box (Clean Bootstrap Style) ===== */
.dg-office-thumb {
    background: #ffffff;
    padding: 8px;
    border-radius: 14px;
    border: 1px solid #595959ff;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
    overflow: hidden;
    transition: all 0.35s ease;
}

/* ===== Thumbnail Image ===== */
.dg-office-thumb img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.35s ease;
}

/* ===== Hover Effects (Soft & Premium) ===== */
.dg-office-thumb:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 32px rgba(0, 0, 0, 0.12);
}

.dg-office-thumb:hover img {
    transform: scale(1.05);
}

/* ===== Responsive ===== */
@media (max-width: 992px) {
    .dg-milestone-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .dg-office-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px) {
    .dg-milestone-grid {
        grid-template-columns: 1fr;
    }

    .dg-office-grid {
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
    <section class="city-banner">
        <div class="city-banner-content">
            <div class="city-tag">
                <i class="fas fa-map-marker-alt me-2"></i> Our Services in <?= $city_name ?>
            </div>
            <h1>Transform Your IT Career in <?= $city_name ?></h1>
            <p>Join the leading IT training institute in <?= $city_name ?> with industry-aligned courses, expert
                faculty, and guaranteed placements.</p>

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
    </section>

    <!-- ========== HERO SECTION ========== -->
    <section class="training-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Become a <span class="highlight">Certified IT Professional</span> in <?= $city_name ?></h1>
                    <p class="lead" style="font-size: 1.3rem; margin-bottom: 30px;">
                        Master in-demand technologies with hands-on training from industry experts.
                        Get job-ready with our comprehensive IT training programs.
                    </p>


                </div>

                <div class="col-lg-6">
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number" data-count="21000">0+</span>
                            <span class="stat-label">Students Trained</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-count="100">0+</span>
                            <span class="stat-label">Companies Visited</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-count="95">0%</span>
                            <span class="stat-label">Placement Rate</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number" data-count="10">0+</span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



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
                        <i class="fas fa-file-certificate"></i>
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
    <div class="dg-container">

        <h2 class="dg-section-title">Our Office & Work Culture</h2>
        <p class="dg-section-subtitle">
            A glimpse of our workspace and creative environment
        </p>

        <div class="dg-office-grid">

            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class1.jpg" alt="Office Image">
            </div>

            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-2.jpg" alt="Office Image">
            </div>

            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-3.jpg" alt="Office Image">
            </div>

            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-4.jpg" alt="Office Image">
            </div>

            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-5.jpg" alt="Office Image">
            </div>

            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-6.jpg" alt="Office Image">
            </div>
            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-7.jpg" alt="Office Image">
            </div>
            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-8.jpg" alt="Office Image">
            </div>
            <div class="dg-office-thumb">
                <img src="<?= base_url('public') ?>/assets/images/campus/digicoders-class-9.jpg" alt="Office Image">
            </div>
        </div>

    </div>
</section>

    <!-- ========== WHY CHOOSE US ========== -->
    <section class="why-choose">
        <div class="container">
            <div class="section-header">
                <h2 style="color: white;">Why Choose DigiCoders Technoloies in <?= $city_name ?>?</h2>
                <p style="color: rgba(255,255,255,0.8);">Our unique approach to IT education makes us the best choice
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4 style="color: white;">Industry Expert Trainers</h4>
                    <p>Learn from professionals with 10+ years industry experience</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4 style="color: white;">100% Placement Assistance</h4>
                    <p>Dedicated placement cell with 200+ hiring partners</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4 style="color: white;">Live Project Training</h4>
                    <p>Work on real-world projects from day one</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4 style="color: white;">Global Certifications</h4>
                    <p>Get industry-recognized certifications</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 style="color: white;">Small Batch Size</h4>
                    <p>Limited students per batch for individual attention</p>
                </div>

                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h4 style="color:white;">EMI Options Available</h4>
                    <p>Flexible payment plans with 0% EMI</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== PLACEMENT SECTION ========== -->
    <section class="placement-section">
        <div class="container">
            <div class="section-header">
                <h2>Our Students Placed In</h2>
                <p>Top companies where our students are working</p>
            </div>

            <section class="partners">
                <div class="elementor-element elementor-element-d3ef69b e-flex e-con-boxed e-con e-parent"
                    data-id="d3ef69b" data-element_type="container">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-ac15ae1 elementor-widget elementor-widget-image-carousel"
                            data-id="ac15ae1" data-element_type="widget"
                            data-settings="{&quot;slides_to_show&quot;:&quot;4&quot;,&quot;navigation&quot;:&quot;none&quot;,&quot;autoplay_speed&quot;:3000,&quot;autoplay&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;infinite&quot;:&quot;yes&quot;,&quot;speed&quot;:500}"
                            data-widget_type="image-carousel.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image-carousel-wrapper swiper" role="region"
                                    aria-roledescription="carousel" aria-label="Image Carousel" dir="ltr">
                                    <div class="elementor-image-carousel swiper-wrapper" aria-live="off">
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="1 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/1.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="2 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/2.webp"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="3 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/3.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <!-- <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="4 of 90">
                                        <figure class="swiper-slide-inner">
                                            <img decoding="async" class="swiper-slide-image" src="<?= base_url('public') ?>/assets/images/Recruiter/4.png" alt="RECRUITER" />
                                        </figure>
                                    </div> -->
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="5 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/5.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="6 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/6.webp"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="7 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/7.webp"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="8 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/8.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="9 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/9.webp"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="10 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/10.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="11 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/11.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="12 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/12.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="13 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/13.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="14 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/14.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="15 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/15.jpeg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="16 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/16.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="17 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/17.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="18 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/18.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="19 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/19.jpeg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="20 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/20.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="21 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/21.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="22 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/22.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="23 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/23.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="24 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/24.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="26 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/25.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="27 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/26.webp"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="28 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/27.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="28 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/28.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="29 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/29.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="30 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/30.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="31 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/31.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="32 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/32.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="33 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/33.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="34 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/34.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="35 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/35.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="36 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/36.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="37 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/37.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="38 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/38.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="39 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/39.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="40 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/40.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="41 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/41.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="42 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/42.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="43 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/43.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="44 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/44.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="45 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/45.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="46 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/46.jpeg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="47 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/47.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="48 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/48.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="49 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/49.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="50 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/50.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="51 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/51.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="52 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/52.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="53 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/53.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="54 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/54.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <!-- <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="55 of 90">
                                        <figure class="swiper-slide-inner">
                                            <img decoding="async" class="swiper-slide-image" src="<?= base_url('public') ?>/assets/images/Recruiter/55.png" alt="RECRUITER" />
                                        </figure>
                                    </div> -->
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="56 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/56.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="57 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/57.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="58 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/58.jpeg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="59 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/59.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="60 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/60.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="61 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/61.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="62 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/62.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="63 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/63.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="64 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/64.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="65 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/65.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="66 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/66.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="67 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/67.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="68 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/68.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="69 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/69.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="70 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/70.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="71 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/71.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="72 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/72.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="73 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/73.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="74 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/74.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="75 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/75.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="76 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/76.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <!-- <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="77 of 90">
                                        <figure class="swiper-slide-inner">
                                            <img decoding="async" class="swiper-slide-image" src="<?= base_url('public') ?>/assets/images/Recruiter/77.avif" alt="RECRUITER" />
                                        </figure>
                                    </div> -->
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="78 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/78.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <!-- <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="79 of 90">
                                        <figure class="swiper-slide-inner">
                                            <img decoding="async" class="swiper-slide-image" src="<?= base_url('public') ?>/assets/images/Recruiter/79.png" alt="RECRUITER" />
                                        </figure>
                                    </div> -->
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="80 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/80.jpg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="81 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/81.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="82 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/82.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="83 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/83.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="84 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/84.jpeg"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="85 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/85.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="86 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/86.webp"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="87 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/87.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="88 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/88.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="89 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/89.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                        <div class="swiper-slide" role="group" aria-roledescription="slide"
                                            aria-label="90 of 90">
                                            <figure class="swiper-slide-inner">
                                                <img decoding="async" class="swiper-slide-image"
                                                    src="<?= base_url('public') ?>/assets/images/Recruiter/90.png"
                                                    alt="RECRUITER" />
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
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

    </section>
    <!-- ========== CTA SECTION ========== -->
    <section id="contact" class="cta-training">
        <div class="container">
            <div class="text-center">
                <h2 class="display-4 fw-bold mb-4">Ready to Launch Your IT Career in <?= $city_name ?>?</h2>
                <p class="lead mb-5" style="max-width: 700px; margin: 0 auto;">
                    Take the first step towards a successful career in technology.
                    Join 21000+ successful students who transformed their careers with DigiCoders Technoloies.
                </p>

                <div class="cta-buttons">
                    <a href="tel:+919198483820" class="btn-light">
                        <i class="fas fa-phone me-2"></i> Call for Free Counselling
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=919198483820&text=Hello%20DigiCoders%20Technoloies%20<?= urlencode($city_name) ?>,%20I%20want%20to%20know%20more%20about%20IT%20training%20courses"
                        target="_blank" class="btn-outline-light">
                        <i class="fab fa-whatsapp me-2"></i> WhatsApp Now
                    </a>
                    <a href="<?= base_url('Home/Contact') ?>" class="btn-light">
                        <i class="fas fa-map-marker-alt me-2"></i> Visit Our <?= $city_name ?> Center
                    </a>
                </div>

                <div class="mt-5">
                    <p class="mb-2"><i class="fas fa-clock me-2"></i> <strong>Operating Hours:</strong> Mon-Sat: 10:00
                        AM
                        - 7:00 PM</p>
                    <p><i class="fas fa-map-pin me-2"></i> <strong>Location:</strong> DigiCoders Technologies Pvt. Ltd.
                        <?= $city_name ?>
                    </p>
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