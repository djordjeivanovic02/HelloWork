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

    $workDuration = [
        1 => 'Puno radno vreme',
        2 => 'Nepuno radno vreme',
    ];
@endphp
<div @if ($type == 'newestAdsAccepted') class="submitted application-container p-4 w-100" @endif
    @if ($type == 'newestAdsRejected') class="rejected application-container p-4 w-100" @endif
    @if ($type == 'newestAdsForCheck' || $type == 'adminTest') class="application-container p-4 w-100" @endif>
    {{-- id="application-containter-{{ $application->ad_id }}-{{ $application->user_id }}"> --}}
    <p class="application-name m-0"><a href="/job/{{ $ad->id }}">

            @php
                $newTitle = $ad->title;
                if (strlen($ad->title) > 15) {
                    $newTitle = Str::substr($ad->title, 0, 15) . '...';
                }
            @endphp
            {{ $newTitle }}</a></p>
    <a href="" class="my-1 application-category">{{ $categories[$ad->job_category] }}</a>
    <a href="/company/{{ $ad->user_id }}" class="my-1 d-inline-block application-job">({{ $ad->users->name }})</a>
    <div class="row-images w-100 my-2 mb-3">
        <div>
            <svg class="d-inline-block" width="20" height="21" viewBox="0 0 20 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_37_514)">
                    <path
                        d="M16.875 8.5C16.875 4.70313 13.7969 1.625 10 1.625C6.20313 1.625 3.125 4.70313 3.125 8.5C3.125 13.5 10 20.375 10 20.375C10 20.375 16.875 13.5 16.875 8.5Z"
                        stroke="#7F93B6" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round" />
                    <path
                        d="M10 11C11.3807 11 12.5 9.88071 12.5 8.5C12.5 7.11929 11.3807 6 10 6C8.61929 6 7.5 7.11929 7.5 8.5C7.5 9.88071 8.61929 11 10 11Z"
                        stroke="#7F93B6" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round" />
                </g>
                <defs>
                    <clipPath id="clip0_37_514">
                        <rect width="20" height="21" fill="transparent" />
                    </clipPath>
                </defs>
            </svg>
            <p class="row-info m-0 d-inline-block" style="color: #7F93B6">{{ $ad->users->companyInfo->city }},
                {{ $ad->users->companyInfo->country }}</p>

            <svg viewBox="0 0 24 14.92" xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px">
                <title />
                <g data-name="Camada 2" id="Camada_2">
                    <g data-name="Camada 1" id="Camada_1-2">
                        <path
                            d="M23.5,4H22V2.5a.5.5,0,0,0-.5-.5H20V.5a.5.5,0,0,0-.5-.5H.5A.5.5,0,0,0,0,.5v9.91a.5.5,0,0,0,.5.5H2v1.5a.5.5,0,0,0,.5.5H4v1.5a.5.5,0,0,0,.5.5h19a.5.5,0,0,0,.5-.5V4.5A.5.5,0,0,0,23.5,4ZM15.8,9.91H4.2A3.74,3.74,0,0,0,1,6.71V4.2A3.74,3.74,0,0,0,4.2,1H15.8A3.74,3.74,0,0,0,19,4.2V6.71A3.74,3.74,0,0,0,15.8,9.91ZM19,7.71V9.91H16.79A2.76,2.76,0,0,1,19,7.71ZM19,1V3.21A2.76,2.76,0,0,1,16.79,1ZM1,1H3.21A2.76,2.76,0,0,1,1,3.21ZM1,7.71A2.76,2.76,0,0,1,3.21,9.91H1Zm2,3.21H19.5a.5.5,0,0,0,.5-.5V3h1v8.91H3Zm20,3H5v-1H21.5a.5.5,0,0,0,.5-.5V5h1Z"
                            fill="#7F93B6" />
                        <path
                            d="M10,2.06a3.39,3.39,0,1,0,3.39,3.39A3.4,3.4,0,0,0,10,2.06Zm0,5.78a2.39,2.39,0,1,1,2.39-2.39A2.39,2.39,0,0,1,10,7.85Z"
                            fill="#7F93B6" />
                    </g>
                </g>
            </svg>
            <p class="row-info m-0 d-inline-block" style="color: #7F93B6">
                {{ $ad->min_salary }}€ - {{ $ad->max_salary }}€</p>
        </div>
    </div>
    @php
        $tags = explode('&', $ad->tabs);
    @endphp
    @foreach ($tags as $index => $item)
        @if ($index < 3)
            <div class="application-skill d-inline-block ml-2">
                <p class="m-0">{{ $item }}</p>
            </div>
        @else
        @break
    @endif
@endforeach

<div class="w-100 d-flex justify-content-end align-items-center mt-4">
    @if ($type == 'newestAdsForCheck')
        <div class="d-flex">
            <div class="action-button submit d-flex align-items-center justify-content-center"
                onclick="approveAd('{{ $ad->id }}')">
                <img src="{{ asset('images/submitted.svg') }}" alt="Prihvati">
                <p>Prihvati</p>
            </div>
            <div class="action-button reject d-flex align-items-center justify-content-center"
                onclick="rejectAd('{{ $ad->id }}')">
                <img src="{{ asset('images/rejected.svg') }}" alt="Prihvati">
                <p>Odbij</p>
            </div>
        </div>
    @endif

    @if ($type == 'adminTest')
        <div class="action-button reject d-flex align-items-center justify-content-center"
            onclick="showDialog('delete-ad-{{ $ad->id }}')">
            <img src="{{ asset('images/rejected.svg') }}" alt="Prihvati">
            <p>Obriši oglas</p>
        </div>
    @endif
    {{-- <div class="small-actions d-flex">
            <div class="action-button  d-flex align-items-center justify-content-center" onclick="returnApplication()">
                <p class="m-0">Otkaži</p>
            </div>
        </div> --}}
</div>

</div>

@component('dialogs.notification', [
    'id' => 'delete-ad-' . $ad->id,
    'type' => 'success',
    'title' => 'Brisanje oglasa',
    'message' => 'Da li ste sigurni da želite da obrisete oglas ' . $ad->title . '?',
    'close' => true,
    'actions' => [
        [
            'url' => 'deleteJobAdmin(' . $ad->id . ', true)',
            'type' => 'yes',
            'label' => 'DA, OBRIŠI',
        ],
        [
            'url' => "closeDialog('delete-ad-'" . $ad->id . ')',
            'type' => 'cancel',
            'label' => 'Otkaži',
        ],
    ],
])
@endcomponent
<script src="{{ asset('js/dialogs/actions.js') }}"></script>
<script src="{{ asset('js/company/delete-job.js') }}"></script>
<script src="{{ asset('js/user/cv-actions.js') }}"></script>
<script src="{{ asset('js/user/apply-for-job.js') }}"></script>
