<?php include("".$m_path."icl/glbl/frm-pst_LOAD_view.php");
$ld2_CNT_2 = "";
        

if ($path == "p1") {
    $ld2_CNT_2 = '
    <div class="blgVw-Wpr">
        '.$output_fc.'
    </div>
    ';
} if ($path == "p2") {
    $ld2_CNT_2 = "$output_fc";
}

$full_CNT_2 = '
<div id="usrCNT_2a" class="usrCNT-div Cnt_Bck">
    '.$ld2_CNT_2.'
</div>
';
?>