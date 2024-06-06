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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                <li><a href="/companies">
                        <i class="uil uil-bag"></i>
                        <span class="link-name">Poslodavci</span>
                    </a></li>
                <li><a href="/all-ads">
                        <i class="uil uil-file-check"></i>
                        <span class="link-name">Svi oglasi</span>
                    </a></li>
                <li><a href="/admin-support">
                        <i class="uil uil-exclamation-octagon"></i>
                        <span class="link-name">Podrška</span>
                    </a></li>
            </ul>

            <ul class="logout-mode m-0 p-0">
                <li><a onclick="showDialog('logout_dialog')" style="cursor: pointer">
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

            <img src="{{ asset('images/unknown-company.svg') }}">
        </div>
        @yield('dashboard')
        @yield('for-check')
        @yield('candidates')
        @yield('companies')
        @yield('all-ads')
        @yield('support')

</body>

@component('dialogs.notification', [
    'id' => 'logout_dialog',
    'type' => 'success',
    'title' => 'Odjava',
    'message' => 'Da li ste sigurni da želite da se odjavite?',
    'close' => true,
    'actions' => [
        [
            'url' => 'logOut()',
            'type' => 'yes',
            'label' => 'DA',
        ],
        [
            'url' => "closeDialog('logout_dialog')",
            'type' => 'cancel',
            'label' => 'Otkaži',
        ],
    ],
])
@endcomponent

<script src="{{ asset('js/dialogs/actions.js') }}"></script>
<script src="{{ asset('js/logout.js') }}"></script>
<script src="{{ asset('js/admin/admin-dashboard.js') }}"></script>

</html>
