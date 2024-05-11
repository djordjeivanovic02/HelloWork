<link rel="stylesheet" href="{{ asset('css/search-jobs.css') }}">
<link rel="stylesheet" href="{{ asset('css/new-job.css') }}">
<div class="w-100">
    <div class="section-info w-100">
        <h4>Dodaj novi posao</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Naslov oglasa*</p>
            <input type="text" name="jobTitle" id="jobTitle" class="w-100" placeholder="Unesite naslov oglasa" onchange="focusOut(this)">
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
                <option value="0" selected disabled>Izaberi tip posla</option>
                <option value="1">Puno radno vreme</option>
                <option value="2">Nepuno radno vreme</option>
            </select>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Opseg plate(€)*</p>
            <div class="d-flex justify-content-between w-100 align-items-center">
                <div class="d-flex w-50">
                    <input type="text" name="jobFromSalary" id="jobFromSalary" class="w-100" placeholder="npr. 1000">
                </div>
                <b class="my-0 mx-4 p-0">-</b>
                <div class="d-flex w-50">
                    <input type="text" name="jobToSalary" id="jobToSalary" class="w-100" placeholder="npr. 1500">
                </div>
            </div>
        </div>
    </div>

    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Kategorija posla*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="jobCategory" id="jobCategory">
                <option value="0" selected disabled>Izaberi kategoriju</option>
                <option value="1">Puno radno vreme</option>
                <option value="2">Nepuno radno vreme</option>
            </select>
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Trajanje posla*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="jobDuration" id="jobDuration">
                <option value="0" selected disabled>Izaberi trajanje posla</option>
                <option value="1">1h</option>
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
        <div class="row-element d-flex flex-column">
            <p class="my-1">Broj potrebnih radnih mesta*</p>
            <input type="text" name="jobCount" id="jobCount" class="w-100" placeholder="npr. 10">
        </div>
        <div class="row-element d-flex flex-column">
            <p class="my-1">Način plaćanja*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="jobPayment" id="jobPayment">
                <option value="0" selected disabled>Izaberi način plaćanja</option>
                <option value="1">Dnevno</option>
                <option value="2">Mesečno</option>
                <option value="3">Godišnje</option>
            </select>
        </div>
    </div>
    <div class="info-row w-100 d-flex">
        <div class="d-flex flex-column w-100">
            <p class="my-1">Opis posla*</p>
            <textarea name="jobDescription" id="jobDescription" cols="30" rows="10" class="w-100"></textarea>
        </div>
    </div>

    <div class="info-row w-100 d-flex">
        <div class="row-element d-flex flex-column">
            <p class="my-1">Trajanje oglasa*</p>
            {{-- <input type="text" name="jobTitle" id="jobTitle" class="w-100" > --}}
            <select name="jobDuration" id="jobDuration">
                <option value="0" selected disabled>Izaberi trajanje oglasa</option>
                <option value="1">1 nedelja</option>
                <option value="2">15 dana</option>
                <option value="3">Mesec dana</option>
                <option value="4">Dok ga ja ne obišem</option>
            </select>
        </div>
    </div>

    <div class="section-info w-100 mt-3">
        <h4>Dodaj fajlove</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <button class="my-4 add-img">Dodaj naslovnu sliku</button>
    </div>

    <div class="section-info w-100">
        <h4>Postavi oglas</h4>
    </div>
    <div class="info-row w-100 d-flex">
        <button class="my-4 add-ad">Postavi oglas</button>
    </div>
</div>

<script src="{{ asset('js/new-job.js') }}"></script>