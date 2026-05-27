<!doctype html>
<html
  lang="en"
  class=" layout-navbar-fixed layout-menu-fixed layout-compact "
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
    <title>Arif Billah portfolio</title>
    <meta name="description" content="" />
    @include('admin.partials.style')
  </head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">
        <!-- Menu -->

        @include('admin.partials.sidebar')

        <div class="menu-mobile-toggler d-xl-none rounded-1">
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
            <i class="ti tabler-menu icon-base"></i>
            <i class="ti tabler-chevron-right icon-base"></i>
          </a>
        </div>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
         @include('admin.partials.header')
          <!-- / Navbar -->

          <!-- Content wrapper -->
         @yield('content')
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js  -->
   @include('admin.partials.script')
  </body>
</html>