@if ($ads != null && count($ads) != 0)
    @foreach ($ads as $item)
        @component('parts.wide-widget', [
            'saved' => false,
            'image' => $item->image,
            'jobId' => $item->id,
            'companyID' => $item->users->id,
            'companyImage' => $item->users->companyInfo->logo,
            'title' => $item->title,
            'category' => $item->job_category,
            'city' => $item->users->companyInfo->city,
            'country' => $item->users->companyInfo->country,
            'created_at' => $item->created_at,
            'min_salary' => $item->min_salary,
            'max_salary' => $item->max_salary,
            'tags' => $item->tabs,
        ])
        @endcomponent
    @endforeach

    <div class="pagination">
        {{ $ads->links('vendor.pagination.custom') }}
    </div>
@endif
