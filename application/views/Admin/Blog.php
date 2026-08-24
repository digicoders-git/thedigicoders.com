<!DOCTYPE html>
<html lang="en">

<head>
    <title> Blog- <?= $this->data['app_name'] ?></title>
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
                <div class="breadcrumb-title pe-3"> Blog List</div>
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
                        <div class="col-6">
                            <h6>Manage Blog</h6>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#faqModal"><i class="fa fa-plus"></i>&ensp;Add Blog</button>
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
                                    <th>Views</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Location</th>
                                    <th>URL</th>
                                    <th>Meta Description</th>
                                    <th>Keywords</th>
                                    <th>Content</th>
                                    <th>FAQs</th>
                                    <th>Photo</th>
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
                                                    <button type="button" onclick="deleteItem(<?= $data->id ?>,'blog','<?= $data->img ?>','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    <button type="button" onclick="EditData('blog',<?= $data->id ?>,'Edit Blog')" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-start gap-1">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,'<?= $data->status ?>','blog','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked<?= $data->id ?>" <?php if ($data->status == 'true') { echo "checked"; } ?>>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked<?= $data->id ?>"></label>
                                                </div>
                                                <?php if ($data->status == 'true'): ?>
                                                    <button type="button" onclick="ChnageStatus(<?= $data->id ?>,'<?= $data->status ?>','blog','<?= base_url('Admin/ChangeStatus') ?>')" class="btn btn-sm btn-success px-2 py-1 shadow-sm border-0" style="font-size: 0.75rem; border-radius: 12px; font-weight: 600;" title="Click to change status to Draft">
                                                        <i class="bi bi-check-circle-fill me-1"></i> Published
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" onclick="ChnageStatus(<?= $data->id ?>,'<?= $data->status ?>','blog','<?= base_url('Admin/ChangeStatus') ?>')" class="btn btn-sm btn-warning text-dark px-2 py-1 shadow-sm border-0" style="font-size: 0.75rem; border-radius: 12px; font-weight: 600;" title="Click to Publish blog">
                                                        <i class="bi bi-pencil-square me-1"></i> Draft
                                                    </button>
                                                <?php endif; ?>
                                            </div>

                                        </td>
                                        <td>
                                            <button type="button" onclick="showBlogIPModal(<?= $data->id ?>, '<?= htmlspecialchars(addslashes($data->title), ENT_QUOTES, 'UTF-8') ?>')" class="btn btn-sm btn-outline-success px-2 py-1 shadow-sm d-inline-flex align-items-center" style="border-radius: 12px; font-weight: 600; font-size: 0.8rem;" title="Click to view IP addresses for this blog">
                                                <i class="bi bi-eye-fill me-1"></i> <?= number_format(isset($data->views_count) ? $data->views_count : 0) ?> Views
                                            </button>
                                        </td>
                                        <td>
                                            <strong><?= htmlspecialchars($data->title, ENT_QUOTES, 'UTF-8'); ?></strong>
                                            <?php if (!empty($data->meta_title)): ?>
                                                <br><small class="text-muted">SEO Title: <?= htmlspecialchars($data->meta_title, ENT_QUOTES, 'UTF-8') ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <small>
                                                <strong><?= !empty($data->author_name) ? htmlspecialchars($data->author_name, ENT_QUOTES, 'UTF-8') : 'DigiCoders Team' ?></strong><br>
                                                <span class="text-muted"><?= !empty($data->author_designation) ? htmlspecialchars($data->author_designation, ENT_QUOTES, 'UTF-8') : 'Tech Expert' ?></span>
                                            </small>
                                        </td>
                                        <td><?= !empty($data->location) ? ucwords($data->location) : '<span class="text-muted">None</span>'; ?></td>
                                        <td><?= $data->url; ?></td>
                                        <td><?= $data->meta_description; ?></td>
                                        <td><?= !empty($data->keywords) ? htmlspecialchars($data->keywords, ENT_QUOTES, 'UTF-8') : '<span class="text-muted">None</span>'; ?></td>
                                        <td><?= $data->content; ?></td>
                                        <td>
                                            <?php
                                            $faqs = array();
                                            if (!empty($data->faqs)) {
                                                $faqs = json_decode($data->faqs, true);
                                            }
                                            if (!empty($faqs)) {
                                                ?>
                                                <button type="button" class="btn btn-sm btn-info text-white" data-bs-toggle="collapse" data-bs-target="#blogFaqList<?= $data->id ?>">
                                                    View (<?= count($faqs) ?>)
                                                </button>
                                                <div id="blogFaqList<?= $data->id ?>" class="collapse mt-2 text-start" style="min-width: 200px; max-height: 150px; overflow-y: auto; font-size: 0.85rem;">
                                                    <?php foreach ($faqs as $faq): ?>
                                                        <div class="border-bottom pb-1 mb-1">
                                                            <strong>Q:</strong> <?= htmlspecialchars($faq['question'], ENT_QUOTES, 'UTF-8') ?><br>
                                                            <strong>A:</strong> <?= htmlspecialchars($faq['answer'], ENT_QUOTES, 'UTF-8') ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <?php
                                            } else {
                                                echo '<span class="text-muted">None</span>';
                                            }
                                            ?>
                                        </td>
                                        <td><img height="50px" width="50px" src="<?= base_url('public/uploads/blog/') . $data->img; ?>"/></td>
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



<div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/Blog/Add" enctype="multipart/form-data" class="form" method="POST" id="faq">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="fw-bold">Title (H1)</label>
                            <input type="text" name="title" id="blog_title" class="form-control" required/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="fw-bold">URL (Slug)</label>
                            <input type="text" name="url" id="blog_url" class="form-control" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="fw-bold text-success">Publish Status</label>
                            <select name="status" class="form-control">
                                <option value="true">Publish Immediately</option>
                                <option value="false">Save as Draft</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="fw-bold">Select Location</label>
                            <select name="location" class="form-control">
                                <option value="">Select Location</option>
                                <option value="lucknow">Lucknow</option>
                                <option value="kanpur">Kanpur</option>
                                <option value="gorakhpur">Gorakhpur</option>
                                <option value="bestsummertraining">Best Summer Training</option>
                                <option value="digitaldaur">Digital Daur</option>
                                <option value="digicoderstechnologies">Digicoders Technologies</option>
                                <option value="digitalcoders">Digital Coders</option>
                                <option value="softwarecompanyinlucknow">Software Company In Lucknow</option>
                            </select>
                        </div>
                    </div>

                    <!-- SEO Fields Card -->
                    <div class="card mb-3 border border-primary">
                        <div class="card-header bg-light text-primary fw-bold">
                            <i class="bi bi-search"></i> Advanced SEO Settings
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="fw-bold">Meta Title (SEO Title)</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="Leave empty to use main blog title" />
                                <small class="text-muted">Recommended: 50-60 characters for best Google SERP CTR</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="fw-bold">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" placeholder="Compelling 150-160 character description"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Author Name (E-E-A-T)</label>
                                    <input type="text" name="author_name" class="form-control" value="DigiCoders Team" placeholder="Author Full Name" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Author Designation / Role</label>
                                    <input type="text" name="author_designation" class="form-control" value="Tech Expert" placeholder="e.g. Senior Software Engineer" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Image Alt Text (Image SEO)</label>
                                    <input type="text" name="img_alt" class="form-control" placeholder="Descriptive Alt text for image" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Canonical URL (Optional)</label>
                                    <input type="url" name="canonical_url" class="form-control" placeholder="https://example.com/original-post" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="fw-bold">Keywords</label>
                                <input type="text" id="add_blog_keyword_input" class="form-control" placeholder="e.g. PHP training (Press Enter)" />
                                <div id="add_blog_chips_container" class="mt-2 d-flex flex-wrap gap-2"></div>
                                <input type="hidden" name="keywords" id="add_blog_keywords_hidden" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="fw-bold">Featured Image</label>
                        <input type="file" name="img" class="form-control" required/>
                    </div>
                    

                    <div class="form-group mb-3">
                        <label for="" class="fw-bold">Content</label>
                        <textarea name="content" id="message" cols="30" rows="5" class="form-control summernote" required></textarea>
                    </div>

                    <!-- Blog FAQs Section -->
                    <div class="card mb-3 border">
                        <div class="card-header bg-light">
                            <h6 class="mb-0">Blog FAQs</h6>
                        </div>
                        <div class="card-body">
                            <div id="add-faq-list">
                                <div class="faq-row mb-3 pb-3 border-bottom">
                                    <div class="mb-2">
                                        <label class="form-label font-weight-bold">Question</label>
                                        <input type="text" name="faq_questions[]" class="form-control" placeholder="e.g. What is PHP?" />
                                    </div>
                                    <div>
                                        <label class="form-label font-weight-bold">Answer</label>
                                        <textarea name="faq_answers[]" class="form-control" rows="2" placeholder="e.g. PHP is a scripting language."></textarea>
                                    </div>
                                    <div class="text-end mt-2">
                                        <button type="button" class="btn btn-danger btn-sm remove-faq-btn" style="display: none;">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" id="add-faq-row-btn"><i class="fa fa-plus"></i> Add FAQ</button>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

</html>
<script>
    $('.dropify').dropify();
    $('.summernote').summernote({
        placeholder: 'Write Here ...',
        tabsize: 2,
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
</script>
<script>
    function generateSlug(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }

    function initializeTagsInput(inputId, containerId, hiddenId) {
        const $input = $('#' + inputId);
        const $container = $('#' + containerId);
        const $hidden = $('#' + hiddenId);
        
        let tags = [];
        
        if ($hidden.val()) {
            tags = $hidden.val().split(',').map(t => t.trim()).filter(t => t.length > 0);
            renderTags();
        }
        
        function renderTags() {
            $container.empty();
            tags.forEach((tag, idx) => {
                const $chip = $(`
                    <span class="badge bg-light text-dark border d-inline-flex align-items-center px-3 py-2 me-2 mb-2" style="font-size: 0.85rem; font-weight: 500; border-radius: 10px; border-color: #dee2e6 !important; box-shadow: 0 2px 4px rgba(0,0,0,0.02); height: 32px;">
                        ${tag}
                        <span class="remove-tag-btn ms-2 d-inline-flex align-items-center justify-content-center" data-index="${idx}" style="cursor: pointer; width: 18px; height: 18px; border-radius: 50%; background: #e9ecef; color: #495057; font-size: 10px; font-weight: bold;">
                            <i class="fa fa-times"></i>
                        </span>
                    </span>
                `);
                $container.append($chip);
            });
            $hidden.val(tags.join(', '));
        }
        
        $input.on('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTag();
            }
        });
        
        $input.on('blur', function() {
            addTag();
        });
        
        function addTag() {
            const val = $input.val().trim();
            if (val) {
                const splitVals = val.split(',').map(t => t.trim()).filter(t => t.length > 0);
                splitVals.forEach(v => {
                    if (!tags.includes(v)) {
                        tags.push(v);
                    }
                });
                $input.val('');
                renderTags();
            }
        }
        
        $container.on('click', '.remove-tag-btn', function() {
            const idx = $(this).data('index');
            tags.splice(idx, 1);
            renderTags();
        });
    }

    $(document).ready(function() {
        // Initialize Add Blog tags input
        initializeTagsInput('add_blog_keyword_input', 'add_blog_chips_container', 'add_blog_keywords_hidden');

        $('#blog_title').on('keyup', function() {
            var title = $(this).val();
            $('#blog_url').val(generateSlug(title));
        });

        // Add FAQ Row logic
        $('#add-faq-row-btn').on('click', function() {
            var newRow = `
                <div class="faq-row mb-3 pb-3 border-bottom">
                    <div class="mb-2">
                        <label class="form-label font-weight-bold">Question</label>
                        <input type="text" name="faq_questions[]" class="form-control" placeholder="e.g. What is PHP?" />
                    </div>
                    <div>
                        <label class="form-label font-weight-bold">Answer</label>
                        <textarea name="faq_answers[]" class="form-control" rows="2" placeholder="e.g. PHP is a scripting language."></textarea>
                    </div>
                    <div class="text-end mt-2">
                        <button type="button" class="btn btn-danger btn-sm remove-faq-btn">Remove</button>
                    </div>
                </div>
            `;
            $('#add-faq-list').append(newRow);
            toggleRemoveButtons();
        });

        // Remove FAQ Row logic
        $(document).on('click', '.remove-faq-btn', function() {
            $(this).closest('.faq-row').remove();
            toggleRemoveButtons();
        });

        function toggleRemoveButtons() {
            var rows = $('#add-faq-list .faq-row');
            if (rows.length <= 1) {
                rows.find('.remove-faq-btn').hide();
            } else {
                rows.find('.remove-faq-btn').show();
            }
        }
        toggleRemoveButtons();
    });

    function showBlogIPModal(blogId, blogTitle) {
        $('#modalBlogTitleText').text(blogTitle);
        $('#blogIPTableBody').html('<tr><td colspan="3" class="text-center text-muted py-3"><i class="fa fa-spinner fa-spin me-1"></i> Loading view logs...</td></tr>');
        
        var ipModal = new bootstrap.Modal(document.getElementById('blogIPModal'));
        ipModal.show();

        var formData = new FormData();
        formData.append('blog_id', blogId);

        fetch('<?= base_url("Admin/getBlogViewsDetails") ?>', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success' && data.views && data.views.length > 0) {
                var html = '';
                data.views.forEach(function(v, idx) {
                    html += '<tr>' +
                        '<td>' + (idx + 1) + '</td>' +
                        '<td><span class="badge bg-light text-dark border font-monospace px-2 py-1" style="font-size: 0.85rem;"><i class="bi bi-pc-display me-1 text-primary"></i>' + v.ip_address + '</span></td>' +
                        '<td><small class="text-muted"><i class="bi bi-clock me-1"></i>' + v.created_at + '</small></td>' +
                    '</tr>';
                });
                $('#blogIPTableBody').html(html);
            } else {
                $('#blogIPTableBody').html('<tr><td colspan="3" class="text-center text-muted py-3">No views recorded yet for this blog.</td></tr>');
            }
        })
        .catch(err => {
            $('#blogIPTableBody').html('<tr><td colspan="3" class="text-center text-danger py-3">Error loading IP view details.</td></tr>');
        });
    }
</script>

<!-- Modal for Viewing Blog IP Address Logs -->
<div class="modal fade" id="blogIPModal" tabindex="-1" aria-labelledby="blogIPModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="blogIPModalLabel"><i class="bi bi-geo-alt-fill me-2"></i> Blog Unique IP View Logs</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3 p-3 bg-light rounded border border-primary-subtle">
                    <span class="text-muted small d-block">Blog Post Title:</span>
                    <h6 id="modalBlogTitleText" class="text-dark font-weight-bold mb-0"></h6>
                </div>
                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th>IP Address</th>
                                <th>View Timestamp</th>
                            </tr>
                        </thead>
                        <tbody id="blogIPTableBody">
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">Loading...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>