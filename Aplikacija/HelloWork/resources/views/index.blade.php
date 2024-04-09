@extends('parts.main')
@section('welcome-content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tutorial-section-index.css') }}">
    <div class="welcome-main-container2 d-flex flex-column align-items-center justify-content-center">
        <div class="welcome-container w-100 position-relative" style="height: 700px">
            <div class="welcome-left-container h-100 d-inline-block">
                <div class="w-100 h-100 d-flex flex-column justify-content-center">
                    <h1 class="fw-bold">Imamo <span>1000+</span> oglasa spremhin za Tebe</h1>
                    <p>Pronađi posao, zapošljenike i poslovne prilike</p>
                </div>
            </div>
            <div class="welcome-right-container w-100 position-absolute d-flex justify-content-end align-items-end">
                <img src="images/welcome-image.svg" alt="">
            </div>
        </div>
    </div>

    <div class="w-100 d-flex flex-column align-items-center justify-content-center mt-100">
        <div class="welcome-container d-flex flex-column align-items-center justify-content-center site-tutorial w-100 position-relative">
            <div class="tutorial-header">
                <p class="m-0 purpleText text-center">KAKO FUNKCIONIŠE</p>
                <h2 class="text-center">Pratite četiri jednostavna koraka</h2>
                <p class="text-center mt-3 description">Navigacija kroz proces zapošljavanja: Ova četiri koraka vode vas kroz kompleksan proces pronalaženja i
                    osvajanja željenog posla. Od definisanja svojih ciljeva i pripreme za intervju, do uspešnog pregovaranja o
                    uslovima zaposlenja, ovi koraci su ključni za ostvarenje vaših karijernih ambicija.</p>
            </div>
            <div class="tutorial-widgets w-100 d-flex justify-content-between align-items-center mt-5">
                @include('parts.tutorial-widget1')
                @include('parts.tutorial-widget2')
                @include('parts.tutorial-widget3')
                @include('parts.tutorial-widget4')
            </div>
        </div>
    </div>
@endsection
