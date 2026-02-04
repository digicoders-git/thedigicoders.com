<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage MOU Slider -
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
                <div class="breadcrumb-title pe-3">Manage MOU Slider</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">MOU Slider</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <div class="row align-items-center m-0">
                        <div class="col-sm-6">
                            <h6>Manage MOU Slider Images</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#galleryModal"><i class="fa fa-plus"></i>&ensp;Add Slider
                                    Image</button>
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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Time</th>
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
                                                        onclick="deleteItem(<?= $data->id ?>,'ManageMouSlider','<?= $data->image ?>','<?= base_url('Admin/ManageMouSlider/Delete') ?>')"
                                                        class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    <button type="button"
                                                        onclick="EditData(<?= $data->id ?>,'<?= base_url('public/uploads/mou_slider/') . $data->image ?>', '<?= $data->title ?>')"
                                                        class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#editModal"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $data->title; ?>
                                        </td>
                                        <td> <img src="<?= base_url('public/uploads/mou_slider/') . $data->image; ?>"
                                                alt="mou" style="height: 120px; weight: 100%" /> </td>
                                        <td>
                                            <?= $data->date; ?>
                                        </td>
                                        <td>
                                            <?= $data->time; ?>
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



<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Slider Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageMouSlider/Add" enctype="multipart/form-data" method="POST"
                    class="form" id="gallery-form">
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Upload Image </label>
                        <input type="file" id="input-file-now" name="image" class="dropify" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submitBtn" class="btn btn-primary"> <i class="fa fa-spinner fa-spin"
                        style="display:none;" id="submitSpin"></i>Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editModalLabel">Edit Slider Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageMouSlider/Update" enctype="multipart/form-data" method="POST"
                    class="form" id="edit-form">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" id="edit_title" class="form-control" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Current Image</label>
                        <img src="" id="current_image" style="width: 100px; display: block; margin-bottom: 10px;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Upload New Image </label>
                        <input type="file" name="image" class="form-control" />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="editSubmitBtn" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

</html>
<script>
    $('.dropify').dropify();

    function EditData(id, imageUrl, title) {
        $('#edit_id').val(id);
        $('#edit_title').val(title);
        $('#current_image').attr('src', imageUrl);
    }

    $("#edit-form").on('submit', function (e) {
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
                $("#editSubmitBtn").attr("disabled", true);
                $("#editSubmitBtn").html('<i class="fa fa-spinner fa-spin"></i> Saving...');
            },
            success: function (response) {
                var jsonres = JSON.parse(response);
                if (jsonres.status == "success") {
                    iziToast.success({
                        title: jsonres.title,
                        message: jsonres.msg,
                        position: 'topRight'
                    });
                    $("#editModal").modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 800);
                } else {
                    iziToast.error({
                        title: jsonres.title,
                        message: jsonres.msg,
                        position: 'topRight'
                    });
                }
                $("#editSubmitBtn").removeAttr("disabled");
                $("#editSubmitBtn").html('Save changes');
            },
            error: function (response) {
                $("#editSubmitBtn").removeAttr("disabled");
                $("#editSubmitBtn").html('Save changes');
                iziToast.error({
                    title: 'Error',
                    message: 'Something Went Wrong',
                    position: 'topRight',
                });
            }
        });
    });
</script>