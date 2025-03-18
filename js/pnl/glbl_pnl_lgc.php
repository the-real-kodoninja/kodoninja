<script>
var m_path = `<?php echo $m_path; ?>`;
// var p_load = `<?php echo $p_load; ?>`;

function ajaxObj( meth, url ) {
   var x = new XMLHttpRequest();
   x.open( meth, url, true );
   x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   return x;
}
// panel L
const mNu_m_x1 = document.getElementById("mNu_m_x1"); // menu button
const mNu_m_y1 = document.getElementById("mNu_m_y1"); // sidebar menu
const cnt_L2a = document.getElementById("cnt_L2a");
const cnt_L2b = document.getElementById("cnt_L2b");
// panel R
const mNu_m_x2 = document.getElementById("mNu_m_x2"); // menu button
const mNu_m_y2 = document.getElementById("mNu_m_y2"); // sidebar menu
// const cnt_L2a = document.getElementById("cnt_L2a");
// const cnt_L2b = document.getElementById("cnt_L2b");
//
// panel L
mNu_m_x1.addEventListener('click', function (event) {
    document.getElementById("dbSr").classList.add("dN");
    document.getElementById("dbSr").classList.remove("dB");
//     // mNu_m_u1b.classList.add("dN");
//     // mNu_m_u1b.classList.remove("dB");
    cnt_L2a.addEventListener('click', function (event) {
        cnt_L2b.classList.toggle("dN");
    });
    // mobile
    if (p_load === 'm') {
        mNu_m_y1.classList.toggle("dN"); 
        mNu_m_y2.classList.add("dN");
    } else {
        mNu_m_y1.classList.toggle("dN"); 
    }
});
//
// panel R
mNu_m_x2.addEventListener('click', function (event) {
    document.getElementById("dbSr").classList.add("dN");
    document.getElementById("dbSr").classList.remove("dB");
    // mNu_m_y1.classList.add("dN");
    // mNu_m_y1.classList.remove("dB");
    cnt_L2a.addEventListener('click', function (event) {
        cnt_L2b.classList.toggle("dN");
    });
    // mobile
    if (p_load === 'm') {
        mNu_m_y2.classList.toggle("dN"); 
        mNu_m_y1.classList.add("dN");
    } else {
        mNu_m_y2.classList.toggle("dN"); 
    }
});

function pnl_mod_nte(uid,cde) {
    var pnl_nte = document.getElementById("pnl_mod_nte__"+cde);
    var log_uid = `<?php echo $log_id; ?>`;
    var log_cde = `<?php echo $log_HshCde; ?>`; 
    if (uid !== "" && log_uid !== "" && cde !== "" && log_cde !== "") {
        if (String(uid) === String(log_uid) && String(cde) === String(log_cde)) {
            pnl_nte.classList.toggle("dN");
            var ajax = ajaxObj("POST", ""+m_path+"prs/pnl/pnl_mod_nte.php");
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    document.getElementById("pnl_modx_nte__"+cde).innerHTML = return_data;
                } 
            } 
        } 
        ajax.send("uid="+uid+
                    "&cde="+cde); 
        }
    }
}

function pnl_mod_kwlt(uid,cde) {//
    var pnl_kwlt = document.getElementById("pnl_mod_kwlt__"+cde);
    var pnlx_kwlt = document.getElementById("pnl_modx_kwlt__"+cde);
    var log_uid = `<?php echo $log_id; ?>`;
    var log_cde_x = `<?php echo $log_HshCde_x; ?>`; 
    var log_cde_y = `<?php echo $log_HshCde_y; ?>`;
    if (uid === log_uid && log_cde_x === log_cde_y) {
        // console.log("log_x |"+log_cde_x+" log_y |"+log_cde_x);
        pnlx_kwlt.classList.toggle("dN");
        var cat = new XMLHttpRequest();
        cat.open("POST", ""+m_path+"prs/pnl/pnl_mod_wlt.php", true);
        cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        cat.onreadystatechange = function() {
        if(cat.readyState == 4 && cat.status == 200) { 
            var return_data = cat.responseText; 
            if(return_data){ 
                pnlx_kwlt.innerHTML = return_data;
            } 
        } 
        }
        cat.send("uid="+uid+"&cde="+cde); 
    }
}
</script>