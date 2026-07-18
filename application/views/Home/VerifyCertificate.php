<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify Certificate | Best IT Training - DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description"
        content="Verify your training certificate at DigiCoders Technologies Pvt. Ltd. Enter your mobile number or reference number to validate your credentials for software development courses in Lucknow.">

    <meta property="og:title" content="Verify Certificate | Best IT Training - DigiCoders Technologies Pvt. Ltd." />
    <meta property="og:description"
        content="Verify your training certificate at DigiCoders Technologies Pvt. Ltd. Enter your mobile number or reference number to validate your credentials for software development courses in Lucknow." />

    <?php include('include/headerlinks.php') ?>
    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --green: #28a745;
        }

        .page-banner {
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

        .page-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.92) 0%, rgba(231, 96, 40, 0.85) 100%);
            z-index: 1;
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
            padding: 0 15px;
        }

        .page-banner h1 {
            font-size: 3.8rem;
            font-weight: 700;
            color: #fff !important;
            margin: 0;
            letter-spacing: -1.5px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            line-height: 1.1;
        }

        .page-banner p {
            color: #fff !important;
            font-size: 1.4rem;
            font-weight: 500;
            margin-top: 15px;
            letter-spacing: 0.5px;
            opacity: 0.95;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .verify-card {
            background: #ffffff !important;
            padding: 35px 50px;
            border-radius: 0px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.06);
            position: relative;
            z-index: 5;
            border: 1px solid #eee !important;
            max-width: 550px;
            margin: auto;
        }

        .page-content {
            background-color: #f7f9fc;
            background-image:
                radial-gradient(at 0% 0%, rgba(0, 109, 171, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(231, 96, 40, 0.04) 0px, transparent 50%);
            min-height: 80vh;
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .company-logo-verify {
            width: 170px;
            margin-bottom: 20px;
            opacity: 1;
        }

        .section-title-premium {
            font-size: 1.6rem;
            font-weight: 600;
            color: #006DAB;
            margin-bottom: 5px;
            letter-spacing: -0.5px;
        }

        .section-subtitle-premium {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .verification-label {
            font-weight: 600;
            color: #006DAB;
            margin-bottom: 10px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .premium-input {
            border: 2px solid #eee !important;
            height: 48px !important;
            border-radius: 0px !important;
            font-size: 0.95rem !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
            background: #fafafa !important;
        }

        .premium-input:focus {
            border-color: #006DAB !important;
            background: #fff !important;
            box-shadow: none !important;
        }

        .input-group {
            position: relative !important;
            margin-bottom: 32px !important;
            display: flex !important;
            flex-wrap: nowrap !important;
        }

        label.error {
            color: red !important;
            font-size: 0.75rem !important;
            font-weight: 500 !important;
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            margin-top: 5px !important;
            width: 100% !important;
            z-index: 1 !important;
            letter-spacing: 0.5px;
        }

        .btn-verify {
            background: #006DAB !important;
            color: #fff !important;
            border: none !important;
            padding: 0 30px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            border-radius: 0px !important;
            transition: all 0.3s ease !important;
            font-size: 0.8rem !important;
        }

        .btn-verify:hover {
            background: #E76028 !important;
            color: #fff !important;
        }

        .divider-badge {
            background: #fff !important;
            border: 1px solid #ddd !important;
            color: #999 !important;
            font-weight: 700 !important;
            padding: 6px 15px !important;
            border-radius: 0px !important;
            font-size: 0.7rem !important;
            letter-spacing: 2px;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .page-content {
                padding: 40px 15px;
                min-height: auto;
            }

            .verify-card {
                padding: 30px 20px;
                width: 100%;
                max-width: 100%;
            }

            .input-group {
                display: flex !important;
                flex-direction: column !important;
                gap: 10px;
            }

            .input-group .form-control {
                width: 100% !important;
                flex: none !important;
                height: 48px !important;
            }

            .btn-verify {
                width: 100% !important;
                height: 48px !important;
                margin: 0 !important;
            }
        }

        /* Custom Dropdown Arrow Fix: Sync with FinalYearProject.php */
        select.form-control.premium-input,
        .bootstrap-select .dropdown-toggle {
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2364748b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E") no-repeat right 15px center !important;
            background-size: 12px !important;
            padding-right: 40px !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 0 !important;
            height: 48px !important;
            transition: none !important;
            /* Prevent lag on interaction */
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
        /* Sidebar Styling */
        .sticky-sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: 100px;
            z-index: 10;
        }

        .sidebar-card {
            background: #fff;
            border-radius: 0;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
            border: 1px solid #eee;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .sidebar-title-bx {
            padding: 15px;
            background: rgba(0, 109, 171, 0.05);
            border-bottom: 1px solid #eee;
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
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none !important;
        }

        .btn-premium:hover {
            background: var(--orange);
            transform: translateY(-2px);
        }

        .sidebar-swiper-container {
            width: 100%;
            height: 250px;
            overflow: hidden;
            padding: 0 15px;
        }

        .sidebar-swiper-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #f8faff;
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content">
        <div class="container">
            <div class="row d-flex flex-row-reverse">
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="verify-card text-center">
                        <img loading="lazy" src="<?= base_url('public/assets/images/logo.png') ?>" alt="DigiCoders Logo"
                            class="company-logo-verify">

                        <div class="mb-3">
                            <h2 class="section-title-premium">Verify Certificate</h2>
                            <p class="section-subtitle-premium">Validate your training credentials instantly</p>
                        </div>

                        <!-- Training Year Selection -->
                        <div class="verification-section mb-4 text-start">
                            <h4 class="verification-label"><i class="fa fa-calendar"></i>Select Training Year</h4>
                            <div class="input-group">
                                <select id="trainingYear" class="form-control premium-input">
                                    <option disabled readonly selected value="">--Select Year--</option>
                                    <?php 
                                    $startYear = 2019;
                                    $endYear = date('Y'); // Only show options up to current year
                                    for ($y = $startYear; $y <= $endYear; $y++) {
                                        echo "<option value=\"$y\">$y</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Verify by Mobile -->
                        <div class="verification-section mb-4 text-start">
                            <h4 class="verification-label"><i class="fa fa-phone"></i>Verify By Mobile Number</h4>
                            <form id="mn" action="<?= base_url() ?>Home/VerifyStudent/StudentCertificate" method="post">
                                <?php $csrf = array('name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()); ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                <input type="hidden" name="TrainingYear" class="hidden-year" value="" />
                                <div class="input-group">
                                    <input class="form-control premium-input" type="number" name="MobileNumber"
                                        maxlength="10" minlength="10" placeholder="10-digit number" required />
                                    <button name="submit" type="submit" value="Submit"
                                        class="btn btn-verify">Verify</button>
                                </div>
                            </form>
                        </div>

                        <!-- OR Divider -->
                        <div class="d-flex align-items-center my-4 justify-content-center">
                            <div style="flex: 1; height: 1px; background: rgba(0,0,0,0.1);"></div>
                            <span class="divider-badge mx-3">OR</span>
                            <div style="flex: 1; height: 1px; background: rgba(0,0,0,0.1);"></div>
                        </div>

                        <!-- Verify by Reference Number -->
                        <div class="verification-section text-start">
                            <h4 class="verification-label"><i class="fa fa-certificate"></i>Verify By Reference ID</h4>
                            <form id="rf" action="<?= base_url() ?>Home/VerifyStudent/StuRefCertificate" method="post">
                                <?php $csrf = array('name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash()); ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                <input type="hidden" name="TrainingYear" class="hidden-year" value="" />
                                <div class="input-group">
                                    <input class="form-control premium-input" type="text" name="RefNumber" minlength="1"
                                        placeholder="Certificate Reference Number" required />
                                    <button name="submit" type="submit" value="Submit"
                                        class="btn btn-verify">Verify</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Premium Sidebar -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="sticky-sidebar">
                        <?php
                        $placements = $this->db->query("select * from placement where banner='banner' and status='true' order by id desc limit 12")->result();
                        if (!empty($placements)) {
                            ?>
                            <div class="sidebar-card">
                                <div class="sidebar-title-bx text-center">
                                    <h5 class="mb-0" style="color: var(--blue); font-weight: 800; font-size: 16px; letter-spacing: 1px;">LATEST PLACEMENT</h5>
                                </div>
                                <div class="sidebar-swiper-container" style="max-height: 250px; overflow: hidden; background: #f8fbff;">
                                    <div class="swiper side-placement-swiper">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($placements as $p) { ?>
                                                <div class="swiper-slide">
                                                    <img loading="lazy" src="<?= base_url('public/uploads/placement/') . $p->photo ?>"
                                                    	alt="<?= htmlspecialchars($p->alt_text ?: 'Success Story', ENT_QUOTES, 'UTF-8') ?>"
                                                    	title="<?= htmlspecialchars($p->title ?: 'Success Story', ENT_QUOTES, 'UTF-8') ?>"
                                                    	style="height: 250px; width: 100%; object-fit: contain;">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-3 pt-2">
                                    <?php $contacts = $this->db->get_where('tbl_contact_numbers', ['status' => 'true'])->result(); ?>
                                    <div class="contact-info text-center">
                                        <h5 class="mb-2" style="color: var(--blue); font-weight: 800; font-size: 14px; border-bottom: 2px solid var(--orange); display: inline-block; padding-bottom: 2px;">Connect With Us</h5>
                                        <div class="row no-gutters">
                                            <?php foreach ($contacts as $c) { ?>
                                                <div class="col-12 mb-1">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <i class="<?= ($c->type == 'Landline') ? 'fa fa-phone' : 'fa fa-mobile' ?> mr-2" style="color: var(--orange); font-size: 13px;"></i>
                                                        <a href="tel:<?= $c->number ?>" style="color: #333; font-weight: 700; font-size: 12.5px;"><?= $c->number ?></a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="text-center py-1">
                                        <a href="<?= base_url() ?>Home/Placement" style="color: var(--blue); font-weight: 800; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">VIEW ALL SELECTIONS <i class="fa fa-arrow-right ml-1"></i></a>
                                    </div>

                                    <div class="row no-gutters mt-2">
                                        <div class="col-6 pr-1">
                                            <a href="<?= base_url() ?>Home/Registration" class="btn-premium">Register</a>
                                        </div>
                                        <div class="col-6 pl-1">
                                            <a href="tel:9198483820" class="btn-premium" style="background: var(--orange);">Call Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(document).ready(function () {
                // Sync hidden year input whenever dropdown changes
                $('#trainingYear').on('change', function () {
                    $('.hidden-year').val($(this).val());
                });

                // Set initial value (if any selected by default)
                var initialYear = $('#trainingYear').val();
                if (initialYear) {
                    $('.hidden-year').val(initialYear);
                }

                // Force user to select year before form submission
                $('#mn, #rf').on('submit', function (e) {
                    var selectedYear = $('#trainingYear').val();
                    if (!selectedYear) {
                        if (typeof swal !== 'undefined') {
                            swal({
                                title: "Select Year",
                                text: "Please select a Training Year first!",
                                icon: "warning",
                                button: "OK",
                            });
                        } else {
                            alert("Please select a Training Year first!");
                        }
                        e.preventDefault();
                        return false;
                    }
                });

                // Swiper initialization for sidebar
                if (typeof Swiper !== 'undefined') {
                    new Swiper(".side-placement-swiper", {
                        slidesPerView: 1,
                        spaceBetween: 5,
                        loop: true,
                        autoplay: {
                            delay: 0,
                            disableOnInteraction: false,
                        },
                        speed: 4000,
                        allowTouchMove: false
                    });
                }
            });
        });
    </script>
</body>

</html>