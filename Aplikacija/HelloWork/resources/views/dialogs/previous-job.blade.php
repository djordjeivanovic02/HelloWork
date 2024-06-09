<link rel="stylesheet" href="{{ asset('css/dialogs.css') }}">
<div class="quick-preview-background w-100 h-100 fixed-top" id="previous_background" onclick="closeDialog('previous')">
    <div class="quick-preview-box bg-white w-100 position-relative" role="alert" id="previous_main">
        <div class="quick-preview-header w-100 d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo">
                <h3 class="mx-2 my-0">Hello <span>Work</span></h3>
            </div>
            <div class="quick-close position-relative" onclick="closeDialog('previous')">
            </div>
        </div>
        <div class="quick-main-cont d-flex flex-column align-items-center">
            <div>

                <div class="row">
                    <div class="name-cl col-4">
                        <p>Ime posla: </p>
                    </div>
                    <div class="info-cl col-8">
                        <input type="text" name="title" id="previous-title">
                    </div>
                </div>
                <div class="row">
                    <div class="name-cl col-4">
                        <p>Poslodavac: </p>
                    </div>
                    <div class="info-cl col-8">
                        <input type="text" name="company" id="previous-company">
                    </div>
                </div>
                <div class="row">
                    <div class="name-cl col-4">
                        <p>Početak: </p>
                    </div>
                    <div class="info-cl col-8">
                        <input type="text" name="startYear" id="previous-start">
                    </div>
                </div>
                <div class="row">
                    <div class="name-cl col-4">
                        <p>Kraj: </p>
                    </div>
                    <div class="info-cl col-8">
                        <input type="text" name="endYear" id="previous-end">
                    </div>
                </div>
            </div>
        </div>
        <div class="quick-preview-footer w-100 d-flex justify-content-end align-items-center">
            <button onclick="closeDialog('previous')">Zatvori</button>
            <button onclick="addPrevious()" class="add-previous" style="background-color: #613FE5">Dodaj</button>
        </div>
    </div>
</div>

<script src="{{ asset('js/user/add-previous.js') }}"></script>
