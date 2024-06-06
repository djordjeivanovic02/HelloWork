const registerBtn = document.querySelector('#register-btn');
const loadingBtn = document.querySelector('#register-loading');
const registerErrorContainer = document.querySelector('.register-error-container');


registerBtn.addEventListener('click', register);

async function register() {
    registerBtn.style.display = 'none';
    loadingBtn.style.display = 'flex';

    const kandidat = document.querySelector('.kandidat');
    const poslodavac = document.querySelector('.poslodavac');
    const email = document.querySelector('#register-email').value;
    const password = document.querySelector('#register-password').value;

    let type = 0;

    if (kandidat.classList.contains('active')) type = 1;
    else if (poslodavac.classList.contains('active')) type = 2;

    if (!validateRegister(email, password)) return;

    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    formData.append('type', type);

    try {
        const response = await fetch('/register', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        const data = await response.json();
        loadingBtn.style.display = 'none';
        registerBtn.style.display = 'flex';
        if (data.type == 'success') {
            registerErrorContainer.classList.add('active');
            registerErrorContainer.style.backgroundColor = "white";
            registerErrorContainer.style.borderColor = "#34A873";
            registerErrorContainer.querySelector('b').innerHTML = "Uspešna registracija";
            registerErrorContainer.querySelector('p').innerHTML = data.message;

            const spanEl = document.createElement('span');
            spanEl.style.cursor = 'pointer';
            spanEl.style.color = '#613FE5';
            spanEl.innerHTML = "Pošalji ponovo verifikacion mail";
            registerErrorContainer.appendChild(spanEl);

            spanEl.addEventListener('click', () => resendEmail(email));

            // if (data.redirect) {
            //     window.location.href = data.redirect;
            // }
        } else if (data.type == 'email-used') {
            registerErrorContainer.classList.add('active');
            registerErrorContainer.querySelector('p').innerHTML = data.message;
        } else if (data.type == 'error') {
            registerErrorContainer.classList.add('active');
            registerErrorContainer.querySelector('p').innerHTML = 'Neispravni podaci!';
        }
    } catch (error) {
        registerErrorContainer.classList.add('active');
        registerErrorContainer.querySelector('p').innerHTML = 'Došlo je do problema, molimo pokušajte kasnije!';
    }
}

function validateRegister(email, password) {
    if (email.trim() === '') {
        registerErrorContainer.classList.add('active');
        registerErrorContainer.querySelector('p').innerHTML = 'Email adresa je obavezno polje!';
        loadingBtn.style.display = 'none';
        registerBtn.style.display = 'flex';
        return false;
    } else if (password.trim() === '') {
        registerErrorContainer.classList.add('active');
        registerErrorContainer.querySelector('p').innerHTML = 'Lozinka je obavezno polje!';
        loadingBtn.style.display = 'none';
        registerBtn.style.display = 'flex';
        return false;
    }
    return true;
}

async function resendEmail(email) {
    registerErrorContainer.classList.remove('active');
    registerErrorContainer.querySelector('span').style.display = 'none';
    try {
        const response = await fetch('/resend-email-verification/' + email, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        const data = await response.json();
        if (data.type == 'success') {
            registerErrorContainer.classList.add('active');
            registerErrorContainer.style.backgroundColor = "white";
            registerErrorContainer.style.borderColor = "#34A873";
            registerErrorContainer.querySelector('b').innerHTML = "Email poslat";
            registerErrorContainer.querySelector('p').innerHTML = 'Verifikacioni mail je poslat na email adresu: ' + email;
        } else if (data.type == 'not-exist') {
            registerErrorContainer.classList.add('active');
            registerErrorContainer.querySelector('p').innerHTML = data.message;
        } else if (data.type == 'error') {
            registerErrorContainer.classList.add('active');
            registerErrorContainer.querySelector('p').innerHTML = 'Neispravni podaci!';
        }
    } catch (error) {
        registerErrorContainer.classList.add('active');
        registerErrorContainer.querySelector('p').innerHTML = 'Došlo je do problema, molimo pokušajte kasnije!';
    }
}
