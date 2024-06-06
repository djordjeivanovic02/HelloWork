<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Osnovne informacije</h4>
    </div>
    <div class="update-profile-notification-container w-100 p-4">
        <b class="m-0 p-0"></b>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Ime kompanije*</p>
            <input type="text" name="companyName" id="companyName" class="w-100" placeholder="Unesite ime kompanije"
                onchange="focusOut(this)" @if ($user->name !== null) value="{{ $user->name }}" @endif>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Velicina kompanije*</p>
            <input type="text" name="companySize" id="companySize" class="w-100" placeholder="npr. 120"
                onchange="focusOut(this)"
                @if ($user->companyInfo !== null && $user->companyInfo->size !== null) value="{{ $user->companyInfo->size }}" @endif>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Primarna industrija*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="companyCategorycompanyCountry" id="companyCategorycompanyCountry"
                @if ($user->companyInfo !== null && $user->companyInfo->name !== null) value="{{ $user->companyInfo->category }}" @endif>
                <option value="0" selected disabled>Tehnološka kompanije</option>
                <option value="1">Automobilska kompanija</option>
                <option value="2">Maloprodajna kompanija</option>
                <option value="3">Finansijska kompanija</option>
                <option value="4">Farmaceutska kompanija</option>
                <option value="5">Energetska kompanija</option>
                <option value="6">Kompanija za hranu i pića</option>
            </select>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Zemlja*</p>
            <input type="text" name="companyCountry" id="companyCountry" class="w-100" placeholder="npr. Srbija"
                onchange="focusOut(this)"
                @if ($user->companyInfo !== null && $user->companyInfo->country !== null) value="{{ $user->companyInfo->country }}" @endif>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Websajt</p>
            <input type="text" name="companyWebsite" id="companyWebsite" class="w-100"
                placeholder="Unesite websajt kompanije"
                @if ($user->companyInfo !== null && $user->companyInfo->website !== null) value="{{ $user->companyInfo->website }}" @endif>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Datum osnivanja*</p>
            <input type="text" name="companyFounded" id="companyFounded" class="w-100" placeholder="npr. 16/09/2018"
                onchange="focusOut(this)" {{-- @if ($user->companyInfo !== null && $user->companyInfo->start_date !== null) value="{{ $user->companyInfo->start_date }}" @endif> --}}
                @if ($user->companyInfo !== null && $user->companyInfo->start_date !== null) value="{{ date('d.m.Y', strtotime($user->companyInfo->start_date)) }}" @endif>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="textarea-cont d-flex flex-column w-100 position-relative">
            <p class="my-1">Opis*</p>
            <textarea name="companyDescription" id="companyDescription" class="w-100" placeholder="Unesite opis kompanije"
                onchange="focusOut(this)">
                @if ($user->companyInfo !== null && $user->companyInfo->about !== null)
{{ $user->companyInfo->about }}
@endif
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
                <input type="text" name="companyNumber" id="companyNumber" class="w-100" placeholder="+381 61...."
                    onchange="focusOut(this)"
                    @if ($user->companyInfo !== null && $user->companyInfo->contact !== null) value="{{ $user->companyInfo->contact }}" @endif>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Email adresa*</p>
                <input type="text" name="companyEmail" id="companyEmail" class="w-100"
                    placeholder="npr. kompanija@gmail.com" onchange="focusOut(this)"
                    @if ($user->email !== null) value="{{ $user->email }}" @endif>
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Grad*</p>
                <input type="text" name="companyCity" id="companyCity" class="w-100" placeholder="npr. Kragujevac"
                    onchange="focusOut(this)"
                    @if ($user->companyInfo !== null && $user->companyInfo->city !== null) value="{{ $user->companyInfo->city }}" @endif>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Adresa*</p>
                <input type="text" name="companyAddress" id="companyAddress" class="w-100"
                    placeholder="npr. Njegoseva 5" onchange="focusOut(this)"
                    @if ($user->companyInfo !== null && $user->companyInfo->address !== null) value="{{ $user->companyInfo->address }}" @endif>
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2868.8055350156697!2d21.901872415496903!3d43.31938787913275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4758a7351744766d%3A0x5e22478f34d9fc38!2sStara%20%C5%BEelezni%C4%8Dka%20kompanija!5e0!3m2!1sen!2srs!4v1650110632487!5m2!1sen!2srs"
            width="600" height="450" style="border:0; height: 300px;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" class="job-map w-100 my-3"></iframe>
    </div>
    <div class="section-info w-100 mt-3">
        <h4>Društvene mreže</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Facebook</p>
                <input type="text" name="companyFacebook" id="companyFacebook" class="w-100"
                    placeholder="www.facebook.com/..."
                    @if ($socialNetworks) value="{{ $socialNetworks[0] }}" @endif>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Instagram</p>
                <input type="text" name="companyInstagram" id="companyInstagram" class="w-100"
                    placeholder="www.instagram.com/..."
                    @if ($socialNetworks) value="{{ $socialNetworks[1] }}" @endif>
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Threads</p>
                <input type="text" name="companyThreads" id="companyThreads" class="w-100"
                    placeholder="www.threads.com/..."
                    @if ($socialNetworks) value="{{ $socialNetworks[2] }}" @endif>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">LinkedIn</p>
                <input type="text" name="companyLinkedin" id="companyLinkedin" class="w-100"
                    placeholder="www.linkedin.com/..."
                    @if ($socialNetworks) value="{{ $socialNetworks[3] }}" @endif>
            </div>
        </div>
    </div>
    <div class="section-info w-100 mt-3">
        <h4>Galerija</h4>
    </div>
    <div class="info-row images-container w-100">
        <input type="file" name="inputImages" id="inputImages" accept="image/*" hidden>
        <button class="my-4 add-img2" onclick="importImages()">Dodaj slike</button>
        @if (!empty($images))
            @foreach ($images as $image)
                <div class="image-container2 image-container my-4 w-100 active">
                    <img src="{{ $image }}" alt="Galerija kompanije">
                </div>
            @endforeach
        @endif

    </div>
    <div class="info-row w-100 d-flex flex-column align-items-start">
        <button class="updateCompanyDataBtn my-4 add-ad w-100" onclick="updateCompanyData()">Ažuriraj podatke</button>
    </div>
    <div class="section-info w-100 mt-3">
        <h4>Ostale akcije</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <button class="my-4 add-ad" style="background-color: red; border-color: red"
            onclick="showDialog('delete_company_account_dialog')">Obrišite
            nalog</button>
    </div>
</div>


@component('dialogs.notification', [
    'id' => 'delete_company_account_dialog',
    'type' => 'success',
    'title' => 'Brisanje naloga',
    'message' =>
        'Da li ste sigurni da želite da obrišete svoj nalog? Ukoliko obrišete nalog ne postoji način da vam isti bude vraćen, takođe, svi vaši oglasi će biti obrisani!',
    'close' => true,
    'actions' => [
        [
            'url' => 'deleteAccount(' . $user->id . ')',
            'type' => 'yes',
            'label' => 'DA',
        ],
        [
            'url' => "closeDialog('delete_company_account_dialog')",
            'type' => 'cancel',
            'label' => 'Otkaži',
        ],
    ],
])
@endcomponent

<script src="{{ asset('js/delete-profile.js') }}"></script>
