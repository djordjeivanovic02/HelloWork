<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/widget.css') }}">
</head>
<body>
    <div class="container-fluid p-0 d-flex flex-column align-items-center justify-content-center">
        <div class="welcome-main-container w-100 d-flex bg-white">
            <div class="main-container w-100 h-100 d-flex flex-column align-items-center justify-content-center">

                <div class="navigation-container container d-flex justify-content-between bg-white">
                    <div class="logo-container d-flex align-items-center">
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
                @include('parts.login')
            </div>
        </div>

    </div>
</body>
</html>