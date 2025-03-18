<?php
$bnrHdr = "";

if ($p_load == 'f') {
    $blg_main = '
    <div class="frm_main db">
        <div class="main_Wpr">
            <div class="pge-table dI" style="max-width: 735px;">
                <ul class="usrNav0-Wpr">
                    <li id="usrCNT_1x">Recent post in Category <a>'.$c.'</li>
                    <div class="pad-T fR dI ">
                        <span>'.$count_vc.'</span>
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

    $categoryBdy_Full = "$blg_main";
    
} else if ($p_load == 'm') {

    $blg_main = '
    <div class="mHdr-Inr pad_T">
        <div class="fPnl-Bck">
            '.$output_vc.'
        </div>
        '.$pge_Rpanel.''.$Trnd_Ftr.'
    </div>
    ';

    $categoryBdy_Full = "$blg_main";
}

?>