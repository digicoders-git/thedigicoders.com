<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage HR -
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
                <div class="breadcrumb-title pe-3">Manage HR</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">HR Management</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <div class="row align-items-center m-0">
                        <div class="col-sm-6">
                            <h6>Manage HR Personnel</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#hrModal"><i class="fa fa-plus"></i>&ensp;Add HR</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>HR Name</th>
                                    <th>Mobile No.</th>
                                    <th>Position</th>
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
                                                        onclick="deleteItem(<?= $data->id ?>,'ManageHR','','<?= base_url('Admin/ManageHR/Delete') ?>')"
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                    <button type="button"
                                                        onclick="EditData('<?= $data->id ?>', '<?= $data->hr_name ?>', '<?= $data->mobile ?>', '<?= $data->position ?>')"
                                                        class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editModal"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $data->hr_name; ?>
                                        </td>
                                        <td>
                                            <?= $data->mobile; ?>
                                        </td>
                                        <td>
                                            <?= $data->position; ?>
                                        </td>
                                        <td>
                                            <?= $data->created_date; ?>
                                        </td>
                                        <td>
                                            <?= $data->created_time; ?>
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



<div class="modal fade" id="hrModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add HR Personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageHR/Add" method="POST"
                    class="form" id="hr-form">
                    <div class="form-group mb-3">
                        <label for="">HR Name</label>
                        <input type="text" name="hr_name" class="form-control" required placeholder="Enter Name"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Mobile No.</label>
                        <input type="number" name="mobile" class="form-control" required placeholder="Enter Mobile No."/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Position</label>
                        <input type="text" name="position" class="form-control" placeholder="Enter Position (Optional)"/>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submitBtn" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editModalLabel">Edit HR Personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageHR/Update" method="POST"
                    class="form" id="edit-form">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group mb-3">
                        <label for="">HR Name</label>
                        <input type="text" name="hr_name" id="edit_name" class="form-control" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Mobile No.</label>
                        <input type="number" name="mobile" id="edit_mobile" class="form-control" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Position</label>
                        <input type="text" name="position" id="edit_position" class="form-control" />
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
    function EditData(id, name, mobile, position) {
        $('#edit_id').val(id);
        $('#edit_name').val(name);
        $('#edit_mobile').val(mobile);
        $('#edit_position').val(position);
    }

    $("#hr-form, #edit-form").on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var btn = form.find('button[type="submit"]');
        var originalBtnText = btn.html();
        var data = new FormData(this);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                btn.attr("disabled", true);
                btn.html('<i class="fa fa-spinner fa-spin"></i> Processing...');
            },
            success: function (response) {
                var jsonres = JSON.parse(response);
                if (jsonres.status == "success") {
                    iziToast.success({
                        title: 'Success',
                        message: jsonres.msg,
                        position: 'topRight'
                    });
                    form.closest('.modal').modal('hide');
                    setTimeout(function () {
                        window.location.reload();
                    }, 800);
                } else {
                    iziToast.error({
                        title: 'Error',
                        message: jsonres.msg,
                        position: 'topRight'
                    });
                }
                btn.removeAttr("disabled");
                btn.html(originalBtnText);
            },
            error: function (response) {
                btn.removeAttr("disabled");
                btn.html(originalBtnText);
                iziToast.error({
                    title: 'Error',
                    message: 'Something Went Wrong',
                    position: 'topRight',
                });
            }
        });
    });
</script>
