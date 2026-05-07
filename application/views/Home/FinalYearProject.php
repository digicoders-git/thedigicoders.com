<!DOCTYPE html>
<html lang="en">

<head>
    <title>Final Year Live Project Training - Java, Python, Android in Lucknow</title>
    <meta name="description"
        content="Are you facing any problems in developing and submitting the final year project? Contact us today for project training in Lucknow, India, UP.">

    <meta property="og:title" content="Final Year Live Project Training - Java, Python, Android in Lucknow" />
    <meta property="og:description"
        content="Are you facing any problems in developing and submitting the final year project? Contact us today for project training in Lucknow, India, UP." />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

    <?php include('include/headerlinks.php') ?>

</head>

<body>
    <?php include('include/header.php') ?>
    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --green: #00964C;
            --blue-light: #f0f7ff;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        body {
            background-color: #fcfdfe;
            font-family: 'Inter', sans-serif !important;
        }

        /* Banner Styling */
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%);
            z-index: 1;
        }

        .page-banner h1 {
            font-size: 3rem;
            font-weight: 700;
            position: relative;
            z-index: 2;
            letter-spacing: -1px;
        }

        /* Sidebar Styles */
        .sticky-sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-card {
            background: #fff;
            border: 1px solid #eee;
            box-shadow: var(--shadow-sm);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .sidebar-title-bx {
            padding: 15px;
            background: var(--blue-light);
            border-bottom: 1px solid #eee;
        }

        .sidebar-swiper-container {
            width: 100%;
            height: 250px;
            overflow: hidden;
            padding: 10px 15px;
            background: #f8fbff;
        }

        .sidebar-swiper-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .btn-premium {
            display: block;
            width: 100%;
            padding: 12px;
            background: var(--blue);
            color: #fff !important;
            text-align: center;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            background: var(--orange);
            transform: translateY(-2px);
        }

        .btn-enquiry {
            background: var(--orange);
        }

        /* Form Styling */
        .premium-form-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            box-shadow: var(--shadow-md);
            padding: 40px;
            border-radius: 0;
            margin-bottom: 40px;
        }

        .form-group label {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control,
        select {
            border: 1px solid #e2e8f0;
            border-radius: 0;
            padding: 12px 15px;
            height: auto;
            font-size: 15px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus,
        select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(0, 109, 171, 0.1);
            outline: none;
        }

        /* Custom Dropdown Arrow Fix: Force-hide all default icons */
        select.form-control,
        .bootstrap-select .dropdown-toggle {
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2364748b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 15px center !important;
            background-size: 12px !important;
            padding-right: 40px !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 0 !important;
        }

        /* Aggressively hide all possible default carets from bootstrap-select and browsers */
        .bootstrap-select .dropdown-toggle:after,
        .bootstrap-select .dropdown-toggle:before,
        .bootstrap-select .bs-caret,
        .bootstrap-select .caret {
            display: none !important;
            opacity: 0 !important;
            visibility: hidden !important;
            width: 0 !important;
            height: 0 !important;
        }

        .bootstrap-select {
            width: 100% !important;
        }

        .bootstrap-select .dropdown-toggle .filter-option {
            font-size: 15px;
            color: #1e293b;
        }

        .btn-submit-premium {
            background: var(--orange);
            color: #fff;
            border: none;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(231, 96, 40, 0.2);
            border-radius: 4px;
        }

        .btn-submit-premium:hover {
            background: var(--blue);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 109, 171, 0.3);
        }

        .form-check-label {
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            font-size: 14px;
        }

        .course-features {
            list-style: none;
            padding: 0;
        }

        .course-features li {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .page-banner h1 {
                font-size: 2.2rem;
            }

            .premium-form-card {
                padding: 25px;
            }
        }
    </style>
    <!-- } -->
    <div class="page-content bg-white">
        <!-- Premium Hero Banner -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white">Final Year Project</h1>
                    <p class="text-white mt-3 lead" style="opacity: 0.9;">Innovation-Driven Project Training for Young
                        Engineers</p>
                </div>
            </div>
        </div>

        <div class="content-block">
            <div class="section-area section-sp1" style="padding-top: 50px; background-image: radial-gradient(#e2e8f0 0.5px, transparent 0.5px); background-size: 20px 20px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Project Form -->
                        <div class="col-lg-8 col-md-10">
                            <div class="premium-form-card">
                                <form id="reg" class="form-horizontal" action="<?= base_url() ?>/Home/PayNow/PayV2"
                                    method="post">
                                    <?php
                                    $csrf = array(
                                        'name' => $this->security->get_csrf_token_name(),
                                        'hash' => $this->security->get_csrf_hash()
                                    );
                                    ?>
                                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Student Name</label>
                                            <input class="form-control" type="text" name="Name"
                                                placeholder="Enter Student Name" required />
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Email ID (Optional)</label>
                                            <input class="form-control" type="email" name="Email"
                                                placeholder="Enter Student Email ID" />
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Mobile Number</label>
                                            <input class="form-control" type="number" name="Mobile" maxlength="10"
                                                minlength="10" placeholder="Enter Mobile Number" required />
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Alternate Mobile</label>
                                            <input class="form-control" type="number" name="Mobile1" maxlength="10"
                                                minlength="10" placeholder="Alternate Mobile" />
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>College Name</label>
                                            <input class="form-control" type="text" name="College"
                                                placeholder="Enter College Name" required />
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Project Topic</label>
                                            <span class="ml-2 small"><a
                                                    href="<?= base_url('public') ?>/Syllabus/Training Projects.pdf"
                                                    target="_blank" class="text-primary"><i
                                                        class="fa fa-file-pdf-o"></i> Suggestions</a></span>
                                            <input class="form-control" type="text" name="ProjectTopic"
                                                placeholder="Enter Project Topic" />
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Technology</label>
                                            <select name="Technology" required class="form-control">
                                                <option value="">Select Technology</option>
                                                <option value="PHP">PHP</option>
                                                <option value="Android">Android</option>
                                                <option value="ASP.NET">ASP.NET</option>
                                                <option value="JAVA">JAVA</option>
                                                <option value="Python">Python</option>
                                                <option value="Digital Marketing">Digital Marketing</option>
                                                <option value="Not Yet Decided">Not Yet Decided</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Education</label>
                                            <select class="form-control" name="Branch" required>
                                                <option value="">Select Education</option>
                                                <option value="B.Tech (CS)">B.Tech (CS)</option>
                                                <option value="B.Tech (IT)">B.Tech (IT)</option>
                                                <option value="B.Tech (Electronics)">B.Tech (Electronics)</option>
                                                <option value="B.Tech  (EC)">B.Tech (EC)</option>
                                                <option value="Diploma (CS)">Diploma (CS)</option>
                                                <option value="Diploma (IT)">Diploma (IT)</option>
                                                <option value="Diploma (Electronics)">Diploma (Electronics)</option>
                                                <option value="Diploma PGDCA">Diploma PGDCA</option>
                                                <option value="Diploma (PG Web Designing)">Diploma (PG Web Designing)
                                                </option>
                                                <option value="BCA">BCA</option>
                                                <option value="MCA">MCA</option>
                                                <option value="M.Tech (CS)">M.Tech (CS)</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Project Options</label>
                                            <div class="mt-0">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio" name="ProjectType"
                                                        id="exampleRadios1" onclick="getFee()" value="Certificate"
                                                        checked>
                                                    <label class="form-check-label"
                                                        for="exampleRadios1">Certificate</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio" name="ProjectType"
                                                        id="exampleRadios2" onclick="getFee()" value="Project Report">
                                                    <label class="form-check-label" for="exampleRadios2">Project
                                                        Report</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ProjectType"
                                                        id="exampleRadios3" onclick="getFee()"
                                                        value="Both (Certificate and Project Report)">
                                                    <label class="form-check-label" for="exampleRadios3">Both
                                                        (Certificate and Report)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Select Year</label>
                                            <select class="form-control" name="Year" required>
                                                <option value="">Select Year</option>
                                                <option value="First Year (1st)">First Year (1st)</option>
                                                <option value="Second Year (2nd)">Second Year (2nd)</option>
                                                <option value="Third Year (3rd)">Third Year (3rd)</option>
                                                <option value="Final Year (4th)">Final Year (4th)</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Payment Type</label>
                                            <div class="mt-0">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio" name="PaymentType"
                                                        onclick="getFee()" id="exampleRadios01" value="Full Fee"
                                                        checked>
                                                    <label class="form-check-label" for="exampleRadios01">Full
                                                        Fee</label>
                                                </div>
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio" name="PaymentType"
                                                        onclick="getFee()" id="exampleRadios02" value="Half Fee">
                                                    <label class="form-check-label" for="exampleRadios02">Half
                                                        Fee</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="PaymentType"
                                                        onclick="getFee()" id="exampleRadios03"
                                                        value="I will pay later">
                                                    <label class="form-check-label" for="exampleRadios03">Pay
                                                        Later</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                                            <label>Amount To Pay (₹)</label>
                                            <input class="form-control" type="number" readonly value="1500" id="amount"
                                                name="Amount" required
                                                style="border-bottom: 2px solid var(--blue); background-color: #f8fafc;" />
                                        </div>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button name="submit" type="submit" value="Submit"
                                            class="btn-submit-premium">Submit Project Details</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <script>
        

        function getFee() {
            var feetype = $('input[name="ProjectType"]:checked').val();
            var Paymenttype = $('input[name="PaymentType"]:checked').val();
            if (feetype == 'Certificate' && Paymenttype == 'Full Fee') {
                $("#amount").val(1500);
            }
            else if (feetype == 'Certificate' && Paymenttype == 'Half Fee') {
                $("#amount").val(750);
            }
            else if (feetype == 'Certificate' && Paymenttype == 'I will pay later') {
                $("#amount").val(0);
            }
            else if (feetype == 'Project Report' && Paymenttype == 'Full Fee') {
                $("#amount").val(1000);
            }
            else if (feetype == 'Project Report' && Paymenttype == 'Half Fee') {
                $("#amount").val(500);
            }
            else if (feetype == 'Project Report' && Paymenttype == 'I will pay later') {
                $("#amount").val(0);
            }
            else if (feetype == 'Both (Certificate and Project Report)' && Paymenttype == 'Full Fee') {
                $("#amount").val(2500);
            }
            else if (feetype == 'Both (Certificate and Project Report)' && Paymenttype == 'Half Fee') {
                $("#amount").val(1250);
            }
            else if (feetype == 'Both (Certificate and Project Report)' && Paymenttype == 'I will pay later') {
                $("#amount").val(0);
            }
            else {
                $("#amount").val(1500);
            }
        }
        getFee();
    </script>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>

<?php
if (!empty($this->session->flashdata('status'))) {
    if ($this->session->flashdata('msg') == 'Payment Success') {
        ?>
        <script>
            iziToast.success({
                title: 'success',
                message: 'Payment Success',
                position: 'topRight'
            });
        </script>
        <?php
    }
    if ($this->session->flashdata('msg') == 'Something Went Wrong') {
        ?>
        <script>
            iziToast.success({
                title: 'error',
                message: 'Something Went Wrong',
                position: 'topRight'
            });
        </script>
        <?php
    }
    if ($this->session->flashdata('msg') == 'Validation Error') {
        ?>
        <script>
            iziToast.error({
                title: 'error',
                message: 'Validation Error',
                position: 'topRight'
            });
        </script>
        <?php
    }
}
?>