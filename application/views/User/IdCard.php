<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Id Card - Software Development | Website Development | Mobile Application Development | Digital Marketing
        | Summer Training | Internship | Apprenticeship</title>
    <?php require('includes/CssLinks.php'); ?>
    <style>
        /* .card-img-overlay img {
            position: absolute;
            top: 23%;
            left: 34.3%;
            height: 120px;
            width: 100px;
        } */

        .card-img-overlay img {
            position: absolute;
            top: 22%;
            left: 28%;
            height: 190px;
            width: 160px;

        }

        .card-img-overlay .name,
        .card-img-overlay .course,
        .card-img-overlay .emroll,
        .card-img-overlay .mobile,
        .card-img-overlay .issue,
        .card-img-overlay .valid {
            position: absolute;
            left: 42%;
            font-size: 17px;
            font-weight: 600;
        }

        .card-img-overlay .name {
            top: 57%;
        }

        .card-img-overlay .course {
            top: 63%;
        }

        .card-img-overlay .emroll {
            top: 69%;
        }

        .card-img-overlay .mobile {
            top: 74%;
        }

        .card-img-overlay .issue {
            top: 80%;
        }

        .card-img-overlay .valid {
            top: 85%;
        }

        @media (max-width: 768px) {
            .card-img-overlay img {
                top: 21.9%;
                left: 28%;
                height: 172px;
                width: 144px;
            }

            .card-img-overlay .name {
                top: 57%;
                left: 42%;
            }

            .card-img-overlay .course {
                top: 63%;
                left: 42%;
            }

            .card-img-overlay .emroll {
                top: 68%;
                left: 42%;
            }

            .card-img-overlay .mobile {
                top: 74%;
                left: 42%;
            }

            .card-img-overlay .issue {
                top: 79%;
                left: 42%;
            }

            .card-img-overlay .valid {
                top: 85%;
                left: 42%;
            }
        }

        .small-font .card-img-overlay .name {
            top: 51.5%;
        }

        .small-font .card-img-overlay .course {
            top: 56.75%;
        }

        .small-font .card-img-overlay .emroll {
            top: 62.9%;
        }

        .small-font .card-img-overlay .mobile {
            top: 69.5%;
        }

        .small-font .card-img-overlay .issue {
            top: 75.7%;
        }

        .small-font .card-img-overlay .valid {
            top: 82%;
        }
    </style>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php require('includes/header.php'); ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php require('includes/sidebar.php'); ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">My Id Card</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group"></div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row d-flex justify-content-center">
                <div class="col-sm-4 ">
                    <div class="d-flex gap-1 justify-content-end">
                        <button id="downloadPngBtn" class="btn btn-success btn-sm"><i
                                class="bi bi-image me-1 "></i>PNG</button>
                        <button id="downloadPdfBtn" class="btn btn-danger btn-sm"><i
                                class="bi bi-file-pdf me-1 "></i>PDF</button>
                    </div>
                    <?php  //var_dump($idcard)  ?>
                    <div class="card mt-3 text-bg-dark text-dark">
                        <img src="<?= base_url('public/assets/images/digicoders_student_id_card.png') ?>"
                            class="card-img w-100 img-fluid" alt="...">
                        <div class="card-img-overlay">
                            <img src="<?= base_url(!empty($idcard->image) ? 'public/uploads/profile_photo/' . $idcard->image : 'public/assets/images/favicon.png') ?>"
                                class="Icard_img" alt="">

                            <p class="name"><?= !empty($idcard->student_name) ? $idcard->student_name : '' ?></p>
                            <p class="course"><?= !empty($idcard->technology) ? $idcard->technology : '' ?></p>
                            <p class="emroll">DCT25-<?= !empty($idcard->id) ? $idcard->id : '' ?></p>
                            <p class="mobile"><?= !empty($idcard->mobile) ? $idcard->mobile : '' ?></p>
                            <p class="issue">
                                <?= !empty($idcard->date) && strtotime($idcard->date) ? date('d-m-Y', strtotime($idcard->date)) : $idcard->date ?>
                            </p>
                            <p class="valid">
                                <!-- <?= !empty($idcard->date) && strtotime($idcard->date) ? date('d-m-Y', strtotime($idcard->date)) : $idcard->date ?> -->
                                <!-- <?= $idcard->training_type ?> -->
                                Training-2025
                            </p> 
                        </div> 
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <script>
        document.getElementById("downloadPngBtn").addEventListener("click", function () {
            html2canvas(document.querySelector(".card")).then(canvas => {
                let link = document.createElement('a');
                link.download = 'id_card.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        });

        document.getElementById("downloadPdfBtn").addEventListener("click", function () {
            const element = document.querySelector(".card");

            element.classList.add('small-font');

            const opt = {
                margin: [0, 0.1, 0, 0.1],
                padding: 0,
                filename: 'id_card.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: [5.700, 3.425], orientation: 'portrait' }
            };


            html2pdf().from(element).set(opt).save().finally(() => {
                element.classList.remove('small-font');

            });
        });
    </script>

    <?php require('includes/JsLinks.php'); ?>
</body>

</html>