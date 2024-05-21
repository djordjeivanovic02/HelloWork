<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Osnovne informacije</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Puno ime*</p>
            <input type="text" name="userFullName" id="userFullName" class="w-100" placeholder="Unesite svoje puno ime">
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Profesija*</p>
            <input type="text" name="userProfesy" id="userProfesy" class="w-100" placeholder="npr. Web developer">
        </div>
    </div>
    {{-- @php
        print_r($user->userInfo->expected_salary);
    @endphp --}}
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Godine*</p>
            <input type="text" name="userYears" id="userYears" class="w-100" placeholder="Unesite broj vaših godina">
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Jezici*</p>
            <input type="text" name="userLanguages" id="userLanguages" class="w-100" placeholder="npr. Engleski">
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Trenutna plata (€)*</p>
            <input type="text" name="currentSalary" id="currentSalary" class="w-100" placeholder="npr. 1000">
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Očekivana plata (€)*</p>
            <input type="text" name="expectedSalary" id="expectedSalary" class="w-100" placeholder="npr. 1500">
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="d-flex flex-column w-100">
            <p class="my-1">Nepišite nešto o sebi*</p>
            <textarea name="userDescription" id="userDescription" class="w-100" placeholder="Unesite opis kompanije">
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
                <input type="text" name="userNumber" id="userNumber" class="w-100" placeholder="+381 61....">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Email adresa*</p>
                <input type="text" name="userEmail" id="userEmail" class="w-100" placeholder="npr. korisnik@gmail.com">
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Zemlja*</p>
                <input type="text" name="userCountry" id="userCountry" class="w-100" placeholder="npr. Srbija">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Poštanski broj*</p>
                <input type="text" name="userPostal" id="userPostal" class="w-100" placeholder="npr. 18000">
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Grad*</p>
                <input type="text" name="userCity" id="userCity" class="w-100" placeholder="npr. Kragujevac">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Adresa*</p>
                <input type="text" name="userAddress" id="userAddress" class="w-100" placeholder="npr. Njegoseva 5">
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
<script src="{{ asset('js/new-job.js') }}"></script>