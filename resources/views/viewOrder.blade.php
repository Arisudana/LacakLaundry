<!DOCTYPE html>
<html>

<head>
    <title>LacakLaundry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('Image/logo1.png') }}" type="image/png">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="Assets/css/orderstyle.css">
</head>

<body>
    <div class="all-container">
        <div class="sidebar col-lg-2">
            <div class="sidebar-brand">
                <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
                <span class="brand-text">LacakLaundry</span>
            </div>
            <ul class="sidebar-nav">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/performance">Performance</a></li>
                <div class="selected">
                    <div class="sheet">
                        <li><a href="/viewOrder">Orders</a></li>
                    </div>
                </div>
                <li><a href="/settings">Settings</a></li>
            </ul>
        </div>
        <div class="container col-lg-10 offset-lg-2">
            <div class="row">
                <div>
                    <div class="profile-container">
                        <div class="left-container">
                            <a href="/dashboard" style="text-decoration: none; color: black;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                                </svg>
                                <span class="profile-text" href="/dashboard">Orders</span>
                            </a>
                        </div>
                        <span class="admin-text">{{ Auth::user()->firstName }}</span>
                        <img class="profile-picture" src="{{ url('/data_file/' . Auth::user()->file) }}"
                            alt="Profile Picture">
                    </div>
                    <div class="table-container">
                        <h4 class="table-title">Ongoing</h4>
                        <div class="table-header">
                            <a class="detail-text" href="/ongoing">View Details</a>
                        </div>
                        <table id="order-table" class="table-content">
                            <thead class="table-head">
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Laundry Weight</th>
                                    <th scope="col">Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestOngoingOrders as $order1)
                                    <tr>
                                        <td>{{ $order1->id }}</td>
                                        <td>{{ $order1->customerName }}</td>
                                        <td>{{ $order1->orderWeight }} Kg</td>
                                        <td>{{ date('M d, Y', strtotime($order1->orderDate)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-container">
                        <h4 class="table-title">Overdue</h4>
                        <div class="table-header">
                            <a class="detail-text" href="/overdue">View Details</a>
                        </div>
                        <table id="order-table" class="table-content">
                            <thead class="table-head">
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Laundry Weight</th>
                                    <th scope="col">Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestOverdueOrders as $order2)
                                    <tr>
                                        <td>{{ $order2->id }}</td>
                                        <td>{{ $order2->customerName }}</td>
                                        <td>{{ $order2->orderWeight }} Kg</td>
                                        <td>{{ date('M d, Y', strtotime($order2->orderDate)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-container">
                        <h4 class="table-title">Finished</h4>
                        <div class="table-header">
                            <a class="detail-text" href="/finished">View Details</a>
                        </div>
                        <table id="order-table" class="table-content">
                            <thead class="table-head">
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Laundry Weight</th>
                                    <th scope="col">Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestFinishedOrders as $order3)
                                    <tr>
                                        <td>{{ $order3->id }}</td>
                                        <td>{{ $order3->customerName }}</td>
                                        <td>{{ $order3->orderWeight }} Kg</td>
                                        <td>{{ date('M d, Y', strtotime($order3->orderDate)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
