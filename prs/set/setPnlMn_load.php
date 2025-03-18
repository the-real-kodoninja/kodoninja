<?php
$path_1a = '../../';
$path_1b = '../../../';
$m_path = ""; 
include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
// include_once(''.$path_1a.'icl/kodocrypt_vx.php');

if (!(int)$log_id && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} 

if (isset($_POST["id"]) && isset($_POST["pTp"]) && isset($_POST["vAl1"]) && isset($_POST["vAl2"]) && isset($_POST["vAl4"])) {
    $ldLiId__x = filter_var(preg_replace('#[^a-z0-9.@]#i', '', $_POST['id']), FILTER_DEFAULT);
    $ldpTp__x = filter_var(preg_replace('#[^A-Z0-4]#i', '', $_POST['pTp']), FILTER_DEFAULT);
    $ldvAl__x = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $_POST['vAl1']), FILTER_DEFAULT);
    $ldvA2__x = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $_POST['vAl2']), FILTER_DEFAULT);
    $ldvA4__x = filter_var(preg_replace('#[^fm]#i', '', $_POST['vAl4']), FILTER_DEFAULT);
    // $setUnq_ncde = setHSH($cnnc_t,$log_id,$log_id,$log_password);

    // developer checks meow
    // echo "do I make it here meow? pg1 t4 ($ldLiId__x | $ldpTp__x | $ldvAl__x | $ldvA2__x)";
} else {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
}

//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\

require("../../icl/set/setLi_array.php");

if ($ldvAl__x == "Your account" && $ldvA2__x != "") {
    require("../../icl/set/Ld_your_account.php");
} else if ($ldvAl__x == "Privacy and safety" && $ldvA2__x != "") {
    require("../../icl/set/Ld_privacy_and_safety.php");
} else if ($ldvAl__x == "Notifications" && $ldvA2__x != "") {
    require("../../icl/set/Ld_notifications.php");
} else if ($ldvAl__x == "Currency" && $ldvA2__x != "") {
    require("../../icl/set/Ld_currency.php");
} else { // 1st load logic
    require("../../icl/set/Ld_your_account.php");
}
?>