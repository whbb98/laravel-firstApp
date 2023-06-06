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
    <div class="p-4 collapse border rounded-bottom" id="c-info">
        {{-- current occupation info --}}
        <form action="">
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">
                    <i class="fa-solid fa-briefcase me-1"></i>Current Occupation</span>
                <input name="occupation" type="text" class="form-control" value="my position">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold"><i
                        class="fa-solid fa-location-dot me-1"></i>City</span>
                <select name="city" class="form-control">
                    <option value="16">Algiers</option>
                    <option value="31">Oran</option>
                    <option value="25">Constantine</option>
                    <option value="1">Adrar</option>
                    <option value="2">Chlef</option>
                    <option value="3">Laghouat</option>
                    <option value="4">Oum El Bouaghi</option>
                    <option value="5">Batna</option>
                    <option value="6">Bejaia</option>
                    <option value="7">Biskra</option>
                    <option value="8">Blida</option>
                    <option value="9">Bouira</option>
                    <option value="10">Tizi Ouzou</option>
                    <option value="11">Djelfa</option>
                    <option value="12">El Bayadh</option>
                    <option value="13">El Oued</option>
                    <option value="14">Ghardaia</option>
                    <option value="15">M'Sila</option>
                    <option value="17">Mascara</option>
                    <option value="18">Médéa</option>
                    <option value="19">M'Sila</option>
                    <option value="20">Naama</option>
                    <option value="21">Ouargla</option>
                    <option value="22">Saida</option>
                    <option value="23">Sétif</option>
                    <option value="24">Skikda</option>
                    <option value="26">Tamanrasset</option>
                    <option value="27">Tlemcen</option>
                    <option value="28">Tiaret</option>
                    <option value="29">Tizi Ouzou</option>
                    <option value="30">El Tarf</option>
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text text-custom-primary fw-bold text-custom-dark">
                    <i class="fa-solid fa-hospital me-1"></i>Hospital</span>
                <input name="hospital" type="text" class="form-control" value="my hospital">
            </div>
            <button class="btn btn-custom-primary text-white col-5 col-md-3" type="submit">Save Changes</button>
        </form>
        {{-- ---------- part two----------- --}}
        <h6 class="fs-5 mt-3 text-custom-dark">Add Career Info</h6>
        <form action="">
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Type</span>
                <select name="career_type" class="form-control">
                    <option value="education">Education</option>
                    <option value="reward">Reward</option>
                    <option value="experience">Experience</option>
                </select>
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Name (Degree, Reward,
                    Position)</span>
                <input name="career_name" type="text" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Period</span>
                <input name="period" type="month" required class="form-control">
            </div>
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Organization</span>
                <input name="organization" type="text" required class="form-control">
            </div>
            <button type="submit" class="btn btn-custom-primary text-white col-5 col-md-3">Add Row</button>
        </form>
        {{-- ------------ previously added--------------- --}}
        <h5 class="fw-bold text-custom-primary mt-4">Previously Added</h5>
        <table class="table education table-hover">
            <thead>
                <tr class="text-custom-primary">
                    <th scope="col">Career Info</th>
                    <th scope="col">Name</th>
                    <th scope="col">Period</th>
                    <th scope="col">Organization</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Education</td>
                    <td>Master of Medecine</td>
                    <td>June 2020</td>
                    <td>CHU Hospital Oran</td>
                </tr>
            </tbody>
        </table>
        {{-- ------------------------------------------ --}}
    </div>
    {{-- ---------------- Notifications Settings --------------------- --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#n-settings">
        Notifications Settings
    </div>
    <form action="" class="row mx-0 collapse border rounded-bottom py-2 ps-4" id="n-settings">
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
        {{--  --}}
    </form>

    {{-- -----------------contact me ------------------------ --}}
    <div class="mt-2 bg-custom-secondary text-custom-primary fs-5 fw-bold p-2 text-left rounded-top ptr-cursor"
        data-bs-toggle="collapse" data-bs-target="#contactme">
        Contact me
    </div>
    <form action="" class="p-4 collapse border rounded-bottom" id="contactme">
        <div class="input-group mb-4">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">
                <i class="fa-solid fa-phone me-1"></i>Phone N°</span>
            <input name="contact_phone" type="number" class="form-control">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold"><i
                    class="fa-solid fa-envelope me-1"></i>Email</span>
            <input name="contact_email" type="email" class="form-control">
        </div>
        <div class="input-group mb-4">
            <span class="input-group-text text-custom-primary fw-bold text-custom-dark">
                <i class="fa-solid fa-hospital me-1"></i>Availability</span>
            <span class="input-group-text">From</span>
            <select name="from_day">
                <option value="1">Sun</option>
                <option value="2">Mon</option>
                <option value="3">Tue</option>
                <option value="4">Wed</option>
                <option value="5">Thu</option>
                <option value="6">Fri</option>
                <option value="7">Sat</option>
            </select>
            <input name="from_time" type="time" class="form-control">
            <span class="input-group-text">To</span>
            <select name="to_day" id="">
                <option value="1">Sun</option>
                <option value="2">Mon</option>
                <option value="3">Tue</option>
                <option value="4">Wed</option>
                <option value="5">Thu</option>
                <option value="6">Fri</option>
                <option value="7">Sat</option>
            </select>
            <input name="to_time" type="time" class="form-control">
        </div>
        <button type="submit" class="btn btn-custom-primary text-white col-5 col-md-3">Save</button>
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
        <form action="">
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Current Email</span>
                <input disabled type="email" class="form-control" value="example@gmail.com">
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
        <form action="">
            <div class="input-group mb-4">
                <span class="input-group-text bg-custom-secondary text-custom-primary fw-bold">Current Phone N°</span>
                <input disabled type="number" class="form-control" value="05661501371">
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
        <form action="">
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
