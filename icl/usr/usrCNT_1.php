<?php 
if ($page != "settings") {
    include("".$m_path."icl/glbl/blg-pst_LOAD_view.php");
}
$ld1_CNT_1x = "";
//

if ($path == "p1") {
    $ld1_CNT_1x = '
    <div class="blgVw-Wpr">
        '.$output_bc.'
    </div>
    ';
} if ($path == "p2") {
    $ld1_CNT_1x = "$output_bc";
}

$full_CNT_1x = '
<div id="usrCNT_1a" class="usrCNT-div Cnt_Bck">
    '.$ld1_CNT_1x.'
</div>
';
?>