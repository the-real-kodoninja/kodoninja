const DCNtgl_1 = document.querySelector('#DCNtgl_1');
const DCNtgl_2 = document.querySelector('#DCNtgl_2');

DCNtgl_1.addEventListener('click', function(event){ 
    DCNtgl_1.style.cssText = `background-color: rgba(176, 74, 74, 0.9);`;
    DCNtgl_2.style.cssText = `background-color: rgba(255, 255, 255, 0.9);`;
});

DCNtgl_2.addEventListener('click', function(event){ 
    DCNtgl_2.style.cssText = `background-color: rgba(176, 74, 74, 0.9);`;
    DCNtgl_1.style.cssText = `background-color: rgba(255, 255, 255, 0.9);`;
});

