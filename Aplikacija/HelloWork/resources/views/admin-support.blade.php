@extends('parts.admin-dashboard-main')
@section('support')
    <link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
    <div class="dash-content">
        <div class="activity">
            <div class="title">
                <i class="uil uil-user"></i>
                <span class="text">Poruke za podršku</span>
            </div>
            <div class="activity-data manage-jobs-container">
                <table class="w-100">
                    <thead class="w-100">
                        <tr class="w-100 p-4">
                            <th>Ime</th>
                            <th>Email</th>
                            <th>Poruka</th>
                            <th>Vreme</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($messages && count($messages) != 0)
                            @include('parts.admin-support-list', ['messages' => $messages])
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
    <script src="{{ asset('js/delete-profile.js') }}"></script>
@endsection
