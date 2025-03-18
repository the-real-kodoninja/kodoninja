<?php
$path = 'p1';
$page = 'feed';
$p_load = 'm';
$m_path = "../"; // for mobile logic
$m_width = "width:100%;";
include_once("icl/c_sts.php");
include_once("icl/u_rgts.php");
include_once("../prs/time_system.php");
include_once("../icl/addons/hashtag.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("../icl/hdr/meta_tags.php"); ?>
<link href="css/mcss.css" rel="stylesheet">
<link href="css/blg/mcss_b.css" rel="stylesheet">
<link href="css/frm/mcss_f.css" rel="stylesheet">
<link href="css/usr/mcss_u.css" rel="stylesheet">
<style>
  .bnrCnt {
      margin: 10px 0px 8px 0px;
  }
</style>
<script>
<!--
document.write("<script src=\"..\/js\/jquery-3.4.1.min.js\"><\/script>");
//-->
</script>
</head>
<body>
    <?php
    include_once("icl/hdr/header.php");
    include_once("icl/pnl/panel_l.php");
    include_once("../icl/pge_Extras.php");
    include_once("../icl/feed/feedLgc.php");
    include_once("../icl/feed/feedCnt.php");
    echo $feedBdy_Full;
    include_once("../icl/footer.php");
    ?>
</body>
<script type="text/javascript">
<!--
document.write('<script type=\"text/javascript" src=\"..\/js\/mjs.js"><\/script>');
//-->
</script>
</html>
