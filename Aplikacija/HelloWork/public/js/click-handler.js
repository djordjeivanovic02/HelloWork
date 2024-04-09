//#region OTVARANJE/ZATVANJE LOGIN BOX-A
const loginRegisterElement = document.querySelector('.login-register-button');
const loginBackgroundContainer = document.querySelector('.login-background-container');
const loginContainer = loginBackgroundContainer.querySelector('.login-container');

loginRegisterElement.addEventListener('click', function(){
    const closeBtn = loginContainer.querySelector('.close-box');
    openLoginBox();
    closeBtn.addEventListener('click', closeLoginBox);
});

loginBackgroundContainer.addEventListener('click', closeLoginBox);

loginContainer.addEventListener('click', function(event){
    event.stopPropagation();
});

//#region OTVORI LOGIN/REGISTER PROZOR
function openLoginBox(){
    loginBackgroundContainer.classList.remove('deactive');
    loginBackgroundContainer.classList.add('active');
    loginContainer.classList.remove('deactive');
    loginContainer.classList.add('active');
}
//#endregion

//#region ZATVORI LOGIN/REGISTER PROZOR
function closeLoginBox(){
    loginContainer.classList.remove('active');
    loginContainer.classList.add('deactive');
    setTimeout(() => {
        loginBackgroundContainer.classList.remove('active');
        loginBackgroundContainer.classList.add('deactive');
    }, 300);
}
//#endregion
//#endregion
