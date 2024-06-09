const cvInput = document.querySelector('#cv');

let cv = new FormData();

function triggerCVInput() {
    cvInput.click();
}

cvInput.addEventListener('change', function (event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function (event) {
        if (file) {
            cv.append('cv', file);
            uploadCV();
        }
    };

    reader.readAsDataURL(file);
});

async function uploadCV() {
    try {
        const response = await fetch('/upload-cv', {
            method: 'POST',
            body: cv,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        const data = await response.json();
        console.log(data);
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        window.location.reload();
    }
}

async function deleteCV() {
    try {
        const response = await fetch('/delete-cv', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        const data = await response.json();
        console.log(data);
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        window.location.reload();
    }
}
