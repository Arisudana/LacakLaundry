<!DOCTYPE html>
<html>

<head>
    <title>LacakLaundry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('Image/logo1.png') }}" type="image/png">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/settingsorderstyle.css') }}">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="Logo.jpg" alt="Profile Picture">
            <span class="brand-text">LacakLaundry</span>
        </div>
        <ul class="sidebar-nav">
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/performance">Performance</a></li>
            <li><a href="/viewOrder">Orders</a></li>
            <div class="selected">
                <div class="sheet">
                    <li><a href="/settings">Settings</a></li>
                </div>
            </div>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="profile-container">
                    <div class="left-container">
                        <a href="/settings" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi-caret-left-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg></a>
                        <span class="profile-text" style="font-weight: bold; font-size: 20px;"> Settings</span>
                    </div>
                </div>
                <div class="right-container">
                    <div class="subtitle-1 bold19px">Time</div>
                </div>
                <form action="/settings/save" method="POST">
                    {{ csrf_field() }}
                    <div class="right-container">

                        <div class="form-group row" style="padding-top:10px;">
                            <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Overdue Time</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="overdueTime" name="overdueTime"
                                    placeholder=" {{ $orderSettingsData['overdueTimeValue'] }} Days">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row" style="padding-top:10px;">
                        <div class="right-container">
                            <div class="subtitle-1 bold19px" style="padding-top:30px;">Price</div>
                        </div>
                        <div class="right-container">
                            <div class="form-group row" style="padding-top:10px;">
                                <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Cuci
                                    Basah</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="cuciBasah" name="cuciBasah"
                                        placeholder="{{ $orderSettingsData['cuciBasahValue'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="right-container">
                            <div class="form-group row" style="padding-top:30px;">
                                <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Cuci
                                    Kering</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="cuciKering" name="cuciKering"
                                        placeholder="{{ $orderSettingsData['cuciKeringValue'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="right-container">
                            <div class="form-group row" style="padding-top:30px;">
                                <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Cuci Kering
                                    Setrika</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="cuciKeringSetrika"
                                        name="cuciKeringSetrika"
                                        placeholder="{{ $orderSettingsData['cuciKeringSetrikaValue'] }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="overlap-group-1">
                        <button type="submit" class="button-label">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>
