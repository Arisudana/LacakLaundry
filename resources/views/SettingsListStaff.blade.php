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
    <link rel="stylesheet" href="{{ asset('assets/css/liststaffstyle.css') }}">
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




</body>

</html>
