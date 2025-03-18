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
    if (isset($_POST["uid"]) && 
        isset($_POST["hid"]) && 
        isset($_POST["sid"]) &&
        isset($_POST["nme"]) &&
        isset($_POST["opt"]) &&
        isset($_POST["aws"])) { // required
        (int)$st__x_uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']), FILTER_SANITIZE_NUMBER_INT);
        $st__x_hid__x = filter_var($_POST['hid'], FILTER_DEFAULT);
        $st__x_sid__x = filter_var($_POST['sid'], FILTER_DEFAULT);
        $st__x_nme__x = filter_var(preg_replace('#[^a-z0-9_]#i', '', $_POST['nme']), FILTER_DEFAULT);
        $st__x_opt__x = filter_var(preg_replace('#[^suspendactivat]#i', '', $_POST['opt']), FILTER_DEFAULT);
        // only one answer
        $st__x_aws__x = filter_var(preg_replace('#[^YESR]#i', '', $_POST['aws']), FILTER_DEFAULT);

        // pre checks
        if ($st__x_uid__x === $log_id && $st__x_hid__x === $log_HshCde && $st__x_sid__x === $log_sHshCde && $st__x_nme__x === $log_username && $st__x_opt__x === "suspend" || $st__x_opt__x === "deactivate" && $st__x_aws__x === "YESR" && isset($_POST['st__x_upwd4'])) {
            //
            if (isset($_POST['st__x_upwd4']) && $st__x_aws__x === "YESR") {
                // raw password convert
                $st_x__x_HHH_CHK_cpwd4x = kodohash_modify($_POST['st__x_upwd4']);

                $dev_chk_x = '
                <b>developer checks</b> <hr>
                '.$st__x_hid__x.' <br> 
                '.$st__x_sid__x.' <br>
                '.$st__x_nme__x.' <br>
                '.$st__x_opt__x.' <br>
                '.$st__x_aws__x.' <br>
                <b>RAW password:</b> '.$_POST['st__x_upwd4'].' <br>
                <b>HASH password:</b> '.$st_x__x_HHH_CHK_cpwd4x.' <br>
                ';
                // dev localhost only
                // die($dev_chk_x);


                if($sqlo_____dbx___xX__->query(
                    $sql__pwd__st1x = "SELECT password FROM users WHERE password = '$st_x__x_HHH_CHK_cpwd4x' AND id = '$log_id' 
                    -- AND code = '$log_HshCde' 
                    LIMIT 1")->fetchColumn()) {             
                    try { // success found now time to update SAVE or EDIT
                            $sql__st_DEACT_X4a = $sqlo_____dbx___xX__->prepare(
                                "UPDATE users SET deactivated = ? 
                                WHERE id = '$log_id' 
                                -- AND code = '$log_HshCde' 
                                AND password = '$st_x__x_HHH_CHK_cpwd4x' LIMIT 1");
                            $sql__st_DEACT_X4a->execute(['1']); 
                        if ($sql__st_DEACT_X4a) {
                            try { 
                            $sql__st_DEACT_X4b = $sqlo_____dbx___xX__->prepare("INSERT INTO delete_log(
                                cid,
                                uid, 
                                content,
                                active,
                                date)  
                                VALUES(
                                :____INST____01,
                                :____INST____02,
                                :____INST____03,
                                :____INST____04,
                                :____INST____05)");
                            $sql__st_DEACT_X4b->execute([
                                ':____INST____01' => $log_id,
                                ':____INST____02' => $log_id,
                                ':____INST____03' => 'user',
                                ':____INST____04' => 0,
                                ':____INST____05' => date('Y-m-d H:i:s')]);
                        } catch (PDOException $newError) {
                            die("could not post meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                        }
                        if ($sql__st_DEACT_X4b) {
                            $tme_msg = "";
                            if ($st__x_opt__x === "deactivate") {
                                $tme_msg = "within 60 days, meow.";
                            } else {
                                $tme_msg = "soon, meow.";
                            }
                            echo "okay $log_username, I hope to see you again $tme_msg <br>
                            You'll be logged out in 5 seconds __true";
                            // head on JS
                            // header("location: '.$path_1b.'logout.php");
                        } else {
                            echo "Oh no meow, a mouse is loose in my code";
                        }
                    } 
                        
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                    }                      
                } else {
                    echo "ohh no meow, a mouse is in my code... oh wait no it's just you... ... meow";
                }

            } else {
                echo "ohh no meow, a mouse is in my code... oh wait no it's just you... ... meow";
            }
        } else {
            echo "whoooopsie, you timed out, try refreshing meow.";
        }
    }
}

?>