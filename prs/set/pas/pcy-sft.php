<?php
$path_1a = '../../';
$path_1b = '../../../';
$m_path = ""; // for -- u_rgts.php
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/glbl/u_full.php');
include_once(''.$path_1b.'prs/time_system.php');
include_once(''.$path_1b.'icl/kodocrypt_vx.php');

// 1 universal file
if (!$log_id && !$log_username && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
    // all logic for your account
    // absolutes for all settings base logic
    if (isset($_POST["fld"]) && 
        isset($_POST["uid"]) && 
        isset($_POST["hid"]) && 
        isset($_POST["sid"]) &&
        isset($_POST["nme"])) { // required
            $st__x_fld__x = filter_var(preg_replace('#[^a-z0-9_]#i', '', $_POST['fld']), FILTER_DEFAULT);
            (int)$uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']), FILTER_SANITIZE_NUMBER_INT);
            $hid__x = filter_var($_POST['hid'], FILTER_DEFAULT);
            $sid__x = filter_var($_POST['sid'], FILTER_DEFAULT);
            $nme__x = filter_var($_POST['nme'], FILTER_DEFAULT);

        // pre checks
        if ($uid__x === $log_id && $hid__x && $sid__x === $setUnq_ncde && $nme__x === $log_username) {
            if ($st__x_fld__x && isset($_POST['inp_PAS_x'])) {
                $st_inp_PAS__x = filter_var(preg_replace('#[^truefals]#i', '', $_POST['inp_PAS_x']), FILTER_DEFAULT);
                // all case will be true or false
                if ($st_inp_PAS__x === "true") {
                    $st_inp_PAS__x = 1;
                } else if ($st_inp_PAS__x === "false") {
                    $st_inp_PAS__x = 0;
                } 
                // developer
                // echo "PHP 1st Grab (fld: $st__x_fld__x) (TF statement: $st_inp_PAS__x) <br>";
                // fields are new inserts
                // on update it'll adjust as needed
                $st_fld_1 = 0;
                $st_fld_2 = 0;
                $st_fld_3 = 0;
                $st_fld_4 = 0;
                if ($st__x_fld__x !== "") {
                    if ($st__x_fld__x === "fld_3a") {
                        $st_tgl_x = "post_1";
                        $st_fld_1 = $st_inp_PAS__x;
                        $st_fld_2 = 0;
                        $st_fld_3 = 1;
                        $st_fld_4 = 0;
                    } else if ($st__x_fld__x === "fld_3b") {
                        $st_tgl_x = "post_2";
                        $st_fld_1 = 0;
                        $st_fld_2 = $st_inp_PAS__x;
                        $st_fld_3 = 1;
                        $st_fld_4 = 0;
                    } else if ($st__x_fld__x === "fld_3c") {
                        $st_tgl_x = "nsfw_1";
                        $st_fld_3 = $st_inp_PAS__x;
                    } else if ($st__x_fld__x === "fld_3d") {
                        $st_tgl_x = "nsfw_2";
                        $st_fld_1 = 0;
                        $st_fld_2 = 0;
                        $st_fld_3 = 1;
                        $st_fld_4 = $st_inp_PAS__x;
                    }
                    //
                    if($sqlo_____dbx___xX__->query(
                        $sql1 = "SELECT * FROM user_options WHERE uid = '$log_id' LIMIT 1")->fetchColumn()) {             
                        try { // success found now time to update SAVE or EDIT
                                $sql__st_NXW_X3a = $sqlo_____dbx___xX__->prepare(
                                    "UPDATE user_options 
                                    SET $st_tgl_x = ?
                                    WHERE uid = '$log_id' 
                                    -- AND username = '$log_username' 
                                    -- AND password = '$log_password' 
                                    LIMIT 1");
                                $sql__st_NXW_X3a->execute([$st_inp_PAS__x]); 
                            if ($sql__st_NXW_X3a) {
                                echo "PHP suc output $st_inp_PAS__x";
                            } else {
                                echo "PHP fal output $st_inp_PAS__x";
                            }
                        } catch (PDOException $newError) {
                            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                        }                      
                    } else { // new user row insert
                        try { 
                            $sql__st_NXW_X1b = $sqlo_____dbx___xX__->prepare("INSERT INTO user_options(
                                uid,
                                post_1, 
                                post_2,
                                nsfw_1,
                                nsfw_2,
                                date)  
                                VALUES(
                                :____INST____01,
                                :____INST____02,
                                :____INST____03,
                                :____INST____04,
                                :____INST____05,
                                :____INST____06)");
                            $sql__st_NXW_X1b->execute([
                                ':____INST____01' => $log_id,
                                ':____INST____02' => $st_fld_1,
                                ':____INST____03' => $st_fld_2,
                                ':____INST____04' => $st_fld_3,
                                ':____INST____05' => $st_fld_4,
                                ':____INST____06' => date('Y-m-d H:i:s')]);
                        } catch (PDOException $newError) {
                            die("could not post meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                        } if ($sql__st_NXW_X1b) {
                            echo 'option changed success';
                        }
                    }
                }
            }
        } else {
            echo "whoooopsie, you timed out, try refreshing meow.";
        }
    }
}

?>