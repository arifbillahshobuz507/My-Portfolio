@extends('auth.layout.master')
@section('content')
    @include('components.auth.reset-pass-form')
@endsection
@push('scripts')
 <script src="{{ asset('auth/') }}/js/set-new-password.js"></script>
@endpush

