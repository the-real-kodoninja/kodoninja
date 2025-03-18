<?php
include_once("../../icl/cnnc_t.php");
include_once("../../icl/c_sts.php");
include_once("../../prs/time_system.php");

if ($log_id <= "" || $log_username == "") {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.");
} else {
    if(isset($_POST["cnt"]) && isset($_POST["type"]) && isset($_POST["cid"]) && isset($_POST["opt"]) && isset($_POST["res"])) {
        $cnt__x = mysqli_real_escape_string($cnnc_t, $_POST['cnt']);
        $cnt__x = preg_replace('#[^a-z]#i', '', $cnt__x);
        $type__x = mysqli_real_escape_string($cnnc_t, $_POST['type']);
        $type__x = preg_replace('#[^a-z]#i', '', $type__x);
        $cid__x = mysqli_real_escape_string($cnnc_t, $_POST['cid']);
        $cid__x = preg_replace('#[^0-9]#i', '', $cid__x);
        $opt__x = mysqli_real_escape_string($cnnc_t, $_POST['opt']);
        $opt__x = preg_replace('#[^a-z]#i', '', $opt__x);
        $res__x = mysqli_real_escape_string($cnnc_t, $_POST['res']);
        $res__x = preg_replace('#[^a-z]#i', '', $res__x);
        //
        $opSel__x = mysqli_real_escape_string($cnnc_t, $_POST['opSel']);
        $opSel__x = preg_replace('#[^0-9]#i', '', $opSel__x);
        // can remain empty // optional choice
        $opTxt__x = mysqli_real_escape_string($cnnc_t, $_POST['opTxt']);
        $opTxt__x = preg_replace('#[^a-z0-9 ]#i', '', $opTxt__x);
        //
        // developer only
        // echo "$cnt__x | $type__x | $cid__x | $opt__x | $res__x | $opSel__x | $opTxt__x";

        if ($opSel__x < 0 || $opSel__x > 4) {
            header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.");
        }
        if ($cnt__x != "" && $type__x != "" &&  $cid__x != "" && $opt__x != "" && $res__x != "") {
            //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
            $sqlXX = mysqli_query($cnnc_t, "SELECT * FROM report_log WHERE cid = '$cid__x' AND uid = '$log_id' LIMIT 1");
            $nr_cHk = mysqli_num_rows($sqlXX);
            if($nr_cHk > 0) {
                echo "Looks like you already reported this post $log_username, we are looking into this as we speak.";
            } else {
                // no matter option set always insert to database
                $sql_1x = mysqli_query($cnnc_t, "INSERT INTO `report_log`(`cid`,
                                    `uid`, 
                                    `content`,
                                    `op_select`,
                                    `reason`,
                                    `date`) 
                        VALUES('".$cid__x."',
                                '".$log_id."',
                                '".$cnt__x."',
                                '".$opSel__x."',
                                '".$opTxt__x."',
                                now())");
                if ($sql_1x === TRUE) {
                    echo "Your, report has been submitted, you will be notified when the investigation has began.";
                } else {
                    require("../../icl/err/err_tkn.php");
                    $mouseCode = "caught error 1a".mysqli_error($cnnc_t);
                    mysqli_query($cnnc_t, "INSERT INTO `error_log`(`uid`,
                                        `location`,
                                        `msg_code`,
                                        `date`) 
                            VALUES('".$log_id."',
                                    'mnu_Lgc_eVal_x.php',
                                    '".$mouseCode."',
                                    now())");
                }
            }
        }
    }
}
?>