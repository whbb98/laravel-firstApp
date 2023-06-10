@extends('layout.user-page')
@section('title', 'Blogs')
@php
    $active_page_number = 5;
    $favicon_url = 'assets/favicons/blog-icon.svg';
@endphp


@section('style')
    <style>
        .blogs {
            display: grid;
            grid-template-columns: auto;
            gap: 20px
        }

        @media(min-width:768px) {
            .blogs {
                grid-template-columns: auto auto;
                gap: 20px
            }
        }

        @media(min-width:992px) {
            .blogs {
                grid-template-columns: auto auto auto;
                gap: 20px
            }
        }

        .card img {
            height: 150px;
        }

        .blog {
            width: 250px;
        }

        .blog-title {
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

        .filter button:last-child {
            margin-left: auto
        }

        .participants-list li:hover {
            background-color: var(--custom-primary);
            color: white;
            cursor: no-drop
        }

        .participants-list {
            height: 100px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
@endsection


@section('page-content')
    <h3>Blogs</h3>
    <div class="filter mb-2">
        <button id="btn-all" class="active btn btn-outline-custom-primary rounded-pill me-2">
            All
        </button>
        <button id="btn-mine" class="btn btn-outline-custom-primary rounded-pill me-2">
            My Blogs
        </button>
        <button id="btn-participate" class="btn btn-outline-custom-primary rounded-pill me-2">
            Participating
        </button>
        <button id="btn-pending" class="btn btn-outline-custom-primary rounded-pill me-2">
            Pending
        </button>
        <button data-bs-toggle="modal" data-bs-target="#blog-modal" class="btn btn-custom-primary text-white fw-bold">
            Create Blog
        </button>
    </div>

    <div class="blogs text-custom-dark">
        <div id="10" data-blog-type="pending" class="blog card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="blog img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="blog-title mt-2">pending, ipsum dolor sit amet consectetur adipisicing elit. Expedita, nobis.
                </h6>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <span><i class="fa-solid fa-message"></i> 33</span>
                <a href="/blog/10" target="_blank" class="fw-bold text-custom-primary">Read More</a>
            </div>
        </div>
        <div id="20" data-blog-type="mine" class="blog card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="blog img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="blog-title mt-2">mine, ipsum dolor sit amet consectetur adipisicing elit. Expedita, nobis.</h6>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <span><i class="fa-solid fa-message"></i> 33</span>
                <a href="/blog/20" target="_blank" class="fw-bold text-custom-primary">Read More</a>
            </div>
        </div>
        <div id="30" data-blog-type="participate" class="blog card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="blog img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="blog-title mt-2">participate, ipsum dolor sit amet consectetur adipisicing elit. Expedita, nobis.
                </h6>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <span><i class="fa-solid fa-message"></i> 33</span>
                <a href="/blog/30" target="_blank" class="fw-bold text-custom-primary">Read More</a>
            </div>
        </div>
        <div id="40" data-blog-type="mine" class="blog card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="blog img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="blog-title mt-2">mine, ipsum dolor sit amet consectetur adipisicing elit. Expedita, nobis.</h6>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <span><i class="fa-solid fa-message"></i> 33</span>
                <a href="/blog/40" target="_blank" class="fw-bold text-custom-primary">Read More</a>
            </div>
        </div>
        <div id="50" data-blog-type="pending" class="blog card p-0 bg-custom-secondary">
            <img class="card-img-top" src="https://picsum.photos/500/500" alt="blog img">
            <div class="card-body">
                <span><i class="fa-solid fa-calendar-days"></i> 2022-04-02</span>
                <h6 class="blog-title mt-2">pending, ipsum dolor sit amet consectetur adipisicing elit. Expedita, nobis.
                </h6>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <span><i class="fa-solid fa-user-group"></i> 53</span>
                <span><i class="fa-solid fa-message"></i> 33</span>
                <a href="/blog/50" target="_blank" class="fw-bold text-custom-primary">Read More</a>
            </div>
        </div>
    </div>
@endsection
{{-- >>>>>>>>>>>>>modal add new blog------------ --}}
<!-- Modal -->
<div class="modal fade modal-xl" id="blog-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="blog-form" action="" method="POST" enctype="multipart/form-data" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-custom-primary" id="staticBackdropLabel">
                    Create New Blog
                </h1>
            </div>
            <div class="modal-body row text-custom-dark">
                <div class="col-8">
                    <div class="mb-3 mt-3">
                        <label for="b-title" class="form-label fw-bold">
                            Blog Title: <span class="text-custom-warning fw-bold">*</span>
                        </label>
                        <input required name="blog-title" type="text" class="form-control" id="b-title">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b-description" class="form-label fw-bold">
                            Description: <span class="text-custom-warning fw-bold">*</span>
                        </label>
                        <textarea required name="blog-description" class="form-control" id="b-description"></textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b-participants" class="form-label fw-bold">
                            Blog Participats: <span class="text-custom-warning fw-bold">*</span>
                        </label>
                        <input type="text" class="form-control" id="bp-input"
                            placeholder="Participant (Name, Email, Username)">
                        <div class="bg-custom-secondary rounded row text-capitalize mt-2">
                            <span class="col-2 fw-bold">username</span>
                            <span class="col-4 fw-bold">full name</span>
                            <span class="col-6 fw-bold">email</span>
                        </div>
                        <ul id="bp-list" class="participants-list list-unstyled mt-1">
                            <li class="row mb-1 rounded">
                                <span class="col-2">user-01</span>
                                <span data-type="email" class="col-4">abdelouahab one</span>
                                <span class="col-6">u1@gmail.com</span>
                            </li>
                            <li class="row mb-1 rounded">
                                <span class="col-2">user-02</span>
                                <span data-type="email" class="col-4">abdelouahab two</span>
                                <span class="col-6">u2@gmail.com</span>
                            </li>
                            <li class="row mb-1 rounded">
                                <span class="col-2">user-03</span>
                                <span data-type="email" class="col-4">abdelouahab three</span>
                                <span class="col-6">u3@gmail.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3 mt-3">
                        <input id="has_meeting" type="checkbox" name="has_meeting"
                            class="form-check-input p-2 rounded">
                        <label for="has_meeting" class="form-label fw-bold ms-1">
                            Schedule a Meeting
                        </label>
                        <input id="has-meeting-input" disabled name="meeting-date" type="datetime-local"
                            class="form-control" required>
                        <input id="has-meeting-url" disabled name="meeting-url" type="url"
                            class="form-control mt-2" required placeholder="https://meet.google.com/abcd123">
                    </div>
                    <div class="mb-3 mt-3">
                        <p class="form-label">file format that are supported are: jpg, jpeg, png
                        </p>
                        <input id="files_input" name="files" multiple type="file" class="d-none" required>
                        <button id="upload-btn" type="button" class="btn btn-custom-primary text-white">
                            <i class="fa-sharp fa-solid fa-x-ray"></i>
                            Upload Files
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-custom-primary text-white">Create</button>
                <button type="button" class="btn btn-custom-warning text-white"
                    data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
{{-- <<<<<<<<<<<<<modal add new blog------------ --}}
@section('script')
    <script defer src="{{ asset('assets/js/user/blogs.js') }}"></script>
@endsection
