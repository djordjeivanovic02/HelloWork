@php
    $images = [
        ["Lupa-logo", "Pretražuj poslove", "Pronađite poslove koji odgovaraju vašim veštinama i intereseovanjima brzo i jednostavno."],
        ["cv", "Kreiraj CV", "Osvrnite se na naše jednostavno korisničko iskustvo za kreiranje CV-a i stvorite impresivan dokument."],
        ["create-profile", "Kreiraj nalog", "Kreirajte nalog brzo i jednostavno kako biste pristupili ekskluzivnim funkcijama, sačuvali omiljene poslove..."],
        ["apply", "Apliciraj", "Uz naš jednostavan proces aplikacije, otvorite vrata novim profesionalnim prilikama i ostvarite svoje karijerne ciljeve."]
    ];
    
@endphp

@for ($i = 0; $i < 4; $i++)   
<div class="d-inline-block p-2">
    <div class="allaround-container shadow-lg position-relative" >
        <div class="hover-indicator position-absolute w-100 top-0"></div>
        <div class="allaround-main w-100 h-100 d-flex flex-column align-items-center justify-content-center position-relative">
            <div class="img-container d-flex align-items-center justify-content-center shadow">
                <img src="/images/{{ $images[$i][0] }}.svg"></img>
            </div>
            <p class="text-pretraga"> {{ $images[$i][1] }} </p> 
            <p class="text-pronadji text-center">{{ $images[$i][2] }}</p>
        </div>
    </div>
</div>
@endfor