@extends('employee.layout')
@section('title', 'Dashboard')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Welcome To ESMS (Employee Self Management System) {{ auth()->user()->fullname }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection