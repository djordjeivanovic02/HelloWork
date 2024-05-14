<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Osnovne informacije</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Ime kompanije*</p>
            <input type="text" name="companyName" id="companyName" class="w-100" placeholder="Unesite ime kompanije" onchange="focusOut(this)"
                value="{{ $user->name }}">
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Velicina*</p>
            <input type="text" name="companySize" id="companySize" class="w-100" placeholder="npr. 120"
                value="{{ $user->companyInfo->size }}">
        </div>
    </div>
    {{-- @php
        print_r($user->userInfo->expected_salary);
    @endphp --}}
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Websajt*</p>
            <input type="text" name="companyWebsite" id="companyWebsite" class="w-100" placeholder="Unesite websajt kompanije" onchange="focusOut(this)"
                value="{{ $user->companyInfo->website }}">
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Datum osnivanja*</p>
            <input type="text" name="companyFounded" id="companyFounded" class="w-100" placeholder="npr. 16/09/2018"
                value="{{ date("d/m/Y", strtotime($user->companyInfo->start_date ))}}">
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Kategorija*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="companyCategorycompanyCountry" id="companyCategorycompanyCountry" 
                value="{{ $user->companyInfo->category }}">
                <option value="0" selected disabled>IT</option>
                <option value="1">Trgovina</option>
                <option value="2">Industrija</option>
            </select>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Zemlja*</p>
            <input type="text" name="companyCountry" id="companyCountry" class="w-100" placeholder="npr. Srbija"
                value="{{ $user->companyInfo->country }}">
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="d-flex flex-column w-100">
            <p class="my-1">Opis*</p>
            <textarea name="companyDescription" id="companyDescription" class="w-100" placeholder="Unesite opis kompanije">
                {{ $user->companyInfo->about }}
            </textarea>
        </div>
    </div>

    <div class="section-info w-100 mt-3">
        <h4>Kontakt informacije</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Broj Telefona*</p>
                <input type="text" name="companyNumber" id="companyNumber" class="w-100" placeholder="+381 61...." onchange="focusOut(this)"
                    value="{{ $user->companyInfo->contact }}">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Email adresa*</p>
                <input type="text" name="companyEmailcompanyCity" id="companyEmailcompanyCity" class="w-100" placeholder="npr. kompanija@gmail.com"
                    value="{{ $user->email }}">
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Grad*</p>
                <input type="text" name="companyCity" id="companyCity" class="w-100" placeholder="npr. Kragujevac" onchange="focusOut(this)"
                value="{{ $user->companyInfo->city }}">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Adresa*</p>
                <input type="text" name="companyAddress" id="companyAddress" class="w-100" placeholder="npr. Njegoseva 5"
                value="{{ $user->companyInfo->address }}">
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2868.8055350156697!2d21.901872415496903!3d43.31938787913275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4758a7351744766d%3A0x5e22478f34d9fc38!2sStara%20%C5%BEelezni%C4%8Dka%20kompanija!5e0!3m2!1sen!2srs!4v1650110632487!5m2!1sen!2srs" width="600" height="450" style="border:0; height: 300px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="job-map w-100 my-3"></iframe>
    </div>
    <div class="section-info w-100 mt-3">
        <h4>Društvene mreže</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Facebook</p>
                <input type="text" name="companyFacebook" id="companyFacebook" class="w-100" placeholder="www.facebook.com/..." onchange="focusOut(this)">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Instagram</p>
                <input type="text" name="companyInstagram" id="companyInstagram" class="w-100" placeholder="www.isntagram.com/...">
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Threads</p>
                <input type="text" name="companyThreads" id="companyThreads" class="w-100" placeholder="www.threads.com/..." onchange="focusOut(this)">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">LinkedIn</p>
                <input type="text" name="companyLinkedin" id="companyLinkedin" class="w-100" placeholder="www.linkedin.com/...">
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex flex-column align-items-start">
        <button class="my-4 add-ad">Ažuriraj podatke</button>
    </div>
    <div class="section-info w-100 mt-3">
        <h4>Ostale akcije</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <button class="my-4 add-ad" style="background-color: red; border-color: red" onclick="showDialog()">Obrišite nalog</button>
    </div>
</div>


@component('dialogs.notification', 
    [
        'type' => 'success', 
        'title' => 'Brisanje naloga', 
        'message' => 'Da li ste sigurni da želite da obrišete nalog?',
        'close' => true,
        'actions' => [
            [
                'url' => '', 
                'type' => 'yes', 
                'label' => 'DA'
            ],
            [
                'url' => 'closeDialog()', 
                'type' => 'cancel', 
                'label' => 'Otkaži'
            ],
    ]
])
@endcomponent

<script src="{{ asset('js/new-job.js') }}"></script>