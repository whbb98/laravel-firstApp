@extends('layout.user-page')
@section('title', 'Network')
@php
    $active_page_number = 7;
    $favicon_url = 'assets/favicons/network.svg';
@endphp

@section('style')
    <style>
        .ellipsis {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
@endsection
@php
    require_once app_path('Helpers/constants.php');
@endphp
@section('page-content')
    <div class="container text-custom-dark">
        <h3 class="text-capitalize">manage your network</h3>
        <form id="search-users-form" action="{{ route('user-search-form') }}" method="GET" class="row mt-3 align-items-end">
            <div class="col-md-12">
                <div class="input-group">
                    <input id="search-query" name="search_query" type="text" class="form-control"
                        placeholder="Search users">
                    <button id="btn-search" class="btn btn-outline-custom-primary" type="submit">Search</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="city-filter" class="form-label fw-bold">
                            City:
                        </label>
                        <select name="city_filter" class="form-select" id="city-filter">
                            <option value="all" selected>All</option>
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
                        <select name="hospital_filter" class="form-select" id="hospital-filter">
                            <option value="all" selected>All</option>
                            @foreach ($hospitals as $key => $value)
                                <option value="{{ $key }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="department-filter" class="form-label fw-bold">
                            Department:
                        </label>
                        <select name="department_filter" class="form-select" id="department-filter">
                            <option value="all" selected>All</option>
                            @foreach ($hospitalDepartments as $key => $value)
                                <option value="{{ $key }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="occupation-filter" class="form-label fw-bold">
                            Occupation:
                        </label>
                        <input name="occupation_filter" type="text" name="" class="form-control"
                            id="occupation-filter">
                    </div>
                </div>
            </div>
        </form>
        <div id="user-profiles" class="row mt-3">
        </div>
    </div>
@endsection

@section('script')
    <script defer src="{{ asset('assets/js/user/network.js') }}"></script>
@endsection
