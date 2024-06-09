$(document).ready(function () {
    $('.pass_show').append('<span class="ptxt">Prikaži</span>');
});


$(document).on('click', '.pass_show .ptxt', function () {

    $(this).text($(this).text() == "Prikaži" ? "Sakrij" : "Prikaži");

    $(this).prev().attr('type', function (index, attr) {
        return attr == 'password' ? 'text' : 'password';
    });

});


async function changePassword(id) {
    const newPassword = document.querySelector('#newPassword');
    const repeatedPasswod = document.querySelector('#repeatedPassword');
    const errorIndicator = document.querySelector('#error-message');


    const inputContainer = document.querySelector('#input-cont');
    const successContainer = document.querySelector('#success');
    const errorContainer = document.querySelector('#error');

    if (newPassword.value.trim() == '') {
        showError(errorIndicator, 'Morate uneti lozinku');
        return;
    }
    if (newPassword.value.length < 8) {
        showError(errorIndicator, 'Lozinka mora biti duža od 7 karaktera');
        return;
    }
    if (repeatedPasswod.value.trim() == '') {
        showError(errorIndicator, 'Morate potvrditi lozinku');
        return;
    }
    if (repeatedPasswod.value != newPassword.value) {
        showError(errorIndicator, 'Lozinke se ne poklapaju');
        return;
    }

    errorIndicator.style.display = 'none';

    const formData = new FormData();
    formData.append('id', id);
    formData.append('password', newPassword.value);


    const response = await fetch('/reset-user-password', {
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
        inputContainer.style.display = 'none';
        successContainer.style.display = 'flex';
    } else if (data.type == 'error') {
        inputContainer.style.display = 'none';
        errorContainer.style.display = 'flex';
    }

}


function showError(container, error) {
    container.innerHTML = error;
    container.style.display = 'block';
}
