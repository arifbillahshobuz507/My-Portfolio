@extends('auth.layout.master')
@section('content')
    @include('components.auth.registration-form')
@endsection
@push('scripts')
 <script src="{{ asset('auth/') }}/js/ragister.js"></script>
@endpush
