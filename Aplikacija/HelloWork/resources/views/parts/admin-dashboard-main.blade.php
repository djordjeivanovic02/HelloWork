<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="{{ asset('images/logo.svg') }}">
            </div>

            <span class="logo_name">Hello<span style="color: #613FE5">Work</span></span>
        </div>

        <div class="menu-items">
            <ul class="nav-links mx-0 px-2">
                <li><a href="/dashboard">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Kontrolna tabla</span>
                    </a></li>
                <li><a href="/for-check">
                        <i class="uil uil-shield-check"></i>
                        <span class="link-name">Za proveru</span>
                    </a></li>
                <li><a href="/candidates">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Kandidati</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-bag"></i>
                        <span class="link-name">Poslodavci</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-file-check"></i>
                        <span class="link-name">Apliciranja</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-exclamation-octagon"></i>
                        <span class="link-name">Prijavljeni nalozi</span>
                    </a></li>
            </ul>

            <ul class="logout-mode m-0 p-0">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Odjavi se</span>
                    </a></li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <img src="{{ asset('images/person.svg') }}">
        </div>
        @yield('dashboard')
        @yield('for-check')
        @yield('candidates')

</body>
<script src="{{ asset('js/admin/admin-dashboard.js') }}"></script>

</html>
