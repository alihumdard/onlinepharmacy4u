@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
    <style>
        .graphs {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px;
        }

        .graph {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 45%;
            min-width: 300px;
        }

        .graph-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .graph-header h2 {
            font-size: 1.5em;
            color: #333;
            margin: 0;
            font-weight: 600;
        }

        canvas {
            display: block;
            width: 100%;
            height: 300px;
        }


        button.active {
            background-color: #0056b3;
        }

        button:focus {
            outline: none;
        }

        @media (max-width: 768px) {
            .graph {
                width: 100%;
            }
        }
    </style>
    <!-- main stated -->
    <main id="main" class="main">


        <section class="section dashboard">

            <div class="row">
                <div class="col-lg-12">
                    <div class="analytics-container ">
                        <div class="header">
                            <div class="date-selection">
                                <button id="dailyButton" class="active">Daily</button>
                                <button id="weeklyButton">Weekly</button>
                            </div>
                        </div>
                    </div>

                    <div class="page-content">


                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-info">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                                <h4 class="my-1 text-info">4805</h4>
                                                <p class="mb-0 font-13">+2.5% from last week</p>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                                <i class='bx bxs-cart'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-danger">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Revenue</p>
                                                <h4 class="my-1 text-danger">$84,245</h4>
                                                <p class="mb-0 font-13">+5.4% from last week</p>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                                <i class='bx bxs-wallet'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-warning">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Customers</p>
                                                <h4 class="my-1 text-warning">8.4K</h4>
                                                <p class="mb-0 font-13">+8.4% from last week</p>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                                <i class='bx bxs-group'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-success">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Conversion Rate</p>
                                                <h4 class="my-1 text-success">34.6%</h4>
                                                <p class="mb-0 font-13">-4.5% from last week</p>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                                <i class='bx bxs-bar-chart-alt-2'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--end row-->

                        <div class="analytics-container">

                            <div class="graphs">

                                <div class="graph">
                                    <div class="graph-header">
                                        <h2>Total sales</h2>
                                        <p class=" fw-bold">$ 950.00</p>
                                    </div>
                                    <canvas id="totalSalesGraph"></canvas>
                                </div>

                                <div class="graph">
                                    <div class="graph-header">
                                        <h2>Total Orders</h2>
                                    </div>
                                    <canvas id="totalOrdersGraph"></canvas>
                                </div>


                            </div>
                            <div class="graphs">

                                <div class="graph">
                                    <div class="graph-header">
                                        <h2>Average Order Value</h2>
                                    </div>
                                    <canvas id="avgOrderValueGraph"></canvas>
                                </div>

                                <div class="graph">
                                    <div class="graph-header">
                                        <h2>Average Time Till Ship</h2>
                                    </div>
                                    <canvas id="avgTimeTillShipGraph"></canvas>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class=" mb-0">Sales Overview</h6>
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                                    data-bs-toggle="dropdown"><i
                                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                                    style="color: #14abef"></i>Oders</span>
                                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                                    style="color: #ffc107"></i>Visits</span>
                                        </div>
                                        <div class="chart-container-1">
                                            <canvas id="chart1"></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 col-lg-4">

                                <div class="graph">
                                    <div class=" graph-header">
                                        <h2>Sales by channel</h2>
                                    </div>
                                    <canvas id="salesByChannelGraph"></canvas>
                                </div>
                            </div>


                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class=" mb-0">Most Item Sold</h6>
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                                    data-bs-toggle="dropdown"><i
                                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Photo</th>
                                                        <th>Product ID</th>
                                                        <th>Revinue</th>
                                                        <th>Orders</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Iphone 5</td>
                                                        <td><img src="https://images.priceoye.pk/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg"
                                                                class="product-img-2" alt="product img"></td>
                                                        <td>#9405822</td>

                                                        <td>$1250.00</td>
                                                        <td>750</td>


                                                    </tr>

                                                    <tr>
                                                        <td>Earphone GL</td>
                                                        <td><img src="https://images.priceoye.pk/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg"
                                                                class="product-img-2" alt="product img"></td>
                                                        <td>#8304620</td>

                                                        <td>$1500.00</td>
                                                        <td>650</td>

                                                    </tr>

                                                    <tr>
                                                        <td>HD Hand Camera</td>
                                                        <td><img src="https://images.priceoye.pk/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg"
                                                                class="product-img-2" alt="product img"></td>
                                                        <td>#4736890</td>

                                                        <td>$1400.00</td>
                                                        <td>550</td>

                                                    </tr>
                                                    <tr>
                                                        <td>HD Hand Camera</td>
                                                        <td><img src="https://images.priceoye.pk/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg"
                                                                class="product-img-2" alt="product img"></td>
                                                        <td>#4736890</td>

                                                        <td>$1400.00</td>
                                                        <td>450</td>

                                                    </tr>

                                                    <tr>
                                                        <td>Clasic Shoes</td>
                                                        <td><img src="https://images.priceoye.pk/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg"
                                                                class="product-img-2" alt="product img"></td>
                                                        <td>#8543765</td>

                                                        <td>$1200.00</td>
                                                        <td>350</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Sitting Chair</td>
                                                        <td><img src="https://images.priceoye.pk/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg"
                                                                class="product-img-2" alt="product img"></td>
                                                        <td>#9629240</td>

                                                        <td>$1500.00</td>
                                                        <td>250</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Hand Watch</td>
                                                        <td><img src="https://images.priceoye.pk/apple-iphone-13-pro-max-pakistan-priceoye-qgwvt.jpg"
                                                                class="product-img-2" alt="product img"></td>
                                                        <td>#8506790</td>

                                                        <td>$1800.00</td>
                                                        <td>150</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0">Trending Categories</h6>
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#"
                                                    data-bs-toggle="dropdown"><i
                                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="chart-container-2 mt-4">
                                            <canvas id="chart2"></canvas>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                            Jeans <span class="badge bg-success rounded-pill">25</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                            T-Shirts <span class="badge bg-danger rounded-pill">10</span>
                                        </li>
                                        <li
                                            class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                                            Shoes <span class="badge bg-primary rounded-pill">65</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>


                        </div>

                    </div>





                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->


@stop

@pushOnce('scripts')
    {{-- <script>







        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                    name: 'BMI',
                    data: [42, 52, 56],
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
                colors: ['#2eca6a'],
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
                    categories: ["2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                        "2018-09-19T06:30:00.000Z"
                    ]
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
                            value: 18,
                            name: 'Under Weight'
                        },
                        {
                            value: 25,
                            name: 'Normal'
                        },
                        {
                            value: 30,
                            name: 'Pre-Obesity'
                        },
                        {
                            value: 100,
                            name: 'Obese'
                        },
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
    </script> --}}
@endPushOnce
