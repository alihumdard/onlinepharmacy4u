@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctxTotalSales = document.getElementById('totalSalesGraph').getContext('2d');
        const ctxSalesByChannel = document.getElementById('salesByChannelGraph').getContext('2d');
        const ctxTotalOrders = document.getElementById('totalOrdersGraph').getContext('2d');
        const ctxAvgOrderValue = document.getElementById('avgOrderValueGraph').getContext('2d');

        const dailyDataTotalSales = [10, 250, 50, 300, 150, 500, 305];
        const weeklyDataTotalSales = [100, 350, 200, 150, 500, 250, 450];

        const dailyDataPreviousTotalSales = [15, 150, 100, 250, 100, 400, 200];
        const weeklyDataPreviousTotalSales = [90, 500, 250, 360, 650, 400, 630];


        const dailyDataSalesByChannel = [50, 70, 90];
        const weeklyDataSalesByChannel = [500, 300, 200];

        const dailyDataTotalOrders = [150, 100, 250, 150, 250, 150, 250];
        const weeklyDataTotalOrders = [350, 700, 450, 650, 500, 650, 750];

        const dailyDataPreviousTotalOrders = [100, 300, 150, 350, 250, 400, 150];
        const weeklyDataPreviousTotalOrders = [500, 700, 600, 400, 750, 450, 500];

        const dailyDataAvgOrderValue = [200, 300, 250, 300, 250, 300, 250];
        const weeklyDataAvgOrderValue = [500, 700, 600, 400, 750, 450, 500];


        const dailyDataPreviousAvgOrderValue = [150, 250, 200, 250, 200, 250, 200];
        const weeklyDataPreviousAvgOrderValue = [300, 900, 450, 300, 800, 250, 500];



        const labelsDaily = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        const labelsWeekly = ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7'];


        const totalSalesGraph = new Chart(ctxTotalSales, {
            type: 'line',
            data: {
                labels: labelsDaily,
                datasets: [{
                    label: 'Sales',
                    data: dailyDataTotalSales,
                    borderColor: 'blue',
                    borderWidth: 1,
                    fill: false,
                    pointRadius: 0
                }, {
                    label: 'Previous Sales',
                    data: dailyDataPreviousTotalSales,
                    borderColor: 'blue',
                    borderWidth: 1,
                    borderDash: [5, 5],
                    fill: false,
                    pointRadius: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const salesByChannelGraph = new Chart(ctxSalesByChannel, {
            type: 'bar',
            data: {
                labels: ['Online', 'In-store', 'Mail-order'],
                datasets: [{
                    label: 'Sales by channel',
                    data: dailyDataSalesByChannel,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const totalOrdersGraph = new Chart(ctxTotalOrders, {
            type: 'line',
            data: {
                labels: labelsDaily,
                datasets: [{
                    label: 'Total Orders',
                    data: dailyDataTotalOrders,
                    borderColor: 'green',
                    borderWidth: 1,
                    fill: false,
                    pointRadius: 0
                }, {
                    label: 'Previous Total Orders',
                    data: dailyDataPreviousTotalOrders, // Assuming you have data for previous total orders
                    borderColor: 'orange', // Adjust color as needed
                    borderWidth: 1,
                    borderDash: [5, 5], // Optional: Dashed line for previous data
                    fill: false,
                    pointRadius: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value;
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const avgOrderValueGraph = new Chart(ctxAvgOrderValue, {
            type: 'line',
            data: {
                labels: labelsDaily,
                datasets: [{
                        label: 'Average Order Value',
                        data: dailyDataAvgOrderValue,
                        borderColor: 'red',
                        borderWidth: 1,
                        fill: false,
                        pointRadius: 0
                    },
                    {
                        label: 'Previous Average Order Value',
                        data: dailyDataPreviousAvgOrderValue, // Assuming you have data for previous average order value
                        borderColor: 'orange', // Adjust color as needed
                        borderWidth: 1,
                        borderDash: [5, 5], // Optional: Dashed line for previous data
                        fill: false,
                        pointRadius: 0
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const dailyButton = document.getElementById('dailyButton');
        const weeklyButton = document.getElementById('weeklyButton');

        dailyButton.addEventListener('click', function() {
            updateCharts(labelsDaily, dailyDataTotalSales, dailyDataSalesByChannel, dailyDataTotalOrders,
                dailyDataAvgOrderValue, dailyDataPreviousTotalSales, dailyDataPreviousTotalSales, dailyDataPreviousAvgOrderValue);
            setActiveButton(dailyButton);
        });

        weeklyButton.addEventListener('click', function() {
            updateCharts(labelsWeekly, weeklyDataTotalSales, weeklyDataSalesByChannel, weeklyDataTotalOrders,
                weeklyDataAvgOrderValue, weeklyDataPreviousTotalSales, weeklyDataPreviousTotalOrders, weeklyDataPreviousAvgOrderValue);
            setActiveButton(weeklyButton);
        });


        function updateCharts(labels, dataTotalSales, dataSalesByChannel, dataTotalOrders, dataAvgOrderValue,
            DataPreviousTotalSales, DataPreviousTotalOrders, DataPreviousAvgOrderValue) {
            totalSalesGraph.data.labels = labels;
            totalSalesGraph.data.datasets[0].data = dataTotalSales;
            totalSalesGraph.data.datasets[1].data = DataPreviousTotalSales;
            totalSalesGraph.update();

            salesByChannelGraph.data.datasets[0].data = dataSalesByChannel;
            salesByChannelGraph.update();

            totalOrdersGraph.data.labels = labels;
            totalOrdersGraph.data.datasets[0].data = dataTotalOrders;
            totalOrdersGraph.data.datasets[1].data = DataPreviousTotalOrders;
            totalOrdersGraph.update();

            avgOrderValueGraph.data.labels = labels;
            avgOrderValueGraph.data.datasets[0].data = dataAvgOrderValue;
            avgOrderValueGraph.data.datasets[1].data = DataPreviousAvgOrderValue;
            avgOrderValueGraph.update();
        }

        function setActiveButton(button) {
            dailyButton.classList.remove('active');
            weeklyButton.classList.remove('active');
            button.classList.add('active');
        }










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
    </script>
@endPushOnce
