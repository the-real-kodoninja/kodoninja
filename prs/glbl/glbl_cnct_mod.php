<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');

if ($log_id <= "" || $log_username == "" && $user_ok == false) {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.").$sqlc_____dbx___xX__; exit();
} else {
// uid1,uid2,cde,mth
    if(isset($_POST["uid1"]) && isset($_POST["uid2"]) && isset($_POST["cde"]) && isset($_POST["mth"])){
        //
        (int)$uid1__x = filter_var(preg_replace('#[^0-9]#i', '', $_REQUEST['uid1']), FILTER_SANITIZE_NUMBER_INT);
        (int)$uid2__x = filter_var(preg_replace('#[^0-9]#i', '', $_REQUEST['uid2']), FILTER_SANITIZE_NUMBER_INT);
        $cde__x = filter_var(preg_replace('#[^0-9a-z.$]#i', '', $_REQUEST['cde']), FILTER_DEFAULT);
        $mth__x = filter_var(preg_replace('#[^cnctblk_xy]#i', '', $_REQUEST['mth']), FILTER_DEFAULT);
        //
         if ($uid1__x === $log_id) { 
            if ($mth__x === "cnct_x" || $mth__x === "cnct_y") {
                $chg_mth = "accepted";
                $num__y2 = 0;
                if ($mth__x === "cnct_x") {
                    $res_mth = "connect";
                    $num__x = 0;
                    $num__y1 = 0;
                } else {
                    $res_mth = "connected";
                    $num__x = 1;
                    $num__y1 = 1;
                }
            } if ($mth__x === "blck_x" || $mth__x === "blck_y") {
                $chg_mth = "blocked";
                $num__y1 = 0;
                if ($mth__x === "blck_x") {
                    $res_mth = "block";
                    $num__x = 0;
                    $num__y2 = 0;
                } else {
                    $res_mth = "unblock";
                    $num__x = 1;
                    $num__y2 = 1;
                }
            }
            try {
                if($sql______dbx___xX__->query("SELECT * FROM connections WHERE uid1='$uid1__x' AND uid2='$uid2__x' LIMIT 1")->fetchColumn()){
                    if($sql______dbx___xX__->query("UPDATE connections SET $chg_mth = '$num__x' WHERE uid1 = '$uid1__x' AND uid2 = '$uid2__x' LIMIT 1")->fetchColumn()){
                        echo $res_mth;
                    } else {
                        echo 'error';
                    }
                } else {
                    try {
                        if ($log_id && $curFile && $newError) {
                            $sqlo_____dbx___xX__ = $sql______dbx___xX__->prepare("INSERT INTO connections(
                                        uid1,
                                        uid2, 
                                        accepted, 
                                        blocked,
                                        date) 
                                    VALUES(:id1,
                                        :id2,
                                        :acp,
                                        :blk,
                                        :date)");
                            $sqlo_____dbx___xX__->execute([
                                        ':id1' => $uid1__x,
                                        ':id2' => $uid2__x,
                                        ':acp' => $num__y1,
                                        ':blk' => $num__y2,
                                        ':date' => date('Y-m-d H:i:s')]);
                            if ($sqlo_____dbx___xX__) {
                                echo $res_mth;
                            } else {
                                echo 'error';
                            }
                        } return;
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                        header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. ".$newError->getMessage()).$sqlc_____dbx___xX__; exit();
                    } 
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned. ".$newError->getMessage()).$sqlc_____dbx___xX__; exit();
            }  
        }
    }
}
?>