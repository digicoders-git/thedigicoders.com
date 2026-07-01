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
                                    <th>Display Status</th>
                                    <th>Title</th>
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
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'blog','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->status == 'true')
                                                                                                                                                                                                                                                 {
                                                                                                                                                                                                                                                     echo "checked";
                                                                                                                                                                                                                                                 } ?>>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>

                                        </td>
                                        <td><?= $data->title; ?></td>
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
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/Blog/Add" enctype="multipart/form-data" class="form" method="POST" id="faq">

                    <div class="form-group mb-3">
                        <label for="">Title</label>
						<input type="text" name="title" id="blog_title" class="form-control" required/>
                    </div>
					<div class="form-group mb-3">
						<label for="">URL (Slug)</label>
						<input type="text" name="url" id="blog_url" class="form-control" required/>
					</div>
					<div class="form-group mb-3">
						<label for="">Select Location</label>
						<select name="location" class="form-control">
							<option value="">Select Location</option>
							<option value="lucknow">Lucknow</option>
							<option value="kanpur">Kanpur</option>
							<option value="gorakhpur">Gorakhpur</option>
						</select>
					</div>
					<div class="form-group mb-3">
						<label for="">Meta Description</label>
						<textarea name="meta_description" class="form-control" rows="3"></textarea>
					</div>
					<div class="form-group mb-3">
						<label for="">Keywords</label>
						<input type="text" id="add_blog_keyword_input" class="form-control" placeholder="e.g. PHP training (Press Enter)" />
						<div id="add_blog_chips_container" class="mt-2 d-flex flex-wrap gap-2"></div>
						<input type="hidden" name="keywords" id="add_blog_keywords_hidden" value="" />
					</div>
					<div class="form-group mb-3">
                        <label for="">Image</label>
						<input type="file" name="img" class="form-control" required/>
                    </div>
					

                    <div class="form-group mb-3">
                        <label for="">Content</label>
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
</script>