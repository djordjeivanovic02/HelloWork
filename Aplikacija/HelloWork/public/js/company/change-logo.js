const inputLogo = document.querySelector('#companyLogo');
const saveChangeLogo = document.querySelector('.save-change-logo');
const companyLogoElement = document.querySelector('#companyLogoImage');

const logoFormData = new FormData();

function openLogoInput() {
    inputLogo.click();
}

inputLogo.addEventListener('change', function (event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function (event) {
        var imageUrl = event.target.result;
        companyLogoElement.src = imageUrl;

        logoFormData.append('logo', file);

        saveChangeLogo.classList.add('active');
    };

    reader.readAsDataURL(file);
});

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

async function updateUserLogo(x) {
    try {
        const response = await fetch('/user-upload-logo', {
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
