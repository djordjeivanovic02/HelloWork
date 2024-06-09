async function applyForJob(id, dialogName) {
    try {
        const formData = new FormData();
        formData.append('id', id);
        const response = await fetch('/apply-for-job', {
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
            const btn = document.querySelector('.job-actions button');
            btn.style.backgroundColor = 'red';
            btn.innerHTML = 'Otkaži apliciranje';

            // closeDialog(dialogName
            window.location.reload();
        }
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        // window.location.reload();
    }
}

async function cancelApplication(id, dialogName) {
    try {
        const formData = new FormData();
        formData.append('id', id);
        const response = await fetch('/cancel-apply', {
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
            const btn = document.querySelector('.job-actions button');
            btn.style.backgroundColor = '#613FE5';
            btn.innerHTML = 'Apliciraj za posao';

            // closeDialog(dialogName);
            window.location.reload();
        }
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        // window.location.reload();
    }
}

async function cancelApplicationList(id, dialogName) {
    try {
        const formData = new FormData();
        formData.append('id', id);
        const response = await fetch('/cancel-apply', {
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
            const widget = document.querySelector('#appl-cont-' + id);
            widget.style.display = 'none';

            closeDialog(dialogName);
        }
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        // window.location.reload();
    }
}


async function acceptApplication(id, user_id, dialogName) {
    try {
        const formData = new FormData();
        const messageBox = document.querySelector('#message_' + dialogName + '-' + id + '-' + user_id).value;

        formData.append('id', id);
        formData.append('user_id', user_id);
        formData.append('message', messageBox);

        const response = await fetch('/accept-application', {
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
            window.location.reload();
            // closeDialog(dialogName);
        }
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error);
    } finally {
    }
}


async function returnApplication(id, user_id) {
    try {
        const formData = new FormData();

        formData.append('id', id);
        formData.append('user_id', user_id);

        const response = await fetch('/return-application', {
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
        if (data.type == 'success')
            window.location.reload();
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
    }
}


async function returnApplication(id, user_id) {
    try {
        const formData = new FormData();

        formData.append('id', id);
        formData.append('user_id', user_id);

        const response = await fetch('/return-application', {
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
        if (data.type == 'success')
            window.location.reload();
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
    }
}

async function rejectApplication(id, user_id, dialogName) {
    try {
        const formData = new FormData();
        const messageBox = document.querySelector('#message_' + dialogName + '-' + id + '-' + user_id).value;

        formData.append('id', id);
        formData.append('user_id', user_id);
        formData.append('message', messageBox);

        const response = await fetch('/reject-application', {
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
        if (data.type == 'success')
            window.location.reload();
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
    }
}
