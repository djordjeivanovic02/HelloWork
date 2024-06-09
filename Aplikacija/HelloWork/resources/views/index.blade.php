@extends('parts.main')
@section('welcome-content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tutorial-section-index.css') }}">
    <div class="welcome-main-container2 d-flex flex-column align-items-center justify-content-center">
        <div class="welcome-container w-100 d-flex position-relative">
            <div class="welcome-left-container h-100">
                <div class="w-100 h-100 d-flex flex-column justify-content-center">
                    <h1 class="fw-bold main-text">Imamo <span>najbolje</span> oglase spremne za tebe!</h1>
                    <p>Pronađi posao, zapošljenike i poslovne prilike.</p>
                    <div class="quick-search w-100 bg-white mt-4">
                        <form action="{{ route('searchjob') }}" method="GET">
                            <div class="d-inline-block my-4">
                                <img src="{{ asset('images/search-icon.svg') }}" alt="Search Icon">
                                <input type="text" autocomplete="off" name="search" placeholder="Ime posla, kompanije">
                            </div>
                            {{-- <div class="separator d-inline-block"></div> --}}
                            <div class="d-inline-block my-4">
                                <img src="{{ asset('images/Lokacija.svg') }}" alt="Location Icon">
                                <input type="text" autocomplete="off" name="location" placeholder="Grad">
                            </div>
                            <button class="d-inline-block">Pronađi posao</button>
                        </form>
                    </div>
                    <p><span style="font-weight: bold">Popularne pretrage:</span> Programer, Vozac, Prevodilac</p>
                </div>
            </div>
            <div class="welcome-right-container d-flex">
                <img src="{{ asset('images/welcome-image.svg') }}" alt="Welcome Image">
            </div>

        </div>
    </div>

    <div class="w-100 d-flex flex-column align-items-center justify-content-center">
        <div
            class="welcome-container d-flex flex-column align-items-center justify-content-center site-tutorial w-100 position-relative">
            <div class="w-100 d-flex flex-column align-items-center mt-200">
                <div class="tutorial-header">
                    <p class="m-0 purpleText text-center">KAKO FUNKCIONIŠE</p>
                    <h2 class="text-center">Pratite četiri jednostavna koraka</h2>
                    <p class="text-center mt-3 description">Navigacija kroz proces zapošljavanja: Ova četiri koraka vode vas
                        kroz kompleksan proces pronalaženja i
                        osvajanja željenog posla. Od definisanja svojih ciljeva i pripreme za intervju, do uspešnog
                        pregovaranja o
                        uslovima zaposlenja, ovi koraci su ključni za ostvarenje vaših karijernih ambicija.</p>
                </div>
                <div class="tutorial-widgets w-100 d-flex justify-content-center flex-wrap mt-5">
                    @include('parts.tutorial-widgets')
                </div>
            </div>
            <div class="welcome-sector-container w-100 p-0 d-flex mt-200">
                <div class="welcome-sector-text">
                    <p class="m-0 purpleText">ZADOVOLJNI KORISNICI</p>
                    <h2>Postanite i Vi jedan od naših zadovoljnih članova</h2>
                    <p class="mt-3 description">Kažu da je pronalaženje posla dug put, ali mi smo tu da ga učinimo lakšim i
                        uzbudljivijim. Postanite jedan od naših zadovoljnih članova i otvorite vrata svetu profesionalnih
                        prilika i napredovanja!</p>
                    <p class="mt-1 description"> Registracija je brza, jednostavna i prilagođena vama. Samo nekoliko koraka
                        i već ste spremni za početak vaše karijerne avanture. Nema komplikacija, nema gubljenja vremena -
                        samo čista produktivnost.</p>
                    <p class="mt-1 description">Pridružite nam se danas i prepustite se čarima koje samo naša platforma za
                        zapošljavanje može pružiti. Jer s nama, pronalaženje posla nije samo cilj - to je putovanje ka
                        ostvarenju vaših profesionalnih snova.</p>
                    @if ($currentUser)
                        @if ($currentUser->type == 2)
                            <button class="mt-3" onclick="window.location.href='/new-ad'">Postavi oglas</button>
                        @else
                            <button class="mt-3" onclick="window.location.href='/user-change-profile'">Pogledaj
                                Profil</button>
                        @endif
                    @else
                        <button class="mt-3 login-register">Registruj se</button>
                    @endif
                </div>
                <div class="welcome-section-image d-flex">
                    <img src="{{ asset('images/welcome-section.svg') }}" alt="Welcome Section Image">
                </div>
            </div>
            <div class="w-100 d-flex flex-column align-items-center mt-200">
                <div class="tutorial-header ">
                    <p class="m-0 purpleText text-center">KATEGORIJE POSLOVA</p>
                    <h2 class="text-center">Izaberite željenu kategoriju</h2>
                    <p class="text-center mt-2 description">Naša sekcija za kategorije poslova pruža vam mogućnost da brzo i
                        lako pronađete poslove koji odgovaraju vašim interesovanjima i veštinama. Bez obzira da li tražite
                        posao u tehnologiji, marketingu, administraciji ili nekoj drugoj oblasti, ovde ćete naći širok
                        spektar opcija.</p>
                </div>
                <div class="tutorial-widgets w-100 d-flex justify-content-center flex-wrap mt-5 ">
                    {{-- @include('parts.tutorial-widgets') --}}
                    @include('parts.quick-categories')
                </div>
            </div>
            <div class="w-100 d-flex flex-column align-items-center mt-200">
                <div class="welcome-quick-jobs w-100 d-flex">
                    <div class="p-2">
                        <p class="m-0 purpleText">SKORAŠNJI POSLOVI</p>
                        <h2>Ponuda novih poslova</h2>
                        <p class="mt-2 description">Svakog dana mnogo novih oglasa</p>
                    </div>
                    @if (($currentUser !== null && $currentUser->type == 2) || !$currentUser)
                        <button
                            @if (!$currentUser) onclick="showDialog('not-signed')" @else onclick="window.location.href='/new-ad'" @endif>Postavi
                            oglas</button>
                    @endif
                </div>

                <div class="quick-jobs-cotnainer w-100 d-flex flex-column align-items-center">
                    <div class="tutorial-widgets w-100 d-flex justify-content-center flex-wrap mt-5 ">
                        @if ($ads)
                            @foreach ($ads as $ad)
                                @component('parts.quick-job', [
                                    'ad' => $ad,
                                ])
                                @endcomponent
                            @endforeach
                        @else
                            Nema oglasa
                        @endif
                    </div>
                    <button onclick="window.location.href='/searchjob'">Učitaj još</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@component('dialogs.notification', [
    'id' => 'not-signed',
    'type' => 'success',
    'title' => 'Obaveštenje',
    'message' => 'Morate biti prijavljeni kao poslodavac da biste dodali oglas posao!',
    'close' => true,
    'actions' => [
        [
            'url' => "closeDialog('not-signed')",
            'type' => 'yes',
            'label' => 'OK',
        ],
    ],
])
@endcomponent


<script src="{{ asset('js/dialogs/actions.js') }}"></script>
