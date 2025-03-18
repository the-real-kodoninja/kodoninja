<?php
$path = 'p1';
$p_load = 'm';
$m_path = "../"; // for mobile logic
$m_width = "width: 100%;";
$page = 'category';
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - <?php echo ''.$t.':&nbsp;'.$page.'&nbsp;',$c.''; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
</head>
<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php"); 
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php"); 
    echo $categoryBdy_Full;
    include_once("".$m_path."icl/footer.php"); 
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>