<div class="mobile-background w-100 h-100 fixed-top">
    <div class="mobile-search position-absolute w-100 bg-white">
        <div class="w-100 d-flex flex-column">
            <div class="search-job-inputs w-100">
                <div class="close-mobile-filter position-absolute">
                    <img src="{{ asset('images/close.svg') }}" alt="Zatvori" class="w-100 h-100">
                </div>
                <div class="w-100">
                    <p class="mb-3">Pretraži poslove</p>
                    <div class="search-job-input d-flex align-items-center w-100 bg-white">
                        <div class="search-job-input-image">
                            <img src="{{ asset('images/search-icon.svg') }}" alt="search icon">
                        </div>
                        <input type="text" class="w-100 h-100 px-2 border-0" placeholder="Ime posla, kompanije">
                    </div>
                </div>
                <div class="w-100 mt-4">
                    <p class="mb-3">Lokacija</p>
                    <div class="search-job-input d-flex align-items-center w-100 bg-white">
                        <div class="search-job-input-image">
                            <img src="{{ asset('images/location-icon.svg') }}" alt="location icon">
                        </div>
                        <input type="text" class="w-100 h-100 px-2 border-0" placeholder="Grad ili okrug">
                    </div>
                </div>
                <div class="w-100 mt-4">
                    <p class="mb-3">Vaše veštine</p>
                    <div class="search-job-input d-flex align-items-center w-100 bg-white">
                        <div class="search-job-input-image">
                            <img src="{{ asset('images/skills-icon.svg') }}" alt="skills icon">
                        </div>
                        <input type="text" class="w-100 h-100 px-2 border-0" placeholder="Npr. kuvanje kafe">
                    </div>
                </div>
                <div class="w-100 mt-4">
                    <p class="mb-3">Kategorija</p>
                    <div class="search-job-input d-flex align-items-center w-100 bg-white">
                        <div class="search-job-input-image">
                            <img src="{{ asset('images/aktovka.svg') }}" alt="skills icon">
                        </div>
                        <select class="w-100 h-100 px-2 border-0" name="jobCategory" id="jobCategory">
                            <option value="0" disabled selected>Izaberite kategoriju posla</option>
                            <option value="IT">IT</option>
                            <option value="Trgovina">Trgovina</option>
                        </select>
                    </div>
                </div>
                <div class="w-100 mt-4">
                    <p class="mb-3">Tip posla</p>
                    <div class="search-job-input d-flex align-items-center w-100 p-0 my-2">
                        <div class="position-relative select-toggler-container d-flex align-items-center" style="background-color: white"
                            inputIdentificator="fullTime">
                            <input type="checkbox" name="fullTime" id="fullTime" hidden>
                            <div class="position-absolute select-toggler"></div>
                        </div>
                        <span class="mx-2">Puno radno vreme</span>
                    </div>
                    <div class="search-job-input d-flex align-items-center w-100 p-0 my-2">
                        <div class="position-relative select-toggler-container d-flex align-items-center" style="background-color: white"
                            inputIdentificator="partTime">
                            <input type="checkbox" name="partTime" id="partTime" hidden>
                            <div class="position-absolute select-toggler"></div>
                        </div>
                        <span class="mx-2">Nepuno radno vreme</span>
                    </div>
                </div>
        
                <div class="w-100 mt-4">
                    <p class="mb-3">Način plaćanja</p>
                    <div class="search-job-input d-flex align-items-center w-100 p-0 my-2">
                        <div class="position-relative select-toggler-container d-flex align-items-center" style="background-color: white"
                            inputIdentificator="dailyPay">
                            <input type="checkbox" name="dailyPay" id="dailyPay" hidden>
                            <div class="position-absolute select-toggler"></div>
                        </div>
                        <span class="mx-2">Dneva isplata</span>
                    </div>
                    <div class="search-job-input d-flex align-items-center w-100 p-0 my-2">
                        <div class="position-relative select-toggler-container d-flex align-items-center" style="background-color: white"
                            inputIdentificator="mountlyPay">
                            <input type="checkbox" name="mountlyPay" id="mountlyPay" hidden>
                            <div class="position-absolute select-toggler"></div>
                        </div>
                        <span class="mx-2">Mesečna isplata</span>
                    </div>
                    <div class="search-job-input d-flex align-items-center w-100 p-0 my-2">
                        <div class="position-relative select-toggler-container d-flex align-items-center" style="background-color: white"
                            inputIdentificator="yearlyPay">
                            <input type="checkbox" name="yearlyPay" id="yearlyPay" hidden>
                            <div class="position-absolute select-toggler"></div>
                        </div>
                        <span class="mx-2">Godišnja isplata</span>
                    </div>
                </div>
                <div class="w-100 mt-4">
                    <p class="mb-3">Tagovi</p>
                    <div class="search-job-input d-flex align-items-center w-100 p-0">
                        @component('parts.slider')    
                        @endcomponent
                    </div></div>
                </div>
                <div class="w-100 mt-4">
                    <button class="filter w-100 p-2">Filtriraj</button>
                    <button class="reset w-100 p-2 mt-2">Resetuj filtere</button>
                </div>
            </div>
            <div class="search-job-inputs add-new w-100 p-4 mt-4 position-relative">
                <img class="position-absolute" src="{{ asset('images/ads-bg-4.png') }}" alt="Dodaj svoj oglas za posao">
                <p>Zapošljavate?</p>
                <p class="desc">
                    Postavite oglas za posao koji nudite i na najbrži način pronađite idealne kandidate.
                </p>
                <button>Postani poslodavac</button>
            </div>
        </div>
    </div>
</div>