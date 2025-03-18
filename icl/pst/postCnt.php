<?php 
$cNt_Hsh = '
<ul class="cNt-Hsh">
    <input id="__b_t2" class="Pnl-Tgs" type="text" placeholder="#tag1, #tag2, #tag3..." value="'.$tag_vc.'"/>
</ul>
';

$bdy_cnt_1 = '
<div class="di">
    '.$cov_vc.''.$cov_lay.'
    <form class="clip di __pLg1">
        <input id="__b_t1" class="Pnl-Ttl" type="text" placeholder="'.$t.' title" title="'.$t_vc.'" value="'.$t_vc.'"/>
        <div>by '.$nmeDpy_GLBL.' '.$usrTag_GLBL.'</div>
    </form>
</div>
'.$cNt_Hsh.'
';

if ($p_load === 'f') {
    $rgt_lgc = '
    <div class="rgt-lgc fr">
        '.$pge_Rpanel.'
    </div>
    ';
} else if ($p_load === 'm') {
    $rgt_lgc = '
    <div class="rgt-lgc pad-T" style="margin: -10px 0px -20px;">
        '.$pge_Rpanel.'
    </div>
    ';
}

$bdy_cnt_2 = "$catSel $pgr_bar $wysiwyg_BdyX $refLgc $__b_PstBtn";

$bdy_cnt_All = '
<div class="pst_main">
    <div class="lft-lgc2 di">
        <div id="__b_Ld1" class="Cnt_Bck pad-T2 dB">
            '.$bdy_cnt_1.' '.$bdy_cnt_2.'
        </div>     
        <div id="__b_Ld2" class="Cnt_Bck pad-T2 dN">
        </div>       
    </div>
    '.$rgt_lgc.' '.$Trnd_Ftr.'
</div>
';

$postBdy_Full = "$bdy_cnt_All";
?>