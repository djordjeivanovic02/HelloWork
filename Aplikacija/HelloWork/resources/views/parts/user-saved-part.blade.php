<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Sačuvani poslovi</h4>
    </div>
    <div class="manage-jobs-container w-100 my-3">
        <table class="w-100">
            <thead class="w-100">
                <tr class="w-100 p-4">
                    <th></th>
                    <th>Naslov oglasa</th>
                    <th class="aplications-column">Poslodavac</th>
                    <th class="status-column">Datum</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @component('parts.manage-saved-ads', [
                    'title' => 'PHP Developer',
                    'companyName' => 'Udemy',
                    'date' => '10. januar 2024.'
                ])@endcomponent
                @component('parts.manage-saved-ads', [
                    'title' => 'PHP Developer',
                    'companyName' => 'Udemy',
                    'date' => '10. januar 2024.'
                ])@endcomponent
                @component('parts.manage-saved-ads', [
                    'title' => 'PHP Developer',
                    'companyName' => 'Udemy',
                    'date' => '10. januar 2024.'
                ])@endcomponent
            </tbody>
        </table>
    </div>
</div>