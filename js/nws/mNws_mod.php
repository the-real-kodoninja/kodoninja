<script>
// globals
const mNws_mod = document.getElementById("mNws_mod");
const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const mNwsForm = document.getElementById("mNws_1a");
const mNwsLoad = document.getElementById("mNws_1b");
//
const usrNmeChk = "<?php echo $log_username; ?>";
const usrOkChk = "<?php echo $user_ok; ?>";
const usrEmlChk = "<?php echo $log_email;?>";
const p_load = "<?php echo $p_load;?>";
//
function mNws_modx() {
    mNws_mod.classList.toggle("dN");
};
function mNws_lgc1(subVal) {
    if (usrNmeChk == "" && usrOkChk == false) {
        var mNws_e = document.getElementById("nws_e").value;
    } else {
        var mNws_e = usrEmlChk;
    }
    var err1 = '<br>Something went wrong with <b>'+mNws_e+'</b> let\'s try again';
    //
    function mNwsEmpty() {
        if (mNws_e == "") {
            mNwsLoad.innerHTML = '<br>Sorry your email input is empty'+mNws_e;
            return false;
        } else if(mNws_e.match(mailformat)) {
            return true;
        } else {
            mNwsLoad.innerHTML = '<br>Sorry <b>'+mNws_e+'</b> isn\'t a valid email';
            return false;
        }
    };
    //
    if (subVal == "subYes") {
        var subRes_1 = 'subscribing';
    } if (subVal == "subNo") {
        var subRes_1 = 'unsubscribing';
    } if (subVal == "") {
        mNwsLoad.innerHTML = 'Sub method error';
    }
    //
    mNwsRes = mNwsEmpty(); 
    if (mNwsRes === true) {
        var subRes_2 = '<br>'+subRes_1+ ' with email <b>' +mNws_e+ '</b>...';
        mNwsForm.style.display= 'none';
        // path load out for web mobile and web full
        // global standard
        var ajax = ajaxObj("POST", `${m_path}prs/nws/mNwsLgc.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    mNwsLoad.innerHTML = return_data; 
                } else {
                    mNwsLoad.innerHTML = err1;
                }
            } 
        } 
        ajax.send("mNws_e="+mNws_e+"&subVal="+subVal);
    }
    //
    mNwsLoad.innerHTML = subRes_2;
};



</script>