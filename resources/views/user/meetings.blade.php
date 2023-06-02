@extends('layout.user-page')
@section('title', 'Scheduled Meetings')
@php
    $active_page_number = 6;
    $favicon_url = 'assets/favicons/calendar-check-icon.svg';
@endphp

@section('style')
    <style>
        .meetings {
            display: grid;
            grid-template-columns: auto;
            gap: 20px
        }

        @media(min-width:768px) {
            .meetings {
                grid-template-columns: auto auto;
                gap: 20px
            }
        }

        @media(min-width:992px) {
            .meetings {
                grid-template-columns: auto auto auto;
                gap: 20px
            }
        }

        .meeting {
            width: 250px;
            ;
        }

        .card img {
            height: 150px;
        }

        .meeting-title {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .active {
            color: white !important;
        }

        .filter {
            display: flex;
        }
    </style>
@endsection


@section('page-content')
    <h3>Meetings</h3>
    <div class="filter mb-2">
        <button id="btn-all" class="active btn btn-outline-custom-primary rounded-pill me-2">
            All
        </button>
        <button id="btn-scheduled" class="btn btn-outline-custom-primary rounded-pill me-2">
            Scheduled
        </button>
        <button id="btn-happening" class="btn btn-outline-custom-primary rounded-pill me-2">
            <i class="fa-solid fa-video text-custom-warning"></i> Happening
        </button>
    </div>

    <div class="meetings text-custom-dark">
        <div id="10" data-meeting-type="scheduled" class="meeting card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="meeting img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="meeting-title mt-2">scheduled, ipsum dolor sit amet consectetur adipisicing elit. Expedita,
                    nobis.
                </h6>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <a href="/meeting/10" target="_blank" class="btn btn-outline-custom-primary">Join Meeting</a>
            </div>
        </div>
        <div id="20" data-meeting-type="happening" class="meeting card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="meeting img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="meeting-title mt-2">happening, ipsum dolor sit amet consectetur adipisicing elit. Expedita,
                    nobis.
                </h6>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <a href="/meeting/20" target="_blank" class="btn btn-outline-custom-primary">Join Meeting</a>
            </div>
        </div>
        <div id="30" data-meeting-type="scheduled" class="meeting card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="meeting img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="meeting-title mt-2">scheduled, ipsum dolor sit amet consectetur adipisicing elit. Expedita,
                    nobis.
                </h6>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <a href="/meeting/30" target="_blank" class="btn btn-outline-custom-primary">Join Meeting</a>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script defer src="{{ asset('assets/js/meetings.js') }}"></script>
@endsection
