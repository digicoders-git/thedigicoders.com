<!DOCTYPE html>
<html lang="en">

<head>
    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="<?= base_url('public') ?>/assets/images/favicon.png" type="image/x-icon">
    <!-- All PLUGINS CSS ============================================= -->
    <link href="<?= base_url('public') ?>/assets/css/assets.css" rel="stylesheet" />
    <!-- TYPOGRAPHY ============================================= -->
    <link href="<?= base_url('public') ?>/assets/css/typography.css" rel="stylesheet" />
    <!-- SHORTCODES ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/shortcodes/shortcodes.css">
    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/style.css">
    <link class="skin" rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/color/color-1.css">
    <!-- REVOLUTION SLIDER CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/navigation.css">
    <!--Manual css-->
    <link href="<?= base_url('public') ?>/assets/MyStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Project Reciept - TheDigiCoders</title>

    <style>
        .cstmck {
            display: inline-block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .cstmck input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .cstmck:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .cstmck input:checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .cstmck input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .cstmck .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>

</head>

<body>


    <?php
    //  var_dump($userdata);
    if (!empty($userdata)) {
    } 
    ?>
    <div class="">
        <div class="" >
            <div class=" container">
            <div class="row">
                <div class="col-md-12 heading-bx style1 text-white text-center">
                </div>
                <input type="hidden" id="FeePaymentID" name="RegistrationID" value="@Model.RegistrationID" />
            </div>
            <div class="card" style="border: 1px solid black;">


                <form class="form-group" action="/Home/SubmitFeePaymentUpdate" method="post">
				<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 mt-2">
                                <div class="btn bg-light " style="border: 1px solid black;">Fee Reciept</div><br />
                                <span>Date  : </span><span>
                                  
                                    <?php
                                   $date = $userdata->date;
                                   $old_date_timestamp = strtotime($date);
                                 echo   $new_date = date('d/m/Y', $old_date_timestamp); 
                                    ?>
                                </span><br>
                                <span>Sr No  : </span><span><?= $userdata->id; ?></span>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <img src="<?= base_url('public/assets/images/DigiCoders Logo Black.png') ?>" />
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12" style="text-align:end">
                                <span>+91 9140-96-7607</span><br />
                                <span>+91 6394-29-6293</span><br />
                                <span>0522-2435604</span ><br />

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12"></div>
                            <div class="col-lg-8 col-md-8 col-sm-12" style="text-align:center">
                                <span class="ml-2 mb-5">
                                    22-23, Behind State Bank of India Babuganj Branch, Near IT
                                    Chauraha, Lucknow, UP, 226007, info@digicoders.in, www.thedigicoders.com
                                </span>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12"></div>
                        </div>
                        <hr class="style1" />

                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12"><label>Name :</label></div>
                            <div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->student_name; ?></span>
                                <hr class="style1" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12"><label>College :</label></div>
                            <div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->college; ?></span>
                                <hr class="style1" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12"><label>Course :</label></div>

                            <div class="col-lg-2 col-md-2 col-sm-12"><span class="ml-2"><?= $userdata->technology; ?></span>
                                <hr class="style1" />
                            </div>
                            <label for="">Branch:</label>
                            <div class="col-lg-3 col-md-2 col-sm-12"><span class="ml-2"><?= $userdata->branch; ?></span>
                                <hr class="style1" />
                            </div>
                            <label for="">Year:</label>
                            <div class="col-lg-3 col-md-4 col-sm-12"><span class="ml-2">
                                    <?= $userdata->year; ?></span>
                                <hr class="style1" />
                            </div>
                        </div>
                        <!-- <div class="row">
                                <div class="col-lg-4 col-md-2 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12"><label>Course </label></div>
                                        <div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->course; ?></span>
                                            <hr class="style1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-2 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12"><label>Branch </label></div>
                                        <div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"></span>
                                            <hr class="style1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-2 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12"><label>Year </label></div>
                                        <div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->edu_year; ?> </span>
                                            <hr class="style1" />
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12"><label>Account Of :</label></div>
                            <div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->project_type; ?></span>
                                <hr class="style1" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-2 col-sm-12"><label>Payment Mode </label> &ensp;

                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Cash</span>
                                <!-- <hr class="style1" /> -->
                                <label class="cstmck mb-3">
                                    <input type="checkbox" disabled>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Online</span>
                                <!-- <hr class="style1" /> -->
                                <label class="cstmck mb-3">
                                    <input type="checkbox" disabled checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Paytm</span>
                                <!-- <hr class="style1" /> -->
                                <label class="cstmck mb-3">
                                    <input type="checkbox" disabled>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Cheque</span>
                                <!-- <hr class="style1" /> -->
                                <label class="cstmck mb-3">
                                    <input type="checkbox" disabled >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-2 col-md-2 col-sm-12"><label>Amount In Words :</label></div>
                            <div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?php echo strtoupper($this->common->getAmountInWords($userdata->amount)); ?></span>
                                <hr class="style1" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Includes </label>
                            </div>
                            <div class="col-sm-9">

                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-12"><span class="ml-2"> Project Repots& Hardcopy</span>
                                       
                                        <label class="cstmck mb-3">
                                            <input type="checkbox" disabled <?php if($userdata->project_type =='Project Report'){ echo "checked"; } ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12"><span class="ml-2"> Certificate</span>
                                        
                                        <label class="cstmck mb-3">
                                            <input type="checkbox" disabled <?php if( $userdata->project_type =='Both (Certificate and Project Report)'){ echo "checked"; } ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <!-- <div class="col-lg-4 col-md-3 col-sm-12"><span class="ml-2"> Project Repots& Hardcopy</span>
                                            
                                            <label class="cstmck mb-3">
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 mt-2"><span class="ml-2"> Certificate</span>

                                            <label class="cstmck mb-3">
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
                                            </label>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="input-group mb-3" style="border: 1px solid black;">
                                            <div class="input-group-prepend" style="border-right: 1px solid black;">
                                                <span class="input-group-text" id="basic-addon1">₹</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Rupees" aria-label="Username" value="<?= $userdata->amount; ?>" aria-describedby="basic-addon1" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        Payment Status:
                                        <?php
                                        if ($userdata->txn_status == 'PAID') {
                                            ?>
                                           <span class="text-success">PAID</span>
                                            <?php
                                        } elseif($userdata->txn_status == 'FAILED') {
                                            ?>
                                           <span class="text-danger">FAILD</span>
                                            <?php
                                        }
                                        else{
                                            ?>
                                             <span class="text-info">PENDING</span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align:end;">
                                <span class="ml-2">

                                    <!-- For - <img src="<?= base_url('public/assets/images/DigiCoders Logo Black.png') ?>" alt="" style="height: 30px;"> -->
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12"><label>Note :</label><span class="ml-2"> Submitted Fee is Not Refundable nor transferable </span></div>


                            <div class="col-lg-6 col-md-6 col-sm-12 " style="text-align:end">
                                <span class="ml-2 border-top">
                                    Authorized Sign & Stamp
                                </span>
                            </div>
                        </div>
                        <div class="imgdata" style="position: absolute; margin-bottom: -50px;">
                            <?php
                            if ($userdata->txn_status == 'PAID') {
                            ?>
                                <img src="<?= base_url('public/assets/images/paid.png') ?>" alt="" style="    height: 100px;  width: 103px;margin-top: -119px;margin-left: 595px; ">
                            <?php
                            } elseif($userdata->txn_status == 'FAILED') {
                            ?>
                                <img src="<?= base_url('public/assets/images/round-failed-stamp.png') ?>" alt="" style="    height: 100px;  width: 150px;margin-top: -119px;margin-left: 595px; ">
                            <?php
                            }
                            else
                            {
                                ?>
                                 <img src="<?= base_url('public/assets/images/pending.jpg') ?>" alt="" style="    height: 100px;  width: 130px;margin-top: -119px;margin-left: 595px; ">
                                <?php
                            }
                            ?>
                        </div>
                        <img src="<?= base_url('public/assets/images/sign.png') ?>" alt="" style="height: 70px;  margin-top:-110px; margin-right: 20px; float: right">


                    </div>


                </form>
            </div>
        </div>
        <br />
    </div>
    </div>

    



</body>

</html>