<?php
$path = 'p1';
$page = 'contact';
$p_load = 'm';
$m_path = "../"; // for mobile logic
$m_width = "width: 100%;";
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<link href="../css/cnt/contact.css" rel="stylesheet">
</head>

<body>
    <?php
	include_once("".$m_path."icl/hdr/header.php");
    echo $contactBdy_Full;
	include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    include_once("".$m_path."icl/footer.php");
		?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
