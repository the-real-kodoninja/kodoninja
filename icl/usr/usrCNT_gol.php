<?php include("".$m_path."icl/glbl/gol-pst_LOAD_view.php");
$ld1_CNT_2 = "";
//

if ($path == "p1") {
    $ld1_CNT_2 = '
    <div class="blgVw-Wpr">
        '.$output_vc.'
    </div>
    ';
} if ($path == "p2") {
    $ld1_CNT_2 = "$output_vc";
}

$full_CNT_gol = '
<div id="usrCNT_3a" class="usrCNT-div Cnt_Bck pad-T">
    '.$ld1_CNT_2.'
</div>
';
?>