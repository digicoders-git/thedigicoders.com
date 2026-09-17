<!DOCTYPE html>
<html lang="en">

<head>
    <title> Blog - <?= $this->data['app_name'] ?></title>
    <?php include('include/headerlinks.php'); ?>
    <style>
        .blog-stat-card {
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .blog-stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;
        }

        .blog-thumb-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .blog-thumb-img:hover {
            transform: scale(1.08);
        }

        .badge-soft-primary {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
        }

        .table-responsive {
            border-radius: 8px;
        }

        .modal-nav-tabs .nav-link {
            font-weight: 600;
            color: #495057;
            border-radius: 8px;
            padding: 8px 16px;
        }

        .modal-nav-tabs .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
        }

        .table-compact td,
        .table-compact th {
            padding: 10px 12px;
            vertical-align: middle;
        }
    </style>
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
                <div class="breadcrumb-title pe-3">Blog Management</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-primary shadow-sm px-4" style="border-radius: 6px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#faqModal">
                        <i class="bi bi-plus-circle me-1"></i> Create New Blog
                    </button>
                </div>
            </div>
            <!--end breadcrumb-->

            <!-- Top Summary Cards -->
            <?php
            $total_blogs = count($userdata);
            $published_blogs = 0;
            $draft_blogs = 0;
            $total_views = 0;
            foreach ($userdata as $b) {
                if (isset($b->status) && $b->status == 'true') {
                    $published_blogs++;
                } else {
                    $draft_blogs++;
                }
                $total_views += (isset($b->views_count) ? (int) $b->views_count : 0);
            }
            ?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mb-4">
                <div class="col">
                    <div class="card blog-stat-card shadow-sm h-100 mb-0">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small text-uppercase fw-bold mb-1">Total Blogs</p>
                                    <h3 class="mb-0 text-dark fw-bold"><?= $total_blogs ?></h3>
                                </div>
                                <div class="avatar bg-primary text-white rounded-3 p-3 d-flex align-items-center justify-content-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="bi bi-journal-text fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card blog-stat-card shadow-sm h-100 mb-0">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small text-uppercase fw-bold mb-1">Published</p>
                                    <h3 class="mb-0 text-success fw-bold"><?= $published_blogs ?></h3>
                                </div>
                                <div class="avatar bg-success text-white rounded-3 p-3 d-flex align-items-center justify-content-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="bi bi-check-circle-fill fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card blog-stat-card shadow-sm h-100 mb-0">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small text-uppercase fw-bold mb-1">Drafts</p>
                                    <h3 class="mb-0 text-warning fw-bold"><?= $draft_blogs ?></h3>
                                </div>
                                <div class="avatar bg-warning text-dark rounded-3 p-3 d-flex align-items-center justify-content-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="bi bi-pencil-square fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card blog-stat-card shadow-sm h-100 mb-0">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="text-muted small text-uppercase fw-bold mb-1">Total Views</p>
                                    <h3 class="mb-0 text-info fw-bold"><?= number_format($total_views) ?></h3>
                                </div>
                                <div class="avatar bg-info text-white rounded-3 p-3 d-flex align-items-center justify-content-center"
                                    style="width: 48px; height: 48px;">
                                    <i class="bi bi-eye-fill fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Table Card -->
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header py-3 bg-white border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 text-dark fw-bold"><i class="bi bi-newspaper me-2 text-primary"></i>Manage All Blogs</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2"
                            class="table table-hover table-striped table-compact align-middle border mb-0"
                            style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 35px;">#</th>
                                    <th style="width: 80px;">Action</th>
                                    <th style="width: 95px;">Status</th>
                                    <th style="width: 85px;">Views</th>
                                    <th style="width: 60px;">Photo</th>
                                    <th style="width: 280px;">Title & Details</th>
                                    <th style="width: 180px;">Content</th>
                                    <th style="width: 75px;">SEO</th>
                                    <th style="width: 75px;">FAQs</th>
                                    <th style="width: 110px;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($userdata as $data) {
                                    $faqs = array();
                                    if (!empty($data->faqs)) {
                                        $faqs = json_decode($data->faqs, true);
                                    }

                                    // Safe plain text snippet extraction
                                    $decodedContent = html_entity_decode($data->content ?? '', ENT_QUOTES, 'UTF-8');
                                    $plainContent = trim(strip_tags($decodedContent));
                                    $shortSnippet = mb_substr($plainContent, 0, 45) . (mb_strlen($plainContent) > 45 ? '...' : '');
                                    ?>
                                    <tr>
                                        <td class="fw-bold text-muted"><?= $sr++ ?></td>
                                        <td>
                                            <div class="btn-group btn-group-sm shadow-sm" role="group">
                                                <button type="button"
                                                    onclick="EditData('blog',<?= $data->id ?>,'Edit Blog')"
                                                    class="btn btn-outline-primary px-2" title="Edit Blog"><i
                                                        class="bi bi-pencil-square"></i></button>
                                                <button type="button"
                                                    onclick="deleteItem(<?= $data->id ?>,'blog','<?= $data->img ?>','<?= base_url('Admin/deleteWithFilename') ?>')"
                                                    class="btn btn-outline-danger px-2" title="Delete Blog"><i
                                                        class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($data->status == 'true'): ?>
                                                <button type="button"
                                                    onclick="ChnageStatus(<?= $data->id ?>,'<?= $data->status ?>','blog','<?= base_url('Admin/ChangeStatus') ?>')"
                                                    class="btn btn-sm btn-success px-2 py-1 shadow-sm border-0 d-inline-flex align-items-center"
                                                    style="font-size: 0.75rem; border-radius: 6px; font-weight: 600;"
                                                    title="Click to Draft">
                                                    <i class="bi bi-check-circle-fill me-1"></i> Published
                                                </button>
                                            <?php else: ?>
                                                <button type="button"
                                                    onclick="ChnageStatus(<?= $data->id ?>,'<?= $data->status ?>','blog','<?= base_url('Admin/ChangeStatus') ?>')"
                                                    class="btn btn-sm btn-warning text-dark px-2 py-1 shadow-sm border-0 d-inline-flex align-items-center"
                                                    style="font-size: 0.75rem; border-radius: 6px; font-weight: 600;"
                                                    title="Click to Publish">
                                                    <i class="bi bi-pencil-square me-1"></i> Draft
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button"
                                                onclick="showBlogIPModal(<?= $data->id ?>, '<?= htmlspecialchars(addslashes($data->title), ENT_QUOTES, 'UTF-8') ?>')"
                                                class="btn btn-sm btn-outline-info px-2 py-1 d-inline-flex align-items-center"
                                                style="font-size: 0.75rem; border-radius: 6px; font-weight: 600;"
                                                title="Click to view IP views">
                                                <i class="bi bi-eye-fill me-1"></i>
                                                <?= number_format(isset($data->views_count) ? $data->views_count : 0) ?>
                                            </button>
                                        </td>
                                        <td>
                                            <img class="blog-thumb-img shadow-sm border"
                                                src="<?= base_url('public/uploads/blog/') . $data->img; ?>" alt="Thumbnail"
                                                onclick="viewImageModal('<?= base_url('public/uploads/blog/') . $data->img ?>', '<?= htmlspecialchars(addslashes($data->title), ENT_QUOTES, 'UTF-8') ?>')"
                                                title="Click to view photo" />
                                        </td>
                                        <td>
                                            <div style="max-width: 270px; word-wrap: break-word; overflow: hidden;">
                                                <div class="fw-bold text-dark lh-sm mb-1" style="font-size: 0.88rem; word-break: break-word;"
                                                    title="<?= htmlspecialchars($data->title, ENT_QUOTES, 'UTF-8'); ?>">
                                                    <?= htmlspecialchars($data->title, ENT_QUOTES, 'UTF-8'); ?>
                                                </div>
                                                <div class="d-flex flex-wrap align-items-center gap-1 mb-1">
                                                    <small class="text-muted" style="font-size: 0.75rem;"><i
                                                            class="bi bi-person me-1 text-primary"></i><?= !empty($data->author_name) ? htmlspecialchars($data->author_name, ENT_QUOTES, 'UTF-8') : 'DigiCoders' ?></small>
                                                    <?php if (!empty($data->location)): ?>
                                                        <span class="badge badge-soft-primary px-2 py-2"
                                                            style="font-size: 0.68rem; border-radius: 6px;"><i
                                                                class="bi bi-geo-alt me-1"></i><?= ucwords($data->location) ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="text-truncate">
                                                    <a href="<?= base_url('blog/' . $data->url) ?>" target="_blank"
                                                        class="text-primary text-decoration-none small d-inline-flex align-items-center mw-100 text-truncate"
                                                        style="font-size: 0.73rem;"
                                                        title="View Live Blog: /<?= htmlspecialchars($data->url, ENT_QUOTES, 'UTF-8') ?>">
                                                        <i class="bi bi-link-45deg me-1 flex-shrink-0"></i><span
                                                            class="text-truncate">/<?= htmlspecialchars($data->url, ENT_QUOTES, 'UTF-8') ?></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="max-width: 170px; overflow: hidden;">
                                                <div class="text-truncate text-secondary small" style="font-size: 0.8rem;"
                                                    title="<?= htmlspecialchars($plainContent, ENT_QUOTES, 'UTF-8') ?>">
                                                    <?= htmlspecialchars($shortSnippet, ENT_QUOTES, 'UTF-8') ?>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-outline-primary py-1 px-2 mt-1"
                                                    style="font-size: 0.73rem; border-radius: 6px; font-weight: 600;"
                                                    onclick="showBlogContentModal(<?= $data->id ?>)">
                                                    <i class="bi bi-file-earmark-text me-1"></i> View Content
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary px-2 py-1 d-inline-flex align-items-center"
                                                style="font-size: 0.75rem; border-radius: 6px; font-weight: 600;"
                                                onclick="showBlogSeoModal(<?= $data->id ?>)">
                                                <i class="bi bi-search me-1 text-primary"></i> SEO
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary px-2 py-1 d-inline-flex align-items-center"
                                                style="font-size: 0.75rem; border-radius: 6px; font-weight: 600;"
                                                onclick="showBlogFaqModal(<?= $data->id ?>)">
                                                <i class="bi bi-question-circle me-1"></i> (<?= count($faqs) ?>)
                                            </button>
                                        </td>
                                        <td>
                                            <small class="text-muted d-block" style="font-size: 0.75rem;">
                                                <i class="bi bi-calendar3 me-1"></i><?= $data->date ?><br>
                                                <i class="bi bi-clock me-1"></i><?= $data->time ?>
                                            </small>
                                        </td>
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

<!-- Modal: Add Blog -->
<div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white fw-bold" id="addBlogModalLabel"><i
                        class="bi bi-plus-circle me-2"></i>Create New Blog Post</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="<?= base_url() ?>Admin/Blog/Add" enctype="multipart/form-data" class="form" method="POST"
                    id="faq">

                    <!-- Navigation Tabs for Form -->
                    <ul class="nav nav-pills modal-nav-tabs mb-4 bg-light p-2 rounded-3 gap-2" id="blogFormTab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="basic-tab" data-bs-toggle="pill"
                                data-bs-target="#basic-tab-pane" type="button" role="tab"><i
                                    class="bi bi-info-circle me-1"></i> 1. Basic Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="content-tab" data-bs-toggle="pill"
                                data-bs-target="#content-tab-pane" type="button" role="tab"><i
                                    class="bi bi-file-earmark-richtext me-1"></i> 2. Blog Content</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="pill" data-bs-target="#seo-tab-pane"
                                type="button" role="tab"><i class="bi bi-search me-1"></i> 3. SEO Settings</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="faq-tab" data-bs-toggle="pill" data-bs-target="#faq-tab-pane"
                                type="button" role="tab"><i class="bi bi-question-circle me-1"></i> 4. Blog
                                FAQs</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="blogFormTabContent">

                        <!-- TAB 1: BASIC DETAILS -->
                        <div class="tab-pane fade show active" id="basic-tab-pane" role="tabpanel" tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Title (H1 Heading) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" id="blog_title" class="form-control"
                                        placeholder="Enter engaging blog title..." required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">URL Slug (Permalinks) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="url" id="blog_url" class="form-control"
                                        placeholder="auto-generated-slug" required />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-success"><i class="bi bi-toggle-on me-1"></i>
                                        Publish Status</label>
                                    <select name="status" class="form-select">
                                        <option value="true">Publish Immediately</option>
                                        <option value="false">Save as Draft</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold"><i class="bi bi-geo-alt me-1"></i> Target
                                        Location</label>
                                    <select name="location" class="form-select">
                                        <option value="">Select Location (Optional)</option>
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

                            <div class="mb-3">
                                <label class="form-label fw-bold"><i class="bi bi-image me-1"></i> Featured Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="img" class="form-control" required />
                                <small class="text-muted">Recommended resolution: 1200 x 630 px (JPG, PNG, WEBP)</small>
                            </div>
                        </div>

                        <!-- TAB 2: BLOG CONTENT -->
                        <div class="tab-pane fade" id="content-tab-pane" role="tabpanel" tabindex="0">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Blog Article Body <span
                                        class="text-danger">*</span></label>
                                <textarea name="content" id="message" cols="30" rows="8" class="form-control summernote"
                                    required></textarea>
                            </div>
                        </div>

                        <!-- TAB 3: ADVANCED SEO SETTINGS -->
                        <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" tabindex="0">
                            <div class="card border mb-3">
                                <div class="card-header bg-light fw-bold text-primary">
                                    <i class="bi bi-search me-1"></i> Search Engine Optimization (SEO) Metadata
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Meta Title (SEO Title)</label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="Leave empty to default to main blog title" />
                                        <small class="text-muted">Optimal length: 50-60 characters</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="3"
                                            placeholder="Write a compelling 150-160 character snippet for Google search..."></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Author Name (E-E-A-T)</label>
                                            <input type="text" name="author_name" class="form-control"
                                                value="DigiCoders Team" placeholder="Author Full Name" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Author Designation / Role</label>
                                            <input type="text" name="author_designation" class="form-control"
                                                value="Tech Expert" placeholder="e.g. Senior Software Engineer" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Featured Image Alt Text</label>
                                            <input type="text" name="img_alt" class="form-control"
                                                placeholder="Descriptive Alt text for image SEO" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Canonical URL (Optional)</label>
                                            <input type="url" name="canonical_url" class="form-control"
                                                placeholder="https://thedigicoders.com/blog/original-post" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Focus Keywords</label>
                                        <input type="text" id="add_blog_keyword_input" class="form-control"
                                            placeholder="Type keyword & press Enter..." />
                                        <div id="add_blog_chips_container" class="mt-2 d-flex flex-wrap gap-2"></div>
                                        <input type="hidden" name="keywords" id="add_blog_keywords_hidden" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 4: BLOG FAQS -->
                        <div class="tab-pane fade" id="faq-tab-pane" role="tabpanel" tabindex="0">
                            <div class="card border mb-3">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 fw-bold text-dark"><i class="bi bi-question-circle me-1"></i>
                                        Frequently Asked Questions</h6>
                                    <button type="button" class="btn btn-success btn-sm rounded-[6px] px-3"
                                        id="add-faq-row-btn"><i class="bi bi-plus-lg me-1"></i> Add FAQ Row</button>
                                </div>
                                <div class="card-body">
                                    <div id="add-faq-list">
                                        <div class="faq-row mb-3 pb-3 border-bottom">
                                            <div class="mb-2">
                                                <label class="form-label font-weight-bold">Question</label>
                                                <input type="text" name="faq_questions[]" class="form-control"
                                                    placeholder="e.g. What is PHP training in Lucknow?" />
                                            </div>
                                            <div>
                                                <label class="form-label font-weight-bold">Answer</label>
                                                <textarea name="faq_answers[]" class="form-control" rows="2"
                                                    placeholder="e.g. DigiCoders provides practical PHP training..."></textarea>
                                            </div>
                                            <div class="text-end mt-2">
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm remove-faq-btn"
                                                    style="display: none;"><i class="bi bi-trash me-1"></i>
                                                    Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div
                        class="modal-footer px-0 pb-0 pt-3 border-top mt-3 d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-light px-4" style="border-radius: 6px;"
                            data-bs-dismiss="modal">Cancel</button>

                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-outline-secondary px-4" id="btnPrevStep"
                                style="display: none; border-radius: 6px;">
                                <i class="bi bi-arrow-left me-1"></i> Previous Step
                            </button>
                            <button type="button" class="btn btn-primary px-4 shadow-sm" id="btnNextStep" style="border-radius: 6px;">
                                Next Step <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                            <button type="submit" class="btn btn-success px-4 shadow-sm" id="submitBtn" style="display: none; border-radius: 6px;">
                                <i class="fa fa-spinner fa-spin me-1" style="display:none;" id="submitSpin"></i><i
                                    class="bi bi-check-lg me-1"></i> Save Blog
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal: View Full Blog Content -->
<div class="modal fade" id="blogContentModal" tabindex="-1" aria-labelledby="blogContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white fw-bold" id="blogContentModalLabel"><i
                        class="bi bi-file-earmark-richtext me-2"></i>Blog Content Preview</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3 border-bottom pb-3">
                    <h4 id="blogModalTitle" class="fw-bold text-dark mb-2"></h4>
                    <div class="d-flex flex-wrap align-items-center gap-3 text-muted small">
                        <span><i class="bi bi-person me-1 text-primary"></i> <strong
                                id="blogModalAuthor"></strong></span>
                        <span><i class="bi bi-calendar3 me-1 text-primary"></i> <span id="blogModalDate"></span></span>
                    </div>
                </div>
                <div class="mb-4 text-center">
                    <img id="blogModalBannerImg" src="" class="img-fluid rounded-3 shadow-sm border"
                        style="aspect-ratio: 16 / 9; width: 100%; object-fit: cover;" alt="Blog Banner" />
                </div>
                <div id="blogModalBodyContent" class="blog-rendered-content text-secondary lh-base p-2"></div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary px-4" style="border-radius: 6px;" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: View Blog SEO Metadata -->
<div class="modal fade" id="blogSeoModal" tabindex="-1" aria-labelledby="blogSeoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title text-white fw-bold" id="blogSeoModalLabel"><i class="bi bi-search me-2"></i>SEO &
                    Meta Information</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="text-muted small d-block">Blog Title:</label>
                    <h6 id="seoModalTitle" class="fw-bold text-dark"></h6>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border">
                            <small class="text-muted d-block font-monospace">Meta Title:</small>
                            <span id="seoMetaTitle" class="fw-bold text-dark small"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border">
                            <small class="text-muted d-block font-monospace">Author Details:</small>
                            <span id="seoAuthor" class="fw-bold text-dark small"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 bg-light rounded border">
                            <small class="text-muted d-block font-monospace mb-1">Meta Description:</small>
                            <p id="seoMetaDescription" class="mb-0 text-secondary small"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border">
                            <small class="text-muted d-block font-monospace">Image Alt Text:</small>
                            <span id="seoImgAlt" class="fw-bold text-dark small"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded border">
                            <small class="text-muted d-block font-monospace">Canonical URL:</small>
                            <span id="seoCanonical" class="fw-bold text-dark small text-break"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 bg-light rounded border">
                            <small class="text-muted d-block font-monospace mb-2">Focus Keywords:</small>
                            <div id="seoKeywordsContainer" class="d-flex flex-wrap"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 bg-light rounded border">
                            <small class="text-muted d-block font-monospace mb-1">Public Blog URL:</small>
                            <div class="input-group input-group-sm">
                                <input type="text" id="seoFullUrl" class="form-control font-monospace bg-white"
                                    readonly />
                                <button class="btn btn-outline-primary" type="button" onclick="copySeoUrl()"><i
                                        class="bi bi-clipboard me-1"></i> Copy URL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: View Blog FAQs -->
<div class="modal fade" id="blogFaqModal" tabindex="-1" aria-labelledby="blogFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title text-white fw-bold" id="blogFaqModalLabel"><i
                        class="bi bi-question-circle me-2"></i>Blog FAQs</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <h6 id="faqModalBlogTitle" class="fw-bold text-dark mb-3 border-bottom pb-2"></h6>
                <div id="faqModalListContainer"></div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary px-4" style="border-radius: 6px;" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Image Preview -->
<div class="modal fade" id="blogImagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header">
                <h6 class="modal-title fw-bold" id="imageModalTitle">Image Preview</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-3">
                <img id="imageModalSrc" src="" class="img-fluid rounded border shadow-sm" style="max-height: 450px;"
                    alt="Full Preview" />
            </div>
        </div>
    </div>
</div>

<!-- Modal for Viewing Blog IP Address Logs -->
<div class="modal fade" id="blogIPModal" tabindex="-1" aria-labelledby="blogIPModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white fw-bold" id="blogIPModalLabel"><i class="bi bi-geo-alt-fill me-2"></i>
                    Blog Unique IP View Logs</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3 p-3 bg-light rounded border">
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
                <button type="button" class="btn btn-secondary px-4" style="border-radius: 6px;" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</html>

<!-- JavaScript Logic -->
<script>
    // Blog Data Mapping Object
    const blogDataMap = {
        <?php foreach ($userdata as $b): ?>
                <?= $b->id ?>: {
                id: <?= json_encode($b->id) ?>,
                title: <?= json_encode($b->title ?? '') ?>,
                meta_title: <?= json_encode($b->meta_title ?? '') ?>,
                author_name: <?= json_encode($b->author_name ?? '') ?>,
                author_designation: <?= json_encode($b->author_designation ?? '') ?>,
                location: <?= json_encode($b->location ?? '') ?>,
                url: <?= json_encode($b->url ?? '') ?>,
                meta_description: <?= json_encode($b->meta_description ?? '') ?>,
                keywords: <?= json_encode($b->keywords ?? '') ?>,
                img: <?= json_encode(base_url('public/uploads/blog/') . $b->img) ?>,
                img_alt: <?= json_encode($b->img_alt ?? '') ?>,
                canonical_url: <?= json_encode($b->canonical_url ?? '') ?>,
                content: <?= json_encode($b->content ?? '') ?>,
                faqs: <?= json_encode(!empty($b->faqs) ? json_decode($b->faqs, true) : []) ?>,
                date: <?= json_encode($b->date ?? '') ?>,
                time: <?= json_encode($b->time ?? '') ?>
            },
        <?php endforeach; ?>
    };

    $('.dropify').dropify();
    $('.summernote').summernote({
        placeholder: 'Write Here ...',
        tabsize: 2,
        height: 250,
        callbacks: {
            onImageUpload: function (files) {
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

        $input.on('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTag();
            }
        });

        $input.on('blur', function () {
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

        $container.on('click', '.remove-tag-btn', function () {
            const idx = $(this).data('index');
            tags.splice(idx, 1);
            renderTags();
        });
    }

    // Modal Tab Step Navigation Logic
    const tabsOrder = ['basic-tab', 'content-tab', 'seo-tab', 'faq-tab'];
    let currentTabIdx = 0;

    function goToStep(tabId) {
        const tabTriggerEl = document.getElementById(tabId);
        if (tabTriggerEl) {
            const tab = new bootstrap.Tab(tabTriggerEl);
            tab.show();
        }
    }

    function updateStepButtons() {
        if (currentTabIdx === 0) {
            $('#btnPrevStep').hide();
        } else {
            $('#btnPrevStep').show();
        }

        if (currentTabIdx === tabsOrder.length - 1) {
            $('#btnNextStep').hide();
            $('#submitBtn').show();
        } else {
            $('#btnNextStep').show();
            $('#submitBtn').hide();
        }
    }

    $(document).ready(function () {
        initializeTagsInput('add_blog_keyword_input', 'add_blog_chips_container', 'add_blog_keywords_hidden');

        $('#blog_title').on('keyup', function () {
            var title = $(this).val();
            $('#blog_url').val(generateSlug(title));
        });

        // Step Navigation Handlers
        $('#btnNextStep').on('click', function () {
            if (currentTabIdx < tabsOrder.length - 1) {
                currentTabIdx++;
                goToStep(tabsOrder[currentTabIdx]);
            }
        });

        $('#btnPrevStep').on('click', function () {
            if (currentTabIdx > 0) {
                currentTabIdx--;
                goToStep(tabsOrder[currentTabIdx]);
            }
        });

        $('button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
            const targetId = $(e.target).attr('id');
            const idx = tabsOrder.indexOf(targetId);
            if (idx !== -1) {
                currentTabIdx = idx;
                updateStepButtons();
            }
        });

        $('#faqModal').on('show.bs.modal', function () {
            currentTabIdx = 0;
            goToStep(tabsOrder[0]);
            updateStepButtons();
        });

        // Add FAQ Row logic
        $('#add-faq-row-btn').on('click', function () {
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
                        <button type="button" class="btn btn-outline-danger btn-sm remove-faq-btn"><i class="bi bi-trash me-1"></i> Remove</button>
                    </div>
                </div>
            `;
            $('#add-faq-list').append(newRow);
            toggleRemoveButtons();
        });

        // Remove FAQ Row logic
        $(document).on('click', '.remove-faq-btn', function () {
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

    // View Content Modal Function
    function showBlogContentModal(id) {
        const blog = blogDataMap[id];
        if (!blog) return;
        $('#blogModalTitle').text(blog.title);
        $('#blogModalBannerImg').attr('src', blog.img);
        $('#blogModalAuthor').text(blog.author_name ? blog.author_name + (blog.author_designation ? ' (' + blog.author_designation + ')' : '') : 'DigiCoders Team');
        $('#blogModalDate').text(blog.date + ' ' + blog.time);

        let decodedContent = blog.content;
        if (decodedContent.includes('&lt;') || decodedContent.includes('&gt;')) {
            const txt = document.createElement('textarea');
            txt.innerHTML = decodedContent;
            decodedContent = txt.value;
        }
        $('#blogModalBodyContent').html(decodedContent);

        var modal = new bootstrap.Modal(document.getElementById('blogContentModal'));
        modal.show();
    }

    // View SEO Modal Function
    function showBlogSeoModal(id) {
        const blog = blogDataMap[id];
        if (!blog) return;
        $('#seoModalTitle').text(blog.title);
        $('#seoMetaTitle').text(blog.meta_title || blog.title);
        $('#seoMetaDescription').text(blog.meta_description || 'None provided');
        $('#seoAuthor').text((blog.author_name || 'DigiCoders Team') + (blog.author_designation ? ' (' + blog.author_designation + ')' : ''));
        $('#seoImgAlt').text(blog.img_alt || 'None');
        $('#seoCanonical').text(blog.canonical_url || 'None');
        $('#seoFullUrl').val('<?= base_url("blog/") ?>' + blog.url);

        let kwHtml = '';
        if (blog.keywords && blog.keywords.trim()) {
            const kws = blog.keywords.split(',');
            kws.forEach(kw => {
                if (kw.trim()) {
                    kwHtml += '<span class="badge bg-white text-dark border me-1 mb-1 px-2 py-1 shadow-sm"><i class="bi bi-tag-fill me-1 text-primary"></i>' + escapeHtml(kw.trim()) + '</span>';
                }
            });
        } else {
            kwHtml = '<span class="text-muted small">No keywords specified</span>';
        }
        $('#seoKeywordsContainer').html(kwHtml);

        var modal = new bootstrap.Modal(document.getElementById('blogSeoModal'));
        modal.show();
    }

    // Copy SEO URL Helper
    function copySeoUrl() {
        var copyText = document.getElementById("seoFullUrl");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        if (typeof iziToast !== 'undefined') {
            iziToast.success({ title: 'Success', message: 'Blog URL copied to clipboard!', position: 'topRight' });
        } else {
            alert('Blog URL copied to clipboard!');
        }
    }

    // View FAQ Modal Function
    function showBlogFaqModal(id) {
        const blog = blogDataMap[id];
        if (!blog) return;
        $('#faqModalBlogTitle').text(blog.title);

        let html = '';
        if (blog.faqs && blog.faqs.length > 0) {
            blog.faqs.forEach((faq, idx) => {
                html += `
                    <div class="card border mb-3 shadow-sm">
                        <div class="card-header bg-light fw-bold text-dark d-flex align-items-center">
                            <span class="badge bg-primary me-2">Q${idx + 1}</span> ${escapeHtml(faq.question)}
                        </div>
                        <div class="card-body bg-white text-secondary">
                            <strong>Answer:</strong> ${escapeHtml(faq.answer)}
                        </div>
                    </div>
                `;
            });
        } else {
            html = '<div class="text-center text-muted py-4"><i class="bi bi-chat-square-dots display-6 d-block mb-2"></i>No FAQs added for this blog post.</div>';
        }
        $('#faqModalListContainer').html(html);

        var modal = new bootstrap.Modal(document.getElementById('blogFaqModal'));
        modal.show();
    }

    // Image Preview Helper
    function viewImageModal(imgUrl, title) {
        $('#imageModalTitle').text(title);
        $('#imageModalSrc').attr('src', imgUrl);
        var modal = new bootstrap.Modal(document.getElementById('blogImagePreviewModal'));
        modal.show();
    }

    // IP Address View Log Modal Function
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
                    data.views.forEach(function (v, idx) {
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

    function escapeHtml(text) {
        if (!text) return '';
        return text.replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
</script>