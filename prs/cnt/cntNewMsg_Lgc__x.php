<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'icl/addons/meowRes.php');
include_once(''.$path_1b.'prs/time_system.php');

$m_path = "";
$cntMsgUsr_X = "";


if(isset($_POST["uid"]) && isset($_POST["type"])){
    (int)$uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']),FILTER_SANITIZE_NUMBER_INT);
    $type__x = filter_var(preg_replace('#[^a-z]#i', '', $_POST['type']),FILTER_SANITIZE_STRING);

    if ($uid__x == 0) {
        $log_id = 0;
    }

    if ($uid__x == $log_id && $type__x == "o") {
        //
        if ($log_id >= 1) {
            echo meowRes($sqlo_____dbx___xx__,2,"r1p4",NULL,NULL);
        } else if ($log_id == 0) {
            echo meowRes($sqlo_____dbx___xx__,2,"r2p4",NULL,NULL);
        }
    } else {
        header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.");
        exit();
    }  
} else {
    echo "Something is empty";
    exit();
}


?>