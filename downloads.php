<?php
$path = 'p1';
$page = 'downloads';
$p_load = 'f';
$m_path = ""; // for mobile logic
$scl_width = 'style="max-width: 1000px;"';
include_once("icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<link href="css/downloads.css" rel="stylesheet">
<link href="css/dwn_idx.css" rel="stylesheet">
<link href="css/schFltr_x1.css" rel="stylesheet">
</head>

<body>
    <?php
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php"); 
    echo $dlwn_TopWpr;
    include_once("icl/footer.php"); 
    ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>
