async function deleteJob(jobId, admin = false) {
    const url = `/company-delete-job/${jobId}`;
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const jsonResponse = await response.json();
        if (jsonResponse.type == 'success') {
            if (admin) {
                document.querySelector(`#one-ad-${jobId}`).style.display = 'none';
            } else {
                const rowEl = document.querySelector('#row_ad_' + jobId);
                rowEl.style.display = 'none';
            }
        } else if (jsonResponse.type == 'error') {
            alert("Došlo je do greške, molomo pokušajte kasnije!");
        }
    } catch (error) {
        alert("Došlo je do greške, molomo pokušajte kasnije!");
    }
}

async function deleteJobAdmin(jobId, admin = false) {
    const url = `/admin-delete-job/${jobId}`;
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrf_token
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const jsonResponse = await response.json();
        if (jsonResponse.type == 'success') {
            if (admin) {
                document.querySelector(`#one-ad-${jobId}`).style.display = 'none';
                closeDialog('delete-ad-' + jobId);
            } else {
                const rowEl = document.querySelector('#row_ad_' + jobId);
                rowEl.style.display = 'none';
            }
        } else if (jsonResponse.type == 'error') {
            alert("Došlo je do greške, molomo pokušajte kasnije!");
        }
    } catch (error) {
        alert("Došlo je do greške, molomo pokušajte kasnije!");
    }
}
