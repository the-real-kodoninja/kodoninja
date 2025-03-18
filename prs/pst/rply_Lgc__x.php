<?php
include_once("../../icl/cnnc_t.php");
include_once("../../icl/c_sts.php");
include_once("../../prs/time_system.php");

if ($log_id <= "" || $log_username == "" && $user_ok == false) {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.");
} else {

    $btnVt_clr1 = 'style="border-color: #000;"';
    $txt_Plc = "reply to your own reply $log_username";
    $m_path = "";
    //
    

    if(isset($_POST["opid"]) && isset($_POST["rpid"]) && isset($_POST["type"]) && isset($_POST["pge"])){
        (int)$opid__x = mysqli_real_escape_string($cnnc_t, $_POST['opid']);
        (int)$opid__x = preg_replace('#[^0-9]#i', '', $opid__x);
        (int)$rpid__x = mysqli_real_escape_string($cnnc_t, $_POST['rpid']);
        (int)$rpid__x = preg_replace('#[^0-9]#i', '', $rpid__x);
        $type__x = mysqli_real_escape_string($cnnc_t, $_POST['type']);
        $type__x = preg_replace('#[^a-z]#i', '', $type__x);
        $pge__x = mysqli_real_escape_string($cnnc_t, $_POST['pge']);
        $pge__x = preg_replace('#[^a-z]#i', '', $pge__x);
        //
        include_once("pst_OUTPUT_view.php");
    }
}
?>
<style>
.rLoad {
    border-left: 2px dotted darkred;
    margin: 10px 0px 10px 25px;
    padding: 0px 0px 0px 10px;
}
</style>