<?php
$path = 'p1';
$page = 'user';
$p_load = 'm';
$m_path = "../"; // for mobile logic
$scl_width = "";
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>kodoninja - <?php echo $hello; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<style>
.bnrCnt {
    margin: 60px 0px 0px;
}

.bnrCnt img {
    position: absolute;
}

.bnrHdr-Wpr {
    height: 103px;
}

.usrBdy-Hdr {
    border: 1px solid #ccc;
    padding: 5px;
}

body .usrConts {
    margin: 0px 33px 15px 17px;
    width: auto;
}

body .Cnt_Bck, body .rgt-lgc {
    margin: 10px;
}

body .rgt-lgc {
    margin: 0px -23px 0px -7px;
}

body #usrCNT_1 {
    padding: 0px;
}

body #st__x1_unmex a {
    color: #fff;
}
</style>
</head>

<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php");
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    echo $user_FULL;
    include_once("".$m_path."icl/footer.php");
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
