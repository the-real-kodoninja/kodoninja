<?php
$path = 'p1';
$p_load = 'f';
$m_path = ""; // for mobile logic
$page = 'membership';
include_once("icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html ng-app="angularsignup" ng-controller="signup_ctr" ng-init="showdata()">
<head>
<title>Membership - <?php echo $hello; ?></title>
<?php include_once("icl/hdr/meta_tags.php"); ?>
<link href="css/mem/memLoad.css" rel="stylesheet">
<style>
.scl_ftr {
    text-align: center;
    margin: 5px auto;
    width: 100%;
}
</style>
</head>
 <body>
    <?php 
    include_once("icl/hdr/header.php"); 
    include_once("icl/pnl/panel_l.php"); 
    include_once("icl/pnl/panel_r.php");
    if ($crt_msg) {
        $crt_msg = '
        <div class="pR" style="margin: 100px 0px 0px 0px;">
            '.$crt_msg.'
        </div>
        ';
    } 
    echo ''.$crt_msg.''.$mem_Cnts.'';
    include_once("icl/footer.php"); 
    ?>
        
</body>
<?php include_once("icl/glbl/glbl_ftr_link.php"); ?>
</html>