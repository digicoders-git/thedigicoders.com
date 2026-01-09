<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Summer Internship Letter - Software Development | Website Development | Mobile Application Development |
        Digital
        Marketing | Summer Training | Internship | Apprenticeship</title>
    <?php require('includes/CssLinks.php'); ?>
    <style>
        /* .heading {
            position: absolute;
            top: 20%;
            left: 32%;
            }
            
            .border-bottom {
            position: absolute;
            top: 22.7%;
            border: 3px solid #e76028;
            width: 75%;
            left: 12.5%;
            } */

        .box_80 {
            position: absolute;
            top: 20%;
            width: 75%;
            left: 12.5%;
        }

        /* .description {
            font-size: 1.16rem;
            }
            
            .description span {
            color: #e76028;
            font-weight: 600;
            }
            
            .dear {
            margin-top: 15px;
            }
            
            .stu_name {
            margin-left: 40px;
            }
            
            @media (max-width:768px) {
            .heading {
            position: absolute;
            top: 19.5%;
            left: 25%;
            font-size: 15px;
            }
            
            .date h5 {
            font-size: 10px;
            }
            
            .dear {
            font-size: 13px;
            margin-top: 3px;
            }
            
            .stu_name {
            margin-left: 10px;
            font-size: 13px;
            line-height: 1%;
            }
            
            .border-bottom {
            position: absolute;
            top: 22.7%;
            border: 3px solid #e76028;
            width: 75%;
            left: 12.5%;
            } */

        /* .box_80 {
            position: absolute;
            top: 24%;
            width: 75%;
            left: 12.5%;
            }
            
            .description {
            font-size: 0.41rem;
            }
            
            .description span {
            color: #e76028;
            font-weight: 600;
            }
            }
            .small-font .description {
            font-size: 1rem;
            } */


        .p-fromat {
            text-align: justify;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .pl3 {
            padding-left: 5px;
            margin-left: 5px;
        }

        @media (max-width: 1346px) {
            
             .p-fromat {
                text-align: justify;
                font-size: 1rem;
                line-height: 1.5;
            }
        }
        @media (max-width: 1145px) {
            
             .p-fromat {
                text-align: justify;
                font-size: 0.8rem;
                line-height: 1.5;
            }
        }
        @media (max-width: 1024px) {
             .p-fromat {
                text-align: justify;
                font-size: 1rem;
                line-height: 1.5;
            }
        }
        @media (max-width: 900px) {
             .p-fromat {
                text-align: justify;
                font-size: 0.8rem;
                line-height: 1.5;
            }
        }

        @media (max-width: 768px) {
            

            .p-fromat {
                text-align: justify;
                font-size: 0.7rem;
                line-height: 1.5;
            }
            .f-size{
				font-size: 0.7rem;
			}

        }
        @media (max-width: 660px) {
            

            .p-fromat {
                text-align: justify;
                font-size: 0.6rem;
                line-height: 1.5;
            }
            .f-size{
				font-size: 0.6rem;
			}

        }
         @media (max-width: 576px) {
            .p-fromat {
                text-align: justify;
                font-size: 0.6rem;
                /* line-height: 1.8; */
            }
            .f-size{
				font-size: 0.6rem;
			}
         }
         @media (max-width: 500px) {
            .p-fromat {
                text-align: justify;
                font-size: 0.5rem;
                /* line-height: 1.8; */
            }
            .f-size{
				font-size: 0.5rem;
			}
         }
         @media (max-width: 430px) {
            .p-fromat {
                text-align: justify;
                font-size: 0.4rem;
                /* line-height: 1.8; */
            }
            .f-size{
				font-size: 0.4rem;
			}
         }
         @media (max-width: 365px) {
            .p-fromat {
                text-align: justify;
                font-size: 0.3rem;
                /* line-height: 1.8; */
            }
            .f-size{
				font-size: 0.3rem;
			}
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
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb3">
                <div class="breadcrumb-title pe-3">My Internship Letter</div>
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
                <div class="col-sm-10 mt-5">
                    <div class="d-flex gap-2 mb-3">
                        <button class="btn btn-success btn-sm" id="downloadBtn"><i
                                class="bi bi-image me-1"></i>PNG</button>
                        <button id="downloadPdfBtn" class="btn btn-danger btn-sm"><i
                                class="bi bi-file-pdf me-1"></i>PDF</button>
                    </div>
                    <div class="card text-bg-dark">
                        <img src="<?= base_url('public/assets/images/summer-internship-later-2025.png') ?>"
                            class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <!-- <h4 class="text-center heading">INTERNSHIP OFFER LETTER</h4> -->
                            <!-- <div class="border-bottom"></div> -->
                            <div class="box_80">
                                <!-- <div class="d-flex justify-content-between">
                                        <div class="date">
                                            <h5 class="fw-bold">Date: <span style="color:#e76028"><?= !empty($summer->date) ? date('d/m/Y', strtotime($summer->date)) : ''; ?></span></h5>
                                        </div>
                                        <div class="date">
                                            <h5 class="fw-bold">REF NO: <span
                                            style="color:#e76028">DCT/2023/INTERN/029</span></h5>
                                        </div>
                                    </div> -->
                                <!-- <h4 class="fw-bold dear">DEAR,</h4>
                                    <h4 class="fw-bold stu_name" style="color:#e76028"><?= !empty($summer->student_name) ? $summer->student_name : ''; ?>,</h4>
                                    <p class="description">We would like to congratulate you on being selected for the
                                        <span>"Web Development"</span> internship position with <span>"DigiCoders
                                        Technologies".</span> We at DigiCoders are excited that you will join our team.
                                        <br /> The duration of the internship will be of 45 days, starting from
                                        <span>01-August-2023</span> to <span>15-September-2023</span>, scheduled at
                                        <span>02PM</span> to <span>06 PM</span> daily. The internship is an educational
                                        opportunity for you hence the primary focus is on learning and developing new skills
                                        and gaining hands-on knowledge. We believe that you will perform all your
                                        tasks/projects. <br> As an intern, we expect you to perform all assigned tasks to
                                        the best of your ability and follow any lawful and reasonable instructions provided
                                        to you. <br /> We are confident that this internship will be a valuable experience
                                        for you, we look forward to working with you and helping you achieve your career
                                        goals.<br />
                                        <div class="mt-3 description">Best of Luck! <br />Thank You!</div>
                                    </p> -->
                                    <div class="d-flex justify-content-between pb-2 f-size">

										<p class="text-decoration-underline mb-0">Date: <span><?= date('d/m/Y') ?></span></p>
										<p class="mb-0">REF NO: <span>DCT/2025/<?= !empty($summer->id)? $summer->id : ""; ?></span></p>
									</div>
                                <p class="p-fromat">DEAR <span
                                        class="pl3"><b><?= !empty($summer->student_name) ? $summer->student_name : ''; ?>,</b></span>
                                </p>
                                <p class="p-fromat">
                                    We are pleased to offer you an internship opportunity at <b> DigiCoders Technologies
                                    </b> for a duration of 45 to 60 days, starting in the month of June & July 2025.
                                    This internship is designed to provide you with structured training aimed at
                                    enhancing your understanding of real-world applications in your field of study. You
                                    will have the chance to work on projects that will help you apply your academic
                                    knowledge in a practical setting, giving you valuable hands-on experience.
                                </p>
                                <p class="p-fromat pb-0 mb-0">Throughout the internship, you will be guided and mentored by
                                    experienced professionals who are committed to supporting your growth and
                                    development. Our goal is to provide a collaborative and engaging environment where
                                    you can build your skills, gain meaningful insights into industry practices, and
                                    make a positive contribution to our team.</p>

                                    <center><b class="p-fromat mt-2">We have team of 10+ years of experienced
                                            professionals.</b></center>
                            </div>
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
        document.getElementById("downloadBtn").addEventListener("click", function () {
            html2canvas(document.querySelector(".card")).then(canvas => {
                let link = document.createElement('a');
                link.download = 'summer_internship_letter.png';
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
                filename: 'summer_internship_letter.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'A4', orientation: 'portrait' }
            };

            html2pdf().from(element).set(opt).save().finally(() => {
                element.classList.remove('small-font');
            });
        });
    </script>

    <?php require('includes/JsLinks.php'); ?>
</body>

</html>