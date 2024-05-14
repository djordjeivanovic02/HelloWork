var csrf_token = $('meta[name="csrf-token"]').attr('content');
const dialogBackground = document.querySelector('.dialog-background');
const dialogBox = dialogBackground.querySelector('.dialog-box');

function showDialog(){
    dialogBackground.classList.remove('passive');
    dialogBackground.classList.add('active');

    dialogBox.classList.remove('passive');
    dialogBox.classList.add('active');

    document.body.style.overflow = 'hidden';
}

function closeDialog(){
    dialogBox.classList.remove('active');
    dialogBox.classList.add('passive');

    setTimeout(()=> {
        dialogBackground.classList.remove('active');
        dialogBackground.classList.add('passive');
        document.body.style.overflow = 'auto';
    }, 300);
}

async function logOut(){
   await $.ajax({
        url: '/logout',
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        success:function(){
            window.location.href = '/';
        },
        error:function(xhr, status, error){
            console.log(xhr.responseText);
        }
    });
}