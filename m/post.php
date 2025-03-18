<?php
$path = 'p1';
$page = 'post';
$p_load = 'm';
$m_path = "../"; // for mobile logic
$m_width = "width: 100%;";
$cat_mNu = ""; // find menu
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - <?php echo $page; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<style>
body .lft-lgc2 {
    margin: 0px;
}

body .IMG_add, body .IMG_diag {
    border: 2px dashed #ddd;
    border-radius: 4px;
   /*background: linear-gradient(to top right,#fff calc(50% - 1px), #333, #fff calc(50% + 1px))*/
}

body .IMG_add, body .IMG_diag {
    background: none;
}
</style>
</head>
<body>
    <?php
    include_once("".$m_path."icl/hdr/header.php");
    // include_once("".$m_path."icl/cat_pge.php");
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php");
    echo $postBdy_Full;
    include_once("".$m_path."icl/footer.php");
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
