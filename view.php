<?php
$path = 'p1';
$page = 'view';
$p_load = 'f';
$m_path = ""; //  for mobile logic
$m_width = "";
include_once("icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - <?php echo $t_vc; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<style>
.blg_main2 { margin: 185px auto;}
</style>
</head>

<body>
    <?php
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php"); 
    include_once("icl/social_js.php");
    echo $vwBdy_Full; // icl/view/viewCnt.php
    include_once("icl/footer.php"); 
    ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>

