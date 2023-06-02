<!DOCTYPE html>
<html>

<head>
    <title>Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,300&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #F7F8FC;
            font-family: Mulish;
        }

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            margin-left: 200px;
            /* Tambahkan margin kiri */
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
        }

        .table-content {
            font-size: 13px;
        }

        .table-head {
            color: #9FA2B4;
        }

        .customer-info {
            font-size: 12px;
            color: #666;
        }

        .date-info {
            font-size: 12px;
            color: #666;
        }

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

        .sheet {
            background-color: rgb(156, 157, 164, .08);
            content: '';
            top: 0;
            left: 0;
            height: 100%;
            width: 180px;
        }

        .selected {
            content: '';
            top: 0;
            left: 0;
            height: 100%;
            width: 2px;
            background-color: #ffffff;
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

        .table-container {
            display: flex;
            margin-left: 350px;
            margin-right: 170px;
        }

        .profile-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .left-container {
            flex: 1;
            margin-left: 200px;
        }

        .flex-row-1 {
            align-items: flex-start;
            display: flex;
            height: 326px;
            margin-left: 14.5px;
            min-width: 616px;
        }

        .overlap-group1 {
            align-self: center;
            border-radius: 75.5px;
            height: 151px;
            margin-bottom: 74px;
            position: relative;
            width: 151px;
        }

        .profilepicture {
            height: 135px;
            left: 8px;
            position: absolute;
            top: 8px;
            width: 135px;
        }

        .profile-circle {
            border: 1.5px solid;
            border-color: var(--snuff);
            border-radius: 75.5px;
            height: 151px;
            left: 0;
            position: absolute;
            top: 0;
            width: 151px;
        }

        .subtitle-1 {
            color: var(--steel-gray);
            font-weight: 700;
            line-height: normal;
            min-height: 30px;
            width: 89px;
        }

        .line-1 {
            filter: grayscale(100%) invert(100%) sepia(100%);
            height: 252px;
            margin-left: 64px;
            object-fit: cover;
            width: 1px;
        }

        .line-1::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #666;
            mix-blend-mode: multiply;
            opacity: 0.6;
        }

        .flex-col {
            align-items: flex-start;
            display: flex;
            flex-direction: column;
            margin-left: 89px;
            min-height: 326px;
            width: 311px;
        }

        .bold-text {
            font-weight: bold;
        }

        .length-pair {
            padding: 5px;
            align-items: center;
            margin-bottom: 10px;
        }

        .title-1 {
            color: var(--chicago);
            font-weight: 400;
            line-height: normal;
            margin-top: 36px;
            min-height: 18px;
            white-space: nowrap;
        }

        .title-5 {
            display: flex;
            letter-spacing: 0.2px;
            line-height: normal;
            margin-top: 16px;
            min-height: 18px;
            white-space: nowrap;
        }

        .title-2 {
            letter-spacing: 0.2px;
            line-height: normal;
            margin-top: 16px;
            min-height: 28px;
            width: 311px;
        }

        .overlap-group-1:hover {
            background-color: #036AB5;
        }

        .overlap-group-1 {
            align-items: center;
            background-color: #034c81;
            border-radius: 8px;
            display: flex;
            gap: 9px;
            height: 42px;
            justify-content: flex-end;
            margin-top: 36px;
            min-width: 168px;
            padding: 11px 13px;
        }

        .label {
            align-self: flex-end;
            transform: translateY(-11px);
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 0;
            bottom: 10px;
            text-align: center;
            white-space: nowrap;
            width: 113px;
        }

        .vector-1 {
            height: 17px;
            margin-top: 1px;
            width: 17px;

        }

        .title-4 {
            display: flex;
            color: chicago;
            font-weight: 400;
            margin-right: 10px;
            line-height: normal;
            min-height: 18px;
            white-space: nowrap;
        }

        .settings-list-row {
            width: 1130px;
            border-bottom: 1px solid #DADADA;
            display: flex;
        }

        .settings-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .settings-item {
            letter-spacing: 0.2px;
            line-height: normal;
            min-height: 18px;
            white-space: nowrap;
            padding: 10px 0;
            cursor: pointer;
        }

        .settings-item button {
            font-size: 15px;
            letter-spacing: 0.2px;
            line-height: normal;
            min-height: 18px;
            white-space: nowrap;
            padding: 10px 0;
            cursor: pointer;
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 1100px;
            text-decoration: none;
        }

        .settings-item a {
            text-decoration: none;
            color: #363740;
        }

        .settings-list-row:last-child {
            border-bottom: none;
        }

        .settings-list-row:hover {
            background-color: #f5f5f5;
        }

        .icon-arrow-right-1 {
            margin-left: auto;
        }

        .icon-arrow-right-2 {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg')}}" alt="Profile Picture">
            <span class="brand-text">LacakLaundry</span>
        </div>
        <ul class="sidebar-nav">
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="#">Performance</a></li>
            <li><a href="#">Orders</a></li>
            <div class="selected">
                <div class="sheet">
                    <li><a href="#">Settings</a></li>
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
                            <img class="profilepicture"
                                src="https://cdns.klimg.com/bola.net/library/upload/21/2023/04/645x430/maguire-dt-1_f8b85a8.jpg"
                                alt="avatar / man / _header" />
                            <div class="profile-circle"></div>
                        </div>
                        <img class="line-1"
                            src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/line-1.svg"
                            alt="Line 1" />
                        <div class="flex-col">
                            <div class="length-pair">
                                <div class="title-4 regular16px">Name</div>
                                <div class="title-5 mulish-bold-steel-gray-20px bold-text">Alif Destiano</div>
                            </div>
                            <div class="length-pair">
                                <div class="title-4 regular16px">Role</div>
                                <div class="title-5 mulish-bold-steel-gray-20px bold-text">Administrator</div>
                            </div>
                            <div class="length-pair">
                                <div class="title-4 regular16px">Email</div>
                                <div class="title-5 mulish-bold-steel-gray-20px bold-text">alifdestiano47@gmail.com
                                </div>
                            </div>
                            <a href="#" style="text-decoration: none;">
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
                    <div class="settings">
                        <div class="settings-list-row">
                            <ul class="settings-list">
                                <li class="settings-item"><a href="#"><button class="mulish-bold-steel-gray-20px bold-text">Staff</button></a>
                                </li>
                            </ul>
                            <img class="icon-arrow-right-1"
                                src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/icon---arrow---right-1.svg"
                                alt="icon / arrow - right" />
                        </div>
                        <div class="settings-list-row">
                            <ul class="settings-list">
                                <li class="settings-item"
                                    style="margin-top: 10px;"><a href="#"><button class="mulish-bold-steel-gray-20px bold-text">Order Settings</button></a></li>
                            </ul>
                            <img class="icon-arrow-right-2"
                                src="https://anima-uploads.s3.amazonaws.com/projects/646bcdfa56fd98051a2e06f4/releases/646bd21885600e5d5e42adf8/img/icon---arrow---right-1.svg"
                                alt="icon / arrow - right" />
                        </div>
                        <div class="settings-list-row">
                            <ul class="settings-list">
                                <li class="settings-item"
                                    style="margin-top: 10px;"><a href="/logout"><button class="mulish-bold-steel-gray-20px bold-text">Log Out</button></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

</html>
