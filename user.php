<?php
$path = 'p1';
$p_load = 'f';
$m_path = ""; // for mobile logic
$m_width = "";
$page = "user";
include_once("icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $u; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<style>
.vPnlWpr {
    margin: 0px;
}
</style>
</head>
<body>
    <?php 
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php"); 
    echo $user_FULL;
    include_once("icl/footer.php"); ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>