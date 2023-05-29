<div class="row">
    {{-- ------------- personal information ------------------------ --}}
    <div class="bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#p-info">
        Personal Information
    </div>
    <form class="row mx-0 p-4 justify-content-between align-items-center collapse border rounded-bottom" id="p-info">
        <div class="col-lg-3">
            <img id="user_photo" class="rounded-circle" src="https://dummyimage.com/100x100/000/fff" alt="user name"
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
                class="d-block-lg btn btn-custom-primary text-white rounded-pill mb-lg-3 me-3">Upload</button>
            <button id="photo_remove" class="d-block-lg btn btn-outline-custom-primary rounded-pill">Remove</button>
        </div>
        {{-- ------------------------------------------------------ --}}
        <hr class="my-5">
        {{-- ------------------------------------------------------ --}}
        <div class="col-lg-3">
            <img id="user_cover" class="rounded" src="https://dummyimage.com/200x100/000/fff" alt="cover photo"
                width="200px" height="100px">
        </div>
        <div class="col-lg-4">
            <span class="fs-5">Upload a Cover Photo</span>
            <p>For Best Results Choose Jpeg Or Png File Format.</p>
            <input name="user_cover" class="mb-2" id="cover_input" type="file">
        </div>
        <div class="col-lg-3">
            <button id="cover_upload"
                class="d-block-lg btn btn-custom-primary text-white rounded-pill mb-lg-3 me-3">Upload</button>
            <button id="cover_remove" class="d-block-lg btn btn-outline-custom-primary rounded-pill">Remove</button>
        </div>
        {{-- ------------------------------------------------------ --}}
        <hr class="my-5">
        {{-- ------------------------------------------------------ --}}
        <div class="input-group mb-3">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Full Name</span>
            <input name="first_name" type="text" class="form-control" placeholder="First Name">
            <input name="last_name" type="text" class="form-control" placeholder="Last Name">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold"><i
                    class="fa-solid fa-envelope me-1"></i>Email</span>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold"><i
                    class="fa-solid fa-phone me-1"></i>Phone</span>
            <input name="phone" type="number" class="form-control">
        </div>
        <div class="form-floating">
            <textarea name="bio" class="form-control text-custom-dark" id="bio" style="height: 100px"></textarea>
            <label for="bio" class="ms-2">Write you Bio !</label>
        </div>
        <button type="submit" class="mt-4 col-5 col-md-3 btn btn-custom-primary text-white">Save Changes</button>
        {{--  --}}
    </form>
    {{-- -----------------career information ------------------------ --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#c-info">
        Career Information
    </div>
    <div class="collapse border rounded-bottom" id="c-info">
        <div class="input-group mb-4">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">
                <i class="fa-solid fa-briefcase me-1"></i>Current Occupation</span>
            <input name="occupation" type="text" class="form-control" value="my position">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold"><i
                    class="fa-solid fa-location-dot me-1"></i>City</span>
            <input name="city" type="text" class="form-control" value="oran">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text text-custom-primary fw-bold text-custom-dark">
                <i class="fa-solid fa-hospital me-1"></i>Hospital</span>
            <input name="hospital" type="text" class="form-control" value="my hospital">
        </div>
        {{--  --}}
    </div>
    {{-- ---------------- Notifications Settings --------------------- --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#n-settings">
        Notifications Settings
    </div>
    <form class="row mx-0 collapse border rounded-bottom py-2 ps-4" id="n-settings">
        <div class="form-check mb-2">
            <input id="n1" class="form-check-input p-2" type="checkbox" name="notifications[]"
                value="1">
            <label for="n1" class="form-check-label text-custom-dark fs-5">When Someone Started Following
                Me</label>
        </div>
        <div class="form-check mb-2">
            <input id="n2" class="form-check-input p-2" type="checkbox" name="notifications[]"
                value="2">
            <label for="n2" class="form-check-label text-custom-dark fs-5">When Someone Message Me</label>
        </div>
        <div class="form-check mb-2">
            <input id="n3" class="form-check-input p-2" type="checkbox" name="notifications[]"
                value="3">
            <label for="n3" class="form-check-label text-custom-dark fs-5">Notify Me For Blog
                Invitations</label>
        </div>
        <div class="form-check mb-2">
            <input id="n4" class="form-check-input p-2" type="checkbox" name="notifications[]"
                value="4">
            <label for="n4" class="form-check-label text-custom-dark fs-5">When Someone Follows Me</label>
        </div>
        <div class="form-check mb-2">
            <input id="n5" class="form-check-input p-2" type="checkbox" name="notifications[]"
                value="5">
            <label for="n5" class="form-check-label text-custom-dark fs-5">Enable Email Notifications</label>
        </div>
        <div class="form-check mb-2">
            <input id="n6" class="form-check-input p-2" type="checkbox" name="notifications[]"
                value="6">
            <label for="n6" class="form-check-label text-custom-dark fs-5">Enable SMS Notifications</label>
        </div>
        <button class="btn btn-custom-primary text-white col-5 col-md-3" type="submit">Save Changes</button>
    </form>
    {{-- ------------------- Account Settings------------------------ --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#acc-settings">
        Account Settings
    </div>
    <div class="collapse border rounded-bottom" id="acc-settings">
        <h5>Account Settings</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem fuga, perspiciatis mollitia sunt iure
            corrupti praesentium nemo iste veniam sed officia iusto dignissimos error voluptatem sapiente saepe aperiam
            maxime quia!</p>
    </div>
</div>
