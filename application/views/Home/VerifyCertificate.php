<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify Certificate | Best IT Training - DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description"
        content="Verify your training certificate at DigiCoders Technologies Pvt. Ltd. Enter your mobile number or reference number to validate your credentials for software development courses in Lucknow.">

    <meta property="og:title" content="Verify Certificate | Best IT Training - DigiCoders Technologies Pvt. Ltd." />
    <meta property="og:description"
        content="Verify your training certificate at DigiCoders Technologies Pvt. Ltd. Enter your mobile number or reference number to validate your credentials for software development courses in Lucknow." />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-dark">
        <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box"
            style="background-image:url(/assets/images/banner/banner4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-bx style1 text-white text-center">
                        <h1 class="title-head">Verify Certificate</h1>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-5">

                        <!-- Training Year Selection -->
                        <div class="verification-section mb-5 text-center">
                            <h4 class="mb-4"><i class="bi bi-calendar-event"></i> Select Training Year</h4>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <select id="trainingYear" class="form-select form-select-lg border-primary">
                                        <option disabled readonly selected>--Select Year--</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5">

                        <!-- Verify by Mobile -->
                        <div class="verification-section mb-5">
                            <h4 class="text-center mb-4"><i class="bi bi-phone"></i> Verify by Mobile Number</h4>
                            <form id="mn" action="<?= base_url() ?>Home/VerifyStudent/StudentCertificate" method="post">
                                <?php
                                $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                                );
                                ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                <input type="hidden" name="TrainingYear" class="hidden-year" value="" />
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="input-group input-group-lg">
                                            <input class="form-control" type="number" name="MobileNumber" maxlength="10"
                                                minlength="10" placeholder="Enter 10-digit Mobile Number" required />
                                            <button name="submit" type="submit" value="Submit"
                                                class="btn btn-primary px-4">Search Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="text-center my-4">
                            <span class="badge bg-light text-dark px-4 py-2 fs-6 border">OR</span>
                        </div>

                        <!-- Verify by Reference Number -->
                        <div class="verification-section">
                            <h4 class="text-center mb-4"><i class="bi bi-hash"></i> Verify by Reference Number</h4>
                            <form id="rf" action="<?= base_url() ?>Home/VerifyStudent/StuRefCertificate" method="post">
                                <?php
                                $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                                );
                                ?>
                                <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                <input type="hidden" name="TrainingYear" class="hidden-year" value="" />
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="input-group input-group-lg">
                                            <input class="form-control" type="text" name="RefNumber" minlength="1"
                                                placeholder="Enter Reference Number" required />
                                            <button name="submit" type="submit" value="Submit"
                                                class="btn btn-primary px-4">Search Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
    <script>
        $(document).ready(function () {
            // Sync hidden year input whenever dropdown changes
            $('#trainingYear').on('change', function () {
                $('.hidden-year').val($(this).val());
            });

            // Set initial value
            var initialYear = $('#trainingYear').val();
            if (initialYear) {
                $('.hidden-year').val(initialYear);
            }
        });
    </script>
</body>

</html>