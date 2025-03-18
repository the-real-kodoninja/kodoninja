<script>
function vPnlMod() {
    const vPnlBck = document.querySelector(".vPnlBck").classList.toggle("dN");
    const vPnlCtr = document.querySelector(".vPnlCtr").classList.toggle("dN");
    const vPnlHdr = document.getElementById("vPnlHdr");
    const vPnlBdy = document.getElementById("vPnlBdy");
    const vPnlMain = document.getElementById("vPnlMain");
    const vPnlFtr = document.getElementById("vPnlFtr"); 
};

function setDEACT(uid,hid,sid,nme,opt,aws) {
    var pst_eVal = "";
    var st__DEACT_uWpr = document.getElementById("st__DEACT_uWpr");
    var st__DEACT_uFULL = document.getElementById("st__DEACT_uFULL");
    var st__x_upwd4 = document.getElementById("st__x_upwd4").value;
    //
    document.querySelector(".vPnlUsr_hdr").style.display = "none";
    document.querySelector(".vPnlUsr_hdr").innerHTML = "";
    // clears out report logic
    vPnlMain.innerHTML = "";
    // resets height after report logic
    document.querySelector(".vPnlWpr").style.height = '200px';
    vPnlFtr.classList.add("pA");
    if (uid !== "" && hid !== "" && sid !== "" && nme !== "" && opt !== "") {
        var log_uid = `<?php echo $log_id; ?>`; // don't matter public information
        var log_hid = `<?php echo $log_HshCde; ?>`; // don't matter updates on refresh
        var log_sid = `<?php echo $log_sHshCde; ?>`; // don't matter updates on action
        var log_nme = `<?php echo $log_username; ?>`; // don't matter public information
        // developer grabs
        // console.log('developer checks vanilla js 1x1 | '+uid,hid,sid,nme,opt,aws+` your input password ${st__x_upwd4}`);
        // && sid === log_sid
        if (uid === log_uid && 
            hid === log_hid && 
            nme === log_nme && 
            opt === "suspend" || opt === "deactivate" && 
            aws === "YESX" || aws === "YESR" || aws === "NULL") {
            if (opt === "suspend" && aws === "NULL" || opt === "deactivate" && aws === "NULL") {
                var btnYes = '<button onclick="setDEACT(\''+uid+'\',\''+hid+'\',\''+sid+'\',\''+nme+'\',\''+opt+'\',\'YESX\')" style="background-color: darkred; color: #fff; border: none; padding: 10px; width: 285px; display: inline-block; margin-right: 5px;">yes</button>';
                var btnNo = '<button onclick="vPnlMod()" style="background-color: darkred; color: #fff; border: none; padding: 10px; width: 285px; display: inline-block;">no</button>';
                if (opt === "suspend" && aws === "NULL" || opt === "deactivate" && aws === "NULL") {
                    vPnlHdr.innerHTML = "Looks like you want to "+opt+" your kodoverse account";
                    vPnlBdy.innerHTML = "Are you sure you want to "+  opt+" your kodoverse account?";
                    vPnlFtr.innerHTML = btnYes + btnNo;
                    return vPnlMod();
                } 
            } if (opt === "suspend" && aws === "YESX" || opt === "deactivate" && aws === "YESX") {
                //
                st__DEACT_uWpr.classList.add("dB");
                st__DEACT_uFULL.innerHTML = "Please enter your password to "+opt+" your kodoverse account";
                document.getElementById("st__x_nbtn4").innerHTML ='<button onclick="setDEACT(\''+uid+'\',\''+hid+'\',\''+sid+'\',\''+nme+'\',\''+opt+'\',\'YESR\')">proceed</button>';
                return vPnlMod();
            }if (st__x_upwd4 && opt === "suspend" && aws === "YESR" || opt === "deactivate" && aws === "YESR") {
                    // console.log('developer checks vanilla js 3x | '+uid,hid,sid,nme,opt,aws+` your input password ${st__x_upwd4}`);
                    var ajax = ajaxObj("POST", `${m_path}prs/set/yoa/acc-dya.php`);
                    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    ajax.onreadystatechange = function() { 
                        if(ajax.readyState == 4 && ajax.status == 200) { 
                            var return_data = ajax.responseText; 
                            if(return_data != ""){   
                                console.log(return_data);
                                // st__DEACT_uFULL.innerHTML = String(return_data.split("__").shift());
                                // var val_chk_1 = String(return_data.split("__").pop());
                                // if (val_chk_1 === "true") {  // perfect conditions
                                //     setInterval( function() {
                                //         url = document.location = "logout.php"; 
                                //         window.location(url);
                                //     }, 5000 );
                                // } 
                            } 
                        } 
                    } 
                    ajax.send("uid="+uid+
                                "&hid="+hid+
                                "&sid="+sid+
                                "&nme="+nme+
                                "&opt="+opt+
                                "&aws="+aws+
                                "&st__x_upwd4="+st__x_upwd4); 
                }
            
            
            
        }
    } else {
        st__DEACT_uFULL.innerHTML = "Please refresh `<?php echo $log_username; ?>` you timed out, meow.";
    }
};

</script>