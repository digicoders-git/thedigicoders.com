<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Certificate Result | DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description"
        content="Download your industrial training and project completion certificates from DigiCoders Technologies Pvt. Ltd. Verified IT training in Lucknow with live projects.">
    <?php include('include/headerlinks.php') ?>
    <style>
        .page-content {
            background-color: #f7f9fc;
            background-image:
                radial-gradient(at 0% 0%, rgba(0, 109, 171, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(231, 96, 40, 0.04) 0px, transparent 50%);
            min-height: 90vh;
            display: flex;
            align-items: center;
            padding: 60px 0;
        }

        .result-card {
            background: #ffffff !important;
            padding: 50px;
            border-radius: 0px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 5;
            border: 1px solid #eee !important;
            max-width: 850px;
            margin: auto;
            width: 100%;
        }

        .company-logo-result {
            width: 100px;
            margin-bottom: 0px;
        }

        .result-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #006DAB;
            letter-spacing: -0.5px;
            text-transform: uppercase;
            margin: 0;
        }

        .result-subtitle {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
            margin-top: 5px;
        }

        .result-main-header {
            border-bottom: 2px solid #006DAB;
            padding-bottom: 20px;
            margin-bottom: 35px;
        }

        .data-row {
            margin-bottom: 20px;
            border-bottom: 1px solid #f5f5f5;
            padding-bottom: 10px;
        }

        .data-label {
            font-weight: 700;
            color: #444;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 4px;
        }

        .data-value {
            font-size: 1rem;
            font-weight: 500;
            color: #006DAB;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 15px;
            background: #28a745;
            color: #fff;
            font-weight: 700;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        .action-container {
            margin-top: 40px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-premium {
            padding: 12px 30px;
            border-radius: 0px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .btn-download {
            background: #006DAB;
            color: #fff;
        }

        .btn-download:hover {
            background: #005a8e;
            color: #fff;
            text-decoration: none;
        }

        .btn-print {
            background: #E76028;
            color: #fff;
        }

        .btn-print:hover {
            background: #d4521f;
            color: #fff;
        }

        .btn-back {
            background: #666;
            color: #fff;
        }

        .btn-back:hover {
            background: #444;
            color: #fff;
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }

            body {
                background: #fff !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 297mm !important;
            }

            header,
            footer,
            .btn-premium,
            .include-header,
            .include-footer,
            .floating-social,
            .dg-ribbon,
            .whats-app,
            .mobile,
            .back-to-top {
                display: none !important;
            }

            .page-content {
                padding: 0 !important;
                background: none !important;
                display: block !important;
            }

            .container {
                max-width: 100% !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .result-card {
                box-shadow: none !important;
                border: none !important;
                margin: 0 !important;
                padding: 10mm !important;
                width: 100mm !important;
                max-width: 100mm !important;
                min-height: 150mm !important;
                position: relative !important;
                background: #fff !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .result-main-header {
                display: flex !important;
                flex-direction: row !important;
                justify-content: space-between !important;
                align-items: center !important;
                border-bottom: 2px solid #006DAB !important;
                padding-bottom: 20px !important;
                margin-bottom: 35px !important;
                text-align: center !important;
            }

            .result-main-header>div {
                margin-bottom: 0 !important;
            }

            .flex-grow-1 {
                flex: 1 !important;
            }

            .result-title {
                font-size: 22px !important;
                margin: 0 !important;
                display: block !important;
            }

            .result-subtitle {
                font-size: 14px !important;
                margin: 5px 0 0 0 !important;
                display: block !important;
            }

            .status-badge {
                background: #28a745 !important;
                color: #fff !important;
                display: inline-block !important;
                padding: 6px 15px !important;
                font-size: 12px !important;
                font-weight: 700 !important;
                text-transform: uppercase !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                border-radius: 0 !important;
                margin-bottom: 25px !important;
            }

            .row {
                display: flex !important;
                flex-wrap: wrap !important;
                margin-right: -15px !important;
                margin-left: -15px !important;
            }

            .col-md-6 {
                width: 50% !important;
                flex: 0 0 50% !important;
                max-width: 50% !important;
            }

            .col-md-4 {
                width: 33.33% !important;
                flex: 0 0 33.33% !important;
                max-width: 33.33% !important;
            }

            .data-row {
                border-bottom: 1px solid #f5f5f5 !important;
                margin-bottom: 20px !important;
                padding-bottom: 10px !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .data-label {
                font-size: 11px !important;
                color: #666 !important;
            }

            .data-value {
                font-size: 16px !important;
                color: #006DAB !important;
                word-break: break-all !important;
            }

            .stamp-logo-result {
                position: absolute !important;
                bottom: 20px !important;
                right: 50px !important;
                width: 120px !important;
                display: block !important;
                opacity: 1 !important;
                z-index: 100 !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

        @media (max-width: 768px) {
            .result-card {
                padding: 30px 20px;
            }

            .btn-premium {
                width: 100%;
                justify-content: center;
            }
        }

        .verify-badge-result {
            width: 110px;
            height: auto;
            margin-bottom: 0px;
            filter: drop-shadow(0 5px 15px rgba(0, 0, 0, 0.05));
        }

        .stamp-logo-result {
            position: absolute;
            bottom: 40px;
            right: 50px;
            width: 120px;
            height: auto;
            opacity: 0.9;
            z-index: 1;
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .stamp-logo-result {
                position: static;
                display: block;
                margin: 20px auto;
                width: 100px;
            }
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <?php if (!empty($userdata)): ?>
                        <?php foreach ($userdata as $data): ?>
                            <div class="result-card mb-5" id="certificate-content">
                                <div
                                    class="result-main-header d-md-flex justify-content-between align-items-center text-center text-md-left">
                                    <div class="mb-3 mb-md-0">
                                        <img src="<?= base_url('public/assets/images/logo-digicoders.png') ?>"
                                            alt="DigiCoders Logo" class="company-logo-result">
                                    </div>

                                    <div class="flex-grow-1 px-md-4 mb-3 mb-md-0 text-center">
                                        <h1 class="result-title">Training Verification Result</h1>
                                        <p class="result-subtitle mb-0">Confirmed training credentials from DigiCoders
                                            Technologies</p>
                                    </div>

                                    <div>
                                        <img src="<?= base_url('public/assets/images/verify.gif') ?>" alt="Verified Logo"
                                            class="verify-badge-result">
                                    </div>
                                </div>

                                <div class="status-badge mb-4">Official Verification: Valid</div>

                                <div class="row">
                                    <div class="col-md-6 data-row">
                                        <span class="data-label">Candidate Name</span>
                                        <span class="data-value"><?= $data->name; ?></span>
                                    </div>
                                    <div class="col-md-6 data-row">
                                        <span class="data-label">Reference Number</span>
                                        <span class="data-value"><?= $data->refrence_no; ?></span>
                                    </div>
                                    <div class="col-md-6 data-row">
                                        <span class="data-label">Technology Stack</span>
                                        <span class="data-value"><?= $data->technology; ?></span>
                                    </div>
                                    <div class="col-md-6 data-row">
                                        <span class="data-label">Course Name</span>
                                        <span class="data-value"><?= $data->course; ?></span>
                                    </div>
                                    <div class="col-md-4 data-row">
                                        <span class="data-label">Grade Achieved</span>
                                        <span class="data-value"><?= $data->grade; ?></span>
                                    </div>
                                    <div class="col-md-4 data-row">
                                        <span class="data-label">Training Duration</span>
                                        <span class="data-value"><?= $data->duration; ?></span>
                                    </div>
                                    <div class="col-md-4 data-row">
                                        <span class="data-label">Issue Date</span>
                                        <span class="data-value"><?= $data->certificate_issue_date; ?></span>
                                    </div>
                                    <div class="col-md-6 data-row">
                                        <span class="data-label">Training Period</span>
                                        <span class="data-value"><?= $data->training_start_date; ?> to
                                            <?= $data->training_end_date; ?></span>
                                    </div>
                                </div>

                                <div class="action-container">
                                    <!-- <a href="<?= (isset($data->image) && strpos($data->image, 'http') === 0) ? $data->image : base_url('public/uploads/certificate/') . $data->image ?>"
                                        download="Certificate_<?= $data->refrence_no ?>" class="btn-premium btn-download">
                                        <i class="fa fa-download"></i> Download Image
                                    </a> -->

                                    <button onclick="downloadImage()" class="btn-premium btn-print">
                                        <i class="fa fa-image"></i> Download
                                    </button>

                                    <button onclick="window.location.href='<?= base_url() ?>Home/VerifyCertificate'"
                                        class="btn-premium btn-back">
                                        <i class="fa fa-search"></i> Search More
                                    </button>
                                </div>
                                <img src="<?= base_url('public/assets/images/digicoders-stamp.png') ?>" class="stamp-logo-result">
                            </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="result-card text-center py-5">
                            <div class="mb-4">
                                <i class="fa fa-search-minus text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                            </div>
                            <h2 class="text-dark font-weight-bold">We couldn't find any records</h2>
                            <p class="text-muted mb-4">We apologize, but no training credentials were found matching the
                                information provided. <br>Please double-check the details and try again.</p>
                            <div class="d-flex justify-content-center gap-3 flex-wrap">
                                <button onclick="window.location.href='<?= base_url() ?>Home/VerifyCertificate'"
                                    class="btn-premium btn-download">
                                    <i class="fa fa-arrow-left"></i> Try Another Search
                                </button>
                                <button onclick="window.location.href='<?= base_url() ?>Home/Contact'"
                                    class="btn-premium btn-back">
                                    <i class="fa fa-headset"></i> Contact Support
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        function downloadImage() {
            const element = document.getElementById('certificate-content');
            const actionContainer = element.querySelector('.action-container');
            
            // Hide buttons for Image
            if(actionContainer) actionContainer.style.display = 'none';
            
            const fileName = "<?php if(!empty($userdata)) { foreach($userdata as $d) { echo $d->name.'-'.$d->refrence_no; break; } } ?>-certificate-digicoders.png";
            
            html2canvas(element, {
                scale: 3,
                useCORS: true,
                backgroundColor: "#ffffff"
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = fileName;
                link.href = canvas.toDataURL("image/png");
                link.click();
                
                // Show buttons again
                if(actionContainer) actionContainer.style.display = 'flex';
            });
        }
    </script>
</body>

</html>