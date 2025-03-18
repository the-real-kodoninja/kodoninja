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
        if ($uid__x === $log_id && 
            // $hid__x === $log_HshCde && 
            // $sid__x === $log_sHshCde && 
            $nme__x === $log_username) {

            // fid good preg for passwords
            // escaped for now to prevent injection
            $st_x__x_NEW_CHK_upwd1 = filter_var($_POST['st__x_upwd1'], FILTER_DEFAULT);
            $st_x__x_NEW_CHK_upwd2 = filter_var($_POST['st__x_upwd2'], FILTER_DEFAULT);
            $st_x__x_NEW_CHK_upwd3 = filter_var($_POST['st__x_upwd3'], FILTER_DEFAULT);

            // password logic 
            if ($st_x__x_NEW_CHK_upwd1 == "" ||
                $st_x__x_NEW_CHK_upwd2 == "" || 
                $st_x__x_NEW_CHK_upwd3 == "") {
                echo "A password field is empty meow.<br>";  
            } else if(!preg_match('/[a-z]/', $st_x__x_NEW_CHK_upwd1) || 
                !preg_match('/[a-z]/', $st_x__x_NEW_CHK_upwd2) || 
                !preg_match('/[a-z]/', $st_x__x_NEW_CHK_upwd3)) {
                echo "which am i? Something doesn't contain a lower case, meow hehe<br>";  
            } else if(!preg_match('/[A-Z]/', $st_x__x_NEW_CHK_upwd1) || 
                !preg_match('/[A-Z]/', $st_x__x_NEW_CHK_upwd2) || 
                !preg_match('/[A-Z]/', $st_x__x_NEW_CHK_upwd3)) {
                echo "which am i? Something doesn't contain a upper case, meow hehe<br>";  
            } else if(!preg_match('/[0-9]/', $st_x__x_NEW_CHK_upwd1) || 
                !preg_match('/[0-9]/', $st_x__x_NEW_CHK_upwd2) || 
                !preg_match('/[0-9]/', $st_x__x_NEW_CHK_upwd3)) {
                echo "which am i? Something doesn't contain a letter case, meow hehe<br>";  
            } else if(!preg_match('/[~`!@#$%^&*_+]/', $st_x__x_NEW_CHK_upwd2) || // figue out which combination can cause a injection 
                !preg_match('/[~`!@#$%^&*_+]/', $st_x__x_NEW_CHK_upwd2) || 
                !preg_match('/[~`!@#$%^&*_+]/', $st_x__x_NEW_CHK_upwd3)) {
                echo "which am i? Something doesn't contain a symbol, meow hehe<br>";  
            } else if (strlen($st_x__x_NEW_CHK_upwd1) < 8 || strlen($st_x__x_NEW_CHK_upwd1) > 30 ||
                strlen($st_x__x_NEW_CHK_upwd2) < 8 || strlen($st_x__x_NEW_CHK_upwd2) > 30 ||
                strlen($st_x__x_NEW_CHK_upwd3) < 8 || strlen($st_x__x_NEW_CHK_upwd3) > 30) {
                echo "which am i? A password is less than 8 or over 30, meow hehe";  
            } else if ($st_x__x_NEW_CHK_upwd1 === $st_x__x_NEW_CHK_upwd2 || $st_x__x_NEW_CHK_upwd1 === $st_x__x_NEW_CHK_upwd3) {
                echo "which am i? Something isn't correct, meow hehe";
            } else {
                // checks for hash
                $st_x__x_NEW_CHK_upwd2x = kodohash_modify($st_x__x_NEW_CHK_upwd2);
                if($sqlo_____dbx___xX__->query("SELECT password FROM password_log WHERE password = '$st_x__x_NEW_CHK_upwd2x' AND uid = '$uid__x'")->fetchColumn()) {  
                    echo "we move forward, maybe something new, meow hehe";
                } else {
                    if (kodohash_verify($st_x__x_NEW_CHK_upwd2, $st_x__x_NEW_CHK_upwd3)) {
                        // check current password
                        $st_x__x_NEW_CHK_upwd1x = kodohash_modify($st_x__x_NEW_CHK_upwd1);

                        // developer checks
                        $pas_dev1 = "
                        <b>Password checks // developer edition</b> <hr>
                            <b>pwd1 RAW:</b> $st_x__x_NEW_CHK_upwd1 <br> 
                            <b>pwd2 RAW:</b> $st_x__x_NEW_CHK_upwd2 <br> 
                            <b>pwd3 RAW:</b> $st_x__x_NEW_CHK_upwd3 <p>&nbsp;</p>
                            <hr>
                            <b>pwd1 HASH:</b> $st_x__x_NEW_CHK_upwd1x <br> 
                            <b>crnt pwd HASH:</b> $log_passwordx <br>
                        ";
                    

                        // che3cks if current password is correct
                        if ($st_x__x_NEW_CHK_upwd1x === $log_passwordx) {
                            $st_x__x_NEW_UPD_upwdx = kodohash_modify($st_x__x_NEW_CHK_upwd2);
                            try { // success found now time to update SAVE or EDIT
                                $sql__st_NXW_X1a = $sqlo_____dbx___xX__->prepare(
                                    "UPDATE users SET password = ? WHERE id = '$log_id' AND code = '$log_HshCde' LIMIT 1");
                                $sql__st_NXW_X1a->execute([$st_x__x_NEW_UPD_upwdx]); 
                            } catch (PDOException $newError) {
                                die("could not update meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                            } try { 
                                $sql__st_NXW_X1b = $sqlo_____dbx___xX__->prepare("INSERT INTO password_log(
                                    uid,
                                    password, 
                                    date) 
                                    VALUES(
                                    :____INST____01,
                                    :____INST____02,
                                    :____INST____03)");
                                $sql__st_NXW_X1b->execute([
                                    ':____INST____01' => $log_id,
                                    ':____INST____02' => $st_x__x_NEW_UPD_upwdx,
                                    ':____INST____03' => date('Y-m-d H:i:s')]);
                            } catch (PDOException $newError) {
                                die("could not update meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                            } if ($sql__st_NXW_X1a && $sql__st_NXW_X1b) {
                                echo "You're all set i've updated your password, meow";
                            } else {
                                echo "looks like a mouse got loose in my code meow.";
                            }
                        } else {
                            echo "which am i? Something isn't correct, meow hehe";
                        }
                    } else {
                        echo "which am i? Something isn't matching, meow hehe";
                    }
                }
            }
        } else {
            echo "whoooopsie, you timed out, try refreshing meow.";
        }
    }
}

?>