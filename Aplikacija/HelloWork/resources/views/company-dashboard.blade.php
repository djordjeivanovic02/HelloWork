@extends('parts.main')
@section('company-dashboard')
<link rel="stylesheet" href="{{ asset('css/company-dashboard.css') }}">
<div class="dashboard-main-container w-100 d-flex justify-content-between mt-4">
    <div class="dashboard-left-container position-relative">
        <div class="dashboard-left-main w-100 p-4 position-relative">
            <div class="dashboard-image-container w-100 d-flex align-items-center justify-content-center position-relative">
                <div class="dashboard-image">
                    <div class="w-100 h-100 dashboard-image-main">
                        <img src="{{ asset('images/udemy-logo.png') }}" alt="Company Logo" class="w-100 h-100">
                    </div>
                    <div class="change-image-container d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/camera.svg') }}" alt="Camera Icon">
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex justify-content-center my-4 dashboard-head-container">
                <h3>@UDEMY</h3>
            </div>
            <div class="hide-bottom-shadow"></div>
        </div>
        <div class="navigation-list-container w-100 d-flex flex-column">
            <div class="navigation-item w-100"></div>
        </div>
    </div>
    <div class="dashboard-right-container"></div>
</div>
@endsection