<!DOCTYPE html>
<html lang="en" class="semi-dark">

<head>
    <title>Course/City Pages - <?= $this->data['app_name'] ?></title>
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
                <div class="breadcrumb-title pe-3">SEO Page</div>
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
                        <div class="col-sm-6">
                            <h6>Manage Course/City Pages</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <!-- New City Button -->
                                <button class="btn btn-info me-md-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#AddCityModal">
                                    <i class="fa fa-plus"></i>&ensp;Add New City
                                </button>
                                <!-- Existing Page Button -->
                                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#CourseCityModal">
                                    <i class="fa fa-plus"></i>&ensp;Add New Page
                                </button>
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
                                    <th>Display Status</th>
                                    <th>Course Name</th>
                                    <th>City Name</th>
                                    <th>URL</th>
                                    <th>Title</th>
                                    <th>H1 Heading</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                if (!empty($userdata)) {
                                    foreach ($userdata as $data) {
                                        ?>
                                        <tr>
                                            <td><?= $sr++ ?></td>
                                            <td>
                                                <div class="col">
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            onclick="delData(<?= $data->id ?>,'seo_pages','<?= base_url('Admin/deletepage') ?>')"
                                                            class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        <button type="button"
                                                            onclick="EditData('seo_pages',<?= $data->id ?>,'Edit Page')"
                                                            class="btn btn-primary">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'seo_pages','<?= base_url('Admin/ChangeStatus') ?>')"
                                                        id="flexSwitchCheckChecked<?= $data->id ?>" <?php if ($data->status == 'true') {
                                                              echo "checked";
                                                          } ?>>
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked<?= $data->id ?>"></label>
                                                </div>
                                            </td>
                                            <td><?= $data->course_name ?></td>
                                            <td><?= $data->city_name ?></td>
                                            <td><?= $data->url_slug ?></td>
                                            <td><?= $data->title ?></td>
                                            <td><?= $data->heading ?></td>
                                            <td><?= date('d-m-Y', strtotime($data->date)) ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="9" class="text-center">No data found</td>
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

    <!-- Add City Modal -->
    <div class="modal fade" id="AddCityModal" tabindex="-1" aria-labelledby="addCityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="addCityModalLabel">Add New City</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="<?= base_url() ?>Admin/addcity" method="POST" id="add-city-form">
                    <div class="modal-body">
                        <?php
                        $csrf = array(
                            'name' => $this->security->get_csrf_token_name(),
                            'hash' => $this->security->get_csrf_hash()
                        );
                        ?>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <div class="mb-3">
                            <label for="new_state_name" class="form-label">State Name *</label>
                            <input type="text" class="form-control" id="new_state_name" name="state_name"
                                placeholder="Enter State Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_city_name" class="form-label">City Name *</label>
                            <input type="text" class="form-control" id="new_city_name" name="city_name"
                                placeholder="Enter City Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="city_status" class="form-label">Status</label>
                            <select class="form-select" id="city_status" name="status" required>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info text-white">Save City</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Course/City Page Modal (Updated with City Dropdown) -->
    <div class="modal fade" id="CourseCityModal" tabindex="-1" aria-labelledby="courseCityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="courseCityModalLabel">Add Course/City Page</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="<?= base_url() ?>Admin/addpage" method="POST" id="course-city-form">
                    <div class="modal-body">
                        <?php
                        $csrf = array(
                            'name' => $this->security->get_csrf_token_name(),
                            'hash' => $this->security->get_csrf_hash()
                        );
                        ?>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="course_name" class="form-label">Course Name *</label>
                                <input type="text" class="form-control" id="course_name" name="course_name"
                                    placeholder="Enter Course Name" required>
                            </div>
                             <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                <select id="state" class="form-select" name="state_name" required>
                                    <option value="">--Select State --</option>
                                    <?php foreach ($states as $row): ?>
                                        <option value="<?= $row->state_name ?>">
                                            <?= $row->state_name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                           <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city_id" class="form-label">City *</label>
                                <select class="form-select" id="city" name="city_name" required>
                                    <option value="">Select City</option>
                                  
                                </select>
                            </div>
                              <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter Title" required>
                            </div>

                           </div>
                          

                        <div class="mb-3">
                                <label for="heading" class="form-label">Heading</label>
                                <input type="text" class="form-control" id="heading" name="heading"
                                    placeholder="Enter Heading" required>
                            </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="4"
                                placeholder="Enter Content" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3"
                                placeholder="Enter Meta Description" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="keywords" class="form-label">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords"
                                placeholder="Enter Keywords (comma separated)" required>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    $(document).ready(function () {

        // Dropify
        if ($('.dropify').length) {
            $('.dropify').dropify();
        }

        // State → City dropdown
        $('#state').on('change', function () {
            var state_name = $(this).val();

            if (state_name !== '') {
                $.ajax({
                    url: "<?= base_url('Admin/getCitiesByState') ?>",
                    type: "POST",
                    data: {
                        state_name: state_name,
                        <?= $this->security->get_csrf_token_name(); ?>:
                            "<?= $this->security->get_csrf_hash(); ?>"
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(response, function (i, item) {
                            $('#city').append(
                                '<option value="' + item.city_name + '">' + item.city_name + '</option>'
                            );
                        });
                    },
                    error: function () {
                        alert('City load error');
                    }
                });
            } else {
                $('#city').html('<option value="">Select City</option>');
            }
        });

    });
    // Submit add city form via AJAX
    $('#add-city-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#AddCityModal').modal('hide');
                    $('#add-city-form')[0].reset();
                    alert('City added successfully!');
                } else {
                    alert(response.message || 'Error adding city');
                }
            }
            ,
            error: function () {
                alert('Server error occurred');
            }
        });
    }); // When city modal is closed, reset form 
    $('#AddCityModal').on('hidden.bs.modal',
        function () {
            $('#add-city-form')[0].reset();
        });
</script>