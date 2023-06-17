<!DOCTYPE html>
<html lang="en">

<head>
    <title>LacakLaundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <link href="Assets/css/dashboardstyle.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('Image/logo1.png') }}" type="image/png">
</head>

<body>
    <div class="container-fluid">
        <div class="sidebar col-lg-2">
            <div class="sidebar-brand">
                <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
                <span class="brand-text">LacakLaundry</span>
            </div>
            <ul class="sidebar-nav">
                <div class="selected">
                    <div class="sheet">
                        <li><a href="/dashboard">Dashboard</a></li>
                    </div>
                </div>

                <li><a href="{{ route('performance') }}">Performance</a></li>
                <li><a href="{{ route('viewOrder') }}">Orders</a></li>
                <li><a href="/settings">Settings</a></li>
            </ul>
        </div>
        <div class="container col-lg-10 offset-lg-2">
            <div class="profile-container" style="margin-bottom: 3%; margin-top:2%">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <span class="profile-text">Dashboard</span>
                            </div>
                            <div class="col-auto">
                                <span class="admin-text">{{ Auth::user()->firstName }}</span>
                                <img class="profile-picture" src="{{ url('/data_file/' . Auth::user()->file) }}" alt="Profile Picture">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <a class="btn btn-primary btn-sm" type="button" href="/newOrder">+ New Order</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row statusCardRow" style="margin-bottom: 3%">
                <div class="col-lg-4">
                    <div class="card statusCard">
                        <div class="card-body">
                            <h5 class="card-title statusTitle">Finished</h5>
                            <p class="card-text statusCount">{{ $orderTotals['finishedCount'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card statusCard">
                        <div class="card-body">
                            <h5 class="card-title statusTitle">Overdue</h5>
                            <p class="card-text statusCount">{{ $orderTotals['overdueCount'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card statusCard">
                        <div class="card-body">
                            <h5 class="card-title statusTitle">Ongoing</h5>
                            <p class="card-text statusCount">{{ $orderTotals['ongoingCount'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-bottom: 3%; padding-top:1%; padding-bottom:1%">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="card-title ms-2 chartTitle">Monthly Sales Performance</h5>
                        <p class="card-subtitle mb-2 text-muted ms-2 chartSubtitle" id="current-date"></p>
                    </div>
                    <div>
                        <a class="detail-text" href="{{ route('performance') }}">View Details</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <canvas id="chart" style="padding-left: 10px">

                        </canvas>
                    </div>
                    <div class="salesperformance" style="width: 25rem; height:40%; padding-bottom:1%">
                        <ul class="list-group list-group-flush" style="margin-top: 3%">
                            <li class="list-group-item text-center chartInfo" style="padding-bottom: 6%">
                                <div class="row">
                                    <div class="col-12 chartInfoTitle ">Total Revenue</div>
                                </div>
                                <div class="row">
                                    <div class="col-12 chartInfoText">Rp {{ number_format($totalRevenue, 0, '.', '.') }}</div>
                                </div>
                            </li>
                            <li class="list-group-item text-center chartInfo" style="padding-bottom: 6%; padding-top:6%;">
                                <div class="row">
                                    <div class="col-12 chartInfoTitle">Average revenue per day</div>
                                </div>
                                <div class="row">
                                    <div class="col-12 chartInfoText">Rp {{ number_format($averageMonthlyRevenue, 0, '.', '.') }}</div>
                                </div>
                            </li>
                            <li class="list-group-item text-center chartInfo" style="padding-bottom: 6%; padding-top:6%;">
                                <div class="row">
                                    <div class="col-12 chartInfoTitle">Average laundry weight</div>
                                </div>
                                <div class="row">
                                    <div class="col-12 chartInfoText">{{ $averageLaundryWeight }} Kg</div>
                                </div>
                            </li>
                            <li class="list-group-item text-center chartInfo" style=" padding-top:6%;">
                                <div class="row">
                                    <div class="col-12 chartInfoTitle">Average laundry time</div>
                                </div>
                                <div class="row">
                                    <div class="col-12 chartInfoText">{{ $averageLaundryTime }}</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="card ordersCount">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between" style="padding-top:2%; padding-bottom:1%">
                        <h5 style="font-weight: 700"> Orders</h5>
                        <span class="view-details">
                            <a class="detail-text" href="{{ route('viewOrder') }}"> View Details</a>
                        </span>
                    </div>
                    <ul class="list-group list-group-flush" style="margin-left: -1%">
                        <li class="list-group-item totalsCount">
                            <div class="row">
                                <div class="col-6">Total</div>
                                <div class="col-6 text-end">{{ $orderTotals['totalOrders'] }}</div>
                            </div>
                        </li>
                        <li class="list-group-item totalsCount">
                            <div class="row">
                                <div class="col-6">Current Month</div>
                                <div class="col-6 text-end">{{ $orderTotals['currentMonthOrders'] }}</div>
                            </div>
                        </li>
                        <li class="list-group-item totalsCount" style="margin-bottom: -1%">
                            <div class="row">
                                <div class="col-6">Last Month</div>
                                <div class="col-6 text-end">{{ $orderTotals['lastMonthOrders'] }}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <br>

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

</html>
