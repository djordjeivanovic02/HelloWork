@extends('parts.main')
@section('about')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search-jobs.css') }}">
    <div class="info-container w-100 m-0 p-0 d-flex flex-column align-items-center justify-content-center">
        <h1 class="m-0">O nama</h1>
        <div class="info-navigation-container m-0 mt-2">
            <a href="{{ route('login') }}" class="m-0">Početna</a>
            <span>/</span>
            <a href="" class="main m-0">O nama</a>
        </div>
    </div>

    <div class="entire">
        <div class="first-row d-flex justify-content-between ">
            <div class="text-first-row d-flex flex-column">
                <h2>Tim Aurora</h2>
                <h5>Upoznajte tim Aurora: Kreatore platforme HelloWork</h5>
                <p class="text-inside-first-row">U Aurori stvaramo jedinstvena iskustva. Naš tim čine studenti treće godine
                    Elektronskog fakulteta u Nišu, povezani zajedničkom vizijom da revolucionizujemo proces traženja posla i
                    zapošljavanja. Naša platforma, HelloWork, rezultat je naše posvećenosti, inovacija i timskog duha.</p>
                <input type="button" value="Pročitaj još"
                    onclick="this.style.display='none'; document.querySelector('.more').style.display='block'">
                <div style="display: none" class="more">
                    <p>Naš tim:</p>
                    <ul>
                        <li><b>Đorđe Ivanović: </b>Vizionar i vođa našeg tima, zadužen za strateško planiranje i vođenje
                            projekata.</li>
                        <li><b>Aleksa Jovanović: </b>Programer čije veštine omogućavaju da naše ideje zažive, osiguravajući
                            da
                            platforma radi besprekorno.</li>
                        <li><b>David Stanojević: </b>Dizajner sa oštrim okom za detalje, koji osigurava da naša platforma
                            bude intuitivna i vizuelno privlačna.</li>
                    </ul>
                    <p class="text-inside-first-row">U Aurori verujemo u moć tehnologije da menja živote. HelloWork nije
                        samo
                        platforma za zapošljavanje, već alat koji omogućava ljudima da pronađu svoj idealan posao i
                        kompanijama
                        da otkriju najbolje talente. Posvećeni smo stalnom unapređenju i inovacijama, uvek težeći da
                        poboljšamo
                        korisničko iskustvo i odgovorimo na potrebe tržišta rada.</p>
                </div>
            </div>
            <div class="image">
                <img src="/images/company2.jpeg">
            </div>
        </div>

        <div class="second-row d-flex justify-content-between align-items-center">
            <div class="computer d-flex flex-column align-items-center justify-content-center">
                <i class="uil uil-desktop icon"></i>
                <p class="elegant">ELEGANTAN / JEDINSTVEN DIZAJN</p>
                <p class="text-lorem">Posvećeni smo stvaranju elegantnih i jedinstvenih dizajna koji ne samo da privlače
                    pažnju, već i pružaju nezaboravno iskustvo korisnicima.</p>

            </div>

            <div class="picture d-flex flex-column align-items-center justify-content-center">
                <i class="uil uil-scenery icon"></i>
                <p class="elegant">JEDNOSTAVNOST KORIŠĆENJA</p>
                <p class="text-lorem">Naš cilj je da sve učinimo jednostavnim, od procesa registracije do pronalaženja
                    posla, kako bi korisnici mogli da se fokusiraju na ono što je zaista važno.</p>

            </div>

            <div class="trophy d-flex flex-column align-items-center justify-content-center">
                <i class="uil uil-trophy icon"></i>
                <p class="elegant">RAZLIČITI TIPOVI IZGLEDA</p>
                <p class="text-lorem">Nudimo različite tipove izgleda koji zadovoljavaju različite potrebe i ukuse,
                    omogućavajući personalizovano iskustvo za svakog korisnika.</p>

            </div>
        </div>
    </div>
@endsection
