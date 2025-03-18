<?php include("".$m_path."icl/glbl/usr_LOAD_view.php"); 
//
if ($path == "p1") {
    $ld5_CNT_1 = 'usrConts';
} if ($path == "p2") {
    $ld5_CNT_1 = "usrBdy pad_T";
}

$full_CNT_5 = '
<div id="usrCNT_6a" class="usrCNT-div '.$ld5_CNT_1.'">
    <div class="usrHdr">
        <div class="pad-T dI">
            connections
        </div>
        <div class="edit-B_Wpr pad-T fR dI ">
            <span>'.$cnct_1_count.'</span>
        </div>
    </div>
    <div class="usrConts-Wpr">
        '.$output_uc.'
    </div>
</div>
';
?>