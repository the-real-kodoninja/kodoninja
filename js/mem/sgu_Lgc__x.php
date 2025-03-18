<script>
function ume_kUp() {
    var usrNme = document.getElementById('usrNme'); 
    var u_vld = /^[a-z0-9_\.]+$/;
    // user response output
    var u_rs1 = document.querySelector('#u_rs1 span');
    var res_mN1 = document.getElementById('res_mN1');
    if (usrNme.value !== '') {
        function eml_val(usrNmex) {
            return u_vld.test(usrNmex);
        }
        if(usrNme.value.length >= 3 && eml_val(usrNme.value)) {
            u_rs1.innerHTML = 1;
            u_rs1.style.cssText = `
                color: rgba(2, 176, 13, 0.9);
            `;
            // check if username is available
            var ajax = ajaxObj("POST", `${m_path}prs/mem/sgu_Lgc__x.php`);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
            ajax.onreadystatechange = function() { 
                if(ajax.readyState == 4 && ajax.status == 200) { 
                    var return_data = ajax.responseText; 
                    if (return_data.includes('gd__')) {
                        // res_mN1.innerHTML = return_data.split('gd__')[1];
                        usrNme.style.cssText = `
                            background-color: rgba(179, 255, 184, 0.1);
                        `; 
                        u_rs1.innerHTML = '&#10003';
                        u_rs1.style.cssText = `
                            color: rgba(2, 176, 13, 0.9);
                        `;
                    } if (return_data.includes('bd__')) {
                        // res_mN1.innerHTML = return_data.split('bd__')[1];
                        usrNme.style.cssText = `
                            background-color: rgba(232, 101, 101, 0.1);
                        `; 
                        u_rs1.innerHTML = 1;
                        u_rs1.style.cssText = `
                            color: rgba(232, 101, 181, 0.9);
                        `;
                    }
                } 
            } 
            
            ajax.send("usrNme="+usrNme.value+"&unme_valChk=unme_valChk");
        } else {
            usrNme.style.cssText = `
                background-color: transparent;
            `; 
            u_rs1.innerHTML = 0;
            res_mN1.innerHTML = '';
        }
    } 
}

function eml_kUp() {
    var signup_e1 = document.getElementById('email1');
    var signup_e2 = document.getElementById('email2');
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var e_rs1 = document.querySelector('#e_rs1 span');
    var e_rs2x = document.querySelector('#e_rs2');
    var e_rs2 = document.querySelector('#e_rs2 span');
    var res_mN1x = document.getElementById('res_mN1x');
    if (signup_e1.value !== '') {
        e_rs1.innerHTML = 1;
        e_rs1.style.cssText = `
            color: rgba(2, 176, 13, 0.9);
        `;
        function eml_val(signup_ex) {
            return mailformat.test(signup_ex);
        }
        if(eml_val(signup_e1.value)) {
            signup_e1.style.cssText = `
                background-color: rgba(179, 255, 184, 0.1);
            `;
            e_rs1.innerHTML = 2;
            e_rs1.style.cssText = `
                color: rgba(2, 176, 13, 0.9);
            `;
            // check if email is available
            var ajax = ajaxObj("POST", `${m_path}prs/mem/sgu_Lgc__x.php`);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
            ajax.onreadystatechange = function() { 
                if(ajax.readyState == 4 && ajax.status == 200) { 
                    var return_data = ajax.responseText; 
                    if (return_data.includes('gd__')) {
                        // res_mN1x.innerHTML = return_data.split('gd__')[1];
                        signup_e1.style.cssText = `
                            background-color: rgba(179, 255, 184, 0.1);
                        `; 
                        e_rs1.innerHTML = '&#10003';
                        e_rs1.style.cssText = `
                            color: rgba(2, 176, 13, 0.9);
                        `;
                        e_rs2x.classList.add("dB");
                        e_rs2x.classList.remove("dN");
                        e_rs2.classList.add("dB");
                        e_rs2.classList.remove("dN");
                        signup_e2.classList.remove("dN");
                        signup_e2.classList.add("dB");
                    } if (return_data.includes('bd__')) {
                        // res_mN1x.innerHTML = return_data.split('bd__')[1];
                        signup_e1.style.cssText = `
                            background-color: rgba(232, 101, 101, 0.1);
                        `; 
                        e_rs1.innerHTML = 1;
                        e_rs1.style.cssText = `
                            color: rgba(232, 101, 181, 0.9);
                        `;
                        e_rs2x.classList.add("dN");
                         e_rs2x.classList.remove("dB");
                        e_rs2.classList.add("dN");
                        e_rs2.classList.remove("dB");
                        signup_e2.classList.remove("dB");
                        signup_e2.classList.add("dN");
                    }
                } 
            } 
            
            ajax.send("signup_e1="+signup_e1.value+"&eml_valChk=eml_valChk");
        } else {
            signup_e1.style.cssText = `
                background-color: transparent;
            `;
            e_rs1.innerHTML = 0;
            e_rs1.style.cssText = `
                color: rgba(232, 101, 181, 0.9);
            `;
            e_rs2.classList.add("dN");
            e_rs2.classList.remove("dB");
            signup_e2.classList.remove("dB");
            signup_e2.classList.add("dN");
        }
    }
}

function eml_kUp2() {
    var signup_e1 = document.getElementById('email1');
    var signup_e2 = document.getElementById('email2');
    var e_rs2x = document.querySelector('#e_rs2');
    var e_rs2 = document.querySelector('#e_rs2 span');
    if(signup_e1.value === signup_e2.value) {
        signup_e1.style.cssText = `
            background-color: rgba(179, 255, 184, 0.1);
        `;
        signup_e2.style.cssText = `
            background-color: rgba(179, 255, 184, 0.1);
        `;
        e_rs2.innerHTML = '&#10003';
        e_rs2.style.cssText = `
            color: rgba(2, 176, 13, 0.9);
        `;
        e_rs2x.classList.add("dB");
        e_rs2x.classList.remove("dN");
    } else {
       signup_e2.style.cssText = `
            background-color: rgba(232, 101, 101, 0.1);
        `; 
        e_rs2.innerHTML = 0;
        e_rs2.style.cssText = `
            color: rgba(232, 101, 181, 0.9);
        `;
    }
}

function pwd_kUp() {
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var pwd_val = document.getElementById('pwd_val');
    if (pass1.value.length >= 9) {
        pwd_val.innerHTML = 1;
        pwd_val.style.cssText = `
            color: rgba(2, 176, 13, 0.9);
        `;
        function upr_val(passX) {
            return /[A-Z]/.test(passX);
        }
        if (upr_val(pass1.value)) {
            pwd_val.innerHTML = 2;
            pwd_val.style.cssText = `
                color: rgba(2, 176, 13, 0.9);
            `;
            function lwr_val(passX) {
                return /[a-z]/.test(passX);
            }
            if (lwr_val(pass1.value)) {
                pwd_val.innerHTML = 3;
                pwd_val.style.cssText = `
                    color: rgba(2, 176, 13, 0.9);
                `;
                function num_val(passX) {
                    return /[0-9]/.test(passX);
                }
                if (num_val(pass1.value)) {
                    pass1.style.cssText = `
                        background-color: rgba(179, 255, 184, 0.1);
                    `;
                    pwd_val.style.cssText = `
                        color: rgba(2, 176, 13, 0.9);
                    `;
                    pass2.classList.remove("dN");
                    pass2.classList.add("dB");
                    pwd_val.innerHTML = 4;
                } else {
                    pass1.style.cssText = `
                        background-color: transparent;
                    `;
                    pwd_val.innerHTML = 3;
                }
            } else {
                pass1.style.cssText = `
                    background-color: transparent;
                `;
                pwd_val.innerHTML = 2;
            }
        } else {
            pass1.style.cssText = `
                background-color: transparent;
            `;
            pwd_val.innerHTML = 1;
        }
    } else {
        pass1.style.cssText = `
            background-color: transparent;
        `;
        pwd_val.style.cssText = `
            color: rgba(2, 176, 13, 0.9);
        `;
        pass2.classList.remove("dB");
        pass2.classList.add("dN");
        pwd_val.innerHTML = 0;
    }
}

function pwd_kUp2() {
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var p_rs1 = document.querySelector('#p_rs1 span');
    var p_rs2x = document.querySelector('#p_rs2');
    var p_rs2 = document.querySelector('#p_rs2 span');
    var res_mN2 = document.getElementById('res_mN2');
    var pwd_val = document.getElementById('pwd_val');
    if(pass1.value === pass2.value) {
        pass1.style.cssText = `
            background-color: rgba(179, 255, 184, 0.1);
        `;
        pass2.style.cssText = `
            background-color: rgba(179, 255, 184, 0.1);
        `;
        pwd_val.innerHTML = '&#10003';
        pwd_val.style.cssText = `
            color: rgba(2, 176, 13, 0.9);
        `;
        p_rs2.innerHTML = '&#10003';
        p_rs2.style.cssText = `
            color: rgba(2, 176, 13, 0.9);
        `;
        p_rs2x.classList.add("dB");
        p_rs2x.classList.remove("dN");
        p_rs2.classList.add("dB");
        p_rs2.classList.remove("dN");
    } else {
       pass2.style.cssText = `
            background-color: rgba(232, 101, 101, 0.1);
        `; 
        p_rs2.innerHTML = 0;
        p_rs2.style.cssText = `
            color: rgba(232, 101, 181, 0.9);
        `;
        p_rs2.classList.add("dN");
        p_rs2.classList.remove("dB");
    }
}

// ERROR grab test output 
function gte__fN2(memType) {
    function ajaxObj( meth, url ) {
        var x = new XMLHttpRequest();
        x.open( meth, url, true );
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        return x;
    }
    // NOTE FOR DEVELOPERS
    // -- for some reason var arent functioning as global 
    // -- logic will be in server side PHP until otherwise
    // -- impotance level low ***
    //
    //logic to be used to kodospace & kodoninja
    // -- username logic
    var usrNme = document.getElementById('usrNme').value;     
    // -- email logic
    var signup_e1 = document.getElementById('email1').value;
    var signup_e2 = document.getElementById('email2').value;
    // -- pssword logic
    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;
    // -- password hash bot check
    var sdc_1 = document.getElementById('sdc_1').value;
    var sdc_2 = document.getElementById('sdc_2').value;
    var sdc_3 = document.getElementById('sdc_3').value;
    // -- raw age grab // birthday logic
    // -- all logic needed
    var age_chk = document.getElementById("age_chk").checked;
    // var sgn_AgeRaw = document.getElementById("age_chk").value;
    // var dob = new Date(sgn_AgeRaw);
    // var month_diff = Date.now() - dob.getTime();
    // var age_dt = new Date(month_diff);
    // var year = age_dt.getUTCFullYear();
    // var age = Math.abs(year - 1970);

    // -- promo grab
    var promo_cde = document.getElementById('prm_cdez_sgu1').value;
    // -- newsletter grab
    var cHk_mNws = document.getElementById('cHk_mNws').checked;


    // -- global response
    var st_res = document.getElementById('st_res');
    //

//     var pV_2a =  /^(?=.*[a-z]).+$/;
//     var pV_3a =  /^(?=.*[A-Z]).+$/;
//     var pV_4a =  /^(?=.*[0-9]).+$/;
//     var pV_5a =  /^(?=.*[0-9_\W]).+$/;
// //
//
//

// NOTE for developer purposes only
// Keep commeted
    // var DevTest1 = "<br><br><u style=\"font-size: 20px;\">Vanilla JS Test output:</u><br><br>" +
    //     "<b>username:</b>" + usrNme + "<br><br>" +
    //     "<b>email 1:</b>" + signup_e1 + "<br>" +
    //     "<b>email 2:</b>" + signup_e2 + "<br>" +
    //     "<hr>" + "<br>" +
    //     "<b>password 1:</b>" + pass1 + "<br>" +
    //     "<b>password 2:</b>" + pass2 + "<br>" +
    //     "<hr>" + "<br>" +
    //     "<b>Password bot check:</b>" +
    //     "<hr>" + "<br>" +
    //     "<b>hash 1:</b>" + sdc_1 + "<br>" +
    //     "<b>hash 2:</b>" + sdc_2 + "<br>" +
    //     "<b>hash 3:</b>" + sdc_3 + "<br>" +
    //     "<hr>" + "<br>" +
    //     "<b>DOB:</b>" + sgn_AgeRaw + "<br>" +
    //     "<b>gender:</b>" + signup_gn + "<br>" +
    //     "<b>promo code:</b>" + promo_cde + "<br>";


    st_res.innerHTML = "Meow, running some checks, creating your account.";
    err1 = "Meow, there was a woopsie, I notified my puppet were working on it";
    var ajax = ajaxObj("POST", `${m_path}prs/mem/sgu_Lgc__x.php`);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            console.log(return_data);
            if (return_data.includes('__suc_ok__')) {
                st_res.innerHTML = return_data.split('__suc_ok__')[1];
                setInterval( function() {
                    window.location.href = `user.php?u=${usrNme}`;
                }, 2000 );
            }
            
            // if(return_data != ""){ 
            //     st_res.innerHTML = return_data; 
            // } else {
            //     st_res.innerHTML = err1;
            // }
        } 
    } 
    
    ajax.send("usrNme="+usrNme+
            "&signup_e1="+signup_e1+
            "&signup_e2="+signup_e2+
            "&pass1="+pass1+
            "&pass2="+pass2+
            "&sdc_1="+sdc_1+
            "&sdc_2="+sdc_2+
            "&sdc_3="+sdc_3+
            "&age_chk="+age_chk+
            "&promo_cde="+promo_cde+
            "&cHk_mNws="+cHk_mNws+
            "&memType="+memType+
            "&pst_valSbmt=pst_valSbmt");
};


// promo code lookup
</script>