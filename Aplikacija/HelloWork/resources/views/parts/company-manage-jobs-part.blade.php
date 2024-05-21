<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Upravljaj poslovima</h4>
    </div>
    <div class="manage-jobs-container w-100 my-3">
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
                @component('parts.manage-jobs-row', [
                    'title' => 'PHP Developer',
                    'city' => 'Beograd',
                    'country' => 'Srbija',
                    'workTime' => 'Puno radno vreme',
                    'applications' => 5,
                    'status' => 'Aktivan'
                ])@endcomponent

                @component('parts.manage-jobs-row', [
                    'title' => 'Junior React Dizajner',
                    'city' => 'Niš',
                    'country' => 'Srbija',
                    'workTime' => 'Nepuno radno vreme',
                    'applications' => 20,
                    'status' => 'Istekao'
                ])@endcomponent

                @component('parts.manage-jobs-row', [
                    'title' => 'PHP Developer',
                    'city' => 'Beograd',
                    'country' => 'Srbija',
                    'workTime' => 'Puno radno vreme',
                    'applications' => 5,
                    'status' => 'Aktivan'
                ])@endcomponent

                @component('parts.manage-jobs-row', [
                    'title' => 'Junior React Dizajner',
                    'city' => 'Niš',
                    'country' => 'Srbija',
                    'workTime' => 'Nepuno radno vreme',
                    'applications' => 20,
                    'status' => 'Čeka na proveru'
                ])@endcomponent
            </tbody>
        </table>
    </div>
</div>