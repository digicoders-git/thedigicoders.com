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
                  <div style="display:none" id="errorContainer" class="bg-light text-danger mb-3 p-2" style="border-radius: 5px;">

                  </div>
                  <!-- <?php echo md5(12345); ?> -->
                  <form class="form-body" action="<?= base_url('Home/Auth/authentication') ?>" method="post" id="auth-form">
				  <?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

                    <div class="row g-3">
                      <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                          <input type="email" name="email" required class="form-control radius-30 ps-5" id="inputEmailAddress" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                        <div class="ms-auto position-relative">
                          <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                          <input type="password" name="password" required class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Enter Password">
                          <input type="hidden" name="url" required class="form-control radius-30 ps-5" value="<?= base_url('Admi/nDashboard') ?>">
                        </div>
                      </div>
					 
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" id="submitBtn" class="btn btn-primary radius-30"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>Sign In</button>
                        </div>
                      </div>
                      <!-- <div class="col-12">
                        <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up here</a></p>
                      </div> -->
                    </div>
                  </form>
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