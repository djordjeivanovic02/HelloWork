<link rel="stylesheet" href="{{ asset('css/verification.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="main-container w-100 d-flex justify-content-center">
    <div class="content-container w-100 d-flex flex-column align-items-center">
        <div class="image-container">
            @if ($type == 'success')
                <svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                    <title />
                    <path
                        d="M64,0a64,64,0,1,0,64,64A64.07,64.07,0,0,0,64,0Zm0,122a58,58,0,1,1,58-58A58.07,58.07,0,0,1,64,122Z"
                        fill="#34A873" />
                    <path
                        d="M87.9,42.36,50.42,79.22,40.17,68.43a3,3,0,0,0-4.35,4.13l12.35,13a3,3,0,0,0,2.12.93h.05a3,3,0,0,0,2.1-.86l39.65-39a3,3,0,1,0-4.21-4.28Z"
                        fill="#34A873" />
                </svg>
            @else
                <svg data-name="Livello 1" id="Livello_1" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                    <title />
                    <path
                        d="M64,0a64,64,0,1,0,64,64A64.07,64.07,0,0,0,64,0Zm0,122a58,58,0,1,1,58-58A58.07,58.07,0,0,1,64,122Z"
                        fill="#DC3546" />
                    <path
                        d="M92.12,35.79a3,3,0,0,0-4.24,0L64,59.75l-23.87-24A3,3,0,0,0,35.88,40L59.76,64,35.88,88a3,3,0,0,0,4.25,4.24L64,68.25l23.88,24A3,3,0,0,0,92.13,88L68.24,64,92.13,40A3,3,0,0,0,92.12,35.79Z"
                        fill="#DC3546" />
                </svg>
            @endif
        </div>
        @if ($type == 'success')
            <h1>Email Verifikovan</h1>
            <p>Vaša email adresa je uspešno verifikovana! Možete zatvoriti stranicu i nastaviti na prijavljivanje.</p>
        @else
            <h1>Email nije Verifikovan</h1>
            <p>Došlo je do greške prilikom verifikovanja email adrese. Molimo pokušajte kasnije.</p>
        @endif
    </div>
</div>
