<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/widget.css') }}">
</head>
<body class="centaar d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column">

        {{-- Prvi element --}}

        {{-- <div class="allaround-container d-flex flex-column align-items-center justify-content-center shadow-lg" >
            <div class="img-container d-flex align-items-center justify-content-center shadow">
                <img src="/images/Lupa-logo.svg"></img>
            </div>
            <p class="text-pretraga"> Pretražuj poslove </p>
            <p class="text-pronadji text-center"> Pronađite poslove koji odgovaraju vašim veštinama i intereseovanjima brzo i jednostavno. </p>
        </div> --}}
        

        {{-- Drugi element --}}

        {{-- <div class="spoljni-container d-flex flex-column align-items-center justify-content-center">
            <p class="gornji-text"> UI/Ux Dizajner </p>
            <p class="donji-text"> 100+ Novih Poslova </p>
        </div> --}}

        {{-- Treći element --}}

        {{-- <div class="out-container d-flex flex-column shadow">
            <div class="first-row d-flex flex-row justify-content-end">
                <p class="before2">Pre 2 dana</p>
                <div class="full-time-div">
                    <p class="full-time-text">Full Time</p>
                </div>
            </div>
            <div class="second-row d-flex flex-row">
                <div class="logo-container d-flex align-items-center justify-content-center">
                    <img src="/images/Windows-logo.svg"></img>
                </div>
                <div class="text-second-row d-flex flex-column">
                    <p class="top-text">Microsoft, Beograd</p>
                    <p class="bottom-text">Web Dizajner</p>
                </div>
            </div>
            <div class="third-row">
                <p class="text-third-row">Radite u dinamičnom okruženju s vrhunskim stručnjacima i doprinosite inovativnim rešenjima.</p>
            </div>
            <div class="fourth-row d-flex justify-content-between align-items-center">
                <div class="button d-flex align-items-center justify-content-center">
                    <p class="button-text">Apliciraj sada</p>
                </div>
                <div class="pricemonth-div d-flex align-items-center justify-content-center">
                    <p> 
                        <span class="price"> 830€ </span>
                        <span class="month">/Mesečno </span>
                    </p>
                </div>
            </div>
        </div> --}}

        {{-- Četvrti element --}}

        {{-- <div class="long-container d-flex flex-column">
            <div class="prvi-red d-flex flex-row">
                <div class="image-div">
                    <img src="/images/Windows-logo.svg"></img>
                </div>
                <div class="text d-flex flex-column">
                    <p class="above-text">Senior Dizajner Proizvoda</p>
                    <div class="all-informations d-flex flex-row">
                        <img src="/images/Aktovka.svg"><span class="text-in-span">Start up</span></img>
                        <img src="/images/Lokacija.svg"><span class="text-in-span">Beograd, Srbija</span></img>
                        <img src="/images/Sat.svg"><span class="text-in-span">pre 12 sati</span></img>
                        <img src="/images/Zarada.svg"><span class="text-in-span">€700 - €1800</span></img>
                </div>
                <div class="down-button d-flex align-items-center justify-content-center">
                    <p class="down-button-text">Privremeni</p>
                </div>
            </div>
            <div class="save-it-div d-flex align-items-start">
                <img src="/images/Sacuvaj.svg"></img>
            </div>
        </div> --}}

        {{-- Peti element - login --}}

        {{-- <div class="login-container d-flex flex-column align-items-center shadow">
            
            <div class="gornji-deo d-flex flex-row align-items-center justify-content-center">
                <p class="title">Prijavi se na Hello Work</p>
                <div class="x d-flex align-items-center justify-content-center">
                    <p class="text-X">X</p>
                </div>
            </div>
            <div class="username-email">
                <p class="text-username">Korisničko ime ili email adresa</p>
                <div class="unesi-ovde d-flex align-items-center justify-content-start">
                    <p class="text-inside-username">Unesi ovde</p>
                </div>
            </div>
            <div class="password">
                <p class="text-password">Lozinka</p>
                <div class="">
                    <p class="text-inside-password">Lozinka</p>
                </div>
            </div>

            <div class="zapamtiIzaboravili d-flex">
                <div class="zapamti">
                    <div class="checkbox">
                        <p class="text-zapamti">Zapamti me</p>
                    </div>
                </div>    
                <p class="zaboravili">Zaboravili ste lozinku?</p>
            </div>   
            
            <div class="button-prijavi-se d-flex align-items-center justify-content-center">
                <p class="text-inside-button">Prijavi se</p>
            </div>

            <div class="registration d-flex">
                <p class="text-registration">Još uvek nemate nalog? <p><span class="text-prijava-registration">Registruj se</span></p>
            </div>
        </div>
        <p>Blabla</p> --}}

        <div style="height: 200px">
            <div class="position-relative select-toggler-container d-flex align-items-center">
                <div class="position-absolute select-toggler"></div>
            </div>
        </div>

        <script>
            const element = document.querySelector('.select-toggler-container');
            element.addEventListener('click', function(){
                const toggler = element.querySelector('.select-toggler');
                if(element.classList.contains('active')){
                    this.classList.remove('active');
                    this.classList.add('close');

                    toggler.classList.remove('active');
                    toggler.classList.add('close');
                }else{
                    this.classList.remove('close');
                    this.classList.add('active');

                    toggler.classList.remove('close');
                    toggler.classList.add('active');
                }
            })

        </script>
    </div>
</body>
</html>
