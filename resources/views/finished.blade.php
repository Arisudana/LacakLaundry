<!DOCTYPE html>
<html>

<head>
    <title>LacakLaundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <script src="jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../resources/js/expand2.js">

    <style>
        body {
            background-color: #F7F8FC;
            font-family: Mulish;
        }

        /* sidebar*/
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

        /* konten halaman */
        .col-lg-12 {
            padding-left: 210px;
            padding-right: 30px;
        }

        /* bagian header */
        .profile-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .left-container {
            flex: 1;
        }

        .profile-text {
            font-weight: bold;
            font-size: 18px;
        }

        .profile-picture {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            align-items: center;
            border: 2px solid #ccc;
            padding: 1px;
        }

        .admin-text {
            font-weight: 500;
            font-size: 13px;
            margin-right: 10px;
        }

        /* bagian konten utama */
        /* kerangka tabel */
        .table-container {
            background-color: #ffffff;
            padding: 20px 0px 20px 0px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 0;
            padding: 8px;
            text-align: left;
        }

        td {
            border-top: 1px solid #eee;
        }

        .table-title {
            text-align: left;
            margin-bottom: 20px;
            padding: 0px 20px 0px 20px;
        }

        .table-content {
            font-size: 13px;
        }

        .table-head {
            color: #9FA2B4;

        }

        .expandable-row.dark-mode {
            background-color: #F6F8FB;
        }

        .row-expand-1 {
            padding-left: 301px;
        }

        .row-expand-2 {
            padding-left: 371px;
        }

        .hidden-row {
            display: none;
        }

        .col-md-1 {
            margin: 0px 30px 0px 30px;
        }

        .row-tanggal {
            margin-bottom: 7px
        }

        .row-button {
            margin-bottom: 30px
        }

        /* isi tabel */
        .customer-info {
            font-size: 12px;
            color: #666;
        }

        .date-info {
            font-size: 12px;
            color: #666;
        }

        .expand-image {
            width: 45px;
        }

        .vector {
            width: 40px;
            margin-bottom: 8px;
        }

        .iron {
            width: 60px;
            margin-bottom: 14px;
        }

        .button {
            background-color: #28C797;
            border-radius: 5px;
            border-style: solid;
            border-color: #28C797;
            font-size: 9px;
            color: white;
        }

        .button.clicked {
            background-color: #144896;
            border-radius: 5px;
            border-style: solid;
            border-color: #144896;
            font-size: 9px;
            color: white;
        }

        .received-button {
            background-color: #144896;
            border-radius: 5px;
            border-style: solid;
            border-color: #144896;
            font-size: 9px;
            color: white;
        }

        /* footer tabel */
        .pagination {
            display: flex;
            justify-content: end;
            align-items: center;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .page-item {
            margin: 0 2px;
        }

        .page-link {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            border-radius: 5px;
            color: #9FA2B4;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .page-link:hover {
            background-color: #f5f5f5;
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }

        .page-item.disabled .page-link:hover {
            background-color: transparent;
        }

        .pagination-info {
            margin-right: 17px;
            margin-top: 2px;
            font-size: 12px;
            color: #9FA2B4;
            align-items: center;
            display: flex;
        }

        .rowpage-text {
            margin-right: 50px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 10px;
            font-size: 10px;
        }

        .dropdown-menu {
            font-size: 12px;
            min-width: unset;
            text-align: center;
        }

        .dropdown-toggle::after {
            display: none;
        }

        .btn-sm {
            padding: 0.01rem 0.2rem;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 0.2rem;
            background-color: transparent;
            border-color: transparent;
            color: #9FA2B4;
        }

        .btn-sm:hover {
            background-color: transparent;
            border-color: transparent;
            color: #000;
        }

        .dropdown-menu {
            min-width: 150px;
        }

        .dropdown-item {
            padding: 8px 16px;
        }
    </style>


</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
            <span class="brand-text">LacakLaundry</span>
        </div>
        <ul class="sidebar-nav">
            <li><a href="/dashboard">Overview</a></li>
            <li><a href="/performance">Performance</a></li>
            <li><a href="/viewOrder">History</a></li>
            <li><a href="/settings">Settings</a></li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12   ">
                <div class="profile-container">
                    <div class="left-container">
                        <span class="profile-text">&lt; Orders</span>
                    </div>
                    <span class="admin-text">Administrator</span>
                    <img class="profile-picture" src="Logo.jpg" alt="Profile Picture">
                </div>

                <div class="table-container">
                    <h5 class="table-title">Ongoing Laundries</h5>

                    <!-- tabel -->

                    <table class="table-content">
                        <!-- atribut -->
                        <thead class="table-head">
                            <tr>
                                <th scope="col" style="text-align:center;width:20%; padding-right:70px">Order ID</th>
                                <th scope="col" style="width:25%;">Customer Name</th>
                                <th scope="col">Laundry Weight</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>

                        <!-- domain -->
                        <tbody>

                            @foreach ($orders as $p)
                                <tr class="expandable-row">
                                    <td style="text-align:center; width:225px; padding-right:70px">{{ $p->id }}
                                    </td>
                                    <td><b> {{ $p->customerName }}</b><br>
                                        <small class="customer-info">
                                            Updated:
                                            {{ $p->orderDate }}
                                        </small>
                                    </td>
                                    <td style="padding-left:4%"><b>{{ $p->orderWeight }} kg</b></td>
                                    <td><b>{{ date('M d, Y', strtotime($p->orderDate)) }}</b>
                                        <small class="date-info"><br>
                                            {{ date('H:i', strtotime($p->orderDate)) }}
                                        </small>
                                    </td>
                                </tr>


                                <tr class="hidden-row" style="background-color: #F6F8FB;">
                                    <td colspan="4">
                                        @if ($p->orderType == 'Cuci Kering Setrika')
                                            <div class="row row-expand-1" style="margin-top:5px">

                                                {{-- Orientasi Kolom --}}
                                                <div class="col-md-1" style="text-align:center; flex-direction:column">

                                                    {{-- if error occurs, add display:flex --}}
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1;">
                                                            <img class="vector"
                                                                src="{{ asset('Assets/Icon/Vector.png') }}"
                                                                alt="">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1">
                                                            Received
                                                            <br>
                                                            {{ date('d/m/y', strtotime($p->orderDate)) }}
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/test/saved" method="POST"
                                                                class="washedForm">

                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Next</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1" style="text-align:center; flex-direction:column">
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1;">
                                                            <img class="expand-image"
                                                                src="{{ asset('Assets/Icon/WashingMachine.png') }}"
                                                                alt="" style="margin-bottom:13px">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1">
                                                            Washed
                                                            <br>
                                                            {{ date('d/m/y', strtotime($p->dateWashed)) }}
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/test/washed" method="POST"
                                                                class="washedForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Next</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1" style="text-align:center; flex-direction:column">
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1">
                                                            <img class="iron"
                                                                src="{{ asset('Assets/Icon/Iron.png') }}"
                                                                alt="">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1">
                                                            Iron
                                                            <br>
                                                            {{ date('d/m/y', strtotime($p->dateIroned)) }}
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/test/ironed" method="POST"
                                                                class="washedForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Next</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-1"
                                                    style="text-align:center; flex-direction:column">
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1">
                                                            <img class="expand-image"
                                                                src="{{ asset('Assets/Icon/Clothes.png') }}"
                                                                alt="">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1">
                                                            Ready
                                                            <br>
                                                            {{ date('d/m/y', strtotime($p->dateReady)) }}
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/test/ready" method="POST"
                                                                class="readyForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Next</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($p->orderType == 'Cuci Basah' || 'Cuci Kering')
                                            <div class="row row-expand-2" style="margin-top:5px">

                                                {{-- Orientasi Kolom --}}
                                                <div class="col-md-1"
                                                    style="text-align:center; flex-direction:column">

                                                    {{-- if error occurs, add display:flex --}}
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1;">
                                                            <img class="vector"
                                                                src="{{ asset('Assets/Icon/Vector.png') }}"
                                                                alt="">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1">
                                                            Received
                                                            <br>
                                                            {{ date('d/m/y', strtotime($p->orderDate)) }}
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/test/saved" method="POST"
                                                                class="washedForm">

                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Next</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"
                                                    style="text-align:center; flex-direction:column">
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1;">
                                                            <img class="expand-image"
                                                                src="{{ asset('Assets/Icon/WashingMachine.png') }}"
                                                                alt="" style="margin-bottom:13px">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1">
                                                            Washed
                                                            <br>
                                                            {{ date('d/m/y', strtotime($p->dateWashed)) }}
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/test/washed" method="POST"
                                                                class="washedForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Next</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"
                                                    style="text-align:center; flex-direction:column">
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1">
                                                            <img class="expand-image"
                                                                src="{{ asset('Assets/Icon/Clothes.png') }}"
                                                                alt="">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1">
                                                            Ready
                                                            <br>
                                                            {{ date('d/m/y', strtotime($p->dateReady)) }}
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/test/ready" method="POST"
                                                                class="readyForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Next</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach



                            <script>
                                const expandableRows = document.querySelectorAll('.expandable-row');
                                expandableRows.forEach(row => {
                                    row.addEventListener('click', function() {
                                        this.classList.toggle('dark-mode');
                                        // Toggle the visibility of the next row
                                        const nextRow = row.nextElementSibling;
                                        nextRow.classList.toggle('hidden-row');
                                    });
                                });




                                // var buttons = document.getElementsByClassName('myButton');
                                // Array.from(buttons).forEach(function(button) {
                                //     button.addEventListener('click', function() {
                                //         changeButton(this);
                                //     });
                                // });

                                // function changeButton(button) {
                                //     if (button.getAttribute('disabled') !== 'true') {
                                //         // var timestamp = new Date();
                                //         // var formattedTimestamp = timestamp.toISOString();
                                //         // var columnID = button.dataset.column;

                                //         // Disable the button
                                //         button.setAttribute('disabled', 'true');
                                //         button.innerText = 'Done';
                                //         button.classList.add('clicked');
                                //     }
                                // }

                                // document.getElementById('12').addEventListener('submit', function(event) {
                                //     event.preventDefault(); // Prevent the default form submission

                                //     // Set the current timestamp value in the hidden input field
                                //     document.getElementById('13').value = new Date().toISOString();

                                //     // Submit the form
                                //     this.submit();
                                // });

                                // Check if the button should be disabled on page load
                                window.addEventListener('load', function() {
                                    var button = document.getElementsByClassName('myButton');
                                    var buttonDisabled = sessionStorage.getItem('buttonDisabled');
                                    if (buttonDisabled) {
                                        button.setAttribute('disabled', 'true');
                                        button.innerText = 'Done';
                                    }
                                });
                            </script>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


</body>

</html>
