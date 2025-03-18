
function usr_Upv_fN1(cid,uid,v_type,c_typeA,c_typeB,curNum) {
    var zVal = "";
    var newNum = "";
    //
    //
    if (curNum <= 9) {
        zVal = "00";
    } else if (curNum <= 99) {
        zVal = "0";
    } else if (curNum <= 999) {
        zVal = "";
    } 
    // requires new logic 1k and above
    else if (curNum >= 999) {
        zVal = "1k";
    }
    //
    //
    if (v_type == "c_up") {
        document.getElementById("UpVote_"+cid).style = "border-color: darkred;";
        newNum = Number(curNum) + 1;
        
    } else if (v_type == "c_dn") {
        document.getElementById("DnVote_"+cid).style = "border-color: darkred;";
        newNum = Number(curNum) - 1;
    }
    
    var test = document.getElementById("uvt_nUmz__"+curNum).innerHTML = zVal+newNum;
    console.log("Test new number output:"+test);
    console.log(cid,uid,v_type,c_typeA,c_typeB);

    var ajax = ajaxObj("POST", "prs/uvt/uvt_Lgc__x.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                console.log(return_data);
            } else {
                console.log(return_data);
            }
        } 
    } 
    ajax.send("cid="+cid+
                "&uid="+uid+
                "&v_type="+v_type+
                "&c_typeA="+c_typeA+
                "&c_typeB="+c_typeB);
}