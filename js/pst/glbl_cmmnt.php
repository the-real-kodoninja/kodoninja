<script>
// mobile closeout
function pstModxCLX() { 
    const pstModxLOAD = document.querySelector(`#pstModxLOAD_<?php echo $log_id; ?>`);
    const pstModxBACK = document.querySelector(`.pstModxBACK`);
    pstModxBACK.classList.add("dN");
    pstModxLOAD.classList.add("dN");
    pstModxLOAD.classList.remove("dB");
    pstModxLOAD.innerHTML = "";
    document.querySelector(`.pstModx_Wpr`).style.cssText = `z-index: 100000;`;
};
// close out drafts module
function DftModCLX() { 
    document.querySelector(`#pstModx_DftBtn_b<?php echo $log_id; ?>`).innerHTML = '';
};
// update draft counter // placed here for encapsulating
function updatePostCount() {
    var ajax = ajaxObj("POST", `${m_path}prs/pst/drfMod_Lgc__x.php`, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                console.log(return_data);
                document.querySelector(`#cntNum_<?php echo $log_id; ?>`).innerHTML = return_data;
            } 
        } 
    } 
    ajax.send(`upid="<?php echo $log_id; ?>"&UPDCNT=UPDCNT`);
//
};
// new post button load
function addPstBtn(uid,cde,type,ncde) {
    // xa is main header post button
    // xy is the closeout button
    // xz is the post new thread button
    var data = "";
    // temp presets
    const vPnlBck = document.querySelector(".vPnlBck"); 
    const vPnlCtr = document.querySelector(".vPnlCtr");
    const vPnlWpr = document.querySelector(".vPnlWpr");
    const vPnlHdr = document.querySelector(".vPnlHdr");
    const vPnlUsr_hdr = document.querySelector(".vPnlUsr_hdr");
    const vPnlBdy = document.querySelector(".vPnlBdy");
    const vPnlMain = document.querySelector(".vPnlMain");
    const vPnlFtr = document.querySelector(".vPnlFtr");
    const pstModxBACK = document.querySelector(`.pstModxBACK`);
    const pstModxLOAD = document.querySelector(`#pstModxLOAD_${uid}`);
    var m_path = `<?php echo $m_path; ?>`;
    var log_cde_x = `<?php echo $log_HshCde_x; ?>`; 
    var log_cde_y = `<?php echo $log_HshCde_y; ?>`;
    // all case close out
    
    // no onscroll prevent close and wipe out on write
    vPnlBck.addEventListener('click', function(event) { 
        return vPnlMod_RESET();
    }); 
    // generate random for unique id autosave
    function gNEWnum() {
        return log_cde_x + Math.floor(Math.random() * 900000 + 1000000);
    };
    const gNXNUM = gNEWnum();
    if (uid && cde) {
        // do not assign to meets condition
        addLoad = document.getElementById("addPstDrp_"+uid);
        if (type === "xa" || type === "xx") {
            addLoad.classList.toggle("dN");
        } if (type === "xz" && log_cde_x === log_cde_y) {
            if (p_load === 'f') {
                var data = document.getElementById(`usrPSt_data_${gNXNUM}`).value;
            } else if (p_load === 'm') { 
                var data = document.getElementById(`usrPSt_data_${gNXNUM}`).innerText;
            }
        } if (type === "xy" && log_cde_x === log_cde_y) {
            return vPnlMod_RESET();
        }
        var cat = new XMLHttpRequest();
        cat.open("POST", `${m_path}prs/pst/newPst_Lgc__x.php`, true);
        cat.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        cat.onreadystatechange = function() { 
            if(cat.readyState == 4 && cat.status == 200) { 
                var return_data = cat.responseText; 
                if(return_data){ 
                    addLoad.innerHTML = return_data;
                    // new post entry (post view)
                    // full
                    if (p_load === 'f') {
                        if (ncde != "NULL" && type === "xa" || type === "xx") {
                            if (type == "xx" || type == "xy") {
                                vPnlMod();
                                vPnlWpr.style.height = "auto";
                                vPnlUsr_hdr.style.cssText = `
                                    height: 50px;
                                    padding: 10px;
                                `;
                                vPnlUsr_hdr.classList.add("dB");
                                vPnlUsr_hdr.classList.remove("dN");
                                vPnlMain.classList.add("dB");
                                vPnlMain.classList.remove("dN");
                                vPnlUsr_hdr.innerHTML = `
                                <div class="usr_Pst-Wpr">
                                    <img src="u/<?php echo $log_id; ?>/avt/<?php echo $uImgXX; ?>" alt="<?php echo $log_username; ?>">
                                    <span><?php echo $log_username; ?></span>
                                    <span>post: pending</span>
                                </div>
                                `;
                                vPnlBdy.innerHTML = `
                                <div class="vPnlAdd_Wpr">
                                    <textarea id="usrPSt_data_${gNXNUM}" class="w100 pad-T"placeholder="What would you like to say <?php echo $log_username; ?>?"></textarea>
                                </div>
                                `;
                                vPnlFtr.style.width = "100%";
                                vPnlFtr.innerHTML = `
                                <div class="dI">
                                    <button class=\"addpst_BTn\" onclick="addPstBtn(\'<?php echo $log_id; ?>\',\'<?php echo $log_HshCde; ?>\',\'xz\',\'<?php echo $log_HshCde; ?>\')">post</button>
                                    <div class="tooltip">
                                        <span>!</span>
                                        <div class="tooltiptext">v4 updates will include photo, video, video embeded, audio, emoji, animated gif, link (w/ kodospace)</div>
                                    </div>
                                </div>
                                <div class="dI fR">
                                    <i class="addVpnl_clx pA" onclick="vPnlMod_RESET()">x</i>
                                </div>
                                `;
                            }
                        }
                    // mobile
                    } else if (p_load === 'm') {
                        if (ncde != "NULL" && type === "xa" || type === "xx") {
                            if (type == "xx" || type == "xy") {
                                // document.querySelector(`.pstModx_Wpr`).style.cssText = `z-index: 100000;`;
                                var pstModx = `
                                <div id="pstModx_" class="pstModx_Wpr">
                                    <div class="pstModx_Hdr">
                                        <i id="stModx_CLX" onclick="pstModxCLX()">X</i>
                                        <i id="stModx_LtTgl" class="fa-solid fa-circle"></i>
                                        <div class="pstModx_HdrTyp fR">posting a user post</div>
                                    </div>
                                    <div class="pstModx_Bdy">
                                        <div class="pstModx_BdyHdr">
                                            <?php echo $glbl_uAHdr; ?>
                                            <span><?php echo $usrTag_GLBL; ?></span>
                                            <div>
                                                <span>
                                                    <i class="fa-solid fa-globe"></i> <em>Public</em> 
                                                    <i class="fa-solid fa-arrow"></i>
                                                </span>
                                                <span>
                                                    <i class="fa-solid fa-globe"></i> <em>kodoninja</em> 
                                                    <i class="fa-solid fa-arrow"></i>
                                                </span>
                                                <span id="pstModx_DftBtn_a">
                                                    <i class="fa-solid fa-pencil"></i> <em>Drafts</em> 
                                                    <i class="fa-solid fa-arrow"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="stModx_BdyTxtWpr">
                                            <div id="usrPSt_data_${gNXNUM}" class="stModx_BdyTxtInr" contenteditable="true" spellcheck="true" onkeyup="pstModSVE()" placeholder="What would you like to say <?php echo $log_username; ?>?"></div>
                                        </div>
                                    </div>
                                    <div class="pstModx_Ftr w100">
                                        <div class="pstModx_FtrOpt dI">
                                            <i class="fa-solid fa-upload"></i>
                                            <i class="fa-solid fa-location"></i>
                                            <i class="fa-solid fa-smile"></i>
                                            <i class="fa-solid fa-gif pA">gif</i>
                                        </div>
                                        <div class="dI fR">
                                            <small class="dI"><span id="pstModx_Cnt">0</span>/500</small>
                                            <div class="pstModx_HdrBtn dI" onclick="addPstBtn(\'<?php echo $log_id; ?>\',\'<?php echo $log_HshCde; ?>\',\'xz\',\'<?php echo $log_HshCde; ?>\')">post</div>
                                        </div>
                                    </div>
                                    <!-- drafts load out -->
                                    <div id="pstModx_DftBtn_b<?php echo $log_id; ?>"></div>
                                </div>
                                `;
                                document.querySelector("#mNu_m_y2").classList.add("dN");
                                pstModxLOAD.classList.add("dB");
                                pstModxLOAD.classList.remove("dN");
                                pstModxLOAD.innerHTML = pstModx;
                                pstModxBACK.classList.toggle("dN");
                                // counter
                                const characterInput = document.querySelector('.stModx_BdyTxtInr');
                                //
                                function updateWordCount() {
                                const wordCountElement = document.querySelector('#pstModx_Cnt');
                                const characters = characterInput.innerText.split('');
                                wordCountElement.textContent = characters.length;
                                let maxChar = 500;

                                // Check if character count exceeds the limit
                                if (characters.length > maxChar) {
                                    // Remove excess characters
                                    characterInput.innerText = characters.slice(0, maxChar).join('');

                                    // Disable further input
                                    // characterInput.setAttribute('contenteditable', 'false');
                                }
                                }

                                // Update the word count initially
                                updateWordCount();

                                // Add an event listener to update the word count on input
                                characterInput.addEventListener('keyup', updateWordCount);
                                //
                                // light mode
                                const stModx_LtTgl = document.querySelector('#stModx_LtTgl');
                                stModx_LtTgl.addEventListener('click', function(event) { 
                                    const pstModxBACK = document.querySelector('.pstModxBACK');
                                    const stModx_CLX = document.querySelector('#stModx_CLX');
                                    const pstModx_HdrTyp = document.querySelector('.pstModx_HdrTyp');
                                    const pstModx_BdyHdr = document.querySelector('.pstModx_BdyHdr');
                                    const pstModx_BdyHdrIMG = document.querySelector('.pstModx_BdyHdr img');
                                    const stModx_BdyTxtWpr = document.querySelector('.stModx_BdyTxtWpr');
                                    const pstModx_Wpr = document.querySelector('.pstModx_Wpr');
                                    const pstModx_Ftr = document.querySelector('.pstModx_Ftr');
                                    const pstModx_fGif = document.querySelector('.fa-gif');
                                    const pstModx_HdrBtn = document.querySelector('.pstModx_HdrBtn');
                                    //
                                    if (stModx_LtTgl.style.color == "rgb(255, 255, 255)") {
                                        // background
                                        pstModxBACK.style.background = "#fff";
                                        // circle
                                        stModx_LtTgl.style.color = "#3d4347";
                                        // close
                                        stModx_CLX.style.color = "#3d4347";
                                        // header
                                        pstModx_HdrTyp.style.color = "rgb(0, 0, 0, 0.2)";
                                        // post header
                                        pstModx_BdyHdr.style.color = "#3d4347";
                                        // post header
                                        pstModx_BdyHdrIMG.style.border = "2px solid #3d4347";
                                        // body
                                        stModx_BdyTxtWpr.style.color = "#3d4347";
                                        // body background
                                        pstModx_Wpr.style.background = "#fff";
                                        // footer
                                        pstModx_Ftr.style.color = "#3d4347";
                                        // gif icon 
                                        pstModx_fGif.style.color = "#3d4347";
                                        pstModx_fGif.style.border = "1px solid #3d4347";
                                        // post button
                                        pstModx_HdrBtn.style.background = "rgb(0, 0, 0, 0.3)";
                                        pstModx_HdrBtn.style.color = "#3d4347";
                                    } else {
                                        // background
                                        pstModxBACK.style.background = "#3d4347";
                                        // circle
                                        stModx_LtTgl.style.color = "#fff";
                                        // close
                                        stModx_CLX.style.color = "#fff";
                                        // header
                                        pstModx_HdrTyp.style.color = "rgb(255, 255, 255, 0.2)";
                                        // post header
                                        pstModx_BdyHdr.style.color = "#fff";
                                        // post header
                                        pstModx_BdyHdrIMG.style.border = "2px solid #fff";
                                        // body
                                        stModx_BdyTxtWpr.style.color = "#fff";
                                        // body background
                                        pstModx_Wpr.style.background = "#3d4347";
                                        // footer
                                        pstModx_Ftr.style.color = "#fff";
                                        // gif icon 
                                        pstModx_fGif.style.color = "#fff";
                                        pstModx_fGif.style.border = "1px solid #fff";
                                        // post button
                                        pstModx_HdrBtn.style.background = "rgb(255, 255, 255, 0.6)";
                                        pstModx_HdrBtn.style.color = "#3d4347";
                                    }
                                    
                                });

                                // drafts 
                                const pstModx_DftBtn_a = document.querySelector('#pstModx_DftBtn_a');
                                const pstModx_DftBtn_b = document.querySelector('#pstModx_DftBtn_b<?php echo $log_id; ?>');
                                const pstModx_DftModBdy = document.querySelector('.pstModx_DftModBdy');
                                const pstModx_DftModCLX = document.querySelector('#pstModx_DftModCLX');
                                //
                                const pstModx_DftMod = `
                                <div class="pstModx_DftMod">
                                    <div class="pstModx_DftModHdr">
                                        <span>Drafts <span id="cntNum_<?php echo $log_id; ?>" class="cntNum_1">0</span></span>
                                        <i id="pstModx_DftModCLX" class="fR fa-solid fa-close" onclick="DftModCLX()"></i>
                                    </div>
                                    <div class="pstModx_DftModBdy"></div>
                                </div>
                                `; 
                                //
                                pstModx_DftBtn_a.addEventListener('click', function(event) {
                                    // opens draft module to #
                                    let pstModx_DftBtn_b = document.querySelector(`#pstModx_DftBtn_b<?php echo $log_id; ?>`);
                                    pstModx_DftBtn_b.classList.add("dB");
                                    pstModx_DftBtn_b.classList.remove("dN");
                                    pstModx_DftBtn_b.innerHTML = pstModx_DftMod;
                                    updateWordCount();
                                    // grab all drafts from database
                                    var ajax = ajaxObj("POST", `${m_path}prs/pst/drfMod_Lgc__x.php`, true);
                                    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    ajax.onreadystatechange = function() { 
                                        if(ajax.readyState == 4 && ajax.status == 200) { 
                                            var return_data = ajax.responseText; 
                                            if(return_data != ""){ 
                                                document.querySelector('.pstModx_DftModBdy').innerHTML = return_data;
                                                updatePostCount();
                                            } 
                                        } 
                                    } 
                                    ajax.send("uid="+uid+
                                                "&cde="+cde+
                                                "&type="+type+
                                                "&ncde="+ncde);
                                    
                                    
                                });
                                //
                                
                                
                            }
                        }
                    }
                    // success callback
                    if (type === "xz" && log_cde_x === log_cde_y) {
                        vPnlBdy.innerHTML = return_data;
                        // time delay auto close 
                        setTimeout(() => {
                            if (p_load === 'f') {
                                return vPnlMod_RESET();
                            } else if (p_load === 'm') { 
                                return pstModxCLX();
                            }
                        }, 3000);
                    }
                }
            } 
        } // 47:13
        cat.send("uid="+uid+
                    "&cde="+cde+
                    "&type="+type+
                    "&ncde="+ncde+
                    "&data="+data);

    } // else do nothing
}

// GLOBAL POST RECALL
function glbl_rply_tGl (opid,rpid,type,post,pge) {
    // opid = original comment
    // rpid = reply comment id
    //
    // non view page... 
    if (type === "xb") {
        var xLoad = document.getElementById("usrRplyThrd_b_"+opid);
        // opens reply area of type b comments
        var rArea = document.getElementById("rply_1_Area_"+opid).classList.toggle("dN");
    } else if (type === "b" || type === "c") {
        // opens reply area of type c comments
        var rArea = document.getElementById("rply_1_Area_"+rpid).classList.toggle("dN");
        // comment load out
        var rLoad = document.getElementById("replyThread__c1_rpc_"+rpid);
    }
    //
    if (opid != "" && rpid != "" && type != "" && pge != "") {
        // console.log(opid+" | "+rpid+" | "+type);
        var ajax = ajaxObj("POST", `${m_path}prs/pst/newPst_Lgc__x.php`, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    if (type === "b" || type === "c") {
                        rLoad.innerHTML = return_data;
                    } else if (type === "xb") {
                        xLoad.innerHTML = return_data;
                    } 
                    console.log(return_data);
                } else {
                    console.log(return_data);
                }
            } 
        } 
        ajax.send("opid="+opid+
                    "&rpid="+rpid+
                    "&type="+type+
                    "&post="+post+
                    "&pge="+pge);

    } // else do nothing
};


// GLOBAL post logic
// what is not needed for individual post is disregarded
function rplyGlbl (cid,aid1,aid2,aid3,type,post,pge) {
    //
    if (type == "a" || type == "b") {
        var rthrd_b_opx = document.getElementById("rthrd_b_opx_"+cid);
        // original post output to original thread type b
        var rthd_b_opt = document.getElementById("rthd_b_opt_"+cid);
        // post data entry
        var data = rthrd_b_opx.value;
    } if (type == "c") {
        var rthrd_c_opx = document.getElementById("rthrd_c_opx_"+cid);
        // original post output to original thread type b
        var rthd_c_opt = document.getElementById("replyThread__c1_rpc_"+cid);
        // post data entry
        var data = rthrd_c_opx.value;
    }
    
    // // developer only keep uncommented
    console.log("Vanilla Js: test grab | "+cid+" | "+aid1+" | "+aid2+" | "+aid3+" | "+type+" | "+data);

    if (cid != "" && aid1 != "" && aid2 != "" && aid3 != "" && type != "" && post != "" && data != "" && pge != "") {
        var ajax = ajaxObj("POST", `${m_path}prs/pst/newPst_Lgc__x.php`, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    // add append method IMPORTANT
                    if (type == "a" || type == "b") {
                        rthd_b_opt.innerHTML = return_data + rthd_b_opt.innerHTML;
                        rthrd_b_opx.innerHTML.value = "";
                    } if (type == "c") {
                        rthd_c_opt.innerHTML = return_data + rthd_c_opt.innerHTML;
                        rthrd_c_opx.innerHTML.value = "";
                        // rnr / reply num rows does not send beyond JS
                        var msgCnt = document.getElementById("msgCnt__c_"+cid);
                        msgCnt.innerHTML = Number(msgCnt.innerText) + 1;
                        // console.log(msgCnt.innerText); 
                    }
                    console.log(return_data);
                } else {
                    console.log(return_data);
                }  
            } 
        } 
        ajax.send("cid="+cid+
                    "&aid1="+aid1+
                    "&aid2="+aid2+
                    "&aid3="+aid3+
                    "&type="+type+
                    "&post="+post+
                    "&data="+data+
                    "&pge="+pge);

    } // else do nothing
    
};



//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
//\\ Global setting preset for a,b,c, of user, user_podt, blog, forum, goal... \\//\\//\\//
//\\ global set for all users \\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
//\\ Empty presets //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
function post_mNu_tGl(post,type,cid,pge) {
    var mNuDrp_all = document.querySelectorAll(".dDm_pst");
    var mNuDrp_unq = document.getElementById("post_mNu_id_"+cid);
    //
    if (mNuDrp_unq == mNuDrp_unq) {
        mNuDrp_unq.classList.toggle("dN");
    } else if (mNuDrp_unq != mNuDrp_unqd) {
        mNuDrp_all.classList.add("dN");
    }
    //
    if (post != "" && type != "" && cid != "" && pge != "") {
        var ajax = ajaxObj("POST", `${m_path}prs/pst/pstVw__glbl__Set.php`);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText;
                if(return_data != ""){ 
                    mNuDrp_unq.innerHTML = return_data;
                }
            } 
        } 
        ajax.send("post="+post+
                    "&type="+type+
                    "&cid="+cid+
                    "&pge="+pge);
    }
};

</script>