<!DOCTYPE html>
<html>

<head>
    <title>LacakLaundry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="Assets/css/revenuestyle.css" rel="stylesheet">
    <script src="Assets/js/revenue.js"></script>

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
                <div class="selected">
                    <div class="sheet">
                        <li><a href="{{ route('revenueDetail') }}">Performance</a></li>
                    </div>
                </div>
                <li><a href="{{ route('viewOrder') }}">Orders</a></li>
                <li><a href="/settings">Settings</a></li>
            </ul>
        </div>
        <div class="container col-lg-10 offset-lg-2">
            <div class="row">
                <div class="">
                    <div class="profile-container">
                        <div class="left-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                <path
                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg><span class="profile-text">Performance</span>
                        </div>
                        <span class="admin-text">{{ Auth::user()->firstName }}</span>
                        <img class="profile-picture" src="admin.jpg" alt="Profile Picture">
                    </div>
                    <div class="table-container">
                        <h4 class="table-title">Revenue Details</h4>
                        <div class="table-header">
                            <div class="sort-filter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                </svg>
                                <span id="sort-nominal-btn" class="sort-btn ascending-icon"
                                    data-sort="ascending"></span> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                </svg>
                                <button id="toggleFilterBtn" class="filter-btn btn-sm">Filter</button>

                                <div id="filterModal" class="modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Filter</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nameFilterInput" class="form-label">Filter by Customer
                                                        Name:</label>
                                                    <input type="text" id="nameFilterInput" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="dateFilterInput" class="form-label">Filter by
                                                        Date:</label>
                                                    <input type="text" id="dateFilterInput" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                    id="applyFilterBtn">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="order-table" class="table-content">
                            <thead class="table-head">
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Nominal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customerName }}</td>
                                        <td>{{ $order->orderDate }}</td>
                                        <td>Rp {{ $order->nominalOrder }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <div class="pagination-info">
                                    <span class="rowpage-text">Rows per page:
                                        <form method="GET" action="{{ route('revenueDetail') }}" class="form-inline">
                                            <div class="dropdown">
                                                <select name="rowsPerPage" class="form-select" onchange="this.form.submit()">
                                                    @for($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $i }}" {{ Request::get('rowsPerPage') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </form>
                                    </span>
                                    @php
                                        $rows = (request()->input('rowsPerPage') != null) ? request()->input('rowsPerPage') : 6;
                                        $page = (request()->input('page') != null) ? request()->input('page') : 1;
                                    @endphp
                                    <span>{{ $rows * $page - $rows + 1 }}-{{ $rows * $page }} of {{ $orders->total() }}</span>
                                </div>
                                <li class="page-item {{ !$orders->onFirstPage() ?: 'disabled' }}">
                                    <a class="page-link" href="{{ $orders->appends($_GET)->previousPageUrl() }}" tabindex="-1"
                                        aria-disabled="{{ $orders->onFirstPage() ? 'true' : 'false' }}">&lt;</a>
                                </li>
                                <li class="page-item {{ $orders->hasMorePages() ?: 'disabled' }}">
                                    <a class="page-link" href="{{ $orders->appends($_GET)->nextPageUrl() }}">&gt;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
