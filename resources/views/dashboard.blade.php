<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>LacakLaundry</title>
</head>

<body>
    <div class="container" style="padding-left: 10%">

        <div class="sidebar">
            <div class="sidebar-brand">
                <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
                <span class="brand-text">LacakLaundry</span>
            </div>
            <ul class="sidebar-nav">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/revenueDetail">Performance</a></li>
                <li><a href="/viewOrder">History</a></li>
                <li><a href="/settings">Settings</a></li>
            </ul>
        </div>
        <div class="row">
            <p>Dashboard</p>
        </div>
        <div class="row">
            <a class="btn btn-primary btn-sm col-2" type="button" href="/newOrder" style="height: 55px, width:5px;">+ New Order</a>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Finished</h5>
                        <p class="card-text">{{ $orderTotals['finishedCount'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Overdue</h5>
                        <p class="card-text">{{ $orderTotals['overdueCount'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ongoing</h5>
                        <p class="card-text">{{ $orderTotals['ongoingCount'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-title">Monthly Sales Performance</h5>
            <div class="row">
                <div class="col-8">
                    <canvas id="chart">
                    </canvas>
                </div>
                <div class="salesperformance" style="width: 20rem; height:40%">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item text-center">
                            <div class="row">
                                <div class="col-12 ">Total Revenue</div>
                            </div>
                            <div class="row">
                                <div class="col-12">Rp {{ $totalRevenue }}</div>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <div class="col-12 ">Average revenue per day</div>
                            </div>
                            <div class="row">
                                <div class="col-12">Rp {{$averageMonthlyRevenue}}</div>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <div class="col-12 ">Average laundry weight</div>
                            </div>
                            <div class="row">
                                <div class="col-12">{{ $averageLaundryWeight }} Kg</div>
                            </div>
                        </li>
                        <li class="list-group-item text-center">
                            <div class="row">
                                <div class="col-12 ">Average laundry time</div>
                            </div>
                            <div class="row">
                                <div class="col-12">{{ $averageLaundryTime}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="card ordersCount">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">Total</div>
                            <div class="col-6 text-end">{{ $orderTotals['totalOrders'] }}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">Current Month</div>
                            <div class="col-6 text-end">{{ $orderTotals['currentMonthOrders'] }}</div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">Last Month</div>
                            <div class="col-6 text-end">{{ $orderTotals['lastMonthOrders'] }}</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = null; // Store the chart instance

        function generateChart(labels, values) {
            var data = {
                labels: labels,
                datasets: [{
                    label: 'Sales',
                    data: values,
                    fill: 'origin',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(20, 72, 150, 0.3)',
                    borderWidth: 1,
                    lineTension: 0.4,
                    pointRadius: values.map(value => value > 0 ? 2 : 0)
                }]
            };

            var options = {
                scales: {
                    x: {
                        grid: {
                            display: false // Hide the x-axis grid lines
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true // Hide the y-axis grid lines
                        }
                    }
                },
                interaction: {
                    intersect: false, // Disable line interactions to only show data point when hovering
                    mode: 'index'
                },
                plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                }
            }

            // Check if a chart instance already exists
            // If it does, destroy the previous chart before creating a new one
            if (chart !== null) {
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options
            });
        }

        // Function to update the chart dynamically
        function updateChart(newLabels, newValues) {
            chart.data.labels = newLabels;
            chart.data.datasets[0].data = newValues;
            chart.update();
        }

        // Call the generateChart function initially
        generateChart(@json($labels), @json($values));
    </script>

</body>
<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        height: 100vh;
        width: 180px;
        background-color: #363740;
        padding-top: 20px;

    }

    .sidebar-brand {
        font-size: 14px;
        font-weight: 700;
        color: #A4A6B3;
        margin-left: 6px;
        vertical-align: middle;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 40px;
        margin-top: 10px;
    }

    .sidebar-brand-picture {
        width: 19px;
        height: 19px;
        border-radius: 50%;
        align-items: center;
        margin-right: 7px;
    }


    .sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-nav li {
        position: relative;
    }

    .sidebar-nav li a {
        font-size: 13px;
        display: block;
        color: #A4A6B3;
        text-decoration: none;
        text-indent: 55px;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    li:hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 2px;
        background-color: #ffffff;
    }


    .sidebar-nav li a:hover {
        background-color: rgb(156, 157, 164, .08);
        color: #A4A6B3;
    }
</style>

</html>
