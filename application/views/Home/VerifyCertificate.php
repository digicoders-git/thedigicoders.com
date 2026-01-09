<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify Certificate - Software Development Training Courses</title>
	<meta name="description" content="The DigiCoders is the best software development training program in Lucknow. Fill the verify certificate form!">
  
	<meta property="og:title" content="Verify Certificate - Software Development Training Courses" />
<meta property="og:description" content="The DigiCoders is the best software development training program in Lucknow. Fill the verify certificate form!" />
<meta property="og:url" content="https://thedigicoders.com/Home/VerifyCertificate" />
<link rel="canonical" href="https://thedigicoders.com/Home/VerifyCertificate" />
	
	  <?php include('include/headerlinks.php')  ?>
</head>
<body>
    <?php include('include/header.php')  ?>

<div class="page-content bg-dark">
    <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/banner/banner4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx style1 text-white text-center">
                    <h1 class="title-head">Verify Certificate</h1>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- @Html.Raw(TempData["alert"]) -->
                    <form id="reg" class="form-horizontal mb-5" action="<?= base_url() ?>Home/VerifyStudent/StudentCertificate" method="post">
					<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input class="form-control" type="text" name="StudentName" placeholder="Enter Student Name" required />

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="col-lg-12 text-center">
                                    <button name="submit" type="submit" value="Submit" class="btn button-md mobile-btn">Search Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h3 class="text-center">OR</h3>
                    <!-- @Html.Raw(TempData["alert2"]) -->
                    <form id="mn" class="form-horizontal mb-5" action="<?= base_url() ?>Home/VerifyStudent/StudentCertificate" method="post">
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input class="form-control" type="number" name="MobileNumber" maxlength="10" minlength="10" placeholder="Enter Student Mobile Number" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="col-lg-12 text-center">
                                    <button name="submit" type="submit" value="Submit" class="btn button-md mobile-btn">Search Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h3 class="text-center">OR</h3>
                    <!-- @Html.Raw(TempData["alert3"]) -->
                    <form id="rf" class="form-horizontal mb-5" action="<?= base_url() ?>Home/VerifyStudent/StuRefCertificate" method="post">
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input class="form-control" type="number" name="RefNumber" minlength="1" placeholder="Enter Reference Number" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="col-lg-12 text-center">
                                    <button name="submit" type="submit" value="Submit" class="btn button-md mobile-btn">Search Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br />
        </div>
        <!-- @*<img src="~/assets/images/background/appointment-bg.png" class="appoint-bg" alt="">*@ -->
    </div>
</div>

    <?php include('include/footer.php')  ?>
    <?php include('include/jslinks.php')  ?>
</body>
</html>