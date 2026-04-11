<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify Certificate - Software Development Training Courses</title>
    <meta name="description"
        content="The DigiCoders is the best software development training program in Lucknow. Fill the verify certificate form!">

    <meta property="og:title" content="Verify Certificate - Software Development Training Courses" />
    <meta property="og:description"
        content="The DigiCoders is the best software development training program in Lucknow. Fill the verify certificate form!" />
    <meta property="og:url" content="https://thedigicoders.com/Home/VerifyCertificate" />
    <link rel="canonical" href="https://thedigicoders.com/Home/VerifyCertificate" />

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
</body>

</html>