@extends('admin.layout.master')
@section('title')
    Hero List
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1">Hero Management</h4>
            <p class="mb-0 text-body-secondary">You can have only one hero section</p>
        </div>
        <a href="{{ route('admin.hero.create') }}" class="btn btn-primary" id="heroListActionBtn">Create Hero</a>
    </div>

    <div id="heroListContent">
        <div class="card">
            <div class="card-body text-center py-12">
                <i class="icon-base ti tabler-loader icon-64px text-body-secondary mb-4 d-inline-block"></i>
                <h5 class="mb-1">Loading hero...</h5>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
 <script src="{{ asset('admin/assets/') }}/js/heroList.js"></script>
@endpush
