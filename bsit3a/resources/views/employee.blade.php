@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Employee List</h2>
        <!-- Added ID for easier targeting -->
        <table class="table dt-responsive nowrap w-100" id="employeeTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody id="employeeTableBody">
                
            </tbody>
        </table>
    </div>
@endsection
