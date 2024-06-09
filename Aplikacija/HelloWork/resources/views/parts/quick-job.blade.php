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

    $jobDuration = [
        1 => 'Puno radno vreme',
        2 => 'Nepuno radno vreme',
    ];

    $payment = [
        1 => 'Dnevno',
        2 => 'Mesečno',
        3 => 'Godišnje',
    ];
@endphp
@if ($ad && $ad->users() && $ad->users->companyInfo())
    <div class="d-inline-block p-2">
        <div class="out-container d-flex flex-column shadow" onclick="window.location.href='job/{{ $ad->id }}'">
            <div class="first-row d-flex flex-row justify-content-end align-items-center">
                <p class="before2 mb-0">
                    @php
                        $razlikaUDanima = now()->diffInDays($ad->created_at);
                    @endphp
                    @if ($razlikaUDanima > 0)
                        Pre {{ $razlikaUDanima }} dana
                    @else
                        Danas
                    @endif
                </p>
                <div class="full-time-div">
                    <p class="full-time-text m-0">
                        {{ $jobDuration[$ad->job_type] }}
                    </p>
                </div>
            </div>
            <div class="second-row d-flex flex-row mt-2">
                <div class="logo-container d-flex align-items-center justify-content-center">
                    {{-- <img src="/images/Windows-logo.svg"> --}}
                    @if ($ad != null && $ad->image != null)
                        <img src="{{ asset('storage/uploads/ads/' . $ad->image) }}">
                    @else
                        <img
                            src="{{ asset('storage/uploads/company_' . $ad->users->id . '/logo/' . $ad->users->companyInfo->logo) }}">
                    @endif
                </div>
                <div class="text-second-row d-flex flex-column">
                    <p class="top-text">
                        <a href="/company/{{ $ad->users->id }}">
                            {{ $ad->users->name }}, {{ $ad->users->companyInfo->city }}
                        </a>
                    </p>
                    <p class="bottom-text">
                        {{ $categories[$ad->job_category] }}
                    </p>
                </div>
            </div>
            <div class="third-row">
                <p class="text-third-row">
                    @php
                        if (Str::length($ad->description) > 70) {
                            $shortDesc = Str::substr($ad->description, 0, 80) . '...';
                        } else {
                            $shortDesc = $ad->description;
                        }
                    @endphp
                    {{ $shortDesc }}
                </p>
            </div>
            <div class="fourth-row d-flex justify-content-between align-items-center">
                <div class="button d-flex align-items-center justify-content-center" style="cursor: pointer;">
                    <p class="button-text">Apliciraj sada</p>
                </div>
                <div class="pricemonth-div d-flex align-items-center justify-content-center">
                    <p>
                        <span class="price">
                            @php
                                $averageSalary = ($ad->min_salary + $ad->max_salary) / 2;
                            @endphp
                            {{ $averageSalary }}€ </span>
                        <span class="month">/
                            {{ $payment[$ad->payment_method] }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
