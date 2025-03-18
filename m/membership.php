<?php
$path = 'p1';
$page = 'membership';
$p_load = 'm';
$m_path = "../"; // for mobile logic
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html ng-app="angularsignup" ng-controller="signup_ctr" ng-init="showdata()">
<head>
<title>Membership - <?php echo $hello; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
</head>
<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php");
    echo $mem_Cnts;
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    include_once("".$m_path."icl/footer.php");
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
