@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- css added --}}
    <link rel="stylesheet" href="{{ asset('/assets/admin/dist/css/dashstyle.css') }}">
    <link href="{{ asset('/assets/admin/dist/css/bootstrap-extended.css') }}" rel="stylesheet">
    <style>
        .displaynone {
            display: none;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .analytics-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .date-selection button {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #f1f1f1;
            border: 1px solid #d0d0d0;
            cursor: pointer;
        }

        .date-selection button.active {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .graphs {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .graph {
            width: 48%;
            padding: 20px;
            background-color: #fafafa;
            border: 1px solid #e0e0e0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .graph-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .graph-header h2 {
            margin: 0;
            font-size: 18px;
        }

        .graph-header p {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        canvas {
            width: 100% !important;
            height: 300px !important;
        }
    </style>
    <!-- main stated -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary-outline fw-bold "><i
                        class="bi bi-arrow-left"></i> Back</a> | Dashboard</h1>
            {{-- <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav> --}}
        </div>

        <section class="section dashboard">

            <div class="row">
                <div class="col-lg-12">


                    <div class="analytics-container">
                        <div class="header">
                            <div class="date-selection">
                                <button id="dailyButton" class="active">Daily</button>
                                <button id="weeklyButton">Weekly</button>
                            </div>
                        </div>
                        <div class="graphs">
                            <div class="graph">
                                <div class="graph-header">
                                    <h2>Total sales</h2>
                                    <p>$ 950.00</p>
                                </div>
                                <canvas id="totalSalesGraph"></canvas>
                            </div>
                            <div class="graph">
                                <div class="graph-header">
                                    <h2>Sales by channel</h2>
                                </div>
                                <canvas id="salesByChannelGraph"></canvas>
                            </div>
                        </div>
                        <div class="graphs">
                            <div class="graph">
                                <div class="graph-header">
                                    <h2>Total orders</h2>
                                </div>
                                <canvas id="totalOrdersGraph"></canvas>
                            </div>
                            <div class="graph">
                                <div class="graph-header">
                                    <h2>Average order value</h2>
                                </div>
                                <canvas id="avgOrderValueGraph"></canvas>
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
    <script src="{{ asset('assets/admin/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/chartjs/Chart.extension.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/chartjs/index.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/chartjs/jquery-jvectormap-2.0.2.min.js') }}"></script>7
    <script src="{{ asset('assets/admin/plugins/chartjs/jquery-jvectormap-world-mill-en.js') }}"></script>7
    <script src="{{ asset('assets/admin/plugins/chartjs/jquery.min.js') }}"></script>




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
