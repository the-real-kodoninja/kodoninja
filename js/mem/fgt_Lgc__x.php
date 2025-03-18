<script>
    function gte__f_N3c1(opt__vHk){
        function ajaxObj( meth, url ) {
            var x = new XMLHttpRequest();
            x.open( meth, url, true );
            x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            return x;
        }
    // 
    var st_res3 = document.getElementById("st_res3");
    // logic container
    var opt__e = document.getElementById("opt__e");
    var opt__p = document.getElementById("opt__p");
    //
    var opt__eCx = document.getElementById("opt__eCx").value;
    var opt__pCx = document.getElementById("opt__pCx").value;
    //
    var opt__eC1 = document.getElementById("opt__eC1").value;
    var opt__eC2 = document.getElementById("opt__eC2").value;
    //
    var opt__pC1 = document.getElementById("opt__pC1").value;
    var opt__pC2 = document.getElementById("opt__pC2").value;
    //

    
    if (opt__vHk == "opt__eC") {
        opt__e.style.display = "block";
        opt__p.style.display = "none";
        st_res.innerHTML = "";
        fgt__mN1.innerHTML = "";
    } if (opt__vHk == "opt__pC") {
        opt__e.style.display = "none";
        opt__p.style.display = "block";
        st_res.innerHTML = "";
        fgt__mN1.innerHTML = "";
    } 
    if (opt__vHk == "opt__eC" && opt__eC1 != "" && opt__eC2 != "" || opt__vHk == "opt__pC" && opt__pC1 != "" && opt__pC2 != ""){
        var ajax = ajaxObj("POST", `${m_path}prs/mem/fgt_Lgc__x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    st_res3.innerHTML = return_data; 
                    if(return_data == "Okay"){ 
                        st_res3.innerHTML = "SUCCCCEEEESSSSS!, looks good on my end... let's see if we can <a href=\"membership.php?btn=btn_x&load=login\">log in</a> meow.."; 
                        st_res2.innerHTML = "";
                    }
                } else {
                    st_res3.innerHTML = err1;
                }
            } 
        }
        ajax.send("opt__eC1="+opt__eC1+
                "&opt__eC2="+opt__eC2+
                "&opt__pC1="+opt__pC1+
                "&opt__pC2="+opt__pC2+
                "&opt__vHk="+opt__vHk+
                "&opt__eCx="+opt__eCx+
                "&opt__pCx="+opt__pCx);
    }
    

    
};


function gte__f_N3c(Opt_Val){
    // user email selection pull
    const x_eml__1 = document.querySelectorAll(".x_eml__1:checked");
    EmcHk_aRy = Array.from(x_eml__1).map(x => x.value);
    //

    var ajax = ajaxObj("POST", `${m_path}prs/mem/fgt_Lgc__x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    st_res.innerHTML = return_data;
                    if(return_data == "okay_1"){ 
                        st_res.innerHTML = "";
                        st_res2.innerHTML = "";
                        st_res3.innerHTML = "Puuurrrr... Your reset link has been sent to the following emails: <div style=\"width:100%; margin: 10px 0px 0px;\">"+EmcHk_aRy+"</div>";
                    }
                } else {
                    st_res.innerHTML = err1;
                }
            } 
        }
        ajax.send("EmcHk_aRy="+EmcHk_aRy+
                    "&Opt_Val="+Opt_Val);

}

function gte__f_N3b(opt_sel) {
    
    fgt__crd__2.style.display = "block";
    st_res.innerHTML = "";
    x_1BtnA.style.display = "none";
    x_1BtnB.style.display = "block";
};

function gte__fN3(opt_sel) {
    
    var fgt__crd__1 = document.getElementById("fgt__crd__1").value;
    var fgt__crd__2 = document.getElementById("fgt__crd__2").value;
    // condition question load out
    var st_res = document.getElementById("st_res");
    var st_res2 = document.getElementById("st_res2");
    // -- password hash bot check
    var sdc_1 = document.getElementById('sdc_1').value;
    var sdc_2 = document.getElementById('sdc_2').value;
    var sdc_3 = document.getElementById('sdc_3').value;
    // button grab
    var x_1BtnA = document.getElementById("x_1BtnA");
    var x_1BtnB = document.getElementById("x_1BtnB");

    var fgt__mN1 = document.getElementById("fgt__mN1");


    // NOTE for developer purposes only
    // Keep commeted
    // var DevTest1 = "<br><br><u style=\"font-size: 20px;\">Vanilla JS Test output:</u><br><br>" +
    // "<b>logic input 1:</b>" + fgt__crd__1 + "<br>" +
    // "<hr>" + "<br>" +
    // "<b>Case logic 2 lookup:</b>" + fgt__crd__2 + "<br>" +
    // "<hr>" + "<br>" +
    // "<b>Password bot check:</b>" +
    // "<hr>" + "<br>" +
    // "<b>hash 1:</b>" + sdc_1 + "<br>" +
    // "<b>hash 2:</b>" + sdc_2 + "<br>" +
    // "<b>hash 3:</b>" + sdc_3 + "<br>";
    
    // st_res.innerHTML = DevTest1;

     if(fgt__crd__1 == "") {
        var msg1 = "Meow, meow, I need a email, phone #, or username<br><br>";
        var msg2 = "Meow, meow, If you never added your cell don't exspect to login with it silly cat";
        var msg3 = "";
        if(fgt__crd__2 == "") {
            var msg3 = "<br><br>No one created an account without a password meow, don't get wise. I'm trying to help youuuuu human.";
           
        } 
        st_res.innerHTML = msg1 + msg2 + msg3;
    }  else if (fgt__crd__1 === fgt__crd__2) {
           st_res.innerHTML = msg4 = "So your a wise kitty I see, I'm gonna take some kodotokens from you, I have your IP sucka!!!, grrrrr, meow..";
        } else {
        var msg5 = 'meow, Checking to make sure your actually apart of the kodoverse and not a evil bot AI ...';
        var msg6 = '<br><br>meow, meow&#127925;, meow, meow&#127932, meow&#127926;, meow, meow ...';
		st_res.innerHTML = msg5 + msg6;

        if (opt_sel == "opt__xx") {
            opt__e.style.display = "none";
            opt__p.style.display = "none";
        }

        var err1 = "Meow, there was a woopsie, I notified my puppet were working on it";
		var ajax = ajaxObj("POST", `${m_path}prs/mem/fgt_Lgc__x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    st_res.innerHTML = return_data; 
                } else {
                    st_res.innerHTML = err1;
                }
            } 
        }
        
        ajax.send("fgt__crd__1="+fgt__crd__1+
                    "&fgt__crd__2="+fgt__crd__2+
                    "&sdc_1="+sdc_1+
                    "&sdc_2="+sdc_2+
                    "&sdc_3="+sdc_3+
                    "&opt_sel="+opt_sel);
	}
};
</script>
