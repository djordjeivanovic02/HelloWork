<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Upravljaj poslovima</h4>
    </div>
    <div class="manage-jobs-container w-100 my-3">
        @if ($ads != null && count($ads) != 0)
            <table class="w-100">
                <thead class="w-100">
                    <tr class="w-100 p-4">
                        <th><input type="checkbox" name="selectAll" id="selectAll"></th>
                        <th>Naslov posla</th>
                        <th class="aplications-column">Apliciranja</th>
                        <th class="status-column">Status</th>
                        <th>Opcije</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($ads != null && count($ads) !== 0)
                        @foreach ($ads as $ad)
                            @component('parts.manage-jobs-row', [
                                'id' => $ad->id,
                                'title' => $ad->title,
                                'city' => $ad->address,
                                'country' => '',
                                'workTime' => $ad->job_type,
                                'applications' => $ad->applications_count,
                                'status' => $ad->skills,
                                'experience' => $ad->experience,
                                'description' => $ad->description,
                            ])
                            @endcomponent
                        @endforeach
                    @else
                    @endif


                </tbody>
            </table>
        @else
            <div class="w-100 d-flex justify-content-center">
                <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{ asset('images/no-found.svg') }}" alt="Not Found">
                    <p class="mt-3">Nemate još nijedan oglas. Dodajte svoj prvi oglas klikom na karticu <b>Dodaj novi
                            oglas</b> koji
                        ćete
                        nakon dodavanja moći da vidite ovde.</p>
                </div>
            </div>
        @endif
    </div>
</div>
