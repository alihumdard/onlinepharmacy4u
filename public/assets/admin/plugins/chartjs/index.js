$(function () {
    "use strict";

    // chart 1

    var ctx = document.getElementById("chart1").getContext("2d");

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, "#6078ea");
    gradientStroke1.addColorStop(1, "#17c5ea");

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, "#ff8359");
    gradientStroke2.addColorStop(1, "#ffdf40");

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [
                {
                    label: "Laptops",
                    data: [65, 59, 80, 81, 65, 59, 80, 81, 59, 80, 81, 65],
                    borderColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    hoverBackgroundColor: gradientStroke1,
                    pointRadius: 0,
                    fill: false,
                    borderWidth: 0,
                },
                {
                    label: "Mobiles",
                    data: [28, 48, 40, 19, 28, 48, 40, 19, 40, 19, 28, 48],
                    borderColor: gradientStroke2,
                    backgroundColor: gradientStroke2,
                    hoverBackgroundColor: gradientStroke2,
                    pointRadius: 0,
                    fill: false,
                    borderWidth: 0,
                },
            ],
        },

        options: {
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                display: false,
                labels: {
                    boxWidth: 8,
                },
            },
            tooltips: {
                displayColors: false,
            },
            scales: {
                xAxes: [
                    {
                        barPercentage: 0.5,
                    },
                ],
            },
        },
    });

    // chart 2

    var ctx = document.getElementById("chart2").getContext("2d");

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, "#fc4a1a");
    gradientStroke1.addColorStop(1, "#f7b733");

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, "#4776e6");
    gradientStroke2.addColorStop(1, "#8e54e9");

    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, "#ee0979");
    gradientStroke3.addColorStop(1, "#ff6a00");

    var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke4.addColorStop(0, "#42e695");
    gradientStroke4.addColorStop(1, "#3bb2b8");

    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Jeans", "T-Shirts", "Shoes", "Lingerie"],
            datasets: [
                {
                    backgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                        gradientStroke4,
                    ],
                    hoverBackgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                        gradientStroke4,
                    ],
                    data: [25, 80, 25, 25],
                    borderWidth: [1, 1, 1, 1],
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 75,
            legend: {
                position: "bottom",
                display: false,
                labels: {
                    boxWidth: 8,
                },
            },
            tooltips: {
                displayColors: false,
            },
        },
    });

    // worl map

    jQuery("#geographic-map-2").vectorMap({
        map: "world_mill_en",
        backgroundColor: "transparent",
        borderColor: "#818181",
        borderOpacity: 0.25,
        borderWidth: 1,
        zoomOnScroll: false,
        color: "#009efb",
        regionStyle: {
            initial: {
                fill: "#008cff",
            },
        },
        markerStyle: {
            initial: {
                r: 9,
                fill: "#fff",
                "fill-opacity": 1,
                stroke: "#000",
                "stroke-width": 5,
                "stroke-opacity": 0.4,
            },
        },
        enableZoom: true,
        hoverColor: "#009efb",
        markers: [
            {
                latLng: [21.0, 78.0],
                name: "Lorem Ipsum Dollar",
            },
        ],
        hoverOpacity: null,
        normalizeFunction: "linear",
        scaleColors: ["#b6d6ff", "#005ace"],
        selectedColor: "#c9dfaf",
        selectedRegions: [],
        showTooltip: true,
    });

    // chart 3

    var ctx = document.getElementById("chart3").getContext("2d");

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, "#008cff");
    gradientStroke1.addColorStop(1, "rgba(22, 195, 233, 0.1)");

    var myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            datasets: [
                {
                    label: "Revenue",
                    data: [3, 30, 10, 10, 22, 12, 5],
                    pointBorderWidth: 2,
                    pointHoverBackgroundColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    borderColor: gradientStroke1,
                    borderWidth: 3,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                display: false,
            },
            tooltips: {
                displayColors: false,
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
        },
    });

    // chart 4

    var ctx = document.getElementById("chart4").getContext("2d");

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, "#ee0979");
    gradientStroke1.addColorStop(1, "#ff6a00");

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, "#283c86");
    gradientStroke2.addColorStop(1, "#39bd3c");

    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, "#7f00ff");
    gradientStroke3.addColorStop(1, "#e100ff");

    var myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: ["Completed", "Pending", "Process"],
            datasets: [
                {
                    backgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                    ],

                    hoverBackgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                    ],

                    data: [50, 50, 50],
                    borderWidth: [1, 1, 1],
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 0,
            legend: {
                position: "bottom",
                display: false,
                labels: {
                    boxWidth: 8,
                },
            },
            tooltips: {
                displayColors: false,
            },
        },
    });

    // chart 5

    var ctx = document.getElementById("chart5").getContext("2d");

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, "#f54ea2");
    gradientStroke1.addColorStop(1, "#ff7676");

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, "#42e695");
    gradientStroke2.addColorStop(1, "#3bb2b8");

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [1, 2, 3, 4, 5, 6, 7, 8],
            datasets: [
                {
                    label: "Clothing",
                    data: [40, 30, 60, 35, 60, 25, 50, 40],
                    borderColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    hoverBackgroundColor: gradientStroke1,
                    pointRadius: 0,
                    fill: false,
                    borderWidth: 1,
                },
                {
                    label: "Electronic",
                    data: [50, 60, 40, 70, 35, 75, 30, 20],
                    borderColor: gradientStroke2,
                    backgroundColor: gradientStroke2,
                    hoverBackgroundColor: gradientStroke2,
                    pointRadius: 0,
                    fill: false,
                    borderWidth: 1,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                position: "bottom",
                display: false,
                labels: {
                    boxWidth: 8,
                },
            },
            scales: {
                xAxes: [
                    {
                        barPercentage: 0.5,
                    },
                ],
            },
            tooltips: {
                displayColors: false,
            },
        },
    });
});

// ***************************** line charts ************************************

const ctxTotalSales = document
    .getElementById("totalSalesGraph")
    .getContext("2d");
const ctxSalesByChannel = document
    .getElementById("salesByChannelGraph")
    .getContext("2d");
const ctxTotalOrders = document
    .getElementById("totalOrdersGraph")
    .getContext("2d");
const ctxAvgOrderValue = document
    .getElementById("avgOrderValueGraph")
    .getContext("2d");
const ctxAvgTimeTillShip = document
    .getElementById("avgTimeTillShipGraph")
    .getContext("2d");

const dailyDataAvgTimeTillShip = [40, 50, 30, 60, 50, 60, 50];
const weeklyDataAvgTimeTillShip = [60, 40, 50, 30, 70, 40, 65];

const dailyPreviostAvgTimeTillShip = [30, 40, 50, 60, 70, 80, 90];
const weeklyPreviostAvgTimeTillShip = [40, 30, 60, 30, 80, 60, 70];

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

const labelsDaily = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
const labelsWeekly = [
    "Week 1",
    "Week 2",
    "Week 3",
    "Week 4",
    "Week 5",
    "Week 6",
    "Week 7",
];

const totalSalesGraph = new Chart(ctxTotalSales, {
    type: "line",
    data: {
        labels: labelsDaily,
        datasets: [
            {
                label: "Sales",
                data: dailyDataTotalSales,
                borderColor: "blue",
                borderWidth: 2,
                fill: false,
                pointRadius: 0,
            },
            {
                label: "Previous Sales",
                data: dailyDataPreviousTotalSales,
                borderColor: "blue",
                borderWidth: 1,
                borderDash: [5, 5],
                fill: false,
                pointRadius: 0,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function (value) {
                        return "$" + value;
                    },
                },
            },
        },
        plugins: {
            legend: {
                display: true,
            },
        },
        responsive: true,
        maintainAspectRatio: false,
    },
});

const salesByChannelGraph = new Chart(ctxSalesByChannel, {
    type: "bar",
    data: {
        labels: ["Online", "In-store", "Mail-order"],
        datasets: [
            {
                label: "Sales by channel",
                data: dailyDataSalesByChannel,
                backgroundColor: [
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                ],
                borderColor: [
                    "rgba(54, 162, 235, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                ],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function (value) {
                        return "$" + value;
                    },
                },
            },
        },
        plugins: {
            legend: {
                display: false,
            },
        },
        responsive: true,
        maintainAspectRatio: false,
    },
});

const totalOrdersGraph = new Chart(ctxTotalOrders, {
    type: "line",
    data: {
        labels: labelsDaily,
        datasets: [
            {
                label: "Total Orders",
                data: dailyDataTotalOrders,
                borderColor: "green",
                borderWidth: 2,
                fill: false,
                pointRadius: 0,
            },
            {
                label: "Previous Total Orders",
                data: dailyDataPreviousTotalOrders, // Assuming you have data for previous total orders
                borderColor: "orange", // Adjust color as needed
                borderWidth: 1,
                borderDash: [5, 5], // Optional: Dashed line for previous data
                fill: false,
                pointRadius: 0,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function (value) {
                        return value;
                    },
                },
            },
        },
        plugins: {
            legend: {
                display: false,
            },
        },
        responsive: true,
        maintainAspectRatio: false,
    },
});

const avgOrderValueGraph = new Chart(ctxAvgOrderValue, {
    type: "line",
    data: {
        labels: labelsDaily,
        datasets: [
            {
                label: "Average Order Value",
                data: dailyDataAvgOrderValue,
                borderColor: "red",
                borderWidth: 2,
                fill: false,
                pointRadius: 0,
            },
            {
                label: "Previous Average Order Value",
                data: dailyDataPreviousAvgOrderValue, // Assuming you have data for previous average order value
                borderColor: "orange", // Adjust color as needed
                borderWidth: 1,
                borderDash: [5, 5], // Optional: Dashed line for previous data
                fill: false,
                pointRadius: 0,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function (value) {
                        return "$" + value;
                    },
                },
            },
        },
        plugins: {
            legend: {
                display: false,
            },
        },
        responsive: true,
        maintainAspectRatio: false,
    },
});

const avgTimeTillShipGraph = new Chart(ctxAvgTimeTillShip, {
    type: "line",
    data: {
        labels: labelsDaily,
        datasets: [
            {
                label: "Average Time Till Ship",
                data: dailyDataAvgTimeTillShip,
                borderColor: "purple",
                borderWidth: 2,
                fill: false,
                pointRadius: 0,
            },
            {
                label: "Previous Average Time Till Ship",
                data: weeklyDataAvgTimeTillShip, // Assuming you have data for previous average order value
                borderColor: "orange", // Adjust color as needed
                borderWidth: 1,
                borderDash: [5, 5], // Optional: Dashed line for previous data
                fill: false,
                pointRadius: 0,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function (value) {
                        return value;
                    },
                },
            },
        },
        plugins: {
            legend: {
                display: false,
            },
        },
        responsive: true,
        maintainAspectRatio: false,
    },
});

const dailyButton = document.getElementById("dailyButton");
const weeklyButton = document.getElementById("weeklyButton");

dailyButton.addEventListener("click", function () {
    updateCharts(
        labelsDaily,
        dailyDataTotalSales,
        dailyDataSalesByChannel,
        dailyDataTotalOrders,
        dailyDataAvgOrderValue,
        dailyDataPreviousTotalSales,
        dailyDataPreviousTotalOrders,
        dailyDataPreviousAvgOrderValue,
        dailyDataAvgTimeTillShip,
        dailyPreviostAvgTimeTillShip
    );
    setActiveButton(dailyButton);
});

weeklyButton.addEventListener("click", function () {
    updateCharts(
        labelsWeekly,
        weeklyDataTotalSales,
        weeklyDataSalesByChannel,
        weeklyDataTotalOrders,
        weeklyDataAvgOrderValue,
        weeklyDataPreviousTotalSales,
        weeklyDataPreviousTotalOrders,
        weeklyDataPreviousAvgOrderValue,
        weeklyDataAvgTimeTillShip,
        weeklyPreviostAvgTimeTillShip
    );
    setActiveButton(weeklyButton);
});

function updateCharts(
    labels,
    dataTotalSales,
    dataSalesByChannel,
    dataTotalOrders,
    dataAvgOrderValue,
    DataPreviousTotalSales,
    DataPreviousTotalOrders,
    DataPreviousAvgOrderValue,
    dataAvgTimeTillShip,
    DataPreviousAvgTimeTillShip
) {
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

    avgTimeTillShipGraph.data.labels = labels;
    avgTimeTillShipGraph.data.datasets[0].data = dataAvgTimeTillShip;
    avgTimeTillShipGraph.data.datasets[1].data = DataPreviousAvgTimeTillShip;
    avgTimeTillShipGraph.update();
}

function setActiveButton(button) {
    dailyButton.classList.remove("active");
    weeklyButton.classList.remove("active");
    button.classList.add("active");
}
