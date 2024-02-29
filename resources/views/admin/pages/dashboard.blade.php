@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')

<!-- main stated -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-7">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Order <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Order <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-pound"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Order <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">BMI<span>/History</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->


                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-5">
                <!-- order status -->
                <div class="card" style="max-height: 350px; overflow-y: auto;">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Order Status <span>| Today</span></h5>
                        <div class="activity">
                            <div class="activity-item d-flex">
                                <div class="activite-label">32 min</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                                </div>
                            </div><!-- End activity item-->
                            <div class="activity-item d-flex">
                                <div class="activite-label">56 min</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    Voluptatem blanditiis blanditiis eveniet
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">2 hrs</div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content">
                                    Voluptates corrupti molestias voluptatem
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">1 day</div>
                                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                <div class="activity-content">
                                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">2 days</div>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                <div class="activity-content">
                                    Est sit eum reiciendis exercitationem
                                </div>
                            </div><!-- End activity item-->

                            <div class="activity-item d-flex">
                                <div class="activite-label">4 weeks</div>
                                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                <div class="activity-content">
                                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                </div>
                            </div><!-- End activity item-->


                        </div>
                    </div>
                </div><!-- End order status -->

                <!-- start  my stats  -->
                <div class="card">

                    <div class="card-body">
                        <div style="position: relative;">
                            <img src="https://i.ibb.co/CmRQbgh/pen-1250615-1.png" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="w-70 h-auto" alt="edit" style="width: 15px; height: 15px; position: absolute; top: 100%; right: 0; margin-top:10px; cursor:pointer;">
                        </div>
                        <div class="link d-flex justify-content-between align-items-center mt-3">
                            <h5 class="card-title mb-0 ">My Stats</h5>
                            <span id="switchToUnit" onclick="toggleUnit()" style="cursor: pointer;" class="text-info">Switch to Imperial</span>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="activity-item d-flex  align-items-center flex-column h-100" style="background-color: #1aa9dd;">
                                    <div class="activity-content">

                                        <!-- Height image centered -->
                                        <div class="activite-label mr-auto text-center mt-3">
                                            <img src="https://i.ibb.co/1nGzhKh/height-icon.png" class="w-50 h-auto" alt="height">
                                        </div>
                                        <!-- Content -->
                                        <div class="text-center text-light pt-2">
                                            <h5 class="mb-0">Height</h5>
                                            <span id="heightValue">0cm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add another col-md-6 for the second box -->
                            <div class="col-md-6 mb-4">
                                <div class="activity-item d-flex align-items-center justify-content-center flex-column h-100 " style="background-color: #769ccd;">
                                    <div class="activite-label mr-auto text-center mt-3">
                                        <div class="activity-content d-flex align-items-center justify-content-center">
                                            <img src="https://i.ibb.co/HGkLc5M/weight-icon.png" class="w-50 h-auto" alt="calculate">
                                        </div>
                                        <div class="text-center text-light pt-2">
                                            <h5 class="mb-0">Weight</h5>
                                            <span id="weightValue">0kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Edit Height and Weight</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="background-color: red; color: white; border: none;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body mt-3">
                                        <input type="text" id="heightInput" oninput="updateMeasurement('height')" class="form-control" placeholder="Enter height..."> <br />
                                        <input type="text" id="weightInput" oninput="updateMeasurement('weight')" class="form-control" placeholder="Enter weight...">
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" id="saveChangesBtn" class="btn btn-primary text-center" onclick="updateMeasurement()">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function toggleUnit() {
                                var switchToUnit = document.getElementById("switchToUnit");

                                var currentUnit = switchToUnit.innerText.trim();

                                var heightInput = document.getElementById("heightInput").value;
                                var weightInput = document.getElementById("weightInput").value;

                                if (currentUnit === "Switch to Imperial") {
                                    var heightInFeet = (parseFloat(heightInput) / 30.48).toFixed(2);
                                    var weightInLbs = (parseFloat(weightInput) / 0.45359237).toFixed(2);

                                    document.getElementById("heightValue").innerText = heightInFeet + " ft";
                                    document.getElementById("weightValue").innerText = weightInLbs + " lbs";

                                    switchToUnit.innerText = "Switch to Metric";
                                } else {

                                    var heightInCm = (parseFloat(heightInput) * 30.48).toFixed(2);
                                    var weightInKg = (parseFloat(weightInput) * 0.45359237).toFixed(2);

                                    document.getElementById("heightValue").innerText = heightInCm + " cm";
                                    document.getElementById("weightValue").innerText = weightInKg + " kg";

                                    switchToUnit.innerText = "Switch to Imperial";
                                }
                            }


                            // Function to update measurement units
                            function updateMeasurement(type) {
                                var heightInput = document.getElementById("heightInput").value;
                                var weightInput = document.getElementById("weightInput").value;

                                // Update the displayed value
                                var heightValue = (type === "height") ? heightInput : document.getElementById("heightValue").innerText;
                                var weightValue = (type === "weight") ? weightInput : document.getElementById("weightValue").innerText;

                                // Update the displayed values
                                document.getElementById("heightValue").innerText = heightValue;
                                document.getElementById("weightValue").innerText = weightValue;

                                // Check if both input fields have values
                                var saveChangesBtn = document.getElementById("saveChangesBtn");
                                if (heightInput.trim() !== "" && weightInput.trim() !== "") {
                                    saveChangesBtn.disabled = false; // Enable the button
                                } else {
                                    saveChangesBtn.disabled = true; // Disable the button
                                }
                            }
                        </script>




                        <div class="row">
                            <!-- Add another col-md-6 for the third box -->
                            <div class="col-md-6  py-3 pb-2  mr-md-2">
                                <div class="activity-item d-flex align-items-center justify-content-center flex-column h-100" style="background-color: #769ccd;">
                                    <div class="activite-label mr-auto text-center">
                                        <div class="activity-content d-flex align-items-center justify-content-center">
                                            <img src="https://i.ibb.co/LSDDDfp/noinfo.png" class="w-50 h-auto mt-3" alt="calculate">
                                        </div>
                                        <div class="text-center text-light mb-0 pt-3">
                                            <h5 class="mb-0">BMI</h5>
                                            <span>0kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add another col-md-6 for the fourth box -->
                            <div class="col-md-6   py-3 pb-2 ml-md-2">
                                <div class="activity-item d-flex align-items-center justify-content-center flex-column h-100" style="background-color: #1aa9dd;">
                                    <div class="activite-label mr-auto text-center">
                                        <div class="activity-content d-flex align-items-center justify-content-center">
                                            <img src="https://i.ibb.co/3zrC2BV/waist.png" class="w-50 h-auto mt-3" alt="calculate">
                                        </div>
                                        <div class="text-center text-light mb-0 pt-3">
                                            <h5 class="mb-0">Waist</h5>
                                            <span>0 cm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div><!-- End my stats -->
            </div><!-- End Right side columns -->

            <!-- left side colum  -->
            <!-- start bmi calculator  -->
            <div class="col-12">
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">Bmi Calculator <span>| Today</span></h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                    </div>
                </div>
            </div>
            <!-- End bmi_calculator -->

        </div>
    </section>

</main>
<!-- End #main -->

@stop

@pushOnce('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [{
                name: 'Sales',
                data: [31, 40, 28, 51, 42, 82, 56],
            }, {
                name: 'Revenue',
                data: [11, 32, 45, 32, 34, 52, 41]
            }, {
                name: 'Customers',
                data: [15, 11, 32, 18, 9, 24, 11]
            }],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                },
            },
            markers: {
                size: 4
            },
            colors: ['#4154f1', '#2eca6a', '#ff771d'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }).render();
    });
    document.addEventListener("DOMContentLoaded", () => {
        echarts.init(document.querySelector("#trafficChart")).setOption({
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Access From',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [{
                        value: 1048,
                        name: 'Search Engine'
                    },
                    {
                        value: 735,
                        name: 'Direct'
                    },
                    {
                        value: 580,
                        name: 'Email'
                    },
                    {
                        value: 484,
                        name: 'Union Ads'
                    },
                    {
                        value: 300,
                        name: 'Video Ads'
                    }
                ]
            }]
        });
    });
    document.addEventListener("DOMContentLoaded", () => {
        var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
            legend: {
                data: ['Allocated Budget', 'Actual Spending']
            },
            radar: {
                // shape: 'circle',
                indicator: [{
                        name: 'Sales',
                        max: 6500
                    },
                    {
                        name: 'Administration',
                        max: 16000
                    },
                    {
                        name: 'Information Technology',
                        max: 30000
                    },
                    {
                        name: 'Customer Support',
                        max: 38000
                    },
                    {
                        name: 'Development',
                        max: 52000
                    },
                    {
                        name: 'Marketing',
                        max: 25000
                    }
                ]
            },
            series: [{
                name: 'Budget vs spending',
                type: 'radar',
                data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'Allocated Budget'
                    },
                    {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'Actual Spending'
                    }
                ]
            }]
        });
    });
</script>
@endPushOnce