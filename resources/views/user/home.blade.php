@extends('layout.user-page')
@section('title', 'Home Page')
@php
    $active_page_number = 1;
    $favicon_url = 'assets/favicons/home-icon.svg';
@endphp

@section('style')
    <style>

    </style>
@endsection



@section('page-content')

    <h3>Home</h3>
    <div class="row create-post">
        <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg" alt="user name"
            class="col-3 col-md-2 h-100 rounded-circle">
        <div class="col-9 col-md-10">
            <div class="form-floating">
                <textarea class="form-control bg-custom-secondary text-custom-dark" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">What's Happening Today !</label>
            </div>
            <div class="input-group mt-2 align-items-center">
                <input type="checkbox" name="post_visibility" id="post_visibility" class="">
                <label class="mx-2" for="post_visibility">Visible to All</label> 
                <input type="file" class="form-control" id="file-input" multiple accept=".jpg, .jpeg, .png, .pdf">
                <button class="btn btn-custom-primary text-white" type="button" id="share-button">Share</button>
            </div>
        </div>
    </div>










@endsection
