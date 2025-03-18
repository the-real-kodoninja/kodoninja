<?php
error_reporting(0);
$path_1a = '../../';
$path_1b = '../../';
$meowRes = "";
$err_1 = "";
$usrChk = false;
$memType__x = "";
$EggAMnt = 100;
$EggCode__x = "";
$usrNmeB__x = "";
$mNwsTknRwrd = "";
$tKn__1a = "";
$tKn__2a = "";
$tKn__1 = "";
$tKn__2 = "";
$tKn__3 = "";
$tKn__4 = "";
$PromoAMnt = "";
$memBonus = "";
$mNws__x = "";
$sql__X1 = "";
$sql__X2 = "";
$sql__X3 = "";
$sql__X4 = "";
$sql_X4a = "";
$sql_X4b = "";
$sql_X4c = "";
$sql_X4d = "";
$str_crdt = "";
$ord_rwrd_1 = "";
$ord_rwrd_2 = "";
$ord_rwrd_FULL = "";
$str_crdt_FULL = "";
$tknChk_case = "";
$usrNme_Chk__x = false;
$usrEml_Chk__x = false;
$usrPwd_Chk__x = false;
$usrAge_Chk__x = false;
$usrGnd_Chk__x = false;
$usrPro_Chk__x = false;
$usrNws_Chk__x = false;
$totalTkn_Chk__x = false;
$egg_unlk__1 = false;
$egg_unlk__2 = false;
$pro_unlk__1 = false;
$pro_unlk__2 = false;

include_once(''.$path_1a.'icl/cnnc_t.php');
include_once(''.$path_1a.'icl/c_sts.php');
include_once(''.$path_1a.'icl/err/err_tkn.php');
include_once('../../icl/kodocrypt_vx.php');
// if ($log_id <= "") {
//     newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
// } else {
    if (isset($_POST['usrNme']) && isset($_POST['unme_valChk'])) {
        
        $usrNme__x = filter_var(preg_replace('#[^a-z0-9]#i', '', $_POST['usrNme']),FILTER_SANITIZE_STRING);
        if ($usrNme__x == "") {
            echo 'bd__Make a username meow, kodokitty is taken. You can\'t have it.';
        } if (strlen($usrNme__x) < 3 || strlen($usrNme__x) > 16) {
            echo 'bd__Your username needs to be 3 - 16 characters. meow';
        }  else {
            $usrChk = true;
        } 
        // easter egg logic
        // easter egg has to match location 
        if($egck = $sqlo_____dbx___xX__->query(
        $sql_1 = "SELECT DISTINCT *
            FROM easter_code
            WHERE code = '$usrNme__x'
            AND location = 'membership username'")->fetchColumn()) {  
            $cred__ChCk__1_ok = true;
            foreach ($sqlo_____dbx___xX__->query($sql_1) as $roo0w____X___xX__) {
                $EggCode__x = filter_var($roo0w____X___xX__["code"],FILTER_SANITIZE_STRING);
                $EggAmnt__a = filter_var($roo0w____X___xX__["amnt__a"],FILTER_SANITIZE_NUMBER_INT);
                $EggAmnt__b = filter_var($roo0w____X___xX__["amnt__b"],FILTER_SANITIZE_NUMBER_INT);
            } 
            if ($memType__x == "__a") {
                $EggAMnt = $EggAmnt__a;
            } else if ($memType__x == "__b") {
                $EggAMnt = $EggAmnt__b;
            }
            // user can unlock both easter eggs
            if ($usrNme__x == "kodokitty") {
                // add logic that checks any varriant of this name check
                echo 'bd__I told you NO!!, meow... but, you figured it out<br><br>';
                echo 'You unlocked an easter egg, upon completion you\'ll have '.$EggAMnt.' FREE kodotokens';
                $egg_unlk__1 = true;
                $tKn__1a = $EggAMnt;
            } if ($usrNme__x == "kittyPAWpaw713") {
                // add logic that checks any varriant of this name check
                echo 'gd__Meow MEOWWWW!!! You unlocked an easter egg, upon completion you\'ll have '.$EggAMnt.' FREE kodotokens';
                $egg_unlk__2 = true;
                $tKn__2a = $EggAMnt;
            }
        } 
    
        
        
        if ($usrNme__x == "kodoninja") {
            // add logic that checks any varriant of this name check
            echo 'bd__No... I control him, meow.';
        } if ($usrNme__x == "the_real_kodoninja" || $usrNme__x == "therealkodoninja") {
            // add logic that checks any varriant of this name check
            echo 'bd__Get real... I control him, meow.';
        } if ($usrChk == true) {
            $uname_check = $sqlo_____dbx___xX__->query(
                $sql_1 = "SELECT DISTINCT id
                    FROM users
                    WHERE username='$usrNme__x' LIMIT 1")->fetchColumn();

            if ($usrNme__x == $EggCode__x) {
                echo 'gd__You have your tokens, meow, now choose a username, the kodoverse is waiting. This is only unlocked once.';
                // exit();
            } if ($usrNme__x == "the_real_kodoninja" || $usrNme__x == "therealkodoninja") {
                echo "bd__Nope, $usrNme__x... is my pet, meow";
            } else if ($uname_check) {
                echo 'bd__' . $usrNme__x . ' is taken, meow.';
                // exit();
            } else {
                echo 'gd__YAY! ' . $usrNme__x . '\'s avaliable, meow.';
                // exit();
                $usrNme_Chk__x = true;
            }
        } 

        echo $sqlc_____dbx___xX__; exit(); // uname logic check done kill script for index for redirect
    }

    if (isset($_POST['signup_e1']) && isset($_POST['eml_valChk'])) {
        $signup_e1__x = filter_var($_POST['signup_e1'],FILTER_SANITIZE_EMAIL);
        
        if ($signup_e1__x == "") {
            echo 'bd__You must enter an email.';
        } if ($signup_e1__x != $_POST['signup_e1']) {
            echo 'bd__You must enter a valid email.';
        } else {
            $usrEml_Chk__x = true;
        }

        if ($usrEml_Chk__x == true) {
            $ueml_check = $sqlo_____dbx___xX__->query(
                $sql_1 = "SELECT DISTINCT id
                    FROM users
                    WHERE email='$signup_e1__x' LIMIT 1")->fetchColumn();

            if ($ueml_check) {
                echo 'bd__' . $signup_e1__x . ' is used, meow.';
                // exit();
            } else {
                echo 'gd__Good to go!';
                // exit();
                $usrEml_Chk__x = true;
            }
        } 

        echo $sqlc_____dbx___xX__; exit();

    }

    if (isset($_POST['pst_valSbmt'])) {
        $usrNme__x = filter_var(preg_replace('#[^a-z0-9]#i', '', $_POST['usrNme']),FILTER_SANITIZE_STRING);
        if (isset($_POST['memType'])) {
            $memType__x = filter_var($_POST['memType'],FILTER_SANITIZE_STRING);
            $signup_e1__x = filter_var($_POST['signup_e1'],FILTER_SANITIZE_EMAIL);
            $signup_e2__x = filter_var($_POST['signup_e2'],FILTER_SANITIZE_EMAIL);
            $pass1__x = filter_var($_POST['pass1'],FILTER_DEFAULT);
            $pass2__x = filter_var($_POST['pass2'],FILTER_DEFAULT);
            $sdc_1__x = filter_var($_POST['sdc_1'],FILTER_SANITIZE_STRING);
            $sdc_2__x = filter_var($_POST['sdc_2'],FILTER_SANITIZE_STRING);
            $sdc_3__x = filter_var($_POST['sdc_3'],FILTER_SANITIZE_STRING);
            $age__x = filter_var($_POST['age_chk'],FILTER_DEFAULT);
            $promo_cde__x = filter_var($_POST['promo_cde'],FILTER_SANITIZE_STRING);
            $cHk_mNws__x = filter_var($_POST['cHk_mNws'],FILTER_SANITIZE_STRING);

            if ($memType__x == "__a") {
                $mbrLvl__x = '1';
            } else if ($memType__x == "__b") {
                $mbrLvl__x = '2';
            }

        }
    }

    // die('All logic grabbed!<br><hr>'.$usrNme__x.' | '.$signup_e1__x. ' | '.$signup_e2__x.' | '.$pass1__x. ' | '.$pass2__x.' | '.$sdc_1__x.' | '.$sdc_2__x.' | '.$sdc_3__x.' | '.$age__x.' | '.$promo_cde__x.' | '.$cHk_mNws__x.' | '.$memType__x);

        // username check
        if ($usrNme__x) {
            $uname_check = $sqlo_____dbx___xX__->query(
                $sql_1 = "SELECT DISTINCT id
                    FROM users
                    WHERE username='$usrNme__x' LIMIT 1")->fetchColumn();

            if ($usrNme__x == $EggCode__x) {
                echo 'gd__You have your tokens, meow, now choose a username, the kodoverse is waiting. This is only unlocked once.';
                // exit();
            } if ($usrNme__x == "the_real_kodoninja" || $usrNme__x == "therealkodoninja") {
                echo "bd__Nope, $usrNme__x... is my pet, meow";
            } else if ($uname_check) {
                echo 'bd__' . $usrNme__x . ' is taken, meow.';
                // exit();
            } else {
                echo 'gd__YAY! ' . $usrNme__x . '\'s avaliable, meow.';
                // exit();
                $usrNme_Chk__x = true;
            }
        } 
        

        // email logic
        if ($signup_e1__x == "") {
            echo 'bd__You must enter an email.';
        } if ($signup_e1__x != $_POST['signup_e1']) {
            echo 'bd__You must enter a valid email.';
        } if ($signup_e1__x !== $signup_e2__x) {
            echo 'bd__Your emails must match.';
        } else {
            $usrEml_Chk__x = true;
        }

        if ($usrEml_Chk__x == true) {
            $ueml_check = $sqlo_____dbx___xX__->query(
                $sql_1 = "SELECT DISTINCT id
                    FROM users
                    WHERE email='$signup_e1__x' LIMIT 1")->fetchColumn();

            if ($ueml_check) {
                echo 'bd__' . $signup_e1__x . ' is used, meow.';
                // exit();
            } else {
                echo 'gd__Good to go!';
                // exit();
                $usrEml_Chk__x = true;
            }
        } 


        // password logic 
        if ($pass1__x == "") {
            echo "You need a password meow.";  
        } if(!preg_replace('/[^a-z]/m', ' ', $pass1__x)) {
            echo "Your password needs a lowercase letter meow.";  
        } if(!preg_replace('/[^A-Z]/m', ' ', $pass1__x)) {
            echo "<li>Your password needs a uppercase letter meow.";  
        } if(!preg_replace('/[^0-9]/m', ' ', $pass1__x)) {
            echo "<li>Your password needs a letter meow.";  
        } if (strlen($pass1__x) < 3 || strlen($pass1__x) > 16) {
            echo 'Your password needs to be 3 - 16 characters. meow';
        } if ($pass1__x != "" && $pass1__x == "") {
            echo 'You need to confirlm your password meow.';
        } else {
            if ($pass1__x !== $pass2__x) {
                echo 'Your passwords do not match meow.';
            } if ($pass1__x === $pass2__x && $pass1__x != "" && $pass2__x != "") {
                echo 'Passwords are all matched up meow.';
                $_____pass____x__x_1 = kodohash_modify($pass1__x);
                $usrPwd_Chk__x = true;
            }
        }

        // // age logic
        // if ($age__x == "" || $age__x == "NaN") {
        //     echo 'By the CAPA laws we need your age, meow..';
        // } else if ($age__x <= 13) {
        //     echo 'So Sorry little kitten, you need to be at least 13, meow.';
        // } else if ($age__x >= 13 && $age__x <= 17) {
        //     echo 'Looks good, you\'ll be age restriced until your 18, meow.';
        //     $usrAge_Chk__x = true;
        // } else if ($age__x >= 18) {
        //     echo 'Looks good your over 18, don\'t be naughty, meow.';
        //     $usrAge_Chk__x = true;
        // } 

        // check the email for previous orders
        // new user check if previous orders were made and succesful
        // 3 join
        // 1) check email for orders // orders 
        // 2) link orders by oid // order_items
        // 3) get product information on pid // products
        
        if($egck = $sqlo_____db2___xX__->query(
        $sql__1__xx = "SELECT o.email,o.oid,oi.oid,p.* 
            FROM orders AS o 
            LEFT JOIN order_items AS oi ON o.oid = oi.oid
            LEFT JOIN products AS p ON oi.pid = p.id
            WHERE o.email = '$signup_e1__x' 
            AND o.status = '2'")->fetchColumn()) { 
            foreach ($sqlo_____db2___xX__->query($sql__1__xx) as $roo0w____X___xX__) {
                $oItm_pid = filter_var($roo0w____X___xX__["pid"],FILTER_SANITIZE_NUMBER_INT);
                $crt_nme = filter_var($roo0w____X___xX__["nme"],FILTER_DEFAULT);
                $crt_qty = filter_var($roo0w____X___xX__["quantity"],FILTER_SANITIZE_NUMBER_INT);
                $crt_des = filter_var($roo0w____X___xX__["description"],FILTER_SANITIZE_STRING);
                $crt_dte = timeAgo(strtotime($roo0w____X___xX__["date"]));

                    // all check case
                    if ($crt_des == 'tkn' && 
                        $crt_nme == 'kodotoken 250' && $crt_qty >= 12 ||
                        $crt_nme == 'kodotoken 500' && $crt_qty >=  6 ||
                        $crt_nme == 'kodotoken 1,000' && $crt_qty >= 3 ||
                        $crt_nme == 'kodotoken 5,000' && $crt_qty >= 1 ) {
                        $tknChk_case = 1; // 5k
                    } if ($crt_des == 'tkn' && 
                        $crt_nme == 'kodotoken 250' && $crt_qty >= 40 ||
                        $crt_nme == 'kodotoken 500' && $crt_qty >= 20 ||
                        $crt_nme == 'kodotoken 1,000' && $crt_qty >= 10 ||
                        $crt_nme == 'kodotoken 5,000' && $crt_qty >= 2 || 
                        $crt_nme == 'kodotoken 10,000' && $crt_qty >= 1) {
                        $tknChk_case = 2; // 10k
                    } if ($crt_des == 'tkn' && 
                        $crt_nme == 'kodotoken 250' && $crt_qty >= 200 ||
                        $crt_nme == 'kodotoken 500' && $crt_qty >= 100 ||
                        $crt_nme == 'kodotoken 1,000' && $crt_qty >= 50 ||
                        $crt_nme == 'kodotoken 5,000' && $crt_qty >= 10 || 
                        $crt_nme == 'kodotoken 10,000' && $crt_qty >= 5 ||
                        $crt_nme == 'kodotoken 25,000' && $crt_qty >= 2 ||
                        $crt_nme == 'kodotoken 50,000' && $crt_qty >= 1) {
                        $tknChk_case = 3; // 50k
                    } if ($crt_des == 'tkn' && 
                        $crt_nme == 'kodotoken 250' && $crt_qty >= 400 ||
                        $crt_nme == 'kodotoken 500' && $crt_qty >= 200 ||
                        $crt_nme == 'kodotoken 1,000' && $crt_qty >= 100 ||
                        $crt_nme == 'kodotoken 5,000' && $crt_qty >= 20 || 
                        $crt_nme == 'kodotoken 10,000' && $crt_qty >= 10 ||
                        $crt_nme == 'kodotoken 25,000' && $crt_qty >= 4 ||
                        $crt_nme == 'kodotoken 50,000' && $crt_qty >= 2) {
                        $tknChk_case = 4; // 100k
                    }
            }
        
        
        
            // token bonus
            if ($crt_dte >= '48hrs ago') {// -------------------- // within 48hrs check // time bonus
                if ($mbrLvl__x = '1') { // basic member
                    if ($tknChk_case <= '2') {
                        $ord_rwrd_1 = 100;
                    } else if ($tknChk_case >= '2') {
                        $ord_rwrd_1 = 250;
                    }
                } else if ($mbrLvl__x = '2') { // premium member
                    if ($tknChk_case <= '2') {
                        $ord_rwrd_1 = 350;
                    } else if ($tknChk_case >= '2') { 
                        $ord_rwrd_1 = 500;
                    }
                } 
            } else { // --------------------------------------- // older than 48 hrs
                if ($mbrLvl__x == '1') { // basic member
                    if ($tknChk_case == '1') { // under 5k
                        $ord_rwrd_2 = 100;
                    } if ($tknChk_case == '2') { // under 10k
                        $ord_rwrd_2 = 250;
                    } if ($tknChk_case >= '3') {
                        $ord_rwrd_2 = 50;
                    }
                } else if ($mbrLvl__x == '2') { // premium member
                    if ($tknChk_case == '1') {
                        $ord_rwrd_2 = 300;
                        $str_crdt = 1.00; // $2 dollars of premium
                    } if ($tknChk_case == '2' || $tknChk_case == '3') {
                        $ord_rwrd_2 = 1000;
                        $str_crdt = 2.00; // $2 dollars of premium
                    } if ($tknChk_case == '4') {
                        $ord_rwrd_2 = 3000;
                        $str_crdt = 5.00; // $5 dollars of premium
                    } if ($tknChk_case >= '4') {
                        $ord_rwrd_2 = 10000;
                        $str_crdt = 7.00; // $5 dollars of premium
                    }
                }
            }
        }

        $ord_rwrd_FULL = (int)$ord_rwrd_1+(int)$ord_rwrd_2; // any additions add to this // add to all case total tokens if case not ment it wont effect the overall amount
        $str_crdt_FULL = (float)$str_crdt;// any additions add to this
        
        // age check
        if ($age__x) {
            if ($age__x == 'true') {
                $usrAge_Chk__x = true;
            }
        }

        // promo code logic
        if($egck = $sqlo_____dbx___xX__->query(
        $sql3 = "SELECT amnt__a,amnt__b FROM promo_code WHERE code = '$promo_cde__x'")->fetchColumn()) {  
            foreach ($sqlo_____dbx___xX__->query($sql3) as $roo0w____X___xX__) {
                $PromoAmnt__a = filter_var($roo0w____X___xX__["amnt__a"],FILTER_DEFAULT);
                $PromoAmnt__b = filter_var($roo0w____X___xX__["amnt__b"],FILTER_DEFAULT); 

                if ($memType__x == "__a") {
                    $PromoAMnt = $PromoAmnt__a;
                } else if ($memType__x == "__b") {
                    $PromoAMnt = $PromoAmnt__b;
                    if ($promo_cde__x == "kitty_W3LCOME410") { // put all promo codes in array for case checks
                        if ($tknChk_case >= '4') {
                            $mem__cSt = "";
                            $meowRes .= "";
                        } else {
                            $mem__cSt = "$2.99";
                            echo 'Upon checkout your total will be $2.99';
                        }
                    } 
                }
                echo 'M-E-O-W... !!! <b>'.$promo_cde__x.'</b> checks out you gained '.$PromoAMnt.' ';
                $usrPro_Chk__x = true;
                $pro_unlk__1 = true;
            } 
        } else if ($promo_cde__x == "") {
            echo 'really meow? I gave you a code, grrrrr..';
        }


        // cart item checks
        if (isset($_SESSION["crt_log_cde"]) || isset($_COOKIE["crt_log_cde"])) {
            if ($crt_log_cde === $_SESSION["crt_log_cde"] || $crt_log_cde === $_COOKIE["crt_log_cde"]) {
                


            }
            // all case logic
            // check orders for email 
            // -- if match check if items were purchased
            // -- -- if items purchased within 48hrs and choose premium
            // -- -- -- if tkns under 10k give them +250
            // -- -- -- if tkns over 10k give them +500
            // -- -- -- else give them +150 if choose basic
            // 
            // -- -- if match check the quanity and tkn type

            // -- -- -- if tkns over >= 100k give them +10000
            // -- -- -- if tkns over >= 50k && <= 100k give them +3000
            // -- -- -- if tkns over >= 10k && <= 50k give them +1000
            // -- -- -- -- link $5 off if choose premium
            // -- -- -- if tkns over >= 5k && <=10k give them +250
            // -- -- -- -- link $2 off if choose premium
            // -- -- -- if tkns under <= 5k give them +100
            // -- else 
            // -- -- check how much was spent
            // -- -- -- if amount was over $50
            // -- -- -- -- give them 250 tkns
            // -- -- -- else give them 100 tkns

            
        }


        // newsletter logic
        if ($memType__x == "__a") {
            $mNwsAMnt_1 = 500;
            $mNwsAMnt_2 = 15;
            $memBonus = 500;
        } else if ($memType__x == "__b") {
            $mNwsAMnt_1 = 1000;
            $mNwsAMnt_2 = 100;
            $memBonus = 5500;
        }
        if ($cHk_mNws__x == 'false') {
            echo 'You have chossen not to signup for our newsletter, meow.';
            $usrNws_Chk__x = true;
            $mNws__x = '0';
        } if ($cHk_mNws__x == 'true') {
            echo 'Yay!, You have chossen to signup for our newsletter, meow.';
            echo 'You unlocked $mNwsAMnt_1 kodotokens and will gain $mNwsAMnt_2 every week you stay subscribed, meow..';
            $usrNws_Chk__x = true;
            $pro_unlk__2 = true;
            $mNws__x = '1';
            if ($memType__x == 1) { $mNwsTknRwrd = 500; } 
            if ($memType__x >= 2) { $mNwsTknRwrd = 1000; }
        }


        // total kodotokens logic
        if ($egg_unlk__1 == true) {
            $tKn__1 = $tKn__1a;
        } if ($egg_unlk__2 == true) {
            $tKn__2 = $tKn__2a;
        } if ($pro_unlk__1 == true) {
            $tKn__3 = $PromoAMnt;
        } if ($pro_unlk__2 == true) {
            $tKn__4 =  $mNwsAMnt_1;
        }
        // -- total new user tokens
        // -- since user has never existed no need to add to current amount
        $total_uSr_Tkn__x = (int)$memBonus + (int)$tKn__1 + (int)$tKn__2 + (int)$tKn__3 + (int)$tKn__4 + (int)$ord_rwrd_FULL;
        // -- total possible tokens
        $total_cAt_Tkn__x = (int)$memBonus + (int)$tKn__1a + (int)$tKn__2a + (int)$PromoAMnt + (int)$mNwsAMnt_1 + (int)$ord_rwrd_FULL;
        //
        if ($total_uSr_Tkn__x <= $total_cAt_Tkn__x) {
            echo 'You have '.$total_uSr_Tkn__x.' total kodotokens, meow.';
            echo 'No fishy business detected, I eat them for breakfast, meow.';
            $totalTkn_Chk__x = true;
        } if ($total_uSr_Tkn__x > $total_cAt_Tkn__x) {
            echo 'Fishy fish business detected MEOW, meow, grrrrrrr!!!!';
        } if ($total_uSr_Tkn__x == "") {
            $totalTkn_Chk__x = true;
            $total_uSr_Tkn__x = (int)0;
        }

        // true checks
        // die(
        //     $usrNme_Chk__x.
        //     $usrEml_Chk__x.
        //     $usrPwd_Chk__x.
        //     $usrAge_Chk__x.
        //     $usrPro_Chk__x.
        //     $usrNws_Chk__x.
        //     $totalTkn_Chk__x
        // );

        // ALL databases insert
        if($usrNme_Chk__x == true && $usrEml_Chk__x == true && $usrPwd_Chk__x == true && $usrAge_Chk__x == true &&
    $usrPro_Chk__x == true && $usrNws_Chk__x == true && $totalTkn_Chk__x == true) {

            echo '<b>Welcome to the kodoverse '.$usrNme__x.', I\'m creating your account now, meow.</b>';
            //
            // grab total number of rows 
            // add +1 for redirect
            $rowR = $sqlo_____dbx___xX__->query("SELECT COUNT(id) FROM users ORDER BY id DESC")->fetchColumn();

            // current row plus 1 for cd logic
            $u_pth_id = (++$rowR)+2;
            $__pth__x = '../../u/'.$u_pth_id.'';
            
            // mkdir
            if (!file_exists($__pth__x)) {
                mkdir($__pth__x, 0777, true); // creates folder path
            } else if (file_exists($__pth__x)) {
                // developer only
                // echo "This folder already exist";
            } else {
                // developer only
                // echo "There was an issue creating the folder";
            }
            

            //\\//\\//\\//\\//\\ -- \\//\\//\\//\\//\\//\\//\\//\\//\\//\\
            $ip__x = filter_var(getenv('REMOTE_ADDR'),FILTER_VALIDATE_IP);
            $globalCode = codeCnts($_____pass____x__x_1);

            // die('<br><hr>'.$usrNme__x.' | '.$signup_e1__x.' | '.$mbrLvl__x.' | '.$mNws__x.' | '.$ip__x.' | '.$total_uSr_Tkn__x.' | '.$globalCode);
            //
            try {
                $sql__X1 = $sqlo_____dbx___xX__->prepare("INSERT INTO users(
                            username, 
                            fname, 
                            lname, 
                            email,
                            password,
                            views,
                            website,
                            phone,
                            userlevel,
                            news_list,
                            avatar,
                            banner,
                            ip,
                            signup,
                            lastlogin,
                            activated,
                            deactivated,
                            verified,
                            bio,
                            token,
                            code) 
                        VALUES(:unm,
                            :fnm,
                            :lnm,
                            :eml,
                            :pwd,
                            :vws,
                            :web,
                            :phn,
                            :ulv,
                            :nwl,
                            :avt,
                            :bnr,
                            :ip1,
                            :sgn,
                            :llg,
                            :act,
                            :dct,
                            :vrf,
                            :bio,
                            :tkn,
                            :cde)");
                $sql__X1->execute([
                            ':unm' => $usrNme__x,
                            ':fnm' => '',
                            ':lnm' => '',
                            ':eml' => $signup_e1__x,
                            ':pwd' => $_____pass____x__x_1,
                            ':vws' => '',
                            ':web' => '',
                            ':phn' => '',
                            ':ulv' => $mbrLvl__x,
                            ':nwl' => $mNws__x,
                            ':avt' => '',
                            ':bnr' => '',
                            ':ip1' => $ip__x,
                            ':sgn' => date('Y-m-d H:i:s'),
                            ':llg' => date('Y-m-d H:i:s'),
                            ':act' => 0,
                            ':dct' => 0,
                            ':vrf' => 0,
                            ':bio' => '',
                            ':tkn' => $total_uSr_Tkn__x,
                            ':cde' => $globalCode]);
            } catch (PDOException $newError) {
                newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError);
            } 
                    

            if ($egg_unlk__1 == true) {
                // insert
                try {
                    // insert
                    $sql_X2 = $sqlo_____dbx___xX__->prepare("INSERT INTO egg_log(
                                uid,
                                location, 
                                method, 
                                token_amount,
                                teir,
                                date) 
                            VALUES(:id1,
                                :loc,
                                :mth,
                                :tkn,
                                :tir,
                                :date)");
                    $sql_X2->execute([
                                ':id1' => $u_pth_id,
                                ':loc' => 'membership signup',
                                ':mth' => 'username input selection',
                                ':tkn' => $tKn__1a,
                                ':tir' => '1',
                                ':date' => date('Y-m-d H:i:s')]);
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError);
                }
            } if ($egg_unlk__2 == true) {
                // insert
                try {
                    // insert
                    $sql_X3 = $sqlo_____dbx___xX__->prepare("INSERT INTO egg_log(
                                uid,
                                location, 
                                method, 
                                token_amount,
                                teir,
                                date) 
                            VALUES(:id1,
                                :loc,
                                :mth,
                                :tkn,
                                :tir,
                                :date)");
                    $sql_X3->execute([
                                ':id1' => $u_pth_id,
                                ':loc' => 'membership signup',
                                ':mth' => 'username input selection',
                                ':tkn' => $tKn__2a,
                                ':tir' => '1',
                                ':date' => date('Y-m-d H:i:s')]);
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError);
                }
            } if ($mNws__x) {
                // insert
                try {
                    $sql_X5 = $sqlo_____dbx___xX__->prepare("INSERT INTO news_list(
                                uid,
                                email, 
                                date_added,
                                active,
                                token,
                                code,
                                confirmed) 
                            VALUES(:id1,
                                :eml,
                                :ip1,
                                :dte,
                                :act,
                                :tkn,
                                :cde,
                                :cfm)");
                    $sql_X5->execute([
                                ':id1' => $u_pth_id,
                                ':eml' => $signup_e1__x,
                                ':ip1' => $ip__x,
                                ':dte' => date('Y-m-d H:i:s'),
                                ':act' => 1,
                                ':tkn' => $mNwsTknRwrd,
                                ':cde' => $globalCode,
                                ':cfm' => 0]);
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }
            }

            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // -- complete token log entry
            // -- add amount to next
            
            if ($egg_unlk__1 == true) {
                // insert
                try {
                    $sql_X6 = $sqlo_____dbx___xX__->prepare("INSERT INTO token_log(
                                uid,
                                amount, 
                                old_total,
                                new_total,
                                math,
                                method,
                                date) 
                            VALUES(:id1,
                                :amt,
                                :otl,
                                :ntl,
                                :mth,
                                :met,
                                :dte)");
                    $sql_X6->execute([
                                ':id1' => $u_pth_id,
                                ':amt' => (int)$tKn__1a + (int)$ord_rwrd_FULL,
                                ':otl' => (int)$tKn__1a + (int)$ord_rwrd_FULL,
                                ':ntl' => (int)$tKn__1a + (int)$ord_rwrd_FULL,
                                ':mth' => '+',
                                ':met' => 'member signup egg find',
                                ':dte' => date('Y-m-d H:i:s')]);
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }
            } if ($egg_unlk__2 == true) {
                // insert
                try {
                    $sql_X7 = $sqlo_____dbx___xX__->prepare("INSERT INTO token_log(
                                uid,
                                amount, 
                                old_total,
                                new_total,
                                math,
                                method,
                                date) 
                            VALUES(:id1,
                                :amt,
                                :otl,
                                :ntl,
                                :mth,
                                :met,
                                :dte)");
                    $sql_X7->execute([
                                ':id1' => $u_pth_id,
                                ':amt' => (int)$tKn__2a,
                                ':otl' => (int)$tKn__1a,
                                ':ntl' => $num1b = (int)$tKn__1a + (int)$tKn__2a + (int)$ord_rwrd_FULL,
                                ':mth' => '+',
                                ':met' => 'member signup egg find',
                                ':dte' => date('Y-m-d H:i:s')]);
                } catch (PDOException $newError) {
                    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
                }
            } 
            // if ($pro_unlk__1 == true) {
            //     // insert
            //     try {
            //         $sql_X8 = $sqlo_____dbx___xX__->prepare("INSERT INTO token_log(
            //                     uid,
            //                     amount, 
            //                     old_total,
            //                     new_total,
            //                     math,
            //                     method,
            //                     date) 
            //                 VALUES(:id1,
            //                     :amt,
            //                     :otl,
            //                     :ntl,
            //                     :mth,
            //                     :met,
            //                     :dte)");
            //         $sql_X8->execute([
            //                     ':id1' => $u_pth_id,
            //                     ':amt' => (int)$tKn__3,
            //                     ':otl' => $num2c = (int)$tKn__1a + (int)$tKn__2a,
            //                     ':ntl' => $num3c = (int)$tKn__1a + (int)$tKn__2a + (int)$tKn__3 + (int)$ord_rwrd_FULL,
            //                     ':mth' => '+',
            //                     ':met' => 'member signup promo code entry',
            //                     ':dte' => date('Y-m-d H:i:s')]);
            //     } catch (PDOException $newError) {
            //         newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            //     } 
            // }  
            // if ($pro_unlk__2 == true) {
            //     // insert
            //     try {
            //         $sql_X9 = $sqlo_____dbx___xX__->prepare("INSERT INTO token_log(
            //                     uid,
            //                     amount, 
            //                     old_total,
            //                     new_total,
            //                     math,
            //                     method,
            //                     date) 
            //                 VALUES(:id1,
            //                     :amt,
            //                     :otl,
            //                     :ntl,
            //                     :mth,
            //                     :met,
            //                     :dte)");
            //         $sql_X9->execute([
            //                     ':id1' => $u_pth_id,
            //                     ':amt' => (int)$tKn__4,
            //                     ':otl' => $num2d = (int)$tKn__1a + (int)$tKn__2a + (int)$tKn__3,
            //                     ':ntl' => $num3d = (int)$tKn__1a + (int)$tKn__2a + (int)$tKn__3 + (int)$tKn__4 + (int)$ord_rwrd_FULL,
            //                     ':mth' => '+',
            //                     ':met' => 'member signup promo code entry',
            //                     ':dte' => date('Y-m-d H:i:s')]);
            //     } catch (PDOException $newError) {
            //         newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
            //     }
            // }

            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------
            // --------------------------------------------------------------

            if ($sql__X1) {
                    // CREATE THEIR SESSIONS AND COOKIES
                    $_SESSION['globalCode'] = $globalCode;
                    $_SESSION['userid'] = $u_pth_id;
                    $_SESSION['username'] = $usrNme__x;
                    $_SESSION['password'] = $_____pass____x__x_1;
                    setcookie("hcde", $globalCode, strtotime( '+30 days' ), "/", "", "", TRUE);
                    setcookie("id", $u_pth_id, strtotime( '+30 days' ), "/", "", "", TRUE);
                    setcookie("user", $usrNme__x, strtotime( '+30 days' ), "/", "", "", TRUE);
                    setcookie("pass", $_____pass____x__x_1, strtotime( '+30 days' ), "/", "", "", TRUE); 
                    // UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
                echo "__suc_ok__SUCCESS!!! $usrNme__x, you'll be redirected now, meow.";
                header("user.php?u=$usrNme__x").$sqlc_____dbx___xX__; exit();
                //
            } else if (!$sql__X1) {
                echo "Error 1: oh no!!! $usrNme__x, there was a fatal error!, meow, I think a mouse got loose in my code.".$sqlc_____dbx___xX__; exit();
            } else {
                
                echo "Error 2: oh no!!! $usrNme__x, there was a fatal error!, meow, I think a mouse got loose in my code.".$sqlc_____dbx___xX__; exit();
            }
        // }   
    }  





        
        



    // if (isset($_POST['pass1'])) { 
        

    //     //

        

        

        

    //     // password logic

        
        

        
    //     // $pV_2a =  /^(?=.*[a-z]).+$/;
    //     // $pV_3a =  /^(?=.*[A-Z]).+$/;
    //     // $pV_4a =  /^(?=.*[0-9]).+$/;
    //     // $pV_5a =  /^(?=.*[0-9_\W]).+$/;

        // if (!preg_replace('/[^a-z]/m', ' ', $pass1__x)) {
        //     echo 'Your password must contain a lowercase.';
        // } else {
        //     echo 'Your have a lowercase.';
        // }
        

    //     echo "<ol>$meowRes</ol>";

// }
        
?>