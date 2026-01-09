<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Test - Software Development | Website Development | Mobile Application Development | Digital Marketing | Summer Training | Internship | Apprenticeship</title>
    <?php include('includes/CssLinks.php'); ?>
</head>
<body>

<!--start wrapper-->
<div class="wrapper">
    <!--start top header-->
    <?php include('includes/header.php'); ?>
    <!--end top header-->

    <!--start sidebar -->
    <?php include('includes/sidebar.php'); ?>
    <!--end sidebar -->

    <!--start content-->
    <main class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">My Test</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-header py-3">
                <div class="row align-items-center m-0">
                    <div class="col-6">
                        <h6>All Test</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
					// $currentnumber=8318259972;
                    $url = "https://assessment.thedigicoders.com/Api/getTestdataThroughNumber?number=$currentnumber";
                    $response = file_get_contents($url);
                    if ($response === FALSE) {
                        echo "<p>Error fetching data from API.</p>";
                    } else {
                        $data = json_decode($response, true);
                        if ($data && isset($data['data'])) {
                            ?>
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Paper Name</th>
                                        <th>Total Questions</th>
                                        <th>Attempted Questions</th>
                                        <th>Correct Answers</th>
                                        <th>Incorrect Answers</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									 $sr=1;
                                    foreach ($data['data'] as $student) {
                                        $student_id = $student['student_id'];
                                        if (!empty($student['results'])) {
                                          
                                            foreach ($student['results'] as $result)
											{
											
                                                ?>
                                                <tr>
                                                    <td><?= $sr; ?></td>
                                                    <td><?= $currentname; ?></td>
                                                    <td><?= $result['paper_name'] ?></td>
                                                    <td><?= $result['total_question'] ?></td>
                                                    <td><?= $result['attempt_question'] ?></td>
                                                    <td><?= $result['correct_ans'] ?></td>
                                                    <td><?= $result['incorrect_ans'] ?></td>
                                                   
                                                </tr>
                                                <?php
												$sr++;
                                            }
                                        } 
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                         
                            ?>
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Paper Name</th>
                                        <th>Total Questions</th>
                                        <th>Attempted Questions</th>
                                        <th>Correct Answers</th>
                                        <th>Incorrect Answers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7" class="text-center">No Record Found</td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Upload File Modal -->
       
        
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

<?php include('includes/JsLinks.php') ?>

</body>
</html>

<script>
    $('.dropify').dropify();

    $('#summernote').summernote({
        placeholder: 'Description...',
        tabsize: 2,
        height: 120,
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
</script>
