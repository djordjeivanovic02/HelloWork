//#region JEZICI

let languages = [];

const langPreviewCont = document.querySelector('.tags-preview');
const languageInput = document.querySelector('#jobLanguages');

langPreviewCont.querySelectorAll('.tags-element').forEach(element => {
    element.addEventListener('click', () => deleteLang(element));
});

languageInput.addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();

        const input = event.target;
        const text = input.value.trim();

        if (text !== '' && !languages.includes(text)) {
            const el = createPreviewLanguageElement(text);
            langPreviewCont.appendChild(el);
            languages.push(text);
            languageInput.value = '';
        }
    }
});

function createPreviewLanguageElement(text) {
    const divEl = document.createElement('div');
    divEl.classList.add('tags-element', 'd-inline-block');

    const pEl = document.createElement('p');
    pEl.classList.add('m-0');
    pEl.innerHTML = text;

    divEl.appendChild(pEl);

    divEl.addEventListener('click', () => deleteLang(divEl));
    return divEl;
}
function deleteLang(divEl) {
    const text = divEl.querySelector('p').innerHTML;
    languages = languages.filter(item => item !== text);
    langPreviewCont.removeChild(divEl);
}

//#endregion


//#region RESPONS

let responsibilities = [];

const respPreviewCont = document.querySelector('.resp-preview');
const responsibilitiesInput = document.querySelector('#userResp');

respPreviewCont.querySelectorAll('.resp-element').forEach(element => {
    element.addEventListener('click', () => deleteResp(element));
});

responsibilitiesInput.addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();

        const input = event.target;
        const text = input.value.trim();

        if (text !== '' && !responsibilities.includes(text)) {
            const el = createPreviewRespElement(text);
            respPreviewCont.appendChild(el);
            responsibilities.push(text);
            responsibilitiesInput.value = '';
        }
    }
});

function createPreviewRespElement(text) {
    const divEl = document.createElement('div');
    divEl.classList.add('resp-element', 'd-inline-block');

    const pEl = document.createElement('p');
    pEl.classList.add('m-0');
    pEl.innerHTML = text;

    divEl.appendChild(pEl);

    divEl.addEventListener('click', () => deleteResp(divEl));
    return divEl;
}
function deleteResp(divEl) {
    const text = divEl.querySelector('p').innerHTML;
    responsibilities = responsibilities.filter(item => item !== text);
    respPreviewCont.removeChild(divEl);
}

//#endregion


//#region SKILLS

let skills = [];

const skillsPreviewCont = document.querySelector('.skills-preview');
const skillsInput = document.querySelector('#userSkills');

skillsPreviewCont.querySelectorAll('.skills-element').forEach(element => {
    element.addEventListener('click', () => deleteSkill(element));
});

skillsInput.addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();

        const input = event.target;
        const text = input.value.trim();

        if (text !== '' && !skills.includes(text)) {
            const el = createPreviewSkillElement(text);
            skillsPreviewCont.appendChild(el);
            skills.push(text);
            skillsInput.value = '';
        }
    }
});

function createPreviewSkillElement(text) {
    const divEl = document.createElement('div');
    divEl.classList.add('tags-element', 'skills-preview', 'd-inline-block');

    const pEl = document.createElement('p');
    pEl.classList.add('m-0');
    pEl.innerHTML = text;

    divEl.appendChild(pEl);

    divEl.addEventListener('click', () => deleteSkill(divEl));
    return divEl;
}
function deleteSkill(divEl) {
    console.log("Tu sam");
    const text = divEl.querySelector('p').innerHTML;
    skills = skills.filter(item => item !== text);
    skillsPreviewCont.removeChild(divEl);
}

//#endregion


const userFullNameElement = document.querySelector('#userFullName');
const userProfesyElement = document.querySelector('#userProfesy');
const userYearsElement = document.querySelector('#userYears');
const userCurrentSalaryElement = document.querySelector('#currentSalary');
const userExpectedSalaryElement = document.querySelector('#expectedSalary');
const userExperienceElement = document.querySelector('#userExperience');
const userEducationElement = document.querySelector('#userEducation');
const userDescriptionElement = document.querySelector('#userDescription');
const userNumberElement = document.querySelector('#userNumber');
const userEmailElement = document.querySelector('#userEmail');
const userCountryElement = document.querySelector('#userCountry');
const userPostalElement = document.querySelector('#userPostal');
const userCityElement = document.querySelector('#userCity');
const userAddressElement = document.querySelector('#userAddress');

const userFacebookElement = document.querySelector('#userFacebook');
const userInstagramElement = document.querySelector('#userInstagram');
const userThreadsElement = document.querySelector('#userThreads');
const userLinkedinElement = document.querySelector('#userLinkedin');

let updateUserFormData = new FormData();

async function updateUserProfile() {
    if (validateData()) {

        const links = userFacebookElement.value + '&'
            + userInstagramElement.value + '&'
            + userThreadsElement.value + '&'
            + userLinkedinElement.value;

        updateUserFormData.append('name', userFullNameElement.value);
        updateUserFormData.append('professional_title', userProfesyElement.value);
        updateUserFormData.append('age', userYearsElement.value);
        updateUserFormData.append('languages', languages.join('&'));
        updateUserFormData.append('current_salary', userCurrentSalaryElement.value);
        updateUserFormData.append('expected_salary', userExpectedSalaryElement.value);
        updateUserFormData.append('experience', userExperienceElement.value);
        updateUserFormData.append('education', userEducationElement.value);
        updateUserFormData.append('responsibilities', responsibilities.join('&'));
        updateUserFormData.append('skills', skills.join('&'));
        updateUserFormData.append('about', userDescriptionElement.value);
        updateUserFormData.append('phone', userNumberElement.value);
        updateUserFormData.append('country', userCountryElement.value);
        updateUserFormData.append('postcode', userPostalElement.value);
        updateUserFormData.append('city', userCityElement.value);
        updateUserFormData.append('full_address', userAddressElement.value);
        updateUserFormData.append('social', links);

        await update();
    }
}
const updateNotification = document.querySelector('.update-profile-notification-container');
async function update() {
    const url = '/user-update-profile';
    const data = updateUserFormData;
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            },
            body: data
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const jsonResponse = await response.json();
        console.log(jsonResponse);
        if (jsonResponse.type == 'success') {
            if (jsonResponse.message == 'The start date field must be a valid date.') {
                updateNotification.classList.remove('success');
                updateNotification.classList.add('error');
                updateNotification.querySelector('b').innerHTML = 'Neispravan format datuma. Unesite format kao što je dd.mm.yyyy (npr. 16.10.2023)';
            } else {
                updateNotification.classList.remove('error');
                updateNotification.classList.add('success');
                // updateNotification.querySelector('b').innerHTML = 'Vaš oglas je uspešno poslat na pregled. Administrator će ga pregledati u najkraćem mogućem roku, a nakon odobrenja, oglas će biti objavljen. Hvala vam na strpljenju i poverenju.';
                updateNotification.querySelector('b').innerHTML = 'Vaš profil je uspešno ažuriran.';
            }
        } else if (jsonResponse.type == 'error') {
            updateNotification.classList.remove('success');
            updateNotification.classList.add('error');
            updateNotification.querySelector('b').innerHTML = 'Došlo je do greške, molimo pokušajte kasnije.';

        }
        updateNotification.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } catch (error) {
        updateNotification.classList.remove('success');
        updateNotification.classList.add('error');
        updateNotification.querySelector('b').innerHTML = 'Neki od unetih podataka nije ispravno unet. Pregledajte sve vaše podatke i nakon što unesete sve validne podatke moćićete da ažurirate profil';
        updateNotification.scrollIntoView({ behavior: 'smooth', block: 'start' });
        console.error('Error:', error);
    }
}

//#region VALIDACIJA PODATAKA

function validateData() {
    removeErrorIndicators();
    if (userFullNameElement.value.trim() === '') {
        focusOut(userFullNameElement);
        userFullNameElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userProfesyElement.value.trim() === '') {
        focusOut(userProfesyElement);
        userProfesyElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userYearsElement.value.trim() === '') {
        focusOut(userYearsElement);
        userYearsElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userEducationElement.value.trim() === '') {
        focusOut(userEducationElement);
        userEducationElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userDescriptionElement.value.trim() === '') {
        focusOut(userDescriptionElement);
        userDescriptionElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userNumberElement.value.trim() === '') {
        focusOut(userNumberElement);
        userNumberElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userEmailElement.value.trim() === '') {
        focusOut(userEmailElement);
        userEmailElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userCountryElement.value.trim() === '') {
        focusOut(userCountryElement);
        userCountryElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userPostalElement.value.trim() === '') {
        focusOut(userPostalElement);
        userPostalElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userCityElement.value.trim() === '') {
        focusOut(userCityElement);
        userCityElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else if (userAddressElement.value.trim() === '') {
        focusOut(userAddressElement);
        userAddressElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else return true;
    return false;
}

function removeErrorIndicators() {
    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => {
        element.classList.remove('error');
    })
}

function focusOut(x) {
    if (x.value.trim() === '') {
        x.parentElement.classList.add('error');
    } else {
        x.parentElement.classList.remove('error')
    }
}

//#endregion
