const companyNameElement = document.querySelector('#companyName');
const companySizeElement = document.querySelector('#companySize');
const companyCategorycompanyCountryElement = document.querySelector('#companyCategorycompanyCountry');
const companyCountryElement = document.querySelector('#companyCountry');
const companyWebsiteElement = document.querySelector('#companyWebsite');
const companyFoundedElement = document.querySelector('#companyFounded');
const companyDescriptionElement = document.querySelector('#companyDescription');
const companyNumberElement = document.querySelector('#companyNumber');
const companyEmailElement = document.querySelector('#companyEmail');
const companyCityElement = document.querySelector('#companyCity');
const companyAddressElement = document.querySelector('#companyAddress');
const companyFacebookElement = document.querySelector('#companyFacebook');
const companyInstagramElement = document.querySelector('#companyInstagram');
const companyThreadsElement = document.querySelector('#companyThreads');
const companyLinkedinElement = document.querySelector('#companyLinkedin');


function updateCompanyData(){
    if(validateInput()){

    }
}

function validateInput(){
    if(companyNameElement.value.trim() === ''){
        focusOut(companyNameElement);
        companyNameElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companySizeElement.value.trim() === ''){
        focusOut(companySizeElement);
        companySizeElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companyCountryElement.value.trim() === ''){
        focusOut(companyCountryElement);
        companyCountryElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companyFoundedElement.value.trim() === ''){
        focusOut(companyFoundedElement);
        companyFoundedElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companyDescriptionElement.value.trim() === ''){
        focusOut(companyDescriptionElement);
        companyDescriptionElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companyNumberElement.value.trim() === ''){
        focusOut(companyNumberElement);
        companyNumberElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companyEmailElement.value.trim() === ''){
        focusOut(companyEmailElement);
        companyEmailElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companyCityElement.value.trim() === ''){
        focusOut(companyCityElement);
        companyCityElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if(companyAddressElement.value.trim() === ''){
        focusOut(companyAddressElement);
        companyAddressElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else return true;
    return false;
}

function focusOut(x){
    if(x.value.trim() === '') {
        x.parentElement.classList.add('error');
    }else{
        x.parentElement.classList.remove('error')
    }
}