<script>
// brings back a list of options // click to load
function load_lgc_1(uid,cde,mth,sid,pth){
    console.log(uid,cde,mth,sid,pth); 
    //  page load logic main
    const __b_Ld1 = document.getElementById("__b_Ld1");
    // page load logic response (empty)
    const __b_Ld2 = document.getElementById("__b_Ld2");
    //
    var log_uid = `<?php echo $log_id; ?>`;
    var log_cde = `<?php echo $log_HshCde; ?>`;
    var log_cde_x = `<?php echo $log_HshCde_x; ?>`; 
    var log_cde_y = `<?php echo $log_HshCde_y; ?>`;
    // load options
    if (pth === "___LOAD") {
        var ___cld_2 = document.getElementById("___cld_2"); // load
        var ___cld_3 = document.getElementById("___cld_3"); // edit
    }

    function error___1() {
         __mod_Ld2();
        __b_Ld2.innerHTML = `
        <div>detecting a glitch in the matrix, meow.</div>
        `+__bckBtn+``;
        console.log("error");
    };
    // console.log(!uid && !cde && !mth && !pth && uid == log_uid && cde === log_cde && mth === "___b" || mth === "___f" || mth === "___g" || pth === "___LOAD" || pth === "___EDIT");
 
    if (uid == log_uid && log_cde_x === log_cde_y) {
        if (!uid && !cde && !mth && !pth && mth === "___b" || mth === "___f" || mth === "___g" || pth === "___LOAD" || pth === "___EDIT") {
            var cat = new XMLHttpRequest(); 
            cat.open("POST", `${m_path}prs/pst/pst_LOAD__x.php`, true); 
            cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
            cat.onreadystatechange = function() { 
                if(cat.readyState == 4 && cat.status == 200) { 
                    var return_data = cat.responseText; 
                    if (return_data) {
                        __b_Ld2.classList.add("dB");
                        __b_Ld2.innerHTML = return_data;
                    }
                } 
            } 
            //
            // for TESTING purposes only START
            // __b_Ld2.classList.add("dB");
            // __b_Ld2.innerHTML = `
            // <div style="margin: 0px 0px 10px;">
            //     <p>This should load test 1</p>
            // </div>`;
            // for TESTING purposes only END
            // 
            cat.send("uid="+uid+
                        "&cde="+cde+
                        "&mth="+mth+
                        "&sid="+sid+
                        "&pth="+pth);
        } else {
            error___1();
        }
    } else {
        error___1();
    }
} 

// set session onclick
function ___sNookiesCookies(uid,cde,mth,pth,sid,eCde) {
    var log_uid = `<?php echo $log_id; ?>`;
    var log_cde = `<?php echo $log_HshCde; ?>`;
    var log_cde_x = `<?php echo $log_HshCde_x; ?>`; 
    var log_cde_y = `<?php echo $log_HshCde_y; ?>`;
    if (uid == log_uid && log_cde_x === log_cde_y) {
        if (!uid && !cde && !mth && !pth && mth === "___b" || mth === "___f" || mth === "___g" || pth === "___LOADX" || pth === "___LOADX") {
            if (mth === "___b") {
                mtx = "blog";
            } if (mth === "___f") {
                mtx = "forum";
            } if (mth === "___g") {
                mtx = "goal";
            }

            // developer checks
            // console.log("(uid "+uid+") (cde "+cde+") (mth "+mtx+") (pth "+pth+") (sid "+sid+") (eCde "+eCde+")");

            var eCdx = `<?php echo $_SESSION['eCde'] ?>`;
            eCdx = eCde;
            //
            window.location = `post.php?t=`+mtx+`&sid=`+sid+`&eCde=`+eCdx+``;
        }
    }
} 




</script>