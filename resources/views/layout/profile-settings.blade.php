<div class="row">
    {{-- ------------- personal information ------------------------ --}}
    <div class="bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#p-info">
        Personal Information
    </div>
    <div class="row mx-0 p-4 justify-content-between align-items-center collapse border rounded-bottom" id="p-info">
        <div class="col-lg-3">
            <img id="user_img" class="rounded-circle"
                src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg" alt="user name"
                width="100px" height="100px">
        </div>
        <div class="col-lg-4">
            <span class="fs-5">Upload A Photo</span>
            <p>For Best Results Choose Jpeg Or Png File Format.
                The Photo Must Be Real And Personal</p>
        </div>
        <div class="col-lg-3">
            <input hidden id="photo_input" type="file" name="user_photo">
            <button id="upload-img-btn"
                class="d-block-lg btn btn-custom-primary text-white rounded-pill mb-lg-3 me-3">Upload</button>
            <button class="d-block-lg btn btn-outline-custom-primary rounded-pill">Remove</button>
        </div>
    </div>
    {{-- -----------------career information ------------------------ --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#c-info">
        Career Information
    </div>
    <div class="collapse border rounded-bottom" id="c-info">
        <h5>Career Information</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem fuga, perspiciatis mollitia sunt iure
            corrupti praesentium nemo iste veniam sed officia iusto dignissimos error voluptatem sapiente saepe aperiam
            maxime quia!</p>
    </div>
    {{-- ---------------- Notifications Settings --------------------- --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#n-settings">
        Notifications Settings
    </div>
    <div class="collapse border rounded-bottom" id="n-settings">
        <h5>Notifications Settings</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem fuga, perspiciatis mollitia sunt iure
            corrupti praesentium nemo iste veniam sed officia iusto dignissimos error voluptatem sapiente saepe aperiam
            maxime quia!</p>
    </div>
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
