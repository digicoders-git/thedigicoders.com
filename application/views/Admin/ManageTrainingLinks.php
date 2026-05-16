<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Training Links - <?= $this->data['app_name'] ?></title>
    <?php include('include/headerlinks.php'); ?>
</head>

<body>

    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>

        <main class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Training Links</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Training Links</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-header py-3">
                    <div class="row align-items-center m-0">
                        <div class="col-sm-6">
                            <h6>Manage Training Links (Footer SEO)</h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#TrainingLinkModal" onclick="resetForm()">
                                    <i class="fa fa-plus"></i>&ensp;Add New Link
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
                                    <th>Status</th>
                                    <th>Training Name</th>
                                    <th>Title</th>
                                    <th>Section Type</th>
                                    <th>URL Slug</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sr = 1; if (!empty($training_links)): foreach ($training_links as $row): ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" onclick="editLink(<?= $row->id ?>)" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" onclick="delData(<?= $row->id ?>,'tbl_seo_training_links','<?= base_url('Admin/DeleteTrainingLink') ?>')" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $row->id ?>, '<?= $row->status ?>', 'tbl_seo_training_links', '<?= base_url('Admin/ChangeStatus') ?>')" <?= ($row->status == 'true') ? 'checked' : '' ?>>
                                            </div>
                                        </td>
                                        <td><?= $row->training_name ?></td>
                                        <td><?= $row->title ?></td>
                                        <td><span class="badge bg-info"><?= ucfirst($row->section_type) ?></span></td>
                                        <td><?= $row->url_slug ?></td>
                                        <td><?= date('d-m-Y', strtotime($row->created_at)) ?></td>
                                    </tr>
                                <?php endforeach; else: ?>
                                    <tr><td colspan="7" class="text-center">No data found</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="TrainingLinkModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add Training Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="trainingForm" action="<?= base_url('Admin/AddTrainingLink') ?>" method="POST">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="id" id="link_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Training Name (Display Title) *</label>
                                <input type="text" name="training_name" id="training_name" class="form-control" required placeholder="e.g. Python Training">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">URL Slug (Leave blank for auto)</label>
                                <input type="text" name="url_slug" id="url_slug" class="form-control" placeholder="e.g. python-training-lucknow">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Page Title (SEO) *</label>
                                <input type="text" name="title" id="title" class="form-control" required placeholder="Enter SEO Page Title">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Section Type (Footer Column) *</label>
                                <select name="section_type" id="section_type" class="form-select" required>
                                    <option value="popular">Popular Training Programs</option>
                                    <option value="more">More Training Links</option>
                                    <option value="advanced">Advanced Training Programs</option>
                                    <option value="top">Top Courses</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">About Course (Short Info)</label>
                            <textarea name="about_course" id="about_course" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description (P Tag Content)</label>
                            <textarea name="description" id="description" class="form-control summernote" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('include/jslinks.php') ?>

    <script>
        function resetForm() {
            $('#trainingForm')[0].reset();
            $('#link_id').val('');
            $('#modalTitle').text('Add Training Link');
            $('#trainingForm').attr('action', '<?= base_url('Admin/AddTrainingLink') ?>');
            $('.summernote').summernote('code', '');
        }

        function editLink(id) {
            $.ajax({
                url: '<?= base_url('Admin/GetTrainingLinkData') ?>',
                type: 'POST',
                data: { id: id, '<?= $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>' },
                dataType: 'json',
                success: function(data) {
                    $('#link_id').val(data.id);
                    $('#training_name').val(data.training_name);
                    $('#url_slug').val(data.url_slug);
                    $('#title').val(data.title);
                    $('#section_type').val(data.section_type);
                    $('#about_course').val(data.about_course);
                    $('#description').summernote('code', data.description);
                    
                    $('#modalTitle').text('Edit Training Link');
                    $('#trainingForm').attr('action', '<?= base_url('Admin/UpdateTrainingLink') ?>');
                    $('#TrainingLinkModal').modal('show');
                }
            });
        }

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            uploadSummernoteImage(files[i], this);
                        }
                    }
                },
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
        });
    </script>
</body>
</html>
