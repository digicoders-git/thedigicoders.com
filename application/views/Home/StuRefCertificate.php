<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Certificate Result | DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description" content="Verify and download student referral certificates from DigiCoders Technologies Pvt. Ltd. portal.">
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
            width: 180px;
            margin-bottom: 30px;
        }

        .result-header {
            border-bottom: 2px solid #006DAB;
            padding-bottom: 15px;
            margin-bottom: 35px;
            text-align: left;
        }

        .result-title {
            font-size: 1.8rem;
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
            font-size: 1.1rem;
            font-weight: 600;
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
            header, footer, .btn-premium, .include-header, .include-footer {
                display: none !important;
            }
            .page-content {
                padding: 0;
                background: none;
            }
            .result-card {
                box-shadow: none !important;
                border: 1px solid #ccc !important;
                margin: 0 !important;
                padding: 30px !important;
                max-width: 100% !important;
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
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <?php if(!empty($userdata)): ?>
                        <?php foreach ($userdata as $data): ?>
                            <div class="result-card">
                                <div class="text-center text-md-left">
                                    <img src="<?= base_url('public/assets/images/Logo.png') ?>" alt="DigiCoders Logo" class="company-logo-result">
                                </div>
                                
                                <div class="result-header">
                                    <h1 class="result-title">Training Verification Result</h1>
                                    <p class="result-subtitle">Confirmed training credentials from DigiCoders Technologies</p>
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
                                        <span class="data-value"><?= $data->training_start_date; ?> - <?= $data->training_end_date; ?></span>
                                    </div>
                                </div>

                                <div class="action-container">
                                     <!-- <a href="<?= (isset($data->image) && strpos($data->image, 'http') === 0) ? $data->image : base_url('public/uploads/certificate/') . $data->image ?>" download="Certificate_<?= $data->refrence_no ?>" class="btn-premium btn-download"> 
                                        <i class="fa fa-download"></i> Download Image
                                    </a> -->
                                    
                                    <button onclick="window.print()" class="btn-premium btn-print">
                                        <i class="fa fa-print"></i> Print Result PDF
                                    </button>

                                    <button onclick="window.location.href='<?= base_url() ?>Home/VerifyCertificate'" class="btn-premium btn-back">
                                        <i class="fa fa-search"></i> Search More
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="result-card text-center">
                            <h2 class="text-danger">No Certificate Found!</h2>
                            <p>Please check your reference number and try again.</p>
                            <button onclick="window.location.href='<?= base_url() ?>Home/VerifyCertificate'" class="btn-premium btn-download mx-auto">
                                Go Back to Search
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>