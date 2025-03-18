<?php
$path = 'p1';
$page = 'home';
$p_load = 'm';
$m_path = "../"; // for mobile logic
$scl_width = "";
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $hello; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<style>
body .mHdr-Inr {
    text-align: center;
}

/* panel fixes  */
body .mFr_Pnl {
    margin: 0px 8px 0px -10px;
    border: 1px solid #ddd;
}

.rgt-lgc .content a img  {
    margin: 10px 10px 0px -9px;
}
</style>
</head>

<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php");
    echo $mHdrIntro;
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    include_once("".$m_path."icl/ads/custom_adLgc1.php");
    echo ''.$ad_vw_1.''.$index_FULL.''; 
    include_once("".$m_path."icl/footer.php");
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
