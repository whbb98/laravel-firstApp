@extends('layout.user-page')
@section('title', 'Network')
@php
    $active_page_number = 7;
    $favicon_url = 'assets/favicons/network.svg';
@endphp

@section('style')
    <style>

    </style>
@endsection
@php
    // use App\Models\User;
    require_once app_path('Helpers/constants.php');
    // $user = User::find(session('userid'));
    // $profile = $user->profile;
    // $contact = $user->contact;
    // $notificationSettings = $user->notificationSettings;
    // $bg_link = $profile->getCover();
    // $userPhoto = $profile->getPhoto();
@endphp
@section('page-content')
    <div class="container text-custom-dark">
        <h3 class="text-capitalize">manage your network</h3>
        <div class="row mt-3 align-items-end">
            <div class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search users">
                    <button class="btn btn-outline-custom-primary" type="button">Search</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="city-filter" class="form-label fw-bold">
                            City:
                        </label>
                        <select class="form-select" id="city-filter">
                            <option value="0" selected>All</option>
                            @foreach ($cities as $key => $value)
                                <option value="{{ $key }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="hospital-filter" class="form-label fw-bold">
                            Hospital:
                        </label>
                        <select class="form-select" id="hospital-filter">
                            <option value="0" selected>All</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="department-filter" class="form-label fw-bold">
                            Department:
                        </label>
                        <select class="form-select" id="department-filter">
                            <option selected>All</option>
                            <!-- Add department options here -->
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="department-filter" class="form-label fw-bold">
                            Occupation:
                        </label>
                        <select class="form-select" id="occupation-filter">
                            <option selected>All</option>
                            <!-- Add department options here -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3" id="user-profiles">
            <!-- User profile cards will be dynamically added here -->
        </div>
    </div>
@endsection

@section('script')
    <script defer src="{{ asset('assets/js/user/network.js') }}"></script>
@endsection
