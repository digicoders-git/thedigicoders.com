<!DOCTYPE html>
<html lang="en">

<head>
    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="<?= base_url('public') ?>/assets/images/favicon.png" type="image/x-icon">
    <!-- All PLUGINS CSS ============================================= -->
    <link href="<?= base_url('public') ?>/assets/css/assets.css" rel="stylesheet" />
    <!-- TYPOGRAPHY ============================================= -->
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap"
        rel="stylesheet">
    <!-- STYLESHEETS ============================================= -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
    <title>Registration Fee Receipt - TheDigiCoders</title>

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        .receipt-container {
            max-width: 1050px;
            margin: 20px auto;
            position: relative;
        }

        .receipt-card {
            background: #fff;
            position: relative;
            padding: 10px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            border: 2px solid #002147;
            overflow: hidden;
        }

        /* Micro-text security border */
        .receipt-card::before {
            content: "DIGICODERS TECHNOLOGIES VERIFIED DOCUMENT • DIGICODERS TECHNOLOGIES VERIFIED DOCUMENT • DIGICODERS TECHNOLOGIES VERIFIED DOCUMENT • ";
            position: absolute;
            top: 2px;
            left: 2px;
            right: 2px;
            font-size: 6px;
            color: rgba(0, 33, 71, 0.1);
            white-space: nowrap;
            overflow: hidden;
            z-index: 10;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .receipt-inner {
            border: 1px solid rgba(0, 33, 71, 0.2);
            padding: 15px 35px;
            /* Reduced vertical padding */
            position: relative;
            overflow: hidden;
            min-height: 460px;
            /* Further Reduced Height for ultra-sleek look */
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20 0 L30 20 L20 40 L10 20 Z' fill='%23002147' fill-opacity='0.02'/%3E%3C/svg%3E");
            background-size: 80px 40px;
            /* Vertical continuous Rhombus lines with horizontal gaps */
        }

        /* Center Watermark */
        .receipt-inner::after {
            content: "";
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            width: 450px;
            height: 450px;
            background: url("<?= base_url('public/assets/images/DigiCoders Logo Black.png') ?>") no-repeat center;
            background-size: contain;
            opacity: 0.02;
            /* Extra-light large watermark */
            pointer-events: none;
            z-index: 0;
        }

        .header-main {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #002147;
            padding-bottom: 8px;
            margin-bottom: 15px;
            position: relative;
            z-index: 5;
        }

        .logo-box img {
            height: 65px;
        }

        .company-info {
            text-align: right;
            color: #002147;
        }

        .company-info h4 {
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        .contact-details {
            font-size: 11px;
            line-height: 1.3;
            margin-top: 3px;
            font-weight: 500;
        }

        .receipt-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-weight: 700;
            color: #002147;
            font-size: 13px;
            position: relative;
            z-index: 5;
        }

        .receipt-title-row {
            text-align: center;
            margin-bottom: 15px;
            /* Reduced margin */
            position: relative;
            z-index: 5;
        }

        .title-badge {
            font-family: 'Playfair Display', serif;
            color: #002147;
            font-size: 26px;
            font-weight: 700;
            display: inline-block;
            position: relative;
            padding: 0 15px;
        }

        .title-badge::before,
        .title-badge::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 50px;
            border-top: 1px solid #f7b205;
        }

        .title-badge::before {
            right: 100%;
        }

        .title-badge::after {
            left: 100%;
        }

        .address-text {
            color: #666;
            font-size: 10px;
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 35px;
            margin-bottom: 15px;
            position: relative;
            z-index: 5;
        }

        .info-row {
            display: flex;
            align-items: baseline;
            margin-bottom: 8px;
        }

        .label-text {
            font-weight: 600;
            color: #002147;
            min-width: 130px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .value-text {
            flex: 1;
            border-bottom: 1px dotted #888;
            padding-left: 5px;
            color: #111;
            font-size: 14px;
            font-weight: 600;
            min-height: 18px;
        }

        .full-width-row {
            grid-column: 1 / -1;
        }

        .checkpoint-group {
            display: flex;
            gap: 25px;
            margin: 15px 0;
            padding: 8px 0;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 5;
        }

        .cstmck {
            display: inline-flex;
            align-items: center;
            font-size: 12px;
            font-weight: 700;
            color: #002147;
            text-transform: uppercase;
        }

        .checkmark {
            width: 16px;
            height: 16px;
            border: 2px solid #002147;
            border-radius: 2px;
            margin-right: 8px;
            position: relative;
            background: #fff;
        }

        .cstmck input {
            display: none;
        }

        .cstmck input:checked+.checkmark::after {
            content: "✓";
            position: absolute;
            top: -4px;
            left: 1px;
            color: #002147;
            font-weight: 900;
            font-size: 14px;
        }

        .pricing-section {
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            margin-top: 15px;
            gap: 20px;
            position: relative;
            z-index: 5;
        }

        .amount-row-container {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right, #fcfcfc, #f8f9fa);
            padding: 10px 20px;
            border: 1px solid #eee;
            border-left: 5px solid #002147;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        /* Diagonal pattern on amount field */
        .amount-row-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(0, 0, 0, 0.01) 10px, rgba(0, 0, 0, 0.01) 11px);
        }

        .amount-display {
            font-size: 28px;
            font-weight: 900;
            /* Bolder visibility */
            color: #002147;
            line-height: 1;
            position: relative;
            margin-top: -6px;
            /* Move text higher */
        }

        .amount-label {
            font-size: 10px;
            color: #666;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .status-badge {
            font-weight: 800;
            font-size: 12px;
            text-transform: uppercase;
        }

        .verification-box {
            width: 140px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid #eee;
            padding: 5px;
            border-radius: 4px;
        }

        .qr-placeholder {
            width: 70px;
            height: 70px;
            background: url("https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= base_url('Home/Receipt/' . $userdata->id) ?>") no-repeat center;
            /* Pointing to Receipt Detail for Verification */
            background-size: contain;
        }

        .qr-label {
            font-size: 8px;
            color: #888;
            margin-top: 5px;
            text-align: center;
            font-weight: 600;
        }

        .status-stamp {
            position: absolute;
            top: 50%;
            left: 70%;
            transform: translate(-50%, -50%) rotate(-15deg);
            width: 180px;
            opacity: 0.2;
            pointer-events: none;
            z-index: 10;
        }

        .footer-main {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 25px;
            position: relative;
            z-index: 5;
        }

        .note-area {
            flex: 1;
            max-width: 55%;
        }

        .note-text {
            color: #dc3545;
            font-size: 10px;
            font-weight: 600;
            line-height: 1.3;
            /* Reduced line-height */
            padding: 5px 8px;
            /* Reduced padding */
            border-left: 2px solid #dc3545;
            background: rgba(220, 53, 69, 0.03);
            margin-bottom: 8px;
            /* Push note up Relative to logos */
        }

        .sign-area {
            text-align: center;
            min-width: 180px;
            /* Reduced width */
        }

        .signature-img {
            max-height: 50px;
            /* Reduced height */
            margin-bottom: 2px;
            mix-blend-mode: multiply;
        }

        .sign-line {
            border-top: 1px solid #002147;
            width: 100%;
            padding-top: 3px;
            font-weight: 700;
            font-size: 11px;
            color: #002147;
            text-transform: uppercase;
        }

        .certification-logos {
            display: flex;
            justify-content: space-between;
            /* Better spread (faila look) */
            align-items: center;
            gap: 10px;
            margin-top: 15px;
            padding: 10px 0;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 5;
        }

        .certification-logos img {
            height: 32px;
            /* Slightly smaller for better fit */
            opacity: 0.9;
            transition: transform 0.3s;
        }

        .corp-details {
            text-align: center;
            font-size: 9px;
            font-weight: 700;
            color: #444;
            margin-top: 5px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            padding-top: 5px;
        }

        .certification-logos img:hover {
            transform: translateY(-3px) scale(1.05);
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: #fff;
                margin: 0;
            }

            .receipt-card {
                box-shadow: none;
                border: 1px solid #002147;
            }

            .receipt-inner {
                min-height: 500px;
            }
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="no-print text-center mb-4">
            <button class="btn btn-warning shadow-sm" id="btnJPg"><i class="fa fa-image"></i> Export JPG</button>
            <button onclick="createPDF()" class="btn btn-primary shadow-sm"><i class="fa fa-file-pdf"></i> Download
                PDF</button>
            <a href="<?= base_url(); ?>" class="btn btn-danger shadow-sm"><i class="fa fa-home"></i> Home</a>
            <?php if ($this->uri->segment(2) == 'PaymentResponse') { ?>
                <a href="<?= $grouplink->url; ?>" class="btn btn-success shadow-sm ml-2"><i class="fa fa-whatsapp"></i> Join
                    WhatsApp</a>
            <?php } ?>
        </div>

        <div id="element-to-print" class="receipt-card">
            <div class="receipt-inner" id="capture">
                <!-- Watermark Stamp -->
                   <?php if ($userdata->txn_status == 'PAID') { ?>
                    <img src="<?= base_url('public/assets/images/paid.png') ?>" class="status-stamp">
              
                <?php } elseif ($userdata->txn_status == 'FAILED') { ?>
                    <img src="<?= base_url('public/assets/images/round-failed-stamp.png') ?>" class="status-stamp">
                <?php } else { ?>
                    <img src="<?= base_url('public/assets/images/pending.jpg') ?>" class="status-stamp">
                <?php } ?>

                <!-- Header -->
                <div class="header-main">
                    <div class="logo-box">
                        <img src="<?= base_url('public/assets/images/DigiCoders Logo Black.png') ?>" alt="Logo">
                    </div>
                    <div class="company-info">
                        <h4>DigiCoders Technologies</h4>
                        <div class="contact-details">
                            ISO 9001:2015 Certified Organization<br>
                            Ph: +91 9140-96-7607, +91 6394-29-6293<br>
                            Email: info@digicoders.in | Web: www.thedigicoders.com
                        </div>
                    </div>
                </div>

                <div class="receipt-meta">
                    <span>Date: <?= date('d/m/Y', strtotime($userdata->date)); ?></span>
                    <span>Serial No: #<?= $userdata->id; ?></span>
                </div>

                <div class="receipt-title-row">
                    <div class="title-badge">FEE RECEIPT</div>
                    <div class="address-text">B-36, Sector O, Ram Ram Bank Chauraha, Aliganj, Lucknow, UP - 226021</div>
                </div>

                <!-- Content Grid -->
                <div class="info-grid">
                    <div class="info-row full-width-row">
                        <span class="label-text">Student Name</span>
                        <span class="value-text"><?= $userdata->student_name; ?></span>
                    </div>
                    <div class="info-row full-width-row">
                        <span class="label-text">College/University</span>
                        <span class="value-text"><?= $userdata->college_name; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label-text">Technology</span>
                        <span class="value-text"><?= $userdata->course; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label-text">Academic Year</span>
                        <span class="value-text"><?= $userdata->edu_year; ?></span>
                    </div>
                    <div class="info-row full-width-row">
                        <span class="label-text">On account of</span>
                        <span class="value-text"><?= $userdata->training_type; ?></span>
                    </div>
                </div>

                <!-- Checkpoints -->
                <div class="checkpoint-group">
                    <span class="label-text" style="min-width: 130px; display: inline-block;">Fee Type:</span>
                    <label class="cstmck">
                        <input type="checkbox" checked disabled>
                        <span class="checkmark"></span> Registration Fee
                    </label>
                    <label class="cstmck">
                        <input type="checkbox" disabled>
                        <span class="checkmark"></span> Training Fee
                    </label>
                </div>

                <!-- Payment Modes -->
                <div class="checkpoint-group" style="margin-top: -5px;">
                    <span class="label-text" style="min-width: 130px; display: inline-block;">Payment Mode:</span>
                    <label class="cstmck">
                        <input type="checkbox"  disabled>
                        <span class="checkmark"></span> Cash
                    </label>
                    <label class="cstmck">
                        <input type="checkbox" checked  disabled>
                        <span class="checkmark"></span> Online
                    </label>
                    <label class="cstmck">
                        <input type="checkbox"  disabled>
                        <span class="checkmark"></span> Paytm
                    </label>
                    <label class="cstmck">
                        <input type="checkbox"  disabled>
                        <span class="checkmark"></span> Cheque
                    </label>
                </div>

                <div class="info-row">
                    <span class="label-text">Amount (Words)</span>
                    <span class="value-text" style="text-transform: uppercase;">
                        <?= $this->common->getAmountInWords($userdata->amount); ?> ONLY
                    </span>
                </div>

                <!-- Pricing & Verification Area -->
                <div class="pricing-section">
                    <div class="amount-row-container">
                        <div class="amount-box">
                            <span class="amount-label">Paid Amount</span>
                            <span class="amount-display">₹ <?= number_format($userdata->amount, 2); ?></span>
                        </div>
                        <div class="status-badge">
                            Status:
                            <?php if ($userdata->txn_status == 'PAID') { ?>
                                <span class="text-success">● PAID</span>
                            <?php } elseif ($userdata->txn_status == 'FAILED') { ?>
                                <span class="text-danger">● FAILED</span>
                            <?php } else { ?>
                                <span class="text-info">● PENDING</span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="verification-box">
                        <div class="qr-placeholder"></div>
                        <div class="qr-label">SCAN TO VERIFY</div>
                    </div>
                </div>

                <div class="footer-main">
                    <div class="note-area">
                        <div class="note-text">
                            <strong>IMPORTANT NOTE:</strong><br>
                            Submitted fee is non-refundable and non-transferable under any circumstances.
                        </div>
                    </div>
                    <div class="sign-area">
                        <img src="<?= base_url('public/assets/images/sign.png') ?>" class="signature-img"><br>
                        <div class="sign-line">Authorized Signature & Stamp</div>
                    </div>
                </div>

                <!-- Certification logos -->
                <div class="certification-logos">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-iso.jpeg') ?>" alt="ISO">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-msme.jpeg') ?>" alt="MSME">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-gem.jpeg') ?>" alt="GEM">
                    <img src="<?= base_url('public/assets/images/icon/startup-india-digicoders.jpeg') ?>"
                        alt="Startup India">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-MCA.jpeg') ?>" alt="MCA">
                    <img src="<?= base_url('public/assets/images/icon/Digital-India-digicoders.jpeg') ?>"
                        alt="Digital India">
                </div>

                <div class="corp-details">
                    CIN: U72900UP2019PTC113696 &nbsp; | &nbsp; GSTIN: 09AAHCD1032D1Z6
                </div>

                <?php if (!empty($userdata->couponcode)) { ?>
                    <div class="mt-1 text-right" style="font-size: 8px; color: #999;">
                        Coupon: <?= $userdata->couponcode ?> (₹<?= $userdata->coupon_descount ?> Off)
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        function createPDF() {
            const element = document.getElementById('element-to-print');
            const opt = {
                margin: 0.1,
                filename: 'Registration_Receipt_#<?= $userdata->id ?>_<?= str_replace(" ", "_", $userdata->student_name) ?>.pdf',
                image: { type: 'jpeg', quality: 1.0 },
                html2canvas: { scale: 3, useCORS: true },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
            };
            html2pdf().set(opt).from(element).save();
        }

        document.getElementById("btnJPg").addEventListener("click", function () {
            const btn = this;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';
            btn.disabled = true;

            html2canvas(document.querySelector("#capture"), {
                scale: 3,
                useCORS: true
            }).then(function (canvas) {
                const link = document.createElement("a");
                link.download = 'Registration_Receipt_#<?= $userdata->id ?>_<?= str_replace(" ", "_", $userdata->student_name) ?>.jpg';
                link.href = canvas.toDataURL("image/jpeg", 1.0);
                link.click();
                btn.innerHTML = '<i class="fa fa-image"></i> Export JPG';
                btn.disabled = false;
            });
        });
    </script>
</body>

</html>