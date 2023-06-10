@extends('layout.user-page')
@section('title', 'My Profile')
@php
    $active_page_number = 2;
    $favicon_url = 'assets/favicons/profile-icon.svg';
@endphp

@section('style')
    <style>
        .user-img {
            width: 150px;
            height: 150px;
            object-fit: cover
        }

        .profile-menu ul li a.active {
            color: white;
            font-weight: bold;
        }

        .ptr-cursor {
            cursor: pointer;
        }

        #career-data tr:hover {
            cursor: not-allowed;
        }
    </style>
@endsection
@php
    use App\Models\User;
    require_once app_path('Helpers/constants.php');
    $user = User::find(session('userid'));
    $profile = $user->profile;
    $contact = $user->contact;
    $notificationSettings = $user->notificationSettings;
    $bg_link = $profile->getCover();
    $userPhoto = $profile->getPhoto();
@endphp
@section('page-content')
    {{-- <h3>My Profile</h3> --}}
    <div class="profile rounded bg-custom-dark" style="background-image: url('{{ $bg_link }}')">

        <img src="{{ $userPhoto }}" alt="{{ session('username') }}" title="{{ session('username') }}"
            class="user-img rounded-circle">
        <div class="py-2 ps-4 mt-2 rounded-bottom bg-custom-secondary">
            <h5 class="text-capitalize">
                {{ session('first') . ' ' . session('last') }}
            </h5>
            <h6 class="text-capitalize">
                <span>{{ $profile->occupation }}</span>
            </h6>
            <span class="text-capitalize">{{ $hospitalDepartments[$profile->department] }}</span>
        </div>
    </div>
    {{-- >>>>>>>>>>>>>>>>>>>>>>> displaying status messages --}}
    @if (session('success'))
        <div class="mt-2 alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mt-2 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    {{-- ++++++++++++++++ user photo + cover +++++++++++++++++ --}}
    @if ($errors->has('user_photo'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('user_photo') }}
        </div>
    @endif

    @if ($errors->has('user_cover'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('user_cover') }}
        </div>
    @endif
    {{-- ++++++++++++++++ bio +++++++++++++++++ --}}
    @if ($errors->has('bio'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('bio') }}
        </div>
    @endif
    {{-- ++++++++++++++++ career info +++++++++++++++++ --}}
    @if ($errors->has('occupation'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('occupation') }}
        </div>
    @endif
    @if ($errors->has('department'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('department') }}
        </div>
    @endif
    @if ($errors->has('hospital'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('hospital') }}
        </div>
    @endif
    @if ($errors->has('other-hospital'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('other-hospital') }}
        </div>
    @endif
    @if ($errors->has('city'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('city') }}
        </div>
    @endif
    {{-- ++++++++++++++++ career row +++++++++++++++++ --}}
    @if ($errors->has('career_name'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('career_name') }}
        </div>
    @endif
    @if ($errors->has('career_period'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('career_period') }}
        </div>
    @endif
    @if ($errors->has('organization'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('organization') }}
        </div>
    @endif
    @if ($errors->has('career_type'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('career_type') }}
        </div>
    @endif
    {{-- ++++++++++++++++ contact me +++++++++++++++++ --}}
    @if ($errors->has('contact_phone'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('contact_phone') }}
        </div>
    @endif
    @if ($errors->has('contact_email'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('contact_email') }}
        </div>
    @endif
    @if ($errors->has('from_day'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('from_day') }}
        </div>
    @endif
    @if ($errors->has('to_day'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('to_day') }}
        </div>
    @endif
    @if ($errors->has('from_time'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('from_time') }}
        </div>
    @endif
    @if ($errors->has('to_time'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('to_time') }}
        </div>
    @endif
    {{-- ++++++++++++++++ account settings +++++++++++++++++ --}}
    @if ($errors->has('new_email'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('new_email') }}
        </div>
    @endif
    @if ($errors->has('password'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('password') }}
        </div>
    @endif
    @if ($errors->has('new_phone'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('new_phone') }}
        </div>
    @endif
    @if ($errors->has('current_password'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('current_password') }}
        </div>
    @endif
    @if ($errors->has('new_password'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('new_password') }}
        </div>
    @endif
    @if ($errors->has('new_password_confirm'))
        <div class="mt-2 alert alert-danger">
            {{ $errors->first('new_password_confirm') }}
        </div>
    @endif

    {{-- <<<<<<<<<<<<<<<<<<<<<<<< displaying status messages --}}
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

@endsection
