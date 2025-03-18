<?php
// include_once("icl/cnnc_t.php");
// include_once("icl/c_sts.php");
// include_once("prs/time_system.php");


if (!$log_id && !$user_ok)
    newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],NULL);
  

if (isset($_GET["exp"]) && 
    isset($_GET["ghCdx"]) && 
    $_GET["ghCdx"] === $_COOKIE['hcde'] && 
    $_GET["ghCdx"] === $log_HshCde && 
    $_GET["exp"] === ".csv"|| 
    $_GET["exp"] === ".exl" || 
    $_GET["exp"] === ".zip") {
    $expXX1__x = filter_var($_GET['exp'],FILTER_SANITIZE_STRING);
    $expXX2__x = filter_var($_GET['ghCdx'],FILTER_SANITIZE_STRING);
    $expXX3__x = filter_var($_COOKIE['hcde'],FILTER_SANITIZE_STRING);
} else {
    newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],NULL);
} 

if ($_GET["exp"] === ".csv" && $expXX1__x === ".csv" ||
    $_GET["exp"] === ".exl" && $expXX1__x === ".exl" ||
    $_GET["exp"] === ".zip" && $expXX1__x === ".zip" &&
    $_COOKIE['hcde'] === $log_HshCde &&
    $expXX2__x === $expXX3__x) {
        //\\//\\//
        echo "SUCCESS!: 
        Exp type: <b>$expXX1__x</b> <br>
        Hash code: <b>$expXX2__x</b>";

    } else {
    newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],NULL);
} 
?>