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
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="icon" type="image/x-icon" href="logo.svg">
    <style>
        .brand .logo {
            width: 150px
        }

        .input-group-text {
            width: 150px
        }
    </style>
    <title>Create Account</title>
</head>

<body class="bg-custom-secondary py-5">
    <div class="container row mw-100 vh-100 align-content-center justify-content-center">
        <h1 class="text-center text-custom-primary mb-5">
            <a href="/"><img class="logo" src="logo.svg"></a>   Doctor New Account
        </h1>
        <form class="col-sm-10 col-md-6 col-lg-5 mb-5" action="">
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    first name
                </span>
                <input required name="first_name" type="text" class="form-control" placeholder="eg: Ahmed">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    family name
                </span>
                <input required name="last_name" type="text" class="form-control" placeholder="eg: Yamani">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    birth date
                </span>
                <input required name="birth_date" type="date" class="form-control">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    username
                </span>
                <input required name="username" type="text" class="form-control" placeholder="eg: ahmed154">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    email
                </span>
                <input required name="email" type="email" class="form-control"
                    placeholder="eg: ahmed_yamani@gmail.com">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    password
                </span>
                <input required name="password" type="password" class="form-control"
                    placeholder="minimum 10 characters">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    repeat password
                </span>
                <input required name="password_repeat" type="password" class="form-control">
            </div>
            <div class="input-group flex-nowrap mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    mobile phone
                </span>
                <input required name="phone" type="number" class="form-control" placeholder="eg: 05 61 50 13 71">
            </div>
            <button class="btn btn-custom-primary text-white fw-bold me-5" type="submit">Create Account</button>
            <a href="/login" class="text-decoration-none">Already a User</a>
        </form>
    </div>
    @include('layout.footer')
</body>

</html>
