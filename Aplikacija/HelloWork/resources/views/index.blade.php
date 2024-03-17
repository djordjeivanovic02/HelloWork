@extends('parts.main')
@section('welcome-content')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<div class="welcome-main-container2 d-flex align-items-center justify-content-center">
    <div class="welcome-container h-100 w-100 position-relative">
        <div class="welcome-left-container h-100 d-inline-block">
            <div class="w-100 h-100 d-flex flex-column justify-content-center">
                <h1 class="fw-bold">Imamo <span>1000+</span> oglasa spremhin za Tebe</h1>
                <p>Pronađi posao, zapošljenike i poslovne pri</p>
            </div>
        </div>
        <div class="welcome-right-container w-100 position-absolute d-flex justify-content-end align-items-end">
            <img src="images/welcome-image.svg" alt="">
        </div>
    </div>
</div>
@endsection