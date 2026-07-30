@extends('admin.layout.master')
@section('title')
    Hero Create
@endsection
@section('content')
@include('components.admin.hero.create')
@endsection
@push('scripts')
 <script src="{{ asset('admin/assets/') }}/js/heroCreate.js"></script>
@endpush