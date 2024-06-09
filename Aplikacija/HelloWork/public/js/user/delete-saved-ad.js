async function deleteSavedAd(id) {
    console.log(id);
    const url = `/delete-saved-ad`;
    const data = JSON.stringify({
        ad_id: id,
    });
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf_token
            },
            body: data
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const jsonResponse = await response.json();
        console.log(jsonResponse.type);
        if (jsonResponse.type == 'success') {
            const rowEl = document.querySelector('#row_ad_' + id);
            rowEl.style.display = 'none';
            closeDialog('delete_saved_ad_' + id);
        } else if (jsonResponse.type == 'error') {
            alert("Došlo je do greške, molomo pokušajte kasnije!");
        }
    } catch (error) {
        alert("Došlo je do greške, molomo pokušajte kasnije!");
        console.log(error);
    }
}
