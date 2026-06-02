@extends('auth.layout.master')
@section('content')
    @include('components.auth.send-otp-form')
@endsection
@push('scripts')
 <script src="{{ asset('auth/') }}/js/send-otp.js"></script>
@endpush


