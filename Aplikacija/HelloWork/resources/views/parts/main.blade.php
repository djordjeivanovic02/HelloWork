<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/widget.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    {{-- HEADER --}}
    <div class="container-fluid p-0 d-flex flex-column align-items-center justify-content-center">
        <div class="welcome-main-container w-100 d-flex bg-white">
            <div class="main-container w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                <div class="navigation-container container d-flex justify-content-between bg-white">
                    <div class="header-logo-container d-flex align-items-center">
                        <img src="images/logo.svg" alt="logo">
                        {{-- Dodati tekst za logo --}}
                    </div>
                    <div class="navigation-main align-items-center gap-5">
                        <a href="#">POČETNA</a>
                        <a href="#">PRONAĐI POSAO</a>
                        <a href="#">ZA KANDIDATE</a>
                        <a href="#">ZA KOMPANIJE</a>
                        <a href="#">O NAMA</a>
                    </div>
                    <div class="actions-container d-flex align-items-center gap-4">
                        <a href="#" class="text-decoration-none add-your-cv">Dodajte Vaš CV</a>

                            <button class="login-register-button open-profile h-100 border-0 rounded p-3
                            @if($user !== NULL)
                                d-block
                            @else
                                d-none
                            @endif
                            "
                            >Pogledaj profil</button>
                            <button class="login-register-button h-100 border-0 rounded p-3
                            @if ($user !== NULL)
                                d-none
                            @else
                                d-block
                            @endif
                            "
                            id="login-register-button"
                            >Prijava / Registracija</button>
                        <button class="add-job-button h-100 border-0 rounded p-3 text-white">Postavi Posao</button>
                    </div>
                </div>
                @yield('welcome-content')
                @yield('search-job')
                {{-- @include('parts.login') --}}
            </div>
        </div>
    </div>

    {{-- Login Container --}}
    <div class="login-background-container deactive fixed-top align-items-center justify-content-around h-100">
        @include('parts.login-widget')
    </div>

    
    {{-- FOOTER --}}
    <div class="footer-container container-fluid w-100 p-0 d-flex justify-content-center">
        <div class="footer-main-container footer-w-100 position-relative w-100">
            <div class="newsletter-container w-100 position-absolute d-flex justify-content-between align-items-center">
                <h2 class="m-0 p-0">Pridruzite nam se da zajedno pronadjemo Vas posao iz snova!</h2>
                <button class="bg-white">Pretrazuj poslove</button>
            </div>
            <div class="footer-content-container w-100 d-flex justify-content-between align-items-start">
                <div class="footer-logo-info-container">
                    <div class="footer-logo d-flex align-items-center">
                        <img src="{{ asset('images/logo.svg') }}" alt="Logo Icon" style="width: 70px">
                        <h3 class="m-0 p-0">Hello <span>Work</span></h3>
                    </div>
                    <p class="p-0">Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    <div class="footer-logo d-flex align-items-center">
                        <svg viewBox="0 0 512 512">
                            <path d="M448 64H64C28.65 64 0 92.65 0 128v256c0 35.35 28.65 64 64 64h384c35.35 0 64-28.65 64-64V128C512 92.65 483.3 64 448 64zM64 112h384c8.822 0 16 7.178 16 16v22.16l-166.8 138.1c-23.19 19.28-59.34 19.27-82.47 .0156L48 150.2V128C48 119.2 55.18 112 64 112zM448 400H64c-8.822 0-16-7.178-16-16V212.7l136.1 113.4C204.3 342.8 229.8 352 256 352s51.75-9.188 71.97-25.98L464 212.7V384C464 392.8 456.8 400 448 400z"/>
                        </svg>
                        <a href="#" class="m-o p-0">team@aurora.rs</a>
                    </div>
                </div>
                <div class="footer-logo-info-container">
                    <h4>Korisni linkovi</h4>
                    <div class="d-flex flex-column">
                        <a href="#">Pronađi posao</a>
                        <a href="#">Postavi oglas</a>
                        <a href="#">Prijava</a>
                        <a href="#">Profil</a>
                        <a href="#">O nama</a>
                    </div>
                </div>
                <div class="footer-logo-info-container">
                    <h4>Kategorije</h4>
                    <div class="d-flex flex-column">
                        <a href="#">Web developer</a>
                        <a href="#">Poštar</a>
                        <a href="#">Apotekar</a>
                        <a href="#">Vozač autobusa</a>
                        <a href="#">Bibliotekar</a>
                        <a href="#">Više</a>
                    </div>
                </div>
                <div class="footer-logo-info-container">
                    <h4>Zaprati nas</h4>
                    <div class="d-flex flex-column">
                        <a href="#">Instagram</a>
                        <a href="#">Facebook</a>
                        <a href="#">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer2-container container-fluid w-100 d-flex justify-content-center">
        <p class="m-0 p-0">© 2024 HelloWork. Napravljeno od strane <span>Aurora Team</span>. Sva prava zadržana. </p>
    </div>

    <script src="{{ asset('js/click-handler.js') }}"></script>
</body>
</html>
