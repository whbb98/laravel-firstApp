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
    <link rel="icon" type="image/x-icon" href="{{ $favicon_url }}">
    <link rel="stylesheet" href="assets/css/global.css">
    <title>@yield('title', 'default layout')</title>
    <style>
        .left-nav ul li:nth-of-type({{ $active_page_number }}) a {
            color: white !important;
            background-color: var(--custom-primary);
        }
    </style>
    @yield('style')
</head>

<body>

    {{-- start header --}}
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between">
                <a href="/home"
                    class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="logo.svg" alt="logo" width="50px">
                    <span class="fs-4 ms-2 text-capitalize text-custom-primary fw-bold">doctor ai collab</span>
                </a>
                <div class="user-nav-menu d-flex">
                    {{-- language dropdown 01 --}}
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-language fa-xl text-custom-primary"></i>

                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                            <li><a class="dropdown-item" href="#">French</a></li>
                        </ul>
                    </div>
                    {{-- ----------------------- --}}
                    {{-- push notifications dropdown 02 --}}
                    <div class="dropdown text-end ms-4">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bell fa-xl text-custom-primary"></i>
                            <span class="badge bg-custom-warning">4</span>
                        </a>
                        <ul class="dropdown-menu text-small overflow-hidden" style="">
                            <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Modi, fugit?</a></li>
                            <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Modi, fugit?</a></li>
                            <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Modi, fugit?</a></li>
                            <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Modi, fugit?</a></li>
                        </ul>
                    </div>
                    {{-- ----------------------- --}}
                    {{-- Messages  dropdown 03 --}}
                    <div class="dropdown text-end ms-4">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-envelope fa-xl text-custom-primary"></i>
                            <span class="badge bg-custom-warning">4</span>
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Modi, fugit?</a></li>
                            <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Modi, fugit?</a></li>
                            <li><a class="dropdown-item" href="#">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Modi, fugit?</a></li>

                        </ul>
                    </div>
                    {{-- ----------------------- --}}
                    {{-- User Menu dropdown 04 --}}
                    <div class="dropdown text-end ms-4">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg"
                                alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small" style="">
                            <li><a class="dropdown-item" href="/profile">My Profile</a></li>
                            <li><a class="dropdown-item" href="/messages">Messages</a></li>
                            <li><a class="dropdown-item" href="/notifications">Notifications</a></li>
                            <li><a class="dropdown-item" href="/blogs">Blogs</a></li>
                            <li><a class="dropdown-item" href="/meetings">Meetings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                    {{-- ------------------------- --}}
                </div>
            </div>
    </header>
    {{-- end header --}}

    {{-- start page content --}}
    <div class="container">
        <div class="row min-vh-100">
            <div class="left-nav col-2 col-sm-2 col-lg-2">
                <ul class="list-unstyled">
                    <li class="fw-bold text-custom-primary mb-4">
                        <a href="/home" title="Home Page"
                            class="text-lg-start btn btn-outline-custom-primary w-100 fs-6 rounded-pill">
                            <i class="fa-solid fa-house"></i>
                            <span class="d-none d-lg-inline">Home</span>
                        </a>
                    </li>
                    <li class="fw-bold text-custom-primary mb-4">
                        <a href="/profile" title="My Profile"
                            class="text-lg-start btn btn-outline-custom-primary w-100 fs-6 rounded-pill">
                            <i class="fa-solid fa-address-card"></i>
                            <span class="d-none d-lg-inline">Profile</span>
                        </a>
                    </li>
                    <li class="fw-bold text-custom-primary mb-4">
                        <a href="/messages" title="Messages"
                            class="text-lg-start btn btn-outline-custom-primary w-100 fs-6 rounded-pill">
                            <i class="fa-solid fa-envelope"></i>
                            <span class="d-none d-lg-inline">Messages</span>
                        </a>
                    </li>
                    <li class="fw-bold text-custom-primary mb-4">
                        <a href="/notifications" title="Notifications"
                            class="text-lg-start btn btn-outline-custom-primary w-100 fs-6 rounded-pill">
                            <i class="fa-solid fa-bell"></i>
                            <span class="d-none d-lg-inline">Notifications</span>
                        </a>
                    </li>
                    <li class="fw-bold text-custom-primary mb-4">
                        <a href="/blogs" title="Blogs"
                            class="text-lg-start btn btn-outline-custom-primary w-100 fs-6 rounded-pill">
                            <i class="fa-sharp fa-solid fa-blog"></i>
                            <span class="d-none d-lg-inline">Blogs</span>
                        </a>
                    </li>
                    <li class="fw-bold text-custom-primary mb-4">
                        <a href="/meetings" title="Meetings"
                            class="text-lg-start btn btn-outline-custom-primary w-100 fs-6 rounded-pill">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="d-none d-lg-inline">Meetings</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="page-content col-10 col-sm-10 col-lg-9 ">
                @yield('page-content')
            </div>
        </div>
    </div>
    @extends('layout.footer')
    {{-- end page content --}}
</body>

</html>
