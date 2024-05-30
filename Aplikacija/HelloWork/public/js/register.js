const registerBtn = document.querySelector('#register-btn');
const registerErrorContainer = document.querySelector('.register-error-container');


registerBtn.addEventListener('click', register);

async function register() {
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
        if (data.type == 'success') {
            if (data.redirect) {
                window.location.href = data.redirect;
            }
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
        return false;
    } else if (password.trim() === '') {
        registerErrorContainer.classList.add('active');
        registerErrorContainer.querySelector('p').innerHTML = 'Lozinka je obavezno polje!';
        return false;
    }
    return true;
}
