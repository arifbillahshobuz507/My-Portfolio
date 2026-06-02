@extends('auth.layout.master')
@section('content')
    @include('components.auth.verify-otp-form')
@endsection
@push('scripts')
 <script src="{{ asset('auth/') }}/js/verify-otp.js"></script>
@endpush
