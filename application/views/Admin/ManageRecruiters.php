<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Recruiters - <?= $this->data['app_name'] ?></title>
    <?php include('include/headerlinks.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>

        <main class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Recruiters List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Recruiters</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-header py-3">
                    <div class="row align-items-center m-0">
                        <div class="col-sm-6">
                            <h6>Manage Recruiters</h6>
                        </div>
                        <div class="col-sm-6 text-end">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#recruiterModal">
                                <i class="bi bi-plus-lg"></i> Add Recruiter
                            </button>
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
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($userdata as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                    onclick="deleteItem(<?= $data->id ?>,'tbl_recruiters','<?= $data->logo ?>','<?= base_url('Admin/deleteWithFilename') ?>')"
                                                    class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                                <button
                                                    onclick="EditData('tbl_recruiters', <?= $data->id ?>, 'Edit Recruiter')"
                                                    type="button" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'tbl_recruiters','<?= base_url('Admin/ChangeStatus') ?>')"
                                                    id="flexSwitchCheckChecked<?= $data->id ?>" <?php if ($data->status == 1) { echo "checked"; } ?>>
                                            </div>
                                        </td>
                                        <td> 
                                            <img src="<?= base_url('public/uploads/recruiters/') . $data->logo; ?>"
                                                alt="<?= $data->name ?>" style="height: 50px; background: #f8fafc; padding: 5px; border-radius: 5px;" /> 
                                        </td>
                                        <td><?= $data->name; ?></td>
                                        <td><?= $data->created_at; ?></td>
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

        <div class="overlay nav-toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>

    <?php include('include/jslinks.php') ?>

    <!-- Modal -->
    <div class="modal fade" id="recruiterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Add Recruiter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>Admin/ManageRecruiters/Add" enctype="multipart/form-data" method="POST" id="recruiter-form">
                        <div class="form-group mb-3">
                            <label class="form-label">Recruiter Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Recruiter Name" required />
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Logo Image</label>
                            <input type="file" name="image" class="dropify" required />
                            <small class="text-muted">Recommended: Transparent PNG (approx. 200x100px)</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Recruiter</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('.dropify').dropify();
        
        $("#recruiter-form").on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var obj = JSON.parse(data);
                    if (obj.status == 'success') {
                        location.reload();
                    } else {
                        alert(obj.msg);
                    }
                }
            });
        });
    </script>
</body>
</html>
