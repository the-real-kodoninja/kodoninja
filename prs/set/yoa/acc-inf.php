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
        isset($_POST["sid"])) { // required
        $st__x_fld__x = filter_var(preg_replace('#[^a-z0-9_]#i', '', $_POST['fld']), FILTER_DEFAULT);
        (int)$uid__x = filter_var(preg_replace('#[^0-9]#i', '', $_POST['uid']), FILTER_SANITIZE_NUMBER_INT);
        $hid__x = filter_var($_POST['hid'], FILTER_DEFAULT);
        $sid__x = filter_var($_POST['sid'], FILTER_DEFAULT);
        $unme_chk = true;

        if ($uid__x === $log_id 
            // && $hid__x === $log_HshCde 
            // && $sid__x === $log_sHshCde **//--// time based FIX COOKIE //--//**
            ) {
            // -- Account Information -- //
            // username check
            if ($st__x_fld__x === "fld_1a") {
                if (isset($_POST["st__x_unme"])) {
                    $st__x_unme__x  = filter_var($_POST['st__x_unme'], FILTER_DEFAULT);
                    // echo "($uid__x === $log_id) <br> ($hid__x === $log_HshCde) <br> ($sid__x === $log_sHshCde)";
                    if ($st__x_unme__x == "kodokitty") {
                        // add logic that checks any varriant of this name check
                        // strip after .__ on vanilla
                        echo 'Nope! That\'s my name meow.__false';
                        $unme_chk = false;
                    } else if ($st__x_unme__x == "kodoninja") {
                        // add logic that checks any varriant of this name check
                        echo '<i><b>No... I control him, meow.</b></i>__false';
                        $unme_chk = false;
                    } else if ($st__x_unme__x == "the_real_kodoninja" || $st__x_unme__x == "therealkodoninja") {
                        // add logic that checks any varriant of this name check
                        echo '<i><b>No... I control him, meow.</b></i>__false';
                        $unme_chk = false;
                    } if ($unme_chk == true) {
                        if($sqlo_____dbx___xX__->query("SELECT username FROM users WHERE username = '$st__x_unme__x'")->fetchColumn()) { 
                            echo "Looks like <b>$st__x_unme__x</b> is taken, try again meow__false";
                        } else {
                            // strip after .__ on vanilla
                            echo "$st__x_unme__x is available meow__true";
                        }
                    }
                }
            }

            // all field 1 updates
            if ($st__x_fld__x === "fld_1b") {
                if( isset($_POST["st__x_unme"]) && 
                    isset($_POST["st__x_ufnme"]) && 
                    isset($_POST["st__x_ulnme"]) && 
                    isset($_POST["st__x_ueml1"]) && 
                    isset($_POST["st__x_uweb"]) &&
                    isset($_POST["st__x_upne"]) &&
                    isset($_POST["st__x_ubio"]) &&
                    isset($_POST["st__x_upwd1"])){
                        $st__x_unme__x = filter_var($_POST['st__x_unme'], FILTER_DEFAULT);
                        $st__x_ufnme__x  = filter_var(preg_replace('#[^a-zA-Z]#i', '', $_POST['st__x_ufnme']), FILTER_DEFAULT);
                        $st__x_ulnme__x  = filter_var(preg_replace('#[^a-zA-Z]#i', '', $_POST['st__x_ulnme']), FILTER_DEFAULT);
                        $st__x_ueml1__x  = filter_var(preg_replace('#[^a-z0-9.:/$_@]#i', '', $_POST['st__x_ueml1']), FILTER_SANITIZE_EMAIL);
                    if (isset($_POST['st__x_ueml2'])) {
                        $st__x_ueml2__x  = filter_var(preg_replace('#[^a-z0-9.:/$_@]#i', '', $_POST['st__x_ueml2']), FILTER_SANITIZE_EMAIL);
                        if ($st__x_ueml2__x === "objectHTMLInputElement") {
                            $st__x_ueml2__x = "";
                        }
                    }
                    $st__x_uweb__x  = filter_var(preg_replace('#[^a-z0-9.:/$_@]#i', '', $_POST['st__x_uweb']), FILTER_SANITIZE_URL);
                    $st__x_upne__x  = filter_var(preg_replace('#[^0-9+() ]#i', '', $_POST['st__x_upne']), FILTER_DEFAULT);

                    // to allow emojis v4
                    $st__x_ubio__x = filter_var($_POST['st__x_ubio'], FILTER_DEFAULT);
                    //
                    $st__x_upwd1__x = kodohash_modify($_POST['st__x_upwd1']);

                    // GET USER IP ADDRESS
                    $st__x_uip__x = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

                    // developer checks
                    // dont delete keep commented
                    // die("
                    // (fld = $st__x_fld__x) <br>
                    // (uid = $uid__x) <br>
                    // (hid = $hid__x) <br>
                    // (sid = $sid__x) <br>
                    // (unme = $st__x_unme__x) <br>
                    // (ufnme = $st__x_ufnme__x) <br>
                    // (ulnme = $st__x_ulnme__x) <br>
                    // (ueml1 = $st__x_ueml1__x) <br>
                    // (ueml2 = $st__x_ueml2__x) <br>
                    // (uweb = $st__x_uweb__x) <br>
                    // (upne = $st__x_upne__x) <br>
                    // (ubio = $st__x_ubio__x) <br>
                    // (upwd = $st__x_upwd1__x)
                    // ");

                    $u_upd_l2_chk_FULL = false;
                    $u_upd_l2_chk_1 = false;
                    $u_upd_l2_chk_2 = true; // optional fname // as for now do nothing
                    $u_upd_l2_chk_3 = true; // optional lname // as for now do nothing
                    $u_upd_l2_chk_4 = false;
                    $u_upd_l2_chk_5 = false;
                    $u_upd_l2_chk_6 = false;
                    $u_upd_l2_chk_7 = true; // optional bio aoy
                    $u_upd_l2_chk_8 = false;

                    if ($st__x_unme__x !== "" && $st__x_ufnme__x !== "" && $st__x_ulnme__x !== "" && $st__x_ueml1__x !== "" && $st__x_uweb__x !== "" && $st__x_upne__x !== "" && $st__x_upwd1__x !== "") {
                        // username
                        if ($st__x_unme__x !== $log_username) {
                            if($sqlo_____dbx___xX__->query("SELECT username FROM users WHERE username = '$st__x_unme__x'")->fetchColumn()) { 
                                echo "Looks like <b>$st__x_unme__x</b> is taken, try again meow";
                            } else {
                                $u_upd_l2_chk_1 = true;
                            }
                        } else { // same username // do nothing
                            $u_upd_l2_chk_1 = true;
                        }
                        // email
                        if ($st__x_ueml1__x !== $log_email && $st__x_ueml1__x === $st__x_ueml2__x) {
                            if($sqlo_____dbx___xX__->query("SELECT email FROM users WHERE email = '$st__x_ueml1__x'")->fetchColumn()) {
                                echo "Looks like <b>$st__x_ueml1__x</b> is taken, try again meow";
                            } else {
                                $u_upd_l2_chk_4 = true;
                            }
                        } else { // same username // do nothing
                            $u_upd_l2_chk_4 = true;
                        }
                        // web URL
                        if ($st__x_uweb__x !== $log_web) {
                            if($sqlo_____dbx___xX__->query("SELECT website FROM users WHERE website = '$st__x_uweb__x'")->fetchColumn()) {
                                // for now allow multiple 
                                $u_upd_l2_chk_5 = true;
                            } else {
                                $u_upd_l2_chk_5 = true;
                            }
                        } else {
                            $u_upd_l2_chk_5 = true;
                        }
                        // phone number
                        // send conformation cannot check on localhost // bypass for now
                        if ($st__x_upne__x !== $log_phone) {
                            if($sqlo_____dbx___xX__->query("SELECT phone FROM users WHERE phone = '$st__x_upne__x'")->fetchColumn()) {
                                echo "Looks like <b>$st__x_upne__x</b> is taken, try again meow";
                            } else {
                                $u_upd_l2_chk_6 = true;
                            }
                        } else {
                            $u_upd_l2_chk_6 = true;
                        } 
                        //
                        if ($st__x_upwd1__x) {
                            $u_upd_l2_chk_8 = true;
                        } if ($u_upd_l2_chk_1 === true && $u_upd_l2_chk_2 === true && $u_upd_l2_chk_3 === true && $u_upd_l2_chk_4 === true && $u_upd_l2_chk_5 === true && $u_upd_l2_chk_6 === true && $u_upd_l2_chk_7 === true && $u_upd_l2_chk_8 === true) {
                            $u_upd_l2_chk_FULL = true;
                        } if ($u_upd_l2_chk_FULL == true) {
                            if($sqlo_____dbx___xX__->query("SELECT password FROM users WHERE password = '$st__x_upwd1__x' AND id = '$log_id' 
                            -- AND code = '$log_HshCde' 
                            LIMIT 1")->fetchColumn()) {
                                try { // success found now time to update SAVE or EDIT
                                    $sql__st_NXW_X = $sqlo_____dbx___xX__->prepare(
                                        "UPDATE users SET 
                                        username = ?, 
                                        fname = ?, 
                                        lname = ?, 
                                        email = ?, 
                                        website = ?,
                                        phone = ?,
                                        bio = ? 
                                        WHERE id = '$log_id' 
                                        -- AND code = '$log_HshCde' 
                                        LIMIT 1");
                                    $sql__st_NXW_X->execute([
                                        $st__x_unme__x,
                                        $st__x_ufnme__x,
                                        $st__x_ulnme__x,
                                        $st__x_ueml1__x,
                                        $st__x_uweb__x,
                                        $st__x_upne__x,
                                        $st__x_ubio__x]); 
                                    if ($st__x_unme__x !== $log_username) {
                                        $_SESSION['username'] = $st__x_unme__x; //c_sts will set to $log_username
                                        setcookie("user", $st__x_unme__x, strtotime( '+30 days' ), "/", "", "", TRUE);
                                    } if ($sql__st_NXW_X) { // all update checks
                                        echo "success meow, all updated!"; // correct password // updated correctly
                                    }
                                } catch (PDOException $newError) {
                                    die("could not update meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                                }
                                
                            } else {
                                echo "oh ooh meow, theres a mouse loose in my code. oh wait no somethings wrong on your end... ... meow"; // wrong password output // don't put wrong password
                            }
                        }
                    }
                }   
            }

            // name display
            if ($st__x_fld__x === "fld_1c" && isset($_POST["st__nTrm_nmx"]) || $st__x_fld__x === "fld_1d" && isset($_POST["st__nTrm_nmx"])) {
                (int)$st__x_nTrm_nmx = filter_var(preg_replace('#[^12345678]#i', '', $_POST['st__nTrm_nmx']), FILTER_SANITIZE_NUMBER_INT);
                if ($st__x_fld__x === "fld_1c") {
                    $st_x1_nTrm_nmx = $st__x_nTrm_nmx;
                    $st_x2_nTrm_nmx = 1;
                    $st__x_CHG_trm = "xVname";
                } if ($st__x_fld__x === "fld_1d") {
                    $st_x1_nTrm_nmx = 1;
                    $st_x2_nTrm_nmx = $st__x_nTrm_nmx;
                    $st__x_CHG_trm = "base_ext";
                } if ($st__x_nTrm_nmx <= 8) {
                    if($sqlo_____dbx___xX__->query("SELECT uid FROM user_options WHERE uid = '$log_id' LIMIT 1")->fetchColumn()) {  
                        try { // success found now time to update SAVE or EDIT
                            $st__x_sql_1INS = $sqlo_____dbx___xX__->prepare(
                                "UPDATE user_options SET $st__x_CHG_trm = ? WHERE uid = '$log_id' LIMIT 1");
                            $st__x_sql_1INS->execute([$st__x_nTrm_nmx]); 
                             if ($st__x_sql_1INS) {
                                echo "changed";
                            } else {
                                echo "error meow";
                            }
                        } catch (PDOException $newError) {
                            die("could not update meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                        }
                    } else { //rare case
                        try { 
                            $st__x_sql_1INS = $sqlo_____dbx___xX__->prepare("INSERT INTO user_options(
                                uid,
                                xVname, 
                                base_ext,
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
                                :____INST____06,
                                :____INST____07,
                                :____INST____08)");
                            $st__x_sql_1INS->execute([
                                ':____INST____01' => $log_id,
                                ':____INST____02' => $st_x1_nTrm_nmx,
                                ':____INST____03' => $st_x2_nTrm_nmx,
                                ':____INST____04' => 0,
                                ':____INST____05' => 0,
                                ':____INST____06' => 0,
                                ':____INST____07' => 0,
                                ':____INST____08' => date('Y-m-d H:i:s')]);
                        } catch (PDOException $newError) {
                            die("could not update meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                        } if ($st__x_sql_1INS) {
                            echo "changed";
                        } else {
                            echo "error meow";
                        }
                    } 
                }
            } 
        }
    }
}

?>
