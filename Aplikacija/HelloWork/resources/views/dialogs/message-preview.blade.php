<link rel="stylesheet" href="{{ asset('css/dialogs.css') }}">
<div class="quick-preview-background w-100 h-100 fixed-top" id="quick_preview_{{ $id }}_background"
    onclick="closeDialog('quick_preview_{{ $id }}')">
    <div class="quick-preview-box bg-white w-100 position-relative" role="alert"
        id="quick_preview_{{ $id }}_main">
        <div class="quick-preview-header w-100 d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                <h3 class="mx-2 my-0">Hello <span>Work</span></h3>
            </div>
            <div class="quick-close position-relative" onclick="closeDialog('quick_preview_{{ $id }}')">
            </div>
        </div>
        <div class="quick-main-cont">
            <div class="row">
                <div class="name-cl col-4">
                    <p>Ime: </p>
                </div>
                <div class="info-cl col-8">
                    <p>{{ $name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="name-cl col-4">
                    <p>Email: </p>
                </div>
                <div class="info-cl col-8">
                    {{ $email }}
                </div>
            </div>
            <div class="row">
                <div class="name-cl col-4">
                    <p>Poruka: </p>
                </div>
                <div class="info-cl col-8">
                    {{ $message }}
                </div>
            </div>
            <div class="row mt-3">
                <div class="name-cl col-4">
                    <p>Vreme: </p>
                </div>
                <div class="info-cl col-8">
                    {{ $time }}
                </div>
            </div>
        </div>
        <div class="quick-preview-footer w-100 d-flex justify-content-end align-items-center">
            <button onclick="closeDialog('quick_preview_{{ $id }}')">Zatvori</button>
        </div>
    </div>
</div>
