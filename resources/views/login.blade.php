<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- including custom-bootstrap + fontawsome + jquery --}}
    <link rel="stylesheet" href="assets/css/custom-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <script defer src="assets/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/jquery-3.7.0.min.js"></script>
    {{-- -------------------------------------------------- --}}
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="icon" type="image/x-icon" href="logo.svg">
    <title>Account Login</title>
    <style>
        .brand .logo {
            width: 150px
        }
    </style>
</head>

<body>

    <div class="container bg-custom-secondary row mw-100 vh-100 align-content-center justify-content-center">
        <h1 class="text-center text-custom-primary mb-5">
            Doctor Account Login
        </h1>
        <div class="text-center brand me-lg-2 col-md-3 mb-3">
            <a href="/"><img class="logo" src="logo.svg"></a>
        </div>
        <form class="col-sm-10 col-md-6 col-lg-5" action="">
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-custom-dark" id="addon-wrapping">
                    <i class="fa-solid fa-user-doctor"></i>
                </span>
                <input name="email" type="text" class="form-control" placeholder="Username or Email"
                    aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-custom-dark" id="addon-wrapping">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Username"
                    aria-describedby="addon-wrapping">
            </div>
            <button class="btn btn-custom-primary text-white" type="submit">Login</button>
            <a href="" class="text-decoration-none">Password Reset</a>
            or
            <a href="/signup" class="text-decoration-none">New Account</a>
        </form>
    </div>
    @include('layout.footer')
</body>

</html>
