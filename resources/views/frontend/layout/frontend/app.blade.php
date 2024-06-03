<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />

    <!-- Site Title -->
    <title>Gerold - Personal Portfolio HTML5 Template</title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="./assets/img/favicon.png" />
    <link rel="shortcut icon" type="image/png" href="./assets/img/favicon.png" />
    <!-- All CSS Files -->
    @include('frontend.layout.frontend.style')
</head>

<body>
    <!-- Preloader Area Start -->
    <div class="preloader">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="preloaderSvg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="preloader-heading">
            <div class="load-text">
                <span>L</span>
                <span>o</span>
                <span>a</span>
                <span>d</span>
                <span>i</span>
                <span>n</span>
                <span>g</span>
            </div>
        </div>
    </div>
    <!-- Preloader Area End -->

    <!-- start: Back To Top -->
    <div class="progress-wrap" id="scrollUp">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- end: Back To Top -->

    <!-- HEADER START -->
    @include('frontend.layout.frontend.header')
    <!-- HEADER END -->

    <main class="site-content" id="content">
       @yield('content')
    </main>

    <!-- FOOTER AREA START -->
  @include('frontend.layout.frontend.footer')
    <!-- FOOTER AREA END -->

    <!-- Javascript all file here -->
    @include('frontend.layout.frontend.script')
</body>

</html>
