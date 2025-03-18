function dbSm_2(s){ 
    var dlwn_Rslt_1 = document.getElementById("dlwn_Rslt_1");
    var trm_2 = document.getElementById("dbS_2");
    // 
    var tst_1 = document.getElementById("tst_1");
    var tst_2 = document.getElementById("tst_2");
    // 
    // filter menu pull
    const dwLd_cHk = document.querySelectorAll(".dwLd_cHk:checked");
    cHk_aRy = Array.from(dwLd_cHk).map(x => x.value);
    //
    const f3 = document.getElementById("dwLd_3a").value; // price
    //
    //
    var rx = new RegExp; 
    var rx = /[^a-zA-Z0-9 ]/m; 
    var replaced = s.search(rx) >= 0; 
    if(replaced){ 
    s = s.replace(rx, ""); 
            trm_2.value = s; 
    } 
    tst_2.innerHTML = 'searching for '+s;
    tst_1.style.display = "none";
    var ajax = new XMLHttpRequest(); 
    ajax.open("POST", `${m_path}icl/dwnld/dbS_2.php`, true); 
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                    if(return_data != ""){ 
                        tst_2.innerHTML = return_data; 
                    } 
        } 
    } 
    // 4 ajax calls 
    ajax.send("s="+s+"&f3="+f3+"&cHk_aRy="+cHk_aRy);
    if (s == "") {
        dlwn_Rslt_1.innerHTML = "Showing Everything";
        tst_1.style.display = "block";
    } else {
        dlwn_Rslt_1.innerHTML = "Showing "+s+" (filter: "+cHk_aRy+f3+")";
        tst_2.innerHTML = return_data; 
    }
} 
