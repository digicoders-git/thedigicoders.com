<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration for Training - Software Development Training Institute - DigiCoders Technologies Pvt. Ltd.
    </title>
    <meta name="description"
        content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form.">
    <meta property="og:title"
        content="Online Registration - Software Development Training Institute - DigiCoders Technologies Pvt. Ltd." />
    <meta property="og:description"
        content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form." />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function submitregform() {
            document.getElementById('submitbtn').disabled = false
        }
    </script>

    <?php include('include/headerlinks.php') ?>
    <style>
        :root {
            --brand-orange: #E76028;
            --brand-blue: #006DAB;
            --brand-green: #00964C;
            --dark-blue: #004a75;
            --text-main: #2d3436;
            --text-muted: #636e72;
            --glass-bg: rgba(255, 255, 255, 0.98);
            --glass-border: rgba(255, 255, 255, 0.3);
            --premium-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        body {
            background-color: #f8faff;
            font-family: 'Poppins', sans-serif !important;
        }

        .page-content {
            position: relative;
            min-height: 100vh;
            background-color: #f8faff;
            padding: 20px 0;
        }

        .registration-container {
            position: relative;
            z-index: 1;
            padding: 40px 0 20px 0;
        }

        .heading-bx {
            margin-bottom: 40px;
        }

        .heading-bx h1 {
            font-weight: 600;
            color: var(--brand-blue);
            font-size: 2.5rem;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .heading-bx p {
            color: var(--text-muted);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
            font-weight: 400;
        }

        .premium-card {
            background: #ffffff;
            border: 1px solid #eef2f6;
            border-radius: 0 !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            padding: 40px;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-main);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            letter-spacing: 0;
        }

        .form-label i {
            margin-right: 8px;
            color: var(--brand-blue);
            font-size: 0.8rem;
        }

        /* Base form control and select styles */
        .form-control,
        .form-select {
            height: 50px !important;
            border-radius: 8px !important;
            border: 1px solid #d1d9e6 !important;
            padding: 10px 15px !important;
            font-size: 0.95rem !important;
            color: var(--text-main) !important;
            background-color: #fff !important;
            transition: all 0.2s ease !important;
            appearance: none !important;
            box-shadow: none !important;
        }

        /* Fix for double dropdown/border issue */
        .bootstrap-select {
            width: 100% !important;
            border-radius: 0 !important;
            border: none !important;
            padding: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
        }

        .bootstrap-select>.btn {
            height: 50px !important;
            border-radius: 8px !important;
            border: 1px solid #d1d9e6 !important;
            padding: 10px 15px !important;
            font-size: 0.95rem !important;
            color: var(--text-main) !important;
            background-color: #fff !important;
            transition: all 0.2s ease !important;
            appearance: none !important;
            box-shadow: none !important;
            display: flex !important;
            align-items: center !important;
            outline: none !important;
        }

        .bootstrap-select .dropdown-toggle:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: var(--brand-blue) !important;
        }

        .bootstrap-select .dropdown-toggle:after {
            display: none !important;
        }

        /* Custom arrow for all selects including bootstrap-select */
        select.form-control,
        select.form-select,
        .bootstrap-select>.btn {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
            background-repeat: no-repeat !important;
            background-position: right 1rem center !important;
            background-size: 16px 12px !important;
            padding-right: 40px !important;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--brand-blue) !important;
            outline: none !important;
            box-shadow: none !important;
        }

        /* Enforce sharp corners and hide ALL potential default arrow/caret elements on Bootstrap Select */
        .bootstrap-select .dropdown-toggle:after,
        .bootstrap-select .dropdown-toggle:before,
        .bootstrap-select .caret,
        .bootstrap-select .bs-caret {
            display: none !important;
            border: none !important;
            content: none !important;
        }

        /* Bootstrap Select Dropdown Menu */
        .bootstrap-select .dropdown-menu {
            border-radius: 8px !important;
            border: 1px solid #d1d9e6 !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
            margin-top: 1px !important;
            padding: 0 !important;
            max-height: 400px !important;
        }

        .bootstrap-select .inner {
            max-height: 400px !important;
            overflow-y: auto !important;
        }

        .bootstrap-select .dropdown-menu li a {
            padding: 10px 20px !important;
            font-size: 0.9rem !important;
            transition: all 0.2s ease !important;
        }

        .bootstrap-select .dropdown-menu li a:hover {
            background-color: var(--brand-blue) !important;
            color: #fff !important;
        }

        .form-group {
            margin-bottom: 25px;
        }

        /* Custom Radio Buttons */
        .payment-options {
            display: flex;
            gap: 15px;
            margin-top: 5px;
        }

        .payment-option-card {
            flex: 1;
            position: relative;
        }

        .payment-option-card input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .payment-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            background: #fff;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            text-align: center;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: var(--text-muted);
            font-size: 0.85rem;
            position: relative;
            overflow: hidden;
            height: 44px;
            margin-bottom: 0;
        }

        .payment-option-card input:checked+.payment-label {
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.1), rgba(0, 109, 171, 0.05)) !important;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid var(--brand-blue);
            color: var(--brand-blue);
            box-shadow: 0 8px 25px rgba(0, 109, 171, 0.1);
            /* transform: translateY(-2px); */
        }

        .payment-option-card input:checked+.payment-label::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        /* Register Button */
        .btn-register {
            background: var(--brand-blue);
            color: white;
            border: none;
            border-radius: 0 !important;
            /* Sharp corners as requested */
            padding: 14px 40px;
            font-size: 0.95rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 260px;
        }

        .btn-register:hover:not(:disabled) {
            background: var(--dark-blue);
            box-shadow: 0 4px 12px rgba(0, 109, 171, 0.15);
        }

        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background: #aab8c2;
        }

        .amount-display {
            background: #f8faff;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            padding: 12px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 50px;
        }

        .amount-display span {
            color: var(--brand-green);
            font-weight: 800;
            font-size: 1.3rem;
        }

        /* College Search Dropdown Styling */
        .custom-clg-dropdown {
            position: relative;
        }

        #college-list {
            position: absolute;
            top: 55px;
            left: 0;
            right: 0;
            max-height: 250px;
            overflow-y: auto;
            background: #fff;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            z-index: 1060;
            display: none;
        }

        .dropdown-item-clg {
            padding: 10px 15px;
            transition: all 0.2s ease;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f4f8;
        }

        .dropdown-item-clg:hover {
            background: var(--brand-blue);
            color: #fff;
        }

        /* Captcha Styling */
        .g-recaptcha {
            transform: scale(1);
            transform-origin: center center;
            display: inline-block;
        }

        .text-danger,
        .error,
        label.error {
            font-weight: normal !important;
        }

        .bottom-actions {
            text-align: center;
            width: 100%;
            display: block !important;
            margin-top: 30px;
        }

        .action-item {
            display: inline-block !important;
            vertical-align: middle;
            margin: 15px 30px !important;
            /* Forced Large Horizontal Gap */
        }

        .sticky-sidebar {
            position: sticky;
            top: 100px;
        }

        .info-card {
            background: #ffffff;
            border: 1px solid #eef2f6;
            border-radius: 0 !important;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            margin-bottom: 25px;
        }

        .info-card h4 {
            font-weight: 700;
            color: var(--brand-blue);
            font-size: 1.25rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f4f8;
        }

        .contact-info-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .contact-info-list li {
            display: flex;
            margin-bottom: 20px;
            align-items: flex-start;
        }

        .contact-info-list i {
            color: var(--brand-orange);
            font-size: 1.1rem;
            margin-right: 15px;
            margin-top: 4px;
            width: 20px;
            text-align: center;
        }

        .contact-info-list span {
            color: var(--text-main);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .benefit-tag {
            display: flex;
            align-items: center;
            background: #f8faff;
            padding: 10px 15px;
            border-radius: 0 !important;
            margin-bottom: 12px;
            border: 1px solid #eef2f6;
            /* Added subtle full border for clean definition */
        }

        .benefit-tag i {
            color: var(--brand-green);
            margin-right: 10px;
        }

        .benefit-tag span {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--brand-blue);
        }

        /* Glassmorphism Social Icons */
        .glass-social-container {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .glass-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            color: #fff;
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none !important;
            position: relative;
            overflow: hidden;
            background: var(--brand-blue);
            box-shadow: 0 8px 15px rgba(0, 109, 171, 0.15);
        }

        .glass-icon:hover {
            transform: translateY(-5px) scale(1.1);
            color: #fff;
            box-shadow: 0 12px 20px rgba(0, 109, 171, 0.25);
        }

        .glass-icon.fb {
            background: #1877F2;
        }

        .glass-icon.tw {
            background: #1DA1F2;
        }

        .glass-icon.in {
            background: #E4405F;
        }

        .glass-icon.wa {
            background: #25D366;
        }

        .glass-icon::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .glass-icon:hover::after {
            left: 100%;
        }

        @media (max-width: 991.98px) {
            .heading-bx h1 {
                font-size: 2.5rem;
            }

            .premium-card {
                padding: 30px;
            }
        }

        @media (max-width: 767.98px) {
            .registration-container {
                padding: 40px 0;
            }

            .heading-bx h1 {
                font-size: 2rem;
            }

            .btn-register {
                width: 100%;
                max-width: none;
            }

            .g-recaptcha {
                transform: scale(0.85);
                transform-origin: center;
                display: flex;
                justify-content: center;
                margin-left: -50px;
            }
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content">
        <div class="registration-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="heading-bx text-center">
                            <h1 class="title-head">Register for Training</h1>
                            <p>Join India's most innovative IT training institute and kickstart your professional career
                                with expert mentorship.</p>
                        </div>

                        <div class="premium-card">
                            <form id="reg" class="registration-form">
                                <?php
                                $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                                );
                                ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                                <div class="row">
                                    <!-- Training Location -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-map-marker-alt"></i> Training
                                                Location / Mode <span class="text-danger">*</span></label>
                                            <select class="form-select w-100" name="student_training_location"
                                                id="student_training_location" required>
                                                <option value="">- Choose Location -</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Student Name & Mobile -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-phone-alt"></i> Mobile Number
                                                <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="Mobile1" maxlength="10"
                                                minlength="10" placeholder="10-digit mobile number" required
                                                onkeyup="search_func(this.value)"
                                                oninput="if (this.value.length > 10) this.value = this.value.slice(0, 10);" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-user"></i> Full Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="Name"
                                                placeholder="Enter student's full name" required id="name" />
                                        </div>
                                    </div>

                                    <!-- Training & Technology -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-graduation-cap"></i> Select
                                                Training <span class="text-danger">*</span></label>
                                            <select class="form-select w-100" name="ApplicationFor" id="trainingtype"
                                                required onchange="loadTechnology();">
                                                <option value="">- Choose Training -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-code"></i> Technology <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select w-100" name="Technology" id="technology" required
                                                onchange="setFee()">
                                                <option value="" selected disabled>- Choose Technology -</option>
                                                <option value="" disabled>First Choose Your Training</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Education & Year -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-book"></i> Highest Education
                                                <span class="text-danger">*</span></label>
                                            <select class="form-select w-100" name="Course" required id="education">
                                                <option value="">- Select Education -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-calendar-alt"></i> Current Year
                                                <span class="text-danger">*</span></label>
                                            <select class="form-select w-100" name="Year" required id="year">
                                                <option value="">- Select Year -</option>
                                                <option value="First Year (1st)">First Year (1st)</option>
                                                <option value="Second Year (2nd)">Second Year (2nd)</option>
                                                <option value="Third Year (3rd)">Third Year (3rd)</option>
                                                <option value="Final Year (4th)">Final Year (4th)</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Father Name & Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-users"></i> Father's Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="FatherName" id="fname"
                                                placeholder="Father's full name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-envelope"></i> Email
                                                (Optional)</label>
                                            <input class="form-control" type="email" name="Email" id="email2"
                                                placeholder="Example: info@digicoders.com" />
                                        </div>
                                    </div>

                                    <!-- Alt Mobile & College -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-phone"></i> Alternate Mobile
                                                (Optional)</label>
                                            <input class="form-control" type="number" name="AltMobile" id="mob2"
                                                maxlength="10" minlength="10" placeholder="Alternate contact number"
                                                oninput="if (this.value.length > 10) this.value = this.value.slice(0, 10);" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-university"></i> College Name
                                                <span class="text-danger">*</span></label>
                                            <div class="custom-clg-dropdown">
                                                <input type="text" id="college-search" class="form-control"
                                                    placeholder="Search your college name..." autocomplete="off"
                                                    required>
                                                <input type="hidden" name="College" id="college-hidden" required>
                                                <div id="college-list"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Payment & Amount -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-wallet"></i> Payment Type</label>
                                            <div class="payment-options">
                                                <div class="payment-option-card">
                                                    <input type="radio" onchange="setFee()" name="Fee" id="fee_reg"
                                                        value="registration" checked>
                                                    <label class="payment-label" for="fee_reg">Registration Fee</label>
                                                </div>
                                                <div class="payment-option-card">
                                                    <input type="radio" onchange="setFee()" name="Fee" id="fee_full"
                                                        value="full">
                                                    <label class="payment-label" for="fee_full">Full Fee</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"><i class="fas fa-rupee-sign"></i> Amount To Pay
                                                Now</label>
                                            <div class="amount-display">
                                                <small class="text-muted">Total Payable Amount</small>
                                                <span>₹<i id="disp_amount"></i></span>
                                                <input type="hidden" id="amount" name="Amount" required />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Security & Submit -->
                                    <div class="col-md-12 mt-4">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 text-md-left text-center">
                                                <div class="g-recaptcha"
                                                    data-sitekey="6LfHIQcrAAAAALPXPP-R1SamLeZxPHGPA_xfMNOh"
                                                    data-callback="submitregform"></div>
                                            </div>
                                            <div class="col-md-6 text-md-right text-center mt-3 mt-md-0">
                                                <button name="submit" type="submit" value="Submit" id="submitbtn"
                                                    class="btn btn-register" disabled>
                                                    Register Now <i class="fas fa-arrow-right ms-2"
                                                        style="font-size: 0.9rem;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Sidebar Section -->
                    <div class="col-lg-4">
                        <div class="sticky-sidebar">
                            <div class="info-card">
                                <!-- Contact Information -->
                                <h4>Contact Information</h4>
                                <ul class="contact-info-list">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow,
                                            UP 226021</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone-alt"></i>
                                        <span>+91 9198483820<br>+91 8081329320</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>info@thedigicoders.com</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <span>Mon - Sat: 10:00 AM - 07:00 PM</span>
                                    </li>
                                </ul>

                                <hr class="my-4" style="opacity: 0.1;">

                                <!-- Why Choose Us / SEO Benefits -->
                                <h4 class="mt-4">Why Digicoders?</h4>
                                <div class="benefit-tag">
                                    <i class="fas fa-check-circle"></i>
                                    <span>100% Practical Industrial Training</span>
                                </div>
                                <div class="benefit-tag">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Placement Assistance in MNCs</span>
                                </div>
                                <div class="benefit-tag">
                                    <i class="fas fa-certificate"></i>
                                    <span>IBM & ISO Certified Institute</span>
                                </div>
                                <div class="benefit-tag">
                                    <i class="fas fa-users"></i>
                                    <span>Expert Mentors (10+ Years Exp)</span>
                                </div>
                                <div class="benefit-tag">
                                    <i class="fas fa-project-diagram"></i>
                                    <span>Real-time Live Project Work</span>
                                </div>
                                <div class="benefit-tag">
                                    <i class="fas fa-headset"></i>
                                    <span>Lifetime Technical Support</span>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        let host = window.location.origin;
        let path = window.location.pathname;
        let rootPath = path.includes('/thedigicoders-com') ? '/thedigicoders-com' : '';
        let isIndexPhp = path.includes('index.php');
        const API_BASE = host + rootPath + (isIndexPhp ? '/index.php/Home/api_proxy?endpoint=' : '/Home/api_proxy?endpoint=');
        let allTrainings = [];
        let allTechnologies = [];

        document.addEventListener("DOMContentLoaded", function () {
            // console.log("USING API_BASE:", API_BASE);
            fetchTrainings();
            fetchEducation();
            fetchColleges();
            fetchBranches();
        });

        function refreshSelect(dropdown) {
            if (window.jQuery && $(dropdown).length) {
                try {
                    $(dropdown).selectpicker();
                    $(dropdown).selectpicker('refresh');
                } catch (e) { }
                // console.log("Refreshed select:", dropdown.id);
            }
        }

        function fetchTrainings() {
            // console.log("Fetching trainings from:", API_BASE + '/training/getAll');
            fetch(API_BASE + '/training/getAll')
                .then(res => res.json())
                .then(res => {
                    if (res.success && res.data) {
                        allTrainings = res.data;
                        let dropdown = document.getElementById('trainingtype');
                        if (dropdown) {
                            let html = '<option value="">-Choose Training-</option>';
                            res.data.forEach(t => {
                                let val = t._id || t.id;
                                let txt = t.category_name || t.name || t.training_name;
                                html += `<option value="${val}">${txt}</option>`;
                            });
                            dropdown.innerHTML = html;
                            refreshSelect(dropdown);
                            // console.log("Trainings loaded successfully.");
                        }
                    }
                })
                // .catch(e => console.error("Error fetching trainings:", e));
        }

        function fetchEducation() {
            // console.log("Fetching education from:", API_BASE + '/education');
            fetch(API_BASE + '/education')
                .then(res => res.json())
                .then(res => {
                    if (res.success && res.data) {
                        let dropdown = document.getElementById('education');
                        if (dropdown) {
                            let html = '<option value="">-Select Your Education-</option>';
                            res.data.forEach(e => {
                                let name = e.education_name || e.name || e.education;
                                let val = e._id || e.id;
                                html += `<option value="${val}">${name}</option>`;
                            });
                            dropdown.innerHTML = html;
                            refreshSelect(dropdown);
                            // console.log("Education loaded successfully.");
                        }
                    }
                })
                // .catch(e => console.error("Error fetching education:", e));
        }

        let allCollegesGlobal = [];

        function selectCollege(name, id) {
            const searchInput = document.getElementById('college-search');
            const hiddenInput = document.getElementById('college-hidden');
            const listDiv = document.getElementById('college-list');
            if (searchInput) searchInput.value = name;
            if (hiddenInput) hiddenInput.value = id || name;
            if (listDiv) listDiv.style.display = "none";
        }

        function renderColleges(filter = "") {
            const listDiv = document.getElementById('college-list');
            if (!listDiv) return;

            let html = "";
            let count = 0;
            allCollegesGlobal.forEach(c => {
                let cname = typeof c === 'string' ? c : (c.collegeName || c.college_name || c.name || "");
                let cid = typeof c === 'string' ? c : (c._id || c.id || cname);
                if (cname && cname.toLowerCase().includes(filter.toLowerCase()) && count < 50) {
                    html += `<div class="p-2 border-bottom dropdown-item-clg" style="cursor:pointer;" onclick="selectCollege('${cname.replace(/'/g, "\\'")}', '${cid}')">${cname}</div>`;
                    count++;
                }
            });
            listDiv.innerHTML = html || "<div class='p-2'>No matches found</div>";
        }

        function fetchColleges() {
            fetch(API_BASE + '/college/names')
                .then(res => res.json())
                .then(res => {
                    allCollegesGlobal = res.colleges || res.data || (Array.isArray(res) ? res : []);
                    // console.log("College Data Loaded:", allCollegesGlobal.length);

                    const searchInput = document.getElementById('college-search');
                    const listDiv = document.getElementById('college-list');

                    if (searchInput) {
                        searchInput.addEventListener('focus', () => {
                            listDiv.style.display = "block";
                            renderColleges(searchInput.value);
                        });
                        searchInput.addEventListener('input', (e) => {
                            listDiv.style.display = "block";
                            renderColleges(e.target.value);
                        });
                    }

                    document.addEventListener('click', (e) => {
                        if (!e.target.closest('.custom-clg-dropdown')) {
                            listDiv.style.display = "none";
                        }
                    });
                })
                // .catch(e => console.error("Error fetching colleges:", e));
        }

        function fetchBranches() {
            // console.log("Fetching branches from:", API_BASE + '/branches');
            fetch(API_BASE + '/branches')
                .then(res => res.json())
                .then(res => {
                    if (res.success && res.data) {
                        let dropdown = document.getElementById('student_training_location');
                        if (dropdown) {
                            let html = '<option value="">-Choose Training Location/Mode-</option>';
                            res.data.forEach(b => {
                                let bname = b.branche || b.branch_name || b.name || b.branch;
                                let val = b._id || b.id;
                                html += `<option value="${val}">${bname}</option>`;
                            });
                            dropdown.innerHTML = html;
                            refreshSelect(dropdown);
                            // console.log("Branches loaded successfully.");
                        }
                    }
                })
                // .catch(e => console.error("Error fetching branches:", e));
        }

        function loadTechnology() {
            let trainingId = document.getElementById('trainingtype').value;
            if (!trainingId) return;

            // console.log("Fetching technologies for training:", trainingId);
            fetch(API_BASE + '/technology/getByTrainingDuration/' + trainingId)
                .then(res => res.json())
                .then(res => {
                    let dropdown = document.getElementById('technology');
                    // if(!dropdown) return;

                    if (res.success && res.data) {
                        allTechnologies = res.data;
                        let html = '<option value="" selected disabled>-Choose Technology-</option>';
                        res.data.forEach(tech => {
                            let val = tech._id || tech.id;
                            let txt = tech.technology_name || tech.name;
                            html += `<option value="${val}">${txt}</option>`;
                        });
                        dropdown.innerHTML = html;
                    } else {
                        allTechnologies = [];
                        dropdown.innerHTML = '<option value="" selected disabled>-Choose Technology-</option>';
                    }
                    refreshSelect(dropdown);
                    // console.log("Technologies loaded.");
                    setFee();
                })
                // .catch(e => console.error("Error fetching tech:", e));
        }

        function setFee() {
            let trainingId = $('#trainingtype').val();
            let technologyId = $('#technology').val();
            let feetype = $('input[name="Fee"]:checked').val();
            let amount = 1000;

            if (feetype === 'registration') {
                let selectedTraining = allTrainings.find(t => t._id === trainingId || t.id === trainingId);
                if (selectedTraining) {
                    amount = selectedTraining.registrationAmount || selectedTraining.registration_fee;
                }
            } else if (feetype === 'full') {
                let selectedTech = allTechnologies.find(t => t._id === technologyId || t.id === technologyId);
                if (selectedTech) {
                    amount = selectedTech.price || selectedTech.full_fee || 5000;
                } else {
                    // Fallback to training full fee if tech not selected or found
                    let selectedTraining = allTrainings.find(t => t._id === trainingId || t.id === trainingId);
                    if (selectedTraining) {
                        amount = selectedTraining.full_fee;
                    }
                }
            }

            // console.log("Setting fee for Training:", trainingId, "Tech:", technologyId, "Type:", feetype, "Found amount:", amount);
            $("#amount").val(amount);
            $("#disp_amount").text(amount);
        }

        $('#reg').submit(function (e) {
            e.preventDefault();
            $('#submitbtn').prop('disabled', true);
            if (typeof showPremiumLoader === 'function') {
                showPremiumLoader('Processing Registration...');
            } else {
                $('#submitbtn').html('<i class="fa fa-spinner fa-spin"></i> Processing...');
            }

            let formData = {
                branch: $('#student_training_location').val(),
                mobile: $('input[name="Mobile1"]').val(),
                whatshapp: $('input[name="Mobile1"]').val(),
                studentName: $('#name').val(),
                trainingType: $('#trainingtype option:selected').text(),
                training: $('#trainingtype').val(),
                technologyId: $('#technology option:selected').text(),
                technology: $('#technology').val(),
                education: $('#education').val(),
                eduYear: $('#year').val(),
                fatherName: $('#fname').val(),
                email: $('#email2').val(),
                alternateMobile: $('#mob2').val(),
                collegeName: $('#college-hidden').val(),
                // collegeName: $('#college-search').val(),
                paymentType: $('input[name="Fee"]:checked').val(),
                amount: $('#amount').val(),
                paymentMethod: 'online'
            };

            $.ajax({
                url: API_BASE + '/registration/web/register',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function (res) {
                    if (res.success) {
                        if (formData.paymentMethod === 'online' && res.razorpayOrder) {
                            const { razorpayOrder, razorpayKey, populatedRegistration } = res;
                            var options = {
                                "key": razorpayKey,
                                "amount": razorpayOrder.amount,
                                "currency": "INR",
                                "name": "DigiCoders Technologies Pvt. Ltd.",
                                "description": "Training Registration",
                                "order_id": razorpayOrder.id,
                                "handler": function (response) {
                                    verifyPayment(response.razorpay_payment_id, response.razorpay_order_id, response.razorpay_signature, populatedRegistration._id, formData.amount);
                                },
                                "prefill": {
                                    "name": formData.studentName,
                                    "email": formData.email,
                                    "contact": formData.mobile
                                },
                                "theme": {
                                    "color": "#250a99"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.on('payment.failed', function (response) {
                                recordFailure(response.error, populatedRegistration._id);
                                if (typeof hidePremiumLoader === 'function') hidePremiumLoader();
                                $('#submitbtn').prop('disabled', false).text('Register Now');
                                alert("Payment Failed: " + response.error.description);
                            });
                            rzp1.open();
                        } else {
                            // If payment skip or other logic
                            if (typeof hidePremiumLoader === 'function') hidePremiumLoader();
                            iziToast.success({ title: 'Success', message: 'Registration successful!' });
                            const feeId = res.feeId;
                            if (feeId) {
                                setTimeout(() => {
                                    window.location.href = `https://erp.thedigicoders.com/receipt/${feeId}`;
                                }, 2000);
                            }
                        }
                    } else {
                        if (typeof hidePremiumLoader === 'function') hidePremiumLoader();
                        alert(res.message || "Registration failed. Please try again.");
                        $('#submitbtn').prop('disabled', false).text('Register Now');
                    }
                },
                error: function (err) {
                    if (typeof hidePremiumLoader === 'function') hidePremiumLoader();
                    alert("Error during registration.");
                    $('#submitbtn').prop('disabled', false).text('Register Now');
                }
            });
        });

        function verifyPayment(payment_id, order_id, signature, registrationId, amount) {
            if (typeof showPremiumLoader === 'function') {
                showPremiumLoader('Verifying Payment...');
            } else {
                $('#submitbtn').html('<i class="fa fa-spinner fa-spin"></i> Verifying Payment...');
            }
            $.ajax({
                url: API_BASE + '/razorpay/verify-web',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    razorpay_payment_id: payment_id,
                    razorpay_order_id: order_id,
                    razorpay_signature: signature,
                    registrationId: registrationId,
                    amount: amount
                }),
                success: function (res) {
                    if (res.success) {
                        const feeId = res.feeId;
                        if (feeId) {
                            window.location.href = `https://erp.thedigicoders.com/receipt/${feeId}`;
                        } else {
                            if (typeof hidePremiumLoader === 'function') hidePremiumLoader();
                            iziToast.success({ title: 'Success', message: 'Payment successful & Registration confirmed!' });
                        }
                    } else {
                        if (typeof hidePremiumLoader === 'function') hidePremiumLoader();
                        alert("Payment verification failed! Please contact support.");
                        $('#submitbtn').prop('disabled', false).text('Register Now');
                    }
                },
                error: function (err) {
                    if (typeof hidePremiumLoader === 'function') hidePremiumLoader();
                    alert("Payment verification error! Please contact support.");
                    $('#submitbtn').prop('disabled', false).text('Register Now');
                }
            });
        }

        function recordFailure(error, registrationId) {
            $.ajax({
                url: API_BASE + '/razorpay/record-failure',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    registrationId: registrationId,
                    error: error
                })
            });
        }

        function submitregform() {
            document.getElementById('submitbtn').disabled = false;
        }

        function search_func(value) {
            // Disabled for API flow unless an endpoint is added to fetch student data via mobile
        }
    </script>

    <?php
    if (!empty($this->session->flashdata('status'))) {
        if ($this->session->flashdata('msg') == 'Payment Success') {
            ?>
    <script>
        iziToast.success({
            title: 'Success',
            message: 'Payment Successful!',
            position: 'topRight'
        });
    </script>
    <?php
        }
        if ($this->session->flashdata('msg') == 'Something Went Wrong') {
            ?>
    <script>
        iziToast.error({
            title: 'Error',
            message: 'Something Went Wrong. Please try again.',
            position: 'topRight'
        });
    </script>
    <?php
        }
        if ($this->session->flashdata('msg') == 'Validation Error') {
            ?>
    <script>
        iziToast.error({
            title: 'Error',
            message: 'Please fill all required fields correctly.',
            position: 'topRight'
        });
    </script>
    <?php
        }
    }
    ?>
</body>

</html>