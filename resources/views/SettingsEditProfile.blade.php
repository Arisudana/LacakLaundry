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
    <link rel="stylesheet" href="{{ asset('assets/css/editprofilestyle.css') }}">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
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
                        <span class="profile-text" style="font-weight: bold; font-size: 20px; padding-left: 10px;">
                            Settings</span>
                    </div>
                </div>
                <div class="table-container" style="padding-bottom: 30px;">
                    <div class="subtitle-1 bold19px">Profile</div>
                    <div class="flex-row-1">
                        <div class="overlap-group1">
                            <img class="profilepicture" src="{{ url('/data_file/' . Auth::user()->file) }}" />
                            <div class="profile-circle"></div>
                            <div class="text-group">
                                <div class="title-5 mulish-bold-steel-gray-20px bold-text">{{ Auth::user()->lastName }}
                                    {{ Auth::user()->firstName }}</div>
                                <div class="title-4 regular16px bold">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <img class="line-1"
                            src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/line-1.svg"
                            alt="Line 1" />
                        <form id="update" action="/settings/edit/update" method="post">
                            <div class="flex-col">
                                <div class="col-sm-9">
                                    <div class="length-pair" style="padding-bottom: 20px;">
                                        {{ csrf_field() }}
                                        <label for="nama" class="col-form-label bold-text"
                                            style="padding-right: 80px;">First Name</label>
                                        <input type="hidden" name="id" value="{{ Auth::user()->username }}">
                                        <input type="text" class="form-control" name="lastName"
                                            value="{{ Auth::user()->lastName }}"
                                            placeholder="{{ Auth::user()->lastName }}">
                                    </div>
                                    <div class="length-pair" style="padding-bottom: 20px;">
                                        <label for="nama" class="col-form-label bold-text"
                                            style="padding-right: 80px;">Last
                                            Name</label>
                                        <input type="text" class="form-control" name="firstName"
                                            value="{{ Auth::user()->firstName }}"
                                            placeholder="{{ Auth::user()->firstName }}">
                                    </div>
                                    <div class="length-pair">
                                        <label for="nama" class="col-form-label bold-text"
                                            style="padding-right: 119px;">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}" placeholder="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="overlap-group-1" onclick="submitForm()">
                                    <img class="vector-1"
                                        src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/vector-5.svg"
                                        alt="Vector" />
                                    <div class="label">Save Changes</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm() {
            document.getElementById('update').submit();
        }
    </script>


</body>

</html>
