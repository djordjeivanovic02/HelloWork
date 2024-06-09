const connect = [
    { input_id: 'name', lbl_id: 'name-lbl' },
    { input_id: 'profession', lbl_id: 'profesion-lbl' },
    { input_id: 'age', lbl_id: 'age-lbl' },
    { input_id: 'phone', lbl_id: 'phone-lbl' },
    { input_id: 'email', lbl_id: 'email-lbl' },
    { input_id: 'website', lbl_id: 'website-lbl' },
    { input_id: 'address', lbl_id: 'adress-lbl' },
    { input_id: 'about', lbl_id: 'about-lbl' }
]

function change(event) {
    const inputId = event.target.id;
    // console.log("ID input polja:", inputId)
    const inputEl = document.querySelector(`#${inputId}`);

    const conObj = connect.find(item => item.input_id === inputId)
    // console.log(conObj)
    const lblEl = document.querySelector(`#${conObj.lbl_id}`);
    let timer;

    inputEl.addEventListener('input', () => {
        clearTimeout(timer);
        timer = setTimeout(() => doneTyping(inputEl, lblEl), 500);
    });
}

function doneTyping(input, label) {
    label.textContent = input.value;
}

document.querySelector('#image').addEventListener('change', function (event) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.querySelector('.profile-img');
            img.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
});
