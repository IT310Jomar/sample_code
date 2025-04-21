@extends('layouts.app', ['pageSlug' => 'dashboard'])
@include('modals.addLocationModal')
@include('modals.editLocationModal')
@include('modals.viewLocationModal')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Location List</h2>
        <button type="button" class="btn btn-primary openModal" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal">
            Add Location
          </button>
        <!-- Added ID for easier targeting -->
        <table class="table dt-responsive nowrap w-100" id="employeeTable">
            <thead>
                <tr>
                    <th class="text-left">#</th>
                    <th>Location</th>
                    <th>Country</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="employeeData">
                
            </tbody>
        </table>
    </div>
@endsection
