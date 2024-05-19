//#region OTVARANJE/ZATVANJE LOGIN BOX-A
const loginRegisterElement = document.querySelectorAll('.login-register');
const loginBackgroundContainer = document.querySelector('.login-background-container');
const loginContainers = loginBackgroundContainer.querySelectorAll('.login-container');
const openProfileElement = document.querySelectorAll('.open-profile');
const userType = document.querySelector('#user-type').innerHTML;

loginRegisterElement.forEach((element) => {
    element.addEventListener('click', function(){
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
})


loginBackgroundContainer.addEventListener('click', closeLoginBox);

loginContainers.forEach((element)=>{
    element.addEventListener('click', function(event){
        event.stopPropagation();
    });
});

openProfileElement.forEach((element) => {
    element.addEventListener('click', openProfile);
})

//#region OTVORI LOGIN/REGISTER PROZOR
function openLoginBox(){
    console.log("Tu sam");
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
    if(userType == '1'){
        document.location.href = '/user-change-profile';
    }else if(userType == '2'){
        document.location.href = '/company-change-profile';
    }
}

//#endregion

//#endregion



//#region OTVORI MOBILE MENU

const openMenuElement = document.querySelector('#open-mobile-menu');
const closeMenuElement = document.querySelector('#close-mobile-menu');

const mobileMenuBg = document.querySelector('.mobile-menu-background');
const mobileMenuCont = mobileMenuBg.querySelector('.mobile-menu-container');

openMenuElement.addEventListener('click', showMobileMenu);
closeMenuElement.addEventListener('click', hideMobileMenu);
mobileMenuBg.addEventListener('click', hideMobileMenu);

mobileMenuCont.addEventListener('click', function(event){
    event.stopPropagation();
})

function showMobileMenu(){
    mobileMenuBg.classList.add('active');
    mobileMenuCont.classList.remove('hide');
    mobileMenuCont.classList.add('show');
}

function hideMobileMenu(){
    mobileMenuCont.classList.remove('show');
    mobileMenuCont.classList.add('hide');
    setTimeout(() => {
        mobileMenuBg.classList.remove('active');
    }, 300);
}

//#endregion
