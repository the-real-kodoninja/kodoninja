<?php
$gl_Wpr = "";

$mainVw = '
<div class="frm_main db">
    <div class="main_Wpr">
        <div class="pge-table dI">
            <ul class="usrNav0-Wpr">
                <li id="usrCNT_1x">Everything</li>
                <div class="pad-T fR dI ">
                    <span>'.$count_gc.'</span>
                </div>
            </ul>
            <div class="bck_wht">
                '.$output_vc.'
            </div>
        </div>
        <div class="rgt-lgc fr">
            '.$pge_Rpanel.'
        </div>
        '.$Trnd_Ftr.'
    </div>
</div>
';


if ($p_load == 'f') {

    $mainVwX = $mainVw;

} else if ($p_load == 'm') {
    $hDr_mNu2 = '
    <div class="blogNav">
        '.$cat_mNu.'
    </div>
    ';

    $gl_Wpr = '
    <div class="gl_Wpr">
        '.$mainVw.'
    </div>
    ';

    $mainVwX = $gl_Wpr;
}




$goalBdy_Full = "$mainVwX";
?>