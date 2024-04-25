const loginBtn = document.querySelector('#login-btn');
const loginErrorContainer = document.querySelector('.login-error-container');

loginBtn.addEventListener('click', login);


function login(){
    const email = document.querySelector('#login-email').value;
    const password = document.querySelector('#login-password').value;
    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/login',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrf_token
        },
        data: {
            email: email,
            password: password
        },
        success:function(response){
            if(response.redirect){
                window.location.href = response.redirect;
            }
        },
        error:function(xhr, status, error){
            loginErrorContainer.classList.add('active');
            console.log(xhr.responseText);
        }
    });
}
