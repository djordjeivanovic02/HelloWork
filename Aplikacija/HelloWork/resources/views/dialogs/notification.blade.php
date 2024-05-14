<link rel="stylesheet" href="{{ asset('css/dialogs.css') }}">
<div class="dialog-background w-100 h-100 fixed-top">
    <div class="dialog-box bg-white w-100 position-relative" role="alert">
        @if ($close)
            <button type="button" class="btn-close dialog-close position-absolute" data-bs-dismiss="alert" aria-label="Close" onclick="closeDialog()"></button>
        @endif
        <p class="title m-0 mb-2">{{ $title }}</p> {{ $message }}
        <hr>
        @if (!empty($actions))
            <div class="w-100 d-flex flex-row-reverse my-2">
                @foreach ($actions as $action)
                    <a onclick="{{ $action['url'] }}" class="dialog-btn dialog-btn-{{ $action['type'] }}">{{ $action['label'] }}</a>
                @endforeach
            </div>
        @endif
    </div>
</div>
