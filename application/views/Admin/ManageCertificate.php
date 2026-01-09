<!DOCTYPE html>
<html lang="en">

<head>
    <title>Certificate List - <?= $this->data['app_name'] ?></title>
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
                <div class="breadcrumb-title pe-3">All Certificate List</div>
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
                        <div class="row">
                            <div class="col-sm-6 col-6">
                                <h6>Manage Certificate List</h6>
                            </div>
                            <div class="col-sm-6 col-6">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#CertificateModal"><i class="fa fa-plus"></i>&ensp;Add Certificate</button>
                                </div>
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
                                    <th>Reference No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Course</th>
                                    <th>Technology</th>
                                    <th>Grade</th>
                                    <th>duration</th>
                                    <th>Image</th>
                                    <th>Training Start_date</th>
                                    <th>Training End Date</th>
                                    <th>Certificate Issue Date</th>
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
                                                    <button type="button" onclick="deleteItem(<?= $data->id ?>,'certificate','<?= $data->image ?>','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    <!-- <button type="button" onclick="EditData('certificate',<?= $data->id ?>,'Edit Certificate')" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button> -->
                                                    <button class="btn btn-success me-md-2" onclick="editData(<?= $data->id; ?>)"><i class="bi bi-pencil-square"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'certificate','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->status == 'true')
                                                                                                                                                                                                                                                    {
                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>
                                        </td>
                                        <td><?= $data->refrence_no; ?></td>
                                        <td><?= $data->name; ?></td>
                                        <td><?= $data->mobile; ?></td>
                                        <td><?= $data->course; ?></td>
                                        <td><?= $data->technology; ?></td>
                                        <td><?= $data->grade; ?></td>
                                        <td><?= $data->duration; ?></td>
                                        <td> <a href="<?= base_url('public/uploads/certificate/') . $data->image; ?>"> <img src="<?= base_url('public/uploads/certificate/') . $data->image; ?>" alt="" style="height: 150px;"></a></td>
                                        <td><?= $data->training_start_date; ?></td>
                                        <td><?= $data->training_end_date; ?></td>
                                        <td><?= $data->certificate_issue_date; ?></td>

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


<!-- insert Modal -->
<div class="modal fade" id="CertificateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageCertificate/Add" enctype="multipart/form-data" method="POST" class="form" id="add-certificate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-2">
                                <label for="">Reference No.</label>
                                <input type="text" name="ref_no" class="form-control" placeholder="Reference No." required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Mobile No.</label>
                                <input type="number" name="mobile" class="form-control" placeholder="Mobile No." required minlength="10">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Technology</label>
                                <select name="tech" id="" class="form-control" required>
                                    <option selected disabled>Select</option>
                                    <option value="PHP">PHP</option>
                                    <option value="Android">Android</option>
                                    <option value="ASP.NET">ASP.NET</option>
                                    <option value="JAVA">JAVA</option>
                                    <option value="Python">Python</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Advance PHP">Advance PHP</option>
                                    <option value="Advance Android">Advance Android</option>
                                    <option value="Advance ASP.NET">Advance ASP.NET</option>
                                    <option value="Advance JAVA">Advance JAVA</option>
                                    <option value="Advance Python">Advance Python</option>
                                    <option value="Advance Digital Marketing">Advance Digital Marketing</option>
                                    <option value="Not Yet Decided">Not Yet Decided</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Grade</label>
                                <select name="grade" id="" class="form-control" required>
                                    <option selected disabled>Select</option>
                                    <option value="A">A</option>
                                    <option value="A+">A+</option>
                                    <option value="A++">A++</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Training End Date</label>
                                <input type="date" name="traning_end_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-2">
                                <label for="">Student Name</label>
                                <input type="text" name="student_name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Course</label>
                                <select name="course" id="" class="form-control" required>
                                    <option selected disabled>Select</option>
                                    <option value="Vocational Training">Vocational Training</option>
                                    <option value="Summer Training">Summer Training</option>
                                    <option value="Winter Training">Winter Training</option>
                                    <option value="Industrial Training">Industrial Training</option>
                                    <option value="Apprenticeship Training">Apprenticeship Training</option>
                                    <option value="Internship Training">Internship Training</option>
                                    <option value="Project Training">Project Training</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Duration</label>
                                <select name="duration" id="" class="form-control">
                                    <option value="">select</option>
                                    <option value="30 Days">30 Days</option>
                                    <option value="45 Days">45 Days</option>
                                    <option value="60 Days">60 Days</option>
                                    <option value="90 Days">90 Days</option>
                                    <option value="180 Days">180 Days</option>
                                </select>

                            </div>
                            <div class="form-group mb-2">
                                <label for="">Training Start Date</label>
                                <input type="date" name="traning_start_date" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for=""> Date of Issue Certificate</label>
                                <input type="date" name="cerificate_issuedate" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <input type="file" id="input-file-now" name="image" class="dropify" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->

<div class="modal fade" id="UpdateCertificateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageCertificate/Update" enctype="multipart/form-data" method="POST" class="form" id="update-certificate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-2">
                                <label for="">Reference No.</label>
                                <input type="hidden" name="id" id="id1" class="form-control" placeholder="Reference No." required>
                                <input type="text" name="ref_no" id="ref_no" class="form-control" placeholder="Reference No." required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Mobile No.</label>
                                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile No." required minlength="10">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Technology</label>
                                <select name="tech" id="tech" class="form-control" required>
                                    <option selected disabled>Select</option>
                                    <option value="PHP">PHP</option>
                                    <option value="Android">Android</option>
                                    <option value="ASP.NET">ASP.NET</option>
                                    <option value="JAVA">JAVA</option>
                                    <option value="Python">Python</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Advance PHP">Advance PHP</option>
                                    <option value="Advance Android">Advance Android</option>
                                    <option value="Advance ASP.NET">Advance ASP.NET</option>
                                    <option value="Advance JAVA">Advance JAVA</option>
                                    <option value="Advance Python">Advance Python</option>
                                    <option value="Advance Digital Marketing">Advance Digital Marketing</option>
                                    <option value="Not Yet Decided">Not Yet Decided</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Grade</label>
                                <select name="grade" id="grade" class="form-control" required>
                                    <option selected disabled>Select</option>
                                    <option value="A">A</option>
                                    <option value="A+">A+</option>
                                    <option value="A++">A++</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Training End Date</label>
                                <input type="date" name="traning_end_date" id="traning_end_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-2">
                                <label for="">Student Name</label>
                                <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Course</label>
                                <select name="course" id="course" class="form-control" required>
                                    <option selected disabled>Select</option>
                                    <option value="Vocational Training">Vocational Training</option>
                                    <option value="Summer Training">Summer Training</option>
                                    <option value="Winter Training">Winter Training</option>
                                    <option value="Industrial Training">Industrial Training</option>
                                    <option value="Apprenticeship Training">Apprenticeship Training</option>
                                    <option value="Internship Training">Internship Training</option>
                                    <option value="Project Training">Project Training</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Duration</label>
                                <select name="duration" id="duration" class="form-control">
                                    <option value="">select</option>
                                    <option value="30 Days">30 Days</option>
                                    <option value="45 Days">45 Days</option>
                                    <option value="60 Days">60 Days</option>
                                    <option value="90 Days">90 Days</option>
                                    <option value="180 Days">180 Days</option>
                                </select>

                            </div>
                            <div class="form-group mb-2">
                                <label for="">Training Start Date</label>
                                <input type="date" name="traning_start_date" id="traning_start_date" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for=""> Date of Issue Certificate</label>
                                <input type="date" name="cerificate_issuedate" id="certificate_issue_date" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <input type="file" id="input-file-now" name="image" data-default-file="" class="dropify" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

</html>
<script>
    $('.dropify').dropify();

    function editData(id) {
        var id = id;
        // var url = $(this).attr('action');
        $("#UpdateCertificateModal").modal('show');
        $.ajax({
            url: '<?= base_url() ?>Admin/ManageCertificate/Edit/' + id,
            type: "POST",
            success: function(response) {

                var jsonres = JSON.parse(response);
                console.log(jsonres);

                $("#id1").val(jsonres.id);
                $("#ref_no").val(jsonres.refrence_no);
                $("#mobile").val(jsonres.mobile);
                $("#tech").val(jsonres.technology);
                $("#grade").val(jsonres.grade);
                $("#traning_end_date").val(jsonres.training_end_date);
                $("#traning_start_date").val(jsonres.training_start_date);
                $("#student_name").val(jsonres.student_name);
                $("#course").val(jsonres.course);
                $("#certificate_issue_date").val(jsonres.certificate_issue_date);
                $("#duration").val(jsonres.duration);


            },
            error: function(response) {
                alert(response);
            }

        })
    }
</script>