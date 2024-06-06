@foreach ($ads as $item)
    <div id="one-ad-{{ $item->id }}" class="m-2"
        style="display: inline-block; width: 28%; max-width: 400px; min-width: 300px">
        @component('parts.admin-ads-widget', [
            'type' => 'adminTest',
            'ad' => $item,
        ])
        @endcomponent
    </div>
@endforeach
<div class="pagination">
    {{ $ads->links('vendor.pagination.custom') }}
</div>
