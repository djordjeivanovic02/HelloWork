const inputLogo = document.querySelector('#companyLogo');
const saveChangeLogo = document.querySelector('.save-change-logo');
const companyLogoElement = document.querySelector('#companyLogoImage');

const logoFormData = new FormData();

function openLogoInput(){
    inputLogo.click();
}

inputLogo.addEventListener('change',  function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(event) {
        var imageUrl = event.target.result;
        companyLogoElement.src = imageUrl;

        logoFormData.append('logo', file);
        
        saveChangeLogo.classList.add('active');
      };
      
      reader.readAsDataURL(file);
});