<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage NewsLetter - <?= $this->data['app_name'] ?></title>
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
                <div class="breadcrumb-title pe-3">All NewsLetter List</div>
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

            <div class="card">
                <div class="card-header py-3">
                    <div class="row align-items-center m-0">
                        <div class="col-sm-6">
                            <h6>Manage NewsLetter</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <!-- <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#projectModal"><i class="fa fa-plus"></i>&ensp;Add Project</button> -->
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th> Display Status</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Time</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($userdata as $data)
                                {
                                ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td>
                                            <div class="col">
                                                <div class="btn-group">
                                                    <button type="button" onclick="deleteItem(<?= $data->id ?>,'news_letter','','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    <!-- <button onclick="EditData('projects', <?= $data->id ?>, 'Edit Project')" type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button> -->
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'news_letter','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->status == 'true')
                                                                                                                                                                                                                                                    {
                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>
                                        </td>


                                        <td><?= $data->email; ?></td>
                                        <td><?= $data->date; ?></td>

                                        <td><?= $data->time; ?></td>


                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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



<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageProject/Add" enctype="multipart/form-data" method="POST" id="project-form">
                    <div class="form-group mb-3">
                        <select name="type" id="" class="form-control" required>
                            <option selected disabled>Select Type</option>
                            <option value="Website">Website</option>
                            <option value="Mobile App">Mobile App</option>
                            <option value="Software">Software </option>
                        </select>
                    </div>
                    <div class="form-group mb-3">

                        <input type="text" name="project_name" class="form-control" required placeholder="Project Title">
                    </div>
                    <div class="form-group mb-3">
                        <input type="date" name="date" class="form-control" required placeholder="Date">
                    </div>
                    <div class="form-group mb-3">

                        <input type="url" name="link" class="form-control" required placeholder="Enter Project Link">
                    </div>

                    <div class="form-group mb-3">
                        <input type="file" id="input-file-now" name="image" class="dropify" required />
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

</html>
<script>
    $('.dropify').dropify();
</script>