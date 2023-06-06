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


@section('page-content')
    <h3>Grow your Network</h3>
    
@endsection

@section('script')
    <script defer src="{{ asset('assets/js/user/network.js') }}"></script>
@endsection
