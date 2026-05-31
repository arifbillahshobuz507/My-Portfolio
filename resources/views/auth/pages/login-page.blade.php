@extends('auth.layout.master')
@section('content')
    @include('components.auth.login-form')
@endsection
@push('scripts')
 <script src="{{ asset('auth/') }}/js/login.js"></script>
@endpush

