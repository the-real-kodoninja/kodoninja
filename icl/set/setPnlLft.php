<?php
$path_1a = '';
if ($p_load == 'm') {
    $path_1a = '../';
}
$path_1b = '../../';
include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
include_once(''.$path_1a.'prs/time_system.php');


if ($log_id == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
$h = 0;
$li = "";
    require("".$path_1a."icl/set/setLi_array.php");
    foreach($setLi["set_list"] as $key => $value) {
        $h++;
        $li .= '<li id="setLi1_'.$h.'" onclick="setMthd(\'L1\',\''.$h.'\',\''.$key.'\',\''.$key.'\',\'y1\',\''.$p_load.'\')">'.$key.'</li>';
    };
}


?>