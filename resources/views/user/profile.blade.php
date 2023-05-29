@extends('layout.user-page')
@section('title', 'My Profile')
@php
    $active_page_number = 2;
    $favicon_url = 'assets/favicons/profile-icon.svg';
@endphp

@section('style')
    <style>
        .profile-menu ul li a.active {
            color: white;
            font-weight: bold;
        }
        .ptr-cursor{
            cursor: pointer;
        }
    </style>
@endsection

@section('page-content')
    <h3>My Profile</h3>
    @php
        $bg_link = 'https://natureconservancy-h.assetsadobe.com/is/image/content/dam/tnc/nature/en/photos/Zugpsitze_mountain.jpg?crop=0%2C214%2C3008%2C1579&wid=1200&hei=630&scl=2.506666666666667';
    @endphp
    <div class="profile rounded bg-custom-dark" style="background-image: url('{{ $bg_link }}')">

        <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg" alt="user name"
            class="col-3 col-md-2 h-100 rounded-circle">
        <div class="py-2 ps-4 mt-2 rounded bg-custom-secondary">
            <h5>John Doe</h5>
            <h6>Radiologist</h6>
        </div>
    </div>

    {{-- menu tabs >>>>>>>>>> --}}
    <div class="profile-menu mt-4 rounded">
        <ul class="nav nav-tabs bg-custom-secondary rounded-pill justify-content-between">
            <li class="nav-item">
                <a class="btn btn-outline-custom-primary active rounded-pill" data-bs-toggle="tab"
                    href="#overview">Overview</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-custom-primary rounded-pill" data-bs-toggle="tab"
                    href="#experience">Experience</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-custom-primary rounded-pill" data-bs-toggle="tab" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-custom-primary rounded-pill" data-bs-toggle="tab" href="#settings">Settings</a>
            </li>
        </ul>

        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="overview">
                @include('layout.profile-overview')
            </div>
            <div class="tab-pane fade" id="experience">
                @include('layout.profile-experience')
            </div>
            <div class="tab-pane fade" id="contact">
                @include('layout.profile-contact')
            </div>
            <div class="tab-pane fade" id="settings">
                @include('layout.profile-settings')
            </div>
        </div>
    </div>
    {{-- <<<<<<<<<<menu tabs --}}

    {{-- <p class="bio">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem voluptates iure animi numquam voluptate!
        Consectetur soluta optio reiciendis deleniti ipsam consequatur suscipit maxime cupiditate non, quidem quibusdam.
        Quia, explicabo est?
    </p> --}}

    <div class="info">

    </div>

    <div class="followers">

    </div>




@endsection
