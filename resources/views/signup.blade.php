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
    <style>
        .brand .logo {
            width: 150px
        }

        .input-group-text {
            width: 150px
        }
        .active{
            background-color: var(--custom-primary) !important;
            color:white;
        }
        #show-password {
            width: 50px;
            background-color: var(--custom-secondary);
            font-weight: bold;
        }
        #show-password:hover{
            background-color: var(--custom-primary) !important;
            color:white;
            cursor: pointer;
        }
    </style>
    <title>Create Account</title>
</head>

<body class="bg-custom-secondary pt-5">
    <div class="container row my-5 mw-100 vh-100 align-content-center justify-content-center">
        <h1 class="text-center text-custom-primary mb-5">
            <a href="/"><img class="logo" src="logo.svg"></a> Doctor New Account
        </h1>
        <form action="{{ route('signup-user') }}" method="POST" class="col-sm-10 col-md-6 mb-5">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    <a class="btn btn-custom-primary" href="/login">
                        Login Now!
                    </a>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    first name
                </span>
                <input required name="first_name" type="text" class="form-control" placeholder="eg: John"
                    value="{{ old('first_name') }}">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    family name
                </span>
                <input required name="last_name" type="text" class="form-control" placeholder="eg: Doe"
                    value="{{ old('last_name') }}">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    birth date
                </span>
                <input required name="birth_date" value="{{ old('birth_date') }}" type="date" class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    username
                </span>
                <input required name="username" value="{{ old('username') }}" type="text" class="form-control"
                    placeholder="eg: john123">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    email
                </span>
                <input required name="email" type="email" class="form-control" placeholder="eg: john_doe@gmail.com"
                    value="{{ old('email') }}">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    password
                </span>
                <input id="password-input" required name="password" type="password" class="form-control"
                    placeholder="minimum 10 characters">
                <span id="show-password" class="input-group-text">
                    <i class="fa-solid fa-eye"></i>
                </span>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    Gender
                </span>
                <select name="gender" class="form-select">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-primary text-cutom-dark fw-bold text-capitalize"
                    id="addon-wrapping">
                    mobile phone
                </span>
                <input required name="phone" value="{{ old('phone') }}" type="number" minlength="10"
                    class="form-control" placeholder="eg: 0123456789">
            </div>
            <button class="btn btn-custom-primary text-white fw-bold me-5" type="submit">Create Account</button>
            <a href="/login" class="text-decoration-none">Already a User</a>
        </form>
    </div>
    @include('layout.footer')
    <script defer src="{{ asset('assets/js/signup.js') }}"></script>
</body>

</html>
