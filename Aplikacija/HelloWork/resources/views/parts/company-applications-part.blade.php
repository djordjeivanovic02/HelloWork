<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Promena lozinke</h4>
    </div>

    @if ($applications)
        @php
            // print_r($applications);
        @endphp
        @for ($i = 0; $i < $applications->count(); $i += 2)
            <div class="info-row w-100 d-flex my-2">
                <div class="row-element d-flex flex-column">
                    {{-- @include('parts.company-applications-widget', ['item' => $applications[$i]]) --}}
                    @include('parts.company-applications-widget')
                </div>
                @if (isset($applications[$i + 1]))
                    <div class="row-element d-flex flex-column">
                        @include('parts.company-applications-widget')
                    </div>
                @endif
            </div>
        @endfor
    @else
        Nema apliciranja
    @endif

</div>
