<?php
$path = 'p1';
$p_load = 'f';
$m_path = ""; // for mobile logic
$m_width = "width: 100%;";
$page = 'category';
include_once("icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - <?php echo ''.$t.':&nbsp;'.$page.'&nbsp;',$c.''; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<style>
.blg_main {
    margin: 95px auto;
}
</style>
</head>
<body>
    <?php
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php"); 
    echo $categoryBdy_Full;
    include_once("icl/footer.php"); 
    ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>