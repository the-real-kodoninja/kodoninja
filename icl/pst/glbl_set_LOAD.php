<?php
$gLbl_uvt_bStl_1 = 'style="border-color: #000;"';
$gLbl_uvt_bStl_2 = 'style="border-color: darkred;"';
$btnVt_clr1 = $gLbl_uvt_bStl_1;
$btnVt_clr2 = $gLbl_uvt_bStl_1;
$cnt_hide_Res = false;
$cnt_delete_Res = false;
?>
<script>
// GLOBAL v panel module holds all logic 
function vPnlMod() {
    // make global resets after e/ custom module
    // unchanged
    const vPnlBck = document.querySelector(".vPnlBck"); 
    const vPnlCtr = document.querySelector(".vPnlCtr");
    const vPnlWpr = document.querySelector(".vPnlWpr");
    const vPnlHdr = document.querySelector(".vPnlHdr");
    const vPnlUsr_hdr = document.querySelector(".vPnlUsr_hdr");
    const vPnlBdy = document.querySelector(".vPnlBdy");
    const vPnlMain = document.querySelector(".vPnlMain");
    const vPnlFtr = document.querySelector(".vPnlFtr");
    vPnlCtr.classList.toggle("dN");
    vPnlBck.classList.toggle("dN");
    // vPnlWpr.style.cssText = `
    //     height: 275px;
    // `;
};
// return after each custom mod load out
function vPnlMod_RESET() {
    document.querySelector(".vPnlCtr").classList.toggle("dN");
    document.querySelector(".vPnlBck").classList.toggle("dN");
    // document.querySelector(".vPnlBck").innerHTML = ""; 
    // document.querySelector(".vPnlCtr").innerHTML = "";
    // document.querySelector(".vPnlWpr").innerHTML = "";
    document.querySelector("#vPnlHdr").innerHTML = "";
    document.querySelector(".vPnlUsr_hdr").innerHTML = "";
    document.querySelector(".vPnlBdy").innerHTML = "";
    document.querySelector(".vPnlMain").innerHTML = "";
    document.querySelector(".vPnlFtr").innerHTML = "";

    document.querySelector("#vPnlHdr").classList.add("vPnlHdr");
    // document.querySelector(".vPnlHdr").style.cssText = `
    //     padding: 10px;
    //     border-bottom: 1px solid #ccc;
    //     background-color: #3d4347;
    //     color: #fff;
    //     border-radius: 6px 6px 0px 0px;
    // `;
    document.querySelector(".vPnlBck").style.cssText = `
        background-color: rgba(0,0,0,0.4);
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
    `;
    document.querySelector(".vPnlCtr").style.cssText = `
        background-color: #fff;
        margin: 80px auto 0px;
        width: 600px;
        height: 200px;
        z-index: 4;
        border-radius: 6px;
    `;
    document.querySelector(".vPnlWpr").style.cssText = `
        margin: 80px auto 0px;
        height: auto;
        width: 600px;
    `;
    document.querySelector(".vPnlBdy").style.cssText = `
        color: #333;
    `;
    document.querySelector(".vPnlMain").style.cssText = `
        padding: 0px;
    `;
    document.querySelector(".vPnlUsr_hdr").style.cssText = `
        height: 0px; 
        padding: 0px;
    `;
    document.querySelector(".vPnlFtr").style.cssText = `
        bottom: 0;
    `;
};
</script>