<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Promena lozinke</h4>
    </div>
    <div class="notification w-100">
        <p class="m-0 p-0">Uspešno promenjena lozinka</p>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element w-100 d-flex flex-column mt-4">
            <p class="my-1">Stara lozinka*</p>
            <input type="password" name="oldPassword" id="oldPassword" class="w-100">
    </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Nova lozinka*</p>
            <input type="password" name="newPassword" id="newPassword" class="w-100">
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Potvrdite novu lozinku*</p>
            <input type="password" name="repeatedPassword" id="repeatedPassword" class="w-100">
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <button class="my-4 change-password" onclick="changePassword()">Promeni lozinku</button>
    </div>
</div>
<script src="{{ asset('js/change-password.js') }}"></script>