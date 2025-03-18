<script>
// globals
const Tg9_ScBtn = document.getElementById("Tg9_ScBtn");
const Tg9_ScRsp = document.getElementById("Tg9_ScRsp");
//
// const usrNmeChk = "<?php echo $log_username; ?>";
// const usrOkChk = "<?php echo $user_ok; ?>";
// const p_load = "<?php echo $p_load;?>";
//
Tg9_ScBtn.addEventListener('click', function (event) {
    var Tg9_sch1 = document.getElementById("Tg9_sch1").value;
    var Tg9_sch2 = document.getElementById("Tg9_sch2").value;
    var Tg9_sch3 = document.getElementById("Tg9_sch3").value;
    var Tg9_hNt1 = "";
    if (Tg9_sch1 == "" || Tg9_sch2 == "" || Tg9_sch3 == "") {
        var Tg9_hNt1 = "You figured it out yet, all 3 need to have content";
        if (Tg9_sch1 == "" && Tg9_sch2 == "" && Tg9_sch3 == "") {
            var Tg9_sch1 = "Nothing, get lost";
            var Tg9_sch2 = "Nothing again, get lost";
            var Tg9_sch3 = "Nothing, okay get lost, seriously";
        }
        else if (Tg9_sch1 != "" && Tg9_sch2 == "" && Tg9_sch3 == "") {
            var Tg9_sch2 = "Nothing, get lost";
            var Tg9_sch3 = "Nothing again, get lost";
        }
        else if (Tg9_sch1 != "" && Tg9_sch2 != "" && Tg9_sch3 == "") {
            var Tg9_sch3 = "Nothing, get lost";
        }
        else if (Tg9_sch1 == "" && Tg9_sch2 != "" && Tg9_sch3 == "") {
            var Tg9_sch1 = "Nothing, get lost";
            var Tg9_sch3 = "Nothing again, get lost";
        }
        else if (Tg9_sch1 == "" && Tg9_sch2 == "" && Tg9_sch3 != "") {
            var Tg9_sch1 = "Nothing, get lost";
            var Tg9_sch2 = "Nothing again, get lost";
        }
        else if (Tg9_sch1 == "" && Tg9_sch2 != "" && Tg9_sch3 != "") {
            var Tg9_sch1 = "Nothing, get lost";
        }
        else if (Tg9_sch1 != "" && Tg9_sch2 == "" && Tg9_sch3 != "") {
            var Tg9_sch2 = "Nothing, get lost";
        }
    }
    Tg9_ScRsp.innerHTML = "You entered <br><br>Search 1 <b>" + Tg9_sch1 + "</b><br><br> Search 2 <b>" + Tg9_sch2 + "</b><br><br> Search 3 <b>" + Tg9_sch3 + "</b> <br><br>"+Tg9_hNt1; 

    
    // if (usrNmeChk == "" && usrOkChk == false) {
    //     var mNws_e = document.getElementById("nws_e").value;
    // } else {
    //     var mNws_e = usrEmlChk;
    // }



});



</script>