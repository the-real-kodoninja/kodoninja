<?php 
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');


if (!$log_id && !$log_username && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
}

if (isset($_POST["id"]) && isset($_POST["pTp"]) && isset($_POST["vAl1"]) && isset($_POST["vAl2"]) && isset($_POST["vAl3"]) && isset($_POST["vAl4"])) {
    $ldLiId__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['id']), FILTER_SANITIZE_NUMBER_INT);
    $ldpTp__x = filter_var(preg_replace('#[^A-Z0-4]#i', '', $_POST['pTp']), FILTER_DEFAULT);
    $ldvAl__x = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $_POST['vAl1']), FILTER_DEFAULT);
    $ldvA2__x = filter_var(preg_replace('#[^a-zA-Z ]#i', '', $_POST['vAl2']), FILTER_DEFAULT);
    $ldvA3__x = filter_var(preg_replace('#[^y12]#i', '', $_POST['vAl3']), FILTER_DEFAULT);
    $ldvA4__x = filter_var(preg_replace('#[^fm]#i', '', $_POST['vAl4']), FILTER_DEFAULT);
} else {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
}

//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\

require("../../icl/set/setLi_array.php");

$h = 0;
$ldLi_1 = "";
$ldLi_2 = "";
if ($ldpTp__x == "L2") {
    foreach($setLi["set_list"] as $key => $value) {
        $h++;
        $ldLi_1 .= '<li id="setLi1_'.$h.'" onclick="setMthd(\'L1\',\''.$h.'\',\''.$key.'\',\''.$key.'\',\'y1\',\''.$ldvA4__x.'\')">'.$key.'</li>';
    };
    echo $ldLi_1;
};


if ($ldpTp__x == "L1" && $ldLiId__x != "") {
    if ($ldvA3__x == 'y1' || $ldvA3__x == 'y2' && $ldvA4__x == 'f') {
        foreach($setLi["set_list"][$ldvAl__x] as $key => $value) {
        $h++;
            $ldLi_2 .= '<li id="setLi1_'.$h.'" onclick="setMthd(\'L1\',\''.$h.'\',\''.$ldvAl__x.'\',\''.$value.'\',\'y2\',\''.$ldvA4__x.'\')">'.$value.'</li>';
        };
        echo '
        '.$ldLi_2.'
        <li id="setLi1_'.$h.'" onclick="setMthd(\'L2\',\''.$h.'\',\''.$ldvAl__x.'\',\''.$ldvAl__x.'\',\'y1\',\''.$ldvA4__x.'\')">back</li>
        ';
    } if ($ldvA3__x == 'y2') {
        if($ldvA4__x == 'm') {
            echo '<li id="setLi1_'.$h.'" class="hdrADD" onclick="setMthd(\'L1\',\''.$h.'\',\''.$ldvAl__x.'\',\''.$ldvA2__x.'\',\'y1\',\'m\')"><b><i class="fa-solid fa-caret-left"></i></b> '.$ldvA2__x.'</li>';
        }
    }
};



?>