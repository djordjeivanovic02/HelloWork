<link rel="stylesheet" href="{{ asset('css/search-jobs.css') }}">
<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Dodaj novi posao</h4>
    </div>
    @if ($user != null && $user->name != null)
        <div class="update-profile-notification-container w-100 p-4">
            <b class="m-0 p-0"></b>
        </div>
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Naslov oglasa*</p>
                <input type="text" name="jobTitle" id="jobTitle" class="w-100" placeholder="Unesite naslov oglasa"
                    onchange="focusOut(this)">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Adresa*</p>
                <input type="text" name="jobAddress" id="jobAddress" class="w-100" placeholder="npr. Beograd">
            </div>
        </div>
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Tip posla*</p>
                {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
                <select name="jobType" id="jobType" placeholder="Izaberite tip posla">
                    <option value="1" selected>Puno radno vreme</option>
                    <option value="2">Nepuno radno vreme</option>
                </select>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Opseg plate(€)*</p>
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div class="row-el m-0 d-flex w-50">
                        <input type="text" name="jobFromSalary" id="jobFromSalary" class="w-100"
                            placeholder="npr. 1000">
                    </div>
                    <b class="mx-4 p-0">-</b>
                    <div class="row-el d-flex w-50">
                        <input type="text" name="jobToSalary" id="jobToSalary" class="w-100"
                            placeholder="npr. 1500">
                    </div>
                </div>
            </div>
        </div>

        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Kategorija posla*</p>
                {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
                <select name="jobCategory" id="jobCategory">
                    <option value="1" selected>Administracija i Uredske Usluge</option>
                    <option value="2">Finansije i Računovodstvo</option>
                    <option value="3">IT i Softverski Razvoj</option>
                    <option value="4">Marketing i Prodaja</option>
                    <option value="5">Zdravstvo</option>
                    <option value="6">Obrazovanje i Obuka</option>
                    <option value="7">Građevina i Inženjering</option>
                    <option value="8">Usluge Kupcima</option>
                    <option value="9">Umetnost i Dizajn</option>
                    <option value="10">Proizvodnja i Industrija</option>
                    <option value="11">Logistika i Transport</option>
                    <option value="12">Pravo</option>
                    <option value="13">Ugostiteljstvo i Turizam</option>
                    <option value="14">Nekretnine</option>
                    <option value="15">Ljudski Resursi</option>
                    <option value="16">Mediji i Komunikacije</option>
                    <option value="17">Istraživanje i Razvoj</option>
                    <option value="18">Poljoprivreda i Prirodni Resursi</option>
                    <option value="19">Sigurnost i Zaštita</option>
                    <option value="20">Održavanje i Popravke</option>

                </select>
            </div>

            <div class="row-element d-flex flex-column">
                <p class="my-1">Trajanje posla*</p>
                {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
                <select name="jobDuration" id="jobDuration">
                    <option value="1" selected>1h</option>
                    <option value="2">2h</option>
                    <option value="3">3h</option>
                    <option value="4">4h</option>
                    <option value="5">5h</option>
                    <option value="6">6h</option>
                    <option value="7">7h</option>
                    <option value="8">8h</option>
                    <option value="9">9h</option>
                    <option value="10">10h</option>
                </select>
            </div>
        </div>
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex w-100 flex-column">
                <p class="my-1">Ključne odgovornosti</p>
                <input type="text" name="jobResp" id="jobResp" class="w-100"
                    placeholder="npr. Razvoj i održavanje web stranica i aplikacija">
                <div class="resp-preview w-100 mt-3">
                    <div class="resp-element d-inline-block temp">
                        <p class="m-0">Vođenje, obuka i motivisanje prodajnog tima kako bi se osigurali visoki
                            performansi i efikasnos</p>
                    </div>
                    <div class="resp-element d-inline-block temp">
                        <p class="m-0">Pružanje emocionalne i akademske podrške učenicima, kao i saradnja sa
                            roditeljima
                            kako bi se osigurali optimalni uslovi za učenje i razvoj deteta</p>
                    </div>
                    <div class="resp-element d-inline-block temp">
                        <p class="m-0">Vođenje preciznih medicinskih zapisa i dokumentacije o pacijentima,
                            uključujući
                            beleženje simptoma, tretmana i napretka</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex w-100 flex-column">
                <p class="my-1">Potrebna iskustva</p>
                <input type="text" name="jobExp" id="jobExp" class="w-100"
                    placeholder="npr. Sposobnost da se razvijaju web stranice koje su prilagođene za različite uređaje i ekrane.">
                <div class="exp-preview w-100 mt-3">
                    <div class="exp-element d-inline-block temp">
                        <p class="m-0">Iskustvo u kreiranju i sprovođenju marketinških i prodajnih planova</p>
                    </div>
                    <div class="exp-element d-inline-block temp">
                        <p class="m-0">Višegodišnje iskustvo u vođenju i menadžmentu prodajnog tima</p>
                    </div>
                    <div class="exp-element d-inline-block temp">
                        <p class="m-0">Sposobnost rešavanja problema i pritužbi klijenata na efikasan način</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Broj potrebnih radnih mesta*</p>
                <input type="text" name="jobCount" id="jobCount" class="w-100" placeholder="npr. 10">
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Način plaćanja*</p>
                {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
                <select name="jobPayment" id="jobPayment">
                    <option value="1" selected>Dnevno</option>
                    <option value="2">Mesečno</option>
                    <option value="3">Godišnje</option>
                </select>
            </div>
        </div>
        <div class="info-row w-100 d-flex">
            <div class="textarea-cont row-element d-flex flex-column w-100">
                <p class="my-1">Opis posla*</p>
                <textarea name="jobDescription" id="jobDescription" cols="30" rows="10" class="w-100"></textarea>
            </div>
        </div>

        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Trajanje oglasa*</p>
                {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
                <select name="adDuration" id="adDuration">
                    <option value="1" selected>1 nedelja</option>
                    <option value="2">15 dana</option>
                    <option value="3">Mesec dana</option>
                    <option value="4">Dok ga ja ne obišem</option>
                </select>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Tagovi</p>
                <input type="text" name="jobTags" id="jobTags" class="w-100" placeholder="npr. vožnja">
                <div class="tags-preview w-100 mt-3">
                    <div class="tags-element d-inline-block temp">
                        <p class="m-0">android</p>
                    </div>
                    <div class="tags-element d-inline-block temp">
                        <p class="m-0">programiranje</p>
                    </div>
                    <div class="tags-element d-inline-block temp">
                        <p class="m-0">kuvanje</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-info w-100 mt-3">
            <h4>Dodaj fajlove</h4>
        </div>
        <div class="info-row w-100 d-flex">
            <input type="file" name="inputImage" id="inputImage" accept="image/*" hidden>
            <button class="my-4 add-img">Dodaj naslovnu sliku</button>
            <div class="image-container my-4"></div>
        </div>

        <div class="section-info w-100">
            <h4>Postavi oglas</h4>
        </div>
        <div class="info-row w-100 d-flex">
            <button class="my-4 add-ad">Postavi oglas</button>
        </div>
    @else
        <div class="w-100 d-flex justify-content-center">
            <div class="no-found-cont w-100 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('images/sad.svg') }}" alt="Not Found">
                <p class="mt-3">Da biste postavili svoj prvi oglas morate prvo popuniti svoje podatke. To možete
                    postići klikom na karticu <b>Profil Kompanije</b>. Nakon što unsete sve podatke o vama, moćićete da
                    postavite svoj oglas.</p>
            </div>
        </div>
    @endif
</div>

<script src="{{ asset('js/company/new-job.js') }}"></script>
