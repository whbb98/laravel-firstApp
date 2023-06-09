@php
    $contact = $user->contact;
@endphp

<div>
    <div class="mb-5">
        <span class="text-custom-primary">
            <i class="fa-solid fa-phone"></i>
            <b>Phone</b>
        </span>
        <span class="ms-5 text-custom-dark">{{ $contact->phone }}</span>
    </div>
    <div class="mb-5">
        <span class="text-custom-primary">
            <i class="fa-solid fa-envelope"></i>
            <b>Email</b>
        </span>
        <a class="ms-5 text-custom-dark" href="mailto:{{ $contact->email }}">
            {{ $contact->email }}
        </a>
    </div>
    <div class="d-flex align-items-center">
        <div class="text-custom-primary">
            <i class="fa-regular fa-calendar-days"></i>
            <b>Availability</b>
        </div>
        <div class="ms-5 text-custom-dark">
            <span>
                <b>From</b>
                <span class="mx-5">{{ $days[$contact->from_day] }}</span>
                {{ $contact->from_time }}
            </span>
            <br>
            <span><b>To</b> <span class="mx-5">{{ $days[$contact->to_day] }}</span>
             {{ $contact->to_time }}
            </span>
        </div>
    </div>
</div>
