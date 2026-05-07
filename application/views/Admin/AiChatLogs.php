<!doctype html>
<html lang="en">
<head>
    <title>AI Chat History - Admin Panel</title>
    <?php include('include/headerlinks.php') ?>
    <style>
        .msg-box { max-height: 100px; overflow-y: auto; font-size: 13px; padding: 10px; background: #f8f9fa; border-radius: 5px; }
        .bot-reply { background: #e3f2fd; }
    </style>
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
                            <li class="breadcrumb-item active" aria-current="page">Chat History Logs</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a href="<?= base_url('AdminAi/delete_all_logs') ?>" class="btn btn-danger btn-sm" onclick="return confirm('Clear ALL chat logs?')">Clear All History</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Full AI Chat History</h5>
                    </div>
                    <hr/>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>User Info</th>
                                    <th>User Message</th>
                                    <th>Bot Response</th>
                                    <th>Source</th>
                                    <th>Date/Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($logs as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <b><?= $row->name ? $row->name : 'Guest' ?></b><br>
                                        <small><?= $row->phone ?></small>
                                    </td>
                                    <td><div class="msg-box text-primary"><b>User:</b> <?= htmlspecialchars($row->user_message) ?></div></td>
                                    <td><div class="msg-box bot-reply text-success"><b>Bot:</b> <?= htmlspecialchars($row->bot_reply) ?></div></td>
                                    <td>
                                        <span class="badge <?= $row->source == 'voice' ? 'bg-danger' : 'bg-primary' ?>">
                                            <i class="bi <?= $row->source == 'voice' ? 'bi-mic-fill' : 'bi-keyboard-fill' ?>"></i> <?= ucfirst($row->source) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d M Y, h:i A', strtotime($row->created_at)) ?></td>
                                    <td>
                                        <a href="<?= base_url('AdminAi/delete_chat_log/'.$row->id) ?>" class="text-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></a>
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
