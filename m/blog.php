<?php
$path = 'p1';
$page = 'blog';
$p_load = 'm';
$m_path = "../";
$m_path2 = "../../";
// $m_width = "width:100%;";
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<link href="css/blg_idx.css" rel="stylesheet">
<link href="css/schFltr_x1.css" rel="stylesheet">
<style>
body .mHdr-Wpr, body .mHdr-Ovly, body img.mHdr-cVr {
    height: 263px;
}

body .tglImgX img {
    position: absolute;
}

body .bHdrImgx img.mHdr-cVr {
    height: 50px;
    /* position: relative; */
}
</style>
</head>
<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php");
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    echo $blgBdy_Full;
    include_once("".$m_path."icl/footer.php");
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
