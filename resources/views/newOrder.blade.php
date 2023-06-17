<!DOCTYPE html>
<html lang="en">

<head>
    <title>LacakLaundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('Image/logo1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/neworderstyle.css') }}">
</head>

<body>
    <div class="sidebar">
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
            <li><a href="{{ route('revenueDetail') }}">Performance</a></li>
            <li><a href="{{ route('viewOrder') }}">Orders</a></li>
            <li><a href="/settings">Settings</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="profile-container">
                    <div class="left-container">
                        <a href="/dashboard" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi-caret-left-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg></a>
                        <span class="profile-text" style="font-weight: bold; font-size: 20px;"> New Order</span>
                    </div>
                </div>
                <form action="/input" method="POST">
                    {{ csrf_field() }}
                    <div class="right-container">
                        <div class="form-group row" style="padding-top:40px;">
                            <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customerName" name="customerName">
                            </div>
                        </div>
                    </div>
                    <div class="right-container">
                        <div class="form-group row" style="padding-top:30px;">
                            <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Phone Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                            </div>
                        </div>
                    </div>
                    <div class="right-container">
                        <div class="form-group row" style="padding-top:30px;">
                            <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Laundry Weight
                                (Kilogram)</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="orderWeight" name="orderWeight">
                            </div>
                        </div>
                    </div>
                    <div class="right-container">
                        <div class="form-group row" style="padding-top:30px;">
                            <label for="orderType" class="col-sm-4 col-form-label custom-label">Laundry Type</label>
                            <div class="col-lg-8">
                                <select class="form-select form-select-lg mb-3" id="orderType" name="orderType">
                                    <option selected>Choose the option for the type of the laundry</option>
                                    <option value="Cuci Basah">Cuci Basah</option>
                                    <option value="Cuci Kering">Cuci Kering</option>
                                    <option value="Cuci Kering Setrika">Cuci Kering Setrika</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="right-container">
                        <div class="form-group row" style="padding-top:30px;">
                            <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Total Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="nominalOrder" name="nominalOrder">
                            </div>
                        </div>
                    </div>
                    <div class="overlap-group-1">
                        <button type="submit" class="button-label">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var overdueTime = {{ $orderSettingsData['overdueTimeValue'] }}
        var cuciBasahPrice = {{ $orderSettingsData['cuciBasahValue'] }}
        var cuciKeringPrice = {{ $orderSettingsData['cuciKeringValue'] }}
        var cuciKeringSetrikaPrice = {{ $orderSettingsData['cuciKeringSetrikaValue'] }}

        document.addEventListener('DOMContentLoaded', function() {
            var orderType = document.getElementById('orderType');
            var orderWeight = document.getElementById('orderWeight');

            orderType.addEventListener('change', function() {
                var selectedOption = orderType.value;
                var totalPrice = orderWeight.value;

                if (selectedOption === 'Cuci Basah') {
                    totalPrice *=cuciBasahPrice ;
                } else if (selectedOption === 'Cuci Kering') {
                    totalPrice *= cuciKeringPrice;
                } else if (selectedOption === 'Cuci Kering Setrika') {
                    totalPrice *= cuciKeringSetrikaPrice;
                }

                document.getElementById('nominalOrder').value = totalPrice;
            });
        });
    </script>


</body>

</html>
