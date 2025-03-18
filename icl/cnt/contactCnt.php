<?php
$msgArea = '
<div class="cntMsgArea">
    <div id="">
        <div class="cntMsgHdr">
            '.$cseStatIcn.'
            <span>Message Center</span>
            <button id="cntBck_1" class="cntBck dN">back</button>
        </div>
        <div class="bckWht">
            '.$cntLgc_li.'
            '.$cntMsgCase_2.'
        </div>
    </div>
</div>
';

$mnBdy = '
<div class="cntBdyWpr">
    <div class="cntBdyInr">
        <div class="cntHdr">
            If the help page wasn’t satisfactory or if you have any other inquiry feel free to submit a case in the message area below. Any other cases can be looked up by case number
            <p>
                Any information regarding follow-gate can be sent to <a href="mailto:info@kodoninja.com">info@kodoninja.com</a> as well as any other information and questions regarding the platform.
            </p>
        </div>
        '.$nonUsrWel.'
        '.$msgArea.'
        '.$cntPnl.'
        <p>
            You can email us at <a href="mailto:info@kodoninja.com">info@kodoninja.com</a> for any concerns
        </p>
    </div>
</div>
';

if ($p_load == 'm') {
    $mnBdy = '
    <div class="cntBdyWpr">
        <div class="cntBdyInr">
            <div class="cntHdr">
                If the help page wasn’t satisfactory or if you have any other inquiry feel free to submit a case in the message area below. Any other cases can be looked up by case number
                <p>
                    Any information regarding follow-gate can be sent to <a href="mailto:info@kodoninja.com">info@kodoninja.com</a> as well as any other information and questions regarding the platform.
                </p>
            </div>
            '.$cntPnl.'
            &nbsp;
            '.$nonUsrWel.'
            '.$msgArea.'
            <p>
                You can email us at <a href="mailto:info@kodoninja.com">info@kodoninja.com</a> for any concerns
            </p>
        </div>
    </div>
    ';
}

$contactBdy_Full = "$mnBdy";
?>
<style>
    /* please mod all */
.cntBdyWpr {
    margin: 65px auto 29px;
    width: 1000px;
}
/* left logic */
.cntMsgArea {
    width: 645px;
    margin: 0px auto;
    display: inline-block;
}

.cntMsgHdr span:nth-child(2) {
    margin: 0px 0px 0px 22px;
}

.cntMsgHdr, #cntMsgTXT, .cntMsgUsr_A, .cntMsgUsr_B, .cntMsgFtr {
    padding: 10px;
}

.cntLgc_li li {
    padding: 15px 10px;
}

.cntUsrWpr_1a img {
    float: left;
    margin: -9px 9px 0px 0px;
}

.cntUsrWpr_1a img, img.cntMSgUsrImg {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    border: 1px solid #ccc;
}

.cntMsgCtr_A img.cntMSgUsrImg {
    margin: 9px 0px 0px 0px;
}

.cntMsgCtr_B img.cntMSgUsrImg {
    margin: 6px 0px 0px 8px;
}

.clr-r {
    color: darkred;
}

.cntMsgCtr_A .cntMsgUsrStat, .cntMsgCtr_B .cntMsgUsrStat {
    font-size: 13px;
}

.cntMsgCtr_A .cntMsgUsrStat {
    margin: 8px 7px 0px 0px;
    float: left;
}

.cntMsgCtr_B .cntMsgUsrStat {
    margin: 8px 0px 0px 0px;
    float: right;
}

.cntMsgUsrStat a {
    display: block;
    max-width: 58px;
    overflow: hidden;
    height: 18px;
}

/* *********************************** */
.cntMsgCase_2 {
    height: auto;
}

#cntMsgTXT {
    bottom: 0;
}

.cntMsgWpr {
    height: 502px;
    overflow-y: scroll;
    overflow-x: hidden;
}

.cntMsgUsr_A, .cntMsgUsr_B {
    width: 455px;
    margin: 10px auto 10px 0px;
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
}

.cntMsgUsr_A {
    float: right;
    border-left: 1px solid #ccc;
    border-radius: 25px 0px 0px 25px;
}

.cntMsgUsr_B {
    float: left;
    border-right: 1px solid #ccc;
    border-radius: 0px 25px 25px 0px;
}

.cntMsgFtr {
    background-color: #3d4347;
    color: #fff;
    height: 18px;
}

.cntSubm, .cntBck {
    float: right;
    padding: 4px 10px;
    margin: -4px 0px 0px 0px;
}

.bckWht, .cntSubm, .cntBck {
    background-color: #ffff;
    border-radius: 3px;
    border: 1px solid #ccc;
}

.nonUsrPnl_1 {
    margin: 0px 0px 20px;
    padding: 20px;
}

.cntMsgCtr_A, .cntMsgCtr_B {
    width: 605px;
}

.cntMsgCtr_A {
    float: right;
}

.cntMsgCtr_B {
    float: left;
}

.cseOpen, .cseInProcess, .cseClosed {
    display: inline-block;
    width: 15px;
    height: 15px;
    position: absolute;
    border-radius: 50%;
    border: 1px solid #ccc;
    margin: 1px 0px 0px 0px;
}

.cseOpen {
    background-color: darkgreen;
}

.cseInProcess {
    background-color: #f9f905;
}

.cseClosed {
    background-color: darkred;
}

input[type="text"]#nonUsrCseInp {
    margin: 0px;
    padding: 18px 15px;
}

#nonUsrCseOpt {
    border: none;
    background-color: transparent;
    padding: 18px 15px;
    color: darkred;
    display: inline-block;
    width: auto;
    margin: 0px;
}

/* right logic */
.cntMsgHdr {
    border-radius: 6px 6px 0px 0px;
}

.cntPnlInr { 
    border-radius: 6px;
}

.cntMsgHdr, .cntPnlInr {
    border: 1px solid #ccc;
}

.cntLiSel, .cntMsgHdr {
    background-color: #e1e1e1;
}

.cntMsgHdr, .cntPnlInr, .bckWht {
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
}

.cntPnlInr, .bckWht {
    background-color: #fff;
}

.cntPnlWpr {
    width: 330px;
    margin: 0px 0px 20px;
}

.cntPnlInr {
    
}

#cntNewCseBtn {
    background-color: #C2B280;
    color: #333;
    margin: 0px 0px 10px;
}

#cntNonUsrBtn_1, #cntNonUsrBtn_2:hover {
    background-color: #3d4347;
    color: #fff;
}

#cntNewCseBtn, #cntNonUsrBtn_1, #cntNonUsrBtn_2 {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    font-weight: 600;
    
    border: 1px solid #ccc;
    margin: 0px 0px 10px;
}

#cntNewCseBtn:hover, #cntNonUsrBtn_1:hover, #cntNonUsrBtn_2 {
    background-color: darkred;
    color: #fff;
}

.cntHdr {
    margin: 0px 0px 15px;
}

ul.cntCaseLog, .cntLgc_li ul {
    margin: 0px;
    padding: 0px;
    list-style: none;
}

ul.cntCaseLog li, .cntLgc_li ul li {
    cursor: pointer;
}

ul.cntCaseLog li {
    border-bottom: 1px solid #ccc;
    padding: 10px;
}

.cntMsgUsr_A {
    background-color: #e6c9c9;
}

ul.cntCaseLog li:hover, .cntLgc_li ul li:hover, .cntMsgUsr_B, .cntSubm:hover, .cntBck:hover {
    background-color: #f1f1f1;
}
</style>
<style>
.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 300px;
  background-color: black;
  color: #fff;
  text-align: left;
  border-radius: 6px;
  padding: 10px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

.tooltiptext li {
  margin: 0px 0px 0px 18px;
  font-size: 12px;
}
.schDrp-Rsl {
    margin: 0px;
}
</style>