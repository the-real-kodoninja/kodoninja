<?php
$path = 'p1';
$page = 'blog';
$p_load = 'f';
$m_path = "";
//
include_once("icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<link href="css/blg/mcss.css" rel="stylesheet">
<link href="css/blg_idx.css" rel="stylesheet">
<link href="css/schFltr_x1.css" rel="stylesheet">
<style>.schDrp-Rsl {margin: -2px 0px 0px;} </style>
</head>
 <body>
    <?php 
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php"); 
    echo $blgBdy_Full;
    include_once("icl/footer.php"); ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>