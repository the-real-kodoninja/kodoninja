<script>
const Rptmsg = "We apologize that this post may not have followed our <a href=\"info.php?i=1\">guidelines</a>, and is perhaps offensive. The kodoverse has loosely regulated platform(s), as we promote freedom of speech and expression..  Please select the following that corresponds to your reasoning";
const vBtnPnl = Rptmsg.substring(0, 118) +" <a id==\"btn_vm\" onclick=\"rptMsg('vm')\">view more</a>";

function rptMsg(vBtn) {
    if (vBtn == "vm") {
        vPnlBdy.innerHTML = Rptmsg + " <a id==\"btn_vm\" onclick=\"rptMsg('vl')\">view less</a>";
    } if (vBtn == "vl") {
        vPnlBdy.innerHTML = vBtnPnl;
    }
};
function glblPst_rPt(cnt,type,cid,opt,res) {
    cnt = cnt.replace(/_/g," ");
    if (cnt === "user") {
        var trm = type;
    } else {
        var trm = `this `+cnt+``;
    }
    let vPnlRpt_optns = () => {
        const vSel_op1 = `
        <div>
            <input class="opSel" type="radio" name="opSel" value="op1"/>
            <label for="op1">This post contained racist or maniacal remarks.</label><br>
            <input class="opSel" type="radio" name="opSel" value="op2"/>
            <label for="op2">This post targets me personally.</label><br>
            <input class="opSel" type="radio" name="opSel" value="op3"/>
            <label for="op3">This contains plagiarism or copyrighted material.</label><br>
            <input class="opSel" type="radio" name="opSel" value="op4"/>
            <label for="op4">Other</label><br>
            <textarea id="opTxt" style="margin: 10px 0px 0px;" placeholder="Please explain exactly why your reporting `+trm+`"></textarea>
        </div>
        `;
        vPnlMain.innerHTML = vSel_op1;
    };
    if (opt == "report" && res == "NULL") {
        vPnlHdr.innerHTML = "Looks like you want to "+opt+" "+trm+" <span class=\"vPnlClx fR\" onclick=\"vPnlMod_RESET()\">(X)</span>";
        vPnlBdy.innerHTML = vBtnPnl;
        vPnlRpt_optns();
        vPnlFtr.classList.remove("pA");
        vPnlFtr.innerHTML = '<button onclick="glblPst_rPt(\''+cnt+'\',\''+type+'\',\''+cid+'\',\'report\',\'yes\')" style="background-color: darkred; color: #fff; border: none; padding: 10px; width: 100%;">Report</button>';
        document.querySelector(".vPnlWpr").style.height = 'auto';
        return vPnlMod();     
    } if (res == "yes") {
        var opSelAll = document.querySelectorAll(".opSel");
        var opSel;
        opSelAll.forEach(e => {
            if (e.checked) {
                opSel = e.value;
            }
        });
        var opTxt = document.getElementById("opTxt").value;
        var ajax = ajaxObj("POST", `${m_path}prs/mnu/mnu_Lgc_RePrt_x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    vPnlMain.innerHTML = "";
                    vPnlBdy.innerHTML = return_data;
                    vPnlFtr.innerHTML = "";
                    console.log(return_data);
                } else {
                    console.log(return_data);
                }
            } 
        } 
        ajax.send("type="+type+
                    "&cnt="+cnt+
                    "&cid="+cid+
                    "&opt="+opt+
                    "&res="+res+
                    "&opSel="+opSel+
                    "&opTxt="+opTxt);
        // closes module
    }
};

// global menu settings past through for // delete // hide
// cnt used for javascript manipulation
function glblPst_eVal(cnt,type,cid,opt,res) {
    var pst_eVal = "";
    // console.log(cnt,type,cid,opt,res);
    document.querySelector(".vPnlUsr_hdr").style.display = "none";
    document.querySelector(".vPnlUsr_hdr").innerHTML = "";
    // clears out report logic
    vPnlMain.innerHTML = "";
    // resets height after report logic
    document.querySelector(".vPnlWpr").style.height = '200px';
    vPnlFtr.classList.add("pA");
    // plug in button elements
    // ffrom glblPst_eVal(cnt,type,cid,opt,res)
    if (opt == "hide" || opt == "unhide" || opt == "delete") {
        var btnYes = '<button onclick="glblPst_eVal(\''+cnt+'\',\''+type+'\',\''+cid+'\',\''+opt+'\',\'yes\')" style="background-color: darkred; color: #fff; border: none; padding: 10px; width: 285px; display: inline-block; margin-right: 5px;">yes</button>';
        var btnNo = '<button onclick="vPnlMod_RESET()" style="background-color: darkred; color: #fff; border: none; padding: 10px; width: 285px; display: inline-block;">no</button>';
    }
    if (cnt == "user_post" && type == "pa") {
        var newLoc = "user";
        var pst_eVal = document.getElementById("user_post_a_"+cid);
    } if (opt == "hide" || opt == "unhide" && res == "NULL") {
        vPnlHdr.innerHTML = "Looks like you want to "+opt+" this post";
        vPnlBdy.innerHTML = "Are you sure you want to "+  opt+" your post?";
        vPnlFtr.innerHTML = btnYes + btnNo;
        return vPnlMod();
    }
    // unhide refreshes setting hide to 0
    // logic on server side
    if (cnt != "" && type != "" && cid != "" && opt != "") {
        if (opt == "delete" && res == "NULL") {
            vPnlHdr.innerHTML = "Looks like you want to "+opt+"";
            vPnlBdy.innerHTML = "Are you sure you want to delete your post? If you do, its gone...";
            vPnlFtr.innerHTML = btnYes + btnNo;
            // opens module
            return vPnlMod();
        } 
        if (res == "yes") {
            var ajax = ajaxObj("POST", `${m_path}prs/mnu/mnu_Lgc_eVal_x.php`);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() { 
                if(ajax.readyState == 4 && ajax.status == 200) { 
                    var return_data = ajax.responseText; 
                    if(return_data != ""){ 
                        // pst_eVal.innerHTML = return_data
                        window.alert(return_data);
                        if (return_data == "unhide") {
                            url = document.location = `${m_path}view.php?t="${newLoc}"p="${cid}`;
                            window.location.reload(url);
                        }
                        console.log(return_data);
                    } else {
                        console.log(return_data);
                    }
                } 
            } 
            ajax.send("type="+type+
                        "&cnt="+cnt+
                        "&cid="+cid+
                        "&opt="+opt);
            // closes module
            return vPnlMod();
        }
    } // else do nothing
};
</script>