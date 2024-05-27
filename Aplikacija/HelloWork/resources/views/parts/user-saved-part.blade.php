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

                @if ($savedAds != null)
                    @foreach ($savedAds as $item)
                        @php
                            $companyInfo = json_decode($item->companyInfo, true);
                        @endphp
                        @component('parts.manage-saved-ads', [
                            'id' => $item->ad->id,
                            'folderId' => $item->ad->user_id,
                            'image' => $companyInfo[0]['logo'],
                            'title' => $item->ad->title,
                            'companyName' => $item->ad->users->name,
                            'date' => $item->save_date,
                        ])
                        @endcomponent
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/user/delete-saved-ad.js') }}"></script>
