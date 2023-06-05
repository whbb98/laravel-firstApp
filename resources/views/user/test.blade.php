@php
    echo session("email");
    echo '<pre>';
    print_r(session()->all());
@endphp
