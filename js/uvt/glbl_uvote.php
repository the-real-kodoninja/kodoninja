<script>
function usr_Upv_fN1(cid,uid,v_type,c_typeA,c_typeB,curNum) {
    
    var zVal = "";
    var newNum = "";
    var arwUp = document.getElementById("UpVote_"+cid);
    var arwDn = document.getElementById("DnVote_"+cid);
    var nVal = document.getElementById("uvt_nUmz__"+cid);
    // //
    // //
    if (curNum <= 9) {
        zVal = "00";
    } else if (curNum <= 99) {
        zVal = "0";
    } else if (curNum <= 999) {
        zVal = "";
    } 
    // // requires new logic 1k and above
    else if (curNum >= 999) {
        zVal = "1k";
    }
    // //
    if (v_type == "c_up") {
        arwUp.style = "border-color: darkred;";
        newNum = Number(curNum) + 1;
        
    } else if (v_type == "c_dn") {
        arwDn.style = "border-color: darkred;";
        newNum = Number(curNum) - 1;
    }
    
    nVal.innerHTML = zVal+newNum;
    // console.log(cid,uid,v_type,c_typeA,c_typeB,curNum,nVal,zVal+newNum);
    // //

    var ajax = ajaxObj("POST", "prs/uvt/uvt_Lgc__x.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                alert(return_data);
            }
        } 
    } 
    ajax.send("cid="+cid+
                "&uid="+uid+
                "&v_type="+v_type+
                "&c_typeA="+c_typeA+
                "&c_typeB="+c_typeB);
}
</script>