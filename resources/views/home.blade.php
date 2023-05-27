<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- including custom-bootstrap + fontawsome + jquery --}}
    <link rel="stylesheet" href="assets/css/custom-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <script defer src="assets/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/jquery-3.7.0.min.js"></script>
    {{-- -------------------------------------------------- --}}
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="icon" type="image/x-icon" href="logo.svg">
    <title>Doctor AI Collab</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-custom-primary" href="/">
                <img src="logo.svg" alt="Logo" width="50" height="50"
                    class="d-inline-block align-text-center">
                <strong>Doctor AI Collab</strong>
            </a>
            {{-- links --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-menu"
                aria-controls="nav-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav-menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-bold border-2 border-bottom border-custom-primary text-custom-primary"
                            aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#our-team">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#footer">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#footer">About</a>
                    </li>
                </ul>
                <a href="/login" class="btn btn-outline-custom-primary text-custom-primary rounded-pill">Login</a>
                <a href="/signup" class="btn btn-custom-primary text-white rounded-pill ms-1">SignUp</a>
            </div>
            {{-- end links --}}
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <h1 class="text-custom-primary">Join the Future of Medical Diagnosis</h1>
                <p class="text-custom-dark lead">Unlock the Full Potential of Your Medical Expertise with our Innovative
                    Platform Designed to Support Novice Doctors in Accurate Diagnosis, Backed by Collaborative Work and
                    Deep Learning</p>
            </div>
            <div class="col-md-12 col-lg-6">
                <img class="img-fluid rounded" src="assets/img/doctor-diagnosis.jpg" alt="">
            </div>
        </div>
    </div>
    {{-- start partners --}}
    <div class="partners container mt-5 text-center">
        <div class="row justify-content-between">
            <h2 class="text-custom-primary mb-5 text-uppercase fw-bold">partners</h2>
            <img class="col-5 col-md-2" src="assets\img\partners\1.png" alt="alt-1">
            <img class="col-5 col-md-2" src="assets\img\partners\2.png" alt="alt-2">
            <img class="col-5 col-md-2" src="assets\img\partners\3.png" alt="alt-3">
            <img class="col-5 col-md-2" src="assets\img\partners\4.png" alt="alt-4">
        </div>
    </div>
    {{-- end partners --}}

    {{-- start features --}}
    <div id="features" class="features container mt-5 text-center">
        <h2 class="text-custom-primary text-uppercase fw-bold">features</h2>
        <div class="row justify-content-center">
            <div class="feat mx-sm-auto mx-lg-1 col-8 bg-custom-secondary col-md-5 col-lg-3 mt-4 p-4 rounded-4">
                <div class="icon">
                    <img class="w-50" src="assets/icons/time-saving.svg" alt="">
                </div>
                <h4 class="text-uppercase text-custom-dark my-4">time saving</h4>
                <p class="text-custom-dark lead">Save Your Time With The Available Tools Which Aids You In Your
                    Diagnosis</p>
            </div>
            <div class="feat mx-sm-auto mx-lg-1 col-8 bg-custom-secondary col-md-5 col-lg-3 mt-4 p-4 rounded-4">
                <div class="icon">
                    <img class="w-50" src="assets/icons/collaboration.svg" alt="">
                </div>
                <h4 class="text-uppercase text-custom-dark my-4">collaboration</h4>
                <p class="text-custom-dark lead">Collaborate Your Work With Others And Exchange Insights About Your
                    Diagnosis</p>
            </div>
            <div class="feat mx-sm-auto mx-lg-1 col-8 bg-custom-secondary col-md-5 col-lg-3 mt-4 p-4 rounded-4">
                <div class="icon">
                    <img class="w-50" src="assets/icons/x-ray.svg" alt="">
                </div>
                <h4 class="text-uppercase text-custom-dark my-4">X-Ray</h4>
                <p class="text-custom-dark lead">Access X-Ray Data Of Your Patients Directly From Your Dashboard And
                    Start Diagnosing</p>
            </div>
            {{-- </div>
            <div class="row justify-content-between"> --}}
            <div class="feat mx-sm-auto mx-lg-1 col-8 bg-custom-secondary col-md-5 col-lg-3 mt-4 p-4 rounded-4">
                <div class="icon">
                    <img class="w-50" src="assets/icons/meeting.svg" alt="">
                </div>
                <h4 class="text-uppercase text-custom-dark my-4">meet doctors</h4>
                <p class="text-custom-dark lead">Schedule Meets With Other Doctors From Your Laptop</p>
            </div>
            <div class="feat mx-sm-auto mx-lg-1 col-8 bg-custom-secondary col-md-5 col-lg-3 mt-4 p-4 rounded-4">
                <div class="icon">
                    <img class="w-50" src="assets/icons/breast.svg" alt="">
                </div>
                <h4 class="text-uppercase text-custom-dark my-4">annotate images</h4>
                <p class="text-custom-dark lead">Keep Notes On Images By Annotating Your Observations For Later Use</p>
            </div>
            <div class="feat mx-sm-auto mx-lg-1 col-8 bg-custom-secondary col-md-5 col-lg-3 mt-4 p-4 rounded-4">
                <div class="icon">
                    <img class="w-50" src="assets/icons/report.svg" alt="">
                </div>
                <h4 class="text-uppercase text-custom-dark my-4">medical report</h4>
                <p class="text-custom-dark lead">Collect Doctors Opinion Then Write Your Final Accurate Medical
                    Diagnosis</p>
            </div>
        </div>
    </div>
    </div>
    {{-- end features --}}

    {{-- start goals --}}
    <div class="goals container mt-5 p-5 rounded-4">
        <div class="goal opacity-50 bg-white p-3 rounded-4 my-4 row col-md-7">
            <span class="col-3"><i class="fa-solid fa-hand-holding-medical fa-3x text-custom-primary"></i></span>
            <div class="content col-8">
                <h5 class="text-custom-primary">Lorem, ipsum dolor.</h5>
                <p class="text-custom-dark lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil,
                    voluptates.</p>
            </div>
        </div>
        <div class="goal opacity-50 bg-white my-4 row p-3 rounded-4 col-md-7">
            <span class="col-3"><i class="fa-solid fa-eye fa-3x text-custom-primary"></i></span>
            <div class="content col-8">
                <h5 class="text-custom-primary">Lorem, ipsum dolor.</h5>
                <p class="text-custom-dark lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil,
                    voluptates.</p>
            </div>
        </div>
        <div class="goal opacity-50 bg-white my-4 row p-3 rounded-4 col-md-7">
            <span class="col-3"><i class="fa-sharp fa-solid fa-hospital fa-3x text-custom-primary"></i></i></span>
            <div class="content col-8">
                <h5 class="text-custom-primary">Lorem, ipsum dolor.</h5>
                <p class="text-custom-dark lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil,
                    voluptates.</p>
            </div>
        </div>
    </div>
    {{-- end goals --}}

    {{-- start our team --}}
    <div id="our-team" class="our-team container mt-5">
        <h2 class="text-center text-custom-primary text-uppercase fw-bold">our team</h2>
        <div class="row justify-content-center">
            {{-- start doctor card --}}
            <div class="card text-left col-8 col-md-5 col-lg-3 mx-1 my-4">
                <img src="mock/doctors/doc-01.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">Dr. john doe</h5>
                    <h6 class="text-capitalize">radiologist</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item row">
                        <i class="fa-solid fa-location-dot col-2"></i>
                        <span>Oran, Algeria</span>
                    </li>
                    <li class="list-group-item row">
                        <i class="fa-solid fa-hospital col-2"></i>
                        <span>CHU Plateu</span>
                    </li>
                </ul>

            </div>
            {{-- end doctor card --}}
            {{-- start doctor card --}}
            <div class="card text-left col-8 col-md-5 col-lg-3 mx-1 my-4">
                <img src="mock/doctors/doc-02.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">Dr. john doe</h5>
                    <h6 class="text-capitalize">radiologist</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item row">
                        <i class="fa-solid fa-location-dot col-2"></i>
                        <span>Oran, Algeria</span>
                    </li>
                    <li class="list-group-item row">
                        <i class="fa-solid fa-hospital col-2"></i>
                        <span>CHU Plateu</span>
                    </li>
                </ul>

            </div>
            {{-- end doctor card --}}
            {{-- start doctor card --}}
            <div class="card text-left col-8 col-md-5 col-lg-3 mx-1 my-4">
                <img src="mock/doctors/doc-03.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">Dr. john doe</h5>
                    <h6 class="text-capitalize">radiologist</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item row">
                        <i class="fa-solid fa-location-dot col-2"></i>
                        <span>Oran, Algeria</span>
                    </li>
                    <li class="list-group-item row">
                        <i class="fa-solid fa-hospital col-2"></i>
                        <span>CHU Plateu</span>
                    </li>
                </ul>

            </div>
            {{-- end doctor card --}}
            {{-- start doctor card --}}
            <div class="card text-left col-8 col-md-5 col-lg-3 mx-1 my-4">
                <img src="mock/doctors/doc-04.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">Dr. john doe</h5>
                    <h6 class="text-capitalize">radiologist</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item row">
                        <i class="fa-solid fa-location-dot col-2"></i>
                        <span>Oran, Algeria</span>
                    </li>
                    <li class="list-group-item row">
                        <i class="fa-solid fa-hospital col-2"></i>
                        <span>CHU Plateu</span>
                    </li>
                </ul>

            </div>
            {{-- end doctor card --}}
            {{-- start doctor card --}}
            <div class="card text-left col-8 col-md-5 col-lg-3 mx-1 my-4">
                <img src="mock/doctors/doc-05.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">Dr. john doe</h5>
                    <h6 class="text-capitalize">radiologist</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item row">
                        <i class="fa-solid fa-location-dot col-2"></i>
                        <span>Oran, Algeria</span>
                    </li>
                    <li class="list-group-item row">
                        <i class="fa-solid fa-hospital col-2"></i>
                        <span>CHU Plateu</span>
                    </li>
                </ul>

            </div>
            {{-- end doctor card --}}
            {{-- start doctor card --}}
            <div class="card text-left col-8 col-md-5 col-lg-3 mx-1 my-4">
                <img src="mock/doctors/doc-06.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">Dr. john doe</h5>
                    <h6 class="text-capitalize">radiologist</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item row">
                        <i class="fa-solid fa-location-dot col-2"></i>
                        <span>Oran, Algeria</span>
                    </li>
                    <li class="list-group-item row">
                        <i class="fa-solid fa-hospital col-2"></i>
                        <span>CHU Plateu</span>
                    </li>
                </ul>
            </div>
            {{-- end doctor card --}}
        </div>
    </div>
    {{-- end our team --}}

    @include('layout.footer')

</body>

</html>
