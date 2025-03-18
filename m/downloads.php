<?php
$path = 'p1';
$page = 'downloads';
$p_load = 'm';
$m_path = "../"; // for mobile logic
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $hello; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<link href="css/downloads.css" rel="stylesheet">
<link href="css/dwn_idx.css" rel="stylesheet">
<link href="css/schFltr_x1.css" rel="stylesheet">
</head>
<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php");
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    echo $dlwn_TopWpr;
    include_once("".$m_path."icl/footer.php");
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
