<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100 d-flex justify-content-between align-items-center">
        <h4>Apliciranja</h4>
        <select name="applicationsSelect" id="aplicationsSelect">
            <option value="1" selected>Sva apliciranja</option>
            <option value="2">Prihvaćena</option>
            <option value="3">Odbijena</option>
            <option value="4">Aktivna</option>
        </select>
    </div>
    @if ($appliedAds)
        @for ($i = 0; $i < $appliedAds->count(); $i += 2)
            <div class="info-row w-100 d-flex my-2">
                <div class="row-element d-flex flex-column">
                    @component('parts.company-applications-widget', [
                        'application' => $appliedAds[$i],
                    ])
                    @endcomponent
                </div>
                @if (isset($appliedAds[$i + 1]))
                    <div class="row-element d-flex flex-column">
                        @component('parts.company-applications-widget', [
                            'application' => $appliedAds[$i + 1],
                        ])
                        @endcomponent
                    </div>
                @endif
            </div>
        @endfor
    @else
        Nema apliciranja
    @endif

</div>
