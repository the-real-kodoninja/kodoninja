<?php
include_once("icl/cnnc_t.php");
include_once("icl/c_sts.php");
include_once("prs/time_system.php");

$m_path = "";

if ($log_id !== $_COOKIE['id'] && 
    $log_username !== $_COOKIE['user'] && 
    $_COOKIE['hcde'] !== $log_HshCde && 
    $_COOKIE['hcde'] !== $_GET['ghCdx'] &&
    $user_ok !== TRUE) {
    header("Location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err1");
    session_destroy();
    mysqli_close();
    exit();
} 

if (isset($_GET["exp"]) && 
    isset($_GET["ghCdx"]) && 
    $_GET["ghCdx"] === $_COOKIE['hcde'] && 
    $_GET["ghCdx"] === $log_HshCde && 
    $_GET["exp"] === ".csv"|| 
    $_GET["exp"] === ".exl" || 
    $_GET["exp"] === ".zip") {
    $expXX1__x = mysqli_real_escape_string($cnnc_t, $_GET['exp']);
    $expXX1__x = preg_replace('#[^celpsvxz.]#i', '', $expXX1__x);
    $expXX2__x = mysqli_real_escape_string($cnnc_t, $_GET['ghCdx']);
} else {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err1");
    // NOTE force open to raw page
    session_destroy();
    mysqli_close();
    exit();
} 

if ($_GET["exp"] === ".csv" && $expXX1__x === ".csv" ||
    $_GET["exp"] === ".exl" && $expXX1__x === ".exl" ||
    $_GET["exp"] === ".zip" && $expXX1__x === ".zip" &&
    $_COOKIE['hcde'] === $log_HshCde &&
    $expXX2__x === $_GET['ghCdx'] &&
    $_COOKIE['hcde'] === $_GET['ghCdx'] &&
    $user_ok === TRUE) {
        //\\//\\//
        echo 'SUCCESS!: 
        user status <b>'.$user_ok.'</b> <br>
        Session username: <b>'.$_COOKIE['user'].'</b> <br> 
        Exp type: <b>'.$expXX1__x.'</b> <br>
        Cookie code: <b>'.$_COOKIE['hcde'].'</b> <br>
        Log code: <b>'.$log_HshCde.'</b> <br>
        GET code sanatized: <b>'.$expXX2__x.'</b> <br>
        GET code RAW: <b>'.$_GET['ghCdx'].'</b><br><br>';

    } else {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. err1");
    // NOTE force open to raw page
    session_destroy();
    mysqli_close();
    exit();
} 




?>