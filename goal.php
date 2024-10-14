<?php
$path = 'p1';
$p_load = 'f';
$m_path = ""; // for mobile logic
$page = 'goal';
$m_width = "";
include_once("icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<style>
.glPgBr_1 {
    width: 100%;
    margin: 10px 0px;
}
</style>
</head>

 <body>
    <?php
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php"); 
    echo $goalBdy_Full;
    include_once("icl/footer.php"); 
    ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>
