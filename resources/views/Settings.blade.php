<!DOCTYPE html>
<html>

<head>
    <title>LacakLaundry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('Image/logo1.png') }}" type="image/png">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <link href="Assets/css/settingsstyle.css" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
            <span class="brand-text">LacakLaundry</span>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebarbutton"><a href="/dashboard">Dashboard</a></li>
            <li class="sidebarbutton"><a href="/performance">Performance</a></li>
            <li class="sidebarbutton"><a href="/viewOrder">Orders</a></li>
            <div class="selected">
                <div class="sheet">
                    <li class="sidebarbutton"><a href="/settings">Settings</a></li>
                </div>
            </div>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="profile-container">
                    <div class="left-container">
                        <span class="profile-text" style="font-weight: bold; font-size: 20px;"> Settings</span>
                    </div>
                </div>
                <div class="table-container" style="padding-bottom: 30px;">
                    <div class="subtitle-1 bold19px">Profile</div>
                    <div class="flex-row-1">
                        <div class="overlap-group1">
                            <img class="profile-circle" src="{{ url('/data_file/' . Auth::user()->file) }}" />
                            <div class="profilepicture"></div>
                        </div>
                        <img class="line-1"
                            src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/line-1.svg"
                            alt="Line 1" />
                        <div class="flex-col">
                            <div class="length-pair">
                                <div class="title-4 regular16px">Name</div>
                                <div class="title-5 mulish-bold-steel-gray-20px bold-text">{{ Auth::user()->lastName }}
                                    {{ Auth::user()->firstName }}
                                </div>
                            </div>
                            <div class="length-pair">
                                <div class="title-4 regular16px">Role</div>
                                <div class="title-5 mulish-bold-steel-gray-20px bold-text">{{ $role }}</div>
                            </div>
                            <div class="length-pair">
                                <div class="title-4 regular16px">Email</div>
                                <div class="title-5 mulish-bold-steel-gray-20px bold-text">{{ Auth::user()->email }}
                                </div>
                            </div>
                            <a href="/settings/edit/{id}" style="text-decoration: none;">
                                <div class="overlap-group-1">
                                    <img class="vector-1"
                                        src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/vector-5.svg"
                                        alt="Vector" />
                                    <div class="label">Edit Profile</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-container">
                    @if (userHasRole('admin'))
                        <div class="settings">
                            <div class="settings-list-row">
                                <ul class="settings-list">
                                    <li class="settings-item"><a href="/settings/staff"><button
                                                class="mulish-bold-steel-gray-20px bold-text">Staff</button></a>
                                    </li>
                                </ul>
                                <img class="icon-arrow-right-1"
                                    src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/icon---arrow---right-1.svg"
                                    alt="icon / arrow - right" />
                            </div>
                            <div class="settings-list-row">
                                <a href="/settings/order">
                                    <ul class="settings-list">
                                        <li class="settings-item" style="margin-top: 10px;"><button
                                                class="mulish-bold-steel-gray-20px bold-text">Order
                                                Settings</button></li>
                                    </ul>
                                </a>
                                <img class="icon-arrow-right-2"
                                    src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/icon---arrow---right-1.svg"
                                    alt="icon / arrow - right" />
                            </div>
                            <div class="settings-list-row">
                                <ul class="settings-list">
                                    <li class="settings-item" style="margin-top: 10px;"><a
                                            href="{{ route('logout') }}"><button
                                                class="mulish-bold-steel-gray-20px bold-text">Log Out</button></a></li>
                                </ul>
                            </div>
                        @else
                            <div class="settings-list-row">
                                <ul class="settings-list">
                                    <li class="settings-item" style="margin-top: 10px;"><a
                                            href="{{ route('logout') }}"><button
                                                class="mulish-bold-steel-gray-20px bold-text">Log Out</button></a></li>
                                </ul>
                            </div>
                    @endif
                </div>

            </div>
        </div>
    </div>


</body>

</html>
