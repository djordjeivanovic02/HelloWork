@extends('parts.main')
@section('contact')
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search-jobs.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex flex-column align-items-center justify-content-center">
        <h1 class="m-0">Podrška</h1>
        <div class="info-navigation-container m-0 mt-2">
            <a href="{{ route('login') }}" class="m-0">Početna</a>
            <span>/</span>
            <a href="" class="main m-0">Podrška</a>
        </div>
    </div>

    <div class="donji-deo w-100 d-flex justify-content-center ">
        <div class="contact d-flex flex-column">
            <h4>Brze Informacije</h4>
            <p class="infos">Ukoliko imate nekih pitanja ili problema, možete kontaktirati administratore popunjivanjem
                sledeće forme.</p>
            <div class="address d-flex">
                <div class="little-logo-div d-flex align-items-center justify-content-center">
                    <i class="uil uil-map-marker"></i>
                </div>
                <div class="text-3 d-flex flex-column">
                    <p class="topics">ADRESA:</p>
                    <p class="texts">Stara Železnička Kolonija 5A</p>
                </div>
            </div>
            <div class="email d-flex">
                <div class="little-logo-div d-flex align-items-center justify-content-center">
                    <i class="uil uil-envelope"></i>
                </div>
                <div class="text-3 d-flex flex-column">
                    <p class="topics">EMAIL:</p>
                    <p class="texts">timauroraa@gmail.com</p>
                </div>
            </div>
            <div class="phone d-flex">
                <div class="little-logo-div d-flex align-items-center justify-content-center">
                    <i class="uil uil-mobile-android"></i>
                </div>
                <div class="text-3 d-flex flex-column">
                    <p class="topics">BROJ TELEFONA:</p>
                    <p class="texts">+381 607303883</p>
                </div>
            </div>

            <hr>

            <div class="socials d-flex">
                <div class="every-social d-flex align-items-center justify-content-center">
                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                </div>
                <div class="every-social d-flex align-items-center justify-content-center">
                    <a href="#"><i class="uil uil-twitter"></i></a>
                </div>
                <div class="every-social d-flex align-items-center justify-content-center">
                    <a href="#"><i class="uil uil-instagram"></i></a>
                </div>
                <div class="every-social d-flex align-items-center justify-content-center">
                    <a href="#"><i class="uil uil-linkedin"></i></a>
                </div>
            </div>

        </div>


        <div class="message d-flex flex-column">
            <h4 class="mb-4">Pošalji nam poruku</h4>
            <input type="text" placeholder="Vaše ime" class="inputs" id="supportName">
            <input type="text" placeholder="Vaša email adresa" class="inputs" id="supportEmail">
            <textarea type="text" placeholder="Unesite poruku ovde" class="textarea" id="supportMessage"></textarea>
            <input type="button" class="button" value="Pošalji" onclick="sendMessage()">
        </div>

    </div>
    @component('dialogs.notification', [
        'id' => 'notification',
        'type' => 'success',
        'title' => 'Obaveštenje',
        'message' =>
            'Uspešno ste kontaktirali administratore. Nakon što administratori pregledaju vašu poruku bićete obavešteni putem email adrese koje ste uneli u formi.',
        'close' => true,
        'actions' => [
            [
                'url' => "closeDialog('notification')",
                'type' => 'yes',
                'label' => 'OK',
            ],
        ],
    ])
    @endcomponent
    <script src="{{ asset('js/dialogs/actions.js') }}"></script>
    <script src="{{ asset('js/send-message-support.js') }}"></script>
@endsection
