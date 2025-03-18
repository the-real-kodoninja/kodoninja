<style>
    .usr_Pst-Bdy iframe {
        width: 100%;
        padding 0px
    }
    
    .usr_Pst-Bdy iframe div {
        padding: 0;
    }
</style>

<script>
// dark mode
function drkMde() {
    const divs1 = document.querySelectorAll(".usrConts");
    const divs2 = document.querySelectorAll(".mFr_Pnl");
    const divs3 = document.querySelectorAll(".Cnt_Bck");
    const clr_a1 = document.querySelectorAll("a");
    const clr_a2 = document.querySelectorAll(".clr-r");
    const imgs1 = document.querySelectorAll(".nmeRSV_inp span");
    const glPgBr_1 = document.querySelectorAll(".glPgBr_1");
    //
    document.querySelector('body').style.cssText = `
        background-color: #0d0d0d;
        color: #b4b4b4;
    `;
    document.querySelector('.usrConts-Wpr img').style.cssText = `
        border: none;
    `;
    document.querySelector('.nmeRSV').style.cssText = `
        background-color: #181818;
        border: 1px solid #2f2f2f;
        color: #b4b4b4;
        box-shadow: 2px 2px rgba(34, 34, 34, 0.2);
    `;
    document.querySelector('.nmeRSV_inp').style.cssText = `
        background-color: #a2a2a2;
        border: 1px solid #2d2d2d;
    `;
    // Loop through the NodeList and access each div
    for (const div1 of divs1) {
        // Do something with each div, like changing its style or content
        div1.style.cssText = `
            background-color: #181818;
            border: 1px solid #2f2f2f;
            width: 100%;
        `;
    } for (const div2 of divs2) {
        // Do something with each div, like changing its style or content
        div2.style.cssText = `
            background-color: #181818;
            border: 1px solid #2f2f2f;
        `;
    } for (const div3 of divs3) {
        // Do something with each div, like changing its style or content
        div3.style.cssText = `
            background-color: #181818;
            border: 1px solid #2f2f2f;
        `;
    } for (const clra1 of clr_a1) {
        // Do something with each div, like changing its style or content
        clra1.style.cssText = `
            color: #ff7373;
        `;
    } for (const clra2 of clr_a2) {
        // Do something with each div, like changing its style or content
        clra2.style.cssText = `
            color: #ff7373;
        `;
    } for (const img1 of imgs1) {
        // Do something with each div, like changing its style or content
        img1.style.cssText = `
            border: none;
        `;
    } for (const glPgBr1 of glPgBr_1) {
        // Do something with each div, like changing its style or content
        glPgBr1.style.cssText = `
            background-color: #8c8c8c;
            border: 1px solid #797979;
            color: #333;
        `;
    }

}
// light mode
function lgtMde() {
}
// light and dark mode module
window.addEventListener('load', function () {
    let mode,v_mode_opt;
    if (mode !== "__lgt__" || mode !== "__drk__") {
        mode = 'none';
        v_mode_opt = 'v_mode_lkup';
    } 
    // get l or d from view mode v_mode.php
    var ajax = ajaxObj("POST", `${m_path}prs/vmd_Lgc__x.php`);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            console.log(return_data);
            if (return_data.includes('__light__')) {
                return lgtMde();
            } if (return_data.includes('__dark__')) {
                return drkMde();
            }
        } 
    } 
    
    ajax.send("mdeType="+mode+"&v_mode_opt="+v_mode_opt);
    
});

function v_mode(mode) {
    let v_mode_opt;
    if (mode === "__lgt__" || mode === "__drk__") {
        v_mode_opt = 'v_mode_lchg';
    }
    function refreshPage() {
        window.location.reload();
    }
    // get l or d from view mode v_mode.php
    var ajax = ajaxObj("POST", `${m_path}prs/vmd_Lgc__x.php`);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if (return_data.includes('__light__')) {
                return lgtMde();
            } if (return_data.includes('__dark__')) {
                return drkMde();
            }
        } 
        return refreshPage();
    } 
    
    ajax.send("mdeType="+mode+"&v_mode_opt="+v_mode_opt);
    
};
// global redirect
//
//
var p__load = `<?php echo $p_load; ?>`;
if (p__load === 'f') {
    window.addEventListener('load', function() {
        checkWidthAndRedirect();
    });

    window.addEventListener('resize', checkWidthAndRedirect);

    function checkWidthAndRedirect() {
        const mobileBreakPoint = 768; // Adjust this as needed

        if (window.innerWidth <= mobileBreakPoint) {
            var hmexchk = `<?php echo $page; ?>`;
            var pgemGO = `${hmexchk}.php`;
            const urlFULL = window.location.href;
            const url = new URLSearchParams(window.location.search);
            if (hmexchk === 'home' || urlFULL == 'https://www.kodoninja.com/index.php' || urlFULL == 'https://www.kodoninja.com/' || urlFULL == 'kodoninja.com') {
                var pgemGO = `index.php`;
            } 
            //
            var h__pth = `https://www.kodoninja.com/m/${pgemGO}`;
            //
            if (hmexchk === 'view') {
                const t_val = url.get('t');
                const v_val = url.get('v');
                var h__pth = `https://www.kodoninja.com/m/${pgemGO}?t=${t_val}&v=${v_val}`;
            } 
            //
            if (hmexchk === 'user') {
                const u_val = url.get('u');
                var h__pth = `https://www.kodoninja.com/m/${pgemGO}?u=${u_val}`;
            }
            window.location.href = `${h__pth}`; // Replace with your mobile URL
        }
    }
}
//
if (p__load === 'm') {
    document.addEventListener('DOMContentLoaded', () => {

  'use strict';

  let previousScrollTop = 0;
  const navbar = document.querySelector('.header-Wpr');

  window.addEventListener('scroll', () => {
    const currentScrollTop = window.pageYOffset;
    const navbarHeight = navbar.offsetHeight;
    const mNu_m_y1F = document.querySelector('#mNu_m_y1');

    if (previousScrollTop < currentScrollTop && currentScrollTop > navbarHeight * 2) {
      navbar.classList.add('scrollUp');
      mNu_m_y1F.classList.add('scrollUp');
    } else if (previousScrollTop > currentScrollTop && currentScrollTop > navbarHeight) {
      navbar.classList.remove('scrollUp');
      mNu_m_y1F.classList.remove('scrollUp');
    }

    previousScrollTop = currentScrollTop;

    console.log(currentScrollTop);
  });

});
} 

// global toggle
// function upTglxx(xid) {
//     console.log(xid);
//     document.querySelector("#"+xid).classList.toggle("dN");
// } 

//

// function sbm_UPD() {
//     const fileInput = document.getElementById("sbm_TIP_i4");
//     const fileList = document.getElementById("fileList");
//     const progressBar = document.getElementById("progressBar");

//   const files = event.target.files;

//   let fileListHTML = "";
//   for (let i = 0; i < files.length; i++) {
//     const file = files[i];
//     fileListHTML += `<li>${file.name}</li>`;
//   }

//   fileList.innerHTML = fileListHTML;

//   // Simulate upload progress
//   let progress = 0;
//   let intervalId = setInterval(() => {
//     progressBar.style.cssText = `display: block;`;
//     progress += 10;
//     progressBar.value = progress;

//     if (progress >= 100) {
//       clearInterval(intervalId);
//       progressBar.value = 0; // Reset for next upload
//       progressBar.style.cssText = `display: none;`;
//     }
//   }, 500); // Update progress every 500 milliseconds
// };


// checkbox submission logic
function sbm_TIP_TGL() {
    // Check if it's checked
    const sbm_CHK1 = document.querySelector("#sbm_CHK1");
    const sbm_TIP_i1 = document.querySelector("#sbm_TIP_i1");
    const sbm_TIP_i2 = document.querySelector("#sbm_TIP_i2");
    const sbm_TIP_i3 = document.querySelector("#sbm_TIP_i3");
    const sbm_TIP_BdyTxtInr = document.querySelector("#sbm_TIP_BdyTxtInr");
    if (sbm_CHK1.checked) {
        sbm_TIP_i1.disabled = true;
        sbm_TIP_i2.disabled = true;
        sbm_TIP_i3.disabled = true;
        sbm_TIP_i1.style.cssText = `background: rgba(255,255,255,0.1);border: rgba(255,255,255,0.1);color: beige;`;
        sbm_TIP_i2.style.cssText = `background: rgba(255,255,255,0.1);border: rgba(255,255,255,0.1);color: beige;`;
        sbm_TIP_i3.style.cssText = `background: rgba(255,255,255,0.1);border: rgba(255,255,255,0.1);color: beige;`;
    } else {
        sbm_TIP_i1.disabled = false;
        sbm_TIP_i2.disabled = false;
        sbm_TIP_i3.disabled = false;
        sbm_TIP_i1.style.cssText = `background: rgba(255,255,255,10);border: #ccc;color: #333;`;
        sbm_TIP_i2.style.cssText = `background: rgba(255,255,255,10);border: #ccc;color: #333;`;
        sbm_TIP_i3.style.cssText = `background: rgba(255,255,255,10);border: #ccc;color: #333;`;
    }
}
// 
function sbm_TIP_BTN(snmTyp) {
    const sbm_CHK1 = document.querySelector("#sbm_CHK1");
    const sbm_TIP_i1 = document.querySelector("#sbm_TIP_i1");
    const sbm_TIP_i2 = document.querySelector("#sbm_TIP_i2");
    const sbm_TIP_i3 = document.querySelector("#sbm_TIP_i3");
    const sbm_TIP_i4 = document.querySelector("#sbm_TIP_i4");
    const sbm_TIP_i5 = document.querySelector("#sbm_TIP_i5");
    const sbm_TIP_BdyTxtInr = document.querySelector("#sbm_TIP_BdyTxtInr");
    if (sbm_CHK1.checked) {
        var sbm_data_1a = 'true';
        var sbm_data_1b = 'NULL';
        var sbm_data_2b = 'NULL';
        var sbm_data_3b = 'NULL';
        
    } else {
        var sbm_data_1a = 'false';
        var sbm_data_1b = sbm_TIP_i1.value;
        var sbm_data_2b = sbm_TIP_i2.value;
        var sbm_data_3b = sbm_TIP_i3.value;
    }
    //
    // if (sbm_TIP_i4) { // files uploaded
    //     //
    //     var files = sbm_TIP_i4.files;
    //     if (files.length > 0) {
    //         const formData = new FormData();

    //         for (let i = 0; i < files.length; i++) {
    //             formData.append("files[]", files[i]); // Append multiple files
    //         }
    //         var sbm_data_4b = 'TRUE';

    //         fetch(`${m_path}prs/pst/sbm_TIP_Lgc__x.php`, {
    //             method: "POST",
    //             body: formData
    //         }).then(response => response.text()).then(responseText => {
    //             // Handle server response (e.g., display success message)
    //             console.log("Server response:", responseText);
    //         }).catch(error => {
    //             console.error("Error:", error);
    //         });
    //     } 
        
    // } else {
        var sbm_data_4b = 'NULL';
    // }
    //
    if (sbm_TIP_i5) { // refrences
        var sbm_data_5b = sbm_TIP_i5.value;
    } else {
        var sbm_data_5b = 'NULL';
    }
    var sbm_data_1c = sbm_TIP_BdyTxtInr.textContent;
    //
    // send to database
    var ajax = ajaxObj("POST", `${m_path}prs/pst/sbm_TIP_Lgc__x.php`, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                document.querySelector(".sbm_TIP-Inr").innerHTML = return_data;
            } 
        } 
    } 
    ajax.send(`sbm_data_1a="${sbm_data_1a}"&sbm_data_1b="${sbm_data_1b}"&sbm_data_2b="${sbm_data_2b}"&sbm_data_3b="${sbm_data_3b}"&sbm_data_4b="${sbm_data_4b}"&sbm_data_5b="${sbm_data_5b}"&sbm_data_1c="${sbm_data_1c}"&snmTyp="${snmTyp}`);
    //
}

// close button for tip submission
function sbm_TIP_CLX() {
    document.querySelector(".sbm_TIP").innerHTML = '';
    document.querySelector(".sbm_TIP").style.cssText = `display: none;`;
}
// open button for tip submission
function sbm_TIP_OPN() {

    var sbm_FILE = `
    <p>
        <label for="sbm_TIP_i4" id="sbm_lbl_1">
            <input type="file" id="sbm_TIP_i4" multiple onchange="sbm_UPD()">Upload photos, screenshots, audio recordings, videos etc.
        </label>
        <div><progress id="progressBar" value="0" max="100"></progress></div>
        <div id="fileList"></div>
    </p>
    `;

    if (p__load === 'f') {
        var sbm_inf = `
        <table>
            <tr>
                <td><input type="text" id="sbm_TIP_i1" placeholder="name"/></td>
                <td><input type="tel" id="sbm_TIP_i2" placeholder="phone number"/></td>
                <td><input type="text" id="sbm_TIP_i3" placeholder="email"/></td>
            </tr>
        </table>
        `;
    } if (p__load === 'm') {
        var sbm_inf = `
        <div class="sbm_inf">
            <div><input type="text" id="sbm_TIP_i1" placeholder="name"/></div>
            <div><input type="tel" id="sbm_TIP_i2" placeholder="phone number"/></div>
            <div><input type="text" id="sbm_TIP_i3" placeholder="email"/></div>
        </div>
        `;
    }

    sbm__ref = `
    <p><input type="text" id="sbm_TIP_i5" placeholder="reference (*Where did you hear about this or who gets credit as well)"/>
    </p>
    `;

    document.querySelector(".sbm_TIP").innerHTML = `
    <div class="sbm_TIP-Inr">
        <h3>Submit a tip</h3>
        <i class="fL pA fa-solid fa-close dI" onclick="sbm_TIP_CLX()"></i>
        <div>If you have any information regarding follow gate please submit below. Quality information will receive a <a href="${m_path}blog/img/41/Reward_Payout_sheet-v1.00.pdf" target="_blank" style="color: #fff; text-decoration: underline;">$100 to $1,000,000.00 reward</a>. pending settlement. Rewards are for non anonymous submissions</div>
        <p>
            ${sbm_inf}
            <p>
                <input type="checkbox" id="sbm_CHK1" name="sbm_CHK1" value="no" onclick="sbm_TIP_TGL()">
                <label for="sbm_CHK1">I\'d like to remain anonymous:</label>
            </p>
            
            <div class="sbm_TIP_BdyTxtInr" id="sbm_TIP_BdyTxtInr" contenteditable="true" spellcheck="true" placeholder="Please write any names, numbers, URLs, apps, methods, dates in anything pertaining to follow gate here."></div>
        </p>
        <button onclick="sbm_TIP_BTN('${p__load}')">Send Tip!</button>
    </div>
    `;
    document.querySelector(".sbm_TIP").style.cssText = `display: block;`;
}
// </script><?php
// function isMobileDevice() {
//     $userAgent = $_SERVER['HTTP_USER_AGENT'];
//     return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $userAgent);
// }
// if (isMobileDevice()) {
//     $fullUrl = $_SERVER['REQUEST_URI'];
//     $urlParts = parse_url($fullUrl);
//     $urlGRAB = ''.$urlParts['path'].''.$urlParts['query'].'';
//     header('Location: https://www.kodoninja.com/m/'.$urlGRAB.'');  // Replace with your mobile URL
//     exit();
// }

$unq__flwgate = '
<p>
I want your knowledge on 3 major things:
<ol>
    <li>What transpired at work originating at Eaton Corporation, that followed me to every place of employment, to Maryland</li>
    <li>The illegal cybersecurity, broadcasting and recording of myself, bugging, wiretapping, tracking of my vehicle, and my equipment</li>
    <li>The shows infinite amounts of federal felonies, theft, harassment, slander, and deformation.</li>
</ol>
<p>
<ul class="ul-glbl-idx"> 
    <li>
        <span class="clr-r cP" onclick="upTglx(\'__1x\',\'__1x\')">download media instructions & locations</span>
        <ul id="__1x__1x" class="dN">
            <li class="cP"><a href="https://docs.google.com/document/d/1VG7YaDsb1DudbSumXkGeYgw5wydLbV68/edit?usp=drive_link&ouid=102884315311157215687&rtpof=true&sd=true" target"_blank" rel="noopener noreferrer">Instructions for media</a></li>
            <li class="cP" onclick="upTglx(\'__1x\',\'__2x\')">location sheets by state</li>
            <ul id="__1x__2x" class="dN">
                <li><a href="https://docs.google.com/spreadsheets/d/1GzgS8NwseMaM7r1xXF3dvbdmXTDche9ifKlNIRa9ykI/edit?usp=drive_link" target"_blank" rel="noopener noreferrer">California</a></li>
                <li><a href="https://docs.google.com/spreadsheets/d/1VmNxwDaYsabEG9Yx9-u2NiQ9GoIFGGeBOBFg_m1KHew/edit?usp=drive_link" target"_blank" rel="noopener noreferrer">Nevada</a></li>
                <li><a href="https://docs.google.com/spreadsheets/d/1OaOnKqKr2IW6IHsEeYtoyGsQoS1PftTL7wTK2frlpkc/edit?usp=drive_link" target"_blank" rel="noopener noreferrer">Washington</a></li>
                <li><a href="https://docs.google.com/spreadsheets/d/19fYbq4JyDgzeeNQvvC_3n51L44xH2EgObNClMiMQWmU/edit?usp=drive_link" target"_blank" rel="noopener noreferrer">Maryland</a></li>
            </ul>
        </ul>
    </li>
    <li class="clr-r cP" onclick="sbm_TIP_OPN()">
        submit a tip to get a $100 - $1,000,000.00 reward
    </li>
    <li>
        <a href="'.$m_path.'blog/img/41/Reward_Payout_sheet-v1.00.pdf" target="_blank">See reward payout sheet</a>
    </li>
</ul>
<p>Updated Polygraph to be tested Aug,2024 <a href="https://docs.google.com/document/d/e/2PACX-1vRWEmLxM0WgLnYCUP0xIjmvSu7-Caeu9JIYOowAfS-Cxr-JHV_bgI5Ek-JHneSiYe1yXYX9icD-VW16/pub" target="_blank" style="color: darkred;">150 Polygraph questions 3 company lawsuit (Eaton, Pepsi, Charlies Produce) Aug,2024</a> results will be posted ASAP upon completion.</p>

<p>Former Polygraph to be made into Texas testing <a href="https://docs.google.com/document/d/1Z_P47UWNIojhn2rPu89ws7p8bBMC-WUy-guIK5Ch5W0/edit?usp=sharing" target="_blank" style="color: darkred;">400+ question polygraph test testing soon</a></p>
<p>
    You can send any other information to <a href="mailto:info@kodoninja.com">info@kodoninja.com</a>
</p>
';


$sbm_TIP = '<div class="sbm_TIP"></div>'; 

// URL pull to find kodoverse
if ($kvse = "kodoninja") {
    $url_lcl = '';
} if ($kvse === "kodostore") {
    $url_lcl = '../kodoninja';
}


// max root for web f, mobile
include_once("css/TEMP_cache_css.php"); // unique
include_once("".$m_path."icl/err/err_tkn.php");
include_once("".$m_path."icl/cnnc_t.php");
include_once("".$m_path."icl/addons/nmedply.php");
include_once("".$m_path."icl/addons/baseext.php");
include_once("".$m_path."icl/kodocrypt_vx.php");
// include_once("".$m_path."icl/addons/python.php");
include_once("".$m_path."icl/c_sts.php");
include_once("".$m_path."icl/idx/social_media_subscribe.php");
include_once("".$m_path."icl/addons/hashtag.php");
include_once("".$m_path."icl/u_rgts.php");
include_once("".$m_path."icl/pst/glbl_set_LOAD.php");
include_once("".$m_path."icl/glbl/usr-cnct_LOAD_mod.php");
include_once("".$m_path."prs/time_system.php");
include_once("".$m_path."icl/nws/mNwsLgc.php");

if ($page === "3g9") {
    include_once("".$m_path."icl/3g9/3g9Cnt.php");
} if ($page === "error") {
    include_once("".$m_path."icl/err/errCnt.php");
} if ($page === "success") {
    include_once("".$m_path."icl/suc/sucCnt.php");
} if ($page === "help") {
    include_once("".$m_path."icl/help/helpCnt.php");
} if ($page === "contact") {
    include_once("".$m_path."icl/cnt/contactLgc.php");
    include_once("".$m_path."icl/cnt/contactCnt.php");
} if ($page === "membership") {
    include_once("".$m_path."icl/mem/mem_Lgc.php");
    include_once("".$m_path."icl/usr/usrLvl_lgc.php");
} if ($page === "kodospace") { // current waitlist
    include_once("".$m_path."icl/wtl/waitlist_Cnt.php");
} if ($page === "user" || $page === "settings") {
    include_once("".$m_path."icl/usr/usrLgc.php");
    include_once("".$m_path."icl/usr/usrLvl_lgc.php");
    include_once("".$m_path."icl/usr/usrCnt.php");
    if ($page === "settings") {
        include_once("".$m_path."icl/set/setLgc.php");
        include_once("".$m_path."icl/set/setPnlLft.php");
        include_once("".$m_path."icl/set/setCnt.php");
    } 
} if ($page === "home" || $page === "blog" || $page === "view" || $page === "forum" || $page === "goal" || $page === "search" || $page === "post" || $page === "info" || $page === "category") {
    if ($page === "home" || $page === "blog" || $page === "view") {
        include_once("".$m_path."icl/idx/social_media_subscribe.php");
    } if ($page === "blog" || $page === "view" || $page === "forum" || $page === "goal" || $page === "post" || $page === "category") {
        // include_once("icl/cat_pge.php");
        include_once("".$m_path."icl/social_js.php");
    } if ($page === "blog") {
        include_once("".$m_path."icl/blog/schFltr_dwn.php");
        include_once("".$m_path."icl/blog/blg_idx-1.php");
        include_once("".$m_path."icl/blog/blg_idx-2.php");
        include_once("".$m_path."icl/blog/blg_cVrImg.php");
        include_once("".$m_path."icl/blog/blgCnt.php");
    } if ($page === "home" || $page === "forum" || $page === "goal" || $page === "view" || $page === "search" || $page === "post" || $page === "info" || $page === "category") {
        include_once("".$m_path."icl/pge_Extras.php");
    } if ($page === "home") {
        include_once("".$m_path."icl/idx/idxLgc.php");
        include_once("".$m_path."icl/idx/idxCnt.php");
    } if ($page === "forum") {
        include_once("".$m_path."icl/glbl/frm-pst_LOAD_view.php");
        include_once("".$m_path."icl/frm/frmCnt.php");
    } if ($page === "goal") {
        include("".$m_path."icl/glbl/gol-pst_LOAD_view.php");
        include_once("".$m_path."icl/goal/goalCnt.php");
    } if ($page === "view") {
        include_once("".$m_path."icl/view/viewLgc.php");
        include_once("".$m_path."icl/glbl/glbl_Sclshare.php");
        include_once("".$m_path."icl/view/viewCnt.php");
    } if ($page === "search") {
        include_once("".$m_path."icl/sch/schLgc.php");
        include_once("".$m_path."icl/sch/schCnt.php");
    } if ($page === "post") {
        include_once("".$m_path."icl/pst/postLgc.php");  
        include_once("".$m_path."icl/pst/wysiwyg_v1.php");  
        include_once("".$m_path."icl/pst/postCnt.php");  
    } if ($page === "info") {
        include_once("".$m_path."icl/inf/infoCnt.php");
    } if ($page === "category") {
        include_once("".$m_path."icl/cat/catLgc.php");
        include_once("".$m_path."icl/cat/catCnt.php");
    }
} if ($page === "downloads") {
    include_once("".$m_path."icl/dwnld/schFltr_dwn.php");
    include_once("".$m_path."icl/dwnld/d_ld1.php");
}
?>
<script>
</script>