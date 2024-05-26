async function deleteJob(jobId) {
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
        console.log(jsonResponse.type);
        if (jsonResponse.type == 'success') {
            const rowEl = document.querySelector('#row_ad_' + jobId);
            rowEl.style.display = 'none';
        } else if (jsonResponse.type == 'error') {
            alert("Došlo je do greške, molomo pokušajte kasnije!");
        }
    } catch (error) {
        alert("Došlo je do greške, molomo pokušajte kasnije!");
    }
}
