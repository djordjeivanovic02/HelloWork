async function addPrevious() {
    const previousTitle = document.querySelector('#previous-title');
    const previousCompany = document.querySelector('#previous-company');
    const previousStart = document.querySelector('#previous-start');
    const previousEnd = document.querySelector('#previous-end');

    const formData = new FormData();
    formData.append('previousTitle', previousTitle.value);
    formData.append('previousCompany', previousCompany.value);
    formData.append('previousStart', previousStart.value);
    formData.append('previousEnd', previousEnd.value);

    try {
        const response = await fetch('/add-previous-job', {
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
        }
    } catch (error) {
        alert("Došlo je do greške prilikom brisanja oglasa");
    }
}


async function removePrevious(id) {
    try {
        const response = await fetch('/remove-previous-job/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        const data = await response.json();
        if (data.type == 'success') {
            closeDialog('previous');
            document.querySelector(`#early-job-${id}`).style.display = 'none';
        }
    } catch (error) {
        alert("Došlo je do greške prilikom brisanja oglasa");
    }
}
