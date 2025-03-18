<script>
function gte__fN1() {
    function ajaxObj( meth, url ) {
        var x = new XMLHttpRequest();
        x.open( meth, url, true );
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        return x;
    }
    var DevTest1 = "";
    var lgn__crd__1 = document.getElementById("lgn__crd__1").value;
    var lgn__crd__2 = document.getElementById("lgn__crd__2").value;
    var st_res = document.getElementById("st_res");
    // -- password hash bot check
    var sdc_1 = document.getElementById('sdc_1').value;
    var sdc_2 = document.getElementById('sdc_2').value;
    var sdc_3 = document.getElementById('sdc_3').value;

    // NOTE for developer purposes only
    // Keep commeted
    // var DevTest1 = `
    // <br><br><u style="font-size: 20px;">Vanilla JS Test output:</u><br><br>
    // <b>login input 1:</b>`+lgn__crd__1+`<br>
    // <hr><br>
    // <b>password:</b>`+lgn__crd__2+`<br>
    // <hr><br>
    // <b>Password bot check:</b>
    // <hr><br>
    // <b>hash 1:</b>`+sdc_1+`<br>
    // <b>hash 2:</b>`+sdc_2+`<br>
    // <b>hash 3:</b>`+sdc_3+`<br>`;
    // console.log(DevTest1);

    if(lgn__crd__1 == "") {
        var msg1 = "Meow, meow, I need a email, phone #, or username<br><br>";
        var msg2 = "Meow, meow, If you never added your cell don't exspect to login with it silly cat";
        var msg3 = "";
        if(lgn__crd__2 == "") {
            var msg3 = "<br><br>No one created an account without a password meow, don't get wise.";
           
        } 
        st_res.innerHTML = msg1 + msg2 + msg3 + DevTest1;
    }  else if (lgn__crd__1 === lgn__crd__2) {
           st_res.innerHTML = msg4 = "So your a wise kitty I see, I'm gonna take some kodotokens from you, I have your IP sucka!!!, grrrrr, meow..";
        } else {
        var msg5 = 'meow, Checking to make sure your actually apart of the kodoverse and not a evil bot AI ...';
		st_res.innerHTML = msg5 + DevTest1;
        var err1 = "Meow, there was a woopsie, I notified my puppet were working on it";
		var ajax = ajaxObj("POST", `${m_path}prs/mem/lgn_Lgc__x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data !== ""){ 
                    st_res.innerHTML = String(return_data.split("__").shift());
                    var val_lgn_chk = String(return_data.split("__").pop());
                    if (val_lgn_chk === "true") {
                        st_res.innerHTML = "Yay,.. hang on I'm logging you in and redirecting you, meow";
                        setInterval( function() {
                            window.location.href = `user.php?u=${lgn__crd__1}`;
                        }, 2000 );
                    } 
                } else {
                    st_res.innerHTML = err1;
                }
            } 
        }
        ajax.send("lgn__crd__1="+lgn__crd__1+
                    "&lgn__crd__2="+lgn__crd__2+
                    "&sdc_1="+sdc_1+
                    "&sdc_2="+sdc_2+
                    "&sdc_3="+sdc_3);
	}
};
</script>