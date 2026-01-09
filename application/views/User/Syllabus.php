<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus - Software Development | Website Development | Mobile Application Development | Digital
        Marketing |
        Summer Training | Internship | Apprenticeship</title>
    <?php require('includes/CssLinks.php'); ?>
    <!-- Bootstrap 5.0.1 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- ApexCharts Library -->

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
                <div class="breadcrumb-title pe-3">Syllabus Completed</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header py-3">
                            <div id="chart"></div>

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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            series: [{
                name: 'Syllabus Completed   ',
                data: [40, 55, 41, 100, 92]
            }],

            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0
            },
            grid: {
                row: {
                    colors: ['#fff', '#f2f2f2']
                }
            },
            xaxis: {
                labels: {
                    rotate: -45
                },
                categories: ["HTML", "CSS", "C Language", "JavaScript", "Technology"],
                tickPlacement: 'on'
            },
            yaxis: {
                title: {
                    text: 'Syllabus Completed',
                },
                labels: {
                    formatter: function (value) {
                        return value + '%';
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: "horizontal",
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 0.85,
                    opacityTo: 0.85,
                    stops: [50, 0, 100]
                },
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

    <?php require('includes/JsLinks.php') ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>