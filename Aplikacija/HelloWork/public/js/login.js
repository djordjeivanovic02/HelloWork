const loginBtn = document.querySelector('#login-btn');
const loadingBtnLogin = document.querySelector('#login-loading');
const loginErrorContainer = document.querySelector('.login-error-container');

loginBtn.addEventListener('click', login);

async function login() {
    loginBtn.style.display = 'none';
    loadingBtnLogin.style.display = 'flex';
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


        loadingBtnLogin.style.display = 'none';
        loginBtn.style.display = 'flex';
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
        } else if (data.type == 'not-verified') {
            loginErrorContainer.classList.add('active');
            loginErrorContainer.querySelector('b').innerHTML = 'Email adresa nije verifikovana';
            loginErrorContainer.querySelector('p').innerHTML = 'Da biste se prijavili prvo marate da verifikujete svoju email adresu!';

            const spanEl = document.createElement('span');
            spanEl.style.cursor = 'pointer';
            spanEl.style.color = '#613FE5';
            spanEl.innerHTML = "Pošalji ponovo verifikacion mail";
            loginErrorContainer.appendChild(spanEl);

            spanEl.addEventListener('click', () => resendEmailLogin(email));
        }
    } catch (error) {
        loginErrorContainer.classList.add('active');
        loginErrorContainer.querySelector('p').innerHTML = 'Došlo je do problema, molimo pokušajte kasnije!';
    }
}

function validateLogin(email, password) {
    if (email.trim() === '') {
        loginErrorContainer.classList.add('active');
        loginErrorContainer.querySelector('p').innerHTML = 'Email adresa je obavezno polje!';
        loadingBtnLogin.style.display = 'none';
        loginBtn.style.display = 'flex';
        return false;
    } else if (password.trim() === '') {
        loginErrorContainer.classList.add('active');
        loginErrorContainer.querySelector('p').innerHTML = 'Lozinka je obavezno polje!';
        loadingBtnLogin.style.display = 'none';
        loginBtn.style.display = 'flex';
        return false;
    }
    return true;
}

async function resendEmailLogin(email) {
    loginErrorContainer.classList.remove('active');
    loginErrorContainer.querySelector('span').style.display = 'none';
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
            loginErrorContainer.classList.add('active');
            loginErrorContainer.style.backgroundColor = "white";
            loginErrorContainer.style.borderColor = "#34A873";
            loginErrorContainer.querySelector('b').innerHTML = "Email poslat";
            loginErrorContainer.querySelector('p').innerHTML = 'Verifikacioni mail je poslat na email adresu: ' + email;
        } else if (data.type == 'not-exist') {
            loginErrorContainer.classList.add('active');
            loginErrorContainer.querySelector('p').innerHTML = data.message;
        } else if (data.type == 'error') {
            loginErrorContainer.classList.add('active');
            loginErrorContainer.querySelector('p').innerHTML = 'Neispravni podaci!';
        }
    } catch (error) {
        loginErrorContainer.classList.add('active');
        loginErrorContainer.querySelector('p').innerHTML = 'Došlo je do problema, molimo pokušajte kasnije!';
    }
}
