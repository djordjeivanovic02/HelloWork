@extends('parts.main')
@section('job')
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex align-items-center justify-content-center">
        <div class="info-job-main-container w-100 h-100 d-flex justify-content-center">
            <div class="job-head-container w-100 d-flex flex-column align-items-center">
                <div class="user-image">
                    <img src="{{ asset('images/girl.jpg') }}" alt="Job Logo">
                </div>
                <div class="job-header-info d-flex flex-column align-items-center my-3">
                    <h3 class="">Kristina Janković</h3>
                    <a href="">Unity Developer</a>
                </div>
                <div class="user-fast-info d-flex w-100 mt-4">
                    <div class="identificator-container user-identificator-container">
                        <div class="full-time d-inline-block">
                            <p class="m-0 text-center">App</p>
                        </div>
                        <div class="full-time d-inline-block">
                            <p class="m-0 text-center">Dizajn</p>
                        </div>
                        <div class="full-time d-inline-block">
                            <p class="m-0 text-center">Programiranje</p>
                        </div>
                    </div>
                    <div class="user-all-informations flex-row p-0">
                        <img src="/images/Lokacija.svg"><span class="text-in-span">Beograd, Srbija</span></img>
                        <img src="/images/Zarada.svg"><span class="text-in-span">€700 mesečno</span></img>
                        <img src="/images/Sat.svg"><span class="text-in-span">Član od 19. marta 2024.</span></img>
                    </div>
                    <div class="job-actionss d-flex">
                        <button>Preuzmi CV</button>
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('images/Sacuvaj.svg') }}" alt="Save Icon">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="info-job-main-container user-main-container w-100 mt-50">
        <div class="job-info user-info">
            <div>
                <b>O korisniku</b>
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
                <b>Prethodni poslovi</b>
                <div class="early-job d-flex align-items-center mt-3 mb-2">
                    <div class="early-job-image d-flex justify-content-center align-items-center">
                        <p class="m-0 p-0">W</p>
                    </div>
                    <div class="early-job-title mx-4">
                        <p class="my-0">Web Developer</p>
                        <a href="">Microsoft</a>
                    </div>
                    <div class="early-job-duration">
                        <p class="m-0">2014 - 2018</p>
                    </div>
                </div>
                <div class="early-job d-flex align-items-center mt-3 mb-2">
                    <div class="early-job-image d-flex justify-content-center align-items-center">
                        <p class="m-0 p-0">W</p>
                    </div>
                    <div class="early-job-title mx-4">
                        <p class="my-0">Web Developer</p>
                        <a href="">Microsoft</a>
                    </div>
                    <div class="early-job-duration">
                        <p class="m-0">2014 - 2018</p>
                    </div>
                </div>
                <div class="early-job d-flex align-items-center mt-4 mb-3">
                    <div class="early-job-image d-flex justify-content-center align-items-center">
                        <p class="m-0 p-0">R</p>
                    </div>
                    <div class="early-job-title mx-4">
                        <p class="my-0">Unity Programer</p>
                        <a href="">Rockstar</a>
                    </div>
                    <div class="early-job-duration">
                        <p class="m-0">2014 - 2020</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-right-container d-flex-flex-column">
            <div class="job-quick-info">
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/date.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Iskustvo:</p>
                        <p class="info">0-2 godine</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/sand-clock.svg') }}" alt="Sand Clock Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Godine:</p>
                        <p class="info">24</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/coins.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Trenutna plata:</p>
                        <p class="info">€1000</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/money.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Očekivana plata:</p>
                        <p class="info">€1500</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/languages.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Jezici:</p>
                        <p class="info">Srpski, Engleski, Španski</p>
                    </div>
                </div>
                <div class="quick-item-container d-flex my-3">
                    <div class="quick-item-image">
                        <img src="{{ asset('images/education.svg') }}" alt="Date Icon">
                    </div>
                    <div class="quick-item-info d-flex flex-column">
                        <p class="head m-0 p-0">Stepen obrazovanja:</p>
                        <p class="info">Master</p>
                    </div>
                </div>
                
            </div>

            <div class="job-quick-info mt-4 d-flex justify-content-between">
                <div>
                    <b>Društvene mreže</b>
                </div>
                <div class="user-social-medias">
                    <img src="{{ asset('images/instagram.svg') }}" alt="Instagram Logo" class="d-inline-block" style="width: 22px; height: 22px">
                    <img src="{{ asset('images/facebook.svg') }}" alt="Facebook Logo" class="d-inline-block">
                    <img src="{{ asset('images/linkedin.svg') }}" alt="LinkedIn Logo" class="d-inline-block">
                    <img src="{{ asset('images/threads.svg') }}" alt="Threads Logo" class="d-inline-block">
                </div>
            </div>

            <div class="job-quick-info mt-4">
                <div class="mb-4">
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

        </div>
    </div>
@endsection
