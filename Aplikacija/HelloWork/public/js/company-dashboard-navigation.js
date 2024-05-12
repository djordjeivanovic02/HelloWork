const companyInfo = document.querySelector('#company-info');
const newAd = document.querySelector('#new-ad');
const editJob = document.querySelector('#edit-job');
const applications = document.querySelector('#applications');
const messages = document.querySelector('#messages');
const changePasswordd = document.querySelector('#change-password')

newAd.addEventListener('click', function(){
    window.location.href = '/new-ad';
});

changePasswordd.addEventListener('click', function(){
    window.location.href = '/change-password';
});

companyInfo.addEventListener('click', function(){
    window.location.href = '/company-change-profile';
});