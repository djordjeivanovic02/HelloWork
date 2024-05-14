@extends('parts.main')
@section('search-job')
    <link rel="stylesheet" href="{{ asset('css/search-jobs.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex flex-column align-items-center justify-content-center">
        <h1 class="m-0">Pronađi posao</h1>
        <div class="info-navigation-container m-0 mt-2">
            <a href="{{route('login')}}" class="m-0">Početna</a>
            <span>/</span>
            <a href="" class="main m-0">Poslovi</a>
        </div>
    </div>
    <div class="search-job-main-container w-100 d-flex">
        <div class="search-job-inputs">
            <div class="w-100">
                <p class="mb-3">Pretraži poslove</p>
                <div class="search-job-input d-flex align-items-center w-100 bg-white">
                    <div class="search-job-input-image">
                        <img src="{{ asset('images/search-icon.svg') }}" alt="search icon">
                    </div>
                    <input type="text" class="w-100 h-100 px-2 border-0" placeholder="Ime posla, kompanije">
                </div>
            </div>
            <div class="w-100 mt-4">
                <p class="mb-3">Lokacija</p>
                <div class="search-job-input d-flex align-items-center w-100 bg-white">
                    <div class="search-job-input-image">
                        <img src="{{ asset('images/location-icon.svg') }}" alt="location icon">
                    </div>
                    <input type="text" class="w-100 h-100 px-2 border-0" placeholder="Grad ili okrug">
                </div>
            </div>
            <div class="w-100 mt-4">
                <p class="mb-3">Vaše veštine</p>
                <div class="search-job-input d-flex align-items-center w-100 bg-white">
                    <div class="search-job-input-image">
                        <img src="{{ asset('images/skills-icon.svg') }}" alt="skills icon">
                    </div>
                    <input type="text" class="w-100 h-100 px-2 border-0" placeholder="Npr. kuvanje kafe">
                </div>
            </div>
        </div>
        <div class="search-job-main"></div>
    </div>
@endsection