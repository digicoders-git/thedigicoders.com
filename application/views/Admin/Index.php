<!doctype html>
<html lang="en">

<head>
  <title>Admin Login - <?= $this->data['app_name'] ?></title>
  <?php include('include/headerlinks.php') ?>
</head>

<body>

  <!--start wrapper-->
  <div class="wrapper">

    <!--start content-->
    <main class="authentication-content">
      <div class="container-fluid">
        <div class="authentication-card">
          <div class="card shadow rounded-0 overflow-hidden">
            <div class="row g-0">
              <div class="col-lg-6 bg-login d-flex align-items-center justify-content-center">
                <img src="<?= base_url('public') ?>/app-assets/images/error/login-img.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="card-body p-4 p-sm-5">
                  <h5 class="card-title">Sign In</h5>
                  <p class="card-text mb-5">See your growth and get consulting support!</p>
                  <div style="display:none" id="errorContainer" class="bg-light text-danger mb-3 p-2"
                    style="border-radius: 5px;">

                  </div>
                  <form class="form-body" action="<?= base_url('Home/Auth/authentication') ?>" method="post"
                    id="admin-auth-form">
                    <?php
                    $csrf = array(
                      'name' => $this->security->get_csrf_token_name(),
                      'hash' => $this->security->get_csrf_hash()
                    );
                    ?>
                    <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                    <div class="row g-3">
                      <div class="col-12" id="email_box">
                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                              class="bi bi-envelope-fill"></i></div>
                          <input type="email" name="email" required class="form-control radius-30 ps-5"
                            id="inputEmailAddress" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="col-12" id="otp_box" style="display:none;">
                        <label for="inputOTP" class="form-label">Enter OTP</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
                              class="bi bi-shield-lock-fill"></i></div>
                          <input type="text" name="otp" class="form-control radius-30 ps-5" id="inputOTP"
                            placeholder="Enter OTP">
                        </div>
                        <div class="mt-2 text-center" id="timer_container">
                          <small class="text-secondary">OTP expires in: <span id="timer"
                              class="fw-bold text-primary">02:00</span></small>
                        </div>
                        <div class="mt-2 text-center" id="resend_container" style="display:none;">
                          <small>Didn't receive OTP? <a href="javascript:void(0)" id="resend_otp_btn"
                              class="fw-bold text-primary">Resend OTP</a></small>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" id="submitBtn" class="btn btn-primary radius-30"><i
                              class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i><span
                              id="btnText">Send OTP</span></button>
                        </div>
                      </div>
                    </div>
                  </form>

                  <script>
                    document.addEventListener("DOMContentLoaded", function () {
                      const authForm = document.getElementById('admin-auth-form');
                      let timerInterval;

                      function startTimer(duration) {
                        let timer = duration, minutes, seconds;
                        const display = document.querySelector('#timer');
                        const timerContainer = document.querySelector('#timer_container');
                        const resendContainer = document.querySelector('#resend_container');

                        timerContainer.style.display = 'block';
                        resendContainer.style.display = 'none';

                        clearInterval(timerInterval);
                        timerInterval = setInterval(function () {
                          minutes = parseInt(timer / 60, 10);
                          seconds = parseInt(timer % 60, 10);

                          minutes = minutes < 10 ? "0" + minutes : minutes;
                          seconds = seconds < 10 ? "0" + seconds : seconds;

                          display.textContent = minutes + ":" + seconds;

                          if (--timer < 0) {
                            clearInterval(timerInterval);
                            timerContainer.style.display = 'none';
                            resendContainer.style.display = 'block';
                          }
                        }, 1000);
                      }

                      if (authForm) {
                        // Resend OTP button click
                        $(document).on('click', '#resend_otp_btn', function () {
                          $("#inputOTP").val('');
                          $(authForm).submit();
                        });

                        $(authForm).off('submit').on('submit', function (e) {
                          e.preventDefault();
                          var data = new FormData(this);
                          $.ajax({
                            type: $(this).attr('method'),
                            url: $(this).attr('action'),
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function () {
                              $("#submitBtn").attr("disabled", true);
                              $('#submitSpin').show();
                            },
                            success: function (response) {
                              var jsonres = JSON.parse(response);
                              if (jsonres.status == "success") {
                                iziToast.success({
                                  title: jsonres.title,
                                  message: jsonres.msg,
                                  position: 'topRight'
                                });
                                window.setTimeout(function () {
                                  window.location.href = jsonres.redirectLink;
                                }, 800);
                              } else if (jsonres.status == "otp_sent") {
                                iziToast.success({
                                  title: jsonres.title,
                                  message: jsonres.msg,
                                  position: 'topRight'
                                });
                                $("#email_box").hide();
                                $("#otp_box").show();
                                $("#inputOTP").attr("required", true);
                                $("#btnText").text("Verify OTP & Sign In");
                                $("#errorContainer").hide();

                                startTimer(120); // Start 2-minute timer
                              } else {
                                $("#errorContainer").html(jsonres.msg).show();
                                iziToast.error({
                                  title: jsonres.title,
                                  message: jsonres.msg || "",
                                  position: 'topRight'
                                });
                              }
                              $("#submitBtn").removeAttr("disabled");
                              $('#submitSpin').hide();
                            },
                            error: function () {
                              $("#submitBtn").removeAttr("disabled");
                              $('#submitSpin').hide();
                              iziToast.error({
                                title: 'Error',
                                message: 'Something Went Wrong',
                                position: 'topRight',
                              });
                            }
                          });
                        });
                      }
                    });
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!--end page main-->

  </div>
  <!--end wrapper-->
  <?php include('include/jslinks.php') ?>

</body>

</html>