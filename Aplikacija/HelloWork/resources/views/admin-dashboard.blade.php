@extends('parts.admin-dashboard-main')

@section('dashboard')
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Kontrolna tabla</span>
            </div>

            <div class="boxes">
                <div class="box box1">
                    <i class="uil uil-newspaper"></i>
                    <span class="text">Ukupno oglasa</span>
                    <span class="number">{{ $adsCount }}</span>
                </div>
                <div class="box box2">
                    <i class="uil uil-file-check"></i>
                    <span class="text">Ukupno apliciranja</span>
                    <span class="number">{{ $applicationsCount }}</span>
                </div>
                <div class="box box3">
                    <i class="uil uil-user"></i>
                    <span class="text">Ukupno korisnika</span>
                    <span class="number">{{ $usersCount }}</span>
                </div>
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Najnovije aktivnosti</span>
            </div>
            <div class="activity-data">
                <div class="data names">
                    <span class="data-title">Tip</span>
                    @foreach ($activities as $item)
                        @if ($item->activity_type != null)
                            <span class="data-list">
                                @switch($item->activity_type)
                                    @case('created_ad')
                                        Novi oglas
                                    @break

                                    @case('register')
                                        Registracija
                                    @break

                                    @case('apply')
                                        Apliciranje
                                    @break

                                    @case('cancel-apply')
                                        Otkazano apliciranje
                                    @break

                                    @default
                                @endswitch
                            </span>
                        @else
                            <span class="data-list"><i>Nepoznato</i></span>
                        @endif
                    @endforeach
                </div>
                <div class="data email">
                    <span class="data-title">Email</span>
                    @foreach ($activities as $item)
                        @if ($item->user->email != null)
                            <span class="data-list">{{ $item->user->email }}</span>
                        @else
                            <span class="data-list"><i>Nepoznato</i></span>
                        @endif
                    @endforeach
                </div>
                <div class="data joined">
                    <span class="data-title">Poruka</span>
                    @foreach ($activities as $item)
                        @if ($item->description != null)
                            <span class="data-list">{{ $item->description }}</span>
                        @else
                            <span class="data-list"><i>Nepoznato</i></span>
                        @endif
                    @endforeach
                </div>
                <div class="data joined">
                    <span class="data-title">Vreme</span>
                    @foreach ($activities as $item)
                        @php
                            $timestamp = strtotime($item->created_at);
                        @endphp
                        <span class="data-list">{{ date('H:i:s', $timestamp) }}</span>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    </section>
@endsection
