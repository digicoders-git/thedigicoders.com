<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('include/headerlinks.php'); ?>
    <title>Manage Gallery Categories | Admin</title>
    <style>
        .table td, .table th { vertical-align: middle !important; }
        .badge { font-size: 0.85rem; padding: 0.5em 0.8em; }
        .btn-group-sm > .btn, .btn-sm { padding: 0.25rem 0.5rem; }
        .slug-code { background: #f8f9fa; padding: 2px 5px; border-radius: 3px; font-family: monospace; color: #e83e8c; }
        .action-btns { white-space: nowrap; }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include('include/header.php'); ?>
    <?php include('include/sidebar.php'); ?>

    <div class="content-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center m-0">
                        <div class="col-sm-6">
                            <h6>Manage Gallery Categories</h6>
                        </div>
                        <div class="col-sm-6 text-end">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                <i class="fa fa-plus"></i>&ensp;Add Category
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thumbnail</th>
                                    <th>Category Name</th>
                                    <th>URL Slug</th>
                                    <th>H1 Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $i => $cat): ?>
                                <tr>
                                    <td><?= $i+1; ?></td>
                                    <td>
                                        <?php if($cat->thumbnail): ?>
                                            <img src="<?= base_url('public/uploads/category_thumbnails/'.$cat->thumbnail); ?>" alt="Thumb" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                        <?php else: ?>
                                            <span class="text-muted">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><strong><?= $cat->category_name; ?></strong></td>
                                    <td><span class="slug-code"><?= $cat->slug; ?></span></td>
                                    <td><?= $cat->h1_title ?: '<span class="text-muted">Not Set</span>'; ?></td>
                                    <td>
                                        <span class="badge bg-<?= $cat->status ? 'success' : 'danger'; ?>">
                                            <?= $cat->status ? 'Active' : 'Inactive'; ?>
                                        </span>
                                    </td>
                                    <td class="action-btns">
                                        <a href="<?= base_url('Admin/ManageDynamicGalleryItems/'.$cat->id); ?>" class="btn btn-outline-info btn-sm" title="Manage Items">
                                            <i class="bi bi-images"></i> Items
                                        </a>
                                        <button class="btn btn-outline-warning btn-sm edit-cat" 
                                                data-id="<?= $cat->id; ?>" 
                                                data-name="<?= $cat->category_name; ?>"
                                                data-slug="<?= $cat->slug; ?>"
                                                data-h1="<?= $cat->h1_title; ?>"
                                                data-desc="<?= $cat->description_text; ?>"
                                                data-thumb="<?= $cat->thumbnail; ?>"
                                                data-status="<?= $cat->status; ?>" title="Edit Category">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm delete-cat" data-id="<?= $cat->id; ?>" title="Delete Category">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addCategoryForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" required placeholder="e.g. Farewell 2025">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL Slug (Leave blank for auto)</label>
                            <input type="text" name="slug" class="form-control" placeholder="e.g. farewell-2025">
                        </div>
                        <div class="form-group mb-3">
                            <label>H1 Title</label>
                            <input type="text" name="h1_title" class="form-control" placeholder="Page Heading">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description Text (P)</label>
                            <textarea name="description_text" class="form-control" placeholder="Page Sub-heading / Description"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Thumbnail Image</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editCategoryForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit_cat_id">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Category Name</label>
                            <input type="text" name="category_name" id="edit_cat_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL Slug</label>
                            <input type="text" name="slug" id="edit_cat_slug" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>H1 Title</label>
                            <input type="text" name="h1_title" id="edit_cat_h1" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description Text (P)</label>
                            <textarea name="description_text" id="edit_cat_desc" class="form-control"></textarea>
                        </div>
                        <div id="curr_thumb_div" class="mb-3 d-none">
                            <label>Current Thumbnail</label><br>
                            <img id="edit_curr_thumb" src="" alt="Thumb" style="width: 100px; height: 70px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                        </div>
                        <div class="form-group mb-3">
                            <label>Thumbnail Image (Leave blank to keep current)</label>
                            <input type="file" name="thumbnail" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="edit_cat_status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>
</div>
<?php include('include/jslinks.php'); ?>

<script>
$(document).ready(function() {
    // example2 is likely already initialized in jslinks.php for this theme
    // but if not, we can initialize it here.

    $('#addCategoryForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: '<?= base_url("Admin/AddDynamicGalleryCategory"); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                let data = JSON.parse(res);
                if(data.status === 'success') {
                    Swal.fire('Success', data.msg, 'success').then(() => location.reload());
                } else {
                    Swal.fire('Error', data.msg, 'error');
                }
            }
        });
    });

    $('.edit-cat').on('click', function() {
        $('#edit_cat_id').val($(this).data('id'));
        $('#edit_cat_name').val($(this).data('name'));
        $('#edit_cat_slug').val($(this).data('slug'));
        $('#edit_cat_h1').val($(this).data('h1'));
        $('#edit_cat_desc').val($(this).data('desc'));
        $('#edit_cat_status').val($(this).data('status'));
        
        let thumb = $(this).data('thumb');
        if(thumb) {
            $('#edit_curr_thumb').attr('src', '<?= base_url("public/uploads/category_thumbnails/"); ?>' + thumb);
            $('#curr_thumb_div').removeClass('d-none');
        } else {
            $('#curr_thumb_div').addClass('d-none');
        }

        // Bootstrap 5 modal show
        var myModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
        myModal.show();
    });

    $('#editCategoryForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: '<?= base_url("Admin/UpdateDynamicGalleryCategory"); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                let data = JSON.parse(res);
                if(data.status === 'success') {
                    Swal.fire('Success', data.msg, 'success').then(() => location.reload());
                } else {
                    Swal.fire('Error', data.msg, 'error');
                }
            }
        });
    });

    $('.delete-cat').on('click', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete all items in this category!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url("Admin/DeleteDynamicGalleryCategory"); ?>',
                    type: 'POST',
                    data: {id: id},
                    success: function(res) {
                        let data = JSON.parse(res);
                        if(data.status === 'success') {
                            Swal.fire('Deleted!', data.msg, 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error', data.msg, 'error');
                        }
                    }
                });
            }
        });
    });
});
</script>
</body>
</html>
