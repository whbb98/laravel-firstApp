<h5 class="text-custom-primary">Bio</h5>
<p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem nostrum nam maxime ullam magni nobis
    veniam, vitae quo harum magnam voluptatum laborum sunt, laudantium nesciunt qui, sequi non iste velit.</p>
<div class="d-flex justify-content-between">
    <div class="">
        <i class="fa-solid fa-location-dot text-custom-primary fa-xl"></i>
        <span class="fs-6 text-capitalize">city</span>
    </div>
    <div class="">
        <i class="fa-solid fa-cake-candles text-custom-primary fa-xl"></i>
        <span class="fs-6 text-capitalize">1998-11-15</span>
    </div>
    <div class="">
        <i class="fa-solid fa-calendar text-custom-primary fa-xl"></i>
        <span class="fs-6 text-capitalize">joined on yyyy-mm-dd</span>
    </div>
</div>

<div class="mt-4">
    <span class="fw-bold">15</span>
    <span class="fs-6 text-capitalize me-4">following</span>
    <span class="fw-bold">20</span>
    <span class="fs-6 text-capitalize">followers</span>
</div>

<h5 class="text-custom-primary mt-4">My Team</h5>

<div class="row justify-content-left mb-5">
    @for ($i = 0; $i < 6; $i++)
        <div class="text-custom-dark p-2 col-5 col-lg-3">
            <a href="/view-profile/11">
                <img src="https://pbs.twimg.com/profile_images/1611475898255003659/ZIWZ4ys9_400x400.jpg" alt="user name"
                    width="150px" class="rounded">
            </a>
            <div>
                <span class="d-block fs-5 fw-bold text-capitalize">dr.john doe</span>
                <span class="d-block fs-6 fw-bold text-capitalize">radiologist</span>
            </div>
            <div>
                <div class="my-2">
                    <i class="fa-solid fa-location-dot text-custom-primary fa-lg"></i>
                    <span class="fs-6">Oran, Algeria</span>
                </div>
                <div class="">
                    <i class="fa-solid fa-hospital text-custom-primary fa-lg"></i>
                    <span class="fs-6">CHU</span>
                </div>
            </div>
        </div>
    @endfor

</div>
