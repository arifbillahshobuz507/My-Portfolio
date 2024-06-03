@extends('frontend.layout.frontend.app')

@section('content')
 <!-- HERO SECTION START -->
    @include('frontend.pages.frontend.hero')
 <!-- HERO SECTION END -->

 <!-- SERVICES SECTION START -->
 @include('frontend.pages.frontend.services')
 <!-- SERVICES SECTION END -->

 <!-- start: Service Popup -->
 @include('frontend.pages.frontend.servicesPopup')
 <!-- end: Service Popup -->

 <!-- PORTFOLIO SECTION START -->
 @include('frontend.pages.frontend.portfolio')
 <!-- PORTFOLIO SECTION END -->

 <!-- start: Portfolio Popup -->
@include('frontend.pages.frontend.portfolioPopup')
 <!-- end: Portfolio Popup -->

 <!-- RESUME SECTION START -->
@include('frontend.pages.frontend.resume')
 <!-- RESUME SECTION END -->

 <!-- SKILLS SECTION START -->
@include('frontend.pages.frontend.skills')
 <!-- SKILLS SECTION END -->

 <!-- TESTIMONIAL SECTION START -->
@include('frontend.pages.frontend.testimonial')
 <!-- TESTIMONIAL SECTION END -->

 <!-- BLOG SECTION STAR -->
@include('frontend.pages.frontend.blog')
 <!-- BLOG SECTION END -->

 <!-- CONTACT SECTION START -->
@include('frontend.pages.frontend.contact')
 <!-- CONTACT SECTION END -->

 <!-- BEGIN: Contact Form Success Modal Message -->
@include('frontend.pages.frontend.contactFormSuccessModal')
 <!-- END: Contact Form Success Modal Message -->

 <!-- BEGIN: Contact Form Fail Modal Message -->
@include('frontend.pages.frontend.contactFormFailModal')
 <!-- END: Contact Form Fail Modal Message End -->
@endsection
