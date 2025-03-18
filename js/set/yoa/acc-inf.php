<script>
// v4 updates include social media links 
function set_upd_1_y_acc(uid,hid,sid) {
    var u_upd_chk_FULL = false;
    var u_upd_chk_1 = false;
    var u_upd_chk_2 = true; // optional fname
    var u_upd_chk_3 = true; // optional lname
    var u_upd_chk_4 = false;
    var u_upd_chk_5 = false;
    var u_upd_chk_6 = false;
    var u_upd_chk_7 = true; // optional bio
    var u_upd_chk_8 = false;
    // absolute
    const st__x_unme = document.getElementById("st__x_unme").value;
    const st__r_unme = document.getElementById("st__r_unme");
    // optional
    const st__x_ufnme = document.getElementById("st__x_ufnme").value;
    const st__r_ufnme = document.getElementById("st__r_ufnme");
    // optional
    const st__x_ulnme = document.getElementById("st__x_ulnme").value;
    const st__r_ulnme = document.getElementById("st__r_ulnme");
    // absolute requires checks conformation
    const st__x_ueml1 = document.getElementById("st__x_ueml1").value;
    const st__x_ueml2 = document.querySelector("#st__x_ueml2");
    const st__r_ueml = document.getElementById("st__r_ueml");
    
    // optional // correct website checks
    const st__x_uweb = document.getElementById("st__x_uweb").value;
    const st__r_uweb = document.getElementById("st__r_uweb");
    // optional requires checks conformation
    const st__x_upne = document.getElementById("st__x_upne").value;
    const st__r_upne = document.getElementById("st__r_upne");
    //
    const st__x_ubio = document.getElementById("st__x_ubio").innerText;
    const st__r_ubio = document.getElementById("st__r_ubio");
    // absolute
    const st__x_upwd1 = document.getElementById("st__x_upwd1").value;
    const st__r_upwd = document.getElementById("st__r_upwd");
    //
    const st__r1_uFULL = document.getElementById("st__r1_uFULL");
    if (uid && hid && sid) { // checks in both js & php
        if (st__x_unme == "") {
            st__r_unme.classList.add("set_res_q");
            st__r_unme.innerHTML = "meow where's your username?";
        } if (st__x_unme) {
            var curr_unme_chk = `<?php echo $log_username; ?>`;
            if (st__x_unme !== curr_unme_chk) {
                // check to see if username is taken
                var fld = "fld_1a";
                st__r_unme.classList.add("set_res_q");
                st__r_unme.innerHTML = `Hang on "<?php echo $log_username; ?>" I'm checking to see if this username is taken`; 
                var ajax = ajaxObj("POST", `${m_path}prs/set/yoa/acc-inf.php`); 
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.onreadystatechange = function() { 
                if(ajax.readyState == 4 && ajax.status == 200) { 
                    var return_data = ajax.responseText; 
                    if(return_data != ""){ 
                        st__r_unme.innerHTML = return_data.split("__").shift(); 
                        st__r_unme.classList.add("set_res_q");
                        var val_chk_1 = String(return_data.split("__").pop()); 
                        if (val_chk_1 === "true") {  // perfect conditions
                            u_upd_chk_1 = true;
                        } else if (val_chk_1 === "false") {
                            u_upd_chk_1 = false;
                        }
                        // developer checks
                        // don't delete
                    } 
                } 
            } 
            u_upd_chk_1 = true; // bypass true checks will be php
            ajax.send("fld="+fld+
                        "&uid="+uid+
                        "&hid="+hid+
                        "&sid="+sid+
                        "&st__x_unme="+st__x_unme); 
            } else if (st__x_unme === curr_unme_chk) {
                st__r_unme.classList.remove("set_res_q");
                st__r_unme.innerHTML = "";
                u_upd_chk_1 = true;
            }
        } if (st__x_ufnme == "" || st__x_ulnme == "") {
            // do nothing
        }  if (st__x_ueml1 == "") {
            st__r_uem.innerHTML = "meow I need an email.";
        } else if (st__x_ueml1) {
            var curr_email_chk = `<?php echo $log_email; ?>`;
            // do email checks
            // if email is different from current email do
            if (st__x_ueml1 !== curr_email_chk) { // incomplete do a php call
                // new email val checks on 1st, 2nd matches input query
                // if (st__x_ueml1) {
                //     // rgegex check
                // }
                // visible
                st__x_ueml2.classList.add("dB");
                st__x_ueml2.classList.remove("dN");
                st__r_ueml.classList.add("set_res_q");
                st__r_ueml.innerHTML = "looks like your changing your email, I'll need you to re-type it meow";
                if (st__x_ueml2.value !== "") {
                    if (st__x_ueml1 !== st__x_ueml2.value) {
                        st__r_ueml.classList.add("set_res_q");
                        st__r_ueml.innerHTML = "your emails don't match, meow";
                    } else {
                        st__r_ueml.classList.remove("set_res_q");
                        st__r_ueml.innerHTML = "";
                        u_upd_chk_4 = true;
                    }
                }
            } else if (st__x_ueml1 === curr_email_chk) {
                st__x_ueml2.classList.add("dN");
                st__x_ueml2.classList.remove("dB");
                st__x_ueml2.value = "";
                st__r_ueml.classList.remove("set_res_q");
                st__r_ueml.innerHTML = "";
                u_upd_chk_4 = true;
            }
        } if (st__x_uweb == "") {
            // do nothing
        } else if (st__x_uweb) {
            // do web validation checks
            var curr_web_chk = `<?php echo $log_web; ?>`;
            if (st__x_uweb !== curr_web_chk) {
                var web_rgx = /(?:https?):\/\/(\w+:+\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
                if (st__x_uweb.match(web_rgx)) {
                    st__r_uweb.classList.remove("set_res_q");
                    st__r_uweb.innerHTML = "";
                    u_upd_chk_5 = true;
                } else {
                    st__r_uweb.classList.add("set_res_q");
                    st__r_uweb.innerHTML = "oh oh, this doesn't look right, meow";
                }
            } else {
                u_upd_chk_5 = true;
            }
        } if (st__x_upne == "") {
            // do nothing
        } else if (st__x_upne) {
            // do cell validation checks
            // conformation code send PHP
            var curr_cel_chk = `<?php echo $log_phone; ?>`;
            if (st__x_upne === curr_cel_chk) {
                u_upd_chk_6 = true;
            } else if (st__x_upne !== curr_cel_chk) {
                var pne_rgx = /^[0-9\-().\s+]{4,18}$/;
                if (st__x_upne.length >= 4 && st__x_upne.length <= 18) { // dual checks
                    if (st__x_upne.match(pne_rgx)) {
                        st__r_upne.innerHTML = "I'll send you an email confirmation for <b>"+st__x_upne+"</b> after you click update, meow.";
                        u_upd_chk_6 = true;
                    } else {
                        st__r_upne.classList.add("set_res_q");
                        st__r_upne.innerHTML = "oh oh, this doesn't look right, meow";
                    }
                } else {
                    st__r_upne.classList.add("set_res_q");
                    st__r_upne.innerHTML = "US, & international phone #'s must be beteen 4 to 15 digits, meow";
                }
            } 
        } if (st__x_ubio) {
            u_upd_chk_7 = true;
        } if (st__x_upwd1 == "") {
            st__r_upwd.classList.add("set_res_q");
            st__r_upwd.innerHTML = "meow, I need your password.";
        } else if (st__x_upwd1) {
            st__r_upwd.innerHTML = "";
            // no validation checks until php
            u_upd_chk_8 = true;
        } 
        // don't delete
        // developer checks FULL
        // console.log("Vanilla js: INPUT CHECKS: (uid "+uid+") | (hid "+hid+") | (sid "+sid+") | (username "+st__x_unme+") | (firstname "+st__x_ufnme+") | (lastname "+st__x_ulnme+") | (email 1 "+st__x_ueml1+") | (email 2 "+st__x_ueml2+") | (web url "+st__x_uweb+") | (cell num "+st__x_upne+") | (bio "+st__x_ubio+") | (password "+st__x_upwd1+")");
        // // true checks FULLst__x_ubio
        // console.log("Vanilla js: TRUE CHECKS: (1 "+u_upd_chk_1+") | (2 "+u_upd_chk_2+") | (3 "+u_upd_chk_3+") | (4 "+u_upd_chk_4+") | (5 "+u_upd_chk_5+") | (6 "+u_upd_chk_6+" | (7 "+u_upd_chk_7+") | (7 "+u_upd_chk_8+")");
        //
        if (u_upd_chk_1 === true && u_upd_chk_2 === true && u_upd_chk_3 === true && u_upd_chk_4 === true && u_upd_chk_5 === true && u_upd_chk_6 === true && u_upd_chk_7 === true && u_upd_chk_8 === true) {
            u_upd_chk_FULL = true;
        }
        //
        if (u_upd_chk_FULL === true) {
            var fld = "fld_1b";
            var ajax2 = ajaxObj("POST", `${m_path}prs/set/yoa/acc-inf.php`);
            ajax2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax2.onreadystatechange = function() { 
                if(ajax2.readyState == 4 && ajax2.status == 200) { 
                    var return_data2 = ajax2.responseText; 
                    if(return_data2 != ""){ 
                        st__r1_uFULL.innerHTML = return_data2.split("__").shift(); 
                        st__r1_uFULL.classList.add("set_res_q");
                        var val_FULL_1 = return_data2.split("__").pop(); 
                        if (val_FULL_1 === "true") {
                            // revert everything to beginning
                            // username
                            st__r_unme.classList.remove("set_res_q");
                            st__r_unme.innerHTML = "";
                            // fname // nothing aoy
                            // lname // nothing aoy
                            // email
                            st__x_ueml2.classList.add("dN");
                            st__x_ueml2.classList.remove("dB");
                            st__x_ueml2.value = "";
                            st__r_ueml.classList.remove("set_res_q");
                            st__r_ueml.innerHTML = "";
                            // website
                            st__r_uweb.classList.remove("set_res_q");
                            st__r_uweb.innerHTML = "";
                            // phone
                            st__r_upne.classList.remove("set_res_q");
                            st__r_upne.innerHTML = "";
                            // password 
                            st__r_upwd.classList.remove("set_res_q");
                            st__r_upwd.innerHTML = "";
                            // success output
                            // delete on delay
                            setTimeout(() => {
                                st__r1_uFULL.innerHTML = "success, all updated meow";
                            }, 10000); // 10 seconds
                        } else if (val_FULL_1 === "false") {
                            st__r1_uFULL.innerHTML = "sorry, a mouse got loose in my code meow";
                        }
                    } 
                } 
            } 
            ajax2.send("fld="+fld+
                        "&uid="+uid+
                        "&hid="+hid+
                        "&sid="+sid+
                        "&st__x_unme="+st__x_unme+
                        "&st__x_ufnme="+st__x_ufnme+
                        "&st__x_ulnme="+st__x_ulnme+
                        "&st__x_ueml1="+st__x_ueml1+
                        "&st__x_ueml2="+st__x_ueml2+
                        "&st__x_uweb="+st__x_uweb+
                        "&st__x_upne="+st__x_upne+
                        "&st__x_ubio="+st__x_ubio+
                        "&st__x_upwd1="+st__x_upwd1); 
        } else {
            st__r1_uFULL.classList.add("set_res_q");
            st__r1_uFULL.innerHTML = "I cannot update, something isn't perfect, meow";
        }
    }
}

function set_upd_dply(uid,hid,sid) {
    var set_nme_unme1 = document.querySelector("#set_nme_unme1");
    var set_nme_unme2 = document.querySelector("#set_nme_unme2");
    var set_nme_unme3 = document.querySelector("#set_nme_unme3");
    var set_nme_unme4 = document.querySelector("#set_nme_unme4");
    if (uid !== "" && hid !== "" && sid !== "") {
        var log_uid = `<?php echo $log_id; ?>`;
        var log_hid = `<?php echo $log_HshCde; ?>`;
        var log_sid = `<?php echo $log_sHshCde; ?>`;
        if (parseInt(uid) === parseInt(log_uid) 
        // && hid === log_hid
        // && String(sid) === String(log_sid)
        ) {
            var st__x1_unmex = document.getElementById("st__x1_unmex");
            var st__x2_unmex = document.getElementById("st__x2_unmex");
            var log_xnme = `<?php echo $log_username; ?>`;
            var log_fnme = `<?php echo $log_fnme; ?>`;
            var log_lnme = `<?php echo $log_lnme; ?>`;
            if (!set_nme_unme1.checked && !set_nme_unme2.checked && !set_nme_unme3.checked && !set_nme_unme1.checked) {
                st__x1_unmex.value = "";
                st__x2_unmex.value = "";
            } if (set_nme_unme1.checked) {
                set_nme_unme2.checked = false;
                set_nme_unme3.checked = false;
                set_nme_unme4.checked = false;
                st__x1_unmex.value = log_xnme;
                st__x2_unmex.value = log_xnme;
                st__nTrm_nmx = 1;
            } if (set_nme_unme2.checked) {
                set_nme_unme1.checked = false;
                set_nme_unme2.checked = true;
                set_nme_unme4.checked = false;
                st__x1_unmex.value = log_fnme;
                st__x2_unmex.value = log_fnme;
                st__nTrm_nmx = 2;
            } if (set_nme_unme3.checked) {
                set_nme_unme1.checked = false;
                set_nme_unme4.checked = false;
                st__x1_unmex.value = log_lnme;
                st__x2_unmex.value = log_lnme;
                st__nTrm_nmx = 3;
            } if (set_nme_unme4.checked || set_nme_unme2.checked && set_nme_unme3.checked) {
                set_nme_unme1.checked = false;
                set_nme_unme2.checked = false;
                set_nme_unme3.checked = false;
                set_nme_unme4.checked = true;
                st__x1_unmex.value = log_fnme+" "+log_lnme;
                st__x2_unmex.value = log_fnme+" "+log_lnme;
                st__nTrm_nmx = 4;
            } 
            // developer checks
            // console.log("(box1 "+set_nme_unme1+") (box2 "+set_nme_unme2+") (box3 "+set_nme_unme3+") (box4 "+set_nme_unme4+")");
            var fld = "fld_1c";
            var ajax = ajaxObj("POST", `${m_path}prs/set/yoa/acc-inf.php`);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.onreadystatechange = function() { 
                if(ajax.readyState == 4 && ajax.status == 200) { 
                    var return_data = ajax.responseText; 
                    if(return_data != ""){
                        document.getElementById("set_1c_LOAD").innerHTML = return_data;
                        setTimeout(() => {
                            document.getElementById("set_1c_LOAD").innerHTML = "";
                        }, 3000);
                    } 
                }
            }
            ajax.send("fld="+fld+
                        "&uid="+uid+
                        "&hid="+hid+
                        "&sid="+sid+
                        "&st__nTrm_nmx="+st__nTrm_nmx); 
        }
    }
}

function set_upd_xsel(uid,hid,sid) {
    var set_ext_basex = document.getElementById("set_ext_base2");
    var set_ext_load = document.getElementById("set_ext_load2");
    if (uid !== "" && hid !== "" && sid !== "") {
        var log_uid = `<?php echo $log_id; ?>`;
        var log_hid = `<?php echo $log_HshCde; ?>`;
        var log_sid = `<?php echo $log_sHshCde; ?>`;
        if (parseInt(uid) === parseInt(log_uid) 
        // && hid === log_hid
        // && String(sid) === String(log_sid)
        ) {
            var set_ext_base = set_ext_basex.value.split("__").shift(); 
            var st__nTrm_nmx = set_ext_basex.value.split("__").pop(); 
            if (set_ext_base.value === "Nothing") {
                set_ext_load.innerHTML = "";
            } else {
                set_ext_load.innerHTML = set_ext_base+".com";
            }
            var fld = "fld_1d";
            var ajax = ajaxObj("POST", `${m_path}prs/set/yoa/acc-inf.php`);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                ajax.onreadystatechange = function() { 
                if(ajax.readyState == 4 && ajax.status == 200) { 
                    var return_data = ajax.responseText; 
                    if(return_data != ""){
                        document.getElementById("set_1c_LOAD").innerHTML = return_data;
                        setTimeout(() => {
                            document.getElementById("set_1c_LOAD").innerHTML = "";
                        }, 3000);
                    } 
                }
            }
            ajax.send("fld="+fld+
                        "&uid="+uid+
                        "&hid="+hid+
                        "&sid="+sid+
                        "&st__nTrm_nmx="+st__nTrm_nmx);
        }
    }
}
</script>