<script>
// main content load out
const setLiLd = document.getElementById("setLiLd");
const ldLI_1 = document.getElementById("setLi1_");
const setUL = document.querySelectorAll(".setPnlLft li");
const setPnlMn_Bdy = document.querySelector(".setPnlMn_Bdy");
const setLi_ALL = document.querySelectorAll("#setLiLd li");
const setPnlMn = document.querySelector(".setPnlMn");

// side panel selected
// setLi_ALL.addEventListener('onchange', function(event) {
//     this.style.cssText = `
//         background-color: #f1f1f1;
//         color: #333;
//     `;
// });

window.addEventListener('load', function(event) {
    // real user checks should be completed to this point
    // setMthd('L1','1','Your account','Your account')
    // 1st in load out auto presets 
    var pTp = "L1";
    var id = "1";
    var vAl1 = "Your Account";
    var vAl2 = "Your Account";
    var vAl4 = `<?php echo $p_load; ?>`;
    // body content load out
    var ajax2 = ajaxObj("POST", `${m_path}prs/set/setPnlMn_load.php`);
        ajax2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax2.onreadystatechange = function() { 
            if(ajax2.readyState == 4 && ajax2.status == 200) { 
                var return_data2 = ajax2.responseText; 
                if(return_data2 != ""){ 
                    setPnlMn_Bdy.innerHTML = return_data2;  
                } 
                console.log(return_data2);
            } 
        } 
        ajax2.send("pTp="+pTp+"&id="+id+"&vAl1="+vAl1+"&vAl2="+vAl2+"&vAl4="+vAl4); 
});


setUL.forEach((setLi_ALL) => {
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


function setMthd(pTp,id,vAl1,vAl2,vAl3,vAl4) {
    if (p_load == 'f') {
        const p_load = `<?php echo $p_load; ?>`;
        const setPnlMn_Hdr = document.querySelector(".setPnlMn_Hdr");
        // header load out
        setPnlMn_Hdr.innerHTML = vAl1;
    }
    
    // side panel load out 
    var ajax1 = ajaxObj("POST", `${m_path}prs/set/setPnlLft_load.php`);
        ajax1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax1.onreadystatechange = function() { 
            if(ajax1.readyState == 4 && ajax1.status == 200) { 
                var return_data1 = ajax1.responseText; 
                if(return_data1 != ""){ 
                    setLiLd.innerHTML = return_data1;
                } 
            } 
        } 
        ajax1.send("pTp="+pTp+"&id="+id+"&vAl1="+vAl1+"&vAl2="+vAl2+"&vAl3="+vAl3+"&vAl4="+vAl4);  

    // body content load out
    var ajax2 = ajaxObj("POST", `${m_path}prs/set/setPnlMn_load.php`);
        ajax2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax2.onreadystatechange = function() { 
            if(ajax2.readyState == 4 && ajax2.status == 200) { 
                var return_data2 = ajax2.responseText; 
                if(return_data2 != ""){ 
                    setPnlMn_Bdy.innerHTML = return_data2;
                    if(vAl4 == 'm') {
                        if(vAl3 == 'y1') {
                            setPnlMn.style.cssText = `display: none`;
                        } else if(vAl3 == 'y2') {
                            if (return_data2.includes('hdrADD__')) {
                                let hdrADD = ' '+return_data2.split('hdrADD__')[1].split('__END')[0];
                                document.querySelector(".hdrADD").append(hdrADD);
                                setPnlMn_Bdy.innerHTML = return_data2.split('__END')[1];
                            } 
                            setPnlMn.style.cssText = `display: block`;
                        }
                        
                    }
                } 
            } 
        } 
        ajax2.send("pTp="+pTp+"&id="+id+"&vAl1="+vAl1+"&vAl2="+vAl2+"&vAl4="+vAl4);  
    
}
    

</script>