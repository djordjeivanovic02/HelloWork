const loginBtn = document.querySelector('#login-btn');
const loginErrorContainer = document.querySelector('.login-error-container');

loginBtn.addEventListener('click', login);

async function login() {
    const email = document.querySelector('#login-email').value;
    const password = document.querySelector('#login-password').value;

    if (!validateLogin(email, password)) return;

    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    try {
        const response = await fetch('/login', {
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
        } else if (data.type == 'error') {
            loginErrorContainer.classList.add('active');
            loginErrorContainer.querySelector('p').innerHTML = data.errors.email;
        }
    } catch (error) {
        loginErrorContainer.classList.add('active');
    }
}

function validateLogin(email, password) {
    if (email.trim() === '') {
        loginErrorContainer.classList.add('active');
        loginErrorContainer.querySelector('p').innerHTML = 'Email adresa je obavezno polje!';
        return false;
    } else if (password.trim() === '') {
        loginErrorContainer.classList.add('active');
        loginErrorContainer.querySelector('p').innerHTML = 'Lozinka je obavezno polje!';
        return false;
    }
    return true;
}
