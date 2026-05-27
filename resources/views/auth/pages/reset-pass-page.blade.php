@extends('auth.layout.master')
@section('content')
    @include('components.auth.reset-pass-form')
@endsection
@push('scripts')
 <script src="{{ asset('admin/assets/') }}/js/pages-auth.js"></script>
@endpush

