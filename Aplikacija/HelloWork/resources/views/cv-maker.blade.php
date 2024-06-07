 @extends('parts.main')
 @section('cv-maker')
     <link rel="stylesheet" href="{{ asset('css/cv/cv.css') }}">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

     <h3 class="cv-title-header m-0 mt-4">Kreiraj svoj CV</h3>
     <div class="welcome-container d-flex w-100 position-relative">
         <div class="left-div2">
             <div class="half-div">
                 <label for="name" class="d-block small m-0">Ime i Prezime</label>
                 <input type="text" name="name" id="name" class="input-login d-block" placeholder="Unesi ovde"
                     onclick="change(event);">
                 <label for="profession" class="d-block small m-0">Profesija</label>
                 <input type="text" name="profession" id="profession" onclick="change(event);"
                     class="input-login d-block" placeholder="Profesija">
                 <div class="wrapper">
                     <label for="image" class="d-block small m-0">Slika</label>
                     <div class="file-upload ml-1 mr-1">
                         <input id="image" type="file" accept="image/png, image/gif, image/jpeg" />
                         <i class="fa fa-arrow-up"></i>
                     </div>
                     <label for="age" class="d-block small m-0 mr-1">Godine</label>
                     <div style="width: 40%;" class="ml-2">
                         <input type="number" name="age" id="age" onclick="change(event);"
                             class="input-login m-0 " placeholder="Godine">
                     </div>
                 </div>
                 <label for="phone" class="d-block small m-0">Broj Telefona</label>
                 <input type="text" id="phone" class="input-login d-block" onclick="change(event);"
                     placeholder="Broj telefona">
                 <label for="email" class="d-block small m-0">Email</label>
                 <input type="email" id="email" class="input-login d-block" onclick="change(event);"
                     placeholder="Email">

                 <label for="website" class="d-block small m-0">Web Sajt</label>
                 <input type="text" id="website" class="input-login d-block" onclick="change(event);"
                     placeholder="Web sajt">

                 <label for="address" class="d-block small m-0">Adresa</label>
                 <input type="text" id="address" class="input-login d-block" onclick="change(event);"
                     placeholder="Adresa">
                 <div class="social-media-div d-flex">
                     <img src="{{ asset('images/cv/icons/instagram.svg') }}" class="social-networks"
                         onclick="openPopup('Instagram', this)" alt="instagram">
                     <img src="{{ asset('images/cv/icons/facebook.svg') }}" class="social-networks"
                         onclick="openPopup('Facebook', this)" alt="facebook">
                     <img src="{{ asset('images/cv/icons/linkedin.svg') }}" class="social-networks"
                         onclick="openPopup('Linkedin', this)" alt="linkedin">
                     <img src="{{ asset('images/cv/icons/threads.svg') }}" class="social-networks"
                         onclick="openPopup('Threads', this)" alt="threads">
                 </div>
             </div>
             <div class="half-div">
                 <div style="height:85%;">
                     <label for="" class="d-block small m-0">Jezici</label>
                     <div class="languages">
                         <div class="add-div" onclick="openSkillPopup('language');">
                             <i class="fas fa-plus"></i>
                         </div>
                     </div>
                     <label for="about" class="d-block small m-0">O meni</label>
                     <textarea type="text" id="about" class="input-login d-block" onclick="change(event);"
                         style="height: 128px; font-size: 12px; resize:none;" placeholder="Kratak opis o sebi..."></textarea>
                     <label for="" class="d-block small m-0">Edukacija</label>
                     <div class="certificates">
                         <div class="add-div" onclick="openExpPopup('education');">
                             <i class="fas fa-plus"></i>
                         </div>
                     </div>
                     <label for="experience" class="d-block small m-0">Iskustva</label>
                     <div class="experience">
                         <div class="add-div" onclick="openExpPopup('experience');">
                             <i class="fas fa-plus"></i>
                         </div>
                     </div>
                     <label for="" class="d-block small m-0 mt-1">Vestine</label>
                     <div class="skills">
                         <div class="add-div" onclick="openSkillPopup('skill');">
                             <i class="fas fa-plus"></i>
                         </div>
                     </div>
                 </div>
                 <div class="pt-1">
                     <button class="download-btn">Preuzmi CV</button>
                 </div>
             </div>
         </div>
         <div class="right-div2">
             <div class="cv-preview">
                 <div class="cv-div">
                     <div class="left-cv-div">
                         <div class="img-div">
                             <img class="profile-img" src="{{ asset('images/cv/icons/aigenereted.jpg') }}"
                                 alt="">
                         </div>
                         <div class="age-div">
                             <label style="margin-top: 2px;" id="age-lbl" for="">36</label>
                             <span>godina</span>
                         </div>
                         <div class="contact-div width-80">
                             <b class="left-headers">KONTAKT</b>
                             <table class="info-table">
                                 <tr>
                                     <td><img class="icons" src="{{ asset('images/cv/icons/phone-48.png') }}"
                                             alt=""></td>
                                     <td>
                                         <p class="font-data white-text" id="phone-lbl">063-347-054</p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td> <img class="icons" src="{{ asset('images/cv/icons/email-60.png') }}"
                                             alt=""></td>
                                     <td>
                                         <p class="font-data white-text" id="email-lbl">jaleksa388@gmail.com</p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td><img class="icons" src="{{ asset('images/cv/icons/website-50.png') }}"
                                             alt=""></td>
                                     <td>
                                         <p class="font-data white-text" id="website-lbl">www.tvojwebsajt.com</p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td><img class="icons" src="{{ asset('images/cv/icons/address-50.png') }}"
                                             alt=""></td>
                                     <td>
                                         <p class="font-data white-text" id="adress-lbl">Mije Milenkovica 125</p>
                                     </td>
                                 </tr>
                             </table>
                         </div>
                         <div class="lagunages-div width-80">
                             <b class="left-headers">JEZICI</b>
                             <table class="lang-table">
                                 <tr>
                                     <td class="lang-td">
                                         <label for="">ENGLESKI</label>
                                     </td>
                                     <td>
                                         <div class="progres-div">
                                             <div class="precentage-div" style="width:95%"></div>
                                         </div>
                                     </td>
                                     <td>
                                         <label for="">95%</label>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td class="lang-td">
                                         <label for="">SPANSKI</label>
                                     </td>
                                     <td>
                                         <div class="progres-div">
                                             <div class="precentage-div" style="width:80%"></div>
                                         </div>
                                     </td>
                                     <td>
                                         <label for="">80%</label>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td class="lang-td">
                                         <label for="">KINESKI</label>
                                     </td>
                                     <td>
                                         <div class="progres-div">
                                             <div class="precentage-div" style="width:75%"></div>
                                         </div>
                                     </td>
                                     <td>
                                         <label for="">75%</label>
                                     </td>
                                 </tr>
                             </table>
                         </div>
                         <div class="skills-div width-80">
                             <b class="left-headers">VESTINE</b>
                             <div class="d-flex flex-wrap" id="skill-cont">

                             </div>
                         </div>
                         <div class="social-media-div width-80">
                             <b class="left-headers">DRUSTVENE MREZE</b>
                             <table class="info-table">
                                 <tr>
                                     <td style="width:16%;"><img src="{{ asset('images/cv/icons/instagramcv.svg') }}"
                                             alt=""></td>
                                     <td>
                                         <p id="instagram-lbl" class="font-data white-text"
                                             style="width: 100px; word-wrap:break-word;">instagram</p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td style="width:16%;"><img src="{{ asset('images/cv/icons/facebookcv.svg') }}"
                                             alt=""></td>
                                     <td>
                                         <p id="facebook-lbl" class="font-data white-text pt-1"
                                             style="width: 100px; word-wrap:break-word;">facebook</p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td style="width:16%;"><img src="{{ asset('images/cv/icons/threadscv.svg') }}"
                                             alt="" style="width:12px; height:12px;"></td>
                                     <td>
                                         <p id="threads-lbl" class="font-data white-text pt-1"
                                             style="width: 100px; word-wrap:break-word;">threads</p>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td style="width:16%;"><img src="{{ asset('images/cv/icons/linkedincv.svg') }}"
                                             alt=""></td>
                                     <td>
                                         <p id="linkedin-lbl" class="font-data white-text pt-1"
                                             style="width: 100px; word-wrap:break-word;">linkedin</p>
                                     </td>
                                 </tr>
                             </table>
                         </div>
                     </div>
                     <div class="right-cv-div d-flex flex-column">
                         <div class="first-section">
                             <div class="d-flex flex-column align-items-center">
                                 <h6 class="name-lbl text-uppercase w-100 m-0" id="name-lbl"><b>Vase ime i
                                         prezime</b>
                                 </h6>
                             </div>
                             <label class="" id="profesion-lbl" style="font-size: 12px">Profesija</label>
                         </div>
                         <div class="padding-20 pt-0">
                             <div class="about-div">
                                 <p class="right-headers font-weight-bold">O MENI</p>
                                 <div class="text-div" style="font-size: 7px;" id="about-lbl">
                                     Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                     Ipsum
                                     has been the industry's standard dummy text ever since the 1500s, when an unknown
                                     printer took a galley of type and scrambled it to make a type specimen book.
                                 </div>
                             </div>
                             <div class="education-div">
                                 <p class="right-headers font-weight-bold" style="font-size: 14px;">EDUKACIJA</p>
                                 <div class="certificates-subdiv">
                                     <div class="certificates-group">
                                         <p class="m-0 font-weight-bold" style="font-size: 9px;">Diploma srednje skole
                                             (2021)</p>
                                         <p class="m-0 mb-1 font-weight-bold" style="font-size: 8px;">Tehnicka skola
                                             Rade
                                             Metalac</p>
                                         <div class="text-div" style="font-size: 7px;">
                                             Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem
                                             Ipsum has been
                                         </div>
                                     </div>
                                     <div class="certificates-group">
                                         <p class="m-0 font-weight-bold" style="font-size: 9px;">Diploma srednje skole
                                             (2021)</p>
                                         <p class="m-0 mb-1 font-weight-bold" style="font-size: 8px;">Tehnicka skola
                                             Rade
                                             Metalac</p>
                                         <div class="text-div" style="font-size: 7px;">
                                             Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem
                                             Ipsum has been
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="experience-div">
                                 <p class="right-headers font-weight-bold" style="font-size: 14px;">ISKUSTVO</p>
                                 <div class="experience-subdiv">
                                     <div class="experience-group">
                                         <p class="m-0 font-weight-bold" style="font-size: 9px;">Diploma srednje skole
                                             (2021)</p>
                                         <p class="m-0 font-weight-bold" style="font-size: 8px;">Tehnicka skola Rade
                                             Metalac</p>
                                         <div class="text-div" style="font-size: 7px;">
                                             Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem
                                             Ipsum has been
                                         </div>
                                     </div>
                                     <div class="experience-group">
                                         <p class="m-0 font-weight-bold" style="font-size: 9px;">Diploma srednje skole
                                             (2021)</p>
                                         <p class="m-0 font-weight-bold" style="font-size: 8px;">Tehnicka skola Rade
                                             Metalac</p>
                                         <div class="text-div" style="font-size: 7px;">
                                             Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem
                                             Ipsum has been
                                         </div>
                                     </div>
                                     <div class="experience-group">
                                         <p class="m-0 font-weight-bold" style="font-size: 9px;">Diploma srednje skole
                                             (2021)</p>
                                         <p class="m-0 font-weight-bold" style="font-size: 8px;">Tehnicka skola Rade
                                             Metalac</p>
                                         <div class="text-div" style="font-size: 7px;">
                                             Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                             Lorem
                                             Ipsum has been
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div id="popup" class="popup">
         <div class="popup-content">
             <span id="closeBtn" class="close">&times;</span>
             <label for="socialLink" id="type-lbl"></label>
             <input type="url" id="socialLink" class="input-login" placeholder="Unesite link">
             <button id="saveBtn">Sačuvaj</button>
         </div>
     </div>
     <div id="popup-skill" class="popup">
         <div class="popup-content">
             <span id="closeBtnSkill" class="close">&times;</span>
             <label for="skill" id="type-lbl">Naziv vestine</label>
             <input type="text" id="skill" class="input-login" placeholder="Naziv vestine">
             <label for="skill-precentage" id="type-lbl">Nivo znanja (%)</label>
             <input type="text" id="skill-precentage" class="input-login" placeholder="Procenti %">
             <label for="" class="error-lbl"></label>
             <div class="d-flex">
                 <button id="saveBtnSkill">Sačuvaj</button>
                 <span class="delete-btn"><i class="fas fa-trash"></i></span>
             </div>
         </div>
     </div>
     <div id="popup-experience" class="popup">
         <div class="popup-content">
             <span id="closeBtnExp" class="close">&times;</span>
             <label for="sertificate" id="type-lbl"></label>
             <input type="text" id="sertificate" class="input-login" placeholder="Naziv diplome/sertifikata">
             <label for="year" id="type-lbl">Godina sticanja diplome</label>
             <input type="number" id="year" class="input-login" value="2024">
             <label for="institution" id="type-lbl">Institucija</label>
             <input type="text" id="institution" class="input-login" placeholder="Naziv visokosolske ustanove">
             <label for="about-sc" id="type-lbl">Kratak opis</label>
             <textarea type="text" id="about-sc" class="input-login" style="height: 60px; font-size: 12px; resize:none;"
                 placeholder="Kratak opis..."></textarea>
             <label for="" class="error-lbl"></label>
             <div class="d-flex">
                 <button id="saveBtnExp">Sačuvaj</button>
                 <span class="delete-btn"><i class="fas fa-trash"></i></span>
             </div>
         </div>
     </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
         integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="{{ asset('js/cv/app.js') }}"></script>
 @endsection
