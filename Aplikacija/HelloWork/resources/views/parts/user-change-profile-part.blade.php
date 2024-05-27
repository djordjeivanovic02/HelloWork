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
            <p class="my-1">Puno ime*</p>
            <input type="text" name="userFullName" id="userFullName" class="w-100"
                placeholder="Unesite svoje puno ime"
                @if ($user != null && $user->name != null) value="{{ $user->name }}" @endif>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Profesija*</p>
            <input type="text" name="userProfesy" id="userProfesy" class="w-100" placeholder="npr. Web developer"
                @if ($user != null && $user->userInfo != null && $user->userInfo->professional_title != null) value="{{ $user->userInfo->professional_title }}" @endif>
        </div>
    </div>
    {{-- @php
        print_r($user->userInfo->expected_salary);
    @endphp --}}
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Godine*</p>
            <input type="text" name="userYears" id="userYears" class="w-100" placeholder="Unesite broj vaših godina"
                @if ($user != null && $user->userInfo != null && $user->userInfo->age != null) value="{{ $user->userInfo->age }}" @endif>
        </div>
        <div class="row-element d-flex flex-column">

            <p class="my-1">Jezici</p>
            <input type="text" name="jobLanguages" id="jobLanguages" class="w-100" placeholder="npr. Engleski">
            @if ($user != null && $user->userInfo != null && $user->userInfo->languages != null)
            @endif
            <div class="tags-preview languages-preview w-100 mt-3">
                @if ($languages != null && count($languages) != 0)
                    @foreach ($languages as $item)
                        <div class="tags-element languages-element d-inline-block temp">
                            <p class="m-0">{{ $item }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="tags-element languages-element d-inline-block temp">
                        <p class="m-0">Srpski</p>
                    </div>
                    <div class="tags-element languages-element d-inline-block temp">
                        <p class="m-0">Španski</p>
                    </div>
                    <div class="tags-element languages-element d-inline-block temp">
                        <p class="m-0">Francuski</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Trenutna plata (€)</p>
            <input type="text" name="currentSalary" id="currentSalary" class="w-100" placeholder="npr. 1000"
                @if ($user != null && $user->userInfo != null && $user->userInfo->current_salary != null) value="{{ $user->userInfo->current_salary }}" @endif>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Očekivana plata (€)</p>
            <input type="text" name="expectedSalary" id="expectedSalary" class="w-100" placeholder="npr. 1500"
                @if ($user != null && $user->userInfo != null && $user->userInfo->expected_salary != null) value="{{ $user->userInfo->expected_salary }}" @endif>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Iskustvo*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="userExperience" id="userExperience">
                <option value="1" @if (
                    $user != null &&
                        $user->userInfo != null &&
                        ($user->userInfo->experience != null || $user->userInfo->experience == 1)) selected @endif>Bez iskustva
                </option>
                <option value="2" @if ($user != null && $user->userInfo != null && $user->userInfo->expirience == 2) selected @endif>1 godina</option>
                <option value="3" @if ($user != null && $user->userInfo != null && $user->userInfo->expirience == 3) selected @endif>2 godine</option>
                <option value="4" @if ($user != null && $user->userInfo != null && $user->userInfo->expirience == 4) selected @endif>3 godine</option>
                <option value="5"@if ($user != null && $user->userInfo != null && $user->userInfo->expirience == 5) selected @endif>4 godine</option>
                <option value="6" @if ($user != null && $user->userInfo != null && $user->userInfo->expirience == 6) selected @endif>4+ godine</option>
            </select>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Stepen obrazovanja*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="userEducation" id="userEducation">
                <option value="1" @if ($user != null && $user->userInfo != null && ($user->userInfo->education != null || $user->userInfo->education == 1)) selected @endif>Predškolsko obrazovanje
                </option>
                <option value="2" @if ($user != null && $user->userInfo != null && $user->userInfo->education == 2) selected @endif>Osnovno obrazovanje</option>
                <option value="3" @if ($user != null && $user->userInfo != null && $user->userInfo->education == 3) selected @endif>Srednje obrazovanje</option>
                <option value="4" @if ($user != null && $user->userInfo != null && $user->userInfo->education == 4) selected @endif>Visoko obrazovanje</option>
                <option value="5" @if ($user != null && $user->userInfo != null && $user->userInfo->education == 5) selected @endif>Stručno obrazovanje i obuka
                </option>
                <option value="6" @if ($user != null && $user->userInfo != null && $user->userInfo->education == 6) selected @endif>Neformalno obrazovanje
                </option>
            </select>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex w-100 flex-column">
            <p class="my-1">Ključne odgovornosti</p>
            <input type="text" name="userResp" id="userResp" class="w-100"
                placeholder="npr. Razvoj i održavanje web stranica i aplikacija">
            <div class="resp-preview w-100 mt-3">
                @if ($responsibilities != null && count($responsibilities) != 0)
                    @foreach ($responsibilities as $item)
                        <div class="resp-element d-inline-block temp">
                            <p class="m-0">{{ $item }}</p>
                        </div>
                    @endforeach
                @else
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
                @endif
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Poslovne veštine</p>
            <input type="text" name="userSkills" id="userSkills" class="w-100" placeholder="npr. vožnja">
            <div class="tags-preview skills-preview w-100 mt-3">
                @if ($skills != null && count($skills) != 0)
                    @foreach ($skills as $item)
                        <div class="tags-element skills-element d-inline-block temp">
                            <p class="m-0">{{ $item }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="tags-element skills-element d-inline-block temp">
                        <p class="m-0">android</p>
                    </div>
                    <div class="tags-element skills-element d-inline-block temp">
                        <p class="m-0">programiranje</p>
                    </div>
                    <div class="tags-element skills-element d-inline-block temp">
                        <p class="m-0">kuvanje</p>
                    </div>
                @endif
            </div>
        </div>
        {{-- DODATI --}}
    </div>
    <div class="info-row w-100 d-flex">
        <div class="textarea-cont d-flex flex-column w-100 position-relative">
            <p class="my-1">Nepišite nešto o sebi*</p>
            <textarea name="userDescription" id="userDescription" class="w-100">
                @if ($user != null && $user->userInfo != null && $user->userInfo->about != null)
{{ $user->userInfo->about }}"
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
                <input type="text" name="userNumber" id="userNumber" class="w-100" placeholder="+381 61...."
                    @if ($user != null && $user->userInfo != null && $user->userInfo->phone != null) value="{{ $user->userInfo->phone }}" @endif>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Email adresa*</p>
                <input type="text" name="userEmail" id="userEmail" class="w-100"
                    placeholder="npr. korisnik@gmail.com" disabled
                    @if ($user != null && $user->email != null) value="{{ $user->email }}" @endif>

            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Zemlja*</p>
                <input type="text" name="userCountry" id="userCountry" class="w-100" placeholder="npr. Srbija"
                    @if ($user != null && $user->userInfo != null && $user->userInfo->country != null) value="{{ $user->userInfo->country }}" @endif>

            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Poštanski broj*</p>
                <input type="text" name="userPostal" id="userPostal" class="w-100" placeholder="npr. 18000"
                    @if ($user != null && $user->userInfo != null && $user->userInfo->postcode != null) value="{{ $user->userInfo->postcode }}" @endif>

            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Grad*</p>
                <input type="text" name="userCity" id="userCity" class="w-100" placeholder="npr. Kragujevac"
                    @if ($user != null && $user->userInfo != null && $user->userInfo->city != null) value="{{ $user->userInfo->city }}" @endif>

            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Adresa*</p>
                <input type="text" name="userAddress" id="userAddress" class="w-100"
                    placeholder="npr. Njegoseva 5"
                    @if ($user != null && $user->userInfo != null && $user->userInfo->full_address != null) value="{{ $user->userInfo->full_address }}" @endif>

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
                <input type="text" name="userFacebook" id="userFacebook" class="w-100"
                    placeholder="www.facebook.com/..." onchange="focusOut(this)"
                    @if ($socials != null) value="{{ $socials[0] }}" @endif>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">Instagram</p>
                <input type="text" name="userInstagram" id="userInstagram" class="w-100"
                    placeholder="www.isntagram.com/..."
                    @if ($socials != null) value="{{ $socials[1] }}" @endif>
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="info-row w-100 d-flex">
            <div class="row-element d-flex flex-column">
                <p class="my-1">Threads</p>
                <input type="text" name="userThreads" id="userThreads" class="w-100"
                    placeholder="www.threads.com/..." onchange="focusOut(this)"
                    @if ($socials != null) value="{{ $socials[2] }}" @endif>
            </div>
            <div class="row-element d-flex flex-column">
                <p class="my-1">LinkedIn</p>
                <input type="text" name="userLinkedin" id="userLinkedin" class="w-100"
                    placeholder="www.linkedin.com/..."
                    @if ($socials != null) value="{{ $socials[3] }}" @endif>
            </div>
        </div>
    </div>
    <div class="info-row w-100 d-flex flex-column align-items-start">
        <button class="my-4 add-ad" onclick="updateUserProfile()">Ažuriraj podatke</button>
    </div>
    <div class="section-info w-100 mt-3">
        <h4>Ostale akcije</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <button class="my-4 add-ad" style="background-color: red; border-color: red" onclick="showDialog()">Obrišite
            nalog</button>
    </div>
</div>
<script src="{{ asset('js/company/change-logo.js') }}"></script>
<script src="{{ asset('js/user/update-profile-data.js') }}"></script>
