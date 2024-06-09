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
        
                <div class="ime-zanimanje-desni d-flex flex-row">
                    <div class="ime d-flex flex-column w-100">
                        <p class="isti-text">Vaše ime:</p>
                        <input class="isti-input" type="text" placeholder="Petar Petrović">
                    </div>
                    <div class="zanimanje d-flex flex-column w-100">
                        <p class="isti-text">Zanimanje:</p>
                        <input class="isti-input" type="text" placeholder="Web developer">
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
                        <input class="isti-input" type="text" placeholder="Srbija">
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
    </body>
</html>
    