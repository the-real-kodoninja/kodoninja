<?php
$count_bc = "";
$count_fc = "";
$count_gc = "";
if (isset($_GET["t"]) && isset($_GET["c"])) {
    $t = filter_var(preg_replace('#[^goalforumbloguser]#i', '', $_GET['t']), FILTER_SANITIZE_STRING);
    $c = filter_var(preg_replace('#[^a-z]#i', '', $_GET['c']), FILTER_SANITIZE_STRING);
    try {
        if($sqlo_____dbx___xX__->query(
        $sql__1 = $sql__x = "SELECT DISTINCT category FROM $t WHERE category = '$c' ORDER BY category")->fetchColumn()) {
            if ($t === "goal") {
                include("".$m_path."icl/glbl/gol-pst_LOAD_view.php");
            } else if ($t === "forum") {
                include("".$m_path."icl/glbl/frm-pst_LOAD_view.php"); 
            } else if ($t === "blog") {
                include("".$m_path."icl/glbl/blg-pst_LOAD_view.php");
            } 
        } else {
            $output_vc = "There are no results for $c";
        }
        $count_vc = "$count_bc $count_fc $count_gc";

    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
} else {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}
?>
