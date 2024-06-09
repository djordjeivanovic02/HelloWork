//#region UPLOADOVANJE SLIKE O OGLASU
const inputImage = document.querySelector('#inputImage');
const openBtn = document.querySelector('.add-img');
var imageContainer = document.querySelector('.image-container');

openBtn.addEventListener('click', addImage);

inputImage.addEventListener('change', function (event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function (event) {

        openBtn.classList.add('hidden');

        var imageUrl = event.target.result;
        var imageElement = document.createElement('img');
        imageElement.classList.add('uploaded-job-class');
        imageElement.src = imageUrl;

        imageContainer.classList.add('active');
        imageContainer.addEventListener('click', removeImage);
        imageContainer.innerHTML = '';
        imageContainer.appendChild(imageElement);
    };

    reader.readAsDataURL(file);
});

function addImage() {
    inputImage.click();
}
function removeImage() {
    inputImage.value = '';
    imageContainer.classList.remove('active');
    openBtn.classList.remove('hidden');
}
//#endregion

//#region KLJUCNE ODOVORSNOTI

const createdRespElements = document.querySelectorAll('.resp-preview .resp-element');


const respInput = document.querySelector('#jobResp');
const respPreviewCont = document.querySelector('.resp-preview');

let responsibilities = [];
createdRespElements.forEach(element => {
    responsibilities.push(element.querySelector('p').innerHTML);
    element.addEventListener('click', () => deleteResp(element));
});

respInput.addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();

        const input = event.target;
        const text = input.value.trim();

        if (text !== '' && !responsibilities.includes(text)) {
            const el = createPreviewElement(text);
            respPreviewCont.appendChild(el);
            responsibilities.push(text);
            respInput.value = '';
        }
    }
});

function createPreviewElement(text) {
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


//#region POTREBNA ISKUSTVA

const createdExpElements = document.querySelectorAll('.exp-preview .exp-element');


const expInput = document.querySelector('#jobExp');
const expPreviewCont = document.querySelector('.exp-preview');

let experience = [];
createdExpElements.forEach(element => {
    experience.push(element.querySelector('p').innerHTML);
    element.addEventListener('click', () => deleteExp(element));
});

expInput.addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();

        const input = event.target;
        const text = input.value.trim();

        if (text !== '' && !experience.includes(text)) {
            const el = createPreviewElement2(text);
            expPreviewCont.appendChild(el);
            experience.push(text);
            expInput.value = '';
        }
    }
});

function createPreviewElement2(text) {
    const divEl = document.createElement('div');
    divEl.classList.add('exp-element', 'd-inline-block');

    const pEl = document.createElement('p');
    pEl.classList.add('m-0');
    pEl.innerHTML = text;

    divEl.appendChild(pEl);

    divEl.addEventListener('click', () => deleteExp(divEl));
    return divEl;
}

function deleteExp(divEl) {
    const text = divEl.querySelector('p').innerHTML;
    experience = experience.filter(item => item !== text);
    expPreviewCont.removeChild(divEl);
}

//#endregion


//#region TAGOVI

const createdTagsElements = document.querySelectorAll('.tags-preview .tags-element');


const tagsInput = document.querySelector('#jobTags');
const tagsPreviewCont = document.querySelector('.tags-preview');

let tags = [];
createdTagsElements.forEach(element => {
    tags.push(element.querySelector('p').innerHTML);
    element.addEventListener('click', () => deleteTags(element));
});

tagsInput.addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();

        const input = event.target;
        const text = input.value.trim();

        if (text !== '' && !tags.includes(text)) {
            const el = createPreviewElement3(text);
            tagsPreviewCont.appendChild(el);
            tags.push(text);
            tagsInput.value = '';
        }
    }
});

function createPreviewElement3(text) {
    const divEl = document.createElement('div');
    divEl.classList.add('tags-element', 'd-inline-block');

    const pEl = document.createElement('p');
    pEl.classList.add('m-0');
    pEl.innerHTML = text;

    divEl.appendChild(pEl);

    divEl.addEventListener('click', () => deleteTags(divEl));
    return divEl;
}

function deleteTags(divEl) {
    const text = divEl.querySelector('p').innerHTML;
    tags = tags.filter(item => item !== text);
    tagsPreviewCont.removeChild(divEl);
}

//#endregion


//#region DODAVANJE OGLASA

const jobTitleElement = document.querySelector('#jobTitle');
const jobAddressElement = document.querySelector('#jobAddress');
const jobTypeElement = document.querySelector('#jobType');
const jobFromSalaryElement = document.querySelector('#jobFromSalary');
const jobToSalaryElement = document.querySelector('#jobToSalary');
const jobCategoryElement = document.querySelector('#jobCategory');
const jobDurationElement = document.querySelector('#jobDuration');
const jobCountElement = document.querySelector('#jobCount');
const jobPaymentElement = document.querySelector('#jobPayment');
const jobDescriptionElement = document.querySelector('#jobDescription');
const adDurationElement = document.querySelector('#adDuration');

const postJobBtn = document.querySelector('.add-ad');
const notificationCont = document.querySelector('.update-profile-notification-container');

let newAdData = new FormData();

postJobBtn.addEventListener('click', postNewJob);

function postNewJob() {
    if (validateInputs()) {
        notificationCont.classList.remove('success');
        notificationCont.classList.remove('error');

        newAdData.append('title', jobTitleElement.value);
        newAdData.append('address', jobAddressElement.value);
        newAdData.append('job_type', jobTypeElement.value);
        newAdData.append('min_salary', jobFromSalaryElement.value);
        newAdData.append('max_salary', jobToSalaryElement.value);
        newAdData.append('job_category', jobCategoryElement.value);
        newAdData.append('responsibilities', responsibilities.join('&'));
        newAdData.append('experience', experience.join('&'));
        newAdData.append('skills', '');
        newAdData.append('working_time', jobDurationElement.value);
        newAdData.append('number_of_jobs_needed', jobCountElement.value);
        newAdData.append('payment_method', jobPaymentElement.value);
        newAdData.append('description', jobDescriptionElement.value);
        newAdData.append('ad_duration', adDurationElement.value);
        newAdData.append('tabs', tags.join('&'));

        const imageElement = document.querySelector('.uploaded-job-class');
        if (imageElement !== null) {
            sendImageFormData(imageElement.src);
        }
        setTimeout(adNewJob, 300);
    }
}


async function adNewJob() {
    const url = '/company-add-new-job';
    const data = newAdData;
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
        if (jsonResponse.type == 'success') {
            notificationCont.classList.remove('error');
            notificationCont.classList.add('success');
            notificationCont.querySelector('b').innerHTML = "Oglas je uspešno kreiran i poslat na pregled. Nakon što administratori pregledaju oglas i uvere se da je sve u redu, isti će biti postavljen. U suprotnom će biti obrisan.";
        } else if (jsonResponse.type == 'error') {
            notificationCont.classList.remove('success');
            notificationCont.classList.add('error');
            notificationCont.querySelector('b').innerHTML = "Došlo je do greške prilikom postavljanja oglasa. Molimo pokušajte kasnije!";
        } else if (jsonResponse.type = 'invalid-data') {
            notificationCont.classList.remove('success');
            notificationCont.classList.add('error');
            notificationCont.querySelector('b').innerHTML = "Neko od unetih polja nije ispravno! Molimo Vas da proverite sva polja! (" + jsonResponse.message + ")";
        }
        notificationCont.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } catch (error) {
        notificationCont.classList.remove('success');
        notificationCont.classList.add('error');
        notificationCont.querySelector('b').innerHTML = "Neko od unetih polja nije ispravno! Molimo Vas da proverite sva polja! (" + jsonResponse.message + ")";
        notificationCont.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function generateRandomString(length) {
    const characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}

function getImageBlobFromSrc(src, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', src, true);
    xhr.responseType = 'blob';
    xhr.onload = function () {
        if (xhr.status === 200) {
            var blob = xhr.response;
            callback(blob);
        }
    };
    xhr.send();
}
function sendImageFormData(src) {
    getImageBlobFromSrc(src, function (blob) {
        const randomFileName = generateRandomString(20) + '.jpg';
        newAdData.append('image', blob, randomFileName);
        console.log('dodato');
    });
}
//#endregion


//#region VALIDACIJA

function validateInputs() {
    removeErrorIndicators();

    if (jobTitleElement.value.trim() === '') {
        focusOut(jobTitleElement);
        jobTitleElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (jobAddressElement.value.trim() === '') {
        focusOut(jobAddressElement);
        jobAddressElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (jobFromSalaryElement.value.trim() === '') {
        focusOut(jobFromSalaryElement);
        jobFromSalaryElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (jobToSalaryElement.value.trim() === '') {
        focusOut(jobToSalaryElement);
        jobToSalaryElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (jobCountElement.value.trim() === '') {
        focusOut(jobCountElement);
        jobCountElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (jobDescriptionElement.value.trim() === '') {
        focusOut(jobDescriptionElement);
        jobDescriptionElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else return true;
    return false;
}

function removeErrorIndicators() {
    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => {
        console.log("Tu sam");
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
