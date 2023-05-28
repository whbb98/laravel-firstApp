@extends('layout.user-page')
@section('title', 'Notifications')
@php
    $active_page_number = 4;
    $favicon_url = 'assets/favicons/bell-icon.svg';
@endphp

@section('page-content')
    <h3>Notifications</h3>
    <div class="filter mb-2">
        <button class="active text-white btn btn-outline-custom-primary rounded-pill me-2 ">All</button>
        <button class="btn btn-outline-custom-primary rounded-pill">Unread</button>
    </div>

    <ul class="list-unstyled notifications">
        <li class="mb-4 row bg-custom-secondary text-custom-dark p-2 rounded">
            <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="user name"
                class="col-3 col-md-2 col-lg-2 h-100 rounded-circle">
            <div class="col-8 col-md-9 col-lg-10">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat quos aliquid saepe veniam iusto, maxime
                    voluptate dolore dolorum accusamus cupiditate vero fugiat beatae facilis! Temporibus quos corporis
                    quaerat iure adipisci!</p>
                <span class="fw-bold text-custom-primary">10 min ago</span>
            </div>
        </li>

    </ul>
@endsection
