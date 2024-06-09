<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/change-password.css') }}">

    <div class="container" id="input-cont">
        <div class="row d-flex justify-content-center">
            <div class="main-container2 col-sm-5 mt-4">
                <h1>Promena Lozinke</h1>
                <label>Nova Lozinka</label>
                <div class="form-group pass_show">
                    <input type="password" value="" id="newPassword" class="form-control"
                        placeholder="Nova Lozinka">
                </div>
                <label>Potvrdi Novu Lozinku</label>
                <div class="form-group pass_show">
                    <input type="password" value="" id="repeatedPassword" class="form-control"
                        placeholder="Potvrdi Novu Lozink">
                </div>
                <p id="error-message">Došlo je do greške</p>
                <div class="w-100">
                    <button class="w-100" onclick="changePassword({{ $id }})">Sačuvaj promene</button>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/verification.css') }}">

    <div class="main-container w-100 justify-content-center" id="success" style="display: none">
        <div class="content-container w-100 d-flex flex-column align-items-center">
            <div class="image-container">
                <svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                    <title />
                    <path
                        d="M64,0a64,64,0,1,0,64,64A64.07,64.07,0,0,0,64,0Zm0,122a58,58,0,1,1,58-58A58.07,58.07,0,0,1,64,122Z"
                        fill="#34A873" />
                    <path
                        d="M87.9,42.36,50.42,79.22,40.17,68.43a3,3,0,0,0-4.35,4.13l12.35,13a3,3,0,0,0,2.12.93h.05a3,3,0,0,0,2.1-.86l39.65-39a3,3,0,1,0-4.21-4.28Z"
                        fill="#34A873" />
                </svg>
            </div>
            <h1>Lozinka promenjena</h1>
            <p>Vaša lozinka je uspešno promenjena. Možete se vratiti na stranicu platforme HelloWork i da se ulogujete
                novom
                lozinkom</p>

        </div>
    </div>


    <div class="main-container w-100 justify-content-center" id="error" style="display: none">
        <div class="content-container w-100 d-flex flex-column align-items-center">
            <div class="image-container">
                <svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                    <title />
                    <path
                        d="M64,0a64,64,0,1,0,64,64A64.07,64.07,0,0,0,64,0Zm0,122a58,58,0,1,1,58-58A58.07,58.07,0,0,1,64,122Z"
                        fill="#DC3546" />
                    <path
                        d="M92.12,35.79a3,3,0,0,0-4.24,0L64,59.75l-23.87-24A3,3,0,0,0,35.88,40L59.76,64,35.88,88a3,3,0,0,0,4.25,4.24L64,68.25l23.88,24A3,3,0,0,0,92.13,88L68.24,64,92.13,40A3,3,0,0,0,92.12,35.79Z"
                        fill="#DC3546" />
                </svg>
            </div>
            <h1>Greška prilikom promene lozinke</h1>
            <p>Došlo je do greške prilikom promene lozinke. Molimo pokušajte kasnije.</p>

        </div>
    </div>

</body>
<script src="{{ asset('js/reset-password.js') }}"></script>
