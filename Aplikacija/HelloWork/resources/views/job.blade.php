@extends('parts.main')
@section('job')
    @php
        $categories = [
            1 => 'Administracija i Uredske Usluge',
            2 => 'Finansije i Računovodstvo',
            3 => 'IT i Softverski Razvoj',
            4 => 'Marketing i Prodaja',
            5 => 'Zdravstvo',
            6 => 'Obrazovanje i Obuka',
            7 => 'Građevina i Inženjering',
            8 => 'Usluge Kupcima',
            9 => 'Umetnost i Dizajn',
            10 => 'Proizvodnja i Industrija',
            11 => 'Logistika i Transport',
            12 => 'Pravo',
            13 => 'Ugostiteljstvo i Turizam',
            14 => 'Nekretnine',
            15 => 'Ljudski Resursi',
            16 => 'Mediji i Komunikacije',
            17 => 'Istraživanje i Razvoj',
            18 => 'Poljoprivreda i Prirodni Resursi',
            19 => 'Sigurnost i Zaštita',
            20 => 'Održavanje i Popravke',
        ];
        $adDuration = [
            1 => '+7 days',
            2 => '+15 days',
            3 => '+1 month',
            4 => 'Dok ga ja ne obrišem',
        ];
        $payment = [
            1 => 'Dnevno',
            2 => 'Mesečno',
            3 => 'Godišnje',
        ];
        $expirienceCategories = [
            0.0 => 'Tehnološka kompanija',
            1.0 => 'Automobilska kompanija',
            2.0 => 'Maloprodajna kompanija',
            3.0 => 'Finansijska kompanija',
            4.0 => 'Farmaceutska kompanija',
            5.0 => 'Energetska kompanija',
            6.0 => 'Kompanija za hranu i pića',
        ];
    @endphp
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex align-items-center justify-content-center">
        <div class="info-job-main-container w-100 h-100 d-flex">
            <div class="job-head-container d-flex">
                <div class="job-head-image">
                    @if ($ad != null && $ad->image != null)
                        <img src="{{ asset('storage/uploads/ads/' . $ad->image) }}" style="object-fit: cover">
                    @else
                        <img
                            src="{{ asset('storage/uploads/company_' . $ad->users->id . '/logo/' . $ad->users->companyInfo->logo) }}"></img>
                    @endif
                    {{-- <img src="{{ asset('images/Windows-logo.svg') }}" alt="Job Logo"> --}}
                </div>
                <div class="job-header-info d-flex flex-column mx-3">
                    <h3>
                        @if ($ad != null && $ad->title != null)
                            {{ $ad->title }}
                        @else
                            Nepoznato
                        @endif
                    </h3>
                    <div class="all-informations flex-row p-0">
                        <img src="/images/Aktovka.svg"><span class="text-in-span">
                            @if ($ad != null && $ad->users != null && $ad->users->name != null)
                                {{ $ad->users->name }}
                            @else
                                Nepoznato
                            @endif
                        </span>
                        <img src="/images/Lokacija.svg"><span class="text-in-span">
                            @if (
                                $ad != null &&
                                    $ad->users != null &&
                                    $ad->users->companyInfo->city != null &&
                                    $ad->users->companyInfo->country != null)
                                {{ $ad->users->companyInfo->country }}, {{ $ad->users->companyInfo->city }}
                            @else
                                Nepoznato
                            @endif
                        </span>
                        <img src="/images/Sat.svg"><span class="text-in-span">
                            @if ($ad != null && $ad->created_at != null)
                                @php
                                    $date = new DateTime($ad->created_at);
                                    $formatedDate = $date->format('j.n.Y');
                                @endphp
                                {{ $formatedDate }}
                            @else
                                Nepoznato
                            @endif
                        </span>
                        <img src="/images/Zarada.svg"><span class="text-in-span">
                            @if ($ad != null && $ad->min_salary != null && $ad->max_salary != null)
                                €{{ $ad->min_salary }} - €{{ $ad->max_salary }}
                            @else
                                Nepoznato
                            @endif
                        </span>
                    </div>
                    <div class="identificator-container">
                        @if ($ad != null && $ad->job_type != null)
                            @if ($ad->job_type == 1)
                                <div class="full-time d-inline-block">
                                    <p class="m-0 text-center">Puno radno vreme</p>
                                </div>
                            @else
                                <div class="full-time d-inline-block">
                                    <p class="m-0 text-center">Nepuno radno vreme</p>
                                </div>
                            @endif
                        @endif
                        <div class="remote d-inline-block">
                            <p class="m-0 text-center">
                                @if ($ad != null && $ad->job_category != null)
                                    {{ $categories[$ad->job_category] }}
                                @else
                                    Nepoznato
                                @endif
                            </p>
                        </div>
                        <div class="urgent d-inline-block">
                            <p class="m-0 text-center">
                                @if ($ad != null && $ad->number_of_jobs_needed != null)
                                    Još {{ $ad->number_of_jobs_needed }} mesta
                                @else
                                    Nepoznato
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @if (($currentUser && $currentUser->type != 2 && $currentUser->type != 0) || !$currentUser)

                <div class="job-actions d-flex">
                    <button
                        @if (!$currentUser) onclick="showDialog('not-signed')"
                    @else
                        @if (!$currentUser->userInfo) onclick="showDialog('no-user-info')"
                        @else
                            @if (!$currentUser->userInfo->cv)
                                onclick="showDialog('no-cv')"
                            @else
                                @if ($isApplied)
                                    style="background-color:red"
                                    onclick="showDialog('remove-application')"
                                @else
                                    onclick="showDialog('apply-for-job')" @endif
                        @endif
            @endif
            @endif
            >
            @if ($currentUser)
                @if ($isApplied)
                    Otkaži apliciranje
                @else
                    Apliciraj za posao
                @endif
            @else
                Apliciraj za Posao
            @endif

            </button>
            <div @if ($isSaved) class="save-job active d-flex align-items-center justify-content-center"
                @else
                class="save-job d-flex align-items-center justify-content-center" @endif
                @if ($currentUser) onclick="saveJob({{ $ad->id }}, this)" @endif>
                <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.0714 0H0.928571C0.682299 0 0.446113 0.0790165 0.271972 0.219667C0.0978315 0.360317 2.01065e-09 0.55108 2.01065e-09 0.74999V14.2498C-1.16771e-05 14.3932 0.0508567 14.5335 0.146579 14.6543C0.242301 14.775 0.378866 14.8711 0.540094 14.9311C0.701323 14.991 0.88046 15.0124 1.05628 14.9927C1.23211 14.973 1.39725 14.913 1.53214 14.8198L6.5 11.4523L11.4121 14.7823C11.4989 14.8518 11.6018 14.9068 11.7149 14.9441C11.8281 14.9814 11.9492 15.0004 12.0714 14.9998C12.1932 15.0023 12.3141 14.9818 12.4243 14.9398C12.5939 14.8835 12.739 14.788 12.8415 14.6652C12.9439 14.5424 12.9991 14.3979 13 14.2498V0.74999C13 0.55108 12.9022 0.360317 12.728 0.219667C12.5539 0.0790165 12.3177 0 12.0714 0ZM11.1429 12.6448L7.09429 9.89986C6.92743 9.78761 6.71715 9.72615 6.5 9.72615C6.28285 9.72615 6.07257 9.78761 5.90571 9.89986L1.85714 12.6448V1.49998H11.1429V12.6448Z" />
                </svg>
            </div>
        </div>
        @endif
    </div>
    </div>
    <div class="info-job-main-container w-100 mt-50">
        <div class="job-info">
            <div>
                <b>Opis Posla</b>
                <p>
                    @if ($ad != null && $ad->description != null)
                        {{ $ad->description }}
                    @else
                        Nepoznato
                    @endif
                </p>
            </div>
            <div class="mt-50">
                <b>Ključne Odgovornosti</b>
                @if ($ad != null && $ad->responsibilities != null)
                    @php
                        $resp = explode('&', $ad->responsibilities);
                    @endphp
                    <ul>
                        @foreach ($resp as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @else
                    Nepoznato
                @endif
            </div>
            <div class="mt-50">
                <b>Veštine i Iskustvo</b>
                @if ($ad != null && $ad->experience != null)
                    @php
                        $exp = explode('&', $ad->experience);
                    @endphp
                    <ul>
                        @foreach ($exp as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @else
                    Nepoznato
                @endif
            </div>
        </div>
        <div class="job-right-container d-flex-flex-column">
            <div class="job-quick-info">
                <div class="mb-4">
                    <b>Pregled Posla</b>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/date.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Datum Postavljanja:</p>
                        <p class="info">
                            @if ($ad != null && $ad->created_at != null)
                                {{ $formatedDate }}
                            @else
                                Nepoznato
                            @endif
                        </p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/sand-clock.svg') }}" alt="Sand Clock Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Ističe:</p>
                        <p class="info">
                            @if ($ad != null && $ad->ad_duration != null)
                                @if ($ad->ad_duration != 4)
                                    @php
                                        $date->modify($adDuration[$ad->ad_duration]);
                                        $formatedDate2 = $date->format('j.n.Y');
                                    @endphp
                                    {{ $formatedDate2 }}
                                @else
                                    Dok ga poslodavac ne obriše
                                @endif
                            @else
                                Nepoznato
                            @endif
                        </p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/location-main.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Lokacija:</p>
                        <p class="info">
                            @if ($ad != null && $ad->address != null)
                                {{ $ad->address }}
                            @else
                                Nepoznato
                            @endif
                        </p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/person-main.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Naziv Posla:</p>
                        <p class="info">
                            @if ($ad != null && $ad->title != null)
                                {{ $ad->title }}
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
                        <p class="head m-0 p-0">Način plaćanja:</p>
                        <p class="info">
                            @if ($ad != null && $ad->payment_method != null)
                                {{ $payment[$ad->payment_method] }}
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
                        <p class="head m-0 p-0">Plata:</p>
                        <p class="info">
                            @if ($ad != null && $ad->min_salary != null && $ad->max_salary != null)
                                €{{ $ad->min_salary }} - €{{ $ad->max_salary }}
                            @else
                                Nepoznato
                            @endif
                        </p>
                    </div>
                </div>
                <div class="my-4">
                    <b>Lokacija Posla</b>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61958.60967440586!2d20.507965891817683!3d44.774037492011274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1714215228237!5m2!1ssr!2srs"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="job-map"></iframe>

                <div class="my-4">
                    <b>Poslovne Veštine</b>
                </div>
                @if ($ad != null && $ad->tabs != null)
                    @php
                        $tags = explode('&', $ad->tabs);
                    @endphp
                    <div class="skills-container w-100">
                        @foreach ($tags as $item)
                            <div class="skill d-inline-block">{{ $item }}</div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="job-quick-info mt-4">
                <div class="job-quick-company-header d-flex mb-4">
                    <div class="quick-item-container d-flex">
                        <div class="imag-bg">
                            @if ($ad != null && $ad->users != null && $ad->users->companyInfo != null && $ad->users->companyInfo->logo != null)
                                <img
                                    src="{{ asset('storage/uploads/company_' . $ad->users->id . '/logo/' . $ad->users->companyInfo->logo) }}">
                            @else
                                <img src="{{ asset('images/unknown-company.svg') }}">
                            @endif
                            {{-- <img src="{{ asset('images/Windows-logo.svg') }}" alt="Date Icon" style="width: 35px;"> --}}
                        </div>
                        <div class="quick-item-info d-flex flex-column">
                            <p class="head m-0 p-0">
                                @if ($ad != null && $ad->users != null && $ad->users->name != null)
                                    {{ $ad->users->name }}
                                @else
                                    Nepoznato
                                @endif
                            </p>
                            <a href="/company/{{ $ad->users->id }}">Pogledaj profil kompanije</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Primarna industrija:</p>
                    <p class="segment-value">
                        @if ($ad != null && $ad->users != null && $ad->users->companyInfo != null && $ad->users->companyInfo->category != null)
                            {{ $expirienceCategories[$ad->users->companyInfo->category] }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Veličina kompanije:</p>
                    <p class="segment-value">
                        @if ($ad != null && $ad->users != null && $ad->users->companyInfo != null && $ad->users->companyInfo->size != null)
                            {{ $ad->users->companyInfo->size }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Godina osnivanja:</p>
                    <p class="segment-value">
                        @if ($ad != null && $ad->users != null && $ad->users->companyInfo != null && $ad->users->companyInfo->start_date != null)
                            @php
                                $year = (new DateTime($ad->users->companyInfo->start_date))->format('Y');
                            @endphp
                            {{ $year }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Telefon:</p>
                    <p class="segment-value">
                        @if ($ad != null && $ad->users != null && $ad->users->companyInfo != null && $ad->users->companyInfo->contact != null)
                            {{ $ad->users->companyInfo->contact }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Email:</p>
                    <p class="segment-value">
                        @if ($ad != null && $ad->users != null && $ad->users->email != null)
                            {{ $ad->users->email }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Lokacija:</p>
                    <p class="segment-value">
                        @if ($ad != null && $ad->users != null && $ad->users->companyInfo != null && $ad->users->companyInfo->address != null)
                            {{ $ad->users->companyInfo->address }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Društvene mreže:</p>
                    <div class="user-social-medias">
                        @if ($ad != null && $social != null && count($social) != null)
                            <img src="{{ asset('images/facebook.svg') }}" alt="Facebook Logo"
                                @if ($social[0] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[0] }}'" @else class="d-none" @endif>
                            <img src="{{ asset('images/instagram.svg') }}" alt="Instagram Logo"
                                @if ($social[1] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[1] }}'" @else class="d-none" @endif
                                style="width: 22px; height: 22px">
                            <img src="{{ asset('images/linkedin.svg') }}" alt="LinkedIn Logo"
                                @if ($social[2] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[2] }}'" @else class="d-none" @endif>
                            <img src="{{ asset('images/threads.svg') }}" alt="Threads Logo"
                                @if ($social[3] != null) class="d-inline-block" onclick="window.location.href='https://{{ $social[3] }}'" @else class="d-none" @endif>
                        @else
                            Nepoznato
                        @endif
                    </div>
                </div>

                @if ($ad != null && $ad->users != null && $ad->users->companyInfo != null && $ad->users->companyInfo->website != null)
                    <div class="company-website w-100">
                        <button class="w-100"
                            onclick="window.location.href='https://{{ $ad->users->companyInfo->website }}'">
                            {{ $ad->users->companyInfo->website }}
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @component('dialogs.notification', [
        'id' => 'not-signed',
        'type' => 'success',
        'title' => 'Obaveštenje',
        'message' => 'Morate biti prijavljeni da biste aplicirali za posao!',
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

    @component('dialogs.notification', [
        'id' => 'no-user-info',
        'type' => 'success',
        'title' => 'Obeveštenje',
        'message' => 'Da biste aplicirali za posao prvo morate ažurirati podatke na svom profilu!',
        'close' => true,
        'actions' => [
            [
                'url' => "window.location.href='../user-change-profile'",
                'type' => 'yes',
                'label' => 'Ažuriraj podatke',
            ],
            [
                'url' => "closeDialog('no-user-info')",
                'type' => 'cancel',
                'label' => 'Otkaži',
            ],
        ],
    ])
    @endcomponent

    @component('dialogs.notification', [
        'id' => 'no-cv',
        'type' => 'success',
        'title' => 'Nedostaje CV',
        'message' =>
            'Da biste aplicirali morate prvo dodati CV na svoj profil. Ukoliko nemate CV možete ga veoma lako kreirati klikom na Kreiraj/dodaj CV',
        'close' => true,
        'actions' => [
            [
                'url' => "window.location.href='../user-cv'",
                'type' => 'yes',
                'label' => 'Kreiraj/dodaj CV',
            ],
            [
                'url' => "closeDialog('no-cv')",
                'type' => 'cancel',
                'label' => 'Otkaži',
            ],
        ],
    ])
    @endcomponent

    @component('dialogs.notification', [
        'id' => 'apply-for-job',
        'type' => 'success',
        'title' => 'Apliciranje za posao',
        'message' =>
            'Da li ste sigurni da želite da aplicirate za posao ' .
            $ad->title .
            '? Nakon što aplicirate poslodavac će moći da vidi vašu aplikaciju.',
        'close' => true,
        'actions' => [
            [
                'url' => "applyForJob('" . $ad->id . "', 'apply-for-job')",
                'type' => 'yes',
                'label' => 'Apliciraj',
            ],
            [
                'url' => "closeDialog('apply-for-job')",
                'type' => 'cancel',
                'label' => 'Otkaži',
            ],
        ],
    ])
    @endcomponent

    @component('dialogs.notification', [
        'id' => 'remove-application',
        'type' => 'success',
        'title' => 'Otkaži apliciranje',
        'message' => 'Da li ste sigurni da želite da otkažete apliciranje za posao  ' . $ad->title . '?',
        'close' => true,
        'actions' => [
            [
                'url' => "cancelApplication('" . $ad->id . "', 'remove-application')",
                'type' => 'yes',
                'label' => 'Otkaži apliciranje',
            ],
            [
                'url' => "closeDialog('remove-application')",
                'type' => 'cancel',
                'label' => 'Zatvori',
            ],
        ],
    ])
    @endcomponent
    <script src="{{ asset('js/dialogs/actions.js') }}"></script>
    <script src="{{ asset('js/save-ad.js') }}"></script>
    <script src="{{ asset('js/user/apply-for-job.js') }}"></script>
@endsection
