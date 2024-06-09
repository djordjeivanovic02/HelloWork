var csrf_token = $('meta[name="csrf-token"]').attr('content');

async function logOut() {
    await $.ajax({
        url: '/logout',
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        success: function () {
            window.location.href = '/';
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}
