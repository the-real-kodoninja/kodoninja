<script>
function NEWpwdUpd(uid,hid,sid,nme) {
    // mo output by success or failure
    // do not alert which is incorrect or correct
    const st__x_upwd1 = document.getElementById("st__x_upwd1").value;
    const st__x_upwd2 = document.getElementById("st__x_upwd2").value;
    const st__x_upwd3 = document.getElementById("st__x_upwd3").value;
    const st__r2_uFULL = document.getElementById("st__r2_uFULL");
    
    if (uid !== "" && hid !== "" && sid !== "" && nme !== "") {
        // developer checks
        // console.log("(uid "+uid+") (hid "+hid+") (sid "+sid+") (nme "+nme+")");
        // console.log("(pwd 1 "+st__x_upwd1+")"+" (pwd2 "+st__x_upwd2+") (pwd3 "+st__x_upwd3+")");
        // log checks on both fnt, n bck
        var log_uid = `<?php echo $log_id; ?>`; // don't matter public information
        var log_hid = `<?php echo $log_HshCde; ?>`; // don't matter updates on refresh
        var log_sid = `<?php echo $log_sHshCde; ?>`; // don't matter updates on action
        var log_nme = `<?php echo $log_username; ?>`; // don't matter public information
        console.log("("+uid+"==="+log_uid+") ("+hid+"==="+log_hid+") ("+sid+"==="+log_sid+") ("+nme+"==="+log_nme+")");
        if (parseInt(uid) === parseInt(log_uid) 
        // && hid === log_hid
        // && String(sid) === String(log_sid)
        ) {
            // do all checks in bck chck all tgthr smtsly
            var fld = "fld_2a";
            st__r2_uFULL.classList.add("set_res_q");
            st__r2_uFULL.innerHTML = `Hang on `+log_nme+` I'll let you know if everything updated okay`; 
            var ajax = ajaxObj("POST", `${m_path}prs/set/yoa/chg-pwd.php`);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    st__r2_uFULL.innerHTML = return_data;
                } 
            } 
        } 
        ajax.send("fld="+fld+
                    "&uid="+uid+
                    "&hid="+hid+
                    "&sid="+sid+
                    "&nme="+nme+
                    "&st__x_upwd1="+st__x_upwd1+
                    "&st__x_upwd2="+st__x_upwd2+
                    "&st__x_upwd3="+st__x_upwd3); 
        } else {
            st__r2_uFULL.classList.add("set_res_q");
            st__r2_uFULL.innerHTML = "Had a hick up meow";
        }
    }
}
</script>