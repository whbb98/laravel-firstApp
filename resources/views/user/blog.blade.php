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
    <script defer src="{{ asset('assets/js/user/blog.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="/assets/favicons/blog-icon.svg">
    <title>Blog View</title>
</head>

<body>
    <div class="container">
        <div class="blog text-custom-dark">
            <div class="blog-header">
                <h3 class="mb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit !
                </h3>
                <div class="mb-4">
                    <span class="fs-5 fw-bold me-5">
                        <i class="fa-solid fa-user-doctor"></i>
                        Dr John Doe
                    </span>
                    <span class="fs-5 fw-bold">
                        <i class="fa-solid fa-calendar-days"></i>
                        dd-mm-yyyy
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
                        <li id="user-1" data-userid="1998" class="mb-2 rounded active">
                            <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg"
                                title="user 1" class="rounded-circle">
                            &nbsp;
                            <span class="d-none d-md-block">
                                {{ '@me' }}
                            </span>
                        </li>
                        @for ($i = 2; $i < 5; $i++)
                            <li id="user-{{ $i }}" data-userid="{{ $i * 10 }}" class="mb-2 rounded">
                                <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg"
                                    title="user {{ $i }}" class="rounded-circle">
                                &nbsp;
                                <span class="d-none d-md-block">
                                    user {{ $i }}
                                </span>
                            </li>
                        @endfor
                    </ul>
                </div>
                <div class="blog-slider bg-custom-secondary col rounded-end">
                    <div id="img-slider" class="image-slider">
                        @for ($i = 1; $i < 5; $i++)
                            <img id="img-{{ $i }}" data-imgID="{{ $i * 10 }}"
                                {{ $url = asset('mock/xray/img (') . $i . ').png' }} src="{{ $url }}">
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
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo repudiandae iusto
                    corporis nulla consequuntur inventore dicta minus exercitationem necessitatibus fugit nihil
                    assumenda provident, nemo rerum ducimus impedit labore? Eum quo ipsam distinctio tenetur quam
                    accusamus hic nobis quaerat dolor voluptates exercitationem tempora veniam a, maiores nesciunt? Quos
                    explicabo laborum dolore ipsam, a aspernatur accusamus? Necessitatibus cumque consectetur mollitia
                    error, esse, sequi excepturi at ab delectus culpa dolor quo voluptate. Reprehenderit dolorem sequi
                    fuga repudiandae atque fugiat, placeat perspiciatis eligendi necessitatibus in minus omnis? Nesciunt
                    itaque perspiciatis quaerat adipisci nostrum omnis quam illum in neque, dolorem rerum maiores.
                    Neque, quia fuga.</p>
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
            <div class="collapse" id="ai-predictions">
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
                                @for ($i = 0; $i < 5; $i++)
                                    <tr>
                                        <td class="fw-bold">Covid</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-custom-primary" role="progressbar"
                                                    style="width: 50%;">50%</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-custom-primary" role="progressbar"
                                                    style="width: 90%;">90%
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
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
                            <table id="feedback_table" class="table feedback">
                                <thead>
                                    <tr>
                                        <th class="col-2">Choice</th>
                                        <th class="col-2">Disease</th>
                                        <th>Vote Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td>
                                                <input id="choice-{{ $i }}" disabled
                                                    class="form-check-input" type="radio" name="choice"
                                                    value="1">
                                            </td>
                                            <td>
                                                <label class="form-check-label text-muted fw-bold"
                                                    for="choice-{{ $i }}">
                                                    Covid
                                                </label>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-custom-primary" role="progressbar"
                                                        style="width: 90%;">
                                                        90%
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom-primary text-white rounded">
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
                <div class="row">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg"
                                        width="50px" height="50px"
                                        class="img-fluid rounded-circle float-start me-3" alt="User Image">
                                    <h5 class="card-title">John Doe</h5>
                                    <p class="card-subtitle mb-2 text-muted">June 1, 2023</p>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Nullam
                                        varius magna ut
                                        tincidunt scelerisque. Proin rhoncus, lectus vel porta semper, urna nunc
                                        pharetra
                                        orci, sed finibus
                                        neque lacus a felis.</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                {{-- ------------------------------- --}}
            </div>
            <form class="comment-form mt-2" action="">
                <div class="input-group mb-4">
                    <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Your
                        Comment</span>
                    <input name="comment" type="text" class="form-control" placeholder="Write Your Comment">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
