<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Student video - <?= $this->data['app_name'] ?></title>
    <?php include ('include/headerlinks.php'); ?>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php include ('include/header.php'); ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php include ('include/sidebar.php'); ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Upload Classes Videos</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i
                                        class="bx bx-home-alt"></i></a>
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
                        <div class="col-6">
                            <h6>Upload Videos</h6>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#add_assignment"><i class="fa fa-plus"></i>&ensp;Upload</button>
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
                                    <th>Link</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="https://www.youtube.com/embed/Zpuj7YA60jU?si=Owvx9q4VHG_bFzEX" class="btn btn-info"><i class="bi bi-eye"></i></a></td>
                                    <td>Farewell</td>
                                    <td><button class="btn btn-info" data-bs-target="#edit_assigngment"
                                            data-bs-toggle="modal"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
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

    <?php include ('include/jslinks.php') ?>

</body>
<!-- add  -->
<div class="modal fade" id="add_assignment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Upload Videos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageBatch/Add" enctype="multipart/form-data" method="POST"
                    class="form" id="add-event">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 d-grid">
                                <div class="form-group mb-3">
                                    <label for="batch">Upload Video(YT Link Only)</label>
                                    <input type="text" class="form-control" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Upload
                </button>
            </div>
        </div>
    </div>
</div>
<!-- edit  -->
<div class="modal fade" id="edit_assigngment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit video Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageBatch/Add" enctype="multipart/form-data" method="POST"
                    class="form" id="add-event">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 d-grid">
                                <div class="form-group mb-3">
                                    <label for="batch">Videos Link</label>
                                    <input type="text" class="form-control" />
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Upload
                </button>
            </div>
        </div>
    </div>
</div>




</html>
<script>
    $('.dropify').dropify();

    $('#summernote').summernote({
        placeholder: 'Discription..',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    $('#Code').keyup(function () {
        this.value = this.value.toUpperCase();
    });
</script>