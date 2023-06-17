<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #363740;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 92vh;
        }

        h5,
        h6 {
            color: #A4A6B3;
        }

        .full-width-btn {
            width: 100%;
        }
    </style>
    <title>LacakLaundry</title>
    <link rel="icon" href="{{ asset('Image/logo1.png') }}" type="image/png">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-4">
                            <img src="{{ asset('Image/logo.jpg') }}" alt="Logo" height="45">
                        </div>
                        <div>
                            <h5 class="mb-4 card-text text-center">LacakLaundry</h6>
                        </div>
                        <h2 class="card-title text-center">Log In to LacakLaundry</h2>
                        <h6 class="mt-4 mb-4 card-text text-center">Enter your username and password below</h6>
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        <form method="POST" action="">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="email"
                                    placeholder="Username">
                            </div>
                            <div class="mb-3" style="position:relative">
                                <label for="password" class="form-label" >Password <span style="position: absolute; right: 0" class="form-text text-end" >
                                    <a  href="javascript:void(alert('Sorry! Please contact your administator for the password :)'))">Forgot Password?</a>
                                </span></label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">

                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary full-width-btn">Log In</button>
                            </div>
                            <div class="mt-4 form-text text-center">
                                <h6>Want to join? <a href="http://wa.me/6281287135011" target="_blank" >Contact our Sales Department</a></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
