<div>
    <div class="mb-5">
        <span class="text-custom-primary">
            <i class="fa-solid fa-phone"></i>
            <b>Phone</b>
        </span>
        <span class="ms-5 text-custom-dark">{{session('phone')}}</span>
    </div>
    <div class="mb-5">
        <span class="text-custom-primary">
            <i class="fa-solid fa-envelope"></i>
            <b>Email</b>
        </span>
        <a class="ms-5 text-custom-dark" href="mailto:{{ session('email') }}">
            {{ session('email') }}
        </a>
    </div>
    <div class="d-flex align-items-center">
        <div class="text-custom-primary">
            <i class="fa-regular fa-calendar-days"></i>
            <b>Availability</b>
        </div>
        <div class="ms-5 text-custom-dark">
            <span><b>From</b> Sunday hh:mm</span><br>
            <span><b>To</b> Thursday hh:mm</span>
        </div>
    </div>
</div>
