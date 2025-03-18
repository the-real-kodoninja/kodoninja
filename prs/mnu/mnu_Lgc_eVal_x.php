<?php
$path_1a = '../';
$path_1b = '../../';
$m_path = ""; 
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');

if ($log_id <= "" || $log_username == "") {
    header("location: 404.php?msg=mouse detected, meeeooowwww, this is your warning! You will be banned.");
} else {
    if(isset($_POST["type"]) && isset($_POST["cnt"]) && isset($_POST["cid"]) && isset($_POST["opt"])) {
        $type__x = mysqli_real_escape_string($cnnc_t, $_POST['type']);
        $type__x = preg_replace('#[^a-z]#i', '', $type__x);
        $cnt__x = mysqli_real_escape_string($cnnc_t, $_POST['cnt']);
        $cnt__x = preg_replace('#[^a-z_]#i', '', $cnt__x);
        $cid__x = mysqli_real_escape_string($cnnc_t, $_POST['cid']);
        $cid__x = preg_replace('#[^0-9]#i', '', $cid__x);
        $opt__x = mysqli_real_escape_string($cnnc_t, $_POST['opt']);
        $opt__x = preg_replace('#[^a-z]#i', '', $opt__x);
        //
        // echo "$type__x | $cnt__x | $cid__x | $opt__x";
        //
        if ($type__x != "" && $cnt__x != "" && $cid__x != "" && $opt__x != "") {
            //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
            if ($opt__x == "hide" || $opt__x == "unhide") {
                $d_table = "hide_log";
                if ($opt__x == "hide") {
                    $outMsg = '<div class=\"pad-T\">meow, where\'d that post go? oh, you have it hidden '.$log_username.' Would you like to <a onclick="glblPst_eVal(\'user_post\',\'pa\',\''.$cid__x.'\',\'unhide\')">unhide it?</a></div>';
                } if ($opt__x == "unhide") {
                    $outMsg = "<div class=\"pad-T\">hang on $log_username doing a quick refresh, meow</div>";
                }
            } if ($opt__x == "delete") {
                $d_table = "delete_log";
                $outMsg = "<div class=\"pad-T\">Meow, error this post doesn't exist</div>";
            } 
            
            $sqlXX = mysqli_query($cnnc_t, "SELECT * FROM $d_table WHERE cid = '$cid__x' AND uid = '$log_id' LIMIT 1");
            $nr_cHk = mysqli_num_rows($sqlXX);
            if($nr_cHk > 0){
                // echo "$type__x | $cnt__x | $cid__x | $opt__x | $d_table ||";
                while ($row1 = mysqli_fetch_array($sqlXX, MYSQLI_ASSOC)) {
                    $act_hde = $row1["active"];
                    } if ($act_hde == "1") {
                        $sql__st_NXW_X4a = mysqli_query($cnnc_t, "UPDATE $d_table SET active = '0' WHERE uid = '$log_id' LIMIT 1");
                    } if ($act_hde == "0") {
                        $sql__st_NXW_X4a = mysqli_query($cnnc_t, "UPDATE $d_table SET active = '1' WHERE uid = '$log_id' LIMIT 1");
                    }
            } else {
                $sql__st_NXW_X4a = mysqli_query($cnnc_t, "INSERT INTO `$d_table`(`cid`,
                                    `uid`, 
                                    `content`,
                                    `active`,
                                    `date`) 
                        VALUES('".$cid__x."',
                                '".$log_id."',
                                '".$cnt__x."',
                                '".$actSet."',
                                now())");
            } if ($sql__st_NXW_X4a) {
                $op_res = "";
                if ($opt__x == "hide") {
                    $op_res = "hidden";
                } else if ($opt__x == "unhide") {
                    $op_res = "unhidden";
                } else if ($opt__x == "delete") {
                    $op_res = "deleted";
                }
                echo "Success this post has been $op_res";
            } else {
                //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
                // global all page error logic //\\//\\//\\//\\//\\//\\//
                //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
                require(''.$path_1b.'/icl/err/err_tkn.php');
           }
        } else {
            header("location: 404.php?msg=Something is empty, not sure how you made it past Vanilla, mouse.");
        }
    }
}

?>