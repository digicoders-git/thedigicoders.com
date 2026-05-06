<!DOCTYPE html>
<html lang="en">
<head>
    <title>Import Certificates - <?= $this->data['app_name'] ?></title>
    <?php include('include/headerlinks.php'); ?>
    <style>
        .import-box {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            background: #f8f9fa;
            cursor: pointer;
            transition: 0.3s;
        }
        .import-box:hover {
            background: #e9ecef;
            border-color: #0056b3;
        }
        .import-box i {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 15px;
        }
        #fileInput {
            display: none;
        }
        .progress-container {
            display: none;
            margin-top: 20px;
        }
        .summary-dashboard {
            display: none;
            margin-top: 30px;
        }
        .card-stats {
            border-left: 4px solid #007bff;
        }
        .card-stats.success { border-left-color: #28a745; }
        .card-stats.warning { border-left-color: #ffc107; }
        .card-stats.danger { border-left-color: #dc3545; }
        .log-container {
            max-height: 200px;
            overflow-y: auto;
            background: #212529;
            color: #28a745;
            padding: 10px;
            font-family: monospace;
            font-size: 12px;
            margin-top: 15px;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <?php include('include/header.php'); ?>
        <?php include('include/sidebar.php'); ?>

        <main class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Import Certificates</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/ManageCertificate') ?>">Manage Certificates</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Import</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <a href="<?= base_url('Admin/DownloadCertificateSample') ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-download"></i> Download Sample Excel
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0">Upload Excel File</h5>
                        </div>
                        <div class="card-body">
                            <div class="import-box" id="dropArea">
                                <i class="fa fa-cloud-upload-alt"></i>
                                <h4>Drag & Drop Excel File here</h4>
                                <p class="text-muted">or click to browse from your computer</p>
                                <p class="small text-primary">Accepted formats: .xls, .xlsx</p>
                                <input type="file" id="fileInput" accept=".xls,.xlsx">
                            </div>

                            <div class="progress-container" id="progressContainer">
                                <div id="previewArea" style="display:none;">
                                    <h6 class="mb-3">Data Preview (First 5 records):</h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered text-nowrap" id="previewTable" style="font-size:12px;">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Ref No</th>
                                                    <th>Full Ref</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Tech</th>
                                                    <th>Duration</th>
                                                    <th>Start</th>
                                                    <th>End</th>
                                                    <th>Issue</th>
                                                    <th>Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                    <div class="text-center my-3">
                                        <button class="btn btn-primary px-5" id="btnConfirmImport">
                                            <i class="fa fa-play-circle"></i> Confirm & Start Import
                                        </button>
                                        <button class="btn btn-link text-muted" onclick="location.reload()">Cancel</button>
                                    </div>
                                </div>

                                <div id="importStats" style="display:none;">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span id="progressStatus">Uploading...</span>
                                        <span id="progressPercent">0%</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" id="progressBar"></div>
                                    </div>
                                    <div class="log-container" id="logContainer"></div>
                                </div>
                            </div>

                            <div class="summary-dashboard" id="summaryDashboard">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <div class="card card-stats shadow-sm">
                                            <div class="card-body">
                                                <h6 class="text-muted">Total Records</h6>
                                                <h3 id="totalRecords">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card card-stats success shadow-sm">
                                            <div class="card-body">
                                                <h6 class="text-muted">Imported</h6>
                                                <h3 id="importedRecords">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card card-stats warning shadow-sm">
                                            <div class="card-body">
                                                <h6 class="text-muted">Duplicates</h6>
                                                <h3 id="duplicateRecords">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card card-stats danger shadow-sm">
                                            <div class="card-body">
                                                <h6 class="text-muted">No Mobile</h6>
                                                <h3 id="missingMobileRecords">0</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Admin/DownloadImportReport/errors') ?>" class="btn btn-outline-danger" id="btnDownloadErrors" style="display:none;">
                                            <i class="fa fa-download"></i> Error Report
                                        </a>
                                        <a href="<?= base_url('Admin/DownloadImportReport/missing_mobile') ?>" class="btn btn-outline-warning" id="btnDownloadMissing" style="display:none;">
                                            <i class="fa fa-download"></i> Missing Mobile Report
                                        </a>
                                        <a href="<?= base_url('Admin/DownloadImportReport/duplicates') ?>" class="btn btn-outline-info" id="btnDownloadDuplicates" style="display:none;">
                                            <i class="fa fa-download"></i> Duplicate Report
                                        </a>
                                        <button class="btn btn-primary" onclick="location.reload()">
                                            <i class="fa fa-sync"></i> Import Another
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction Card -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h6>Excel Format Instruction:</h6>
                            <table class="table table-sm table-bordered mt-2 small">
                                <thead class="table-light">
                                    <tr>
                                        <th>Ref No</th>
                                        <th>Example Ref No</th>
                                        <th>Name</th>
                                        <th>Training Type</th>
                                        <th>Technology</th>
                                        <th>Duration</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Issue Date</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1234</td>
                                        <td>DCT/2024/1234</td>
                                        <td>Saurabh Kumar</td>
                                        <td>Vocational Training</td>
                                        <td>PHP</td>
                                        <td>45 days</td>
                                        <td>2024-01-01</td>
                                        <td>2024-02-15</td>
                                        <td>2024-03-01</td>
                                        <td>A++</td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="small text-muted">
                                <li>Mobile numbers are fetched automatically from registration table using <strong>Ref No</strong>.</li>
                                <li>Duplicates are checked based on <strong>Ref No</strong>.</li>
                                <li>Dates should be in YYYY-MM-DD or standard Excel date format.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <div class="overlay nav-toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>

    <?php include('include/jslinks.php') ?>

    <script>
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');
        const progressContainer = document.getElementById('progressContainer');
        const progressBar = document.getElementById('progressBar');
        const progressStatus = document.getElementById('progressStatus');
        const progressPercent = document.getElementById('progressPercent');
        const logContainer = document.getElementById('logContainer');
        const summaryDashboard = document.getElementById('summaryDashboard');

        dropArea.onclick = () => fileInput.click();

        dropArea.ondragover = (e) => {
            e.preventDefault();
            dropArea.style.borderColor = '#0056b3';
            dropArea.style.background = '#e9ecef';
        };

        dropArea.ondragleave = () => {
            dropArea.style.borderColor = '#007bff';
            dropArea.style.background = '#f8f9fa';
        };

        dropArea.ondrop = (e) => {
            e.preventDefault();
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFileUpload(files[0]);
            }
        };

        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                handleFileUpload(fileInput.files[0]);
            }
        };

        function addLog(msg, type = 'info') {
            const time = new Date().toLocaleTimeString();
            logContainer.innerHTML += `<div>[${time}] ${msg}</div>`;
            logContainer.scrollTop = logContainer.scrollHeight;
        }

        function handleFileUpload(file) {
            const fileName = file.name;
            const ext = fileName.split('.').pop().toLowerCase();
            if (!['xls', 'xlsx'].includes(ext)) {
                alert('Only .xls and .xlsx files are allowed');
                return;
            }

            dropArea.style.display = 'none';
            progressContainer.style.display = 'block';
            addLog(`Selected file: ${fileName}`);

            const formData = new FormData();
            formData.append('excel_file', file);

            $.ajax({
                url: '<?= base_url('Admin/ImportProcessAjax/upload') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    const data = JSON.parse(res);
                    if (data.status === 'success') {
                        addLog('File uploaded. Preview ready.');
                        document.getElementById('totalRecords').innerText = data.total_rows;
                        
                        // Show Preview
                        const tbody = document.querySelector('#previewTable tbody');
                        tbody.innerHTML = '';
                        data.preview.forEach(row => {
                            let tr = '<tr>';
                            row.forEach(cell => tr += `<td>${cell || ''}</td>`);
                            tr += '</tr>';
                            tbody.innerHTML += tr;
                        });
                        document.getElementById('previewArea').style.display = 'block';

                        document.getElementById('btnConfirmImport').onclick = function() {
                            document.getElementById('previewArea').style.display = 'none';
                            document.getElementById('importStats').style.display = 'block';
                            logContainer.style.display = 'block';
                            processFile(data.temp_file, data.total_rows);
                        };
                    } else {
                        addLog('Upload failed: ' + data.msg, 'error');
                        alert(data.msg);
                    }
                },
                error: function() {
                    addLog('Upload error', 'error');
                }
            });
        }

        async function processFile(tempFile, totalRows) {
            let processed = 0;
            const batchSize = 10; // Process 10 rows at a time
            let stats = {
                imported: 0,
                duplicates: 0,
                missing: 0,
                errors: 0
            };

            progressStatus.innerText = 'Processing rows...';

            while (processed < totalRows) {
                try {
                    const res = await $.ajax({
                        url: '<?= base_url('Admin/ImportProcessAjax/process') ?>',
                        type: 'POST',
                        data: {
                            temp_file: tempFile,
                            start: processed + 1, // +1 because rows are usually 1-indexed in Excel (header is 1, data starts at 2)
                            limit: batchSize
                        }
                    });

                    const data = JSON.parse(res);
                    if (data.status === 'success') {
                        stats.imported += data.imported;
                        stats.duplicates += data.duplicates;
                        stats.missing += data.missing;
                        stats.errors += data.errors;
                        
                        processed += batchSize;
                        if (processed > totalRows) processed = totalRows;

                        const percent = Math.round((processed / totalRows) * 100);
                        progressBar.style.width = percent + '%';
                        progressPercent.innerText = percent + '%';
                        
                        addLog(`Processed ${processed}/${totalRows} rows...`);
                        
                        // Update intermediate stats
                        document.getElementById('importedRecords').innerText = stats.imported;
                        document.getElementById('duplicateRecords').innerText = stats.duplicates;
                        document.getElementById('missingMobileRecords').innerText = stats.missing;
                    } else {
                        addLog('Partial error: ' + data.msg);
                        processed += batchSize;
                    }
                } catch (err) {
                    addLog('Error processing batch starting at ' + processed);
                    processed += batchSize;
                }
            }

            finishImport(stats);
        }

        function finishImport(stats) {
            progressStatus.innerText = 'Import Complete!';
            progressBar.classList.remove('progress-bar-animated');
            progressBar.classList.add('bg-success');
            addLog('Import finished successfully!');

            summaryDashboard.style.display = 'block';
            
            if (stats.errors > 0) document.getElementById('btnDownloadErrors').style.display = 'inline-block';
            if (stats.missing > 0) document.getElementById('btnDownloadMissing').style.display = 'inline-block';
            if (stats.duplicates > 0) document.getElementById('btnDownloadDuplicates').style.display = 'inline-block';
        }
    </script>
</body>
</html>
