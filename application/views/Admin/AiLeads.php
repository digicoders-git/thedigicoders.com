<!doctype html>
<html lang="en">
<head>
    <title>AI Leads - Admin Panel</title>
    <?php include('include/headerlinks.php') ?>
</head>
<body class="pace-done">
    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>
        <main class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">AI Assistant</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">AI Captured Leads</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">AI Captured Leads</h5>
                    </div>
                    <hr/>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Captured At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($leads as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->name ?></td>
                                    <td>
                                        <a href="tel:<?= $row->phone ?>"><?= $row->phone ?></a>
                                        <a href="https://wa.me/91<?= $row->phone ?>" target="_blank" class="ms-2 text-success"><i class="bi bi-whatsapp"></i></a>
                                    </td>
                                    <td><?= date('d M Y, h:i A', strtotime($row->created_at)) ?></td>
                                    <td>
                                        <a href="<?= base_url('AdminAi/delete_lead/'.$row->id) ?>" class="text-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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
</body>
</html>
