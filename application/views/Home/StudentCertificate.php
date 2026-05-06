<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Certificate | DigiCoders Technologies Pvt. Ltd. - Best IT Training Lucknow</title>
    <meta name="description"
        content="Download your industrial training and project completion certificates from DigiCoders Technologies Pvt. Ltd. Verified IT training in Lucknow with live projects.">
    <meta name="keywords"
        content="student certificate, DigiCoders certificate, IT training Lucknow, verify certificate, industrial training certificate">
    <meta property="og:title"
        content="Student Certificate | DigiCoders Technologies Pvt. Ltd. - Best IT Training Lucknow" />
    <meta property="og:description"
        content="Download your industrial training and project completion certificates from DigiCoders Technologies Pvt. Ltd. Verified IT training in Lucknow with live projects." />

    <?php include('include/headerlinks.php') ?>
    <style>
        .floating-social {
            position: fixed;
            left: 20px;
            bottom: 30%;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .float-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 26px;
            color: #fff;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);

            /* Glassmorphism effect */
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
        }

        .float-icon:hover {
            transform: scale(1.15) translateX(10px);
            color: #fff;
            box-shadow: 0 12px 40px 0 rgba(0, 0, 0, 0.4);
        }

        .float-whatsapp {
            background: rgba(37, 211, 102, 0.25);
            border-color: rgba(37, 211, 102, 0.4);
        }

        .float-call {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .float-icon i {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }

        @media (max-width: 768px) {
            .floating-social {
                left: 15px;
                bottom: 20%;
            }

            .float-icon {
                width: 48px;
                height: 48px;
                font-size: 22px;
            }
        }
        @media print {
            header,
            footer,
            .btn,
            .button-md,
            .floating-social,
            .back-to-top,
            .card-header,
            .mobile-btn {
                display: none !important;
            }

            .page-content {
                padding: 0 !important;
                background: none !important;
            }

            .card {
                border: 1px solid #eee !important;
                box-shadow: none !important;
                margin-top: 0 !important;
            }
        }
    </style>

</head>

<body>
    <?php include('include/header.php') ?>

    <div class="floating-social">
        <a target="_blank"
            href="https://api.whatsapp.com/send?phone=919198483820&text=I have a query regarding DigiCoders"
            class="float-icon float-whatsapp" title="WhatsApp Us">
            <i class="fa fa-whatsapp"></i>
        </a>
        <a href="tel:+919198483820" class="float-icon float-call" title="Call Us">
            <i class="fa fa-phone"></i>
        </a>
    </div>


    <div class="page-content bg-dark">
        <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/banner4.jpg);">

            <?php
            if (!empty($userdata)) {
                foreach ($userdata as $data) {

                    ?>

                    <div class="container mt-3">

                        <div class="card">

                            <div class="card-header">
                                <div class="row justify-content-end">
                                    <div class="col-lg-12 text-left">
                                        <button name="submit" type="submit"
                                            onclick="window.location.href='<?php echo base_url() ?>Home/VerifyCertificate'"
                                            value="Submit" class="btn button-md mobile-btn">Go Back</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 heading-bx style1 text-black text-center">
                                    <h2 class="title-head"><?= $data->name ?> Certificate</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Student Name :</label><span
                                            class="ml-2"><?= $data->name; ?></span></div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Technology :</label><span
                                            class="ml-2"><?= $data->technology; ?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Reference Number :</label><span
                                            class="ml-2"><?= $data->refrence_no; ?> </span></div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Training Name :</label><span
                                            class="ml-2"><?= $data->course; ?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Grade :</label><span
                                            class="ml-2"><?= $data->grade; ?></span></div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Duration :</label><span
                                            class="ml-2"><?= $data->duration; ?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Training Start Date :</label><span
                                            class="ml-2"><?= $data->training_start_date; ?></span></div>
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Training End Date :</label><span
                                            class="ml-2"><?= $data->training_end_date; ?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12"><label>Date of Issue :</label><span
                                            class="ml-2"><?= $data->certificate_issue_date; ?></span></div>
                                    <div class="text-center d-flex justify-content-center gap-3">
                                        <!-- <button class="btn button-md"><span class="ml-2">
                                                <a href="<?= (isset($data->image) && strpos($data->image, 'http') === 0) ? $data->image : base_url('public/uploads/certificate/') . $data->image ?>"
                                                    download="Certificate_<?= $data->refrence_no ?>">
                                                    <i class="fa fa-download mr-1"></i>Download
                                                </a>
                                            </span></button> -->
                                        <button onclick="window.print()" class="btn button-md bg-warning text-white">
                                            <i class="fa fa-print mr-1"></i>Print PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div class="container mt-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="text-danger">No Record Found!</h3>
                            <p>Please check your mobile number and try again.</p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>


            <br />
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-lg-12 text-center">
                            <button name="submit" type="submit"
                                onclick="window.location.href='<?= base_url() ?>Home/VerifyCertificate'" value="Submit"
                                class="btn button-md mobile-btn">Search More</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>






    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>