<link rel="stylesheet" href="{{ asset('css/login-register.css') }}">

<div class="login-container d-flex flex-column align-items-center shadow bg-white w-50">
    <div class="w-100 d-flex justify-content-end">
        <input type="button" class="x close-box d-flex align-items-center justify-content-center shadow" value="X">
    </div>
    <div class="w-100 text-center">
        <p class="title">Prijavi se na Hello Work</p>
    </div>
    <div class="w-100 login-error-container">
        <b>Neispravni podaci</b>
        <p>Neispravna email adresa ili lozinka</p>
    </div>
    <div class="username-email">
        <p class="text-username">Email adresa:</p>
        <input type="text" class="input-login" placeholder="Unesi ovde" id="login-email">
    </div>
    <div class="password">
        <p class="text-password">Lozinka:</p>
        <div class="position-relative d-flex justify-content-between">
            <input type="password" class="input-login input-log" placeholder="Lozinka" id="login-password">
            <img class="password-show position-absolute" src="/images/eye-show.svg" for-input="input-log">
        </div>
    </div>

    <div class="zapamtiIzaboravili d-flex justify-content-between w-100 align-items-center">
        <div class="da d-flex">
            <input type="checkbox" class="zapamti">
            <p class="text-zapamti">Zapamti me</p>
        </div>
        <a class="zaboravili" href="#" onclick="changePasswordMail(this)">Zaboravili ste lozinku?</a>
    </div>

    <input type="button" class="button-prijavi-se align-items-center justify-content-center" value="Prijavi se"
        id="login-btn">
    <div class="button-prijavi-se loading align-items-center justify-content-center" id="login-loading">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading">
    </div>
    <div class="registration">
        <p class="text-registration">Još uvek nemate nalog?</p> <a class="text-prijava-registration"
            href="#"><span class="registruj-se">Registruj se</span></a>
    </div>
</div>

<div class="login-container register-container d-flex flex-column align-items-center shadow active bg-white w-50">
    <div class="w-100 d-flex justify-content-end">
        <input type="button" class="x close-box d-flex align-items-center justify-content-center shadow"
            value="X">
    </div>
    <div class="w-100 text-center">
        <p class="title">Registruj se na Hello Work</p>
    </div>
    <div class="w-100 register-error-container">
        <b>Neispravni podaci</b>
        <p>Neispravna email adresa ili lozinka</p>
    </div>
    <div class="kandidat-poslodavac d-flex align-items-center justify-content-between w-100">
        <button class="kandidat profile-type active d-flex align-items-center justify-content-center">
            {{-- <img src="/images/person.svg"> --}}
            <svg width="20" height="20" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg"
                class="person-icon">
                <path
                    d="M13.7425 5.70939C13.7425 5.88986 13.7302 6.07032 13.7077 6.24874C13.7179 6.17697 13.7282 6.10314 13.7364 6.03136C13.6871 6.3882 13.5928 6.73478 13.4554 7.067C13.4821 7.00138 13.5108 6.93575 13.5374 6.87013C13.4 7.19415 13.2237 7.49767 13.0083 7.77658L13.1375 7.61046C12.9243 7.88527 12.6761 8.13341 12.4013 8.34669L12.5674 8.21749C12.2885 8.43077 11.985 8.60919 11.661 8.74659C11.7266 8.71993 11.7922 8.69122 11.8578 8.66456C11.5256 8.80197 11.179 8.8963 10.8222 8.94552C10.894 8.93527 10.9678 8.92501 11.0396 8.91681C10.6807 8.96398 10.3198 8.96398 9.96087 8.91681C10.0327 8.92706 10.1065 8.93732 10.1783 8.94552C9.82142 8.8963 9.47484 8.80197 9.14261 8.66456C9.20824 8.69122 9.27386 8.71993 9.33949 8.74659C9.01546 8.60919 8.71195 8.43283 8.43304 8.21749L8.59916 8.34669C8.32435 8.13341 8.07621 7.88527 7.86293 7.61046L7.99212 7.77658C7.77884 7.49767 7.60043 7.19415 7.46302 6.87013C7.48968 6.93575 7.51839 7.00138 7.54505 7.067C7.40765 6.73478 7.31332 6.3882 7.2641 6.03136C7.27435 6.10314 7.28461 6.17697 7.29281 6.24874C7.24564 5.88986 7.24564 5.52892 7.29281 5.17003C7.28255 5.24181 7.2723 5.31564 7.2641 5.38742C7.31332 5.03058 7.40765 4.684 7.54505 4.35177C7.51839 4.4174 7.48968 4.48302 7.46302 4.54865C7.60043 4.22462 7.77679 3.92111 7.99212 3.6422L7.86293 3.80831C8.07621 3.53351 8.32435 3.28536 8.59916 3.07208L8.43304 3.20128C8.71195 2.988 9.01546 2.80958 9.33949 2.67218C9.27386 2.69884 9.20824 2.72755 9.14261 2.75421C9.47484 2.61681 9.82142 2.52247 10.1783 2.47325C10.1065 2.48351 10.0327 2.49376 9.96087 2.50197C10.3198 2.4548 10.6807 2.4548 11.0396 2.50197C10.9678 2.49171 10.894 2.48146 10.8222 2.47325C11.179 2.52247 11.5256 2.61681 11.8578 2.75421C11.7922 2.72755 11.7266 2.69884 11.661 2.67218C11.985 2.80958 12.2885 2.98595 12.5674 3.20128L12.4013 3.07208C12.6761 3.28536 12.9243 3.53351 13.1375 3.80831L13.0083 3.6422C13.2216 3.92111 13.4 4.22462 13.5374 4.54865C13.5108 4.48302 13.4821 4.4174 13.4554 4.35177C13.5928 4.684 13.6871 5.03058 13.7364 5.38742C13.7261 5.31564 13.7159 5.24181 13.7077 5.17003C13.7302 5.34845 13.7405 5.52892 13.7425 5.70939C13.7446 6.138 14.1178 6.55021 14.5628 6.5297C15.0058 6.50919 15.3852 6.16876 15.3831 5.70939C15.379 4.72706 15.0837 3.72218 14.5054 2.92238C14.3495 2.70704 14.1834 2.49581 13.9989 2.30509C13.8122 2.11232 13.6072 1.9462 13.3939 1.78419C13.0063 1.48888 12.5736 1.2715 12.1142 1.10333C10.2623 0.424524 8.02904 1.0295 6.77601 2.55529C6.60375 2.76447 6.43968 2.98185 6.30023 3.21564C6.16078 3.44738 6.05209 3.69347 5.9516 3.94367C5.76293 4.40714 5.66654 4.89933 5.62757 5.39767C5.55169 6.37384 5.80599 7.39308 6.31459 8.2298C6.80472 9.0378 7.54505 9.73097 8.41048 10.1227C8.66478 10.2375 8.92523 10.3442 9.19593 10.42C9.46458 10.4939 9.73734 10.5349 10.0142 10.5677C10.5187 10.6272 11.0334 10.5861 11.5318 10.4857C13.4246 10.1001 15.0099 8.46974 15.3032 6.55636C15.3462 6.27745 15.379 5.99855 15.379 5.71554C15.3811 5.28693 14.9996 4.87472 14.5587 4.89523C14.1158 4.90958 13.7425 5.25001 13.7425 5.70939ZM16.4639 18.5329H5.94134C5.47582 18.5329 5.01029 18.537 4.54476 18.5329C4.49349 18.5329 4.44222 18.5288 4.393 18.5227C4.46478 18.5329 4.53861 18.5432 4.61039 18.5514C4.52836 18.5391 4.45043 18.5165 4.37455 18.4858C4.44017 18.5124 4.5058 18.5411 4.57142 18.5678C4.48939 18.5329 4.41351 18.4878 4.34173 18.4324L4.50785 18.5616C4.44632 18.5104 4.3889 18.455 4.33968 18.3935L4.46888 18.5596C4.41351 18.4878 4.37044 18.4119 4.33353 18.3299C4.36019 18.3955 4.3889 18.4611 4.41556 18.5268C4.3848 18.4509 4.36429 18.3709 4.34994 18.2909C4.36019 18.3627 4.37044 18.4365 4.37865 18.5083C4.34584 18.2602 4.36839 17.9977 4.36839 17.7475V16.8697C4.36839 16.6503 4.3807 16.4329 4.40941 16.2155C4.39916 16.2873 4.3889 16.3611 4.3807 16.4329C4.43812 16.0125 4.54886 15.6003 4.71498 15.2086C4.68832 15.2742 4.6596 15.3399 4.63294 15.4055C4.79291 15.0322 4.99798 14.6816 5.24613 14.3596L5.11693 14.5257C5.36507 14.2078 5.65013 13.9207 5.97005 13.6726L5.80394 13.8018C6.12591 13.5536 6.4766 13.3485 6.84984 13.1886C6.78421 13.2152 6.71859 13.244 6.65296 13.2706C7.04466 13.1066 7.45482 12.9938 7.87728 12.9363C7.8055 12.9466 7.73168 12.9568 7.6599 12.9651C7.96341 12.9261 8.26488 12.924 8.57044 12.924H12.3234C12.6618 12.924 12.9981 12.922 13.3365 12.9651C13.2647 12.9548 13.1909 12.9445 13.1191 12.9363C13.5395 12.9938 13.9517 13.1045 14.3434 13.2706C14.2778 13.244 14.2121 13.2152 14.1465 13.1886C14.5198 13.3485 14.8704 13.5536 15.1924 13.8018L15.0263 13.6726C15.3442 13.9207 15.6313 14.2058 15.8794 14.5257L15.7502 14.3596C15.9984 14.6816 16.2035 15.0322 16.3634 15.4055C16.3368 15.3399 16.308 15.2742 16.2814 15.2086C16.4454 15.6003 16.5582 16.0105 16.6157 16.4329C16.6054 16.3611 16.5951 16.2873 16.5869 16.2155C16.6259 16.5252 16.628 16.8328 16.628 17.1445V18.1597C16.628 18.2766 16.6321 18.3935 16.6177 18.5083C16.628 18.4365 16.6382 18.3627 16.6464 18.2909C16.6341 18.373 16.6116 18.4509 16.5808 18.5268C16.6075 18.4611 16.6362 18.3955 16.6628 18.3299C16.628 18.4119 16.5828 18.4878 16.5275 18.5596L16.6567 18.3935C16.6054 18.455 16.55 18.5124 16.4885 18.5616L16.6546 18.4324C16.5828 18.4878 16.507 18.5309 16.4249 18.5678C16.4906 18.5411 16.5562 18.5124 16.6218 18.4858C16.5459 18.5165 16.466 18.537 16.386 18.5514C16.4577 18.5411 16.5316 18.5309 16.6034 18.5227C16.5582 18.5288 16.5111 18.5309 16.4639 18.5329C16.2527 18.535 16.0353 18.6232 15.8835 18.7729C15.742 18.9144 15.6333 19.1482 15.6436 19.3532C15.6641 19.7921 16.0045 20.1797 16.4639 20.1735C17.2617 20.1612 17.963 19.6403 18.1968 18.8754C18.2891 18.5719 18.2686 18.2458 18.2686 17.9341C18.2686 17.2204 18.2911 16.5129 18.1681 15.8054C17.9876 14.7697 17.4667 13.7956 16.7531 13.0307C16.0394 12.2657 15.0796 11.7038 14.0645 11.4536C13.4821 11.3101 12.8955 11.2875 12.3008 11.2875H8.66273C8.05365 11.2875 7.44867 11.3162 6.85599 11.4741C5.84906 11.7407 4.9016 12.3088 4.20228 13.0799C3.49681 13.8571 2.98617 14.8333 2.82005 15.8751C2.70931 16.5744 2.73187 17.2758 2.73187 17.9813C2.73187 18.3053 2.71341 18.6437 2.83031 18.9533C2.98207 19.3512 3.22406 19.665 3.57884 19.9008C3.8557 20.0833 4.20638 20.1715 4.53451 20.1756C4.69447 20.1776 4.85443 20.1756 5.01439 20.1756H16.466C16.8946 20.1756 17.3068 19.7983 17.2863 19.3553C17.2658 18.9082 16.9253 18.5329 16.4639 18.5329Z" />
            </svg>
            <p class="kandidat-poslodavac-text">Kandidat</p>
        </button>
        <button class="poslodavac profile-type d-flex align-items-center justify-content-center">
            {{-- <img src="/images/aktovka.svg"> --}}
            <svg width="20" height="20" viewBox="0 0 13 12" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.8 2.52632V1.26316H5.2V2.52632H7.8ZM1.3 4.42105V10.1053C1.3 10.4526 1.5925 10.7368 1.95 10.7368H11.05C11.4075 10.7368 11.7 10.4526 11.7 10.1053V4.42105C11.7 4.07368 11.4075 3.78947 11.05 3.78947H1.95C1.5925 3.78947 1.3 4.07368 1.3 4.42105ZM11.7 2.52632C12.4215 2.52632 13 3.08842 13 3.78947V10.7368C13 11.4379 12.4215 12 11.7 12H1.3C0.5785 12 0 11.4379 0 10.7368L0.00649999 3.78947C0.00649999 3.08842 0.5785 2.52632 1.3 2.52632H3.9V1.26316C3.9 0.562105 4.4785 0 5.2 0H7.8C8.5215 0 9.1 0.562105 9.1 1.26316V2.52632H11.7Z" />
            </svg>
            <p class="kandidat-poslodavac-text">Poslodavac</p>
        </button>
    </div>

    <div class="username-email">
        <p class="text-username">Korisničko ime ili email adresa</p>
        <input type="text" class="input-login" id='register-email' placeholder="Unesi ovde">
    </div>
    <div class="password">
        <p class="text-password">Lozinka</p>
        <div class="position-relative d-flex justify-content-between">
            <input type="password" class="input-login input-register" id='register-password' placeholder="Lozinka">
            <img class="password-show position-absolute" src="/images/eye-show.svg" for-input="input-register">
        </div>
    </div>

    <input type="button" class="button-prijavi-se align-items-center justify-content-center" value="Registruj se"
        id="register-btn">

    <div class="button-prijavi-se loading align-items-center justify-content-center" id="register-loading">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading">
    </div>
    <div class="registration">
        <p class="text-registration">Već imate nalog?</p> <a class="text-prijava-registration" href="#"><span
                class="registruj-se prijavi-se">Prijavi se</span></a>
    </div>
</div>


<script src="{{ asset('js/login.js') }}"></script>
<script src="{{ asset('js/register.js') }}"></script>