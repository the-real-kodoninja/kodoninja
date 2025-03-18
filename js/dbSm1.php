<script>
const dbSr = document.getElementById("dbSr");
const dbS = document.getElementById("dbS");
function dSchMn(s,k,v) { 
	document.getElementById("mNu_m_y1").classList.add("dN");
	document.getElementById("mNu_m_y1").classList.remove("dB");
	document.getElementById("mNu_m_y2").classList.add("dN");
	document.getElementById("mNu_m_y2").classList.remove("dB");
	var rx = new RegExp; 
	rx = /[^a-z0-9 #@]/gi; 
	var replaced = s.search(rx) >= 0; 
	if(replaced) { 
	     s = s.replace(rx, ""); 
        dbS.value = s; 
	} if(s == "") { 
        dbSr.style.display = "none"; 
        return false; 
	} 
	dbSr.style.display = "block"; 
	dbSr.innerHTML = 'checking for <b>'+s+'</b>';
	var hr = new XMLHttpRequest(); 
	hr.open("POST",`${m_path}icl/sch/dbS.php`, true); 
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
	hr.onreadystatechange = function() { 
    if(hr.readyState == 4 && hr.status == 200) { 
        var return_data = hr.responseText; 
        if(return_data != "") { 
            dbSr.style.display = "block"; 
            dbSr.innerHTML = return_data; 
        } 
    } 
    }
    hr.send("s="+s+"&k="+k+"&v="+v);
}; 
window.addEventListener('mouseup', function(event){ 
    if (event.target != dbSr && event.target.parentNode != dbSr){ 
        dbSr.style.display = 'none'; 
        dbS.value = ""; 
	} 
}); 

window.addEventListener('onscroll', function(event){ 
	dbSr.style.display = "none"; 
	dbS.value = ""; 
	document.getElementById("mNws_mod").classList.add("dN");
	document.getElementById("mNws_mod").classList.remove("dB");
}); 
</script>