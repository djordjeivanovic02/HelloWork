//#region OTVARANJE/ZATVANJE LOGIN BOX-A
const loginRegisterElement = document.querySelector('#login-register-button');
const loginBackgroundContainer = document.querySelector('.login-background-container');
const loginContainers = loginBackgroundContainer.querySelectorAll('.login-container');
const openProfileElement = document.querySelector('.open-profile');

loginRegisterElement.addEventListener('click', function(){
    const registerSlide = loginContainers[0].querySelector('.registruj-se');
    const loginSlide = loginContainers[1].querySelector('.prijavi-se');
    const profileTypes = loginContainers[1].querySelectorAll('.profile-type');

    loginContainers.forEach((element) => {
        const closeBox = element.querySelector('.close-box');
        const showPassword = element.querySelector('.password-show');

        closeBox.addEventListener('click', closeLoginBox);
        showPassword.addEventListener('click', () => showPasswordFunction(showPassword));
    });

    profileTypes.forEach((element) => {
        element.addEventListener('click', () => changeProfileTypes(element));
    });

    openLoginBox();
    //Diable-ovano skrolanje glavne stranice
    document.body.style.overflow = "hidden";

    registerSlide.addEventListener('click', slideToRegister);
    loginSlide.addEventListener('click', slideToLogin);
});

loginBackgroundContainer.addEventListener('click', closeLoginBox);

loginContainers.forEach((element)=>{
    element.addEventListener('click', function(event){
        event.stopPropagation();
    });
});

openProfileElement.addEventListener('click', openProfile);

//#region OTVORI LOGIN/REGISTER PROZOR
function openLoginBox(){
    loginBackgroundContainer.classList.remove('deactive');
    loginBackgroundContainer.classList.add('active');

    loginContainers.forEach((element)=>{
        element.classList.remove('deactive');
        element.classList.add('active');
    });
}
//#endregion

//#region ZATVORI LOGIN/REGISTER PROZOR
function closeLoginBox(){
    loginContainers.forEach((element)=>{
        element.classList.remove('active');
        element.classList.add('deactive');
    });
    setTimeout(() => {
        loginBackgroundContainer.classList.remove('active');
        loginBackgroundContainer.classList.remove('login');
        loginBackgroundContainer.classList.remove('register');
        loginBackgroundContainer.classList.add('deactive');
        document.body.style.overflow = "auto";
    }, 300);
}
//#endregion

//#region SLIDANJE OD REGISTER DO LOGIN I OBRNUTO
function slideToRegister(){
    loginBackgroundContainer.classList.remove('login');
    loginBackgroundContainer.classList.add('register');
}

function slideToLogin(){
    loginBackgroundContainer.classList.remove('register');
    loginBackgroundContainer.classList.add('login');
}
//#endregion


//#region PRIKAZI ILI SAKRIJ LOZINKU
function showPasswordFunction(x){
    const forInput = x.getAttribute('for-input');
    const passwordInput = loginBackgroundContainer.querySelector(`.${forInput}`);
    const inputType = passwordInput.getAttribute('type');
    if(inputType == 'password'){
        passwordInput.setAttribute('type', 'text');
        x.src = '../images/eye-hide.svg';
    }else{
        passwordInput.setAttribute('type', 'password');
        x.src = '../images/eye-show.svg';
    }
}
//#endregion

function changeProfileTypes(x){
    const profileTypes = loginContainers[1].querySelectorAll('.profile-type');
    profileTypes.forEach((element) => {
        element.classList.remove('active');
    })
    x.classList.add('active');
}


//#region OTVORI PROFIL

function openProfile(){
    document.location.href = '/user';
}

//#endregion

//#endregion
