@extends('admin.layouts.default')
@section('title', 'Dashboard')
@section('content')
    <style>
        .displaynone {
            display: none;
        }
    </style>
    <!-- main stated -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary-outline fw-bold "><i
                        class="bi bi-arrow-left"></i> Back</a> | Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-6">
                    <canvas id="myChart" style="width:100%;max-height:400px"></canvas>
                </div>
                <div class="col-lg-6">
                    <div id="myPlot" style="width:100%;max-width:700px"></div>
                </div>
            </div>

            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-6">
                    <canvas id="myChart1" style="width:100%;max-height:400px"></canvas>
                </div>
                <div class="col-lg-6">
                    <div id="myPlot1" style="width:100%;max-width:700px"></div>
                </div>
            </div>

            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-6">
                    <canvas id="myChart2" style="width:100%;max-height:400px"></canvas>
                </div>
                <div class="col-lg-6">
                    <div id="myPlot2" style="width:100%; max-width:600px; height:500px;"></div>
                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->


@stop

@pushOnce('scripts')
    <script>
        const xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{

                    data: [300, 2000, 1500, 4000, 5000, 3000, 2000, 5000, 3000, 2000],
                    borderColor: "red",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });

        new Chart("myChart1", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{

                    data: [300, 700, 2000, 6000, 4000, 4000, 6000, 3000, 4000, 2000],
                    borderColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
        new Chart("myChart2", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{

                    data: [300, 2000, 700, 3000, 400, 2000, 5000, 4000, 1500, 3500],
                    borderColor: "green",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });

        const xArray = ["Italy", "France", "Spain", "USA", "Argentina"];
        const yArray = [55, 49, 44, 24, 15];

        const data = [{
            x: xArray,
            y: yArray,
            type: "bar",
            orientation: "v",
            marker: {
                color: "rgba(0,0,255,0.6)"
            }
        }];

        const layout = {
            title: "World Wide Wine Production"
        };

        Plotly.newPlot("myPlot", data, layout);


        const data1 = [{
            x: xArray,
            y: yArray,
            type: "bar",
            orientation: "h",
            marker: {
                color: "rgba(255,0,0,0.6)"
            }
        }];
        Plotly.newPlot("myPlot1", data1, layout);

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Contry', 'Mhl'],
                ['Italy', 55],
                ['France', 49],
                ['Spain', 44],
                ['USA', 24],
                ['Argentina', 15]
            ]);

            const options = {
                title: 'World Wide Wine Production'
            };

            const chart = new google.visualization.BarChart(document.getElementById('myPlot2'));
            chart.draw(data, options);
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
