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
        @include('parts.filters')
        
        <div class="search-job-main d-flex flex-column position-relative">
            <div class="search-job-main-header w-100 d-flex justify-content-between align-items-center">
                <p class="search-showing m-0">Prikazuje se <b>10</b> oglasa</p>
                <img id="filter-triger" src="{{ asset('images/filter.svg') }}" alt="Filtriraj">
                <div>
                    <select name="sorting" id="sorting">
                        <option value="0">Sortiraj podrazumevano</option>
                        <option value="1">Najnoviji</option>
                        <option value="2">Najstariji</option>
                    </select>
                </div>
            </div>
            <div class="w-100 mt-3">
                @for ($i = 0; $i < 7; $i++)
                @include('parts.wide-widget')
                @endfor
            </div>
        </div>
        @include('parts.mobile-filters')
    </div>
    <script src="{{ asset('js/widgets.js') }}"></script>
    <script src="{{ asset('js/filter.js') }}"></script>
@endsection