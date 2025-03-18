<script>
function mNu_uy() {
    document.getElementById("mNu-ux_ul").classList.toggle("dN");
}; 
//
function glblUSr_sMOD(uid1,uid2,cde,mth) {
    var luid = `<?php echo $log_id; ?>`;
    var lcde = `<?php echo $log_HshCde; ?>`;
    var mth_x = String(mth.split("_").pop());
    if (mth_x === "x") {
        mth_ = "y";
    } if (mth_x === "y") {
        mth_ = "x";
    }
    if (uid1 === luid && uid2 !== "" && lcde === cde && mth === "cnct_x" || mth === "cnct_y" || mth === "blck_x" || mth === "blck_y") {
        var ajax = ajaxObj("POST", `${m_path}prs/glbl/glbl_cnct_mod.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                   if (mth === "cnct_x" || mth === "cnct_y") {
                        var bid = "gBtn_cx_";
                        var btn = document.getElementById(bid+uid2);
                        btn.innerHTML = '<span id="gBtn_cx_'+uid2+'"><button onclick="glblUSr_sMOD(\''+uid1+'\',\''+uid2+'\',\''+cde+'\',\'cnct_'+mth_+'\')">'+return_data+'</button></span>';
                    } else if (mth === "blck_x" || mth === "blck_y") {
                        var bid = "gBtn_bx_";
                        var btn = document.getElementById(bid+uid2);
                        btn.innerHTML = '<li onclick="glblUSr_sMOD(\''+uid1+'\',\''+uid2+'\',\''+cde+'\',\'blck_'+mth_+'\')">'+return_data+'</li>';
                    }
                } 
            } 
        } 
        ajax.send("uid1="+uid1+
                    "&uid2="+uid2+
                    "&cde="+cde+
                    "&mth="+mth);
    }
}
</script>