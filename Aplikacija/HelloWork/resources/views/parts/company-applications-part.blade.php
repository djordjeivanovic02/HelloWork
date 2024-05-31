<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100 d-flex justify-content-between align-items-center">
        <h4>Apliciranja</h4>
        <select name="applicationsSelect" id="applicationsSelect">
            <option value="all" selected>Sva apliciranja</option>
            @foreach ($ads as $ad)
                <option value="{{ $ad->id }}">{{ $ad->title }}</option>
            @endforeach
        </select>
    </div>

    <div id="applications-container">
        <div id="all-applications" class="application-group">
            @if ($allApplications->isEmpty())
                <div class="w-100 d-flex justify-content-center">
                    <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('images/no-found.svg') }}" alt="Not Found">
                        <p class="mt-3">Još uvek nema apliciranja za zadati kriterijum!</p>
                    </div>
                </div>
            @else
                @for ($i = 0; $i < $allApplications->count(); $i += 2)
                    <div class="info-row w-100 d-flex my-2">
                        <div class="row-element d-flex flex-column">
                            @component('parts.company-applications-widget', [
                                'application' => $allApplications[$i],
                            ])
                            @endcomponent
                        </div>
                        @if (isset($allApplications[$i + 1]))
                            <div class="row-element d-flex flex-column">
                                @component('parts.company-applications-widget', [
                                    'application' => $allApplications[$i + 1],
                                ])
                                @endcomponent
                        @endif
                    </div>
        </div>
        @endfor
        @endif
    </div>

    @foreach ($applicationsByAd as $adId => $applications)
        <div id="applications-{{ $adId }}" class="application-group" style="display: none;">
            @if ($applications->isEmpty())
                <div class="w-100 d-flex justify-content-center">
                    <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('images/no-found.svg') }}" alt="Not Found">
                        <p class="mt-3">Još uvek nema apliciranja za zadati kriterijum!</p>
                    </div>
                </div>
            @else
                @for ($i = 0; $i < $applications->count(); $i += 2)
                    <div class="info-row w-100 d-flex my-2">
                        <div class="row-element d-flex flex-column">
                            @component('parts.company-applications-widget', [
                                'application' => $applications[$i],
                            ])
                            @endcomponent
                        </div>
                        @if (isset($applications[$i + 1]))
                            <div class="row-element d-flex flex-column">
                                @component('parts.company-applications-widget', [
                                    'application' => $applications[$i + 1],
                                ])
                                @endcomponent
                            </div>
                        @endif
                    </div>
                @endfor
            @endif
        </div>
    @endforeach
</div>
</div>

<script src="{{ asset('js/company/applications-controller.js') }}"></script>
