<?php
$path = 'p1';
$page = 'view';
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
<style>
.cNt-Hdr img {
    width: 100%;
    margin: 0px auto 22px;
}

.cnt_mn {
    margin: 20px 0px 10px;
    background: #fff;
    padding: 0px 10px;
}

h2#tEdit1_vc {
    margin: 0px auto 15px;
}

.cNt-Hsh {
    margin: 0px;
}
</style>
</head>

<body style="background-color: #fff;">
    <?php
	include_once("".$m_path."icl/hdr/header.php");
    include_once("".$m_path."icl/social_js.php");
    echo $vwBdy_Full;
	include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    include_once("".$m_path."icl/footer.php");
		?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
