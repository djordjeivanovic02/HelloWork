const elements = document.querySelectorAll('.select-toggler-container');
elements.forEach(element => {
    const elementInput = document.querySelector(`#${element.getAttribute('inputIdentificator')}`);

    element.addEventListener('click', function(){
        const toggler = element.querySelector('.select-toggler');
        if(element.classList.contains('active')){
            this.classList.remove('active');
            this.classList.add('close');

            toggler.classList.remove('active');
            toggler.classList.add('close');

            elementInput.checked = false;
        }else{

            this.classList.remove('close');
            this.classList.add('active');

            toggler.classList.remove('close');
            toggler.classList.add('active');

            elementInput.checked = true;
        }
    })
});