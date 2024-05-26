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

const companyLogo = document.querySelector('#companyLogoImage');

const updateNotification = document.querySelector('.update-profile-notification-container');
const updateCompanyDataBtn = document.querySelector('.updateCompanyDataBtn');

let companyFormData = new FormData();

updateCompanyDataBtn.addEventListener("click", updateCompanyData);

async function updateCompanyData() {
    updateCompanyDataBtn.disabed = true;
    if (validateInput()) {
        const links = companyFacebookElement.value + ','
            + companyInstagramElement.value + ','
            + companyThreadsElement.value + ','
            + companyLinkedinElement.value;

        companyFormData.append('name', companyNameElement.value);
        companyFormData.append('size', companySizeElement.value);
        companyFormData.append('country', companyCountryElement.value);
        companyFormData.append('city', companyCityElement.value);
        companyFormData.append('address', companyAddressElement.value);
        companyFormData.append('website', companyWebsiteElement.value);
        companyFormData.append('about', companyDescriptionElement.value);
        companyFormData.append('start_date', convertDateFormat(companyFoundedElement.value));
        companyFormData.append('contact', companyNumberElement.value);
        companyFormData.append('links', links);
        companyFormData.append('category', companyCategorycompanyCountryElement.value);

        await updateData();
    } else {
        updateCompanyDataBtn.disabed = false;
    }
}

async function updateData() {
    const url = '/company-update-profile';
    const data = companyFormData;
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
        updateCompanyDataBtn.disabed = false;
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
        updateNotification.querySelector('b').innerHTML = 'Neispravan format datuma. Unesite format kao što je dd.mm.yyyy (npr. 16.10.2023)';
        updateNotification.scrollIntoView({ behavior: 'smooth', block: 'start' });
        // console.error('Error:', error);
    }
}

function convertDateFormat(dateString) {
    const parts = dateString.split('.');

    if (parts.length === 3) {
        const [year, month, day] = parts;

        return `${day}-${month}-${year}`;
    }
    return dateString;
}

function validateInput() {
    if (companyNameElement.value.trim() === '') {
        focusOut(companyNameElement);
        companyNameElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companySizeElement.value.trim() === '') {
        focusOut(companySizeElement);
        companySizeElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companyCountryElement.value.trim() === '') {
        focusOut(companyCountryElement);
        companyCountryElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companyFoundedElement.value.trim() === '') {
        focusOut(companyFoundedElement);
        companyFoundedElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companyDescriptionElement.value.trim() === '') {
        focusOut(companyDescriptionElement);
        companyDescriptionElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companyNumberElement.value.trim() === '') {
        focusOut(companyNumberElement);
        companyNumberElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companyEmailElement.value.trim() === '') {
        focusOut(companyEmailElement);
        companyEmailElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companyCityElement.value.trim() === '') {
        focusOut(companyCityElement);
        companyCityElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else if (companyAddressElement.value.trim() === '') {
        focusOut(companyAddressElement);
        companyAddressElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    else return true;
    return false;
}

function focusOut(x) {
    if (x.value.trim() === '') {
        x.parentElement.classList.add('error');
    } else {
        x.parentElement.classList.remove('error')
    }
}


async function updateCompanyLogo(x) {
    try {
        const response = await fetch('/company-upload-logo', {
            method: 'POST',
            body: logoFormData,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        const data = await response.json();
        if (data.type == 'success') {
            x.parentElement.classList.remove('active');
        } else {
            alert("Došlo je do greške, molimo pokušajte kasnije");
        }
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije");
    } finally {
        // button.classList.remove('loading');
        // button.disabled = false;
    }
}



const inputImages = document.querySelector('#inputImages');
const imagesContainerr = document.querySelector('.images-container');
const openBtn2 = document.querySelector('.add-img2');

function importImages() {
    inputImages.click();
}
const imageContainer2Main = document.querySelectorAll('.image-container2');
let imageCount = imageContainer2Main.length;

inputImages.addEventListener('change', function (event) {
    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = function (event) {
            // Proveri da li je dostignut maksimalni broj slika
            if (imageCount < 4) {

                const imageContainer2 = document.createElement('div');
                imageContainer2.classList.add('image-container2', 'image-container', 'my-4', 'w-100', 'active');

                const imageUrl = event.target.result;
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;

                imageContainer2.appendChild(imageElement);

                imagesContainerr.appendChild(imageContainer2);

                imageContainer2.addEventListener('click', () => removeImage(imageContainer2, file));
                imageCount++;

                companyFormData.append('images[]', file);
                if (imageCount >= 4) {
                    openBtn2.classList.add('hidden');
                }
            }
        };

        reader.readAsDataURL(file);
    }
});


function removeImage(imageContainer) {
    const fileName = imageContainer.dataset.fileName;

    imageContainer.style.display = 'none';
    imageCount--;
    openBtn2.classList.remove('hidden');

    const newFormData = new FormData();
    companyFormData.forEach((value, key) => {
        if (!(key === 'images[]' && value.name === fileName)) {
            newFormData.append(key, value);
        }
    });

    companyFormData = newFormData;
}



if (imageContainer2Main.length > 0) {
    for (let i = 0; i < imageContainer2Main.length; i++) {
        const imgEl = imageContainer2Main[i].querySelector('img');
        const imgUrl = imgEl.src;
        sendImageFormData(imgUrl, imageContainer2Main[i]);
    }
    if (imageContainer2Main.length === 4) {
        openBtn2.classList.add('hidden');
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
function sendImageFormData(src, element) {
    getImageBlobFromSrc(src, function (blob) {
        const randomFileName = generateRandomString(10) + '.jpg';
        companyFormData.append('images[]', blob, randomFileName);
        element.dataset.fileName = randomFileName;
        element.addEventListener('click', () => removeImage(element));
    });
}

// The start date field must be a valid date.
