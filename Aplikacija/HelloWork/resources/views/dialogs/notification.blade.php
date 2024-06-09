<link rel="stylesheet" href="{{ asset('css/dialogs.css') }}">
<div class="dialog-background w-100 h-100 fixed-top" id="{{ $id }}_background"
    onclick="closeDialog('{{ $id }}')">
    <div class="dialog-box bg-white w-100 position-relative" role="alert" id="{{ $id }}_main">
        @if ($close)
            <button type="button" class="btn-close dialog-close position-absolute" aria-label="Close"
                onclick="closeDialog('{{ $id }}')"></button>
        @endif
        <p class="title m-0 mb-2">{{ $title }}</p>
        <p>{{ $message }}</p>
        <hr>
        @if (!empty($actions))
            <div class="w-100 d-flex flex-row-reverse my-2">
                @foreach ($actions as $action)
                    <a href="javascript:void(0);" onclick="{{ $action['url'] }}"
                        class="dialog-btn dialog-btn-{{ $action['type'] }}">{{ $action['label'] }}</a>
                @endforeach
            </div>
        @endif
    </div>
</div>
