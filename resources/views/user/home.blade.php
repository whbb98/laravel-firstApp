@extends('layout.user-page')
@section('title', 'Home Page')
@php
    $active_page_number = 1;
    $favicon_url = 'assets/favicons/home-icon.svg';
@endphp

@section('style')
    <style>
        .user-img{
            width: 150px;
            height: 125px;
        }
        @media(max-width:767px){
            .user-img{
            width: 125px;
            height: 100px;
        }
        }
        .post-files a {
            color: var(--custom-primary);
            text-decoration: none;
        }

        .post-files a:hover {
            font-weight: bold;
        }

        .post-comments .card {
            max-height: 250px;
            overflow: auto;
        }
    </style>
@endsection
@php
    use App\Models\User;
    $user = User::find(session('userid'));
    $profile = $user->profile;
    $userPhoto = $profile->getPhoto();
@endphp
@section('page-content')
    <div class="row create-post mb-5 align-items-center">
        <img src="{{ $userPhoto }}" alt="user name" class="user-img rounded-circle">
        <form action="" enctype="multipart/form-data" class="col">
            <div class="form-floating">
                <textarea name="post_text" class="form-control bg-custom-secondary text-custom-dark" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">What's Happening Today !</label>
            </div>
            <div class="input-group mt-2 align-items-center">
                <input checked type="checkbox" name="post_visibility" class="form-check-input p-2 rounded">
                <label class="mx-2">Visible to All</label>
                <input name="post_file" type="file" class="form-control" id="file-input" multiple
                    accept=".jpg, .jpeg, .png, .pdf">
                <button type="submit" class="btn btn-custom-primary text-white" type="button" id="share-button">Share
                    Post</button>
            </div>
        </form>
    </div>

    <div class="posts text-custom-dark">
        <div id="post-id" class="card mt-4">
            <div class="card-header bg-custom-secondary">
                <img src="https://picsum.photos/50" class="rounded-circle" alt="User Photo" width="50">
                <span class="ms-2 fw-bold">John Doe</span>
                <span class="ms-2">June 5, 2023</span>
            </div>
            <div class="card-body">
                <p class="card-text lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis et eligendi ipsa temporibus
                    doloribus tenetur sed laboriosam blanditiis, cupiditate nobis.
                </p>
                <div class="post-files mb-2">
                    <a href="path_to_pdf_file.pdf" target="_blank">
                        <i class="fa-solid fa-file"></i> Download File
                    </a>
                </div>
                <div id="post-id-slider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/500/300?random=1" class="d-block w-100" alt="Post Photo 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/500/300?random=2" class="d-block w-100" alt="Post Photo 2">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#post-id-slider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#post-id-slider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="card-footer bg-outline-custom-secondary">
                <button id="like-btn" class="btn btn-outline-custom-primary btn-sm">
                    <i class="fa-solid fa-thumbs-up"></i> Like
                </button>
                <button id="dislike-btn" class="btn btn-outline-custom-primary btn-sm"><i
                        class="fa-solid fa-thumbs-down"></i> Dislike
                </button>
                <button class="btn btn-outline-custom-primary btn-sm" data-bs-toggle="collapse"
                    data-bs-target="#post-id-comments">
                    <i class="fa-solid fa-comments"></i> Comment
                </button>
                <button id="share-btn" class="btn btn-outline-custom-primary btn-sm">
                    <i class="fa-solid fa-square-share-nodes"></i> Share
                </button>

                <!-- Comment section -->
                <div class="post-comments collapse mt-3" id="post-id-comments">
                    <div class="card card-body">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="mb-3">
                                <img src="https://picsum.photos/50" class="rounded-circle" alt="User Photo" width="50">
                                <strong>User{{ $i + 1 }}:</strong>
                                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt suscipit at
                                    voluptatibus dicta voluptas dolore nemo ratione omnis hic, obcaecati magni animi?
                                    Voluptatibus, officiis quos veniam nostrum ipsam incidunt perspiciatis!</span>
                            </div>
                        @endfor
                    </div>

                    <!-- Comment input and button -->
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="Write a comment">
                        <button class="btn btn-outline-custom-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script defer src="{{ asset('assets/js/user/home.js') }}"></script>
@endsection
