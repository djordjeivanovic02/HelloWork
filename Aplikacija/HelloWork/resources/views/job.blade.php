@extends('parts.main')
@section('job')
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex align-items-center justify-content-center">
        <div class="info-job-main-container w-100 h-100 d-flex">
            <div class="job-head-container d-flex">
                <div class="job-head-image">
                    <img src="{{ asset('images/Windows-logo.svg') }}" alt="Job Logo">
                </div>
                <div class="job-header-info d-flex flex-column mx-3">
                    <h3>Softver inženjer (Android), Biblioteke</h3>
                    <div class="all-informations flex-row p-0">
                        <img src="/images/Aktovka.svg"><span class="text-in-span">Microsoft</span></img>
                        <img src="/images/Lokacija.svg"><span class="text-in-span">Beograd, Srbija</span></img>
                        <img src="/images/Sat.svg"><span class="text-in-span">pre 12 sati</span></img>
                        <img src="/images/Zarada.svg"><span class="text-in-span">€700 - €1800</span></img>
                    </div>
                    <div class="identificator-container">
                        <div class="full-time d-inline-block">
                            <p class="m-0 text-center">Puno radno vreme</p>
                        </div>
                        <div class="remote d-inline-block">
                            <p class="m-0 text-center">Od kuće</p>
                        </div>
                        <div class="urgent d-inline-block">
                            <p class="m-0 text-center">Hitno</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-actions d-flex">
                <button>Apliciraj za Posao</button>
                <div class="save-job d-flex align-items-center justify-content-center" onclick="saveJob(1, this)">
                    <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.0714 0H0.928571C0.682299 0 0.446113 0.0790165 0.271972 0.219667C0.0978315 0.360317 2.01065e-09 0.55108 2.01065e-09 0.74999V14.2498C-1.16771e-05 14.3932 0.0508567 14.5335 0.146579 14.6543C0.242301 14.775 0.378866 14.8711 0.540094 14.9311C0.701323 14.991 0.88046 15.0124 1.05628 14.9927C1.23211 14.973 1.39725 14.913 1.53214 14.8198L6.5 11.4523L11.4121 14.7823C11.4989 14.8518 11.6018 14.9068 11.7149 14.9441C11.8281 14.9814 11.9492 15.0004 12.0714 14.9998C12.1932 15.0023 12.3141 14.9818 12.4243 14.9398C12.5939 14.8835 12.739 14.788 12.8415 14.6652C12.9439 14.5424 12.9991 14.3979 13 14.2498V0.74999C13 0.55108 12.9022 0.360317 12.728 0.219667C12.5539 0.0790165 12.3177 0 12.0714 0ZM11.1429 12.6448L7.09429 9.89986C6.92743 9.78761 6.71715 9.72615 6.5 9.72615C6.28285 9.72615 6.07257 9.78761 5.90571 9.89986L1.85714 12.6448V1.49998H11.1429V12.6448Z"/>
                    </svg>                        
                </div>
            </div>
        </div>
    </div>
    <div class="info-job-main-container w-100 mt-50">
        <div class="job-info">
            <div>
                <b>Opis Posla</b>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="mt-50">
                <b>Ključne Odgovornosti</b>
                <ul>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                </ul>
            </div>
            <div class="mt-50">
                <b>Veštine i Iskustvo</b>
                <ul>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>
                    <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
                </ul>
            </div>
        </div>
        <div class="job-right-container d-flex-flex-column">
            <div class="job-quick-info">
                <div class="mb-4">
                    <b>Pregled Posla</b>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/date.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Datum Postavljanja:</p>
                        <p class="info">Postavljeno pre 2 sata</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/sand-clock.svg') }}" alt="Sand Clock Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Ističe:</p>
                        <p class="info">6. maja, 2024</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/location-main.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Lokacija:</p>
                        <p class="info">Beograd, Srbija</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/person-main.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Naziv Posla:</p>
                        <p class="info">Android Developer</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/coins.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Satnica:</p>
                        <p class="info">€15 - €25 / sat</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/money.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Plata:</p>
                        <p class="info">€25k - €50k</p>
                    </div>
                </div>
                <div class="my-4">
                    <b>Lokacija Posla</b>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61958.60967440586!2d20.507965891817683!3d44.774037492011274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1714215228237!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="job-map"></iframe>
            
                <div class="my-4">
                    <b>Poslovne Veštine</b>
                </div>
                <div class="skills-container w-100">
                    <div class="skill d-inline-block">android</div>
                    <div class="skill d-inline-block">programiranje</div>
                    <div class="skill d-inline-block">kotlin</div>
                    <div class="skill d-inline-block">composable</div>
                    <div class="skill d-inline-block">git</div>
                    <div class="skill d-inline-block">xml</div>
                    <div class="skill d-inline-block">android studio</div>
                </div>
            </div>



            <div class="job-quick-info mt-4">
                <div class="job-quick-company-header d-flex mb-4">
                    <div class="quick-item-container d-flex">
                        <div>
                            <img src="{{ asset('images/Windows-logo.svg') }}" alt="Date Icon" style="width: 35px;">
                        </div>
                        <div class="quick-item-info d-flex flex-column">
                            <p class="head m-0 p-0">Microsoft</p>
                            <a href="#">Pogledaj profil kompanije</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Primarna industrija:</p>
                    <p class="segment-value">Softver</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Veličina kompanije:</p>
                    <p class="segment-value">500-1,000</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Godina osnivanja:</p>
                    <p class="segment-value">2000</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Telefon:</p>
                    <p class="segment-value">064 87 67 865</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Email:</p>
                    <p class="segment-value">team@microsoft.com</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Lokacija:</p>
                    <p class="segment-value">Washington, USA</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="segment-title">Društvene mreže:</p>
                    <p class="segment-value"></p>
                </div>

                <div class="company-website w-100">
                    <button class="w-100">www.microsoft.com</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/save-ad.js') }}"></script>
@endsection
