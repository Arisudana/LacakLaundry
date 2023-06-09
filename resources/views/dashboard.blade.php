<!DOCTYPE html>
<html lang="en">

<head>
    <title>LacakLaundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="Assets/css/dashboardstyle.css" rel="stylesheet">
</head>

<body>
    <div class="all-container">
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
                <li><a href="/revenueDetail">Performance</a></li>
                <li><a href="{{ route('viewOrder') }}">Orders</a></li>
                <li><a href="/settings">Settings</a></li>
            </ul>
        </div>
        <div class="container col-lg-10 offset-lg-2">
            <div class="row">
                <div class="">
                    <div class="profile-container">
                        <div class="left-container">
                            <span class="profile-text">Dashboard</span>
                        </div>
                        <span class="admin-text">{{ Auth::user()->firstName }}</span>
                        <img class="profile-picture" src="admin.jpg" alt="Profile Picture">
                    </div>
                </div>
                <div class="row">
                    <a class="btn btn-primary btn-sm col-2" type="button" href="/newOrder"
                        style="height: 55px, width:5px;">+ New Order</a>
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
                                        <div class="col-12">Rp {{ $averageMonthlyRevenue }}</div>
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
                                        <div class="col-12">{{ $averageLaundryTime }}</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="card ordersCount">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <div class="table-header">
                            <a class="detail-text" href="/viewOrder">View Details</a>
                        </div>
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

</html>
