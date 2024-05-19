const userInfo = document.querySelector('#user-info');
const userCV = document.querySelector('#user-cv');
const userSaved = document.querySelector('#user-saved');
const userApplications = document.querySelector('#user-applications');
const messages = document.querySelector('#messages');
const userChangePasswordd = document.querySelector('#user-change-password')

userCV.addEventListener('click', function(){
    window.location.href = '/user-cv';
});

userChangePasswordd.addEventListener('click', function(){
    window.location.href = '/user-change-password';
});

userInfo.addEventListener('click', function(){
    window.location.href = '/user-change-profile';
});

userSaved.addEventListener('click', function(){
    window.location.href = '/user-saved-ads';
});

userApplications.addEventListener('click', function(){
    window.location.href = '/user-applications';
});