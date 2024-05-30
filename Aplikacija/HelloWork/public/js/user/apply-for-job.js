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

            closeDialog(dialogName);
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

            closeDialog(dialogName);
        }
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        // window.location.reload();
    }
}
