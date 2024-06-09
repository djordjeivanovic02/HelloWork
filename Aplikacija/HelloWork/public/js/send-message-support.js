const supportName = document.querySelector('#supportName');
const supportEmail = document.querySelector('#supportEmail');
const supportMessage = document.querySelector('#supportMessage');

async function sendMessage() {
    if (!validateSupport()) return;
    console.log("TU sam");

    const formData = new FormData();
    formData.append('senderName', supportName.value);
    formData.append('senderEmail', supportEmail.value);
    formData.append('message', supportMessage.value);


    removeError();
    try {
        const response = await fetch('/send-message-support', {
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
        console.log(data);
        if (data.type == 'success') {
            showDialog('notification');
        } else if (data.type == 'error') {
            alert("Došlo je do greške, molimo pokušajte kasnije");
        }
    } catch (error) {

    }
}

function validateSupport() {
    if (supportName.value.trim() == '') {
        supportName.style.border = '1px solid red';
        return false;
    }
    if (supportEmail.value.trim() == '') {
        supportEmail.style.border = '1px solid red';
        return false;
    }
    if (supportMessage.value.trim() == '') {
        supportMessage.style.border = '1px solid red';
        return false;
    }

    return true;
}

function removeError() {
    supportName.style.border = "1px solid lightgray";
    supportEmail.style.border = "1px solid lightgray";
    supportMessage.style.border = "1px solid lightgray";
}
