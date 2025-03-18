<script>
// auto save into database
function pstModSVE() {
    let usrPSt_data = document.querySelector(`.stModx_BdyTxtInr`);
    let upidx = usrPSt_data.id;
    if (upidx.includes('usrPSt_data_')) {
        let upidy = upidx.split('usrPSt_data_');
        let upid = upidy.pop(','); // needed creates a , on random
        let usrPSt_data = document.querySelector(`.stModx_BdyTxtInr`).innerText;
        // grab all drafts from database
        var ajax = ajaxObj("POST", `${m_path}prs/pst/drfMod_Lgc__x.php`, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    console.log('new error test: '+return_data);
                    updatePostCount();
                } 
            } 
        } 
        ajax.send("upid="+upid+"&usrPSt_data="+usrPSt_data+"&uNSVE=uNSVE");
    }
};

// insert draft into current text box
function pstModCNT(upid) {
    let usrPSt_data = document.querySelector(`.stModx_BdyTxtInr`);
    let udta = document.querySelector(`.pstMod_mLTXT_${upid}`);
    let pstModx_DftBtn_b = document.querySelector(`#pstModx_DftBtn_b<?php echo $log_id; ?>`);
    pstModx_DftBtn_b.classList.add("dN");
    pstModx_DftBtn_b.classList.remove("dB");
    //
    usrPSt_data.innerText = udta.innerText;
    usrPSt_data.id = `usrPSt_data_${upid}`;
    // console.log(`Data ${udta.innerText} \b uid ${upid}`);
    updateWordCount();
    updatePostCount();
};  

// delete draft load out
function pstModDEL(upid) {
    var ajax = ajaxObj("POST", `${m_path}prs/pst/drfMod_Lgc__x.php`, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                // remove from list
                document.querySelector(`#pstModWPR_${upid}`).innerHTML = "";
                document.querySelector(`#pstModWPR_${upid}`).innerText = "";
                document.querySelector(`#pstModWPR_${upid}`).classList.add("dN");
                updatePostCount();
            } 
        } 
    } 
    ajax.send("upid="+upid+"&uNDEL=uNDEL");
};
</script>