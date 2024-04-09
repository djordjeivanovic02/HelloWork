<link rel="stylesheet" href="{{ asset('css/login-register.css') }}">

<div class="login-container d-flex flex-column align-items-center shadow bg-white">
    <div class="w-100 d-flex justify-content-end">
        <div class="x close-box d-flex align-items-center justify-content-center">
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
        <input type="password" class="input-login" placeholder="Lozinka"></input>
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
</div>

