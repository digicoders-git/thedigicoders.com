<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Fee Payment - TheDigiCoders</title>
    <?php include('include/headerlinks.php') ?>
</head>
<body>
<?php include('include/header.php') ?>


<div class="page-content bg-dark">
    <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/banner/banner4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-bx style1 text-white text-center">
                        <h2 class="title-head">@Model.Name's Details</h2>
                    </div>
                    <input type="hidden" id="FeePaymentID" name="RegistrationID" value="@Model.RegistrationID" />
                </div>
                <div class="card">
                    <form class="form-group" action="/Home/SubmitFeePaymentUpdate" method="post">
					<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Student Name :</label><span class="ml-2">@Model.Name</span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Training Name :</label><span class="ml-2">@Model.ApplicationFor</span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Father Name :</label><span class="ml-2">@Model.Father</span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Email :</label><span class="ml-2">@Model.Email</span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Mobile :</label><span class="ml-2">@Model.Mobile1</span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>College :</label><span class="ml-2">@Model.College</span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Course :</label><span class="ml-2">@Model.Course</span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Technology :</label><span class="ml-2">@Model.Technology</span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Year :</label><span class="ml-2">@Model.Year</span></div>
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Fee :</label><span class="ml-2">@Model.Fee</span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12"><label>Amount :</label><span class="ml-2">
                                    <input type="number" value="@Model.Amount" id="Amount" name="Amount" /> </span></div>
                                <div class="text-center">
                                        <button name="submit" type="button" value="Submit" onclick="UpdateAMount();" class="btn button-md">Pay Now</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        <br />
    </div>
</div>
<script type="text/javascript">

    function UpdateAMount() {
        var amount = $("#Amount").val();
        var FeePaymentID = $("#FeePaymentID").val();

        $.ajax({
            url: "/Home/SubmitFeePaymentUpdate",
            type: "POST",
            dataType: "JSON",
            data: {
                "FeePaymentID": FeePaymentID,
                "Amount": amount
            },
            success: function (data) {
                console.log(data);
                if (data == "1") {
                    window.location.href = "/Home/PayNow";
                }
                else {
                    alert("Server Error.")
                }
            },
            error: function (data) {
                Alert(data);
            },
        });
    }
</script>








<?php include('include/footer.php') ?>
<?php include('include/jslinks.php') ?>
</body>
</html>