<script type="text/javascript">


const hdxSch = document.getElementById("hdxSch");
const hdxSrlt = document.getElementById("hdxSrlt"); 
const hdxList = document.getElementById("hdxList");

window.addEventListener('click', function (event) {
    hdxSrlt.classList.add("dN"); 
});

// window.addEventListener('scroll', function (event) {
//     hdxSrlt.classList.add("dN");
//     hdxList.classList.add("dN");
    
// });

window.addEventListener('mouseup', function(event){ 
    if (event.target != hdxSch && event.target.parentNode != hdxSch) { 
        hdxSch.value = ""; 
	} 
}); 

function sra() { 
	hdxSch.value = "";
    hdxSrlt.classList.add("dN");
    hdxSrlt.classList.remove("dB"); 
    hdxList.classList.add("dN");
    hdxList.classList.remove("dB"); 
} 

window.onscroll = sra;

// search logic
hdxSch.addEventListener('keyup', function (event) {
    // hdxList.classList.add("dN");
    // hdxList.classList.remove("dB");
    var hdxVal = hdxSch.value;
    if (hdxVal != "") {
        hdxSrlt.classList.add("dB");
        hdxSrlt.classList.remove("dN");
    } else {
        hdxSrlt.classList.add("dN");
        hdxSrlt.classList.remove("dB");
    }
    if (hdxSch.value != "") {
        var cat = new XMLHttpRequest(); 
        cat.open("POST", "prs/sch/schLi_Lgc__x.php", true); 
        cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        cat.onreadystatechange = function() { 
            if(cat.readyState == 4 && cat.status == 200) { 
                var return_data = cat.responseText; 
                if(return_data != ""){ 
                    hdxSrlt.innerHTML = return_data;
                    console.log(return_data);
                } else {
                    console.log(return_data);
                    hdxSrlt.style.display = "none";
                }
            } 
        } 
        cat.send("hdxVal="+hdxVal);
    }
});



// cart dropdown logic
function hdxCrtDrp(uid,hex) {
    hdxList.classList.add("dB");
    hdxList.classList.remove("dN");
    hdxSrlt.classList.toggle("dN");t_Lgc__x");
    var cat = new XMLHttpRequest(); 
    cat.open("POST", "prs/crt/shpCrt_Lgc__x", true); 
    cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    cat.onreadystatechange = function() { 
        if(cat.readyState == 4 && cat.status == 200) { 
            var return_data = cat.responseText; 
            if(return_data != ""){ 
                hdxList.innerHTML = return_data;
                console.log(return_data);
            } else {
                console.log(return_data);
            }
        } 
    } 
    cat.send("uid="+uid+"&hex="+hex);
};

// usear favorites panel load in
const usrFavLoad = document.getElementById("usrFavLoad");
function usrLstPnl(uid,pid,opt,cde) {
    if (uid && pid && opt && cde) {
        if (usrFavLoad.classList == "dN") { 
            usrFavLoad.classList.add("dI");
            usrFavLoad.classList.remove("dN")
        } else {
            usrFavLoad.classList.add("dN");
            usrFavLoad.classList.remove("dI");
        }
        var cat = new XMLHttpRequest(); 
        cat.open("POST", "prs/fav/favLst_Lgc__x.php", true); 
        cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        cat.onreadystatechange = function() { 
            if(cat.readyState == 4 && cat.status == 200) { 
                var return_data = cat.responseText; 
                if(return_data != ""){ 
                    usrFavLoad.innerHTML = return_data;
                    console.log(return_data);
                } else {
                    console.log(return_data);
                }
            } 
        } 
        cat.send("uid="+uid+"&pid="+pid+"&opt="+opt+"&cde="+cde);
    }
}

// add item to favorites button
function addTFav(uid,pid,opt,cde) {
    const atf_btn_1 = document.getElementById("atf_btn_"+pid);
    // console.log("VANILLA JS GRAB: "+uid+" | "+pid+" | "+opt+" | "+cde);
    if (uid && pid && opt && cde) {
        var cat = new XMLHttpRequest(); 
        cat.open("POST", "prs/fav/addTFav_Lgc__x.php", true); 
        cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        cat.onreadystatechange = function() { 
            if(cat.readyState == 4 && cat.status == 200) { 
                var return_data = cat.responseText; 
                if(return_data != ""){ 
                    atf_btn_1.innerHTML = return_data;
                    console.log(return_data);
                } else {
                    console.log(return_data);
                }
            } 
        } 
        cat.send("uid="+uid+"&pid="+pid+"&opt="+opt+"&cde="+cde);
    }
}

// ratings 
function prdRtgStar(event) {
    const prdRtngs = document.querySelectorALL(".prdRtngs i");
    var strCnt = 0;
    for(var i=0; i<prdRtngs.length; i++) {
        if(prdRtngs[i]==event.target) {
            strCnt = i+1;
        }
    }

    for(var j=0; j<prdRtngs; j++) {
        prdRtngs[j].style.color = "gold";
    } 

    for(var k=0; k<prdRtngs.length; k++) {
        prdRtngs[k].style.color = "#333";
    } 


    if (prdRtngs == 1) {
        prdRtngs[0].style.color = "gold";
    } if (prdRtngs == 2) {
        prdRtngs[1].style.color = "gold";
    } if (prdRtngs == 3) {
        prdRtngs[2].style.color = "gold";
    } if (prdRtngs == 4) {
        prdRtngs[3].style.color = "gold";
    } if (prdRtngs == 5) {
        prdRtngs[4].style.color = "gold";
    }
};


function amtCalc(tkn,opt) {
    const qty = document.getElementById("prdSel_x").value;
    // total cost 
    var ttl = Number(tkn*qty);
    document.getElementById("prdTtl_x").innerHTML = '<span class="sxPrc_ fR"><i style="color: green;">$</i>'+ttl+'</span>';
    if (opt == 'tkn') {
         // absoltes
        const numIncr = 0.5;
        const num_Tkn = 50;
        // month load out
        document.getElementById("tkn_m_FULL_a").innerHTML = Number(tkn*qty)*Number(1); // kodotokens
        document.getElementById("tkn_m_FULL_b").innerHTML = Number(num_Tkn*qty)*Number(1); // kodotoken bonus
        document.getElementById("tkn_m_FULL_c").innerHTML = Number(numIncr*qty)*Number(1); // money earned
        // quarter 1 load out
        document.getElementById("tkn_q_FULL_a_1").innerHTML = Number(tkn*qty)*Number(3); // kodotokens
        document.getElementById("tkn_q_FULL_b_1").innerHTML = Number(num_Tkn*qty)*Number(3); // kodotoken bonus
        document.getElementById("tkn_q_FULL_c_1").innerHTML = Number(numIncr*qty)*Number(3); // money earned
        // quarter 2 load out
        document.getElementById("tkn_q_FULL_a_2").innerHTML = Number(tkn*qty)*Number(6); // kodotokens
        document.getElementById("tkn_q_FULL_b_2").innerHTML = Number(num_Tkn*qty)*Number(6); // kodotoken bonus
        document.getElementById("tkn_q_FULL_c_2").innerHTML = Number(numIncr*qty)*Number(6); // money earned
        // quarter 3 load out
        document.getElementById("tkn_q_FULL_a_3").innerHTML = Number(tkn*qty)*Number(9); // kodotokens
        document.getElementById("tkn_q_FULL_b_3").innerHTML = Number(num_Tkn*qty)*Number(9); // kodotoken bonus
        document.getElementById("tkn_q_FULL_c_3").innerHTML = Number(numIncr*qty)*Number(9); // money earned
        // yearly load out
        document.getElementById("tkn_y_FULL_a").innerHTML = Number(tkn*qty)*Number(12); // kodotokens
        document.getElementById("tkn_y_FULL_b").innerHTML = Number(num_Tkn*qty)*Number(12); // kodotoken bonus
        document.getElementById("tkn_y_FULL_c").innerHTML = Number(numIncr*qty)*Number(12); // money earned
    }  
};

const prdATC_x = document.getElementById("prdATC_x");

// add to cart 
function a2Crt(uid,cde,pid) {
    const qty = document.getElementById("prdSel_x").value;
    // console.log(uid,cde,pid,qty);
    if (uid && cde && pid && qty) {
        var cat = new XMLHttpRequest(); 
        cat.open("POST", "prs/crt/shpCrt_Lgc__x.php", true); 
        cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        cat.onreadystatechange = function() { 
            if(cat.readyState == 4 && cat.status == 200) { 
                var return_data = cat.responseText; 
                if(return_data != ""){ 
                    prdATC_x.innerHTML = return_data;
                    console.log(return_data);
                } else {
                    console.log(return_data);
                }
            } 
        } 
        cat.send("uid="+uid+"&cde="+cde+"&pid="+pid+"&qty="+qty);
    }
}

const tknYES = document.getElementById("tknYES");

tknYES.addEventListener('change', function (event) {
    if (tknYES.checked) {
        prdATC_x.disabled = false;
        prdATC_x.style.background = "#3d4347";
    } else {
        prdATC_x.disabled = true;
        prdATC_x.style.background = "rgb(134, 116, 118)";
    }
    
});


// token product page //
const tknUL = document.querySelectorAll(".tkn_nav_1 a");

for (const tknLI of tknUL) {
    tknLI.addEventListener("click", clickHandler);
}

function clickHandler(e) {
    e.preventDefault();
    const href = this.getAttribute("href");
    const offsetTop = document.querySelector(href).offsetTop;
    
    scroll({
        top: offsetTop,
        behavior: "smooth"
    });

    console.log(href);
}

//  scroll js effects
const scrEfct = document.querySelectorAll(".scrEfct");

const el_InView = (el, dividend = 1) => {
    const elementTop = el.getBoundingClientRect().top;

    return (elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend);
};

const el_outVIew = (el) => {
    const elementTop = el.getBoundingClientRect().top;

    return (elementTop > (window.innerHeight || document.documentElement.clientHeight)
    );
};

const displayScrollElement = (element) => {
    element.classList.add("scrolled");
}

const hideScrollElement = (element) => {
    element.classList.remove("scrolled");
}

const handleScrollAnimation = () => {
    scrEfct.foreach((el) => {
        if (el_InView(el, 1.25)) {
            displayScrollELement(el);
        } else if (el_outVIew(el)) {
            hideScrollElement(el)
        }
    })
}

window.addEventListener("scroll", () => {
    handleScrollAnimation();
});

// cart load out
function crtChkTble(pid) {
    const crt_qty_ALL = document.getElementsByClassName("crt_qty_VAL");
    const crt_qty_TOTAL = document.getElementById("crt_qty_TOTAL");
    var qtyAll = '';
    var qtyTtl = [];
    for(var i = 0; i < crt_qty_ALL.length; i++) {
        qtyAll += ","+Number(crt_qty_ALL[i].value); 
    }
    
    Math.round(parseInt((qtyTtl.push(qtyAll)),10));

    const qtySUM = (arr) => {
        return arr.reduce((total, current) => {
            return total + current;
        }, 0);
    };
    crt_qty_TOTAL.innerHTML = qtySUM([qtyTtl]);
    console.log(typeof(qtySUM([qtyTtl]))+" | "+qtySUM([qtyTtl]));
    // input
    const crt_qty_VAL = document.getElementById("crt_qty_VAL_"+pid).value;
    // const crt_tkn_LOAD = document.getElementById("crt_tkn_INPUT").value;
    // const crt_csh_INPUT = document.getElementById("crt_csh_INPUT").value;
    // // load total
    
    // const crt_tkn_TOTAL = document.getElementById("crt_tkn_TOTAL");
    // const crt_csh_TOTAL = document.getElementById("crt_csh_TOTAL");

    
};


// window.onload function(){ 
//     document.querySelctor(".gstNEW input[type=\"password\"]").innerHTML = "";
// }; 

// email
const gstNEW_e1 = document.getElementById("gstNEW_e1");
const gstNEW_e2 = document.getElementById("gstNEW_e2");
// password
const gstNEW_p1 = document.getElementById("gstNEW_p1");
const gstNEW_p2 = document.getElementById("gstNEW_p2");
// responses
const gstNEW_r1 = document.getElementById("gstNEW_r1");
const gstNEW_r2 = document.getElementById("gstNEW_r2");
// submit button
const gstNEW_sgu = document.getElementById("gstNEW_sgu");
//
const pwrdChk__gst_x = false;
const emlxChk__gst_x = false;

function gstGOOD() {
    gstNEW_sgu.style.display = "block";
    gstNEW_e1.style.backgroundColor = "honeydew";
    gstNEW_p1.style.backgroundColor = "honeydew";
    gstNEW_e2.style.display = "none";
    gstNEW_p2.style.display = "none";
    gstNEW_r1.innerHTML = 'your good to create your guest account';
    gstNEW_r2.innerHTML = '';
}

function gstBAD() {
    gstNEW_sgu.style.display = "none";
    gstNEW_e1.style.backgroundColor = "#fff";
    gstNEW_p1.style.backgroundColor = "#fff";
    gstNEW_e2.style.display = "block";
    gstNEW_p2.style.display = "block";
}

function inpVAl() {
    var ge1 = gstNEW_e1.value;
    var ge2 = gstNEW_e2.value; 
    var gp1 = gstNEW_p1.value;
    var gp2 = gstNEW_p2.value;
    var pwrdChk__gst1 = false; 
    var pwrdChk__gst2 = false; 
}

function gstNEW_e() {
    var ge1 = gstNEW_e1.value;
    var ge2 = gstNEW_e2.value; 
    var gp1 = gstNEW_p1.value;
    var gp2 = gstNEW_p2.value;
    var pwrdChk__gst1 = false; 
    var pwrdChk__gst2 = false; 

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (ge1 != "" && ge1.length >= 4){
        if (ge1
        // ge1.match(mailformat)
        ) {
            gstNEW_e1.style.backgroundColor = "honeydew";
            gstNEW_e2.style.display = "block";
             if (ge1 === ge2 
            //  && ge1.match(mailformat) && ge2.match(mailformat)
             ) {
                gstNEW_r1.innerHTML = 'your emails match';
                if (ge1 === ge2 && gp1 === gp2) {
                    return gstGOOD();
                } else {
                    if (gp1 !== gp2) {
                        if (gp1 === gp2) {
                            return gstBAD();
                            emlxChk__gst_x = true;
                            gstNEW_r1.innerHTML = 'your passwords match';
                        } 
                        gstNEW_r1.innerHTML = 'your passwords don\'t match';
                    }
                    gstNEW_r1.innerHTML = 'your emails don\'t match';
                    return gstBAD();
                } if (ge1 !== ge2 || gp1 !== gp2) {
                    return gstBAD();
                } 
            } 
        } else {
            gstNEW_r1.innerHTML = 'this is not a valid email';
        }
    }
};

function gstNEW_p() {
    var ge1 = gstNEW_e1.value;
    var ge2 = gstNEW_e2.value; 
    var gp1 = gstNEW_p1.value;
    var gp2 = gstNEW_p2.value;
    var pwrdChk__gst1 = false; 
    var pwrdChk__gst2 = false; 

    var pV_2a =  /^(?=.*[a-z]).+$/;
    var pV_3a =  /^(?=.*[A-Z]).+$/;
    var pV_4a =  /^(?=.*[0-9]).+$/;
    var pV_5a =  /^(?=.*[0-9_\W]).+$/;
    //
    var p_vBgn = 'Your password needs ';
    var p_vLst = {
    pV_1b: p_vBgn+'to be between 8 to 30 characters',
    pV_2b: p_vBgn+'one lowercase letter',
    pV_3b: p_vBgn+'one uppercase letter',
    pV_4b: p_vBgn+'one numeric digit',
    pV_5b: p_vBgn+'one special character'
    };
    //
     if (gp1 != ""){
        if (gp1.match(pV_5a)) {
            if (gp1.match(pV_2a)) {
                if (gp1.match(pV_3a)) {
                    if (gp1.match(pV_4a)) {
                        if (gp1.length >= 8 && gp1.length <= 30) {
                            if (gp1.match(pV_2a) && gp1.match(pV_3a) && gp1.match(pV_4a) && gp1.match(pV_5a)) {
                                // pwrdChk__gst1 = true; 
                                gstNEW_p2.style.display = "block";
                                gstNEW_p1.style.backgroundColor = "honeydew";
                                gstNEW_p2.addEventListener('keypress', function(){
                                    console.log(gp1+" | "+gp2); // developer grab checks
                                    if (gp2 == "") {
                                        gp2.style.display= 'none';
                                    } else {
                                        if (gp1 === gp2) {
                                            // pwrdChk__gst2 = true;
                                            gstNEW_r2.innerHTML = 'your passwords match';
                                            gstNEW_p1.style.backgroundColor = "honeydew";
                                            gstNEW_p2.style.backgroundColor = "honeydew";
                                            if (ge1 !== "" && ge1 === ge2 && gp1 === gp2) {
                                                return gstGOOD();
                                                pwrdChk__gst_x = true; 
                                            } 
                                        } else {
                                            // pwrdChk__gst1 = false;
                                            gstNEW_r2.innerHTML = 'your passwords don\'t match';
                                            // if (pwrdChk__gst1 == true && pwrdChk__gst1 = false) {
                                                gstNEW_p1.style.backgroundColor = "honeydew";
                                                gstNEW_p2.style.backgroundColor = "#fff";
                                            // } 
                                            
                                            if (ge1 !== ge2) {
                                                gstNEW_r1.innerHTML = 'your emails don\'t match';
                                                return gstBAD();
                                                if (ge1 === ge2) {
                                                    gstNEW_r1.innerHTML = 'your emails match';
                                                } 
                                            }
                                        } if (ge1 !== ge2 || gp1 !== gp2) {
                                            return gstBAD();
                                        } if (pwrdChk__gst1 == true) { // all checks are okay
                                            gstNEW_sgu.style.display = "none";
                                            gstNEW_p2.style.display = "block";
                                            if (gp2 != ""){
                                                gstNEW_sgu.style.display = "none";
                                                
                                            }
                                        }
                                    }
                                });
                            } else {
                                return p_gstBAD();
                            }
                        } else {
                            gstNEW_r2.innerHTML = p_vLst.pV_1b;
                            return p_gstBAD();
                        }
                    } else {
                        gstNEW_r2.innerHTML = p_vLst.pV_4b;
                        return p_gstBAD();
                    }
                } else {
                    gstNEW_r2.innerHTML = p_vLst.pV_3b;
                    return p_gstBAD();
                }
            } else {
                gstNEW_r2.innerHTML = p_vLst.pV_2b;
                return p_gstBAD();
            }
        } else {
            gstNEW_r2.innerHTML = p_vLst.pV_5b;
            return p_gstBAD();
        }
     }
};

function gstNEW_POST() {
    const gstNEW_res_x = document.getElementById("gstNEW_res_x");
    var ge1 = gstNEW_e1.value;
    var ge2 = gstNEW_e2.value; 
    var gp1 = gstNEW_p1.value;
    var gp2 = gstNEW_p2.value;
    var pwrdChk__gst1 = false; 
    var pwrdChk__gst2 = false; 
    
    // if (emlxChk__gst_x == true && pwrdChk__gst_x == true) {
        // DEVELOPER ONLY
        // console.log(ge1+" === "+ge2+" | "+gp1+" === "+gp2);
        // console.log("emlxChk__gst_x :"+emlxChk__gst_x+" | pwrdChk__gst_x :"+pwrdChk__gst_x);
        var cat = new XMLHttpRequest(); 
        cat.open("POST", "prs/usr/gstNEW_Lgc__x.php", true); 
        cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        cat.onreadystatechange = function() { 
            if(cat.readyState == 4 && cat.status == 200) { 
                var return_data = cat.responseText; 
                if(return_data != ""){ 
                    gstNEW_res_x.innerHTML = return_data;
                    if (return_data == "Your all set.") {
                        document.getElementById("gstNEW_a").style.display = "none";
                        gstNEW_sgu.style.display = "none";
                        gstNEW_res_x.innerHTML = return_data;
                    }
                } else {
                    gstNEW_res_x.innerHTML = "error, meooowww!, let's try this again.";
                }
            } 
        } 
        cat.send("ge1="+ge1+"&ge2="+ge2+"&gp1="+gp1+"&gp2="+gp2);
    // }
}


// promo code
const crt_pmo_LOAD_a = document.getElementById("crt_pmo_LOAD_a").value;
const crt_pmo_LOAD_b = document.getElementById("crt_pmo_LOAD_b");
</script>