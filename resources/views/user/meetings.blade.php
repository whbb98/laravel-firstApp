@extends('layout.user-page')
@section('title', 'Scheduled Meetings')
@php
    $active_page_number = 6;
    $favicon_url = 'assets/favicons/calendar-check-icon.svg';
    use App\Models\Meetings;
    $otherMeetings = Meetings::fetchMeetings();
    $userMeetings = Meetings::fetchUserMeetings();
    
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
            <i class="fa-solid fa-video text-custom-warning"></i>
            Scheduled
        </button>
        <button id="btn-happening" class="btn btn-outline-custom-primary rounded-pill me-2">
             Happened
        </button>
    </div>

    <div class="meetings text-custom-dark">
        {{-- fetch my meetings --}}
        @foreach ($userMeetings as $meeting)
            <div id="10" data-meeting-type="{{ $meeting['status'] }}" class="meeting card p-0 bg-custom-secondary">
                <img class="card-img-top" src="{{ $meeting['cover'] }}" alt="meeting img" style="width:250px;height:150">
                <div class="card-body">
                    <span><i class="fa-solid fa-calendar-days"></i>
                        {{ $meeting['date'] }}
                    </span>
                    <h6 class="meeting-title mt-2">
                        {{ $meeting['title'] }}
                    </h6>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span><i class="fa-solid fa-user-group"></i>
                        {{ $meeting['participants'] }}
                    </span>
                    <a href="{{ $meeting['link'] }}" target="_blank" class="btn btn-outline-custom-primary">Join Meeting</a>
                </div>
            </div>
        @endforeach
        {{-- fetch other meetings --}}
        @foreach ($otherMeetings as $meeting)
            <div id="10" data-meeting-type="{{ $meeting['status'] }}" class="meeting card p-0 bg-custom-secondary">
                <img class="card-img-top" src="{{ $meeting['cover'] }}" alt="meeting img" style="width:250px;height:150">
                <div class="card-body">
                    <span><i class="fa-solid fa-calendar-days"></i>
                        {{ $meeting['date'] }}
                    </span>
                    <h6 class="meeting-title mt-2">
                        {{ $meeting['title'] }}
                    </h6>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <span><i class="fa-solid fa-user-group"></i>
                        {{ $meeting['participants'] }}
                    </span>
                    <a href="{{ $meeting['link'] }}" target="_blank" class="btn btn-outline-custom-primary">Join
                        Meeting</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script defer src="{{ asset('assets/js/user/meetings.js') }}"></script>
@endsection
