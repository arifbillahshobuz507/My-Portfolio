<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>X-Bakery</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/auth//favicon.ico') }}" />
    @include('auth.partials.style')
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
  @include('auth.partials.script')
</body>
</html>
