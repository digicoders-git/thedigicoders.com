<!-- Certificate Modal -->
<div class="modal fade" id="CertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Generate Student Certificate</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/ManageCertificate/Add" enctype="multipart/form-data" method="POST"
                    id="cert-form">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="fw-bold">Reg. ID (Ref):</label>
                            <p id="disp_ref_no" class="mb-0 text-primary fw-bold"></p>
                            <input type="hidden" name="ref_no" id="cert_ref_no">
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold">Student Name:</label>
                            <p id="disp_name" class="mb-0"></p>
                            <input type="hidden" name="student_name" id="cert_name">
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold">Mobile:</label>
                            <p id="disp_mobile" class="mb-0"></p>
                            <input type="hidden" name="mobile" id="cert_mobile">
                        </div>
                        <div class="col-md-3">
                            <label class="fw-bold">Training Type:</label>
                            <p id="disp_course" class="mb-0"></p>
                            <input type="hidden" name="course" id="cert_course">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Technology</label>
                                <select name="tech" class="form-control" required>
                                    <option value="" selected disabled>Select</option>
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
                                    <option value="MERN Stack">MERN Stack</option>
                                    <option value="Full Stack Development">Full Stack Development</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label>Grade</label>
                                <select name="grade" class="form-control" required>
                                    <option value="A">A</option>
                                    <option value="A+">A+</option>
                                    <option value="A++" selected>A++</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label>Duration</label>
                                <select name="duration" class="form-control" required>
                                    <option value="" selected disabled>Select Duration</option>
                                    <option value="28 days">28 days</option>
                                    <option value="45 days">45 days</option>
                                    <option value="6 months">6 months</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label>Training Start Date</label>
                                <input type="date" name="traning_start_date" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Training End Date</label>
                                <input type="date" name="traning_end_date" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Issue Date</label>
                                <input type="date" name="cerificate_issuedate" class="form-control" required
                                    value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label>Certificate Image/PDF</label>
                        <input type="file" name="image" class="form-control dropify">
                    </div>
                    <div class="modal-footer px-0 pb-0 mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Save Certificate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openCertModal(id, name, mobile, course) {
        $('#cert_ref_no').val(id);
        $('#disp_ref_no').text(id);

        $('#cert_name').val(name);
        $('#disp_name').text(name);

        $('#cert_mobile').val(mobile);
        $('#disp_mobile').text(mobile);

        $('#cert_course').val(course);
        $('#disp_course').text(course);

        $('#CertModal').modal('show');
    }

    $(document).ready(function () {
        $("#cert-form").on('submit', function (e) {
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
                    $("#cert-form button[type='submit']").attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i> Saving...');
                },
                success: function (response) {
                    var jsonres = JSON.parse(response);
                    if (jsonres.status == "success") {
                        iziToast.success({
                            title: jsonres.title,
                            message: jsonres.msg,
                            position: 'topRight'
                        });
                        $("#CertModal").modal('hide');
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        iziToast.error({
                            title: jsonres.title,
                            message: jsonres.msg,
                            position: 'topRight'
                        });
                        $("#cert-form button[type='submit']").removeAttr("disabled").html('Save Certificate');
                    }
                },
                error: function () {
                    $("#cert-form button[type='submit']").removeAttr("disabled").html('Save Certificate');
                    iziToast.error({
                        title: 'Error',
                        message: 'Something Went Wrong',
                        position: 'topRight',
                    });
                }
            });
        });
    });
</script>