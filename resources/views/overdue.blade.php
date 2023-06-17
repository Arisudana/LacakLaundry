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
    <link rel="stylesheet" href="{{ asset('assets/css/overduestyle.css') }}">


</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
            <link rel="icon" href="{{ asset('Image/logo1.png') }}" type="image/png">
            <span class="brand-text">LacakLaundry</span>
        </div>
        <ul class="sidebar-nav">
            <li><a href="/dashboard">Overview</a></li>
            <li><a href="/performance">Performance</a></li>
            <li><a href="/viewOrder">Orders</a></li>
            <li><a href="/settings">Settings</a></li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12   ">
                <div class="profile-container">
                    <div class="left-container">
                        <a href="/viewOrder" style="text-decoration: none; color:#000"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                <path
                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg></a><span class="profile-text">Orders</span>
                    </div>
                    <span class="admin-text">{{ Auth::user()->firstName }}</span>
                    <img class="profile-picture" src="{{ url('/data_file/' . Auth::user()->file) }}"
                        alt="Profile Picture">
                </div>

                <div class="table-container">
                    <h5 class="table-title">Overdue Laundries</h5>

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
                                    <td style="text-align:center; width:225px; padding-right:70px">
                                        <b>{{ $p->id }}</b>
                                    </td>
                                    <td><b> {{ $p->customerName }}</b><br>

                                    </td>
                                    <td style="padding-left:4%"><b>{{ $p->orderWeight }} kg</b></td>
                                    <td><b>{{ date('M d, Y', strtotime($p->orderDate))}}</b>
                                        <small class="customer-info"><br>
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
                                                        <div class="content" style="flex-grow:1"><b>Received
                                                                <br>
                                                                {{ date('d/m/y', strtotime($p->orderDate)) }}</b>

                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <button type="submit" class="received-button">Done</button>
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
                                                        <div class="content" style="flex-grow:1"> <b> Washed
                                                                <br>
                                                                @if ($p->dateWashed == null)
                                                                    {{ '' }}
                                                                @else
                                                                    {{ date('d/m/y', strtotime($p->dateWashed)) }}
                                                                @endif
                                                            </b>
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/overdue/washed" method="POST"
                                                                class="washedForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-1"
                                                    style="text-align:center; flex-direction:column">
                                                    <div class="row">
                                                        <div class="content" style="flex-grow:1">
                                                            <img class="iron"
                                                                src="{{ asset('Assets/Icon/Iron.png') }}"
                                                                alt="">
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="row row-tanggal">
                                                        <div class="content" style="flex-grow:1"> <b> Iron
                                                                <br>
                                                                @if ($p->dateIroned == null)
                                                                    {{ '' }}
                                                                @else
                                                                    {{ date('d/m/y', strtotime($p->dateIroned)) }}
                                                                @endif
                                                            </b>
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/overdue/ironed" method="POST"
                                                                class="washedForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Update</button>
                                                            </form>

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
                                                        <div class="content" style="flex-grow:1"> <b> Ready
                                                                <br>
                                                                @if ($p->dateReady == null)
                                                                    {{ '' }}
                                                                @else
                                                                    {{ date('d/m/y', strtotime($p->dateReady)) }}
                                                                @endif
                                                            </b>
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/overdue/ready" method="POST"
                                                                class="readyForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Finish</button>
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
                                                        <div class="content" style="flex-grow:1"> <b> Received
                                                                <br>
                                                                {{ date('d/m/y', strtotime($p->orderDate)) }}</b>

                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <button type="submit"
                                                                class="received-button">Done</button>

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
                                                        <div class="content" style="flex-grow:1"> <b> Washed
                                                                <br>
                                                                @if ($p->dateWashed == null)
                                                                    {{ '' }}
                                                                @else
                                                                    {{ date('d/m/y', strtotime($p->dateWashed)) }}
                                                                @endif
                                                            </b>
                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/overdue/washed" method="POST"
                                                                class="washedForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Update</button>
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
                                                        <div class="content" style="flex-grow:1"> <b> Ready
                                                                <br>
                                                                @if ($p->dateReady == null)
                                                                    {{ '' }}
                                                                @else
                                                                    {{ date('d/m/y', strtotime($p->dateReady)) }}
                                                                @endif
                                                            </b>

                                                        </div>
                                                    </div>

                                                    <div class="row row-button">
                                                        <div class="content" style="flex-grow:1">
                                                            <form action="/overdue/ready" method="POST"
                                                                class="readyForm">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="idValue"
                                                                    value="{{ $p->id }}">
                                                                <button type="submit" class="button myButton"
                                                                    data-column="washed">Finish</button>
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
