@extends('layout.user-page')
@section('title', 'Home Page')
@php
    $active_page_number = 1;
    $favicon_url = 'assets/favicons/home-icon.svg';
@endphp

@section('style')
    <style>
        .media {
            max-height: 500px
        }

        .media img {
            height: 200px;
        }

        .post-comments {
            max-height: 300px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .post-header img,
        .post-comments img {
            width: 100px;
            /* height: 100px; */
        }
    </style>
@endsection



@section('page-content')

    <div class="row create-post mb-5">
        <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg" alt="user name"
            class="col-3 col-md-2 h-100 rounded-circle">
        <form action="" enctype="multipart/form-data" class="col-9 col-md-10">
            <div class="form-floating">
                <textarea name="post_text" class="form-control bg-custom-secondary text-custom-dark" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">What's Happening Today !</label>
            </div>
            <div class="input-group mt-2 align-items-center">
                <input checked type="checkbox" name="post_visibility" class="form-check-input p-2 rounded">
                <label class="mx-2" for="post_visibility">Visible to All</label>
                <input name="post_file" type="file" class="form-control" id="file-input" multiple
                    accept=".jpg, .jpeg, .png, .pdf">
                <button type="submit" class="btn btn-custom-primary text-white" type="button" id="share-button">Share
                    Post</button>
            </div>
        </form>
    </div>

    <div class="posts text-custom-dark">
        <div id="user_post_1" class="post">
            <div class="row post-header align-items-center">
                <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg" alt="user name"
                    class="col-3 col-md-2 col-lg-2 rounded-circle">
                <div class="col-auto">
                    <h5>Dr John Doe</h5>
                    <span class="text-capitalize"><strong>@username</strong> wednesday 15 april</span>
                </div>
            </div>
            <div class="row post-body px-5 py-3">
                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam, ex a doloremque veniam
                    animi rerum ipsam pariatur obcaecati, dolorum alias quibusdam unde voluptas! Nobis eligendi voluptatem
                    hic eum culpa esse.</p>
                <div class="row media bg-custom-secondary justify-content-around overflow-auto rounded">
                    <img class="col-auto my-2 rounded" src="https://picsum.photos/500/300" alt="img-1">
                    <img class="col-auto my-2 rounded" src="https://picsum.photos/500/500" alt="img-2">
                    <img class="col-auto my-2 rounded" src="https://picsum.photos/300/600" alt="img-3">
                    <img class="col-auto my-2 rounded" src="https://picsum.photos/800/500" alt="img-4">
                </div>
            </div>
            <div class="post-footer">
                <div class="row rounded justify-content-center">
                    <div class="col-auto">
                        <span class="fw-bold">15</span>
                        <button class="btn btn-outline-custom-primary active">
                            <i class="fa-solid fa-thumbs-up"></i>
                        </button>
                        <span class="fw-bold">15</span>
                        <button class="btn btn-outline-custom-primary ">
                            <i class="fa-solid fa-thumbs-down"></i>
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-custom-primary" data-bs-toggle="collapse" href="#post-comment-1">
                            <i class="fa-solid fa-comment"></i>
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-custom-primary ">
                            <i class="fa-solid fa-share"></i>
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-custom-primary">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
                <div id="post-comment-1" class="collapse post-comments">
                    <div class="row user-comment align-items-center">
                        <img class="col-3 col-lg-2 rounded-pill"
                            src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg"
                            alt="user img">
                        <div class="col-5 col-lg-2">
                            <h6>Dr John Doe</h6>
                            <span class="col-1 fw-bold">@username</span>
                        </div>
                        <p class="lead mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis repellat ratione
                            autem nesciunt harum, necessitatibus dolor, nemo laboriosam repudiandae unde quod ullam! Quia
                            porro aliquid repellat ea reiciendis. Perferendis, ipsum.</p>
                    </div>
                    <div class="row user-comment align-items-center">
                        <img class="col-3 col-lg-2 rounded-pill"
                            src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg"
                            alt="user img">
                        <div class="col-5 col-lg-2">
                            <h6>Dr John Doe</h6>
                            <span class="col-1 fw-bold">@username</span>
                        </div>
                        <p class="lead mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis repellat ratione
                            autem nesciunt harum, necessitatibus dolor, nemo laboriosam repudiandae unde quod ullam! Quia
                            porro aliquid repellat ea reiciendis. Perferendis, ipsum.</p>
                    </div>
                    <form action="">
                        <div class="input-group mb-4">
                            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Your Comment</span>
                            <input name="comment" type="text" class="form-control" placeholder="Write Your Comment">
                        </div>
                    </form>
                </div>
            </div>
        </div>

















    </div>



@endsection
