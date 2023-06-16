<!DOCTYPE html>
<html>

<head>
    <title>LacakLaundry</title>
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
            margin-left: 0px;
            flex: 1;
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

        .table-container {
            margin-left: 350px;
            margin-right: 170px;
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: end;
            margin-top: -130px;
            margin-bottom: 20px;
        }

        .detail-text {
            list-style: none;
            text-decoration: none;
            color: #144896;
            font-size: 13px;
            font-weight: 700;
            margin-right: 10px;
            margin-left: 3px;
        }

        .detail-text:hover {
            background-color: transparent;
            border-color: transparent;
        }

        td {
            border-top: 1px solid #eee;
        }

        .green-status {
            background-color: #0EAD38;
            color: white;
            padding: 5px 10px;
            height: 18px;
            width: 40px;
            left: 0px;
            top: 0px;
            border-radius: 100px;
            text-align: center;

        }

        .gray-status {
            background-color: #A4A6B3;
            color: white;
            padding: 5px 10px;
            height: 18px;
            width: 50px;
            left: 0px;
            top: 0px;
            border-radius: 100px;
            text-align: center;

        }

        .more-button {
            float: right;
            margin-top: -10px;
            margin-right: -10px;
            background: none;
            border: none;
            cursor: pointer;
            color: #A4A6B3;
        }

        .table-title {
            text-align: left;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 25px;
            transform: translateY(-25px);
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

        .bold-text {
            font-weight: bold;
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
            border-radius: 8px;
            display: flex;
            height: 25px;
            justify-content: flex-end;
            margin-top: 36px;
            min-width: 138px;
            padding: 11px 13px;
        }

        .label {
            align-self: flex-end;
            transform: translateY(-4px);
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 0;
            bottom: 10px;
            text-align: center;
            white-space: nowrap;
            width: 113px;
        }

        .vector-1 {
            height: 30px;
            margin-top: 1px;
            width: 30px;
            transform: translateX(+10px);
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
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img class="sidebar-brand-picture" src="{{ asset('Image/logo.jpg') }}" alt="Profile Picture">
            <span class="brand-text">LacakLaundry</span>
    </div>
    <ul class="sidebar-nav">
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="{{ route('performance') }}">Performance</a></li>
        <li><a href="#">Orders</a></li>
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
                    <h4 class="table-title bold19px">Staff</h4>
                    <div class="table-header">
                        <a href="/settings/staff/add" style="text-decoration: none;">
                            <div class="overlap-group-1">
                                <img class="vector-1" src="https://i.postimg.cc/7LJfMvhC/image-3.png" alt="Vector" />
                                <div class="label">Add Staff</div>
                            </div>
                        </a>
                    </div>
                    <table id="order-table" class="table-content">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::user()->lastName }} {{ Auth::user()->firstName }}</td>
                                <td>
                                    {{ Auth::user()->email }}
                                </td>
                                <td>{{ $role }}</td>
                                <td>
                                    @if (Auth::user()->status)
                                        <div class="green-status">Active</div>
                                    @else
                                        <div class="gray-status">Inactive</div>
                                    @endif
                                </td>
                                <td>
                                    <button class="more-button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-three-dots-vertical"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg></button>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tbody>
                        <tbody>
                            @foreach ($akun_staff as $user)
                                <tr>
                                    <td>{{ $user->lastName }} {{ $user->firstName }}</td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>Staff</td>
                                    <td>
                                        @if ($user->status)
                                            <div class="green-status">Active</div>
                                        @else
                                            <div class="gray-status">Inactive</div>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="more-button"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path
                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $akun_staff->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</body>

</html>
