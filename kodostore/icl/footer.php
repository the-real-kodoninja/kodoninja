<div class="mNws-Wpr w100 fL">
    <?php echo $news_dsply; ?>
</div>

<footer class="cNt-Bdy">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9027389483559415"
     crossorigin="anonymous"></script>

    <input class="w100" style="background: transparent;border: none;" type="" value=""/>
    <div id="amzn-assoc-ad-3689a600-e773-40e9-952c-f0248fb06c45"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=3689a600-e773-40e9-952c-f0248fb06c45"></script>
    <?php echo $glbl_ftr; ?>
    <style>
    .ftrMsg1 {
      border: 2px dashed maroon;
      background-color: #c09f9f;
      padding: 10px;
    }
    </style>
    <!-- <p class="dB w100 fL ftrMsg1">Some views expressed on this platform may appear offensive. However, it is not our intention to Insult, offend, criticize, belittle, or alienate anyone. We welcome anyone regardless of race, gender, sexual orientation, shape, size, political views, and financial position to view and gain from our content. Information on all affiliates of kodoninja is done so with the best intentions from the primarily neutral thoughts, views, and beliefs of the founder, Emmanuel "kodoninja" Moore. We aren't trying to change anyone to any lifestyle. But offer a take on the vision, lifestyle, and decisions of kodoninja that may also help you improve or supplement your life. Have fun, relax, live, enjoy life, learn, laugh don't take things too seriously. If it's not for you, it's okay. Thank you for visiting.</p>
    <p class="dB w100 fL"></p> -->
</footer>

<?php
// BASIC+ users email grab
$sql_Q = "SELECT DISTINCT email FROM users WHERE username='$log_username' LIMIT 1";
$sql_QR = mysqli_query($cnnc_t, $sql_Q);
while ($row = mysqli_fetch_array($sql_QR, MYSQLI_ASSOC)){ 
    $nws_e_logged = $row["email"];
}
?>
<script>
// globals
const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const mNwsForm = document.getElementById("mNws_1a");
const mNwsLoad = document.getElementById("mNws_1b");
//
const usrNmeChk = "<?php echo $log_username; ?>";
const usrOkChk = "<?php echo $user_ok; ?>";
const usrEmlChk = "<?php echo $nws_e_logged;?>";
const p_load = "<?php echo $p_load;?>";
//
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
        if (p_load == "m") {
            var ajax = ajaxObj("POST", "../icl/nws/mNwsLgc.php");
        } if (p_load == "f") {
            var ajax = ajaxObj("POST", "icl/nws/mNwsLgc.php");
        } else {
            var ajax = ajaxObj("POST", "icl/nws/mNwsLgc.php");
        }
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
}



</script>