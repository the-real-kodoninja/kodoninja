<script>
const cntMsgCase_2 = document.querySelector(".cntMsgCase_2");
const cntBck_1 = document.getElementById("cntBck_1");

//
const cntVwLi_1 = document.getElementById("cntVwLi_1");
const cntVwLi_2 = document.getElementById("cntVwLi_2");
const cntVwLi_3 = document.getElementById("cntVwLi_3");

// non user 
const nonUsrLi = document.querySelector(".nonUsrLi");
const cntCaseVw1 = document.getElementById("cntCaseVw1");
const cntCaseVw2 = document.getElementById("cntCaseVw2");

function cntNewPost(uid,uTp,eMl,type) {
    const cntMsgPOST = document.getElementById("cntMsgPOST");
    const cntPostbtn = document.getElementById("cntPostbtn");
    const nonUsrCseOpt = document.getElementById("nonUsrCseOpt");
    cntMsgCase_2.classList.add("dB");
    cntMsgCase_2.classList.remove("dN");
    cntBck_1.classList.add("dB");
    cntVwLi_1.classList.remove("cntLiSel");
    cntVwLi_2.classList.remove("cntLiSel");
    cntVwLi_3.classList.remove("cntLiSel");
    // non user 
    // a non session user
    // b session non user
    // c logged user
    
    if (uTp == 'a') {
        cntCaseVw2.classList.add("dB");
        cntCaseVw2.classList.remove("dN");
        nonUsrLi.classList.add("dB");
        nonUsrLi.classList.remove("dN");
    }
    if (uTp == 'b') {
        cntCaseVw1.classList.add("dN");
        cntCaseVw1.classList.remove("dB");
        cntCaseVw2.classList.add("dB");
        cntCaseVw2.classList.remove("dN");
        nonUsrLi.classList.add("dB");
        nonUsrLi.classList.remove("dN");
    }
    if (uTp == 'c') {
        cntCaseVw1.classList.add("dN");
        cntCaseVw1.classList.remove("dB");
    }
    var ajax = ajaxObj("POST", `${m_path}prs/cnt/cntNewNum_Lgc__x.php`);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                cntPostbtn.innerHTML = '<button onclick="cntMsgPOST(\'0\',\''+uid+'\',\''+uTp+'\',\''+eMl+'\',\''+return_data+'\',\'a\')" class="cntSubm">send</button>';
                if (uTp == 'a' && uid != 0) {
                    nonUsrCseOpt.innerHTML = return_data;
                } if (uid == 0) {
                    // new user load out
                    nonUsrCseOpt.value = return_data;
                } 
            } 
        } 
    } 
    ajax.send("&uid="+uid+
                "&type="+type);
    //
    var ajax2 = ajaxObj("POST", `${m_path}prs/cnt/cntNewMsg_Lgc__x.php`);
    ajax2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax2.onreadystatechange = function() { 
        if(ajax2.readyState == 4 && ajax2.status == 200) { 
            var return_data2 = ajax2.responseText; 
            if(return_data2 != ""){ 
                // add append method IMPORTANT
                cntMsgPOST.innerHTML = return_data2;
                // console.log(return_data2);
            }
        } 
    } 
    ajax2.send("&uid="+uid+
                "&type="+type);
};

function cnt_liVw() {
    cntMsgCase_2.classList.add("dN");
    cntMsgCase_2.classList.remove("dB");
    cntBck_1.classList.add("dN");
    cntBck_1.classList.remove("dB");
};

// panel toggle upload
function cntPnlVw(pnl,cmid,uid,caseNum,uTp,nuEml,type) {
    //
    cntCaseVw1.classList.remove("dN");
    cntCaseVw1.classList.add("dB");
    cntCaseVw2.classList.remove("dB");
    cntCaseVw2.classList.add("dN");
    //
    if (uTp == 'a') {
        cntCaseVw2.classList.remove("dB");
        cntCaseVw2.classList.add("dN");
        
    }
    const cntMsgCase_2 = document.querySelector(".cntMsgCase_2");
    const cntBck_1 = document.getElementById("cntBck_1");
    //
    
    // var addLi = classList.add("cntLiSel");
    // var remLi = classList.remove("cntLiSel");
    //
    // const cntCseLi = document.getElementById("cntCseLi");
    // cntCseLi.classList.add("dN");
    
    if (pnl == "cntVwLi_1") {
        cntVwLi_1.classList.add("cntLiSel");
        cntVwLi_2.classList.remove("cntLiSel");
        cntVwLi_3.classList.remove("cntLiSel");
        cnt_liVw();
    }; if (pnl == "cntVwLi_2") {
        cntVwLi_1.classList.remove("cntLiSel");
        cntVwLi_2.classList.add("cntLiSel");
        cntVwLi_3.classList.remove("cntLiSel");
        cnt_liVw();
    }; if (pnl == "cntVwLi_3") {
        cntVwLi_1.classList.remove("cntLiSel");
        cntVwLi_2.classList.remove("cntLiSel");
        cntVwLi_3.classList.add("cntLiSel");
        cnt_liVw();
    };
    //
    //  console.log("Vanilla JS |"+pnl+" | "+cmid+" | "+uid+" | "+caseNum+" | "+nuEml+" | "+type);
    // content load out
    const cntLi_stat = document.getElementById("cntLi_stat");
    // content load out
    if (cmid != "" && uid != "" && caseNum != "") {
        var ajax = ajaxObj("POST", `${m_path}prs/cnt/cntPnlVwGet_Lgc__x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    // add append method IMPORTANT
                    cntCaseVw1.innerHTML = return_data;
                    // console.log(return_data);
                } 
            } 
        } 
        ajax.send("cmid="+cmid+
                    "&uid="+uid+
                    "&caseNum="+caseNum+
                    "&nuEml="+nuEml+
                    "&type="+type);
    }
};

// back button
function cnBck_1x() {
    cntCaseVw1.classList.remove("dN");
    cntCaseVw1.classList.add("dB");
    cntCaseVw2.classList.remove("dB");
    cntCaseVw2.classList.add("dN");
    cntMsgCase_2.classList.add("dN");
    cntMsgCase_2.classList.remove("dB");
    cntBck_1.classList.add("dN");
    cntBck_1.classList.remove("dB");
}
cntBck_1.addEventListener('click', function (event) {
    cnBck_1x();
});

// non user email or case num check
// cntBck_1.addEventListener('keyup', function (event) {
//     cnBck_1x();
// });

function Case_2MsgView(cmid,uid,uTp,caseNum){
    const cntMsgPOST = document.getElementById("cntMsgPOST");
    const cntPostbtn = document.getElementById("cntPostbtn");
    const cntCaseVw1 = document.getElementById("cntCaseVw1");
    cntMsgCase_2.classList.add("dB");
    cntMsgCase_2.classList.remove("dN");
    cntCaseVw1.classList.remove("dB");
    cntCaseVw1.classList.add("dN");
    //
    cntBck_1.classList.add("dB");
    cntBck_1.classList.remove("dN");
    cntPostbtn.innerHTML = '<button onclick="cntMsgPOST(\''+cmid+'\',\''+uid+'\',\''+uTp+'\',\''+caseNum+'\',\'a\')" class="cntSubm">send</button>';
    //
    // console.log("cmid "+cmid+" | uid "+uid+" | uTp "+uTp+" | caseNUm "+caseNum)
    if (cmid != "" && uid != "" && caseNum != "") {
        var ajax = ajaxObj("POST", `${m_path}prs/cnt/cntMsgGet_Lgc__x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    // add append method IMPORTANT
                    cntMsgPOST.innerHTML = return_data;
                    // console.log(return_data);
                } 
            } 
        } 
        ajax.send("cmid="+cmid+
                    "&uid="+uid+
                    "&caseNum="+caseNum);
    }
}


// non user email or case num check
document.getElementById("nonUsrCseInp").addEventListener('keyup', function (event) {
    var cntEmOrCseNumChk = document.getElementById("nonUsrCseInp").value;
    const cntMsgPOST = document.getElementById("cntMsgPOST");
    var ajax = ajaxObj("POST", `${m_path}prs/cnt/cntMatchChk_Lgc__x.php`);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                // add append method IMPORTANT
                cntMsgPOST.innerHTML = cntMsgPOST.innerHTML + return_data;
                // console.log(return_data);
            } 
        } 
    } 
    ajax.send("cntEmOrCseNumChk="+cntEmOrCseNumChk);
});


// post to contact message thread
function cntMsgPOST(cmid,uid,uTp,eMl,caseNum,type) {
    const cntMsgPOST = document.getElementById("cntMsgPOST");
    var cntMsgTXT = document.getElementById("cntMsgTXT");
    var div = document.createElement("div");
    div.innerHTML = cntMsgTXT.innerHTML;
    var cntMsgTXT = div.innerText;
    var EmOrCseChk = "TRUE";
    // non user 
    if (uTp === 'a') { 
        var nUsrEmOrCse = document.getElementById("nonUsrCseInp").value;
        if (!nUsrEmOrCse) {
            var EmOrCseChk = "FALSE";
        } 
    } if (EmOrCseChk) {
        // developer testing
        // console.log("Vanilla JS:"+
        //         " | cmid="+cmid+
        //         " | &uid= "+uid+
        //         " | &uTp= "+uTp+
        //         " | &nUsrEmOrCse= "+nUsrEmOrCse+
        //         " | &caseNum= "+caseNum+
        //         " | &type= "+type+
        //         " | &cntMsgTXT= "+cntMsgTXT);
        var ajax = ajaxObj("POST", `${m_path}prs/cnt/cntMsgPst_Lgc__x.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data){ 
                    // add append method IMPORTANT
                    cntMsgPOST.innerHTML = cntMsgPOST.innerHTML + return_data;
                    cntMsgTXT.innerHTML = ""; // empty text field
                    // console.log(return_data);
                }
            } 
        } 
        
        ajax.send("cmid="+cmid+
                    "&uid="+uid+
                    "&uTp="+uTp+
                    "&eMl="+eMl+
                    "&nUsrEmOrCse="+nUsrEmOrCse+
                    "&caseNum="+caseNum+
                    "&type="+type+
                    "&cntMsgTXT="+cntMsgTXT);
    }
};
</script>