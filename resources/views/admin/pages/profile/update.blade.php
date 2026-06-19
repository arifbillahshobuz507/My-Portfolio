@extends('admin.layout.master')
@section('title')
    Profile Update
@endsection
@section('content')
@include('components.admin.updateProfileView')
@endsection
@push('scripts')
 <script src="{{ asset('admin/assets/') }}/js/profile-update.js"></script>
@endpush