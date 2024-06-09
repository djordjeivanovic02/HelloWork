async function approveAd(adID) {
    const url = `/approve-ad/${adID}`;
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const jsonResponse = await response.json();
        if (jsonResponse.type == 'success') {
            window.location.reload();
        } else {
            alert(jsonResponse.message);
        }
    } catch (error) {
        alert("Došlo je do greške, molomo pokušajte kasnije!");
    }
}

async function rejectAd(adID) {
    const url = `/reject-ad/${adID}`;
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const jsonResponse = await response.json();
        if (jsonResponse.type == 'success') {
            window.location.reload();
        } else {
            alert(jsonResponse.message);
        }
    } catch (error) {
        alert("Došlo je do greške, molomo pokušajte kasnije!");
    }
}
