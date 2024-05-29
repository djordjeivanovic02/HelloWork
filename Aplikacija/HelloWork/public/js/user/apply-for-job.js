async function applyForJob(id) {
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
        console.log(data);
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        // window.location.reload();
    }
}
