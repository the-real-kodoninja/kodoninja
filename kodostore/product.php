<?php
$path = 'p1';
$p_load = 'f';
$m_path = ""; // for mobile logic
$page = 'product';
include_once("icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>kodostore</title>
<?php include_once(''.$url_lcl.'icl/hdr/meta_tags.php'); ?>
<link href="css/mcss.css" rel="stylesheet">
<link href="css/foundation.zurb/foundation-icons" rel="stylesheet">
<?php 
// temp css placement
include_once("css/mcss.php");
?>
</head>
 <body>
    <?php 
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php");
    include_once(''.$url_lcl.'icl/pnl/panel_r.php');
    echo "$productFULL";
    // add URL on active host
    include_once(''.$url_lcl.'icl/footer.php'); 
    ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>
