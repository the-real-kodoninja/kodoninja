function dbSm_3(s){ 
    var blg_Rslt_1 = document.getElementById("blg_Rslt_1");
    var trm_3 = document.getElementById("dbS_3");
    // 
    var tst_1 = document.getElementById("tst_1");
    var tst_2 = document.getElementById("tst_2");
    // filter menu pull
    const bLg_cHk = document.querySelectorAll(".bLg_cHk:checked");
    cHk_aRy = Array.from(bLg_cHk).map(x => x.value);
    //
    //
    var rx = new RegExp; 
    var rx = /[^a-zA-Z0-9 ]/m; 
    var replaced = s.search(rx) >= 0; 
    if(replaced){ 
    s = s.replace(rx, ""); 
            trm_3.value = s; 
    } 
    tst_2.innerHTML = 'searching for '+s;
    tst_1.style.display = "none";
    var ajax = new XMLHttpRequest(); 
    ajax.open("POST", "icl/blog/dbS_3.php", true); 
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                    if(return_data != ""){ 
                        tst_2.innerHTML = return_data; 
                    } 
        } 
    } 
    // 2 ajax calls 
    ajax.send("s="+s+"&cHk_aRy="+cHk_aRy);
    if (s == "") {
        blg_Rslt_1.innerHTML = "Showing Everything";
        tst_1.style.display = "block";
    } else {
        blg_Rslt_1.innerHTML = "Showing "+s+" (filter: "+cHk_aRy+")";
        tst_2.innerHTML = return_data; 
    }
} 
