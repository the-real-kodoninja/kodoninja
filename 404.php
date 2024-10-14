<?php 
$path = 'p1';
$page = 'error';
$p_load = 'f';
$m_path = "";
include_once("icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $page ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
</head>
<style>
.bnrHdr-Wpr {
    top: 30px;
}

body .mainVw3 {
    margin: 70px auto 0px;
}
</style>
<body>
    <?php 
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php"); 
    echo $errBdy_Full;
    include_once("icl/footer.php"); 
    ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>
