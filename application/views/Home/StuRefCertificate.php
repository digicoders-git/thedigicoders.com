<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Referral Certificate | DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description"
        content="Verify and download student referral certificates from DigiCoders Technologies Pvt. Ltd. portal.">
    <meta name="keywords" content="student certificate, DigiCoders, verify certificate, IT training Lucknow">
    <?php include('include/headerlinks.php') ?>
    <style>
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


    <div class="page-content bg-dark">
        <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box"
            style="background-image:url(/assets/images/banner/banner4.jpg);">
           
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
                                            onclick="window.location.href='/Home/VerifyCertificate'" value="Submit"
                                            class="btn button-md mobile-btn">Go Back</button>
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
                                            class="ml-2"><?= $data->refrence_no; ?></span></div>
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
                            <p>Please check your reference number and try again.</p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <br />
            <!-- @*<img src="~/assets/images/background/appointment-bg.png" class="appoint-bg" alt="">*@ -->
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