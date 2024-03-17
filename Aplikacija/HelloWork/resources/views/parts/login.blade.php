<div class="login-background-container w-100 h-100 position-fixed top-0 start-0 d-flex justify-content-center align-items-center">
    <div class="login-container d-flex flex-column align-items-center shadow bg-white">
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
</div>
<script src="{{ asset('js/login.js') }}"></script>