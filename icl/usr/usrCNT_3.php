<?php include("".$m_path."icl/glbl/usr-pst_LOAD_view.php"); 

$ld2_CNT_2 = "";
if ($path == "p1") {
    $ld2_CNT_2 = '
    <div class="blgVw-Wpr">
        '.$output_v1_upc.'
    </div>
    ';
} if ($path == "p2") {
    $ld2_CNT_2 = "$output_v1_upc";
}

$full_CNT_3 = '
<div id="usrCNT_4a" class="usrCNT-div Cnt_Bck">
    '.$ld2_CNT_2.'
</div>
';

?>




