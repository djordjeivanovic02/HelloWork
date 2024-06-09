@extends('parts.admin-dashboard-main')

@section('all-ads')
    <link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/widgets.css') }}">
    <div class="dash-content">
        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Svi oglasi</span>
            </div>
            <div class="d-block">
                @if ($ads && count($ads) != 0)
                    @include('parts.admin-ads-list', ['ads' => $ads])
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
