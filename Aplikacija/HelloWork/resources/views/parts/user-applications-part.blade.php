<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100 d-flex justify-content-between align-items-center">
        <h4>Moja apliciranja</h4>
        <select name="applicationsSelect" id="aplicationsSelect">
            <option value="1" selected>Sva apliciranja</option>
            <option value="2">Prihvaćena</option>
            <option value="3">Odbijena</option>
            <option value="4">Aktivna</option>
        </select>
    </div>
    <div class="all-applications active">
        @if ($applications && count($applications) > 0)
            @foreach ($applications as $item)
                <div class="info-row w-100 my-2" id="appl-cont-{{ $item->ad_id }}">
                    <div class="row-element w-100 d-flex flex-column">
                        @component('parts.user-applications-widget', ['appl' => $item])
                        @endcomponent
                    </div>
                </div>
            @endforeach
        @else
            <div class="w-100 d-flex justify-content-center">
                <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('images/no-applications.svg') }}" alt="Not Found">
                    <p class="mt-3">Još uvek niste aplicirali ni za jedan posao. Nakon što aplicirate za neki posao,
                        videćete apliciranje ovde</p>
                </div>
            </div>
        @endif
    </div>
    <div class="accepted-applications">
        @if ($accepted && count($accepted) > 0)
            @foreach ($accepted as $item)
                <div class="info-row w-100 my-2" id="appl-cont-{{ $item->ad_id }}">
                    <div class="row-element w-100 d-flex flex-column">
                        @component('parts.user-applications-widget', ['appl' => $item])
                        @endcomponent
                    </div>
                </div>
            @endforeach
        @else
            <div class="w-100 d-flex justify-content-center">
                <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('images/no-applications.svg') }}" alt="Not Found">
                    <p class="mt-3">Još uvek nemate prihvaćena apliciranja. Nakon što poslodavac prihvati apliciranje,
                        biće vidljivo ovde</p>
                </div>
            </div>
        @endif
    </div>
    <div class="rejected-applications">
        @if ($rejected && count($rejected) > 0)
            @foreach ($rejected as $item)
                <div class="info-row w-100 my-2" id="appl-cont-{{ $item->ad_id }}">
                    <div class="row-element w-100 d-flex flex-column">
                        @component('parts.user-applications-widget', ['appl' => $item])
                        @endcomponent
                    </div>
                </div>
            @endforeach
        @else
            <div class="w-100 d-flex justify-content-center">
                <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('images/no-applications.svg') }}" alt="Not Found">
                    <p class="mt-3">Još uvek nemate odbijena apliciranja.</p>
                </div>
            </div>
        @endif
    </div>
    <div class="active-applications">
        @if ($active && count($active) > 0)
            @foreach ($active as $item)
                <div class="info-row w-100 my-2" id="appl-cont-{{ $item->ad_id }}_2">
                    <div class="row-element w-100 d-flex flex-column">
                        @component('parts.user-applications-widget', ['appl' => $item, 'second' => true])
                        @endcomponent
                    </div>
                </div>
            @endforeach
        @else
            <div class="w-100 d-flex justify-content-center">
                <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('images/no-applications.svg') }}" alt="Not Found">
                    <p class="mt-3">Još uvek niste aplicirali ni za jedan posao. Nakon što aplicirate za neki posao,
                        videćete apliciranje ovde</p>
                </div>
            </div>
        @endif
    </div>
</div>

<script src="{{ asset('js/user/applications-control.js') }}"></script>
