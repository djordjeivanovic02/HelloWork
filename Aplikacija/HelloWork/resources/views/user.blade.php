@extends('parts.main')
@section('job')
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex align-items-center justify-content-center">
        <div class="info-job-main-container w-100 h-100 d-flex justify-content-center">
            <div class="job-head-container w-100 d-flex flex-column align-items-center">
                <div class="user-image">
                    @if ($user != null && $user->userInfo != null && $user->userInfo->logo != null)
                        <img src="{{ asset('storage/uploads/user_' . $user->id . '/logo/' . $user->userInfo->logo) }}"
                            alt="User Logo">
                    @else
                        <img src="{{ asset('images/unknown-company.svg') }}" id="companyLogoImage" alt="Company Logo"
                            class="w-100 h-100">
                    @endif
                </div>
                <div class="job-header-info d-flex flex-column align-items-center my-3">
                    <h3 class="">
                        @if ($user != null && $user->name != null)
                            {{ $user->name }}
                        @else
                            Nepoznato Ime
                        @endif
                    </h3>
                    <a href="">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->professional_title != null)
                            {{ $user->userInfo->professional_title }}
                        @else
                            Nepoznata profesija
                        @endif
                    </a>
                </div>
                <div class="user-fast-info d-flex w-100 mt-4">
                    <div class="identificator-container user-identificator-container">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->skills != null)
                            @php
                                $skills = explode('&', $user->userInfo->skills);
                            @endphp
                            @foreach ($skills as $index => $item)
                                @if ($index <= 2)
                                    <div class="full-time d-inline-block">
                                        <p class="m-0 text-center">{{ $item }}</p>
                                    </div>
                                @else
                                @break
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="user-all-informations flex-row p-0">
                    <img src="/images/Lokacija.svg"><span class="text-in-span">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->city != null && $user->userInfo->country != null)
                            {{ $user->userInfo->city }}, {{ $user->userInfo->country }}
                        @endif
                    </span>
                    <img src="/images/Zarada.svg"><span class="text-in-span">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->current_salary != null)
                            {{ $user->userInfo->current_salary }} mesečno
                        @else
                            Nepoznata plata
                        @endif
                    </span>
                    <img src="/images/Sat.svg"><span class="text-in-span">
                        @if ($user != null && $date != null)
                            Član od {{ $date }}
                        @endif
                    </span>
                </div>
                <div class="job-actionss d-flex">
                    <button>Preuzmi CV</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="info-job-main-container user-main-container w-100 mt-50">
    <div class="job-info user-info">
        <div>
            <b>O korisniku</b>
            <p>
                @if ($user != null && $user->userInfo != null && $user->userInfo->about != null)
                    {{ $user->userInfo->about }}
                @endif
            </p>
        </div>
        <div class="mt-50">
            <b>Ključne Odgovornosti</b>
            <ul>
                @if ($user != null && $responsibilities != null)
                    @foreach ($responsibilities as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="mt-50">
            <b>Prethodni poslovi</b>
            <div class="early-job d-flex align-items-center mt-3 mb-2">
                <div class="early-job-image d-flex justify-content-center align-items-center">
                    <p class="m-0 p-0">W</p>
                </div>
                <div class="early-job-title mx-4">
                    <p class="my-0">Web Developer</p>
                    <a href="">Microsoft</a>
                </div>
                <div class="early-job-duration">
                    <p class="m-0">2014 - 2018</p>
                </div>
            </div>
            <div class="early-job d-flex align-items-center mt-3 mb-2">
                <div class="early-job-image d-flex justify-content-center align-items-center">
                    <p class="m-0 p-0">W</p>
                </div>
                <div class="early-job-title mx-4">
                    <p class="my-0">Web Developer</p>
                    <a href="">Microsoft</a>
                </div>
                <div class="early-job-duration">
                    <p class="m-0">2014 - 2018</p>
                </div>
            </div>
            <div class="early-job d-flex align-items-center mt-4 mb-3">
                <div class="early-job-image d-flex justify-content-center align-items-center">
                    <p class="m-0 p-0">R</p>
                </div>
                <div class="early-job-title mx-4">
                    <p class="my-0">Unity Programer</p>
                    <a href="">Rockstar</a>
                </div>
                <div class="early-job-duration">
                    <p class="m-0">2014 - 2020</p>
                </div>
            </div>
        </div>
    </div>
    <div class="job-right-container d-flex-flex-column">
        <div class="job-quick-info">
            <div class="quick-item-container d-flex my-3">
                <div class="quick-item-image">
                    <img src="{{ asset('images/date.svg') }}" alt="Date Icon">
                </div>
                <div class="quick-item-info d-flex flex-column">
                    <p class="head m-0 p-0">Iskustvo:</p>
                    <p class="info">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->expirience != null)
                            @switch($user->userInfo->expirience)
                                @case(1.0)
                                    Bez iskustva
                                @break

                                @case(2.0)
                                    1 godina
                                @break

                                @case(3.0)
                                    2 godine
                                @break

                                @case(4.0)
                                    3 godine
                                @break

                                @case(5.0)
                                    4 godine
                                @break

                                @case(6.0)
                                    4+ godina
                                @break

                                @default
                                    Nepoznato
                            @endswitch
                        @endif
                    </p>
                </div>
            </div>
            <div class="quick-item-container d-flex my-3">
                <div class="quick-item-image">
                    <img src="{{ asset('images/sand-clock.svg') }}" alt="Sand Clock Icon">
                </div>
                <div class="quick-item-info d-flex flex-column">
                    <p class="head m-0 p-0">Godine:</p>
                    <p class="info">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->age != null)
                            {{ $user->userInfo->age }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
            </div>
            <div class="quick-item-container d-flex my-3">
                <div class="quick-item-image">
                    <img src="{{ asset('images/coins.svg') }}" alt="Date Icon">
                </div>
                <div class="quick-item-info d-flex flex-column">
                    <p class="head m-0 p-0">Trenutna plata:</p>
                    <p class="info">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->current_salary != null)
                            €{{ $user->userInfo->current_salary }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
            </div>
            <div class="quick-item-container d-flex my-3">
                <div class="quick-item-image">
                    <img src="{{ asset('images/money.svg') }}" alt="Date Icon">
                </div>
                <div class="quick-item-info d-flex flex-column">
                    <p class="head m-0 p-0">Očekivana plata:</p>
                    <p class="info">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->expected_salary != null)
                            €{{ $user->userInfo->expected_salary }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
            </div>
            <div class="quick-item-container d-flex my-3">
                <div class="quick-item-image">
                    <img src="{{ asset('images/languages.svg') }}" alt="Date Icon">
                </div>
                <div class="quick-item-info d-flex flex-column">
                    <p class="head m-0 p-0">Jezici:</p>
                    <p class="info">
                        @if ($user != null && $languages != null && count($languages) != 0)
                            @php
                                $lang = implode(', ', $languages);
                            @endphp
                            {{ $lang }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
            </div>
            <div class="quick-item-container d-flex my-3">
                <div class="quick-item-image">
                    <img src="{{ asset('images/education.svg') }}" alt="Date Icon">
                </div>
                <div class="quick-item-info d-flex flex-column">
                    <p class="head m-0 p-0">Stepen obrazovanja:</p>
                    <p class="info">
                        @if ($user != null && $user->userInfo != null && $user->userInfo->education != null)
                            @switch($user->userInfo->education)
                                @case(1.0)
                                    Predškolsko obrazovanje
                                @break

                                @case(2.0)
                                    Osnovno obrazovanje
                                @break

                                @case(3.0)
                                    Srednje obrazovanje
                                @break

                                @case(4.0)
                                    Visoko obrazovanje
                                @break

                                @case(5.0)
                                    Stručno obrazovanje i obuka
                                @break

                                @case(6.0)
                                    Neformalno obrazovanje
                                @break

                                @default
                                    Nepoznato
                            @endswitch
                        @endif
                    </p>
                </div>
            </div>

        </div>

        <div class="job-quick-info mt-4 d-flex justify-content-between">
            <div>
                <b>Društvene mreže</b>
            </div>
            <div class="user-social-medias">
                @if ($user != null && $social != null && count($social) != null)
                    <img src="{{ asset('images/facebook.svg') }}" alt="Facebook Logo"
                        @if ($social[0] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[0] }}'" @else class="d-none" @endif>
                    <img src="{{ asset('images/instagram.svg') }}" alt="Instagram Logo"
                        @if ($social[1] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[1] }}'" @else class="d-none" @endif
                        style="width: 22px; height: 22px">
                    <img src="{{ asset('images/linkedin.svg') }}" alt="LinkedIn Logo"
                        @if ($social[2] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[2] }}'" @else class="d-none" @endif>
                    <img src="{{ asset('images/threads.svg') }}" alt="Threads Logo"
                        @if ($social[3] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[3] }}'" @else class="d-none" @endif>
                @endif
            </div>
        </div>

        <div class="job-quick-info mt-4">
            <div class="mb-4">
                <b>Poslovne Veštine</b>
            </div>
            <div class="skills-container w-100">
                @if ($user != null && $user->userInfo != null && $user->userInfo->skills != null)
                    @php
                        $skills = explode('&', $user->userInfo->skills);
                    @endphp
                    @foreach ($skills as $item)
                        <div class="skill d-inline-block">{{ $item }}</div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
