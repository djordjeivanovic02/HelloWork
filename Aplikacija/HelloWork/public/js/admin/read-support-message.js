async function readMessage(id) {
    showDialog('quick_preview_' + id);
    try {
        const response = await fetch('/read-message/' + id, {
            method: 'PUT',
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
        }
    } catch (error) {
        alert("Došlo je do greške, molimo pokušajte kasnije " + error.message);
    } finally {
        // window.location.reload();
    }
}
