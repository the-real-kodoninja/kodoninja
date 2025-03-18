<?php
session_start();
$meowRes = "";
$__id_x = "";
$__ps_x = "";
$__id1_x = "";
$__ps1_x = "";
$__id2_x = "";
$__ps2_x = "";
$fgt__crd__1__x = "";
$fgt__crd__2__x = "";
$usrEml_All__x = "";
$usrEml_Opt__x = "";
$cred__ChCk__1_ok = false;
$cred__ChCk__2_ok = false;
$cred__ChCk__E_ok = false;
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/time_system.php');



// NOTE for developer purposes only
//     Keep commeted
    // echo "<u style=\"font-size: 20px;\">PHP POST Test output SUCCESS!:</u><br><br>
    //     <b>logic input 1:</b> $fgt__crd__1__x <br><br>
    //     <b>Case logic 2 lookup:</b> $fgt__crd__2__x 
    //     <hr><br>
    //     <b>Password bot check:</b><hr><br>
    //     <b>hash 1:</b> $sdc_1__x <br>
    //     <b>hash 2:</b> $sdc_2__x <br>
    //     <b>hash 3:</b> $sdc_3__x <br>
    //     ";

   


// credetianls 1 [username, email, phone #] logic
if (isset($_POST['fgt__crd__1'])) { 
    //
    $fgt__crd__1__x = filter_var($_REQUEST['fgt__crd__1'], FILTER_DEFAULT);
    //
    if (isset($_POST['fgt__crd__2'])) { 
        //
        $fgt__crd__2__x = md5(filter_var($_REQUEST['fgt__crd__2'], FILTER_DEFAULT));
        //
        //
        setcookie("__id1_x", $fgt__crd__1__x, strtotime( '+1 days' ), "/", "", "", TRUE);
        setcookie("__ps1_x", $fgt__crd__2__x, strtotime( '+1 days' ), "/", "", "", TRUE); 
        $__id1_x = $_COOKIE['__id1_x'];
        $__ps1_x = $_COOKIE['__ps1_x'];
        //
        $_SESSION['__id2_x'] = $fgt__crd__1__x;
	    $_SESSION['__ps2_x'] = $fgt__crd__2__x;
        $__id2_x = $_SESSION['__id2_x'];
	    $__ps2_x = $_SESSION['__ps2_x'];

        global $__id1_x;
        global $__ps1_x;
        //
        global $__id2_x;
        global $__ps2_x;
        //
        //
        
    }


    $g_test1 = "
    credential 1 = $__id1_x <br>
    Pasword = $__ps1_x";
    $g_test2 = "
    credential 1 = $__id2_x <br>
    Pasword = $__ps2_x";
    
    $sdc_1__x = filter_var($_REQUEST['sdc_1'], FILTER_DEFAULT);
    $sdc_2__x = filter_varpreg_replace('#[^a-z0-9]#i', '', ($_REQUEST['sdc_2']), FILTER_DEFAULT);
    $sdc_3__x = filter_varpreg_replace('#[^a-z0-9]#i', '', ($_REQUEST['sdc_3']), FILTER_DEFAULT);
    // option select
    $opt_sel__x = filter_varpreg_replace('#[^a-z0-9]#i', '', ($_REQUEST['opt_sel']), FILTER_DEFAULT);
    // GET USER IP ADDRESS
    $ip__x = filter_var(getenv('REMOTE_ADDR'),FILTER_VALIDATE_IP);
    //
    // function gLbl__Inf($fgt__crd__1__x,$fgt__crd__2__x) {

    //     global $fgt__crd__1__x;
    //     global $fgt__crd__2__x;

    // }

    // $g_test1 = gLbl__Inf($fgt__crd__1__x,$fgt__crd__2__x);

    

    

    // cross refrences with user_log, locates log past emails, usernames, phone numbers
    // to match with current passwords or previous
    // if found will always turn TRUE row is added upon signup user u= creation
    try {
        if($sqlo_____dbx___xX__->query(
            $sql_X_1 = "SELECT DISTINCT u.*,ul.* 
            FROM users AS u
            INNER JOIN user_log AS ul
            WHERE u.id=ul.uid 
            AND 
            u.username = '$fgt__crd__1__x' OR
            ul.username = '$fgt__crd__1__x' OR
            u.phone = '$fgt__crd__1__x' OR 
            ul.phone = '$fgt__crd__1__x' OR
            u.email = '$fgt__crd__1__x' OR 
            ul.email = '$fgt__crd__1__x'")->fetchColumn()) {  
            foreach ($sqlo_____dbx___xX__->query($sql_X_1) as $roo0w____X___xX__) {
                // users
                $lgnId__x = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_STRING);
                $lgnUsr__x = filter_var($roo0w____X___xX__["username"],FILTER_DEFAULT);
                $lgnEml__x = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL); 
                //
                $cred__ChCk__1_ok = true;
                //
                $usrEml_Opt__x .= '
                <div style="margin:0px 0px 10px;">
                    <input id="x_eml__1" class="x_eml__1" type="checkbox" value="'.$lgnEml__x.'"/>
                    <label for="x_eml__1">'.$lgnEml__x.'</label>
                </div>
                ';
                //
                $usrEml_All__x = '
                <div style="margin-top: 20px;">
                    '.$usrEml_Opt__x.'
                </div>
                <button class="btn__conRes2" onclick="gte__f_N3c(\'opt_x_1a\')">Send reset link</button>
                ';
            } 
            //
            $meowRes .= "We found you meow, would you like me to send you a reset link to the most recent email matching <b>$fgt__crd__1__x</b>?";
            $meowRes .= "<button id=\"btn__conRes1\" class=\"btn__conRes2\" onclick=\"gte__fN3('opt__a')\">yes</button>";
            $meowRes .= "<button id=\"btn__conRes2\" class=\"btn__conRes2\" onclick=\"gte__f_N3b('opt__b')\">let's try a diffrent method</button>";
        
            if ($opt_sel__x == "opta") {
                    $meowRes = "
                    You have chosen to have a reset link sent to you meow.<br></br>
                    Which email(s) attached to <b>$fgt__crd__1__x</b> would you like me to send it to meow?
                    $usrEml_All__x
                    ";
            } else if ($opt_sel__x == "optb") {
                $meowRes .= '<!-- 2nd logic lookup -->
                <!-- logic is case based upon codition no keep dN-->
                <input class="dN" type="text" id="fgt__crd__2" name="fgt__crd__2" placeholder="Meow, I need a pasword meow, meowwww...." required>';
                $meowRes .= "Okay meow, let's try to find your last known password matched with <b>$fgt__crd__1__x</b> meow.";
            } 
        } if ($cred__ChCk__1_ok) {

            // // credetianls 2 [password] logic
            if (isset($_POST['fgt__crd__2']) && $opt_sel__x == "optxx") { 
                // ------------------------------------------------------------
                // ------------------------------------------------------------
                // ------------------------------------------------------------
                // password logic start
                // ------------------------------------------------------------
                
                // cross refrences with user_log, locates log past emails, usernames, phone numbers
                // to match with current passwords or previous
                // if found will always turn TRUE row is added upon signup user u= creation
                $lgnUsr2__x = "";
                //
                try {
                    if($sqlo_____dbx___xX__->query(
                        $sql_X_2 = "SELECT u.id,u.password,u.username,pl.uid,pl.password
                        FROM users AS u
                        INNER JOIN password_log AS pl
                        WHERE u.id= '$lgnId__x'
                        AND
                        u.password = '$fgt__crd__2__x' OR
                        pl.password = '$fgt__crd__2__x' 
                        LIMIT 1")->fetchColumn()) {  
                        //
                        $cred__ChCk__2_ok = true;
                        //
                        foreach ($sqlo_____dbx___xX__->query($sql_X_2) as $roo0w____X___xX__) {
                            // users
                            $lgnUid2__x = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_STRING);
                            $lgnUsr2__x = filter_var($roo0w____X___xX__["username"],FILTER_DEFAULT);
                            $lgnPas2__x = filter_var($roo0w____X___xX__["email"],FILTER_SANITIZE_EMAIL); 
                        }
                        if ($cred__ChCk__1_ok == true && $cred__ChCk__2_ok == true) {
                            $meowRes = "
                            Yay <b>$lgnUsr2__x</b>,... credentials match, what would you like to do, meow?
                            <br><br>
                            <b onclick=\"gte__f_N3c1('opt__eC')\">Update your email</b>
                            <br><br>
                            or
                            <br><br>
                            <b onclick=\"gte__f_N3c1('opt__pC')\">Update your password</b>
                            ";  
                        }
                    }  else {
                        $meowRes = "
                        Nope, meow, meow let's try again.<br><br>

                        Would you like to go back?
                        ";
                    }
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }
            
                // ------------------------------------------------------------
                // password logic end
                // ------------------------------------------------------------
                // ------------------------------------------------------------
                // ------------------------------------------------------------
            }
                
            } else {
            $meowRes .= "Sorry human I couldn't find you with <b>$fgt__crd__1__x</b>, meow.".$sqlc_____dbx___xX__; exit();
        }
        echo "$meowRes";
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
    
}



                     
if (isset($_POST['EmcHk_aRy']) && $_POST['Opt_Val']) {

    // email option select logic
    $EmcHk_aRy__x = filter_var($_REQUEST["EmcHk_aRy"],FILTER_DEFAULT);
    $Opt_Val__x = filter_var(preg_replace('#[^a-z0-9]#i', '', $_REQUEST["Opt_Val"]),FILTER_DEFAULT);

    // test send post request

    // for developers only keep commented
    // echo "
    // <u style=\"font-size: 20px;\">PHP POST Test output SUCCESS!:</u><br><br>
    // Emails:<br><hr>
    // $EmcHk_aRy__x
    // <br><br>
    // Option choice:<br><hr>
    // $Opt_Val__x
    // ";

    if ($EmcHk_aRy__x != "" && $Opt_Val__x == "optx1a") {

        // $Em_aRy_Val = array_pop($EmcHk_aRy__x);

        // NOTE Additional function not neccasry remove 1st vl in array
        // $Em_aRy_Val = explode (" ", $EmcHk_aRy__x);
    

        // $sql_e1 = mysqli_query($cnnc_t, 
        //     "SELECT DISTINCT u.*,ul.* 
        //     FROM users AS u
        //     INNER JOIN user_log AS ul
        //     WHERE u.id=ul.uid 
        //     AND $Em_aRy_Ex");

        // $cRed_Em__check = mysqli_num_rows($sql_e1);
        // if ($cRed_Em__check > 0) {
            $cred__ChCk__E_ok = true;
        //     while ($row1 = mysqli_fetch_array($sql_e1, MYSQLI_ASSOC)){
                // $lgnId_E__x = $row1["id"];
        //     }
        // } 
        if ($cred__ChCk__E_ok == true) {
            //
            // generate temp pass to confirm on email handshake
            // code will load into temp password
            //
            // ONLY logic needed to function
            // above logic confirms user and grabs ID
            // ID can be left as empty or 0
            $hsh_Temp_pass = md5(rand(100000000000,999999999999));

            // insert
            try {
                $sql_EaR1 = $sqlo_____dbx___xX__->prepare("INSERT INTO user_log(
                            uid,
                            temp_code, 
                            verified,
                            date) 
                        VALUES(:id1,
                            :tmp,
                            :vrf,
                            :dte)");
                $sql_EaR1->execute([
                            ':id1' => '',
                            ':tmp' => $hsh_Temp_pass,
                            ':vrf' => 0,
                            ':dte' => date('Y-m-d H:i:s')]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
            //
            //
            // NOTE PLEASE UNCOMMENT
            // can't send mail on localhost uncomment on actual host
            // include_once('fgt_uEml.php'); 
            // mail($fgt_uEml);
            //
            //
            $meowRes = "okay_1";
        } 
        // else {
        //     $meowRes = "ERR 1: Crap.. catch that mouse meow, he's in our code again..".mysqli_error($cnnc_t);
        // } 
    }
    echo "$meowRes";
}

if (isset($_POST['opt__vHk'])) {
    //
    $opt__vHk__x = filter_var($_REQUEST["opt__vHk"],FILTER_DEFAULT);
    //

    
    /**
     * 
     *  Email change logic
     * 
     */
    if (isset($_POST['opt__eC1']) && $opt__vHk__x == "opt__eC") {
        //
        $opt__eC1__x = filter_var($_REQUEST["opt__eC1"],FILTER_SANITIZE_STRING);
        $opt__eC2__x = filter_var($_REQUEST["opt__eC2"],FILTER_SANITIZE_STRING);
        $opt__eCx__x = filter_var($_REQUEST["opt__eCx"],FILTER_SANITIZE_STRING);
        //
        $opt__ChCk__1_ok = false;

        if ($opt__eC1__x == "" || $opt__eC2__x == "") {
            $meowRes = "I'm a very busy cat, get lost meow... Or enter in a new email.";
        } if ($opt__eC1__x != "" && $opt__eC2__x == "") {
            $meowRes = "Meooowww, you need to confirm your new email.";
        } if ($opt__eC1__x == "" && $opt__eC2__x != "") {
            $meowRes = "Your funny, but you need a 1st email to confirm it meow.";
        } if ($opt__eC1__x !== $opt__eC2__x) {
            $meowRes = "hMMM, your emails aren't matching meow.";
        } if ($opt__eC1__x === $opt__eC2__x) {

            //
            try {
                if($sqlo_____dbx___xX__->query(
                    $sql_eC1 = "SELECT DISTINCT u.*,ul.* 
                    FROM users AS u
                    INNER JOIN user_log AS ul
                    WHERE u.id=ul.uid 
                    AND 
                    u.username = '$opt__eCx__x' OR
                    ul.username = '$opt__eCx__x' OR
                    u.phone = '$opt__eCx__x' OR 
                    ul.phone = '$opt__eCx__x' OR
                    u.email = '$opt__eCx__x' OR 
                    ul.email = '$opt__eCx__x'")->fetchColumn()) {  
                    $opt__ChCk__1_ok = true;
                    foreach ($sqlo_____dbx___xX__->query($sql_eC1) as $roo0w____X___xX__) {
                        // users
                        $optId_e__x = filter_var($roo0w____X___xX__["uid"],FILTER_DEFAULT);
                    } 
                } else {
                    $opt__ChCk__1_ok = false;
                    $meowRes = "Really we just confirmed something to get to this screen meow. DO it again I think your a mouse, meow.";
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
            //
            //
            if ($opt__ChCk__1_ok == true) {
            // update
            try {
                $sql_eC2 = $sqlo_____dbx___xX__->prepare(
                    "UPDATE users 
                    SET email=?
                    WHERE id='$optId_e__x' LIMIT 1");
                $$sql_eC2->execute([$opt__eC1__x]); 
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }     
            // insert
            try {
                // insert
                $sql_eC3 = $sqlo_____dbx___xX__->prepare("INSERT INTO user_log(
                            uid,
                            username, 
                            email, 
                            phone,
                            date) 
                        VALUES(:id1,
                            :unm,
                            :eml,
                            :phn
                            :date)");
                $sql_eC3->execute([
                            ':id1' => $optId_e__x,
                            ':unm' => '',
                            ':eml' => $opt__eC1__x,
                            ':phn' => '',
                            ':date' => date('Y-m-d H:i:s')]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }


                if ($sql_eC1 == true && $sql_eC2 == true) {
                    $meowRes = "Okay";
                } else {
                    $meowRes = "ERR 1: Crap.. catch that mouse meow, he's in our code again..".$sqlc_____dbx___xX__; exit();
                }
            }
         }

    echo "$meowRes";
                        
    }


    /**
     * 
     *  Password change logic
     * 
     */
    if (isset($_POST['opt__pC1']) && $opt__vHk__x == "opt__pC") {
        //
        $opt__pC1__x = md5(filter_var($_REQUEST["opt__pC1"],FILTER_SANITIZE_STRING));
        $opt__pC2__x = md5(filter_var($_REQUEST["opt__pC2"],FILTER_SANITIZE_STRING));
        // old password
        $opt__pCx__x = md5(filter_var($_REQUEST["opt__pCx"],FILTER_SANITIZE_STRING));
        //
        $opt__ChCk__2_ok = false;

        // new password checks
        if ($opt__pC1__x == "" || $opt__pC2__x == "") {
            $meowRes = "I'm a very busy cat, get lost meow... Or enter in a new email.";
        } if ($opt__pC1__x != "" && $opt__pC2__x == "") {
            $meowRes = "Meooowww, you need to confirm your new email.";
        } if ($opt__pC1__x == "" && $opt__pC2__x != "") {
            $meowRes = "Your funny, but you need a 1st email to confirm it meow.";
        } if ($opt__pC1__x !== $opt__pC2__x) {
            $meowRes = "hMMM, your emails aren't matching meow.";
        } if ($opt__pC1__x === $opt__pC2__x) {
            $optX__pCF__x = $opt__pC2__x;

            //
            try {
                if($sqlo_____dbx___xX__->query(
                    $sql_pC1 = "SELECT u.id,u.password,u.username,pl.uid,pl.password
                    FROM users AS u
                    INNER JOIN password_log AS pl
                    WHERE u.id= pl.uid
                    AND
                    u.password = '$opt__pCx__x' OR
                    pl.password = '$opt__pCx__x' 
                    LIMIT 1")->fetchColumn()) {  
                    $opt__ChCk__2_ok = true;
                    foreach ($sqlo_____dbx___xX__->query($sql_pC1) as $roo0w____X___xX__) {
                        // users
                        $optId_p__x = filter_var($roo0w____X___xX__["uid"],FILTER_SANITIZE_NUMBER_INT);
                    } 
                } else {
                    $opt__ChCk__2_ok = false;
                    $meowRes = "Really we just confirmed something to get to this screen meow. DO it again I think your a mouse, meow.";
                    // exit();
                } if ($opt__ChCk__2_ok == true) {
                    //
                    // update
                    try {
                        $sql_pC2 = $sqlo_____dbx___xX__->prepare(
                            "UPDATE users 
                            SET password=?
                            WHERE id='$optId_p__x' LIMIT 1");
                        $$sql_pC2->execute([$optX__pCF__x]); 
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                    }
                    // insert
                    try {
                        // insert
                        $sql_pC3 = $sqlo_____dbx___xX__->prepare("INSERT INTO password_log(
                                    uid,
                                    password 
                                    date) 
                                VALUES(:id1,
                                    :pwd
                                    :date)");
                        $sql_pC3->execute([
                                    ':id1' => $optId_p__x,
                                    ':pwd' => $optX__pCF__x,
                                    ':date' => date('Y-m-d H:i:s')]);
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                    }

                    if ($sql_pC1 == true && $sql_pC2 == true) {
                        $meowRes = "Okay";
                    } else {
                        // developer error handeling start
                        // $UNoptX__pCF__x = $_POST['opt__pC1'];
                        // $meowRes .= "
                        // user id: $optId_p__x <br>
                        // user NEW password HASHED: $optX__pCF__x <br>
                        // user NEW password NORMAL: $UNoptX__pCF__x <br>
                        // Error code: ".mysqli_error($cnnc_t);
                        // developer error handeling end
                        $meowRes .= "ERR 1: Crap.. catch that mouse meow, he's in our code again..";
                    }
                }
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            }
         }

    echo "$meowRes";

    }
}
?>