<!DOCTYPE html>
<html lang="en">
<head>
    <title>Final Year Live Project Training - Java, Python, Android in Lucknow</title>
	<meta name="description" content="Are you facing any problems in developing and submitting the final year project? Contact us today for project training in Lucknow, India, UP.">
  
	<meta property="og:title" content="Final Year Live Project Training - Java, Python, Android in Lucknow" />
<meta property="og:description" content="Are you facing any problems in developing and submitting the final year project? Contact us today for project training in Lucknow, India, UP." />
<meta property="og:url" content="https://thedigicoders.com/Home/FinalYearProject" />
<link rel="canonical" href="https://thedigicoders.com/Home/FinalYearProject" />
	
	 <?php include('include/headerlinks.php')?>
	 
</head>
<body>
    <?php include('include/header.php')?>
    <style>
        .error {
            color: red !important;
        }
    </style>
<!-- } -->
<div class="page-content bg-dark">
    <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/banner4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-bx style1 text-white text-center">
                    <h1 class="title-head">Final Year Project</h1>
                    <p>A COMPANY WORKING WITH YOUNG ENGINEER'S, ENTREPRENEUR'S AND INNOVATIVE TEAM</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form id="reg" class="form-horizontal mb-5" action="<?= base_url() ?>/Home/PayNow/PayV2" method="post">
					<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label class="control-label">Student Name</label>
                                <input class="form-control" type="text" name="Name" placeholder="Enter Student Name" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Student Email ID (Optional)</label>
                                <input class="form-control" type="email" name="Email" placeholder="Enter Student Email ID" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Student Mobile Number</label>
                                <input class="form-control" type="number" name="Mobile" maxlength="10" minlength="10" placeholder="Enter Student Mobile Number" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Student Alternate Mobile (Optional)</label>
                                <input class="form-control" type="number" name="Mobile1" maxlength="10" minlength="10" placeholder="Enter Student Alternate Mobile" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>College Name</label>
                                <input class="form-control" type="text" name="College" placeholder="Enter Student College Name" required />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Project Topic</label><span class="ml-2"><a href="<?= base_url('public') ?>/Syllabus/Training Projects.pdf" target="_blank">(Suggestions)</a></span>
                                <input class="form-control" type="text" name="ProjectTopic" placeholder="Enter Project Topic"  />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Select Technology</label>
                                <select name="Technology" required>
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
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Select Education</label>
                                <select class="form-control" name="Branch" required>
                                    <option value="">Select Education</option>
                                    <option value="B.Tech (CS)">B.Tech (CS)</option>
                                    <option value="B.Tech (IT)">B.Tech (IT)</option>
                                    <option value="B.Tech (Electronics)">B.Tech (Electronics)</option>
                                    <option value="B.Tech  (EC)">B.Tech  (EC)</option>
                                    <option value="Diploma (CS)">Diploma (CS)</option>
                                    <option value="Diploma (IT)">Diploma (IT)</option>
                                    <option value="Diploma (Electronics)">Diploma (Electronics)</option>
                                    <option value="Diploma PGDCA">Diploma PGDCA</option>
                                    <option value="Diploma (PG Web Designing)">Diploma (PG Web Designing) </option>
                                    <option value="BCA">BCA</option>
                                    <option value="MCA">MCA</option>
                                    <option value="M.Tech (CS)">M.Tech (CS)</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Select Year</label>
                                <select class="form-control" name="Year" required>
                                    <option value="">Select Year</option>
                                    <option value="Third Year (3rd)">First Year (1st)</option>
                                    <option value="Third Year (3rd)">Second Year (2nd)</option>
                                    <option value="Third Year (3rd)">Third Year (3rd)</option>
                                    <option value="Final Year (4th)">Final Year (4th)</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row form-group ml-2">
                                    <div class="col-sm-12">
                                        <input class="form-check-input" type="radio" name="ProjectType" id="exampleRadios1" onclick="getFee()" value="Certificate" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Certificate
                                        </label>
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="form-check-input" type="radio" name="ProjectType" id="exampleRadios2" onclick="getFee()" value="Project Report">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Project Report
                                        </label>
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="form-check-input" type="radio" name="ProjectType" id="exampleRadios3" onclick="getFee()" value="Both (Certificate and Project Report)">
                                        <label class="form-check-label" for="exampleRadios3">
                                            Both (Certificate and Project Report)
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Payment Type</label>
                                <div class="row form-group ml-2">
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="radio" name="PaymentType" onclick="getFee()" id="exampleRadios01" value="Full Fee" checked>
                                        <label class="form-check-label" for="exampleRadios01">
                                            Full Fee
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="radio" name="PaymentType" onclick="getFee()" id="exampleRadios02" value="Half Fee">
                                        <label class="form-check-label" for="exampleRadios02">
                                            Half Fee
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="form-check-input" type="radio" name="PaymentType" onclick="getFee()" id="exampleRadios03" value="I will pay later">
                                        <label class="form-check-label" for="exampleRadios03">
                                            I will pay later
                                        </label>
                                    </div>
									
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label>Amount To Pay Now</label>
                                <input class="form-control" type="number" readonly value="1500" id="amount" name="Amount" required />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            </div>

                        </div>
                        <div class="col-lg-12 text-center">
                            <button name="submit" type="submit" value="Submit" class="btn button-md">Submit Details</button>
                        </div>
                    </form>
                </div>
            </div>
            <br />
        </div>
        <!-- @*<img src="~/assets/images/background/appointment-bg.png" class="appoint-bg" alt="">*@ -->
    </div>
</div>

<!-- @section scripts
{ -->
    <script>

        getFee();

        function getFee() {

            var feetype = $('input[name="ProjectType"]:checked').val();
            var Paymenttype = $('input[name="PaymentType"]:checked').val();
            if (feetype == 'Certificate' && Paymenttype =='Full Fee') {

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
    </script>

<!-- } -->


    <?php include('include/footer.php')?>
    <?php include('include/jslinks.php')?>
</body>
</html>

<?php
if (!empty($this->session->flashdata('status'))) {
  if ($this->session->flashdata('msg') == 'Payment Success')
  {
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
  if ($this->session->flashdata('msg') == 'Something Went Wrong')
  {
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
  if ($this->session->flashdata('msg') == 'Validation Error')
  {
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