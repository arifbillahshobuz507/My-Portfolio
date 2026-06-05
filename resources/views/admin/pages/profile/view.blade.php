@extends('admin.layout.master')
@section('title')
    Profile
@endsection
@section('content')
@include('components.admin.profileView')
@endsection
@push('scripts')
 <script src="{{ asset('admin/') }}/js/profile.js"></script>
@endpush