<!DOCTYPE html>
<html lang="en">

<head>
    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="<?= base_url('public') ?>/assets/images/favicon.png" type="image/x-icon">
    <!-- All PLUGINS CSS ============================================= -->
    <link href="<?= base_url('public') ?>/assets/css/assets.css" rel="stylesheet" />
    <!-- TYPOGRAPHY ============================================= -->
    <title>Fee Payment Reciept - TheDigiCoders</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f2f5;
            color: #000;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            max-width: 950px;
            /* Reduced width */
            margin: 20px auto;
        }

        .receipt-card {
            background: #fff;
            padding: 20px 40px;
            border: 1px solid #ccc;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .receipt-inner {
            position: relative;
            z-index: 5;
            background: transparent;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 85px;
            font-weight: 900;
            color: rgba(0, 0, 0, 0.03);
            white-space: nowrap;
            pointer-events: none;
            z-index: 0;
        }

        /* Header */
        .head-flex {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 5px;
        }

        .head-left {
            width: 33%;
        }

        .head-left h3 {
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 6px 0;
        }

        .head-left p {
            margin: 0 0 4px 0;
            font-size: 13px;
            font-weight: 700;
        }

        .head-center {
            width: 44%;
            text-align: center;
        }

        .head-center img {
            max-width: 350px;
        }

        .head-right {
            width: 33%;
            text-align: right;
        }

        .head-right img {
            max-width: 80px;
        }

        .address-box {
            text-align: center;
            font-size: 12.5px;
            border-bottom: 1.5px solid #000;
            padding-bottom: 5px;
            margin-bottom: 12px;
            line-height: 1.5;
        }

        /* Fields */
        .form-row {
            display: flex;
            margin-bottom: 10px;
            align-items: flex-end;
        }

        .form-col-1 {
            display: flex;
            width: 65%;
            align-items: flex-end;
            padding-right: 15px;
        }

        .form-col-2 {
            display: flex;
            width: 35%;
            align-items: flex-end;
        }

        .form-col-full {
            display: flex;
            width: 100%;
            align-items: flex-end;
        }

        .label {
            font-weight: 700;
            font-size: 14px;
            margin-right: 8px;
            white-space: nowrap;
        }

        .value {
            flex-grow: 1;
            border-bottom: 1.5px solid #000;
            padding-bottom: 2px;
            font-size: 15px;
            font-weight: 500;
            color: #000;
        }

        /* Checkbox */
        .chk-group {
            display: flex;
            align-items: center;
        }

        .chk-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
            font-size: 14px;
        }

        .chk-box {
            width: 14px;
            height: 14px;
            border: 1px solid #7a8b9f;
            border-radius: 2px;
            margin-right: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
        }

        .chk-box.checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .chk-box.checked::after {
            content: "✓";
            color: #fff;
            font-size: 10px;
            font-weight: 900;
        }

        /* Bottom Section - Centered */
        .bottom-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .left-bottom-wrap {
            display: flex;
            flex-direction: column;
        }

        .amt-wrap {
            display: flex;
            border: 1px solid #7a8b9f;
            align-items: stretch;
            border-radius: 1px;
            width: max-content;
            background: #eff6fb;
            margin-bottom: 12px;
        }

        .amt-sym {
            padding: 8px 18px;
            font-size: 16px;
            font-weight: 700;
            border-right: 1px solid #7a8b9f;
            display: flex;
            align-items: center;
        }

        .amt-val {
            padding: 8px 100px 8px 20px;
            font-size: 17px;
            font-weight: 800;
            display: flex;
            align-items: center;
        }

        .pay-stat {
            font-size: 15px;
            font-weight: 700;
            margin-left: 20px;
            margin-top: -10px;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }

        .stat-green {
            color: #198754;
            margin-left: 8px;
            margin-top: 5px;
            font-weight: 800;
        }

        .stat-red {
            color: #dc3545;
            margin-left: 8px;
            margin-top: 5px;
            font-weight: 800;
        }

        .stat-warn {
            color: #f39c12;
            margin-left: 8px;
            margin-top: 5px;
            font-weight: 800;
        }

        .stamp-wrap {
            text-align: center;
            z-index: 10;
        }

        .stamp-wrap img {
            width: 125px;
            transform: rotate(-10deg);
        }

        .sign-wrap {
            text-align: center;
            width: 250px;
        }

        .sign-img {
            height: 90px;
            margin-bottom: -5px;
            mix-blend-mode: multiply;
        }

        .sign-text {
            border-top: 1.5px solid #000;
            padding-top: 5px;
            font-size: 14px;
            font-weight: 700;
        }

        /* Footer Info */
        .footer-note {
            font-size: 13px;
            font-weight: 700;
            font-style: italic;
            margin-top: 0;
        }

        .cin-wrap {
            text-align: center;
            font-size: 12.5px;
            font-weight: 700;
            margin: 10px 0 15px 0;
        }

        .cin-wrap span {
            font-size: 12.5px;
            font-weight: 400;
        }


        .logos-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .logos-row img {
            max-height: 42px;
            width: auto;
            object-fit: contain;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: #fff;
            }

            .receipt-card {
                box-shadow: none;
                border: 1px solid #000;
                padding: 20px 30px;
                margin: 0;
            }

            .receipt-container {
                margin: 0;
                max-width: 100%;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php
    $receipt_date = strtotime($userdata->date);
    $receipt_year = date('Y', $receipt_date);
    $receipt_no = 'DCT-' . $receipt_year . '-' . $userdata->id;
    ?>

    <div class="no-print text-center mt-3 mb-3">
        <button class="btn btn-warning" id="btnJPg"><i class="fa fa-image"></i> JPG</button>
        <button onclick="createPDF()" class="btn btn-primary"><i class="fa fa-file-pdf"></i> PDF</button>
        <a href="<?= base_url(); ?>" class="btn btn-danger"><i class="fa fa-home"></i> Home</a>
    </div>

    <div class="receipt-container">
        <!-- Capture receipt-card -->
        <div id="element-to-print" class="receipt-card">
            <div class="watermark">Digi{Coders}</div>
            <div class="receipt-inner">

                <!-- HEADER -->
                <div class="head-flex">
                    <div class="head-left">
                        <h3>Fee Payment Receipt</h3>
                        <p>Date : <?= date('Y-m-d', $receipt_date); ?></p>
                        <p>Receipt No. : <?= $receipt_no; ?></p>
                    </div>
                    <div class="head-center">
                        <img src="<?= base_url('public/assets/images/DigiCoders Logo Black.png') ?>" alt="Logo">
                    </div>
                    <div class="head-right">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=<?= base_url('Home/Receipt/' . $userdata->id) ?>"
                            alt="QR">
                    </div>
                </div>

                <div class="address-box">
                    B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow Uttar Pradesh 226021<br>
                    info@digicoders.in, www.thedigicoders.com<br>
                    +91 9140-96-7607, +91 6394-29-6293, 0522-4235604
                </div>

                <!-- FORM FIELDS -->
                <div class="form-row">
                    <div class="form-col-1">
                        <span class="label">Name:</span>
                        <div class="value"><?= strtoupper($userdata->student_name); ?></div>
                    </div>
                    <div class="form-col-2">
                        <span class="label">Mobile No:</span>
                        <div class="value"><?= $userdata->mobile; ?></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col-full">
                        <span class="label">College:</span>
                        <div class="value"><?= $userdata->college_name; ?></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col-1">
                        <span class="label">Course:</span>
                        <div class="value"><?= $userdata->course; ?></div>
                    </div>
                    <div class="form-col-2">
                        <span class="label">Academic Year:</span>
                        <div class="value"><?= $userdata->edu_year; ?></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col-full">
                        <span class="label">Registered For :</span>
                        <div class="value"><?= $userdata->training_type; ?></div>
                    </div>
                </div>

                <!-- Payment Mode -->
                <div class="form-row chk-group" style="padding-bottom:0; margin-bottom:12px;">
                    <div class="form-col-full" style="align-items:center;">
                        <span class="label" style="margin-right:25px;">Payment Mode:</span>
                        <div class="chk-item">
                            <div class="chk-box <?= ($userdata->payment_mode == 'Cash') ? 'checked' : '' ?>"></div> Cash
                        </div>
                        <div class="chk-item">
                            <div class="chk-box checked"></div> Online
                        </div>
                        <div class="chk-item">
                            <div class="chk-box <?= ($userdata->payment_mode == 'Cheque') ? 'checked' : '' ?>"></div>
                            Cheque
                        </div>
                    </div>
                </div>

                <!-- Amount In Words -->
                <div class="form-row">
                    <div class="form-col-full">
                        <span class="label">Amount In Words:</span>
                        <div class="value"><?= strtoupper($this->common->getAmountInWords($userdata->amount)); ?> ONLY
                        </div>
                    </div>
                </div>

                <!-- Includes -->
                <div class="form-row chk-group" style="padding-bottom:0; margin-bottom:2px;">
                    <div class="form-col-full" style="align-items:center;">
                        <span class="label" style="margin-right:25px;">Includes:</span>
                        <div class="chk-item">
                            <div class="chk-box <?= ($userdata->payment_type == 'Full Fee') ? 'checked' : '' ?>"></div>
                            Training Fee
                        </div>
                        <div class="chk-item">
                            <div
                                class="chk-box <?= ($userdata->payment_type == 'Registration Fee' || $userdata->payment_type == 'Full Fee') ? 'checked' : '' ?>">
                            </div> Registration Fee
                        </div>
                    </div>
                </div>

                <!-- Bottom Section -->
                <div class="bottom-section">
                    <div class="left-bottom-wrap">
                        <div style="display:flex; align-items:center;">
                            <div class="amt-wrap">
                                <div class="amt-sym">₹</div>
                                <div class="amt-val">
                                    <?= number_format($userdata->amount); ?> /-
                                </div>
                            </div>
                            <div class="pay-stat">
                                Payment Status :
                                <?php if ($userdata->txn_status == 'PAID' || $userdata->txn_status == 'SUCCESS') { ?>
                                    <span class="stat-green"><?= ($userdata->payment_type == 'Full Fee') ? 'FULL PAID' : 'PAID' ?></span>
                                <?php } elseif ($userdata->txn_status == 'FAILED') { ?>
                                    <span class="stat-red">FAILED</span>
                                <?php } else { ?>
                                    <span class="stat-warn">PENDING</span>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Footer details -->
                        <div class="footer-note">
                            Note: Submitted fee is not refundable or transferable
                        </div>
                    </div>

                    <!-- Stamp overlays -->
                    <div class="stamp-wrap">
                        <?php if ($userdata->txn_status == 'PAID' || $userdata->txn_status == 'SUCCESS') { ?>
                            <img src="<?= base_url('public/assets/images/paid.png') ?>" alt="Paid">
                        <?php } elseif ($userdata->txn_status == 'FAILED') { ?>
                            <img src="<?= base_url('public/assets/images/round-failed-stamp.png') ?>" alt="Failed">
                        <?php } else { ?>
                            <img src="<?= base_url('public/assets/images/pending.jpg') ?>" alt="Pending"
                                style="mix-blend-mode: multiply;">
                        <?php } ?>
                    </div>

                    <div class="sign-wrap">
                        <img src="<?= base_url('public/assets/images/sign.png') ?>" class="sign-img" alt="Sign">
                        <div class="sign-text">Authorized Sign & Stamp</div>
                    </div>
                </div>

                <div class="cin-wrap">
                    CIN: <span>U72900UP2019PTC113696</span> &nbsp;&nbsp;&nbsp; GSTIN: <span>09AAHCD1032D1Z6</span>
                </div>

                <div class="logos-row">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-iso.jpeg') ?>" alt="ISO">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-gem.jpeg') ?>" alt="GEM">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-MCA.jpeg') ?>" alt="MCA">
                    <img src="<?= base_url('public/assets/images/icon/digicoders-msme.jpeg') ?>" alt="MSME">
                    <img src="<?= base_url('public/assets/images/icon/Digital-India-digicoders.jpeg') ?>"
                        alt="DIGITAL INDIA">
                    <img src="<?= base_url('public/assets/images/icon/startup-india-digicoders.jpeg') ?>"
                        alt="Startup India">
                </div>

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
                margin: [0.1, 0, 0.4, 0],
                filename: 'Fee_Payment_Receipt_<?= $userdata->id ?>_<?= str_replace(" ", "_", $userdata->student_name) ?>.pdf',
                image: { type: 'jpeg', quality: 1.0 },
                html2canvas: { scale: 3, useCORS: true },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
            };
            html2pdf().set(opt).from(element).save();
        }

        document.getElementById("btnJPg").addEventListener("click", function () {
            const btn = this;
            btn.innerHTML = '...';
            btn.disabled = true;
            html2canvas(document.getElementById("element-to-print"), {
                scale: 3,
                useCORS: true
            }).then(function (canvas) {
                const link = document.createElement("a");
                link.download = 'Fee_Payment_Receipt_<?= $userdata->id ?>_<?= str_replace(" ", "_", $userdata->student_name) ?>.jpg';
                link.href = canvas.toDataURL("image/jpeg", 1.0);
                link.click();
                btn.innerHTML = '<i class="fa fa-image"></i> JPG';
                btn.disabled = false;
            });
        });
    </script>
</body>

</html>