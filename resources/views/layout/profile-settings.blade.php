<div class="row">
    {{-- ------------- personal information ------------------------ --}}
    <div class="bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#p-info">
        Personal Information
    </div>
    <div id="p-info" class="row mx-0 p-4 justify-content-between align-items-center collapse border rounded-bottom">
        <form action="/profile/updateProfilePhoto" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-lg-3">
                <img id="user_photo" class="rounded-circle" src="{{ $profile->getPhoto() }}" alt="user name"
                    width="100px" height="100px">
            </div>
            <div class="col-lg-4">
                <span class="fs-5">Upload A Photo</span>
                <p>For Best Results Choose Jpeg Or Png File Format.
                    The Photo Must Be Real And Personal</p>
                <input name="user_photo" class="mb-2" id="photo_input" type="file">
            </div>
            <div class="col-lg-3">
                <button id="photo_upload"
                    class="d-block-lg btn btn-custom-primary text-white rounded-pill me-3">Upload</button>
                <button type="button" id="photo_remove"
                    class="d-block-lg btn btn-outline-custom-primary rounded-pill">Remove</button>
            </div>
        </form>
        {{-- ------------------------------------------------------ --}}
        <hr class="my-5">
        {{-- ------------------------------------------------------ --}}
        <form action="/profile/updateProfileCover" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-lg-3">
                <img id="user_cover" class="rounded" src="https://dummyimage.com/950x200/000/fff" alt="cover photo"
                    width="200px" height="100px">
            </div>
            <div class="col-lg-4">
                <span class="fs-5">Upload a Cover Photo</span>
                <p>For Best Results Choose Jpeg Or Png File Format.</p>
                <input name="user_cover" class="mb-2" id="cover_input" type="file">
            </div>
            <div class="col-lg-3">
                <button id="cover_upload"
                    class="d-block-lg btn btn-custom-primary text-white rounded-pill me-3">Upload</button>
                <button type="button" id="cover_remove"
                    class="d-block-lg btn btn-outline-custom-primary rounded-pill">Remove</button>
            </div>
        </form>
        {{-- ------------------------------------------------------ --}}
        <hr class="my-5">
        {{-- ------------------------------------------------------ --}}
        <form id="profile-bio-form" method="POST" action="/profile/updateProfileBio" class="row">
            @csrf
            <div class="form-floating">
                <textarea required disabled name="bio" class="form-control text-custom-dark" id="bio" style="height: 100px">
                {{ $profile->bio }}
                </textarea>
                <label for="bio" class="ms-2">Write you Bio !</label>
            </div>
            <button type="submit" class="mt-4 col-5 col-md-3 btn btn-custom-primary text-white">Save Changes</button>
            <button id="edit-profile-bio-btn" type="button"
                class="ms-4 mt-4 col-5 col-md-3 btn btn-outline-custom-primary">Edit</button>
        </form>
        {{--  --}}
    </div>
    {{-- -----------------career information ------------------------ --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#c-info">
        Career Information
    </div>
    <div class="p-4 collapse border rounded-bottom" id="c-info">
        {{-- current occupation info --}}
        <form id="career-form" method="POST" action="/profile/updateProfileCareer">
            @csrf
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i>Occupation</span>
                <input disabled name="occupation" type="text" class="form-control"
                    value="{{ $profile->occupation }}">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i>Department</span>
                <select disabled name="department" type="text" class="form-control">
                    @foreach ($hospitalDepartments as $key => $value)
                        <option @if ($key == $profile->department) selected @endif value="{{$key}}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold"><i
                        class="fa-solid fa-location-dot me-1"></i>City</span>
                <select disabled name="city" class="form-control">
                    @php
                        require_once app_path('Helpers/constants.php');
                    @endphp
                    @foreach ($cities as $key => $value)
                        <option value="{{ $key }}" @if ($key == $profile->city) selected @endif>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text text-custom-primary fw-bold text-custom-dark">
                    <i class="fa-solid fa-hospital me-1"></i>Hospital</span>
                <select id="hospitals-select" disabled name="hospital" type="text" class="form-control">
                    @foreach ($hospitals as $key => $value)
                        <option @if ($key == $profile->hospital) selected @endif value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="other-hospital" hidden class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Other Hospital</span>
                <input disabled required name="other_hospital" type="text" class="form-control" value="{{$profile->other_hospital}}">
            </div>
            <button class="btn btn-custom-primary text-white col-4 col-md-3" type="submit">Save Changes</button>
            <button id="edit-career-btn" class="btn btn-outline-custom-primary col-4 col-md-3"
                type="button">Edit</button>
        </form>
        {{-- ---------- part two----------- --}}
        <h6 class="fs-5 mt-3 text-custom-dark">Add Career Info</h6>
        <form method="POST" action="/profile/addProfileCareerRow">
            @csrf
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Type</span>
                <select name="career_type" class="form-control">
                    @foreach ($careerType as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Name (Degree, Reward,
                    Position)</span>
                <input name="career_name" type="text" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Period</span>
                <input name="career_period" type="date" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Organization</span>
                <input name="organization" type="text" required class="form-control">
            </div>
            <button type="submit" class="btn btn-custom-primary text-white col-5 col-md-3">
                AddRow
            </button>
        </form>
        {{-- ------------ previously added--------------- --}}
        <h5 class="fw-bold text-custom-primary mt-4">Previously Added</h5>
        <table id="career-data" class="table table-hover">
            <thead>
                <tr class="text-custom-primary">
                    <th scope="col">Career Info</th>
                    <th scope="col">Name</th>
                    <th scope="col">Period</th>
                    <th scope="col">Organization</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $career = $user->career;
                @endphp
                @foreach ($career as $item)
                    <tr id="{{ $item['id'] }}">
                        <td>{{ $item['type'] }}</td>
                        <td>{{ $item['career_name'] }}</td>
                        <td>{{ $item['period'] }}</td>
                        <td>{{ $item['organization'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- ------------------------------------------ --}}
    </div>
    {{-- ---------------- Notifications Settings --------------------- --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#notifications-form">
        Notifications Settings
    </div>
    <form method="POST" id="notifications-form" action="/profile/updateProfileNotificationSettings"
        class="row mx-0 collapse border rounded-bottom py-2 ps-4">
        @csrf
        @php
            $flags = [];
            $flags[0] = $notificationSettings['followers'];
            $flags[1] = $notificationSettings['message_request'];
            $flags[2] = $notificationSettings['blog_invitations'];
            $flags[3] = $notificationSettings['emails'];
            $flags[4] = $notificationSettings['sms'];
            $i = 0;
        @endphp
        @foreach ($notifications as $key => $value)
            <div class="form-check mb-2">
                <input @if ($flags[$i] == 1) checked @endif id="{{ $key }}" disabled
                    class="form-check-input p-2" type="checkbox" name="notifications[]"
                    value="{{ $key }}">
                <label for="{{ $key }}" class="form-check-label text-custom-dark fs-5">{{ $value }}
                </label>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
        <button disabled class="btn btn-custom-primary text-white col-4 col-md-3" type="submit">Save Changes</button>
        <button id="edit-notifications-btn" class="btn btn-outline-custom-primary col-4 col-md-3 ms-2"
            type="button">Edit</button>
        {{--  --}}
    </form>

    {{-- -----------------contact me ------------------------ --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#contactme-form">
        Contact me
    </div>
    <form id="contactme-form" method="POST" action="{{ route('contactme-form') }}"
        class="p-4 collapse border rounded-bottom">
        @csrf
        <div class="input-group mb-4">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">
                <i class="fa-solid fa-phone me-1"></i>Phone N°</span>
            <input required disabled name="contact_phone" type="number" class="form-control"
                value="{{ $contact->phone }}">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold"><i
                    class="fa-solid fa-envelope me-1"></i>Email</span>
            <input required disabled name="contact_email" type="email" class="form-control"
                value="{{ $contact->email }}">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text text-custom-primary fw-bold text-custom-dark">
                <i class="fa-solid fa-hospital me-1"></i>Availability</span>
            <span class="input-group-text">From</span>
            <select required disabled name="from_day">
                @foreach ($days as $key => $value)
                    <option @if ($key == $contact->from_day) selected @endif value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </select>
            <input value="{{ $contact->from_time }}" required disabled name="from_time" type="time"
                class="form-control">
            <span class="input-group-text">To</span>
            <select required disabled name="to_day">
                @foreach ($days as $key => $value)
                    <option @if ($key == $contact->to_day) selected @endif value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            </select>
            <input value="{{ $contact->to_time }}" required disabled name="to_time" type="time"
                class="form-control">
        </div>
        <button disabled type="submit" class="btn btn-custom-primary text-white col-5 col-md-3">Save</button>
        <button id="edit-contactme-btn" class="btn btn-outline-custom-primary col-4 col-md-3"
            type="button">Edit</button>
        {{--  --}}
    </form>

    {{-- ------------------- Account Settings------------------------ --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#acc-settings">
        Account Settings
    </div>
    <div class="collapse border rounded-bottom" id="acc-settings">
        {{-- update email form --}}
        <h6 class="fs-5 mt-3 text-custom-dark">Email Update</h6>
        <form method="POST" action="{{ route('updateEmail-form') }}">
            @csrf
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Current Email</span>
                <input disabled type="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">New Email</span>
                <input name="new_email" type="email" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Password</span>
                <input name="password" type="password" required class="form-control">
            </div>
            <button type="submit" class="btn btn-custom-primary text-white col-5 col-md-3">Update Email</button>
        </form>
        {{-- update mobile phone form --}}
        <h6 class="fs-5 mt-3 text-custom-dark">Phone Update</h6>
        <form method="POST" action="{{ route('updatePhone-form') }}">
            @csrf
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Current Phone N°</span>
                <input disabled type="number" class="form-control" value="{{ $user->phone }}">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">New Phone</span>
                <input name="new_phone" type="number" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Password</span>
                <input name="password" type="password" required class="form-control">
            </div>
            <button type="submit" class="btn btn-custom-primary text-white col-5 col-md-3">Update Phone</button>
        </form>
        {{-- update password form --}}
        <h6 class="fs-5 mt-3 text-custom-dark">Password Update</h6>
        <form method="POST" action="{{ route('updatePassword-form') }}">
            @csrf
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Current Password</span>
                <input name="current_password" type="password" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">New Password</span>
                <input name="new_password" type="password" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Confirm New
                    Password</span>
                <input name="new_password_confirm" type="password" required class="form-control">
            </div>
            <button type="submit" class="btn btn-custom-primary text-white col-5 col-md-3">Update Password</button>
        </form>
    </div>
</div>
@section('script')
    <script defer src="{{ asset('assets/js/user/profile.js') }}"></script>
@endsection
