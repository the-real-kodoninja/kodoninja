<?php
if ($p_load == 'f') {
$blg_Rslt = '
    <h6 id="blg_Rslt_1">Showing Everything</h6>
    <div id="blg_Rslt_2" class="w100">
        <span id="tst_1">
            '.$mod1.''.$mod2.'
        </span>
        <span id="tst_2"></span>
    </div>
    ';

} else if ($p_load == 'm') {
    $blg_Rslt = '
    <div id="blg_Rslt_2" class="w100">
        <h6 id="blg_Rslt_1" class="pad-T">Showing Everything</h6>
        <span id="tst_1">
            '.$mod1.''.$mod2.'
        </span>
        <span id="tst_2"></span>
    </div>
    ';
}

$mHdr_Wpr = '
<div class="mHdr-Wpr">
    '.$mHdrInf.'
    <span class="tglImgX">'.$tglImg.'</span>
    <div class="mHdr-Ovly pa"></div>
</div>
';
$blgBdy_Full = "$mHdr_Wpr $fltrModX $blg_Rslt";
?>