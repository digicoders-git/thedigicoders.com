<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Profile - <?= $this->data['app_name'] ?></title>
    <?php include('include/headerlinks.php'); ?>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php include('include/header.php'); ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php include('include/sidebar.php'); ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Our Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->


            <div class="row my-4">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="mb-0">My Profile</h5>
                            <hr>
                            <div class="card shadow-none border">
                                <div class="card-header">
                                    <h6 class="mb-0">ADMIN INFORMATION</h6>
                                </div>
                                <div class="card-body">
                                    <form class="row g-3">
                                        <div class="col-6">
                                            <?php
                                            foreach ($userdata as $value)
                                            {
                                                // var_dump($value);
                                                // echo $value->admin_type;
                                            }
                                            ?>

                                            <label class="form-label">Admin Type</label>
                                            <input type="text" class="form-control" value="<?= $value->admin_type; ?>" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Email address</label>
                                            <input type="text" class="form-control" value="<?= $value->email; ?>" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Password</label>
                                            <input type="text" class="form-control" value="<?= $value->password; ?>" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Status</label>
                                            <input type="text" class="form-control text-capitalize" value="<?= $value->status; ?>" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="my-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                                        Last Login Date Time
                                        <span class="badge bg-primary rounded-pill"><?= $value->login_date; ?> , <?= $value->login_time; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                                        Last Logout Date Time
                                        <span class="badge bg-primary rounded-pill"><?= $value->logout_date; ?> , <?= $value->logout_time; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-start">
                                <a href="<?= base_url('Admin/ManagePassword') ?>" type="button" class="btn btn-danger px-4"><i class="fa fa-key"></i>&ensp;Changes Password</a>
                                
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="fa fa-key"></i>&ensp;Change Tnx Password
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Tnx Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Admin/ChangeTnxPassword')?>" method="post">
  <div class="mb-3">
    <label for="opass" class="form-label">Old Password</label>
    <input type="password" class="form-control" id="opass" name="opass" required>
   
  </div>
  <div class="mb-3">
    <label for="npass" class="form-label">New Password</label>
    <input type="password" class="form-control" id="npass" name="npass" required>
  </div>
  <div class="mb-3">
    <label for="cpass" class="form-label">Confrim Password</label>
    <input type="password" class="form-control" id="cpass" name="cpass" required>
  </div>
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
	  </form>
    </div>
  </div>
</div>                  
						  
						  </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Admin Login History</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>LoginID</th>
                                            <th>IP</th>
                                            <th>MAC</th>
                                            <th>UserName</th>
                                            <th>BrowserName</th>
                                            <th>OSName</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sr = 1;
                                        foreach ($logindata as $each)
                                        {
                                        ?>
                                            <tr>
                                                <td><?= $sr++; ?></td>
                                                <td><?= $each->LoginID; ?></td>
                                                <td><?= $each->IP; ?></td>
                                                <td><?= $each->MAC; ?></td>
                                                <td><?= $each->UserName; ?></td>
                                                <td><?= $each->BrowserName; ?></td>
                                                <td><?= $each->OSName; ?></td>
                                                <td><?= $each->Date; ?></td>
                                                <td><?= $each->Time; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>LoginID</th>
                                            <th>IP</th>
                                            <th>MAC</th>
                                            <th>UserName</th>
                                            <th>BrowserName</th>
                                            <th>OSName</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>





        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->

    <?php include('include/jslinks.php') ?>

</body>



</html>
<script>
    $('.dropify').dropify();
</script>