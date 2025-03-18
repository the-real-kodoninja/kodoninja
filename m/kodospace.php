<?php
$path = 'p1';
$page = 'kodospace';
$p_load = 'm';
$m_path = "../";
$m_path2 = "../../";
// $m_width = "width:100%;";
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - The wait list</title>
<link href="<?php echo $m_path; ?>css/gate.css" rel="stylesheet">
<link href="<?php echo $m_path; ?>css/kodospace_waitlist.css" rel="stylesheet">
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
</head>
<body style="background-color: #3d4347;">
    <?php
    include_once("".$m_path."icl/hdr/header.php");
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    echo $waitList_FULL;
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
