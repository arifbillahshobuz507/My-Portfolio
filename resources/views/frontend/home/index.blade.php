@extends('frontend.layout.app')

@section('content')
 <!-- HERO SECTION START -->
    @include('frontend.pages.hero')
 <!-- HERO SECTION END -->

 <!-- SERVICES SECTION START -->
 @include('frontend.pages.services')
 <!-- SERVICES SECTION END -->

 <!-- start: Service Popup -->
 @include('frontend.pages.servicesPopup')
 <!-- end: Service Popup -->

 <!-- PORTFOLIO SECTION START -->
 @include('frontend.pages.portfolio')
 <!-- PORTFOLIO SECTION END -->

 <!-- start: Portfolio Popup -->
@include('frontend.pages.portfolioPopup')
 <!-- end: Portfolio Popup -->

 <!-- RESUME SECTION START -->
@include('frontend.pages.resume')
 <!-- RESUME SECTION END -->

 <!-- SKILLS SECTION START -->
@include('frontend.pages.skills')
 <!-- SKILLS SECTION END -->

 <!-- TESTIMONIAL SECTION START -->
@include('frontend.pages.testimonial')
 <!-- TESTIMONIAL SECTION END -->

 <!-- BLOG SECTION STAR -->
@include('frontend.pages.blog')
 <!-- BLOG SECTION END -->

 <!-- CONTACT SECTION START -->
@include('frontend.pages.contact')
 <!-- CONTACT SECTION END -->

 <!-- BEGIN: Contact Form Success Modal Message -->
@include('frontend.pages.contactFormSuccessModal')
 <!-- END: Contact Form Success Modal Message -->

 <!-- BEGIN: Contact Form Fail Modal Message -->
@include('frontend.pages.contactFormFailModal')
 <!-- END: Contact Form Fail Modal Message End -->
@endsection
