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

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            margin-left: 200px;
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

        .right-container {
            display: flex;
            margin-left: 350px;
            margin-right: 170px;
        }

        .custom-label {
            width: 827px;
            height: 18px;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 18px;
            color: #144896;
            flex: none;
            order: 0;
            align-self: stretch;
            flex-grow: 0;
            font-weight: bold;
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

        .left-container a {
            text-decoration: none;
            color: #363740;
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
            border-radius: 75.5px;
            object-fit: cover;
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
            width: 1000px;
            padding: 5px;
            align-items: center;
            margin-bottom: 10px;
        }

        .title-5 {
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
            background-color: #059fd4;
        }

        .overlap-group-1 {
            align-items: center;
            background-color: #034c81;
            display: flex;
            width: 1180px;
            margin-left: 350px;
            margin-right: 170px;
            border-radius: 8px;
            gap: 9px;
            height: 42px;
            justify-content: center;
            margin-top: 36px;
            min-width: 168px;
            padding: 11px 13px;
        }

        .text-group {
            transform: translateY(+190px);
            text-align: center;
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

        .form-control {
            width: 1200px;
            height: 40px;
        }

        .vector-1 {
            height: 17px;
            margin-top: 1px;
            width: 17px;

        }

        .title-4 {
            color: chicago;
            font-size: smaller;
            font-weight: 400;
            margin-right: 10px;
            line-height: normal;
            min-height: 18px;
            white-space: nowrap;
        }

        .bi-caret-left-fill {
            padding-right: 10px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="Logo.jpg" alt="Profile Picture">
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
                        <a href="/settings/staff" style="text-decoration: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi-caret-left-fill" viewBox="0 0 16 16">
                                <path
                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg></a>
                        <span class="profile-text" style="font-weight: bold; font-size: 20px;"> Settings</span>
                    </div>
                </div>
                <div class="right-container">
                    <div class="form-group row" style="padding-top:40px;">
                        <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input">
                        </div>
                    </div>
                </div>
                <div class="right-container">
                    <div class="form-group row" style="padding-top:30px;">
                        <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input">
                        </div>
                    </div>
                </div>
                <div class="right-container">
                    <div class="form-group row" style="padding-top:30px;">
                        <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input">
                        </div>
                    </div>
                </div>
                <div class="right-container">
                    <div class="form-group row" style="padding-top:30px;">
                        <label for="labelsettings" class="col-sm-4 col-form-label custom-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kupon">
                        </div>
                    </div>
                </div>
                <a href="#" style="text-decoration: none;">
                    <div class="overlap-group-1">
                        <div class="label">Save</div>
                    </div>
                </a>
            </div>
        </div>
    </div>


</body>

</html>
