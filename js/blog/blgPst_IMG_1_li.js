// https://stackoverflow.com/questions/72236829/getting-image-from-input-file-and-then-add-it-as-a-background-to-a-div


const fileInput = document.getElementById('imgVwYb');

const pLg2X1 =  document.querySelectorAll('.__pLg2X1');
const pLg2X2 =  document.querySelectorAll('.__pLg2X2');
const pLg2b = document.querySelectorAll('label.__pLg2b'); 
const pLg2X2a = document.querySelector('.__pLg2X2a');

fileInput.addEventListener('change', (e) =>{
    const file = e.target.files[0];

    let fileReader = new FileReader();
    fileReader.readAsDataURL(file);
    fileReader.onload = function (){
        pLg2X1[0].setAttribute('src', fileReader.result);
        pLg2X2[0].setAttribute('src', fileReader.result);
        pLg2X1[0].setAttribute('style', `background-image: url('${fileReader.result}')`);
        pLg2X2[0].setAttribute('style', `background-image: url('${fileReader.result}')`);
        // main cover
        pLg2b.style.display = "none";
        pLg2X2a.style.display = "block";
        // top cover
    }
});


pLg2X2a.addEventListener('click', function (event) {
    pLg2b.style.display = "block";
    pLg2X1.style.backgroundImage = '';
    pLg2X2.style.backgroundImage = '';
});