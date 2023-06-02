<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- including custom-bootstrap + fontawsome + jquery --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    {{-- ----------including annotorious lib------------------ --}}
    <link rel="stylesheet" href="{{ asset('assets/css/annotorious.min.css') }}">
    <script defer src="{{ asset('assets/js/annotorious.min.js') }}"></script>
    {{-- ----------------------------------------------------- --}}
    <script defer src="{{ asset('assets/js/blog.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="/assets/favicons/blog-icon.svg">
    <title>Blog View</title>
</head>

<body>

    <h1>blog id = {{ $id }} </h1>


</body>

</html>
