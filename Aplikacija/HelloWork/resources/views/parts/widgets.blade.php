<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/widget.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    
</head>
<body class="p-4">
    <div class="">

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
            <div class="w-100 d-flex justify-content-end">
                <div class="x d-flex align-items-center justify-content-center">
                    <p class="text-X">X</p>
                </div>
            </div>
            <div class="w-100 text-center">
                <p class="title">Prijavi se na Hello Work</p>
            </div>
               
            
            <div class="username-email">
                <p class="text-username">Korisničko ime ili email adresa</p>
                <input type="text" class="input-login" placeholder="Unesi ovde"></input>
            </div>
            <div class="password">
                <p class="text-password">Lozinka</p>
                <input type="text" class="input-login" placeholder="Lozinka"></input>
            </div>

            <div class="zapamtiIzaboravili d-flex justify-content-between w-100 align-items-center">
                <div class="d-flex">
                    <input type="checkbox" class="zapamti">
                    <p class="text-zapamti">Zapamti me</p>
                </div>
                <a class="zaboravili" href="#">Zaboravili ste lozinku?</a>
            </div>   
            
            <input type="button" class="button-prijavi-se d-flex align-items-center justify-content-center" value="Prijavi se">

            <div class="registration d-flex">
                <p class="text-registration">Još uvek nemate nalog? <a class="text-prijava-registration" href="#"><span class="registruj-se">Registruj se</span></a>
            </div>

        </div> --}}
{{-- Peti element - login --}}

{{-- <div class="login-container d-flex flex-column align-items-center shadow">
    <div class="w-100 d-flex justify-content-end">
        <input type="button" class="x d-flex align-items-center justify-content-center shadow" value="X">
    </div>
    <div class="w-100 text-center">
        <p class="title">Prijavi se na Hello Work</p>
    </div>
       
    
    <div class="username-email">
        <p class="text-username">Korisničko ime ili email adresa</p>
        <input type="text" class="input-login" placeholder="Unesi ovde"></input>
    </div>
    <div class="password">
        <p class="text-password">Lozinka</p>
        <div class="position-relative d-flex justify-content-between">
            <input type="password" class="input-login" placeholder="Lozinka">
            <img class="password-show position-absolute" src="/images/eye-show.svg">
        </div>
    </div>

    <div class="zapamtiIzaboravili d-flex justify-content-between w-100 align-items-center">
        <div class="da d-flex">
            <input type="checkbox" class="zapamti">
            <p class="text-zapamti">Zapamti me</p>
        </div>
        <a class="zaboravili" href="#">Zaboravili ste lozinku?</a>
    </div>   
    
    <input type="button" class="button-prijavi-se d-flex align-items-center justify-content-center" value="Prijavi se">

    <div class="registration">
        <p class="text-registration">Još uvek nemate nalog?</p> <a class="text-prijava-registration" href="#"><span class="registruj-se">Registruj se</span></a>
    </div>
</div> --}}


{{-- Sesti element - registracija --}}


{{-- <div class="login-container d-flex flex-column align-items-center shadow">
    <div class="w-100 d-flex justify-content-end">
        <input type="button" class="x d-flex align-items-center justify-content-center shadow" value="X">
    </div>
    <div class="w-100 text-center">
        <p class="title">Registruj se na Hello Work</p>
    </div>
    
    <div class="kandidat-poslodavac d-flex align-items-center justify-content-between w-100">
        <button class="kandidat d-flex align-items-center justify-content-center">
            <img src="/images/person.svg">
            <p class="kandidat-poslodavac-text">Kandidat</p>   
        </button>
        <button class="poslodavac d-flex align-items-center justify-content-center">
            <img src="/images/aktovka.svg">
            <p class="kandidat-poslodavac-text">Poslodavac</p>
        </button>
    </div> --}}

    {{-- <div class="username-email">
        <p class="text-username">Korisničko ime ili email adresa</p>
        <input type="text" class="input-login" placeholder="Unesi ovde"></input>
    </div>
    <div class="password">
        <p class="text-password">Lozinka</p>
        <div class="position-relative d-flex justify-content-between">
            <input type="password" class="input-login" placeholder="Lozinka">
            <img class="password-show position-absolute" src="/images/eye-show.svg">
        </div>
    </div>
    
    <input type="button" class="button-prijavi-se d-flex align-items-center justify-content-center" value="Registruj se">

    <div class="registration">
        <p class="text-registration">Već imate nalog?</p> <a class="text-prijava-registration" href="#"><span class="registruj-se">Prijavi se</span></a>
    </div>
</div> --}}



{{-- Sedmi element - Petar Petrovic --}}

<div class="container-fluid p-0 d-flex flex-column align-items-center justify-content-center">
    <div class="welcome-main-container w-100 d-flex bg-white">
        <div class="main-container w-100 h-100 d-flex flex-column align-items-center justify-content-center">
            <div class="navigation-container container d-flex justify-content-between bg-white">
                <div class="header-logo-container d-flex align-items-center">
                    <img src="images/logo.svg" alt="logo">
                    {{-- Dodati tekst za logo --}}
                </div>
                <div class="navigation-main d-flex align-items-center gap-5">
                    <a href="#">POČETNA</a>
                    <a href="#">PRONAĐI POSAO</a>
                    <a href="#">ZA KANDIDATE</a>
                    <a href="#">ZA KOMPANIJE</a>
                    <a href="#">O NAMA</a>
                </div>
                <div class="actions-container d-flex align-items-center gap-4">
                    <a href="#" class="text-decoration-none">Dodajte Vaš CV</a>
                    <button class="login-register-button h-100 border-0 rounded p-3">Prijava / Registracija</button>
                    <button class="add-job-button h-100 border-0 rounded p-3 text-white">Postavi Posao</button>
                </div>
            </div>
            @yield('welcome-content')
            @yield('search-job')
            {{-- @include('parts.login') --}}
        </div>
    </div>
</div>


<div class="whole-container d-flex flex-row justify-content-center align-items-start">
    <div class="left-div shadow-lg">
        <img>
        <p class="ime-prezime-levi">Petar Petrović</p>
        <p class="zanimanje">Web developer</p>
    </div>
    <div class="right-div shadow-lg">
        <p class="osnovne-kontakt-informacije">OSNOVNE INFORMACIJE</p>
        <hr>

        <div class="ime-prezime-desni d-flex flex-row">
            <div class="ime d-flex flex-column w-100">
                <p class="isti-text">Vaše ime:</p>
                <input class="isti-input" type="text" placeholder="Petar">
            </div>
            <div class="zanimanje d-flex flex-column w-100">
                <p class="isti-text">Vaše prezime:</p>
                <input class="isti-input" type="text" placeholder="Petrović">
            </div>  
        </div>

        <div class="godine-jezici d-flex flex-row">
            <div class="godine d-flex flex-column w-100">
                <p class="isti-text">Godine:</p>
                <input class="isti-input" type="number" placeholder="32">
            </div>
            <div class="jezici d-flex flex-column w-100">
                <p class="isti-text">Jezici:</p>
                <input class="isti-input" type="text" placeholder="španski, engleski..">
            </div>
        </div>

        <div class="trenutna-ocekivana-plata d-flex flex-row">
            <div class="trenutna-plata d-flex flex-column w-100">
                <p class="isti-text">Trenutna plata: (€)</p>
                <input class="isti-input" type="number" placeholder="1000€">
            </div>
            <div class="ocekivana-plata d-flex flex-column w-100">
                <p class="isti-text">Očekivana plata: (€)</p>
                <input class="isti-input" type="number" placeholder="1600€">
            </div>
        </div>

        <div class="tekst-neki d-flex flex-column w-100">
            <p class="isti-text">Tekst neki:</p>
            <textarea class="textarea" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."></textarea>
        </div>

        <p class="osnovne-kontakt-informacije">KONTAKT INFORMACIJE</p>
        <hr>

        <div class="broj-email d-flex flex-row">
            <div class="broj d-flex flex-column w-100">
                <p class="isti-text">Broj telefona:</p>
                <input class="isti-input" type="number" placeholder="+381 2307190">
            </div>
            <div class="email d-flex flex-column w-100">
                <p class="isti-text">Email adresa:</p>
                <input class="isti-input" type="text" placeholder="example@gmail.com">
            </div>
        </div>

        <div class="zemlja-postanski-broj d-flex flex-row">
            <div class="zemlja d-flex flex-column w-100">
                <p class="isti-text">Zemlja: </p>
                <input class="isti-input" type="text" placeholder="1000€">
            </div>
            <div class="postanski-broj d-flex flex-column w-100">
                <p class="isti-text">Poštanski broj:</p>
                <input class="isti-input" type="number" placeholder="16000">
            </div>
        </div>

        <div class="grad-adresa d-flex flex-row">
            <div class="grad d-flex flex-column w-100">
                <p class="isti-text">Grad:</p>
                <input class="isti-input" type="text" placeholder="Leskovac">
            </div>
            <div class="adresa d-flex flex-column w-100">
                <p class="isti-text">Adresa:</p>
                <input class="isti-input" type="text" placeholder="Toplička 34A">
            </div>
        </div>

        <div class="w-50">
            <input class="button-end" type="button" value="Sačuvaj izmene">
        </div>
    </div>
</div>


        
        {{-- <div style="height: 200px">
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
    </div> --}}
</body>
</html>
