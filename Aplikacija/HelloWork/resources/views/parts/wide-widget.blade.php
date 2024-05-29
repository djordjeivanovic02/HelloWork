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
@endphp
<div class="long-container d-flex flex-column">
    <div class="prvi-red d-flex justify-content-between align-items-start">
        <div class="d-flex">
            <div class="image-div">
                @if ($image != null)
                    <img src="{{ asset('storage/uploads/ads/' . $image) }}">
                @else
                    <img src="{{ asset('storage/uploads/company_' . $companyID . '/logo/' . $companyImage) }}"></img>
                @endif
            </div>
            <div class="wide-widget d-flex flex-column mx-3 my-0">
                <h2 class="above-text"><a href="http://127.0.0.1:8000/job/{{ $jobId }}">{{ $title }}</a>
                </h2>
                <div class="all-informations flex-row">
                    <img src="/images/Aktovka.svg"><span class="text-in-span">{{ $categories[$category] }}</span>
                    <img src="/images/Lokacija.svg"><span class="text-in-span">{{ $city }},
                        {{ $country }}</span>
                    <img src="/images/Sat.svg"><span class="text-in-span">
                        @php
                            $date = new DateTime($created_at);
                            $formatedDate = $date->format('j.n.Y');
                        @endphp
                        {{ $formatedDate }}
                    </span>
                    <img class="last-info" src="/images/Zarada.svg"><span class="text-in-span last-info">
                        €{{ $min_salary }} -
                        €{{ $max_salary }}</span>
                </div>
            </div>
        </div>
        <div @if ($saved) class="save-it-div active d-flex justify-content-center align-items-center"
            @else
            class="save-it-div d-flex justify-content-center align-items-center" @endif
            @if (auth()->user()) onclick="saveJob({{ $jobId }}, this)" @endif>
            <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12.0714 0H0.928571C0.682299 0 0.446113 0.0790165 0.271972 0.219667C0.0978315 0.360317 2.01065e-09 0.55108 2.01065e-09 0.74999V14.2498C-1.16771e-05 14.3932 0.0508567 14.5335 0.146579 14.6543C0.242301 14.775 0.378866 14.8711 0.540094 14.9311C0.701323 14.991 0.88046 15.0124 1.05628 14.9927C1.23211 14.973 1.39725 14.913 1.53214 14.8198L6.5 11.4523L11.4121 14.7823C11.4989 14.8518 11.6018 14.9068 11.7149 14.9441C11.8281 14.9814 11.9492 15.0004 12.0714 14.9998C12.1932 15.0023 12.3141 14.9818 12.4243 14.9398C12.5939 14.8835 12.739 14.788 12.8415 14.6652C12.9439 14.5424 12.9991 14.3979 13 14.2498V0.74999C13 0.55108 12.9022 0.360317 12.728 0.219667C12.5539 0.0790165 12.3177 0 12.0714 0ZM11.1429 12.6448L7.09429 9.89986C6.92743 9.78761 6.71715 9.72615 6.5 9.72615C6.28285 9.72615 6.07257 9.78761 5.90571 9.89986L1.85714 12.6448V1.49998H11.1429V12.6448Z" />
            </svg>

        </div>
    </div>

    <div class="widget-types">
        @php
            $tagsArray = explode('&', $tags);
        @endphp
        @foreach ($tagsArray as $item)
            <div class="d-inline-block">
                <div class="down-button d-flex align-items-center justify-content-center">
                    <p class="down-button-text m-0">{{ $item }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/save-ad.js') }}"></script>
