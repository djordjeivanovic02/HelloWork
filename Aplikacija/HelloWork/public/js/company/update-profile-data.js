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

const companyFormData = new FormData();

function updateCompanyData(){
    if(validateInput()){
        const links = companyFacebookElement + ',' + companyInstagramElement + ',' + companyThreadsElement + ',' + companyLinkedinElement;
        companyFormData.append('name', companyNameElement.value);
        companyFormData.append('size', companySizeElement.value);
        companyFormData.append('country', companyCountryElement.value);
        companyFormData.append('city', companyCityElement.value);
        companyFormData.append('address', companyAddressElement.value);
        companyFormData.append('start_date', companyFoundedElement.value);
        companyFormData.append('contact', companyNumberElement.value);
        companyFormData.append('links', links);
        companyFormData.append('category', companyCategorycompanyCountryElement.value);

        console.log(companyFormData);
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


async function updateCompanyLogo(x){
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
        if(data.type == 'success'){
            x.parentElement.classList.remove('active');
        }else{
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

function importImages(){
    inputImages.click();
}

let imageCount = 0;

inputImages.addEventListener('change', function(event) {
    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();
        reader.onload = function(event) {
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

                companyFormData.append('images[]', inputImages[i]);

                if (imageCount >= 4) {
                    openBtn2.classList.add('hidden');
                }
            }
        };

        reader.readAsDataURL(file);
    }
});

function removeImage(x, y) {
    x.style.display = 'none';
    imageCount--;
    openBtn2.classList.remove('hidden');
    const formDataImages = companyFormData.getAll('images[]');
    const index = formDataImages.indexOf(y);
    if (index !== -1) {
        companyFormData.delete('images[]', y);
    }
}
