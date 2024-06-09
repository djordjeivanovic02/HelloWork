@extends('parts.admin-dashboard-main')

@section('for-check')
    <link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
    <link rel="stylesheet" href="{{ asset('css/widgets.css') }}">
    <div class="dash-content">
        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Najnoviji oglasi koji čekaju proveru</span>
            </div>
            <div class="activity-data d-block">
                @if ($newestAdsForCheck && count($newestAdsForCheck) != 0)
                    @foreach ($newestAdsForCheck as $item)
                        <div class="d-inline-block m-2" style="width: 28%; max-width: 400px; min-width: 300px">
                            @component('parts.admin-ads-widget', [
                                'type' => 'newestAdsForCheck',
                                'ad' => $item,
                            ])
                            @endcomponent
                        </div>
                    @endforeach
                @else
                    <div class="d-flex flex-column m-2 justify-content-center align-items-center"
                        style="width: 28%; max-width: 400px; min-width: 300px; background-color: #ebf1f85f; padding: 20px">
                        <img src="{{ asset('images/no-found.svg') }}" alt="Nije pronadjeno" class="w-25">
                        <p class="my-3">Nije pronađen nijedan oglas</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three accepted"></i>
                <span class="text">Najskorije prihvaćeni oglasi</span>
            </div>
            <div class="activity-data d-block">
                @if ($newestAdsAccepted && count($newestAdsAccepted) != 0)
                    @foreach ($newestAdsAccepted as $item)
                        <div class="d-inline-block m-2" style="width: 28%; max-width: 400px; min-width: 300px">
                            @component('parts.admin-ads-widget', [
                                'type' => 'newestAdsAccepted',
                                'ad' => $item,
                            ])
                            @endcomponent
                        </div>
                    @endforeach
                @else
                    <div class="d-flex flex-column m-2 justify-content-center align-items-center"
                        style="width: 28%; max-width: 400px; min-width: 300px; background-color: #ebf1f85f; padding: 20px">
                        <img src="{{ asset('images/no-found.svg') }}" alt="Nije pronadjeno" class="w-25">
                        <p class="my-3">Nije pronađen nijedan oglas</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three rejected"></i>
                <span class="text">Najskorije odbijeni oglasi</span>
            </div>
            <div class="activity-data d-block">
                @if ($newestAdsRejected && count($newestAdsRejected) != 0)
                    @foreach ($newestAdsRejected as $item)
                        <div class="d-inline-block m-2" style="width: 28%; max-width: 400px; min-width: 300px">
                            @component('parts.admin-ads-widget', [
                                'type' => 'newestAdsRejected',
                                'ad' => $item,
                            ])
                            @endcomponent
                        </div>
                    @endforeach
                @else
                    <div class="d-flex flex-column m-2 justify-content-center align-items-center"
                        style="width: 28%; max-width: 400px; min-width: 300px; background-color: #ebf1f85f; padding: 20px">
                        <img src="{{ asset('images/no-found.svg') }}" alt="Nije pronadjeno" class="w-25">
                        <p class="my-3">Nije pronađen nijedan oglas</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </section>
    <script src="{{ asset('js/admin/admin-controll.js') }}"></script>
@endsection
