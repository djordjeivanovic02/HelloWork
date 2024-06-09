var csrf_token = $('meta[name="csrf-token"]').attr('content');
const oldPasswordElement = document.querySelector('#oldPassword');
const newPasswordElement = document.querySelector('#newPassword');
const repeatedPasswordElement = document.querySelector('#repeatedPassword');

const notificationElement = document.querySelector('.notification');
const notificationTextElement = notificationElement.querySelector('p');

oldPasswordElement.addEventListener('input', () => removeIdentificator(oldPasswordElement));
newPasswordElement.addEventListener('input', () => removeIdentificator(newPasswordElement));
repeatedPasswordElement.addEventListener('input', () => removeIdentificator(repeatedPasswordElement));

async function changePassword(){
    hideNotification();

    const oldPassword = oldPasswordElement.value;
    const newPassword = newPasswordElement.value;
    const repeatedPassword = repeatedPasswordElement.value;

    if(!checkIsEmpty(oldPassword, newPassword, repeatedPassword)) return;
    if(!checkPasswordLen(newPassword)) return;
    if(!checkVerified(newPassword, repeatedPassword)) return;
    if(!checkIsDiff(oldPassword, newPassword)) return;

    try{
        await fetch('/change-password', {
            method: 'POST',
            body: JSON.stringify({
                old_password: oldPassword,
                password: newPassword
            }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf_token
            }
        }).then(response => {
            if (!response.ok) {
                throw new Error('Greška prilikom ažuriranja lozinke');
            }
            return response.json();
        }).then(data => {
            notificationTextElement.innerHTML = data.message;
            if(data.type == 'success') notificationElement.classList.add('success');
            else notificationElement.classList.add('error');
        }).catch(error => {
            notificationTextElement.innerHTML = "Došlo je do greške, molimo pokušajte kasnije!";
            notificationElement.classList.add('error');
            console.log(error);
        });
    }catch(e){
        notificationTextElement.innerHTML = "Došlo je do greške, molimo pokušajte kasnije!";
        notificationElement.classList.add('error');
    }
}

function checkIsEmpty(oldPassword, newPassword, repeatedPassword){
    if(oldPassword.trim() == ''){
        oldPasswordElement.parentElement.classList.add('error');
        return false;
    }
    if(newPassword.trim() == ''){
        newPasswordElement.parentElement.classList.add('error');
        return false;
    }
    if(repeatedPassword.trim() == ''){
        repeatedPasswordElement.parentElement.classList.add('error');
        return false;
    }
    return true;
}

function checkVerified(newPassword, repeatedPassword){
    if(newPassword !== repeatedPassword){
        removeIdentificator(repeatedPasswordElement);
        repeatedPasswordElement.parentElement.classList.add('not-verified');
        return false;
    }
    return true;
}

function removeIdentificator(element){
    if(element.parentElement.classList.contains('error')){
        element.parentElement.classList.remove('error');
    }
    if(element.parentNode.classList.contains('not-verified')){
        element.parentElement.classList.remove('not-verified');
    }
    if(element.parentNode.classList.contains('short')){
        element.parentElement.classList.remove('short');
    }
    if(element.parentNode.classList.contains('same')){
        element.parentElement.classList.remove('same');
    }
}

function checkPasswordLen(newPassword){
    if(newPassword.length < 8){
        removeIdentificator(newPasswordElement);
        newPasswordElement.parentElement.classList.add('short');
        return false;
    }
    return true;
}

function checkIsDiff(oldPassword, newPassword){
    if(oldPassword === newPassword){
        removeIdentificator(newPasswordElement);
        newPasswordElement.parentElement.classList.add('same');
        return false;
    }
    return true;
}

function hideNotification(){
    if(notificationElement.classList.contains('error'))
        notificationElement.classList.remove('error');
    if(notificationElement.classList.contains('success'))
        notificationElement.classList.remove('success');

    removeIdentificator(oldPasswordElement);
    removeIdentificator(newPasswordElement);
    removeIdentificator(repeatedPasswordElement);
}