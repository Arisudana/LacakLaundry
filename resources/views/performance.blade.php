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
    <div class="container">
        <div class="sidebar col-lg-2">
            <div class="sidebar-brand">
                <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
                <span class="brand-text">LacakLaundry</span>
            </div>
            <ul class="sidebar-nav">
                <li><a href="/dashboard">Dashboard</a></li>
                <div class="selected">
                    <div class="sheet">
                        <li><a href="{{ route('performance') }}">Performance</a></li>
                    </div>
                </div>
                <li><a href="{{ route('viewOrder') }}">Orders</a></li>
                <li><a href="/settings">Settings</a></li>
            </ul>
        </div>
        <div class="container col-lg-10 offset-lg-2">
            <div class="profile-container" style="margin-bottom: 3%; margin-top:2%">
                <div class="row">
                    <div class="col">
                        <span class="profile-text">Performance</span>
                    </div>
                    <div class="col align-self-end text-end">
                        <span class="admin-text">{{ Auth::user()->firstName }}</span>
                        <img class="profile-picture" src="admin.jpg" alt="Profile Picture">
                    </div>
                </div>

            <div class="card" style="margin-bottom: 3%; margin-top:3%">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div>
                      <h5 class="card-title ms-2">Monthly Sales Performance</h5>
                      <p class="card-subtitle mb-2 text-muted ms-2" id="current-date"></p>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-8">
                        <canvas id="chart">
                        </canvas>
                    </div>
                    <div class="salesperformance" style="width: 20rem;">
                        <ul class="list-group list-group-flush" style="margin-top: -25%">
                            <li class="list-group-item text-center" style="padding-bottom: 5%">
                                <div class="row">
                                    <div class="col-12 ">Total Orders</div>
                                </div>
                                <div class="row">
                                    <h4 class="col-12">{{ $totalOrdersMonthly }}</h4>
                                </div>
                            </li>
                            <li class="list-group-item text-center " style="padding-bottom: 5%; padding-top:3%;">
                                <div class="row">
                                    <div class="col-12 ">Average order per day</div>
                                </div>
                                <div class="row">
                                    <h4 class="col-12">{{ $averageOrdersPerDayMonthly }}</h4>
                                </div>
                            </li>
                            <li class="list-group-item text-center" style="padding-bottom: 5%; padding-top:3%;">
                                <div class="row">
                                    <div class="col-12 ">Average revenue per day</div>
                                </div>
                                <div class="row">
                                    <h4 class="col-12">Rp {{ $averageRevenuePerDayMonthly }}</h4>
                                </div>
                            </li>
                            <li class="list-group-item text-center" style="padding-bottom: 5%; padding-top:3%;">
                                <div class="row">
                                    <div class="col-12 ">Average laundry time</div>
                                </div>
                                <div class="row">
                                    <h4 class="col-12">{{ $averageLaundryTime }}</h4>
                                </div>
                                <li class="list-group-item text-center" style="padding-bottom: 5%; padding-top:3%;">
                                    <div class="row">
                                        <div class="col-12 ">Most orders in a day</div>
                                    </div>
                                    <div class="row">
                                        <h4 class="col-12">{{ $mostOrdersDay}}</h4>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="card revenueCount">
                <div class="card-body">
                    <h5 class="card-title">Revenue</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6">Total</div>
                                <div class="col-6 text-end">{{ $totalRevenue}}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6">Current Month</div>
                                <div class="col-6 text-end">{{ $currentMonthRevenue }}</div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6">Last Month</div>
                                <div class="col-6 text-end">{{ $lastMonthRevenue}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = null;
        function generateChart(labels, values, previousMonthValues) {
            var currentDate = new Date();
            var currentMonth = currentDate.toLocaleString('default', {
                month: 'long'
            });
            var previousDate = new Date();
            previousDate.setMonth(previousDate.getMonth() - 1);
            var previousMonth = previousDate.toLocaleString('default', {
                month: 'long'
            });
            var data = {
                labels: labels,
                datasets: [{
                        label: currentMonth,
                        data: values,
                        fill: 'origin',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(20, 72, 150, 0.15)',
                        borderWidth: 1,
                        lineTension: 0.4,
                        pointRadius: values.map((value) => (value > 0 ? 2 : 0)),
                    },
                    {
                        label: previousMonth,
                        data: previousMonthValues,
                        fill: 'none',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                        borderWidth: 1,
                        lineTension: 0.4,
                        pointRadius: previousMonthValues.map((value) => (value > 0 ? 2 : 0)),
                    },
                ],
            };
            var options = {
                scales: {
                    x: {
                        grid: {
                            display: false, // Hide the x-axis grid lines
                        },
                        ticks: {
                            font: {
                                size: 9,
                            },
                        },
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                        },
                        ticks: {
                            font: {
                                size: 8,
                            },
                        },
                    },
                },
                interaction: {
                    intersect: false, // Disable line interactions to only show data point when hovering
                    mode: 'index',
                },
                plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                },
            };
            // Check if a chart instance already exists
            // If it does, destroy the previous chart before creating a new one
            if (chart !== null) {
                chart.destroy();
            }
            chart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: options,
            });
        }
        // Function to update the chart dynamically
        function updateChart(newLabels, newValues, newPreviousMonthValues) {
            chart.data.labels = newLabels;
            chart.data.datasets[0].data = newValues;
            chart.data.datasets[1].data = newPreviousMonthValues;
            chart.update();
        }
        // Call the generateChart function initially
        generateChart(@json($labels), @json($values), @json($previousMonthValues));
        // Get the current date
        var currentDate = new Date();
        // Format the date as desired (e.g., "As of 8 June 2023")
        var formattedDate = "as of " + currentDate.getDate() + " " +
            currentDate.toLocaleString("default", {
                month: "long"
            }) + " " +
            currentDate.getFullYear();
        // Set the formatted date as the content of the subtitle element
        document.getElementById("current-date").textContent = formattedDate;
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
