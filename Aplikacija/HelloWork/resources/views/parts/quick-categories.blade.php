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
@for ($i = 2; $i < 10; $i++)
    @php
        $url = '/searchjob?jobCategory=' . $i;
    @endphp
    <div class="categories-container d-inline-block p-2">
        <div class="spoljni-container position-relative d-flex flex-column align-items-center justify-content-center">
            <div class="second-hover-indicator top-0 h-100 position-absolute"></div>
            <div class="spoljni-main position-absolute">
                <p class="gornji-text"> {{ $categories[$i] }}</p>
                <a href="{{ $url }}">
                    <p class="donji-text mb-0"> Pogledaj najnovije poslove </p>
                </a>
            </div>
        </div>
    </div>
@endfor
