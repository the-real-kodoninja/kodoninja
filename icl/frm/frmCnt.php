<?php 

$navMNUx = '
<ul class="usrNav0-Wpr">
    <li id="usrCNT_1x">Everything</li>
    <div class="pad-T fR dI ">
        <span>'.$count_fc.'</span>
    </div>
</ul>
';

if ($p_load == 'f') {
    $mainVw = '
    <div class="frm_main db">
        <div class="main_Wpr">
            <div class="pge-table dI">
                '.$navMNUx.'
                <div class="bck_wht">
                    '.$output_fc.'
                </div>
            </div>
            <div class="rgt-lgc fr">
                '.$pge_Rpanel.'
            </div>
            '.$Trnd_Ftr.'
        </div>
    </div>
    ';

} else if ($p_load == 'm') {
    $mainVw = '
`    <div class="mHdr-Inr pad_T">
        '.$navMNUx.'
        <div class="fPnl-Bck">
            '.$output_fc.'
        </div>
        '.$pge_Rpanel.''.$Trnd_Ftr.'
    </div>
    ';
}

$forumBdy_Full = "$mainVw";
?>