<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('include/headerlinks.php'); ?>
    <title>Manage Gallery Items | <?= $category->category_name; ?></title>
    <style>
        .gallery-item-img { width: 80px; height: 60px; object-fit: cover; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .media-preview { max-width: 100%; height: 150px; object-fit: cover; margin-top: 10px; display: none; }
        .table td, .table th { vertical-align: middle !important; }
        .badge { font-size: 0.8rem; padding: 0.4em 0.7em; }
        .action-btns { white-space: nowrap; }
        .item-path { max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-family: monospace; font-size: 0.85rem; }
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
                            <h6>Gallery: <?= $category->category_name; ?></h6>
                        </div>
                        <div class="col-sm-6 text-end">
                            <a href="<?= base_url('Admin/ManageDynamicGallery'); ?>" class="btn btn-secondary mr-2">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addItemModal">
                                <i class="fa fa-plus"></i>&ensp;Add Image/Video
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
                                    <th>Preview</th>
                                    <th>Title / Alt</th>
                                    <th>Type</th>
                                    <th>Link / Path</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $i => $item): ?>
                                <tr>
                                    <td><?= $i+1; ?></td>
                                    <td class="text-center">
                                        <?php if($item->media_type == 'image'): ?>
                                            <img src="<?= base_url('public/'.$item->media_url); ?>" class="gallery-item-img">
                                        <?php else: ?>
                                            <div class="bg-dark text-center gallery-item-img d-flex align-items-center justify-content-center mx-auto">
                                                <i class="bi bi-camera-video text-white"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong>T:</strong> <?= $item->title ?: 'N/A'; ?><br>
                                        <small><strong>A:</strong> <?= $item->alt_text ?: 'N/A'; ?></small>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?= $item->media_type == 'image' ? 'primary' : 'info'; ?>">
                                            <?= strtoupper($item->media_type); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="item-path" title="<?= $item->media_url; ?>">
                                            <?= $item->media_url; ?>
                                        </div>
                                    </td>
                                    <td class="action-btns">
                                        <button class="btn btn-outline-warning btn-sm edit-item" 
                                                data-id="<?= $item->id; ?>" 
                                                data-title="<?= $item->title; ?>"
                                                data-alt="<?= $item->alt_text; ?>"
                                                data-type="<?= $item->media_type; ?>"
                                                data-url="<?= $item->media_url; ?>" title="Edit Item">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm delete-item" data-id="<?= $item->id; ?>" title="Delete Item">
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
    </div>

    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('Admin/AddDynamicGalleryItem'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<?= $category->id; ?>">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Image/Video</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Media Type</label>
                            <select name="media_type" class="form-control media-type-select" required>
                                <option value="image">Image</option>
                                <option value="video">YouTube Video</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 media-file-group">
                            <label>Select Image</label>
                            <input type="file" name="media_file" class="form-control">
                        </div>
                        <div class="form-group mb-3 media-url-group d-none">
                            <label>Video URL (YouTube Embed Link)</label>
                            <input type="text" name="media_url" class="form-control" placeholder="https://www.youtube.com/embed/XXXXX">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Image Title">
                        </div>
                        <div class="form-group mb-3">
                            <label>Alt Text (SEO)</label>
                            <input type="text" name="alt_text" class="form-control" placeholder="SEO Alt Text">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload / Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Item Modal -->
    <div class="modal fade" id="editItemModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('Admin/UpdateDynamicGalleryItem'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit_item_id">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Item</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Media Type</label>
                            <select name="media_type" id="edit_media_type" class="form-control media-type-select" required>
                                <option value="image">Image</option>
                                <option value="video">YouTube Video</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 media-file-group">
                            <label>Change Image (Leave blank to keep current)</label>
                            <input type="file" name="media_file" class="form-control">
                        </div>
                        <div class="form-group mb-3 media-url-group d-none">
                            <label>Video URL</label>
                            <input type="text" name="media_url" id="edit_media_url" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Alt Text (SEO)</label>
                            <input type="text" name="alt_text" id="edit_alt" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Item</button>
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
    // $('#example2').DataTable();

    $('.media-type-select').on('change', function() {
        let type = $(this).val();
        let modal = $(this).closest('.modal');
        if(type === 'video') {
            modal.find('.media-file-group').addClass('d-none');
            modal.find('.media-url-group').removeClass('d-none');
        } else {
            modal.find('.media-file-group').removeClass('d-none');
            modal.find('.media-url-group').addClass('d-none');
        }
    });

    $('.edit-item').on('click', function() {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let alt = $(this).data('alt');
        let type = $(this).data('type');
        let url = $(this).data('url');

        $('#edit_item_id').val(id);
        $('#edit_title').val(title);
        $('#edit_alt').val(alt);
        $('#edit_media_type').val(type).trigger('change');
        if(type === 'video') {
            $('#edit_media_url').val(url);
        }
        var myModal = new bootstrap.Modal(document.getElementById('editItemModal'));
        myModal.show();
    });

    $('.delete-item').on('click', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url("Admin/DeleteDynamicGalleryItem"); ?>',
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
