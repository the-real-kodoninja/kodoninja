<?php
$path_1a = '../../';
$m_path = "";
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
include_once(''.$path_1a.'icl/err/err_tkn.php');
//
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
    echo $sqlc_____dbx___xX__;
} else {
    if (isset($_POST['__b_c']) &&
        isset($_POST['mth'])) {
        //
        $cat__cat__x = filter_var($_POST['__b_c'],FILTER_SANITIZE_STRING);
        $sx = explode (" ", $cat__cat__x);
        $x = "";
        $sqry_trm = ""; 
            
        foreach($sx as $se) {
            $x++;
            if($x==1) {
                $sqry_trm = "category LIKE '%$cat__cat__x%'";
            }
        }
        //
        $___mth__x = filter_var(preg_replace('#[^bfg_]#i', '', $_POST['mth']),FILTER_SANITIZE_STRING);
        if ($___mth__x === "___b") {
            $___mth__y = "blog";
            $___mth_y1 = "bid";
        } if ($___mth__x === "___f") {
            $___mth__y = "forum";
            $___mth_y1 = "fid";
        } if ($___mth__x === "___g") {
            $___mth__y = "goal";
            $___mth_y1 = "gid";
        }
        //
        // must be greater than // temp fix 
        $catSela = "";
        if($sqlo_____dbx___xX__->query($sql___cat_x = "SELECT DISTINCT category FROM $___mth__y WHERE $sqry_trm LIMIT 5")->fetchColumn()) {
        foreach ($sqlo_____dbx___xX__->query($sql___cat_x) as $roo0w____X___xX__) {
                $cat_11a = implode(',',array_unique(str_word_count($roo0w____X___xX__["category"],1)));
                echo $catSela .= '<li onclick="smBootyCall(\''.$cat_11a.'\')">'.$cat_11a.'</li>';
            } echo $sqlc_____dbx___xX__;
        } else {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],"error");
            echo $sqlc_____dbx___xX__;
        }  
    } 
}
?>