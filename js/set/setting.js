// main content load out
const setLiLd = document.getElementById("setLiLd");
const ldLI_1 = document.getElementById("setLi1_");
const setUL = document.querySelectorAll(".setPnlLft li");
const setPnlMn_Hdr = document.querySelector(".setPnlMn_Hdr");
const setPnlMn_Bdy = document.querySelector(".setPnlMn_Bdy");


window.addEventListener('load', function(event) {
    ldLI_1.classList.add("sel_1x");
});


setUL.forEach((setLI) => {
    setLI.classList.remove("sel_1x");
    setLI.addEventListener('click', () => {
    const notClickedLinks = Array.from(setUL).filter((notClickedLink) => {
        return notClickedLink !== setLI;
    });

    notClickedLinks.forEach((notClickedLink) => {
        notClickedLink.classList.remove("sel_1x");
    });

    setLI.classList.add("sel_1x");
    });
});


function setMthd(pTp,id,vAl1,vAl2) {
    // header load out
    console.log(vAl1+" | "+vAl2);

    setPnlMn_Hdr.innerHTML = vAl1;
    // side panel load out 
    var ajax1 = ajaxObj("POST", "prs/set/setPnlLft_load.php");
        ajax1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax1.onreadystatechange = function() { 
            if(ajax1.readyState == 4 && ajax1.status == 200) { 
                var return_data1 = ajax1.responseText; 
                if(return_data1 != ""){ 
                    setLiLd.innerHTML = return_data1;
                } 
            } 
        } 
        ajax1.send("pTp="+pTp+"&id="+id+"&vAl1="+vAl1+"&vAl2="+vAl2);  

    // body content load out
    var ajax2 = ajaxObj("POST", "prs/set/setPnlMn_load");
        ajax2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax2.onreadystatechange = function() { 
            if(ajax2.readyState == 4 && ajax2.status == 200) { 
                var return_data2 = ajax2.responseText; 
                if(return_data2 != ""){ 
                    setPnlMn_Bdy.innerHTML = return_data2;
                    console.log(return_data2);
                } 
            } 
        } 
        ajax2.send("pTp="+pTp+"&id="+id+"&vAl1="+vAl1+"&vAl2="+vAl2);  
    
}
    
