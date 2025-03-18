<?php
$path = 'p1';
$page = 'search';
$p_load = 'm';
$m_path = "../"; // for mobile logic
$m_width = "";
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>kodoninja <?php echo "$page $s"; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<style>
body .usrConts_Inr {
  margin: 0px 0px 20px 0px;
}
</style>
</head>
<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php"); 
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");  
    echo $searchBdy_Full;
    include_once("".$m_path."icl/footer.php"); 
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>