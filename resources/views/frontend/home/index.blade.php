@extends('frontend.layout.app')

@section('content')
 <!-- HERO SECTION START -->
    @include('frontend.content.hero')
 <!-- HERO SECTION END -->

 <!-- SERVICES SECTION START -->
 @include('frontend.content.services')
 <!-- SERVICES SECTION END -->

 <!-- start: Service Popup -->
 @include('frontend.content.servicesPopup')
 <!-- end: Service Popup -->

 <!-- PORTFOLIO SECTION START -->
 @include('frontend.content.portfolio')
 <!-- PORTFOLIO SECTION END -->

 <!-- start: Portfolio Popup -->
@include('frontend.content.portfolioPopup')
 <!-- end: Portfolio Popup -->

 <!-- RESUME SECTION START -->
@include('frontend.content.resume')
 <!-- RESUME SECTION END -->

 <!-- SKILLS SECTION START -->
@include('frontend.content.skills')
 <!-- SKILLS SECTION END -->

 <!-- TESTIMONIAL SECTION START -->
@include('frontend.content.testimonial')
 <!-- TESTIMONIAL SECTION END -->

 <!-- BLOG SECTION STAR -->
@include('frontend.content.blog')
 <!-- BLOG SECTION END -->

 <!-- CONTACT SECTION START -->
@include('frontend.content.contact')
 <!-- CONTACT SECTION END -->

 <!-- BEGIN: Contact Form Success Modal Message -->
@include('frontend.content.contactFormSuccessModal')
 <!-- END: Contact Form Success Modal Message -->

 <!-- BEGIN: Contact Form Fail Modal Message -->
@include('frontend.content.contactFormFailModal')
 <!-- END: Contact Form Fail Modal Message End -->
@endsection
