@extends('parts.main')
@section('job')
    <link rel="stylesheet" href="{{ asset('css/job.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex align-items-center justify-content-center">
        <div class="info-job-main-container w-100 d-flex justify-content-between align-items-center">
            <div class="job-head-container d-flex">
                <div class="job-head-image">
                    <div class="company-logo-container">
                        <img src="{{ asset('images/udemy-logo.png') }}" alt="Company Logo">
                    </div>
                </div>
                <div class="job-header-info d-flex flex-column mx-3">
                    <h3>Udemy</h3>
                    <div class="all-informations d-flex flex-row p-0">
                        <img src="/images/Lokacija.svg"><span class="text-in-span">Beograd, Srbija</span></img>
                        <img src="/images/Aktovka.svg"><span class="text-in-span">Programiranje/Dizajn</span></img>
                        <img src="/images/call.svg"><span class="text-in-span">064 73 87 996</span></img>
                        <img src="/images/message-gray.svg"><span class="text-in-span">udemyinfo@udemy.com</span></img>
                    </div>
                    <div class="identificator-container m-0 mt-3">
                        <div class="full-time d-inline-block">
                            <p class="m-0 text-center">Dostupni poslovi - 10</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="job-actions d-flex">
                <button>Pošalji poruku</button>
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/Sacuvaj.svg') }}" alt="Save Icon">
                </div>
            </div>
        </div>
    </div>
    <div class="info-job-main-container w-100 d-flex justify-content-between align-items-start mt-50">
        <div class="job-info">
            <div>
                <b>O kompaniji</b>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <p>
                    It has survived not only five centuries, but also the leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <div class="company-gallery">
                    <div class="company-gallery-image d-inline-block">
                        <img src="{{ asset('images/company1.jpeg') }}" alt="Company Image">
                    </div>
                    <div class="company-gallery-image d-inline-block">
                        <img src="{{ asset('images/company2.jpeg') }}" alt="Company Image">
                    </div>
                    <div class="company-gallery-image d-inline-block">
                        <img src="{{ asset('images/company1.jpeg') }}" alt="Company Image">
                    </div>
                    <div class="company-gallery-image d-inline-block">
                        <img src="{{ asset('images/company2.jpeg') }}" alt="Company Image">
                    </div>    
                </div>

                <p>
                    It has survived not only five centuries, but also the leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <div class="mt-4"></div>
                <h4>Svi poslovi kompanije</h4>
                <p class="m-0">10 dostupnih poslova - 3 dodata danas</p>
                <div class="w-100">
                    @component('parts.wide-widget', ["active" => false])
                        
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="job-right-container d-flex-flex-column">
            <div class="job-quick-info mb-4">
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

            <div class="job-quick-info">
                <div class="my-2">
                    <b>Lokacija Kompanije</b>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61958.60967440586!2d20.507965891817683!3d44.774037492011274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ssr!2srs!4v1714215228237!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="job-map"></iframe>
            </div>
        </div>
    </div>
@endsection
