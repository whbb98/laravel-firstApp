@extends('layout.user-page')
@section('title', 'Blogs')
@php
    use App\Models\Blog;
    $active_page_number = 5;
    $favicon_url = 'assets/favicons/blog-icon.svg';
    $userBlogs = Blog::fetchUserBlogs();
    $participateBlogs = Blog::fetchParticipateBlogs();
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

        #search-suggestions {
            display: none;
            width: 50%;
            max-height: 200px;
            overflow: auto;
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
    {{-- >>>>>>>>>>>>>>>>>>>>>>> displaying status messages --}}
    @if (session('success'))
        <div class="mt-2 alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mt-2 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    {{-- <<<<<<<<<<<<<<<<<<<<<<< displaying status messages --}}
    <div class="blogs text-custom-dark">
        {{-- fetching my blogs --}}
        @foreach ($userBlogs as $blog)
            <div data-blog-type="{{ $blog['status'] }}" class="blog card p-0 bg-custom-secondary">
                <img class="card-img-top" src="{{ $blog['cover'] }}" alt="blog img" style="width:250px;height:150">
                <div class="card-body">
                    <span><i class="fa-solid fa-calendar-days"></i>
                        {{ $blog['datetime'] }}
                    </span>
                    <h6 class="blog-title mt-2">
                        {{ $blog['title'] }}
                    </h6>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <span><i class="fa-solid fa-user-group"></i>
                        {{ $blog['participants'] }}
                    </span>
                    <span><i class="fa-solid fa-message"></i>
                        {{ $blog['commentsCount'] }}
                    </span>
                    <a href="/blog/{{ $blog['blog_id'] }}" target="_blank" class="fw-bold text-custom-primary">Read More</a>
                </div>
            </div>
        @endforeach
        {{-- fetching other blogs --}}
        @foreach ($participateBlogs as $blog)
            <div data-blog-type="{{ $blog['status'] == -1 ? 'pending' : 'participate' }}"
                class="blog card p-0 bg-custom-secondary">
                <img class="card-img-top" src="{{ $blog['cover'] }}" alt="blog img" style="width:250px;height:150">
                <div class="card-body">
                    <span><i class="fa-solid fa-calendar-days"></i>
                        {{ $blog['datetime'] }}
                    </span>
                    <h6 class="blog-title mt-2">
                        {{ $blog['title'] }}
                    </h6>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <span><i class="fa-solid fa-user-group"></i>
                        {{ $blog['participants'] }}
                    </span>
                    <span><i class="fa-solid fa-message"></i>
                        {{ $blog['commentsCount'] }}
                    </span>
                    <a href="/blog/{{ $blog['blog_id'] }}" target="_blank" class="fw-bold text-custom-primary">Read
                        More</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
{{-- >>>>>>>>>>>>>modal add new blog------------ --}}
<!-- Modal -->
<div class="modal fade modal-xl" id="blog-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="blog-form" action="{{ route('createBlog-form') }}" method="POST" enctype="multipart/form-data"
            class="modal-content">
            @csrf
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
                        <input required name="blog_title" type="text" class="form-control" id="b-title"
                            value="{{ old('blog_title') }}">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b-description" class="form-label fw-bold">
                            Description: <span class="text-custom-warning fw-bold">*</span>
                        </label>
                        <textarea required name="blog_description" class="form-control" id="b-description">{{ old('blog_description') }}</textarea>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="b-participants" class="form-label fw-bold">
                            Blog Participats: <span class="text-custom-warning fw-bold">*</span>
                        </label>
                        <input type="text" class="form-control" id="bp-input"
                            placeholder="Participant (Name, Email, Username)">
                        {{-- ++++++++++++++ --}}
                        <div id="search-suggestions" class="dropdown-menu mt-2 col-auto"></div>
                        {{-- ++++++++++++++++ --}}
                        <input type="hidden" id="participants-input" name="participants">
                        <div class="bg-custom-secondary rounded row text-capitalize mt-2">
                            <span class="col-2 fw-bold">username</span>
                            <span class="col-4 fw-bold">full name</span>
                            <span class="col-6 fw-bold">email</span>
                        </div>
                        <ul id="bp-list" class="participants-list list-unstyled mt-1">

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
                        <input id="has-meeting-input" disabled name="meeting_datetime" type="datetime-local"
                            class="form-control" required>
                        <input id="has-meeting-url" disabled name="meeting_url" type="url"
                            class="form-control mt-2" required placeholder="https://meet.google.com/abcd123">
                    </div>
                    <div class="mb-3 mt-3">
                        <p class="form-label fw-bold text-warning">
                            Only Images are Supported! 'max size per image 5MB'
                        </p>
                        <input id="files_input" name="files[]" multiple type="file" class="" required>
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
