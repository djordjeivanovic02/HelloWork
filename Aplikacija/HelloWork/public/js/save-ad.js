async function saveJob(ad_id, screen){
    const url = '/save-ad';
    const data = { ad_id: ad_id };
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf_token
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const jsonResponse = await response.json();
        if(jsonResponse['type'] == 'success'){
            if(jsonResponse['message'] == 'Uspešno sačuvan oglas'){
                if(screen == 1){
                    const element = document.querySelector('.save-job');
                    element.classList.add('active');
                }else{}
            }else if(jsonResponse['message'] == 'Uspešno obrisan oglas'){
                if(screen == 1){
                    const element = document.querySelector('.save-job');
                    element.classList.remove('active');
                }else{}
            }
        }
    } catch (error) {
        console.error('Error:', error);
    }
}
