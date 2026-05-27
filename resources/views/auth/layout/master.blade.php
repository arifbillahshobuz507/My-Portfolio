<!doctype html>

<html
  lang="en"
  class=" layout-wide  customizer-hide"
  dir="ltr"
  data-skin="default"
  data-bs-theme="light"
  data-assets-path="{{ asset('admin/assets/') }}/"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>@yield('title')</title>

    <meta name="description" content="" />
    @include('auth.partials.style')
     <!-- Page CSS -->
    @stack('styles')
  </head>

  <body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        @yield('content')
      </div>
    </div>
    <!-- / Content -->

    <!-- Core JS -->
    @include('auth.partials.script')
    <!-- Page JS -->
     @stack('scripts')   
  </body>
</html>
