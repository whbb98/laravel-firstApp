<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- including custom-bootstrap + fontawsome + jquery --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    {{-- ----------including annotorious lib------------------ --}}
    <link rel="stylesheet" href="{{ asset('assets/css/annotorious.min.css') }}">
    <script defer src="{{ asset('assets/js/annotorious.min.js') }}"></script>
    {{-- ----------------------------------------------------- --}}
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    {{-- <script defer src="{{ asset('assets/js/user/blog.js') }}"></script> --}}
    <script defer src="{{ asset('assets/js/user/blog.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="/assets/favicons/blog-icon.svg">
    <title>Blog View {{ $id }}</title>
</head>

<body>
    <div class="container">
        <div class="mt-5 blog text-custom-dark">
            <div class="blog-header">
                <h3 class="mb-3">
                    {{ $blog->title }}
                </h3>
                <div class="mb-4">
                    <span class="fs-5 fw-bold me-5 text-capitalize">
                        <i class="fa-solid fa-user-doctor"></i>
                        {{ $blog->user->first_name . ' ' . $blog->user->last_name }}
                    </span>
                    <span class="fs-5 fw-bold">
                        <i class="fa-solid fa-calendar-days"></i>
                        {{ $blog->datetime }}
                    </span>
                </div>
            </div>
            <div class="row border border-custom-primary rounded">
                <div class="user-filter col-3 me-1">
                    <div
                        class="d-flex p-2 rounded-pill justify-content-center
                    align-items-center mb-3">
                        <i class="fa-solid fa-filter"></i>
                        <span class="fw-bold ms-2 d-none d-lg-inline-block">Filter by Doctor</span>
                    </div>
                    <ul id="users-list" class="list-unstyled">
                        {{-- me --}}
                        <li id="user-0" data-user_id="{{ $user->id }}" class="mb-2 rounded active">
                            <img src="{{ $user->profile->getPhoto() }}" title="{{ $user->first_name }}"
                                class="rounded-circle">
                            &nbsp;
                            <span class="d-none d-md-block text-capitalize">
                                {{ $user->first_name }}
                            </span>
                        </li>
                        {{-- blog participants --}}
                        @for ($i = 0; $i < count($users); $i++)
                            <li id="user-{{ $i + 1 }}" data-user_id="{{ $users[$i]->id }}"
                                class="mb-2 rounded">
                                <img src="{{ $users[$i]->profile->getPhoto() }}" title="{{ $users[$i]->first_name }}"
                                    class="rounded-circle">
                                &nbsp;
                                <span class="d-none d-md-block text-capitalize">
                                    {{ $users[$i]->first_name . ' ' . $users[$i]->last_name }}
                                </span>
                            </li>
                        @endfor
                        {{-- ------------------ --}}
                    </ul>
                </div>
                <div class="blog-slider bg-custom-secondary col rounded-end">
                    <div id="img-slider" class="image-slider">
                        @csrf
                        @for ($i = 0; $i < count($images); $i++)
                            <img id="img-{{ $i }}" data-image_id="{{ $images[$i]->id }}"
                                data-blog_id="{{ $images[$i]->blog_id }}" src="{{ $images[$i]->getPhoto() }}">
                        @endfor
                    </div>
                    <div class="slider-nav row">
                        <div class="col-md-auto">
                            <button id="previous-btn" class="btn btn-outline-custom-primary">
                                <i class="fa-regular fa-circle-left fa-lg"></i> &nbsp; previous
                            </button>
                            <span class="d-block">
                                &nbsp;
                                <span id="slider_count">current / total</span>
                                &nbsp;
                            </span>
                            <button id="next-btn" class="btn btn-outline-custom-primary">
                                next &nbsp;
                                <i class="fa-regular fa-circle-right fa-lg"></i>
                            </button>
                        </div>
                        <div class="col-md-auto">
                            <button id="fullscreen-btn" class="btn btn-outline-custom-primary">
                                <i class="fa-sharp fa-solid fa-expand fa-xl"></i>
                                &nbsp; full screen
                            </button>
                        </div>
                        <div class="col-md-auto">
                            <button id="rectangle-btn" class="btn btn-outline-custom-primary active"
                                title="Draw Rectangle Annotations">
                                <i class="fa-solid fa-vector-square"></i>
                            </button>
                            <button id="polygon-btn" class="btn btn-outline-custom-primary"
                                title="Draw Polygon Annotations">
                                <i class="fa-solid fa-draw-polygon"></i>
                            </button>
                            <button id="hide-btn" class="btn btn-outline-custom-primary" title="Hide Annotations">
                                <i id="hide-eye" class="fa-solid fa-eye-slash d-none"></i>
                                <i id="show-eye" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description mt-5">
                <h4>Description</h4>
                <p class="lead">{{ $blog->description }}</p>
            </div>
            {{-- ----------------AI Predictions ----------------- --}}
            <div class="ai-predictions p-2 rounded" data-bs-toggle="collapse" data-bs-target="#ai-predictions">
                <div class="d-flex align-items-center">
                    <img src="/logo.svg" width="35px" height="35px">
                    <span class="h4 ms-3">AI Predictions</span>
                </div>
                <span>
                    <i class="fa-solid fa-circle-chevron-down fa-xl"></i>
                    <i hidden class="fa-solid fa-circle-chevron-up"></i>
                </span>
            </div>
            <div id="ai-predictions" class="collapse">
                {{-- ++++++++++++++++++++++++++++++++++++++++++ --}}
                <div class="row">
                    <div class="col-md-12">
                        <table class="table text-custom-dark">
                            <thead>
                                <tr>
                                    <th>Disease Name</th>
                                    <th>Prediction %</th>
                                    <th>Accuracy %</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- this will be inserted by js using fetchPredictions --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- ------------------------------------------ --}}
            </div>
            {{-- -------------------Doctors Feedback---------------------- --}}
            <div class="dr-feedback mt-4 p-2 rounded" data-bs-toggle="collapse" data-bs-target="#dr-feedback">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-square-poll-vertical display-6"></i>
                    <span class="h4 ms-3">Doctors Feedback</span>
                </div>
                <span>
                    <i class="fa-solid fa-circle-chevron-down fa-xl"></i>
                    <i hidden class="fa-solid fa-circle-chevron-up"></i>
                </span>
            </div>
            <div class="collapse" id="dr-feedback">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="feedback_table" data-blog_id="{{ $blog->id }}" class="table feedback">
                                <thead>
                                    <tr>
                                        <th class="col-2">Choice</th>
                                        <th class="col-2">Disease</th>
                                        <th>Vote Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- will be populated by js --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button id="feedback-vote-btn" type="submit" disabled class="btn btn-custom-primary text-white rounded">
                        Vote
                    </button>
                    <button id="feedback-edit-btn" type="button" class="btn btn-outline-custom-primary rounded">
                        Edit
                    </button>
                </form>
            </div>
            {{-- -------------------Doctors Comments---------------------- --}}
            <h4 class="mt-5">Comments</h4>
            <div class="blog-comments p-3 rounded">
                {{-- +++++++++++++++++++++++++++++++ --}}
                <div id="blog-comments" class="row">
                </div>
                {{-- ------------------------------- --}}
            </div>
            <form id="form-comment" class="comment-form mt-2">
                <div class="input-group mb-4">
                    <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Your Comment</span>
                    <input id="comment" name="comment" type="text" class="form-control"
                        placeholder="Write Your Comment">
                </div>
            </form>
        </div>
    </div>
    @extends('layout.footer');
</body>

</html>
