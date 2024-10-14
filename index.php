<?php
$path = 'p1';
$page = 'home';
$p_load = 'f';
$m_path = "";
$m_width = "";
include_once("icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $hello; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<style>
    .blg_Desc2 {
        width: 848px;
    }
    /* temp for cache resets please remove */
    ul.mHdr-Nav div {
        margin: 0px auto;
    }
    ul.mHdr-Nav {
        margin: 0px 0px 25px;
    }
    ul.mHdr-Nav .scl_sub {
        margin: -4px 0px 0px 0px;
    }
    .mHdr-Ovly > div {
        margin: 130px auto 0px;
    }
</style>
</head>
 <body>
    <?php 
    include_once("icl/hdr/header.php");
    echo $mHdrIntro;
    include_once("icl/pnl/panel_l.php");
    include_once("icl/pnl/panel_r.php");
    include_once("icl/ads/custom_adLgc1.php");
    echo ''.$ad_vw_1.''.$index_FULL.''; 
    include_once("icl/footer.php"); 
    ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>