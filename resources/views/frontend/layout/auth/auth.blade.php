<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>X-Bakery</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/auth//favicon.ico') }}" />
    <link href="{{ asset('assets/auth/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/css/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/auth/js/toastify-js.js') }}"></script>
    <script src="{{ asset('assets/auth/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/config.js') }}"></script>

</head>

<body>

    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div>
        @yield('content')
    </div>
    <script></script>


</body>

</html>
