<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration for Training - Software Development Training Institute - TheDigiCoders</title>
    <meta name="description"
        content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form.">
    <meta property="og:title" content="Online Registration - Software Development Training Institute - TheDigiCoders" />
    <meta property="og:description"
        content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form." />
    <meta property="og:url" content="https://thedigicoders.com/Home/Registration" />
    <link rel="canonical" href="https://thedigicoders.com/Home/Registration" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function submitregform() {
            document.getElementById('submitbtn').disabled = false
        }
    </script>

    <?php include('include/headerlinks.php') ?>
    <style>
        #msgpara {
            border: #06509f;
            border-style: dashed;
            padding: 4px;
            text-align: justify;
        }

        .btnJPg:hover {
            background: #f7b205;
            color: white;
        }

        .border {
            padding: 15px !important;
            text-align: justify;
            width: 100%;
            background: linear-gradient(90deg, #250a99 50%, transparent 50%),
                linear-gradient(90deg, #250a99 50%, transparent 50%),
                linear-gradient(0deg, #250a99 50%, transparent 50%),
                linear-gradient(0deg, #250a99 50%, transparent 50%);
            background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
            background-size: 16px 4px, 16px 4px, 4px 16px, 4px 16px;
            background-position: 0% 0%, 100% 100%, 0% 100%, 100% 0px;
            border-radius: 5px;
            padding: 10px;
            animation: dash 5s linear infinite;
        }

        @keyframes dash {
            to {
                background-position: 100% 0%, 0% 100%, 0% 0%, 100% 100%;
            }
        }

        .error {
            color: red !important;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control,
        select.form-control {
            height: 50px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        select.form-control:focus {
            border-color: #f7b205;
            box-shadow: 0 0 0 0.2rem rgba(247, 178, 5, 0.25);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            padding-right: 40px;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
            display: block;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden;
        }

        .card-body {
            padding: 2.5rem;
        }

        .heading-bx h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .heading-bx p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .btnJPg {
            background: #250a99;
            color: white;
            border: none;
            padding: 12px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btnJPg:hover {
            background: #f7b205;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(247, 178, 5, 0.3);
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-top: 0.3rem;
            margin-right: 10px;
        }

        .form-check-label {
            font-weight: 500;
            cursor: pointer;
        }

        .input-group-append button {
            border-radius: 0 5px 5px 0;
            border: 1px solid #ddd;
            border-left: none;
        }

        .input-group-append button:hover {
            opacity: 0.9;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }

            .heading-bx h1 {
                font-size: 2rem;
            }

            .form-control,
            select.form-control {
                height: 45px;
                font-size: 15px;
            }

            .btnJPg {
                padding: 10px 30px;
                font-size: 16px;
            }

            .col-lg-6,
            .col-md-6,
            .col-sm-12 {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 1rem;
            }

            .heading-bx h1 {
                font-size: 1.75rem;
            }

            .heading-bx p {
                font-size: 1rem;
            }

            .btnJPg {
                width: 100%;
                padding: 12px;
            }
        }

        /* Custom radio button styling */
        .form-check-input:checked {
            background-color: #f7b205;
            border-color: #f7b205;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        /* Animation for form */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-dark">
        <div class="section-area section-sp3 ovpr-dark bg-fix appointment-box"
            style="background-image:url(/assets/images/banner/banner4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 heading-bx style1 text-white text-center">
                        <h1 class="title-head">Register Now</h1>
                        <p>A COMPANY WORKING WITH YOUNG ENGINEER'S, ENTREPRENEUR'S AND INNOVATIVE TEAM</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form id="reg" class="form-horizontal mb-5">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                            <div class="row form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label>Student Training Location/Mode <span class="text-danger">*</span></label>
                                    <?php echo form_error('student_training_location'); ?>
                                    <select class="form-control" name="student_training_location" id="student_training_location" required>
                                        <option value="">-Choose Training Location/Mode-</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Student Mobile Number <span class="text-danger">*</span></label>
                                    <?php echo form_error('mobile'); ?>
                                    <input class="form-control" type="number" name="Mobile1" maxlength="10"
                                        minlength="10" placeholder="Enter Student Mobile Number" required
                                        onkeyup="search_func(this.value)" />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label class="control-label">Student Name <span class="text-danger">*</span></label>
                                    <?php echo form_error('student_name'); ?>
                                    <input class="form-control" type="text" name="Name" placeholder="Enter Student Name"
                                        required id="name" />
                                </div>


                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Choose Training <span class="text-danger">*</span></label>
                                    <?php echo form_error('training_type'); ?>
                                    <select class="form-control" name="ApplicationFor" id="trainingtype" required
                                        onchange="loadTechnology();">
                                        <option value="">-Choose Training-</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Choose Technology <span class="text-danger">*</span></label>
                                    <?php echo form_error('technology'); ?>
                                    <select class="form-control" name="Technology" id="technology" required>
                                        <option value="" selected disabled>-Choose Technology-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Select Your Education <span class="text-danger">*</span></label>
                                    <?php echo form_error('course'); ?>
                                    <select class="form-control" name="Course" required id="education">
                                        <option value="">-Select Your Education-</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Select Year <span class="text-danger">*</span></label>
                                    <?php echo form_error('edu_year'); ?>
                                    <select class="form-control" name="Year" required id="year">
                                        <option value="">-Select Year-</option>
                                        <option value="First Year (1st)">First Year (1st)</option>
                                        <option value="Second Year (2nd)">Second Year (2nd)</option>
                                        <option value="Third Year (3rd)">Third Year (3rd)</option>
                                        <option value="Final Year (4th)">Final Year (4th)</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Student Father's Name <span class="text-danger">*</span></label>
                                    <?php echo form_error('father_name'); ?>
                                    <input class="form-control" type="text" name="FatherName" id="fname"
                                        placeholder="Enter Student Father's Name" required />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Student Email ID (Optional)</label>
                                    <input class="form-control" type="email" name="Email" id="email2"
                                        placeholder="Enter Student Email ID" />
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Student Alt Mobile (Optional)</label>
                                    <input class="form-control" type="number" name="AltMobile" id="mob2" maxlength="10"
                                        minlength="10" placeholder="Enter Student Alternate Mobile" />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Student College Name <span class="text-danger">*</span></label>
                                    <?php echo form_error('college_name'); ?>
                                    <select class="form-control selectpicker" data-live-search="true" id="collegelist"
                                        name="College" required>
                                        <option value="">-Select College-</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Payment Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" onchange="setFee()" name="Fee"
                                            id="exampleRadios1" value="registration" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Registration Fee
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Fee" onchange="setFee()"
                                            id="exampleRadiosbtnFull" value="full">
                                        <label class="form-check-label" for="exampleRadiosbtnFull">
                                            Full Fee
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label>Amount To Pay Now <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" readonly value="1000" id="amount"
                                        name="Amount" placeholder="Enter Amount" required />
                                </div>
                            </div>

                            <!-- Discount Coupon section removed for API flow -->

                            <!-- <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Security Verification <span class="text-danger">*</span></label>
                                    <div class="g-recaptcha" data-sitekey="6LfHIQcrAAAAALPXPP-R1SamLeZxPHGPA_xfMNOh"
                                        data-callback="submitregform"></div>
                                </div>
                            </div> -->

                            <div class="row form-group">
                                <div class="col-lg-12 text-center mt-4">
                                    <button name="submit" type="submit" value="Submit" id="submitbtn"
                                        class="btn button-md btnJPg">
                                        Register Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        let host = window.location.origin;
        let path = window.location.pathname;
        let rootPath = path.includes('/thedigicoders-com') ? '/thedigicoders-com' : '';
        let isIndexPhp = path.includes('index.php');
        const API_BASE = host + rootPath + (isIndexPhp ? '/index.php/Home/api_proxy?endpoint=' : '/Home/api_proxy?endpoint=');
        let allTrainings = [];

        document.addEventListener("DOMContentLoaded", function () {
            console.log("USING API_BASE:", API_BASE);
            fetchTrainings();
            fetchEducation();
            fetchColleges();
            fetchBranches();
        });

        function refreshSelect(dropdown) {
            if (window.jQuery && $(dropdown).length) {
                try {
                    $(dropdown).selectpicker();
                    $(dropdown).selectpicker('refresh');
                } catch (e) { }
                console.log("Refreshed select:", dropdown.id);
            }
        }

        function fetchTrainings() {
            console.log("Fetching trainings from:", API_BASE + '/training/getAll');
            fetch(API_BASE + '/training/getAll')
                .then(res => res.json())
                .then(res => {
                    if (res.success && res.data) {
                        allTrainings = res.data;
                        let dropdown = document.getElementById('trainingtype');
                        if (dropdown) {
                            let html = '<option value="">-Choose Training-</option>';
                            res.data.forEach(t => {
                                let val = t._id || t.id;
                                let txt = t.category_name || t.name || t.training_name;
                                html += `<option value="${val}">${txt}</option>`;
                            });
                            dropdown.innerHTML = html;
                            refreshSelect(dropdown);
                            console.log("Trainings loaded successfully.");
                        }
                    }
                })
                .catch(e => console.error("Error fetching trainings:", e));
        }

        function fetchEducation() {
            console.log("Fetching education from:", API_BASE + '/education');
            fetch(API_BASE + '/education')
                .then(res => res.json())
                .then(res => {
                    if (res.success && res.data) {
                        let dropdown = document.getElementById('education');
                        if (dropdown) {
                            let html = '<option value="">-Select Your Education-</option>';
                            res.data.forEach(e => {
                                let name = e.education_name || e.name || e.education;
                                let val = e._id || e.id;
                                html += `<option value="${val}">${name}</option>`;
                            });
                            dropdown.innerHTML = html;
                            refreshSelect(dropdown);
                            console.log("Education loaded successfully.");
                        }
                    }
                })
                .catch(e => console.error("Error fetching education:", e));
        }

        function fetchColleges() {
            console.log("Fetching colleges from:", API_BASE + '/college/names');
            fetch(API_BASE + '/college/names')
                .then(res => res.json())
                .then(res => {
                    let collegesArray = res.colleges || res.data;
                    if (res.success && collegesArray) {
                        let dropdown = document.getElementById('collegelist');
                        if (dropdown) {
                            let html = '<option value="">-Select College-</option>';
                            collegesArray.forEach(c => {
                                let cname = c.collegeName || c.college_name || c.name;
                                let val = c._id || c.id;
                                html += `<option value="${val}">${cname}</option>`;
                            });
                            dropdown.innerHTML = html;
                            refreshSelect(dropdown);
                            console.log("Colleges loaded successfully.");
                        }
                    }
                })
                .catch(e => console.error("Error fetching colleges:", e));
        }

        function fetchBranches() {
            console.log("Fetching branches from:", API_BASE + '/branches');
            fetch(API_BASE + '/branches')
                .then(res => res.json())
                .then(res => {
                    if (res.success && res.data) {
                        let dropdown = document.getElementById('student_training_location');
                        if (dropdown) {
                            let html = '<option value="">-Choose Training Location/Mode-</option>';
                            res.data.forEach(b => {
                                let bname = b.branche || b.branch_name || b.name || b.branch;
                                let val = b._id || b.id;
                                html += `<option value="${val}">${bname}</option>`;
                            });
                            dropdown.innerHTML = html;
                            refreshSelect(dropdown);
                            console.log("Branches loaded successfully.");
                        }
                    }
                })
                .catch(e => console.error("Error fetching branches:", e));
        }

        function loadTechnology() {
            let trainingId = document.getElementById('trainingtype').value;
            if (!trainingId) return;

            console.log("Fetching technologies for training:", trainingId);
            fetch(API_BASE + '/technology/getByTrainingDuration/' + trainingId)
                .then(res => res.json())
                .then(res => {
                    let dropdown = document.getElementById('technology');
                    // if(!dropdown) return;

                    if (res.success && res.data) {
                        let html = '<option value="" selected disabled>-Choose Technology-</option>';
                        res.data.forEach(tech => {
                            let val = tech._id || tech.id;
                            let txt = tech.technology_name || tech.name;
                            html += `<option value="${val}">${txt}</option>`;
                        });
                        dropdown.innerHTML = html;
                    } else {
                        dropdown.innerHTML = '<option value="" selected disabled>-Choose Technology-</option>';
                    }
                    refreshSelect(dropdown);
                    console.log("Technologies loaded.");
                })
                .catch(e => console.error("Error fetching tech:", e));

            setFee();
        }

        function setFee() {
            let trainingId = $('#trainingtype').val();
            let feetype = $('input[name="Fee"]:checked').val();
            let amount = 1000;

            if (feetype == 'Full Fee') {
                amount = 5000;
            }

            let selectedTraining = allTrainings.find(t => t._id === trainingId);
            if (selectedTraining) {
                if (feetype === 'Registration Fee' && selectedTraining.registration_fee) {
                    amount = selectedTraining.registration_fee;
                } else if (feetype === 'Full Fee' && selectedTraining.full_fee) {
                    amount = selectedTraining.full_fee;
                }
            }
            $("#amount").val(amount);
        }

        $('#reg').submit(function (e) {
            e.preventDefault();
            $('#submitbtn').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Processing...');

            let formData = {
                branch: $('#student_training_location').val(),
                mobile: $('input[name="Mobile1"]').val(),
                whatshapp: $('input[name="Mobile1"]').val(),
                studentName: $('#name').val(),
                trainingType: $('#trainingtype option:selected').text(),
                training: $('#trainingtype').val(),
                technologyId: $('#technology option:selected').text(),
                technology: $('#technology').val(),
                education: $('#education').val(),
                eduYear: $('#year').val(),
                fatherName: $('#fname').val(),
                email: $('#email2').val(),
                alternateMobile: $('#mob2').val(),
                collegeName: $('#collegelist').val(),
                paymentType: $('input[name="Fee"]:checked').val(),
                amount: $('#amount').val(),
                paymentMethod: 'online'
            };

            $.ajax({
                url: API_BASE + '/registration/web/register',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function (res) {
                    if (res.success) {
                        if (formData.paymentMethod === 'online' && res.razorpayOrder) {
                            const { razorpayOrder, razorpayKey, populatedRegistration } = res;
                            var options = {
                                "key": razorpayKey,
                                "amount": razorpayOrder.amount,
                                "currency": "INR",
                                "name": "TheDigiCoders Technologies",
                                "description": "Training Registration",
                                "order_id": razorpayOrder.id,
                                "handler": function (response) {
                                    verifyPayment(response.razorpay_payment_id, response.razorpay_order_id, response.razorpay_signature, populatedRegistration._id, formData.amount);
                                },
                                "prefill": {
                                    "name": formData.studentName,
                                    "email": formData.email,
                                    "contact": formData.mobile
                                },
                                "theme": {
                                    "color": "#250a99"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.on('payment.failed', function (response) {
                                recordFailure(response.error, populatedRegistration._id);
                                $('#submitbtn').prop('disabled', false).text('Register Now');
                                alert("Payment Failed: " + response.error.description);
                            });
                            rzp1.open();
                        } else {
                            // If payment skip or other logic
                            iziToast.success({ title: 'Success', message: 'Registration successful!' });
                            const feeId = res.feeId;
                            if (feeId) {
                                setTimeout(() => {
                                    window.location.href = `https://erp.thedigicoders.com/receipt/${feeId}`;
                                }, 2000);
                            }
                        }
                    } else {
                        alert(res.message || "Registration failed. Please try again.");
                        $('#submitbtn').prop('disabled', false).text('Register Now');
                    }
                },
                error: function (err) {
                    alert("Error during registration.");
                    $('#submitbtn').prop('disabled', false).text('Register Now');
                }
            });
        });

        function verifyPayment(payment_id, order_id, signature, registrationId, amount) {
            $('#submitbtn').html('<i class="fa fa-spinner fa-spin"></i> Verifying Payment...');
            $.ajax({
                url: API_BASE + '/razorpay/verify-web',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    razorpay_payment_id: payment_id,
                    razorpay_order_id: order_id,
                    razorpay_signature: signature,
                    registrationId: registrationId,
                    amount: amount
                }),
                success: function (res) {
                    if (res.success) {
                        const feeId = res.feeId;
                        if (feeId) {
                            window.location.href = `https://erp.thedigicoders.com/receipt/${feeId}`;
                        } else {
                            iziToast.success({ title: 'Success', message: 'Payment successful & Registration confirmed!' });
                        }
                    } else {
                        alert("Payment verification failed! Please contact support.");
                        $('#submitbtn').prop('disabled', false).text('Register Now');
                    }
                },
                error: function (err) {
                    alert("Payment verification error! Please contact support.");
                    $('#submitbtn').prop('disabled', false).text('Register Now');
                }
            });
        }

        function recordFailure(error, registrationId) {
            $.ajax({
                url: API_BASE + '/razorpay/record-failure',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    registrationId: registrationId,
                    error: error
                })
            });
        }

        function submitregform() {
            document.getElementById('submitbtn').disabled = false;
        }

        function search_func(value) {
            // Disabled for API flow unless an endpoint is added to fetch student data via mobile
        }
    </script>

    <?php
    if (!empty($this->session->flashdata('status'))) {
        if ($this->session->flashdata('msg') == 'Payment Success') {
            ?>
            <script>
                iziToast.success({
                    title: 'Success',
                    message: 'Payment Successful!',
                    position: 'topRight'
                });
            </script>
            <?php
        }
        if ($this->session->flashdata('msg') == 'Something Went Wrong') {
            ?>
            <script>
                iziToast.error({
                    title: 'Error',
                    message: 'Something Went Wrong. Please try again.',
                    position: 'topRight'
                });
            </script>
            <?php
        }
        if ($this->session->flashdata('msg') == 'Validation Error') {
            ?>
            <script>
                iziToast.error({
                    title: 'Error',
                    message: 'Please fill all required fields correctly.',
                    position: 'topRight'
                });
            </script>
            <?php
        }
    }
    ?>
</body>

</html>