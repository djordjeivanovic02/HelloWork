async function deleteAccount(id, admin = false) {
    try {
        const response = await fetch('/delete-account/' + id, {
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
            if (admin) {
                document.querySelector(`#row_ad_${id}`).style.display = 'none';
            } else {
                window.location.href = "/";
            }
        } else if (data.type == 'error') {
            alert("Došlo je do greške prilikom brisanja oglasa");
        }
    } catch (error) {
        alert("Došlo je do greške prilikom brisanja oglasa");
    }
}
