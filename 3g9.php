<?php
//
$path = 'p1';
$p_load = 'f';
$m_path = ""; // for mobile logic
$eg1 = "&#129370;";
$page = '3g9';
$m_width = "";
include_once("".$m_path."icl/glbl/glbl_hdr_link.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>kodoninja - <?php echo "$eg1 $page"; ?></title>
<?php include_once("".$m_path."icl/hdr/meta_tags.php"); ?>
<style>
.Tg9_BdyWpr {
    width: 1000px;
    margin: 82px auto 30px;
}

.Tg9_SchWpr {
}

.Tg9_SchWpr input[type="search"] {
    width: 100%;
    padding: 10px;
    background: transparent;
    border: none;
}

.Tg9_SchWpr input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 20px 0px 0px;
    background-color: darkred;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
}

.Tg9_SchWpr input[type="submit"]:hover {
    background-color: #3d4347;
    color: #fff;
}

#Tg9_ScRsp {
    min-height: 100px;
    background-color: #f0f0f0;
    color: #333;
    height: auto;
    margin: 20px 0px 0px;
    padding: 20px;
}

.mNws-Inr {
    text-align: left;
}

</style>
</head>
 <body>
    <?php
    include_once("".$m_path."icl/hdr/header.php"); 
    include_once("".$m_path."icl/pnl/panel_l.php"); 
    include_once("".$m_path."icl/pnl/panel_r.php"); 
    echo $eggBdy_Full;
    include_once("".$m_path."icl/footer.php"); 
    ?>
</body>
<?php include_once("".$m_path."icl/glbl/glbl_ftr_link.php"); ?>
</html>
