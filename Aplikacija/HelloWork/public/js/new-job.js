const inputImage = document.querySelector('#inputImage');
const openBtn = document.querySelector('.add-img');
var imageContainer = document.querySelector('.image-container');

openBtn.addEventListener('click', addImage);

inputImage.addEventListener('change',  function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(event) {

        openBtn.classList.add('hidden');
        
        var imageUrl = event.target.result;
        var imageElement = document.createElement('img');
        imageElement.src = imageUrl;
        
        imageContainer.classList.add('active');
        imageContainer.addEventListener('click', removeImage);
        imageContainer.innerHTML = '';
        imageContainer.appendChild(imageElement);
      };
      
      reader.readAsDataURL(file);
});

function addImage(){
    inputImage.click();
}
function removeImage(){
    inputImage.value = '';
    imageContainer.classList.remove('active');
    openBtn.classList.remove('hidden');
}