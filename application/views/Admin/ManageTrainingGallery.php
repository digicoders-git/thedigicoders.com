<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Training Gallery -
        <?= $this->data['app_name'] ?>
    </title>
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
                <div class="breadcrumb-title pe-3">Training Gallery List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Training Gallery</li>
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
                            <h6>Manage Training Gallery</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#expertModal"><i class="fa fa-plus"></i>&ensp;Add Image</button>
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
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Title (Alt Text)</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($userdata as $data) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $sr++ ?>
                                        </td>
                                        <td>
                                            <div class="col">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        onclick="deleteItem(<?= $data->id ?>,'tbl_training_gallery','<?= $data->image ?>','<?= base_url('Admin/deleteWithFilename') ?>')"
                                                        class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    <button
                                                        onclick="EditData('tbl_training_gallery', <?= $data->id ?>, 'Edit Gallery Image')"
                                                        type="button" class="btn btn-primary "><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'tbl_training_gallery','<?= base_url('Admin/ChangeStatus') ?>')"
                                                    id="flexSwitchCheckChecked<?= $data->id ?>" <?php if ($data->status == 'true') {
                                                          echo "checked";
                                                      } ?>>
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckChecked<?= $data->id ?>"></label>
                                            </div>
                                        </td>
                                        <td> <img src="<?= base_url('public/uploads/training_gallery/') . $data->image; ?>"
                                                alt="<?= $data->title ?>" style="height: 100px;" /> </td>
                                        <td>
                                            <?= $data->title; ?>
                                        </td>
                                        <td>
                                            <?= $data->date; ?>
                                        </td>
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

<div class="modal fade" id="expertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Gallery Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageTrainingGallery/Add" enctype="multipart/form-data"
                    method="POST" id="expert-form">
                    <div class="form-group mb-3">
                        <label>Select Image</label>
                        <input type="file" id="input-file-now" name="image" class="dropify" required />
                    </div>

                    <div class="form-group mb-3">
                        <label>Title / Alt Text</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title/Alt Text"
                            required />
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