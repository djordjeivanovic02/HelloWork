@extends('parts.main')
@section('job')
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex align-items-center justify-content-center">
        <div class="info-job-main-container w-100 d-flex">
            <div class="job-head-container d-flex">
                <div class="job-head-image">
                    <div class="company-logo-container">
                        @if ($company != null && $company->companyInfo != null && $company->companyInfo->logo != null)
                            <img src="{{ asset('storage/uploads/company_' . $company->id . '/logo/' . $company->companyInfo->logo) }}"
                                alt="User Logo">
                        @else
                            <img src="{{ asset('images/unknown-company.svg') }}" id="companyLogoImage" alt="Company Logo"
                                class="w-100 h-100">
                        @endif
                    </div>
                </div>
                <div class="job-header-info d-flex flex-column mx-3">
                    <h3>
                        @if ($company != null && $company->name != null)
                            {{ $company->name }}
                        @else
                            Nepoznato
                        @endif

                    </h3>
                    <div class="all-informations company-all-informations">
                        <img src="/images/Lokacija.svg"><span class="text-in-span">
                            @if (
                                $company != null &&
                                    $company->companyInfo != null &&
                                    $company->companyInfo->city != null &&
                                    $company->companyInfo->country != null)
                                {{ $company->companyInfo->city }}, {{ $company->companyInfo->country }}
                            @else
                                Nepoznato
                            @endif
                        </span>
                        <img src="/images/Aktovka.svg"><span class="text-in-span">
                            @if ($company != null && $company->companyInfo != null && $company->companyInfo->category != null)
                                @switch($company->companyInfo->expirience)
                                    @case(0.0)
                                        Tehnološka kompanije
                                    @break

                                    @case(1.0)
                                        Automobilska kompanija
                                    @break

                                    @case(2.0)
                                        Maloprodajna kompanija
                                    @break

                                    @case(3.0)
                                        Finansijska kompanija
                                    @break

                                    @case(4.0)
                                        Farmaceutska kompanija
                                    @break

                                    @case(5.0)
                                        Energetska kompanija
                                    @break

                                    @case(6.0)
                                        Kompanija za hranu i pića
                                    @break

                                    @default
                                        Nepoznato
                                @endswitch
                            @endif
                        </span>
                        <img src="/images/call.svg"><span class="text-in-span">
                            @if ($company != null && $company->companyInfo != null && $company->companyInfo->contact != null)
                                {{ $company->companyInfo->contact }}
                            @else
                                Nepoznato
                            @endif
                        </span>
                        <img src="/images/message-gray.svg"><span class="text-in-span">
                            @if ($company != null && $company->email != null)
                                {{ $company->email }}
                            @else
                                Nepoznato
                            @endif
                        </span>
                    </div>
                    <div class="identificator-container m-0 mt-3">
                        <div class="full-time d-inline-block m-0">
                            <p class="m-0 text-center">
                                @if ($ads != null && count($ads) != 0)
                                    Dostupni poslovi - {{ count($ads) }}
                                @else
                                    Nema dostupnih poslova
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info-job-main-container w-100 d-flex justify-content-between align-items-start mt-50">
        <div class="job-info">
            <div>
                <b>O kompaniji</b>
                <p>
                    @if ($company != null && $company->companyInfo != null && $company->companyInfo->about != null)
                        @php
                            $recenice = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $company->companyInfo->about);
                            $brojRecenica = count($recenice);
                            $polovinaRecenica = ceil($brojRecenica / 2);
                        @endphp
                        @foreach ($recenice as $index => $recenica)
                            @if ($index < $polovinaRecenica)
                                {{ $recenica }}
                            @endif
                        @endforeach
                    @else
                        Nepoznato
                    @endif
                </p>
                @if ($images != null && count($images) != 0)
                    <div class="company-gallery">
                        @foreach ($images as $image)
                            <div class="company-gallery-image d-inline-block">
                                <img src="{{ $image }}" alt="Company Image">
                            </div>
                        @endforeach
                    </div>
                @endif
                <p>
                    @if ($company != null && $company->companyInfo != null && $company->companyInfo->about != null)
                        @foreach ($recenice as $index => $recenica)
                            @if ($index >= $polovinaRecenica)
                                {{ $recenica }}
                            @endif
                        @endforeach
                    @endif
                </p>

                <h4 style="margin-top: 50px">Svi poslovi kompanije</h4>
                <p class="m-0">
                    @if ($ads != null && count($ads) != 0)
                        @if ($todayAds != null)
                            {{ count($ads) }} dostupna oglasa - {{ $todayAds }} dodata danas
                        @else
                            {{ count($ads) }} dostupna oglasa
                        @endif
                    @else
                        Nema dostupnih poslova
                    @endif
                </p>
                <div class="w-100">
                    @if ($ads != null && count($ads) != 0 && $savedAds != null)
                        @foreach ($ads as $item)
                            @component('parts.wide-widget', [
                                'saved' => $savedAds[$item->id] == 1 ? true : false,
                                'image' => $item->image,
                                'jobId' => $item->id,
                                'companyID' => $item->users->id,
                                'companyImage' => $item->users->companyInfo->logo,
                                'title' => $item->title,
                                'category' => $item->job_category,
                                'city' => $item->users->companyInfo->city,
                                'country' => $item->users->companyInfo->country,
                                'created_at' => $item->created_at,
                                'min_salary' => $item->min_salary,
                                'max_salary' => $item->max_salary,
                                'tags' => $item->tabs,
                                // 'saved' => $savedAds[$index],
                            ])
                            @endcomponent
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="job-right-container d-flex-flex-column">
            <div class="job-quick-info mb-4">
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Primarna industrija:</p>
                    <p class="segment-value">
                        @if ($company != null && $company->companyInfo != null && $company->companyInfo->category != null)
                            @switch($company->companyInfo->expirience)
                                @case(0.0)
                                    Tehnološka kompanije
                                @break

                                @case(1.0)
                                    Automobilska kompanija
                                @break

                                @case(2.0)
                                    Maloprodajna kompanija
                                @break

                                @case(3.0)
                                    Finansijska kompanija
                                @break

                                @case(4.0)
                                    Farmaceutska kompanija
                                @break

                                @case(5.0)
                                    Energetska kompanija
                                @break

                                @case(6.0)
                                    Kompanija za hranu i pića
                                @break

                                @default
                                    Nepoznato
                            @endswitch
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Veličina kompanije:</p>
                    <p class="segment-value">
                        @if ($company != null && $company->companyInfo != null && $company->companyInfo->size != null)
                            {{ $company->companyInfo->size }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Godina osnivanja:</p>
                    <p class="segment-value">
                        @if ($company != null && $company->companyInfo != null && $company->companyInfo->start_date != null)
                            @php
                                $year = (new DateTime($company->companyInfo->start_date))->format('Y');
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
                        @if ($company != null && $company->companyInfo != null && $company->companyInfo->contact != null)
                            {{ $company->companyInfo->contact }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Email:</p>
                    <p class="segment-value">
                        @if ($company != null && $company->email != null)
                            {{ $company->email }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Lokacija:</p>
                    <p class="segment-value">
                        @if (
                            $company != null &&
                                $company->companyInfo != null &&
                                $company->companyInfo->city != null &&
                                $company->companyInfo->country != null)
                            {{ $company->companyInfo->city }}, {{ $company->companyInfo->country }}
                        @else
                            Nepoznato
                        @endif
                    </p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Društvene mreže:</p>
                    <div class="user-social-medias">
                        @if ($company != null && $social != null && count($social) != null)
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
                @if ($company != null && $company->companyInfo != null && $company->companyInfo->website != null)
                    <div class="company-website w-100">
                        <button class="w-100"
                            onclick="window.location.href='https://{{ $company->companyInfo->website }}'">{{ $company->companyInfo->website }}</button>
                    </div>
                @endif
            </div>

            <div class="job-quick-info">
                <div class="my-2">
                    <b>Lokacija Kompanije</b>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61958.60967440586!2d20.507965891817683!3d44.774037492011274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1714215228237!5m2!1ssr!2srs"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="job-map"></iframe>
            </div>
        </div>
    </div>
@endsection
