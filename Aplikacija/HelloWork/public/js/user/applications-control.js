const all = document.querySelector('.all-applications');
const accepted = document.querySelector('.accepted-applications');
const rejected = document.querySelector('.rejected-applications');
const active = document.querySelector('.active-applications');

const showSelect = document.querySelector('#aplicationsSelect');

showSelect.addEventListener('change', function () {
    switch (showSelect.value) {
        case '1':
            all.classList.add('active');
            accepted.classList.remove('active');
            rejected.classList.remove('active');
            active.classList.remove('active');
            break;
        case '2':
            all.classList.remove('active');
            accepted.classList.add('active');
            rejected.classList.remove('active');
            active.classList.remove('active');
            break;
        case '3':
            all.classList.remove('active');
            accepted.classList.remove('active');
            rejected.classList.add('active');
            active.classList.remove('active');
            break;
        case '4':
            all.classList.remove('active');
            accepted.classList.remove('active');
            rejected.classList.remove('active');
            active.classList.add('active');
            break;
    }
})
