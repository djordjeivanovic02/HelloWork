function showDialog(element) {
    const dialogBackground = document.querySelector(`#${element}_background`);
    const dialogBox = document.querySelector(`#${element}_main`);

    dialogBox.addEventListener('click', function (event) {
        event.stopPropagation();
    })

    dialogBackground.classList.remove('passive');
    dialogBackground.classList.add('active');

    dialogBox.classList.remove('passive');
    dialogBox.classList.add('active');

    document.body.style.overflow = 'hidden';
}

function closeDialog(element) {
    const dialogBackground = document.querySelector(`#${element}_background`);
    const dialogBox = document.querySelector(`#${element}_main`);

    dialogBox.classList.remove('active');
    dialogBox.classList.add('passive');

    setTimeout(() => {
        dialogBackground.classList.remove('active');
        dialogBackground.classList.add('passive');
        document.body.style.overflow = 'auto';
    }, 300);
}
