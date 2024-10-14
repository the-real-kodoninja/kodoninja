<?php
$path = 'p1';
$page = 'kodospace';
$p_load = 'f';
$m_path = ""; // for mobile logic
$m_width = "";
include_once("icl/glbl/glbl_hdr_link.php");
// keep page stripped minimal design -- // for all waitlist
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodospace - The waiting list</title>
<link href="css/gate.css" rel="stylesheet">
<link href="css/kodospace_waitlist.css" rel="stylesheet">
<?php include_once("icl/hdr/meta_tags.php"); ?>
</head>
<body style="background-color: #3d4347;">
<?php echo $waitList_FULL; ?>
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>