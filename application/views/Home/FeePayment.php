<!DOCTYPE html>
<html lang="en">
<head>
<title>Fee Payment - Application Development Training - TheDigiCoders</title>
<meta name="description" content="Online and offline payment options are available for the best web development course at thedigicoders.com!">

<meta property="og:title" content="Fee Payment - Application Development Training - TheDigiCoders" />
<meta property="og:description" content="Online and offline payment options are available for the best web development course at thedigicoders.com!" />

<?php include('include/headerlinks.php') ?>

</head>
<body>
<?php include('include/header.php') ?>

<div class="page-content bg-dark">
    <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/banner/banner4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx style1 text-white text-center">
                    <h2 class="title-head">Fee Payment</h2>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="reg" class="form-horizontal mb-5" action="/Home/SubmitFeePayment" method="post">
					<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <!-- @Html.Raw(TempData["alert"]) -->
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <input class="form-control" type="text" name="RegistrationID" placeholder="Enter Your Registration id" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="col-lg-12 text-center">
                                    <button name="submit" type="submit" value="Submit" class="btn button-md mobile-btn">Submit</button>
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
    

<?php include('include/footer.php') ?>
<?php include('include/jslinks.php') ?>
</body>
</html>